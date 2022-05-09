<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HelperClasses\Message;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\TheParent;

class ParentController extends Controller
{
    public function index(){

        $parents=TheParent::all();
        return view('Parents.index',compact('parents'));
    }


    public function store(Request $request)
    {
        $rules = [
            'first_name'=> 'string|required',
            'last_name'=> 'string|required',
            'phone_number'=> 'string|required',
            'email'=> 'string|required',
            'password'=> 'string|required',
        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '200', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $user_data = [];
        if($request->has('first_name')) if(!is_null($request->first_name)) $user_data['name'] = $request->first_name;
        if($request->has('email')) if(!is_null($request->email)) $user_data['email'] = $request->email;
        if($request->has('password')) if(!is_null($request->password)) $user_data['password'] = $request->password;

        $parent_data = [];
        if($request->has('first_name')) if(!is_null($request->first_name)) $parent_data['first_name'] = $request->first_name;
        if($request->has('last_name')) if(!is_null($request->last_name)) $parent_data['last_name'] = $request->last_name;
        if($request->has('phone_number')) if(!is_null($request->phone_number)) $parent_data['phone_number'] = $request->phone_number;
        try
        {
            $user = User::create($user_data);
            $parent = $user->parents()->create($parent_data);
            return response()->json(new Message($parent, '200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }

    public function show(parent  $parent)
    {
        return response()->json(new Message($parent, '200', true, 'info', 'done', 'تم'));
    }

    public function update(Request $request, parent  $parent)
    {
        $rules = [
            'first_name'=>'string|required',
            'last_name'=>'string|required',
            'phone_number'=> 'string|required',
            'email'=> 'string|required',
            'password'=> 'string|required',
        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '200', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }
        $user_data = [];
        if($request->has('first_name')) if(!is_null($request->first_name)) $user_data['name'] = $request->first_name;
        if($request->has('email')) if(!is_null($request->email)) $user_data['email'] = $request->email;
        if($request->has('password')) if(!is_null($request->password)) $user_data['password'] = $request->password;

        $parent_data = [];
        if($request->has('first_name')) if(!is_null($request->first_name)) $parent_data['first_name'] = $request->first_name;
        if($request->has('last_name')) if(!is_null($request->last_name)) $parent_data['last_name'] = $request->last_name;
        if($request->has('phone_number')) if(!is_null($request->phone_number)) $parent_data['phone_number'] = $request->phone_number;
        try
        {
            $user = $parent->users;
            $user->update($user_data);
            $parent->update($parent_data);
            return response()->json(new Message( $parent, '200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }

    public function destroy(parent  $parent)
    {
        try
        {
            $parent->delete();
            return response()->json(new Message( $parent,'200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(),'100', false, 'error', 'error', 'خطأ'));
        }
    }
}
