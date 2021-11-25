<?php

namespace App\Http\Controllers;

use App\DailySale; 
use App\PreSale;
use App\Sale;
use App\PreSaleAdmin;
use Illuminate\Http\Request;
use App\Expenses;
use DB;
use Auth;
use Redirect;
use App\AdditionalExpRec;
use App\DailyCollectionSummary;
use App\Employee;
use App\Payroll;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request('month')){
            $year=request('year');
            $month=request('month');
            $month_name= date("F", mktime(0, 0, 0, $month, 1));
        }else{
            $year=date('Y');
            $month=date('m');
            $month_name=date('F');
        }
        
        $pay =  Payroll::where('status', '1') ->select('period_from','period_to')->distinct()
       ->latest()->get();
       
        return view('payroll.index-payroll',compact('pay','month','month_name','year'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $emp =  Employee::active()->latest()->get();

        foreach ($emp as $emps) {

            $pay=new Payroll();
            $pay->period_from=request('period_from');
            $pay->period_to=request('period_to');
            $pay->emp_id=$emps->id;
            $pay->rate=preg_replace("/[^0-9.]/", "",$emps->rate);
            $pay->user_id=Auth::id();
            $pay->username=Auth::user()->name;
            $pay->save();
        }

        return redirect('/payroll')->with('success', 'Payroll period has been added.');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($from,$to,$station)
    {
        $sttn =  Employee::where('status', '1')->select('station as station_dd')->distinct()->orderBy('station','asc')->get();

        if($station=='ALL'){
            $pay = DB::table('payroll_cutoff')
                ->leftJoin('employee', 'employee.id', '=', 'payroll_cutoff.emp_id')
                ->where('payroll_cutoff.status','=','1')
                ->where('employee.status','=','1')
                ->where('employee.wage_type','!=','FIXED RATE')
                ->where('payroll_cutoff.period_from',$from)
                ->where('payroll_cutoff.period_to',$to)
                ->select('employee.id as emp_id','employee.emp_name','employee.station','employee.position','employee.wage_type','payroll_cutoff.*')
                ->get();
        }else{
            $pay = DB::table('payroll_cutoff')
                ->leftJoin('employee', 'employee.id', '=', 'payroll_cutoff.emp_id')
                ->where('payroll_cutoff.status','=','1')
                ->where('employee.status','=','1')
                ->where('employee.wage_type','!=','FIXED RATE')
                ->where('payroll_cutoff.period_from',$from)
                ->where('payroll_cutoff.period_to',$to)
                ->where('employee.station',$station)
                ->select('employee.id as emp_id','employee.emp_name','employee.station','employee.position','employee.wage_type','payroll_cutoff.*')
                ->get();
        }

     

        
            return view('payroll.edit-payroll',compact('pay','from','to','station','sttn'));
        }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,$rate,$days,$absent,$adjustment)
    {
        $pay=Payroll::find($id);
        $pay->rate=preg_replace("/[^0-9.]/", "",$rate);
        $pay->days=preg_replace("/[^0-9.]/", "",$days);
        $pay->absent=preg_replace("/[^0-9.]/", "",$absent);
        $pay->adjustment=preg_replace("/[^0-9.]/", "",$adjustment);
        $pay->user_id=Auth::id();
        $pay->username=Auth::user()->name;
        $pay->save();
        return Redirect::back()->with('success', 'Record has been updated successfully.');  
    }

    public function accept(Request $request)
    {
        Payroll::where('period_from',request('from'))->where('period_to',request('to'))->update(['accepted' => 1]);

        return Redirect::back()->with('success', 'Record has been accepted successfully.');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($from,$to)
    {
        Payroll::where('period_from',$from)->where('period_to',$to)->update(['status' => 0]);
        return Redirect::back()->with('success', 'Payroll cutoff has been deleted successfully.');  
       
    }
}
