<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\HelperClasses\Message;
use App\Models\Grade;
use Illuminate\Support\Facades\Validator;

class GradeController extends Controller
{
    public function index()
    {
        $Grade = Grade::get();
        return response()->json(new Message($Grade, '200', true, 'info', 'done', 'تم'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name'=> 'string|required',
        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '500', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $Grade_data = [];

        if($request->has('name')) if(!is_null($request->name)) $Grade_data['name'] = $request->name;


        try
        {
            $Grade = Grade::create($Grade_data);
            $Grade = $Grade->Grade()->create($Grade_data);
            return response()->json(new Message($Grade->load('Grade'), '200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }

    public function show(Grade $Grade)
    {
        return response()->json(new Message($Grade->load('Grade'), '200', true, 'info', 'done', 'تم'));
    }

    public function update(Request $request, Grade $Grade)
    {
        $rules = [

            'name'=> 'string|required',

        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '200', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $Grade_data = [];

        if($request->has('name')) if(!is_null($request->name)) $Grade_data['name'] = $request->name;



        try
        {
            $Grade->update($Grade_data);
            $Grade->update($Grade_data);
            return response()->json(new Message($Grade->load('Grade'),'200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }
    public function destroy(Grade $Grade)
    {
        try
        {
            $Grade->delete();
            return response()->json(new Message($Grade->load('Grade'),'200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(),'100', false, 'error', 'error', 'خطأ'));
        }
    }
}
