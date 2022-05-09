<?php

namespace App\Http\Controllers;

use App\Models\FinancialFees;
use Illuminate\Http\Request;
use App\HelperClasses\Message;
use Illuminate\Support\Facades\Validator;

class FinancialFeesController extends Controller
{
    public function index()
    {
        $financialfees = FinancialFees::get();
       // return response()->json(new Message($invoice, '200', true, 'info', 'done', 'تم'));
    }

    public function store(Request $request)
    {
        $rules = [
            'parent_id'=>'integer|required',
            'full_amount'=> 'double|required',
            'amount_received'=> 'double|required',
            'discount'=> 'double|required',
        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '200', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }


        $Financialfees_data = [];
        if($request->has('parent_id')) if(!is_null($request->parent_id)) $Financialfees_data['parent_id'] = $request->parent_id;
        if($request->has('full_amount')) if(!is_null($request->full_amount)) $Financialfees_data['full_amount'] = $request->full_amount;
        if($request->has('amount_received')) if(!is_null($request->amount_received)) $Financialfees_data['amount_received'] = $request->amount_received;
        if($request->has('discount')) if(!is_null($request->discount)) $Financialfees_data['discount'] = $request->discount;
        try
        {
            $financialfees = FinancialFees::create($Financialfees_data);
            return response()->json(new Message($financialfees, '200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }

    public function show(Financialfees  $Financialfees)
    {
        return response()->json(new Message($Financialfees, '200', true, 'info', 'done', 'تم'));
    }

    public function update(Request $request, Financialfees  $financialfees)
    {
        $rules = [
            'parent_id'=>'integer|required',
            'full_amount'=> 'double|required',
            'amount_received'=> 'double|required',
            'discount'=> 'double|required',
        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '200', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $financialfees_data = [];
        if($request->has('parent_id')) if(!is_null($request->parent_id)) $financialfees_data['parent_id'] = $request->parent_id;
        if($request->has('full_amount')) if(!is_null($request->full_amount)) $financialfees_data['full_amount'] = $request->full_amount;
        if($request->has('amount_received')) if(!is_null($request->amount_received)) $financialfees_data['amount_received'] = $request->amount_received;
        if($request->has('discount')) if(!is_null($request->discount)) $financialfees_data['discount'] = $request->discount;

        try
        {
            $financialfees->update($financialfees_data);
            return response()->json(new Message( $financialfees, '200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }

    public function destroy(Financialfees  $Financialfees)
    {
        try
        {
            $Financialfees->delete();
            return response()->json(new Message( $Financialfees,'200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(),'100', false, 'error', 'error', 'خطأ'));
        }
    }
}
