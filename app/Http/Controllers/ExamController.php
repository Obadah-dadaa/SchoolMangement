<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\HelperClasses\Message;
use Illuminate\Support\Facades\Validator;

class ExamController extends Controller
{
    public function index()
    {
        $exam = Exam::get();
       // return response()->json(new Message($invoice, '200', true, 'info', 'done', 'تم'));
    }

    public function store(Request $request)
    {
        $rules = [
            'student_id'=>'integer|required',
            'subject_grades_id'=>'integer|required',
            'type'=> 'string|required',
            'mark'=> 'integer|required',
        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '200', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }


        $exam_data = [];
        if($request->has('student_id')) if(!is_null($request->student_id)) $exam_data['student_id'] = $request->student_id;
        if($request->has('subject_grades_id')) if(!is_null($request->subject_grades_id)) $exam_data['subject_grades_id'] = $request->subject_grades_id;
        if($request->has('type')) if(!is_null($request->type)) $exam_data['type'] = $request->type;
        if($request->has('mark')) if(!is_null($request->mark)) $exam_data['mark'] = $request->mark;
        try
        {
            $exam = Exam::create($exam_data);
            return response()->json(new Message($exam, '200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }

    public function show(Exam  $exam)
    {
        return response()->json(new Message($exam, '200', true, 'info', 'done', 'تم'));
    }

    public function update(Request $request, Exam  $exam)
    {
        $rules = [
            'student_id'=>'integer|required',
            'subject_grades_id'=>'integer|required',
            'type'=> 'string|required',
            'mark'=> 'integer|required',
        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '500', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $exam_data = [];
        if($request->has('student_id')) if(!is_null($request->student_id)) $exam_data['student_id'] = $request->student_id;
        if($request->has('subject_grades_id')) if(!is_null($request->subject_grades_id)) $exam_data['subject_grades_id'] = $request->subject_grades_id;
        if($request->has('type')) if(!is_null($request->type)) $exam_data['type'] = $request->type;
        if($request->has('mark')) if(!is_null($request->mark)) $exam_data['mark'] = $request->mark;

        try
        {
            $exam->update($exam_data);
            return response()->json(new Message( $exam, '200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }

    public function destroy(Exam  $exam)
    {
        try
        {
            $exam->delete();
            return response()->json(new Message( $exam,'200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(),'100', false, 'error', 'error', 'خطأ'));
        }
    }
}
