<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expenses;
use App\ExpAudit;
use Redirect;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Middleware\RevalidateBackHistory;

class ExpensesController extends Controller
{ 



    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('revalidate');
    }
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $exp_sum = Expenses::active()->sum('amount');
      
        $exp =  Expenses::active()->latest()->get();
        // $exp =  Expenses::whereBetween('e_date', ['2020-10-01', '2020-10-01'])->where('status', '1')->latest()->get();
        $to='';
        $from='';
        $search_date='';
        $station= 'ALL';
        $access_level=Auth::user()->access_level;
        $name=Auth::user()->name;
        return view('expenses.index-expenses',compact('exp','station','to','from','exp_sum','access_level','name'));

  
    }

    public function search(Request $request)
    {
        // dd(request('station'));
        $station= request('station');
        $from=request('date_from');
        $to=request('date_to');
        $access_level=Auth::user()->access_level;
        $name=Auth::user()->name;
        if($station=='ALL'){
            $exp =  Expenses::whereBetween('e_date', [$from, $to])->active()->latest()->get();
            $exp_sum = Expenses::whereBetween('e_date', [$from, $to])->active()->sum('amount');
        }else{
            $exp =  Expenses::whereBetween('e_date', [$from, $to])->active()->where('location',$station)->latest()->get();
            $exp_sum = Expenses::whereBetween('e_date', [$from, $to])->active()->where('location',$station)->sum('amount');
        }
        
            return view('expenses.index-expenses',compact('exp','station','from','to','exp_sum','access_level','name'));

        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenses.add-expenses');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
     

        $validatedData = $request->validate([
            'e_date' => ['required', 'string', 'max:255'],
            'amount' => ['required'],
        ]);


        $exp=new Expenses();
        $exp->e_date=request('e_date');
        $exp->exp_cat=request('exp_cat');
        $exp->location=request('location');
        $exp->receipt_type=request('receipt_type');
        $exp->receipt_number=request('receipt_number');
        $exp->type_of_exp=request('type_of_exp');
        $exp->amount=preg_replace("/[^0-9.]/", "",request('amount'));
        $exp->remarks=request('remarks');
        $exp->user_id=Auth::id();
        $exp->username=Auth::user()->name;
        $exp->date_encoded=date('Y-m-d');
        $exp->status=1;
        $exp->accepted=0;
        $exp->save();
      
        // return redirect('/expenses')->with('message', 'Record has been added successfully.');;
        // return redirect(url('daily-sales/'.request('e_date').'/edit'))->with('success', 'Expense has been added successfully.');
        return Redirect::back()->with('success', 'Expense has been added successfully.');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exp=Expenses::find($id);
        return view('expenses.show-expenses',compact('exp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exp=Expenses::find($id);
        return view('expenses.edit-expenses',compact('exp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'e_date' => ['required', 'string', 'max:255'],
            'receipt_number' => ['required'],
            'amount' => ['required'],
        ]);

        $exp=Expenses::find($id);

        $aud=new ExpAudit();
        $ctr=0;
        $result1 = Expenses::where('e_date',request('e_date'))->where('id',$id)->first();
        if (!$result1) {
            $aud->old_e_date=$exp->e_date; 
            $ctr++;
        }
        $result2 = Expenses::where('location',request('location'))->where('id',$id)->first();
        if (!$result2) {
            $aud->old_location=$exp->location; 
            $ctr++;
        }
         $result2 = Expenses::where('location',request('location'))->where('id',$id)->first();
        if (!$result2) {
            $aud->old_location=$exp->location; 
            $ctr++;
        }
        $result3 = Expenses::where('receipt_type',request('receipt_type'))->where('id',$id)->first();
        if (!$result3) {
            $aud->old_receipt_type=$exp->receipt_type; 
            $ctr++;
        }
        $result4 = Expenses::where('receipt_number',request('receipt_number'))->where('id',$id)->first();
        if (!$result4) {
            $aud->old_receipt_number=$exp->receipt_number; 
            $ctr++;
        }
        $result5 = Expenses::where('type_of_exp',request('type_of_exp'))->where('id',$id)->first();
        if (!$result5) {
            $aud->old_type_of_exp=$exp->type_of_exp; 
            $ctr++;
        }
        $result6 = Expenses::where('remarks',request('remarks'))->where('id',$id)->first();
        if (!$result6) {
            $aud->old_remarks=$exp->remarks; 
            $ctr++;
        }
        $result7 = Expenses::where('amount',request('amount'))->where('id',$id)->first();
        if (!$result7) {
            $aud->old_amount=$exp->amount; 
            $ctr++;
        }
        $result8 = Expenses::where('exp_cat',request('exp_cat'))->where('id',$id)->first();
        if (!$result8) {
            $aud->old_exp_cat=$exp->exp_cat; 
            $ctr++;
        }


        //SAVE OLD DATA TO EXP AUDIT
        if($ctr>0){
            $aud->exp_id=$id; 
            $aud->user_id=Auth::id();
            $aud->save();
        }

        $exp->e_date=request('e_date');
        $exp->exp_cat=request('exp_cat');
        $exp->location=request('location');
        $exp->receipt_type=request('receipt_type');
        $exp->receipt_number=request('receipt_number');
        $exp->type_of_exp=request('type_of_exp');
        $exp->remarks=request('remarks');
        $exp->amount=preg_replace("/[^0-9.]/", "",request('amount'));
        $exp->user_id=Auth::id();
        $exp->username=Auth::user()->name;
        $exp->date_encoded=date('Y-m-d');
        $exp->save();

        // return redirect(url('daily-sales/'.request('e_date').'/edit'))->with('success', 'Expense has been updated successfully.');
        return Redirect::back()->with('success', 'Expense has been updated successfully.');  

        // return redirect('/expenses')->with('message', 'Record has been updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exp=Expenses::find($id);
        $exp->user_id=Auth::id();
        $exp->username=Auth::user()->name;
        $exp->status='0';
        $exp->save();
        // return redirect('/expenses')->with('message', 'Record has been deleted successfully.');
        // return Redirect::back()->with('success', 'Expense has been deleted successfully.');  
        return Redirect::back()->with('success', 'Expense has been deleted successfully.');
    }
}
