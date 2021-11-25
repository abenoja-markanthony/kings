@extends('layouts.app')
@section('page-css')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
<div id="wrapper">
    <ul>
        @if (Auth::user()->access_level=="Admin" OR Auth::user()->access_level=="User 1"  OR Auth::user()->access_level=="User 2")

            <li>
                <a class="nav-link" href="{{ route('gen-monthly-sales-report') }}">
                    <i class="fas fa-poll-h" aria-hidden="true"></i>    
                </a>
                <p>MONTHLY SALES REPORT</p>
            </li>
            <li>
                <a class="nav-link" href="{{ route('gen-station-expenses-report') }}">
                    <i class="fas fa-receipt"  aria-hidden="true"></i>   
                </a>
                <p>MONTHLY STATION DISBURSEMENT REPORT</p><i class="fi-results"></i>
            </li>
        @endif
        
       
            <li>
                <a class="nav-link" href="{{ route('monthly-exp-summary') }}">
                    <i class="fa fa-list" aria-hidden="true"></i>     
                </a>
                <p>MONTHLY DISBURSEMENT SUMMARY</p>
            </li>

           
            <li>
                <a class="nav-link" href="{{ route('gen-gm-exp') }}">
                    <i class="fa fa-file" aria-hidden="true"></i>     
                </a>
                <p>MANAGERS EXPENSES</p>
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
      <center><p>&#169; 2020 Kings. All rights reserved</p></center>
  </div>
@endsection
