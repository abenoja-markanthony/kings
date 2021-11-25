<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Attendance;
use App\Attendance_list;
use Redirect;
use Auth;
use DB;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $date = Carbon::now()->format('Y-m-d');
        $pay = DB::table('attendance')
            ->join('employee', 'attendance.emp_id', '=', 'employee.id')
            ->where('attendance.status','=','1')
            ->orderBy('employee.department','asc')
            ->orderBy('employee.emp_name','asc')
            ->get();
            
        return view('attendance.index-attendance',compact('pay','date'));
       
       
    }

    public function list(Request $request) 
    {
        $date = Carbon::now()->format('Y-m-d');
        $pay = DB::table('attendance_list')
            ->join('employee', 'attendance_list.emp_id', '=', 'employee.id')
            ->where('attendance_list.status','=','1')
            ->orderBy('employee.department','asc')
            ->orderBy('employee.id','asc')
            ->get();
            
        return view('attendance.list-attendance',compact('pay','date'));
       
       
    }

    public function report(Request $request) 
    {
        $from=request('from');
        $to=request('to');
        $month = date("m",strtotime($mydate));
        $date = Carbon::now()->format('Y-m-d');
        
        $pay = DB::table('attendance')
            ->join('employee', 'attendance.emp_id', '=', 'employee.id')
            ->where('attendance.status','=','1')
            ->whereBetween('e_date', [$from, $to])
            ->orderBy('employee.department','asc')
            ->orderBy('employee.emp_name','asc')
            ->get();
            
        return view('attendance.index-attendance',compact('pay','date'));
       
       
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = Carbon::now()->format('Y-m-d');
        $emp =  Employee::active()->latest()->get();
        $pay = DB::table('attendance')
            ->join('employee', 'attendance.emp_id', '=', 'employee.id')
            ->where('attendance.status','=','1')
            ->select('employee.department','employee.station', 'employee.emp_name','employee.id','attendance.id')
            ->orderBy('employee.department','asc')
            ->get();
            
        return view('attendance.add-attendance',compact('emp','pay','date'));
    }

    /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->input('attendance')<1){
            return Redirect::back()->with('error', 'Please select atleast 1 employee!'); 
        }else{
            for ($i = 0; $i < count($request->input('attendance')); $i++) {
                $day= substr(request('date_of_absent'), 8, 2);
                $month= substr(request('date_of_absent'), 5, 2);
                $year= substr(request('date_of_absent'), 0 ,4);

                $pay=new Attendance();
                $check_id=Attendance::where('emp_id',request('attendance')[$i])->where('month',$month)->where('year',$year)->first();
                
                if(!$check_id){
                    $pay->emp_id=request('attendance')[$i];
                    $pay->month=$month;
                    $pay->year=$year;
                    $pay->{'d'.$day}='1';
                    $pay->user_id=Auth::id();
                    $pay->username=Auth::user()->name;
                    $pay->status=1;
                    $pay->accepted=0;
                    $pay->save(); 
                }else{
                   
                    $check_id->{'d'.$day}='1';
                    $check_id->user_id=Auth::id();
                    $check_id->username=Auth::user()->name;
                    $check_id->save(); 
                }
                // SAVE TO DB 
                    $pay_1=new Attendance_list();
                    $check_id1=Attendance_list::where('emp_id',request('attendance')[$i])->where('date_of_absent',request('date_of_absent'))->first();
                    if(!$check_id1){
                        $pay_1->emp_id=request('attendance')[$i];
                        $pay_1->date_of_absent=request('date_of_absent');
                        $pay_1->user_id=Auth::id();
                        $pay_1->username=Auth::user()->name;
                        $pay_1->status=1;
                        $pay_1->accepted=0;
                        $pay_1->save(); 
                    }

                   

            }
        
                return Redirect::back()->with('success', 'Attendance has been recorded successfully.');   
        }
        

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
    public function edit($id)
    {
        //
    } 

    /**
    * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if($request->input('attendance')<1){
            return Redirect::back()->with('error', 'Please select atleast 1 employee!'); 
        }else{
            for ($i = 0; $i < count($request->input('attendance')); $i++) {
                $pay = Attendance::find(request('attendance')[$i])->delete();
            }
    
            return Redirect::back()->with('delete', 'Attendance has been deleted successfully.');   
        }
      
    }

}