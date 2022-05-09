<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:system_administrator']);
    }


    public function index()
    {
        $users = User::all();
        $roles=Role::all();
        return view('Users.index', compact('users','roles'));
    }

    public function create()
    {
        $users=User::all();
        return view('Users.create',compact('users'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        $user->attachRole('system_administrator');
//        return $user;
        return redirect('/users');
    }


    public function edit($id)
    {
//      $user=User::get()->first();
        $user=User::where('id',$id)->first();
        return view('Users.edit', compact('user'));
    }

    public function update($id,Request $request)
    {
        $user = User::find( $id ) ;

        $user = User::update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->save();
        return redirect('/users');

    }
    public function show($id)
    {
        $user=User::find($id);
        return view('Users.show',compact('user'));
    }

    public function destroy($id)
    {
        $user=User::where('id',$id);
        $user->delete();
        return back();

    }
}
