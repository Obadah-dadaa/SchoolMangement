<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HelperClasses\Message;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Teacher;
use App\Models\User;

class TeacherController extends Controller
{

    public function index()
    {
        $teachers=Teacher::all();
       // return response()->json(new Message($invoice, '200', true, 'info', 'done', 'تم'));
        return view('Teachers.index',compact('teachers'));

    }

public function create(){

    $teachers=Teacher::all();
    return view('Teachers.create',compact('teachers'));
}


    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'integer','max:255'],
            'role' => ['required', 'string', 'min:4'],
        ]);
        $teachers = Teacher::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'role' => $request->role,

        ]);
        $teachers->attachRole('teacher');
//        return $user;
        return redirect('/teachers');



//        $rules = [
//            'first_name'=> 'string|required',
//            'last_name'=> 'string|required',
//            'phone_number'=> 'string|required',
//            'email'=> 'string|required',
//            'password'=> 'string|required',
//        ];
//
//        $validated = Validator::make($request->all(),  $rules);
//        if($validated->fails())
//        {
//            return response()->json(new Message($validated->errors(), '200', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
//        }
//
//        $user_data = [];
//        if($request->has('first_name')) if(!is_null($request->first_name)) $user_data['name'] = $request->first_name;
//        if($request->has('email')) if(!is_null($request->email)) $user_data['email'] = $request->email;
//        if($request->has('password')) if(!is_null($request->password)) $user_data['password'] = $request->password;
//
//        $teacher_data = [];
//        if($request->has('first_name')) if(!is_null($request->first_name)) $teacher_data['first_name'] = $request->first_name;
//        if($request->has('last_name')) if(!is_null($request->last_name)) $teacher_data['last_name'] = $request->last_name;
//        if($request->has('phone_number')) if(!is_null($request->phone_number)) $teacher_data['phone_number'] = $request->phone_number;
//        try
//        {   $user = User::create($user_data);
//            $teacher = $user->teachers()->create($teacher_data);
//            return response()->json(new Message($teacher, '200', true, 'info', 'done', 'تم'));
//        }
//        catch(\Exception $e)
//        {
//            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
//        }
    }

    public function show($id)
    {
        $teacher=Teacher::find($id);
        return view('Teachers.show',compact('teacher'));
    }
    public function edit($id){

        //      $teachers=Teacher::get()->first();
        $teachers=Teacher::where('id',$id)->first();
        return view('Teachers.edit', compact('teachers'));
    }


    public function update($id,Teacher  $teacher,Request $request)
    {

        $teachers = Teacher::find( $id ) ;

        $teachers = Teacher::update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'role' => $request->role,
        ]);
        $teachers->save();
        return redirect('/teachers');













//        $rules = [
//            'first_name'=>'string|required',
//            'last_name'=>'string|required',
//            'phone_number'=> 'string|required',
//            'email'=> 'string|required',
//            'password'=> 'string|required',
//        ];
//
//        $validated = Validator::make($request->all(),  $rules);
//        if($validated->fails())
//        {
//            return response()->json(new Message($validated->errors(), '200', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
//        }
//        $user_data = [];
//        if($request->has('first_name')) if(!is_null($request->first_name)) $user_data['name'] = $request->first_name;
//        if($request->has('email')) if(!is_null($request->email)) $user_data['email'] = $request->email;
//        if($request->has('password')) if(!is_null($request->password)) $user_data['password'] = $request->password;
//
//        $teacher_data = [];
//        if($request->has('first_name')) if(!is_null($request->first_name)) $teacher_data['first_name'] = $request->first_name;
//        if($request->has('last_name')) if(!is_null($request->last_name)) $teacher_data['last_name'] = $request->last_name;
//        if($request->has('phone_number')) if(!is_null($request->phone_number)) $teacher_data['phone_number'] = $request->phone_number;
//        try
//        {
//            $user = $teacher->users;
//            $user->update($user_data);
//            $teacher->update($teacher_data);
//            return response()->json(new Message( $teacher, '200', true, 'info', 'done', 'تم'));
//        }
//        catch(\Exception $e)
//        {
//            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
//        }
    }

    public function destroy($id,Teacher  $teacher)
    {

        $user=User::where('id',$id);
        $user->delete();
        return back();


        try
        {
            $teacher->delete();
            return response()->json(new Message( $teacher,'200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(),'100', false, 'error', 'error', 'خطأ'));
        }
    }
}
