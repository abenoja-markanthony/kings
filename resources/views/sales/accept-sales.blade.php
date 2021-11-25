@extends('layouts.app')

@section('content')
@section('page-css')
    <link href="{{ asset('css/edit-sales.css') }}" rel="stylesheet">
@endsection




<div class="container mt-4 wrap">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(Session::has('success'))
                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
            @endif

            @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
            @endif
            <div class="card p-4">

                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-10 "><h3>DAILY CASH BALANCE</h3> <h3>{{ date('M. d, Y', strtotime($date_of_sale)) }}</h3></div>
                        <div class="col-lg-2 "><a href="/daily-sales" class="btn btn-primary">BACK</a></div>
                       <input type="hidden" id="date_of_sale" value="{{ date('M. d, Y', strtotime($date_of_sale)) }}">
                       <input type="hidden" id="date_of_sale1" value="{{ $date_of_sale }}">
                    </div>
                </div>
               
                <div class="card-body ">
                    <table class="table table-bordered table-sm" id="tbl1">
                        <thead>
                            <tr>
                                <th>STATION</th>
                                <th>SALES</th>
                                <th>TABLE OUT</th>
                                <th>TOTAL</th>
                                <th>CASH IN</th>
                                <th>CASH OUT</th>
                                <th>DISBURSEMENT</th>
                                <th>NET</th>
                            </tr>
                        </thead>

                        <tbody>

                        @php
                            $expenses=0;
                            $grand_total=0;
                        @endphp
                        @foreach ($sales as $sale)
                            <tr>
                                <td>{{ $sale->station }}</td>
                                <td class="t-right">{{ c($sale->tot_in) }}</td>
                                <td class="t-right">{{ c($sale->tot_out) }}</td>
                                <td class="t-right">{{ c($sale->net_sales) }}</td>
                                @if ($sale->station=='MAIN OFFICE')
                                    <td class="t-right">{{ c($sum_additional_in) }}</td>
                                    <td class="t-right">{{ c($sum_additional_out) }}</td>
                                @else
                                    <td class="t-right">{{ c(0) }}</td>
                                    <td class="t-right">{{ c(0) }}</td>
                                @endif
                                
                                
                             
                                @switch($sale->station)
                                    @case('MAIN OFFICE')
                                        <td class="t-right">{{ c($main_office_exp) }}</td>
                                        @php  $expenses=$main_office_exp    @endphp
                                        @break
                                    @case('ARITAO')
                                        <td class="t-right">{{ c($aritao_exp) }}</td>
                                        @php  $expenses=$aritao_exp    @endphp
                                        @break
                                    @case('AMBAGUIO 1')
                                        <td class="t-right">{{ c($ambaguio1_exp) }}</td>
                                        @php  $expenses=$ambaguio1_exp    @endphp
                                        @break
                                    @case('AMBAGUIO 2')
                                        <td class="t-right">{{ c($ambaguio2_exp) }}</td>
                                        @php  $expenses=$ambaguio2_exp    @endphp
                                        @break
                                    @case('BAGABAG')
                                        <td class="t-right">{{ c($bagabag_exp) }}</td>
                                        @php  $expenses=$bagabag_exp    @endphp
                                        @break
                                    @case('BAMBANG 1')
                                        <td class="t-right">{{ c($bambang1_exp) }}</td>
                                        @php  $expenses=$bambang1_exp    @endphp
                                        @break
                                    @case('BAMBANG 2')
                                        <td class="t-right">{{ c($bambang2_exp) }}</td>
                                        @php  $expenses=$bambang2_exp    @endphp
                                        @break
                                    @case('BAYOMBONG')
                                        <td class="t-right">{{ c($bayombong_exp) }}</td>
                                        @php  $expenses=$bayombong_exp    @endphp
                                        @break
                                    @case('CASTANEDA')
                                        <td class="t-right">{{ c($castaneda_exp) }}</td>
                                        @php  $expenses=$castaneda_exp    @endphp
                                        @break
                                    @case('DIADI')
                                        <td class="t-right">{{ c($diadi_exp) }}</td>
                                        @php  $expenses=$diadi_exp    @endphp
                                        @break
                                    @case('DUPAX NORTE 1')
                                        <td class="t-right">{{ c($dupax_norte1_exp) }}</td>
                                        @php  $expenses=$dupax_norte1_exp    @endphp
                                        @break
                                    @case('DUPAX NORTE 2')
                                        <td class="t-right">{{ c($dupax_norte2_exp) }}</td>
                                        @php  $expenses=$dupax_norte2_exp    @endphp
                                        @break
                                    @case('DUPAX SUR')
                                        <td class="t-right">{{ c($dupax_sur_exp) }}</td>
                                        @php  $expenses=$dupax_sur_exp    @endphp
                                        @break
                                    @case('KAYAPA 1')
                                        <td class="t-right">{{ c($kayapa1_exp) }}</td>
                                        @php  $expenses=$kayapa1_exp    @endphp
                                        @break
                                    @case('KAYAPA 2')
                                        <td class="t-right">{{ c($kayapa2_exp) }}</td>
                                        @php  $expenses=$kayapa2_exp    @endphp
                                        @break
                                    @case('KASIBU')
                                        <td class="t-right">{{ c($kasibu_exp) }}</td>
                                        @php  $expenses=$kasibu_exp    @endphp
                                        @break
                                    @case('QUEZON')
                                        <td class="t-right">{{ c($quezon_exp) }}</td>
                                        @php  $expenses=$quezon_exp    @endphp
                                        @break
                                    @case('SOLANO')
                                        <td class="t-right">{{ c($solano_exp) }}</td>
                                        @php  $expenses=$solano_exp    @endphp
                                        @break
                                    @case('STA. FE')
                                        <td class="t-right">{{ c($sta_fe_exp) }}</td>
                                        @php  $expenses=$sta_fe_exp    @endphp
                                        @break
                                    @case('VILLAVERDE')
                                        <td class="t-right">{{ c($villaverde_exp) }}</td>
                                        @php  $expenses=$villaverde_exp    @endphp
                                        @break
                                    @default
                                        <td class="t-right">{{ c(0) }}</td>
                                        
                                @endswitch
                                @if ($sale->station=='MAIN OFFICE')
                                    <td class="t-right">{{ c(a($sale->net_sales)+a($sum_additional_in)-a($sum_additional_out)-a($expenses)) }}</td>
                                    @php
                                         $grand_total+=a($sale->net_sales)+a($sum_additional_in)-a($sum_additional_out)-a($expenses);
                                    @endphp
                                @else
                                    <td class="t-right">{{ c(a($sale->net_sales)-a($expenses)) }}</td>
                                    @php
                                         $grand_total+=a($sale->net_sales)-a($expenses);
                                    @endphp
                                @endif

                            </tr>
                            
                           
                        
                        @endforeach

                            <tr class="bg-success">
                                <td class="bg-warning">GRAND TOTAL</td>
                                <td class="t-right">{{ c($net_in) }}</td>
                                <td class="t-right bg-danger">{{ c($net_out) }}</td>
                                <td class="t-right bg-warning">{{ c($total_net) }}</td>
                                <td class="t-right bg-success">{{ c($sum_additional_in) }}</td>
                                <td class="t-right bg-danger">{{ c($sum_additional_out) }}</td>
                                <td class="t-right bg-danger">{{ c($total_exp) }}</td>
                                <td class="t-right bg-warning">{{ c($grand_total) }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>



               
            </div>
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
    function a($x){
        if ($x!='') {
            return $x;
        }else{
            $x=0;
            return $x;
        }
    }

@endphp




@endsection
