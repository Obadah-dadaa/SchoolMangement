<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\HelperClasses\Message;
use App\Models\Section;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\CrudOperationBindable;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::get();
//        return response()->json(new Message($Section, '200', true, 'info', 'done', 'تم'));
        return view('index',compact('sections'));

    }

    public function store(Request $request)
    {
        $rules = [
            'grade_id'=> 'integer|required',
        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '500', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $Section_data = [];

        if($request->has('grade_id')) if(!is_null($request->grade_id)) $Section_data['grade_id'] = $request->grade_id;


        try
        {
            $Section = Section::create($Section_data);
            $Section = $Section->Section()->create($Section_data);
            return response()->json(new Message($Section->load('Section'), '200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }

    public function show(Section $Section)
    {
        return response()->json(new Message($Section->load('Section'), '200', true, 'info', 'done', 'تم'));
    }

    public function update(Request $request, Section $Section)
    {
        $rules = [

            'grade_id'=> 'integer|required',

        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '200', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $Section_data = [];

        if($request->has('grade_id')) if(!is_null($request->grade_id)) $Section_data['grade_id'] = $request->grade_id;



        try
        {
            $Section->update($Section_data);
            $Section->update($Section_data);
            return response()->json(new Message($Section->load('Section'),'200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }
    public function destroy(Section $Section)
    {
        try
        {
            $Section->delete();
            return response()->json(new Message($Section->load('Section'),'200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(),'100', false, 'error', 'error', 'خطأ'));
        }
    }
}
