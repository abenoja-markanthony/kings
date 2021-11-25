@extends('layouts.app')
@section('page-css')
    <link href="{{ asset('css/manager_exp.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="fluid mt-4">
    

    <div class="row justify-content-center mb-4">
        <div class="col-md-8" style="background-color: #fff">
            <div class="col-lg-12 text-center mt-4">
                @php
                    $monthNum  = $month;
                    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                    $monthName = $dateObj->format('F'); // March
                    $monthName1 = $dateObj->format('M'); // March
                @endphp 

                <div class="row">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6">
                        {{-- <img src="{{ asset('images/kings.png') }}" alt="Company Logo" class="logo" width="150px"> --}}
                        <h5>{{ $manager }} EXPENSES REPORT</h5>
                        <h5>{{ $monthName." ".$year }}</h5>
                    </div>
                    <div class="col-lg-3">
                        <form action="{{ route('PDF-manager-exp-report') }}" method="GET">
                            <input type="hidden" name="month" value="{{ $month }}">
                            <input type="hidden" name="year" value="{{ $year }}">
                            <input type="hidden" name="manager" value="{{ $manager }}">
                            <input type="submit" value="Convert to PDF">
                        </form>
                    </div>
                </div>
    
                
            </div>

            <table id="dcb" class="mb-4">
                <thead>
                    <tr id="head" class="text-center">
                        <th>Date</th>
                        <th>Type of Expense</th>
                        <th >Amount</th>
                    </tr>
                </thead>

                <tbody id="body">
                    @if ($exp->count()<1)
                        <tr>
                            <td colspan="3">No results found.</td>
                        </tr>
                    @endif
                
                @foreach ($exp as $exps)

                    <tr>
                       
                        <td>{{ date('M. d, Y', strtotime($exps->e_date)) }}</td>
                        <td>{{ $exps->type_of_exp }}</td>
                        <td>{{ c($exps->amount) }}</td>
                    </tr>

                @endforeach

                <tr id="total">
                    <td colspan="2">TOTAL</td>
                    <td>{{c( $total) }}</td>
                </tr>
                </tbody>
            </table>


        </div>
    </div>
</div>


@php
     function c($x){
        if ($x!='') {
           $x=number_format($x,2);
            return $x;
        }else{
            return $x;
        }
    }
@endphp
@endsection
