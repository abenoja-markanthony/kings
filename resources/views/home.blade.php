@extends('layouts.app')
@section('page-css')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
<div id="wrapper">
    @if(Session::has('success'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
    @endif
    <ul>
        @if (Auth::user()->access_level=="Admin" OR Auth::user()->access_level=="User 1"  OR Auth::user()->access_level=="User 2")

            <li>
                <a class="nav-link" href="{{ route('expenses.index') }}">
                    <i class="fa fa-money" aria-hidden="true"></i>    
                </a>
                <p>DISBURSEMENT</p>
            </li>
            <li>
                <a class="nav-link" href="{{ route('employee.index') }}">
                    <i class="fa fa-user" aria-hidden="true"></i>     
                </a>
                <p>EMPLOYEES RECORDS</p>
            </li>
        @endif
        
       
            {{-- <li>
                <a class="nav-link" href="{{ route('receipt') }}">
                    <i class="fa fa-list" aria-hidden="true"></i>     
                </a>
                <p>RECEIPTS</p>
            </li> --}}

           
            <li>
                
                <a class="nav-link" href="{{ route('daily-sales') }}">
                    <i class="fa fa-file" aria-hidden="true"></i>     
                </a>
                <p>DAILY SALES</p>
            </li>
            {{-- <li>
                <a class="nav-link" href="{{ route('report') }}">
                    <i class="fa fa-file" aria-hidden="true"></i>     
                </a>
                <p>REPORTS</p>
            </li> --}}


    </ul>

 </div>

 <div class="row" id="footer">
  
    <p>&#169; 2020 Kings. All rights reserved</p>
  </div>
@endsection
