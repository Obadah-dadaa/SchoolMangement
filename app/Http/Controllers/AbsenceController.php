<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\HelperClasses\Message;
use App\Models\Absence;
use Illuminate\Support\Facades\Validator;

class AbsenceController extends Controller
{
    public function index()
    {
        $Absence = Absence::get();
        return response()->json(new Message($Absence, '200', true, 'info', 'done', 'تم'));
    }

    public function store(Request $request)
    {
        $rules = [
            'student_id'=> 'integer|required',
            'day_id'=> 'integer|required',
            'date'=> 'date|required',

        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '500', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $Absence_data = [];
        if($request->has('student_id')) if(!is_null($request->student_id)) $Absence_data['student_id'] = $request->student_id;
        if($request->has('day_id')) if(!is_null($request->day_id)) $Absence_data['day_id'] = $request->day_id;
        if($request->has('date')) if(!is_null($request->date)) $Absence_data['date'] = $request->date;


        try
        {
            $Absence = Absence::create($Absence_data);
            $Absence = $Absence->Absence()->create($Absence_data);
            return response()->json(new Message($Absence->load('Absence'), '200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }

    public function show(Absence $Absence)
    {
        return response()->json(new Message($Absence->load('Absence'), '200', true, 'info', 'done', 'تم'));
    }

    public function update(Request $request, Absence $Absence)
    {
        $rules = [
            'student_id'=> 'integer|required',
            'day_id'=> 'integer|required',
            'date'=> 'date|required',

        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '200', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $Absence_data = [];
        if($request->has('student_id')) if(!is_null($request->student_id)) $Absence_data['student_id'] = $request->student_id;
        if($request->has('day_id')) if(!is_null($request->day_id)) $Absence_data['day_id'] = $request->day_id;
        if($request->has('date')) if(!is_null($request->date)) $Absence_data['date'] = $request->date;


        try
        {
            $Absence->update($Absence_data);
            $Absence->update($Absence_data);
            return response()->json(new Message($Absence->load('Absence'),'200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }
    public function destroy(Absence $Absence)
    {
        try
        {
            $Absence->delete();
            return response()->json(new Message($Absence->load('Absence'),'200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(),'100', false, 'error', 'error', 'خطأ'));
        }
    }
}
