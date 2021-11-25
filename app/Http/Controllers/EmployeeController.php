<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Auth; 
use Illuminate\Support\Facades\Validator;
use App\Http\Middleware\RevalidateBackHistory;

class EmployeeController extends Controller
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
        $emp =  Employee::active()->latest()->paginate(10);
        return view('employee.index-employees',compact('emp'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.add-employee');

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
            'emp_number' => ['required', 'string', 'max:255'],
            'rate' => ['required', 'string', 'max:255'],
        ]);



        $emp=new Employee();
        $emp->emp_name=request('emp_name');
        $emp->emp_number=request('emp_number');
        $emp->gender=request('gender');
        $emp->birth_date=request('birth_date');
        $emp->contact=request('contact');
        $emp->address=request('address');
        $emp->station=request('station');
        $emp->position=request('position');
        $emp->wage_type=request('wage_type');
        $emp->rate=request('rate');
        $emp->commida=request('commida');
        $emp->transpo=request('transpo');
        $emp->date_hired=request('date_hired');
        $emp->user_id=Auth::id();
        $emp->status='1';
        $emp->save();

        return redirect('/employee')->with('message', 'Record has been added successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emp =  Employee::where('id',$id)->active()->first();
        return view('employee.view-employee',compact('emp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emp=Employee::find($id);
        return view('employee.edit-employee',compact('emp'));
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
            'rate' => ['required', 'string', 'max:255'],
        ]);
        $emp=Employee::find($id);
        $emp->emp_name=request('emp_name');
        $emp->emp_number=request('emp_number');
        $emp->gender=request('gender');
        $emp->birth_date=request('birth_date');
        $emp->contact=request('contact');
        $emp->address=request('address');
        $emp->station=request('station');
        $emp->position=request('position');
        $emp->wage_type=request('wage_type');
        $emp->rate=request('rate');
        $emp->commida=request('commida');
        $emp->transpo=request('transpo');
        $emp->date_hired=request('date_hired');
        $emp->user_id=Auth::id();
        $emp->save();
        return redirect('/employee')->with('message', 'Record has been updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp=Employee::find($id);
        $emp->user_id=Auth::id();
        $emp->status='0';
        $emp->save();
        return redirect('/employee')->with('message', 'Record has been deleted successfully.');
    }
}
