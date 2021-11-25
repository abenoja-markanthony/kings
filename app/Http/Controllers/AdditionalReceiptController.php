<?php

namespace App\Http\Controllers;

use App\AdditionalExpRec;
use Illuminate\Http\Request;
use Redirect;
use Auth;
class AdditionalReceiptController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rec=new AdditionalExpRec();
        $rec->date_encoded=date('Y-m-d');
        $rec->station=request('station');
        $rec->receipt_no=request('receipt_no');
        $rec->date_of_receipt=request('date_of_receipt');
        $rec->cash_in=preg_replace("/[^0-9.]/", "",request('cash_in'));
        $rec->cash_out=preg_replace("/[^0-9.]/", "",request('cash_out'));
        $rec->remarks=request('remarks');
        $rec->status=1;
        $rec->user_id=Auth::id();
        $rec->username=Auth::user()->name;
        $rec->save();
        return Redirect::back()->with('success', 'Record has been added successfully.');   

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$date_of_receipt)
    {
        $exp=AdditionalExpRec::find($id);
        $exp->user_id=Auth::id();
        $exp->username=Auth::user()->name;
        $exp->status='0';
        $exp->save();
        return Redirect::back()->with('success', 'Record has been deleted successfully.');   
    }
}
