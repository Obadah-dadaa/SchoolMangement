<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use App\HelperClasses\Message;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;
class StudentController extends Controller
{

    public function index()
    {
        $sections=Section::all();
        $students = Student::all();
       // return response()->json(new Message($invoice, '200', true, 'info', 'done', 'تم'));
        return view('students.index',compact('students','sections'));

    }
    public function create(){

        $students=Student::all();
        $sections=Section::all();

        return view('students.create',compact('students','sections'));
    }
    public function store(Request $request)
    {

        $this->validate($request, [

            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'parent_id' => ['required', 'integer','max:255'],
            'section_id' => ['required', 'integer', 'max:255'],

        ]);

        $students = Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'parent_id' => $request->parent_id,
            'section_id' => $request->section_id,

        ]);

        return redirect('/students');




//        $rules = [
//            'first_name'=>'string|required',
//            'last_name'=>'string|required',
//            'parent_id'=> 'integer|required',
//            'section_id'=> 'integer|required',
//        ];
//
//        $validated = Validator::make($request->all(),  $rules);
//        if($validated->fails())
//        {
//            return response()->json(new Message($validated->errors(), '200', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
//        }
//
//        $student_data = [];
//        if($request->has('first_name')) if(!is_null($request->first_name)) $student_data['name'] = $request->first_name;
//        if($request->has('email')) if(!is_null($request->email)) $student_data['email'] = $request->email;
//        if($request->has('parent_id')) if(!is_null($request->parent_id)) $student_data['parent_id'] = $request->parent_id;
//        if($request->has('section_id')) if(!is_null($request->section_id)) $student_data['section_id'] = $request->section_id;
//
//        try
//        {
//            $student = Student::create($student_data);
//            return response()->json(new Message($student, '200', true, 'info', 'done', 'تم'));
//        }
//        catch(\Exception $e)
//        {
//            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
//        }
    }

    public function show($id)
    {
        $student=Student::find($id);
        return view('Students.show',compact('student'));
    }
    public function edit($id,Student $students){

        //      $Students=Student::get()->first();
        $students=Student::where('id',$id)->first();
        return view('Students.edit', compact('students'));
    }

    public function update($id,Request $request, student  $student)
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



//
//        $rules = [
//            'first_name'=>'string|required',
//            'last_name'=>'string|required',
//            'parent_id'=> 'integer|required',
//            'section_id'=> 'integer|required',
//        ];
//
//        $validated = Validator::make($request->all(),  $rules);
//        if($validated->fails())
//        {
//            return response()->json(new Message($validated->errors(), '200', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
//        }
//        $student_data = [];
//        if($request->has('first_name')) if(!is_null($request->first_name)) $student_data['name'] = $request->first_name;
//        if($request->has('email')) if(!is_null($request->email)) $student_data['email'] = $request->email;
//        if($request->has('parent_id')) if(!is_null($request->parent_id)) $student_data['parent_id'] = $request->parent_id;
//        if($request->has('section_id')) if(!is_null($request->section_id)) $student_data['section_id'] = $request->section_id;
//
//        try
//        {
//            $student->update($student_data);
//            return response()->json(new Message( $student, '200', true, 'info', 'done', 'تم'));
//        }
//        catch(\Exception $e)
//        {
//            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
//        }
    }

    public function destroy($id,Student  $student)
    {

        $student=Student::where('id',$id);
        $student->delete();
        return back();


        try
        {
            $student->delete();
            return response()->json(new Message( $student,'200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(),'100', false, 'error', 'error', 'خطأ'));
        }
    }
}
