<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\HelperClasses\Message;
use App\Models\Schedule;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{
    public function index()
    {
        $Schedule = Schedule::get();
        return response()->json(new Message($Schedule, '200', true, 'info', 'done', 'تم'));
    }

    public function store(Request $request)
    {
        $rules = [
            'section_id'=> 'integer|required',
            'teacher_subject_id'=> 'integer|required',
            'day_id'=> 'integer|required',
            'date'=> 'date|required',
        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '500', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $Schedule_data = [];

        if($request->has('section_id')) if(!is_null($request->section_id)) $Schedule_data['section_id'] = $request->section_id;
        if($request->has('teacher_subject_id')) if(!is_null($request->teacher_subject_id)) $Schedule_data['teacher_subject_id'] = $request->teacher_subject_id;
        if($request->has('day_id')) if(!is_null($request->day_id)) $Schedule_data['day_id'] = $request->day_id;
        if($request->has('date')) if(!is_null($request->date)) $Schedule_data['date'] = $request->date;


        try
        {
            $Schedule = Schedule::create($Schedule_data);
            $Schedule = $Schedule->Schedule()->create($Schedule_data);
            return response()->json(new Message($Schedule->load('Schedule'), '200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }

    public function show(Schedule $Schedule)
    {
        return response()->json(new Message($Schedule->load('Schedule'), '500', true, 'info', 'done', 'تم'));
    }

    public function update(Request $request, Schedule $Schedule)
    {
        $rules = [

            'section_id'=> 'integer|required',
            'teacher_subject_id'=> 'integer|required',
            'day_id'=> 'integer|required',
            'date'=> 'date|required',
        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '500', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $Schedule_data = [];

        if($request->has('section_id')) if(!is_null($request->section_id)) $Schedule_data['section_id'] = $request->section_id;
        if($request->has('teacher_subject_id')) if(!is_null($request->teacher_subject_id)) $Schedule_data['teacher_subject_id'] = $request->teacher_subject_id;
        if($request->has('day_id')) if(!is_null($request->day_id)) $Schedule_data['day_id'] = $request->day_id;
        if($request->has('date')) if(!is_null($request->date)) $Schedule_data['date'] = $request->date;




        try
        {
            $Schedule->update($Schedule_data);
            $Schedule->update($Schedule_data);
            return response()->json(new Message($Schedule->load('Schedule'),'200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }
    public function destroy(Schedule $Schedule)
    {
        try
        {
            $Schedule->delete();
            return response()->json(new Message($Schedule->load('Schedule'),'200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(),'100', false, 'error', 'error', 'خطأ'));
        }
    }
}
