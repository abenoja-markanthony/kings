@extends('layouts.app')

@section('content')
@section('page-css')
    <link href="{{ asset('css/expenses.css') }}" rel="stylesheet">
@endsection


<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            <div class="card p-4">

                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6 "><h3>DAILY CASH BALANCE</h3> <p class="text-primary"><b>CASH BALANCE :  {{ c($cashonhand) }}</b> </p>  </div>
                        <div class="col-lg-6 text-right">
                            <h3> {{ date('M. d, Y', strtotime($search_date)) }}</h3> 
                            <form action="{{ route('PDF-dcb-report') }}" method="GET">
                                @csrf
                                    <input type="hidden" name="search_date" value="{{ $search_date }}">
                                    <input type="submit" value="Convert to PDF">
                            </form>
                        </div>
                    </div>

                            
                   
                </div>

                <div class="card-body ">
                    <table class="table table-bordered table-sm" id="tbl1">
                        <thead>
                            <tr>
                                <th>STATION</th>
                                <th>SALES</th>
                                <th>TABLE OUT</th>
                                <th>CASH IN</th>
                                <th>CASH OUT</th>
                                <th>TOTAL</th>
                                <th>DISBURSMENT</th>
                                <th>NET</th>
                            </tr>
                        </thead>

                        <tbody>

                                <tr>
                                    <td>MAIN OFFICE</td>
                                    <td>{{ c($main_office_tot_in) }}</td>
                                    <td>{{ c($main_office_tot_out) }}</td>
                                    <td>{{ c($main_office_tot_cashin) }}</td>
                                    <td>{{ c($main_office_tot_others) }}</td>
                                    <td>{{ c(a($main_office_tot_in)+a($main_office_tot_cashin)-a($main_office_tot_out)-a($main_office_tot_others)) }}</td>
                                    <td>{{ c($main_office_exp) }}</td>
                                    <td>{{ c(a($main_office_tot_in)+a($main_office_tot_cashin)-a($main_office_exp)-a($main_office_tot_out)-a($main_office_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>ARITAO</td>
                                    <td>{{ c($aritao_tot_in) }}</td>
                                    <td>{{ c($aritao_tot_out) }}</td>
                                    <td>{{ c($aritao_tot_cashin) }}</td>
                                    <td>{{ c($aritao_tot_others) }}</td>
                                    <td>{{ c(a($aritao_tot_in)+a($aritao_tot_cashin)-a($aritao_tot_out)-a($aritao_tot_others)) }}</td>
                                    <td>{{ c($aritao_exp) }}</td>
                                    <td>{{ c(a($aritao_tot_in)+a($aritao_tot_cashin)-a($aritao_exp)-a($aritao_tot_out)-a($aritao_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>AMBAGUIO 1</td>
                                    <td>{{ c($ambaguio1_tot_in) }}</td>
                                    <td>{{ c($ambaguio1_tot_out) }}</td>
                                    <td>{{ c($ambaguio1_tot_cashin) }}</td>
                                    <td>{{ c($ambaguio1_tot_others) }}</td>
                                    <td>{{ c(a($ambaguio1_tot_in)+a($ambaguio1_tot_cashin)-a($ambaguio1_tot_out)-a($ambaguio1_tot_others)) }}</td>
                                    <td>{{ c($ambaguio1_exp) }}</td>
                                    <td>{{ c(a($ambaguio1_tot_in)+a($ambaguio1_tot_cashin)-a($ambaguio1_exp)-a($ambaguio1_tot_out)-a($ambaguio1_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>AMBAGUIO 2</td>
                                    <td>{{ c($ambaguio2_tot_in) }}</td>
                                    <td>{{ c($ambaguio2_tot_out) }}</td>
                                    <td>{{ c($ambaguio2_tot_cashin) }}</td>
                                    <td>{{ c($ambaguio2_tot_others) }}</td>
                                    <td>{{ c(a($ambaguio2_tot_in)+a($ambaguio2_tot_cashin)-a($ambaguio2_tot_out)-a($ambaguio2_tot_others)) }}</td>
                                    <td>{{ c($ambaguio2_exp) }}</td>
                                    <td>{{ c(a($ambaguio2_tot_in)+a($ambaguio2_tot_cashin)-a($ambaguio2_exp)-a($ambaguio2_tot_out)-a($ambaguio2_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>BAGABAG</td>
                                    <td>{{ c($bagabag_tot_in) }}</td>
                                    <td>{{ c($bagabag_tot_out) }}</td>
                                    <td>{{ c($bagabag_tot_cashin) }}</td>
                                    <td>{{ c($bagabag_tot_others) }}</td>
                                    <td>{{ c(a($bagabag_tot_in)+a($bagabag_tot_cashin)-a($bagabag_tot_out)-a($bagabag_tot_others)) }}</td>
                                    <td>{{ c($bagabag_exp) }}</td>
                                    <td>{{ c(a($bagabag_tot_in)+a($bagabag_tot_cashin)-a($bagabag_exp)-a($bagabag_tot_out)-a($bagabag_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>BAMBANG 1</td>
                                    <td>{{ c($bambang1_tot_in) }}</td>
                                    <td>{{ c($bambang1_tot_out) }}</td>
                                    <td>{{ c($bambang1_tot_cashin) }}</td>
                                    <td>{{ c($bambang1_tot_others) }}</td>
                                    <td>{{ c(a($bambang1_tot_in)+a($bambang1_tot_cashin)-a($bambang1_tot_out)-a($bambang1_tot_others)) }}</td>
                                    <td>{{ c($bambang1_exp) }}</td>
                                    <td>{{ c(a($bambang1_tot_in)+a($bambang1_tot_cashin)-a($bambang1_exp)-a($bambang1_tot_out)-a($bambang1_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>BAMBANG 2</td>
                                    <td>{{ c($bambang2_tot_in) }}</td>
                                    <td>{{ c($bambang2_tot_out) }}</td>
                                    <td>{{ c($bambang2_tot_cashin) }}</td>
                                    <td>{{ c($bambang2_tot_others) }}</td>
                                    <td>{{ c(a($bambang2_tot_in)+a($bambang2_tot_cashin)-a($bambang2_tot_out)-a($bambang2_tot_others)) }}</td>
                                    <td>{{ c($bambang2_exp) }}</td>
                                    <td>{{ c(a($bambang2_tot_in)+a($bambang2_tot_cashin)-a($bambang2_exp)-a($bambang2_tot_out)-a($bambang2_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>BOYOMBONG</td>
                                    <td>{{ c($bayombong_tot_in) }}</td>
                                    <td>{{ c($bayombong_tot_out) }}</td>
                                    <td>{{ c($bayombong_tot_cashin) }}</td>
                                    <td>{{ c($bayombong_tot_others) }}</td>
                                    <td>{{ c(a($bayombong_tot_in)+a($bayombong_tot_cashin)-a($bayombong_tot_out)-a($bayombong_tot_others)) }}</td>
                                    <td>{{ c($bayombong_exp) }}</td>
                                    <td>{{ c(a($bayombong_tot_in)+a($bayombong_tot_cashin)-a($bayombong_exp)-a($bayombong_tot_out)-a($bayombong_tot_others)) }}</td>
                                </tr>


                                <tr>
                                    <td>CASTANEDA</td>
                                    <td>{{ c($castaneda_tot_in) }}</td>
                                    <td>{{ c($castaneda_tot_out) }}</td>
                                    <td>{{ c($castaneda_tot_cashin) }}</td>
                                    <td>{{ c($castaneda_tot_others) }}</td>
                                    <td>{{ c(a($castaneda_tot_in)+a($castaneda_tot_cashin)-a($castaneda_tot_out)-a($castaneda_tot_others)) }}</td>
                                    <td>{{ c($castaneda_exp) }}</td>
                                    <td>{{ c(a($castaneda_tot_in)+a($castaneda_tot_cashin)-a($castaneda_exp)-a($castaneda_tot_out)-a($castaneda_tot_others)) }}</td>
                                </tr>


                                <tr>
                                    <td>DIADI</td>
                                    <td>{{ c($diadi_tot_in) }}</td>
                                    <td>{{ c($diadi_tot_out) }}</td>
                                    <td>{{ c($diadi_tot_cashin) }}</td>
                                    <td>{{ c($diadi_tot_others) }}</td>
                                    <td>{{ c(a($diadi_tot_in)+a($diadi_tot_cashin)-a($diadi_tot_out)-a($diadi_tot_others)) }}</td>
                                    <td>{{ c($diadi_exp) }}</td>
                                    <td>{{ c(a($diadi_tot_in)+a($diadi_tot_cashin)-a($diadi_exp)-a($diadi_tot_out)-a($diadi_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>DUPAX NORTE 1</td>
                                    <td>{{ c($dupax_norte1_tot_in) }}</td>
                                    <td>{{ c($dupax_norte1_tot_out) }}</td>
                                    <td>{{ c($dupax_norte1_tot_cashin) }}</td>
                                    <td>{{ c($dupax_norte1_tot_others) }}</td>
                                    <td>{{ c(a($dupax_norte1_tot_in)+a($dupax_norte1_tot_cashin)-a($dupax_norte1_tot_out)-a($dupax_norte1_tot_others)) }}</td>
                                    <td>{{ c($dupax_norte1_exp) }}</td>
                                    <td>{{ c(a($dupax_norte1_tot_in)+a($dupax_norte1_tot_cashin)-a($dupax_norte1_exp)-a($dupax_norte1_tot_out)-a($dupax_norte1_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>DUPAX NORTE 2</td>
                                    <td>{{ c($dupax_norte2_tot_in) }}</td>
                                    <td>{{ c($dupax_norte2_tot_out) }}</td>
                                    <td>{{ c($dupax_norte2_tot_cashin) }}</td>
                                    <td>{{ c($dupax_norte2_tot_others) }}</td>
                                    <td>{{ c(a($dupax_norte2_tot_in)+a($dupax_norte2_tot_cashin)-a($dupax_norte2_tot_out)-a($dupax_norte2_tot_others)) }}</td>
                                    <td>{{ c($dupax_norte2_exp) }}</td>
                                    <td>{{ c(a($dupax_norte2_tot_in)+a($dupax_norte2_tot_cashin)-a($dupax_norte2_exp)-a($dupax_norte2_tot_out)-a($dupax_norte2_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>DUPAX SUR</td>
                                    <td>{{ c($dupax_sur_tot_in) }}</td>
                                    <td>{{ c($dupax_sur_tot_out) }}</td>
                                    <td>{{ c($dupax_sur_tot_cashin) }}</td>
                                    <td>{{ c($dupax_sur_tot_others) }}</td>
                                    <td>{{ c(a($dupax_sur_tot_in)+a($dupax_sur_tot_cashin)-a($dupax_sur_tot_out)-a($dupax_sur_tot_others)) }}</td>
                                    <td>{{ c($dupax_sur_exp) }}</td>
                                    <td>{{ c(a($dupax_sur_tot_in)+a($dupax_sur_tot_cashin)-a($dupax_sur_exp)-a($dupax_sur_tot_out)-a($dupax_sur_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>KAYAPA 1</td>
                                    <td>{{ c($kayapa1_tot_in) }}</td>
                                    <td>{{ c($kayapa1_tot_out) }}</td>
                                    <td>{{ c($kayapa1_tot_cashin) }}</td>
                                    <td>{{ c($kayapa1_tot_others) }}</td>
                                    <td>{{ c(a($kayapa1_tot_in)+a($kayapa1_tot_cashin)-a($kayapa1_tot_out)-a($kayapa1_tot_others)) }}</td>
                                    <td>{{ c($kayapa1_exp) }}</td>
                                    <td>{{ c(a($kayapa1_tot_in)+a($kayapa1_tot_cashin)-a($kayapa1_exp)-a($kayapa1_tot_out)-a($kayapa1_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>KAYAPA 2</td>
                                    <td>{{ c($kayapa2_tot_in) }}</td>
                                    <td>{{ c($kayapa2_tot_out) }}</td>
                                    <td>{{ c($kayapa2_tot_cashin) }}</td>
                                    <td>{{ c($kayapa2_tot_others) }}</td>
                                    <td>{{ c(a($kayapa2_tot_in)+a($kayapa2_tot_cashin)-a($kayapa2_tot_out)-a($kayapa2_tot_others)) }}</td>
                                    <td>{{ c($kayapa2_exp) }}</td>
                                    <td>{{ c(a($kayapa2_tot_in)+a($kayapa2_tot_cashin)-a($kayapa2_exp)-a($kayapa2_tot_out)-a($kayapa2_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>KASIBU</td>
                                    <td>{{ c($kasibu_tot_in) }}</td>
                                    <td>{{ c($kasibu_tot_out) }}</td>
                                    <td>{{ c($kasibu_tot_cashin) }}</td>
                                    <td>{{ c($kasibu_tot_others) }}</td>
                                    <td>{{ c(a($kasibu_tot_in)+a($kasibu_tot_cashin)-a($kasibu_tot_out)-a($kasibu_tot_others)) }}</td>
                                    <td>{{ c($kasibu_exp) }}</td>
                                    <td>{{ c(a($kasibu_tot_in)+a($kasibu_tot_cashin)-a($kasibu_exp)-a($kasibu_tot_out)-a($kasibu_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>QUEZON</td>
                                    <td>{{ c($quezon_tot_in) }}</td>
                                    <td>{{ c($quezon_tot_out) }}</td>
                                    <td>{{ c($quezon_tot_cashin) }}</td>
                                    <td>{{ c($quezon_tot_others) }}</td>
                                    <td>{{ c(a($quezon_tot_in)+a($quezon_tot_cashin)-a($quezon_tot_out)-a($quezon_tot_others)) }}</td>
                                    <td>{{ c($quezon_exp) }}</td>
                                    <td>{{ c(a($quezon_tot_in)+a($quezon_tot_cashin)-a($quezon_exp)-a($quezon_tot_out)-a($quezon_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>SOLANO 1</td>
                                    <td>{{ c($solano1_tot_in) }}</td>
                                    <td>{{ c($solano1_tot_out) }}</td>
                                    <td>{{ c($solano1_tot_cashin) }}</td>
                                    <td>{{ c($solano1_tot_others) }}</td>
                                    <td>{{ c(a($solano1_tot_in)+a($solano1_tot_cashin)-a($solano1_tot_out)-a($solano1_tot_others)) }}</td>
                                    <td>{{ c($solano1_exp) }}</td>
                                    <td>{{ c(a($solano1_tot_in)+a($solano1_tot_cashin)-a($solano1_exp)-a($solano1_tot_out)-a($solano1_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>SOLANO 2</td>
                                    <td>{{ c($solano2_tot_in) }}</td>
                                    <td>{{ c($solano2_tot_out) }}</td>
                                    <td>{{ c($solano2_tot_cashin) }}</td>
                                    <td>{{ c($solano2_tot_others) }}</td>
                                    <td>{{ c(a($solano2_tot_in)+a($solano2_tot_cashin)-a($solano2_tot_out)-a($solano2_tot_others)) }}</td>
                                    <td>{{ c($solano2_exp) }}</td>
                                    <td>{{ c(a($solano2_tot_in)+a($solano2_tot_cashin)-a($solano2_exp)-a($solano2_tot_out)-a($solano2_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>STA. FE</td>
                                    <td>{{ c($sta_fe_tot_in) }}</td>
                                    <td>{{ c($sta_fe_tot_out) }}</td>
                                    <td>{{ c($sta_fe_tot_cashin) }}</td>
                                    <td>{{ c($sta_fe_tot_others) }}</td>
                                    <td>{{ c(a($sta_fe_tot_in)+a($sta_fe_tot_cashin)-a($sta_fe_tot_out)-a($sta_fe_tot_others)) }}</td>
                                    <td>{{ c($sta_fe_exp) }}</td>
                                    <td>{{ c(a($sta_fe_tot_in)+a($sta_fe_tot_cashin)-a($sta_fe_exp)-a($sta_fe_tot_out)-a($sta_fe_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>VILLAVERDE</td>
                                    <td>{{ c($villaverde_tot_in) }}</td>
                                    <td>{{ c($villaverde_tot_out) }}</td>
                                    <td>{{ c($villaverde_tot_cashin) }}</td>
                                    <td>{{ c($villaverde_tot_others) }}</td>
                                    <td>{{ c(a($villaverde_tot_in)+a($villaverde_tot_cashin)-a($villaverde_tot_out)-a($villaverde_tot_others)) }}</td>
                                    <td>{{ c($villaverde_exp) }}</td>
                                    <td>{{ c(a($villaverde_tot_in)+a($villaverde_tot_cashin)-a($villaverde_exp)-a($villaverde_tot_out)-a($villaverde_tot_others)) }}</td>
                                </tr>



                                <tr class="bg-info">
                                    <td class="bg-primary"><b>GRAND TOTAL</b></td>
                                    <td>{{ c($Gtotal_in) }}</td>
                                    <td>{{ c($Gtotal_out) }}</td>
                                    <td>{{ c($Gtotal_cashin) }}</td>
                                    <td>{{ c($Gtotal_others) }}</td>
                                    <td>{{ c(a($Gtotal_in)+a($Gtotal_cashin)-a($Gtotal_out)-a($Gtotal_others)) }}</td>
                                    <td>{{ c($Gtotal_exp) }}</td>
                                    <td  class="bg-warning">{{ c(a($Gtotal_in)+a($Gtotal_cashin)-a($Gtotal_exp)-a($Gtotal_out)-a($Gtotal_others)) }}</td>
                                </tr>
                      
                        </tbody>
                    </table>


                    @php
                        $netTotal=a($Gtotal_in)+a($Gtotal_cashin)-a($Gtotal_exp)-a($Gtotal_out)-a($Gtotal_others);
                        $new_total=$cashonhand+$netTotal;
                    @endphp

                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <p class="text-primary"><b>NEW BALANCE: {{ c($cashonhand+$netTotal) }}</b></p>
                        </div>
                    </div>

                 

        @if ($acceptance=='ALLOWED')
        <form action="{{ route('accept-dcb') }}" method="POST">
            @csrf
          
                    <input type="hidden" name="dcb_date" value="{{ $search_date }}">

                    <input type="hidden" name="main_office_tot_in" value="{{ $main_office_tot_in }}">
                    <input type="hidden" name="main_office_tot_out" value="{{ $main_office_tot_out }}">
                    <input type="hidden" name="main_office_exp" value="{{ $main_office_exp }}">

                    <input type="hidden" name="aritao_tot_in" value="{{ $aritao_tot_in }}">
                    <input type="hidden" name="aritao_tot_out" value="{{ $aritao_tot_out }}">
                    <input type="hidden" name="aritao_exp" value="{{ $aritao_exp }}">

                    <input type="hidden" name="ambaguio1_tot_in" value="{{ $ambaguio1_tot_in }}">
                    <input type="hidden" name="ambaguio1_tot_out" value="{{ $ambaguio1_tot_out }}">
                    <input type="hidden" name="ambaguio1_exp" value="{{ $ambaguio1_exp }}">

                    <input type="hidden" name="ambaguio2_tot_in" value="{{ $ambaguio2_tot_in }}">
                    <input type="hidden" name="ambaguio2_tot_out" value="{{ $ambaguio2_tot_out }}">
                    <input type="hidden" name="ambaguio2_exp" value="{{ $ambaguio2_exp }}">

                    <input type="hidden" name="bagabag_tot_in" value="{{ $bagabag_tot_in }}">
                    <input type="hidden" name="bagabag_tot_out" value="{{ $bagabag_tot_out }}">
                    <input type="hidden" name="bagabag_exp" value="{{ $bagabag_exp }}">

                    <input type="hidden" name="bambang1_tot_in" value="{{ $bambang1_tot_in }}">
                    <input type="hidden" name="bambang1_tot_out" value="{{ $bambang1_tot_out }}">
                    <input type="hidden" name="bambang1_exp" value="{{ $bambang1_exp }}">

                    <input type="hidden" name="bambang2_tot_in" value="{{ $bambang2_tot_in }}">
                    <input type="hidden" name="bambang2_tot_out" value="{{ $bambang2_tot_out }}">
                    <input type="hidden" name="bambang2_exp" value="{{ $bambang2_exp }}">


                    <input type="hidden" name="bayombong_tot_in" value="{{ $bayombong_tot_in }}">
                    <input type="hidden" name="bayombong_tot_out" value="{{ $bayombong_tot_out }}">
                    <input type="hidden" name="bayombong_exp" value="{{ $bayombong_exp }}">

                    <input type="hidden" name="castaneda_tot_in" value="{{ $castaneda_tot_in }}">
                    <input type="hidden" name="castaneda_tot_out" value="{{ $castaneda_tot_out }}">
                    <input type="hidden" name="castaneda_exp" value="{{ $castaneda_exp }}">

                    <input type="hidden" name="diadi_tot_in" value="{{ $diadi_tot_in }}">
                    <input type="hidden" name="diadi_tot_out" value="{{ $diadi_tot_out }}">
                    <input type="hidden" name="diadi_exp" value="{{ $diadi_exp }}">

                    <input type="hidden" name="dupax_norte1_tot_in" value="{{ $dupax_norte1_tot_in }}">
                    <input type="hidden" name="dupax_norte1_tot_out" value="{{ $dupax_norte1_tot_out }}">
                    <input type="hidden" name="dupax_norte1_exp" value="{{ $dupax_norte1_exp }}">

                    <input type="hidden" name="dupax_norte2_tot_in" value="{{ $dupax_norte2_tot_in }}">
                    <input type="hidden" name="dupax_norte2_tot_out" value="{{ $dupax_norte2_tot_out }}">
                    <input type="hidden" name="dupax_norte2_exp" value="{{ $dupax_norte2_exp }}">

                    <input type="hidden" name="dupax_sur_tot_in" value="{{ $dupax_sur_tot_in }}">
                    <input type="hidden" name="dupax_sur_tot_out" value="{{ $dupax_sur_tot_out }}">
                    <input type="hidden" name="dupax_sur_exp" value="{{ $dupax_sur_exp }}">

                    <input type="hidden" name="kayapa1_tot_in" value="{{ $kayapa1_tot_in }}">
                    <input type="hidden" name="kayapa1_tot_out" value="{{ $kayapa1_tot_out }}">
                    <input type="hidden" name="kayapa1_exp" value="{{ $kayapa1_exp }}">

                    <input type="hidden" name="kayapa2_tot_in" value="{{ $kayapa2_tot_in }}">
                    <input type="hidden" name="kayapa2_tot_out" value="{{ $kayapa2_tot_out }}">
                    <input type="hidden" name="kayapa2_exp" value="{{ $kayapa2_exp }}">

                    <input type="hidden" name="kasibu_tot_in" value="{{ $kasibu_tot_in }}">
                    <input type="hidden" name="kasibu_tot_out" value="{{ $kasibu_tot_out }}">
                    <input type="hidden" name="kasibu_exp" value="{{ $kasibu_exp }}">

                    <input type="hidden" name="quezon_tot_in" value="{{ $quezon_tot_in }}">
                    <input type="hidden" name="quezon_tot_out" value="{{ $quezon_tot_out }}">
                    <input type="hidden" name="quezon_exp" value="{{ $quezon_exp }}">

                    <input type="hidden" name="solano1_tot_in" value="{{ $solano1_tot_in }}">
                    <input type="hidden" name="solano1_tot_out" value="{{ $solano1_tot_out }}">
                    <input type="hidden" name="solano1_exp" value="{{ $solano1_exp }}">

                    <input type="hidden" name="solano2_tot_in" value="{{ $solano2_tot_in }}">
                    <input type="hidden" name="solano2_tot_out" value="{{ $solano2_tot_out }}">
                    <input type="hidden" name="solano2_exp" value="{{ $solano2_exp }}">

                    <input type="hidden" name="sta_fe_tot_in" value="{{ $sta_fe_tot_in }}">
                    <input type="hidden" name="sta_fe_tot_out" value="{{ $sta_fe_tot_out }}">
                    <input type="hidden" name="sta_fe_exp" value="{{ $sta_fe_exp }}">

                    <input type="hidden" name="villaverde_tot_in" value="{{ $villaverde_tot_in }}">
                    <input type="hidden" name="villaverde_tot_out" value="{{ $villaverde_tot_out }}">
                    <input type="hidden" name="villaverde_exp" value="{{ $villaverde_exp }}">

                    <input type="hidden" name="Gtotal_in" value="{{ $Gtotal_in }}">
                    <input type="hidden" name="Gtotal_out" value="{{ $Gtotal_out }}">
                    <input type="hidden" name="Gtotal_exp" value="{{ $Gtotal_exp }}">
                    <input type="hidden" name="netTotal" value="{{ $netTotal }}">

                    <input type="hidden" name="beg_balance" value="{{ $cashonhand }}">
                    <input type="hidden" name="new_total" value="{{ $new_total }}">

                    
                    <div class="col-lg-12 mt-4 text-center">
                        <p> <i>Kindly double-check all the data before accepting.Thank you.</i></p>
                         <input type="submit" value="ACCEPT" class="btn btn-primary pl-4 pr-4 mt-1">
                    </div>

        </form>

        @endif           





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


<script>
    function myFunction() {
        if(!confirm("Are You Sure to delete this"))
        event.preventDefault();
    }
</script>

<script>

</script>

@endsection
