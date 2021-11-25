<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Staff;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Middleware\RevalidateBackHistory;

class StaffsController extends Controller
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
    public function index()
    {
        $emp = Staff::where('status', '1')->latest()->paginate(10);
        return view('staff.index-staff',compact('emp'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.add-staff');

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
            'emp_name' => ['required', 'string', 'max:255'],
            // 'emp_number' => ['required', 'string', 'max:255'],
            // 'rate' => ['required', 'string', 'max:255'],
        ]);



        $emp=new Staff();
        $emp->emp_name=request('emp_name');
        $emp->emp_number=request('emp_number');
        $emp->gender=request('gender');
        $emp->birth_date=request('birth_date');
        $emp->contact=request('contact');
        $emp->address=request('address');
        $emp->station=request('station');
        $emp->position=request('position');
        $emp->rate=request('rate');
        $emp->date_hired=request('date_hired');
        $emp->user_id=Auth::id();
        $emp->status='1';
        $emp->save();

        return redirect('/staff')->with('message', 'Record has been added successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emp =  Staff::where('id',$id)->where('status', '1')->first();
        return view('staff.view-staff',compact('emp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emp=Staff::find($id);
        return view('staff.edit-staff',compact('emp'));
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
            'emp_name' => ['required', 'string', 'max:255'],
        ]);
        $emp=Staff::find($id);
        $emp->emp_name=request('emp_name');
        $emp->emp_number=request('emp_number');
        $emp->gender=request('gender');
        $emp->birth_date=request('birth_date');
        $emp->contact=request('contact');
        $emp->address=request('address');
        $emp->station=request('station');
        $emp->position=request('position');
        $emp->rate=request('rate');
        $emp->date_hired=request('date_hired');
        $emp->user_id=Auth::id();
        $emp->save();
        return redirect('/staff')->with('message', 'Record has been updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp=Staff::find($id);
        $emp->user_id=Auth::id();
        $emp->status='0';
        $emp->save();
        return redirect('/staff')->with('message', 'Record has been deleted successfully.');
    }
}
