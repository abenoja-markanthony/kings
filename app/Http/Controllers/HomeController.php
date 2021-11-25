<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\RevalidateBackHistory;
use Auth;
use Hash;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('revalidate');
    }

    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function rename()
    {
        Schema::rename('tbl_sample', 'tbl_final');
        return('Rename Complete');
    }

    public function changepass()
    {
        return view('Auth.change_pass');
    }

    public function updatepass(Request $request)
    {
        if(!Hash::check(request('current_pass'), Auth::user()->password)){
            return back()->with('error','Your current password does not match.');
        }
        if(strcmp(request('current_pass'), request('password'))==0){
            return back()->with('error','Your current password cannot be the same with your new password.');
        }
        $request->validate([
            'current_pass'=>'required',
            'password' => ['required', 'string', 'min:6', 'confirmed'],

        ]);

        $user=Auth::user();

        $user->password=Hash::make(request('password'));
        $user->save();
        return back()->with('success','Your password has been updated succesfully.');

    }

   
}
