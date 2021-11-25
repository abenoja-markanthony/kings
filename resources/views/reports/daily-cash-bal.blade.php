@extends('layouts.app')

@section('content')
@section('page-css')
    <link href="{{ asset('css/expenses.css') }}" rel="stylesheet">
@endsection


@php
// TOTAL

    if($main_office){
        $main_office_tot=a($main_office->tot_in)-a($main_office->tot_out)-a($main_office->tot_others)+a($main_office->tot_cashin);
        $main_office_tot_in=$main_office->tot_in;
        $main_office_tot_out=$main_office->tot_out;
        $main_office_tot_others=$main_office->tot_others;
        $main_office_tot_cashin=$main_office->tot_cashin;
    }else{
        $main_office_tot=0;
        $main_office_tot_in=0;
        $main_office_tot_out=0;
        $main_office_tot_others=0;
        $main_office_tot_cashin=0;
    }
    if($aritao){
        $aritao_tot=a($aritao->tot_in)-a($aritao->tot_out)-a($aritao->tot_others)+a($aritao->tot_cashin);
        $aritao_tot_in=$aritao->tot_in;
        $aritao_tot_out=$aritao->tot_out;
        $aritao_tot_others=$aritao->tot_others;
        $aritao_tot_cashin=$aritao->tot_cashin;
    }else{
        $aritao_tot=0;
        $aritao_tot_in=0;
        $aritao_tot_out=0;
        $aritao_tot_others=0;
        $aritao_tot_cashin=0;
    }
    if ($ambaguio) {
        $ambaguio_tot=a($ambaguio->tot_in)-a($ambaguio->tot_out)-a($ambaguio->tot_others)+a($ambaguio->tot_cashin);
        $ambaguio_tot_in=$ambaguio->tot_in;
        $ambaguio_tot_out=$ambaguio->tot_out;
        $ambaguio_tot_others=$ambaguio->tot_others;
        $ambaguio_tot_cashin=$ambaguio->tot_cashin;
    }else{
        $ambaguio_tot=0;
        $ambaguio_tot_in=0;
        $ambaguio_tot_out=0;
        $ambaguio_tot_others=0;
        $ambaguio_tot_cashin=0;
    }
    if ($bagabag) {
        $bagabag_tot=a($bagabag->tot_in)-a($bagabag->tot_out)-a($bagabag->tot_others)+a($bagabag->tot_cashin);
        $bagabag_tot_in=$bagabag->tot_in;
        $bagabag_tot_out=$bagabag->tot_out;
        $bagabag_tot_others=$bagabag->tot_others;
        $bagabag_tot_cashin=$bagabag->tot_cashin;
    } else {
        $bagabag_tot=0;
        $bagabag_tot_in=0;
        $bagabag_tot_out=0;
        $bagabag_tot_cashin=0;
        $bagabag_tot_others=0;
    }
    if ($bambang) {
        $bambang_tot=a($bambang->tot_in)-a($bambang->tot_out)-a($bambang->tot_others)+a($bambang->tot_cashin);
        $bambang_tot_in=$bambang->tot_in;
        $bambang_tot_out=$bambang->tot_out;
        $bambang_tot_others=$bambang->tot_others;
        $bambang_tot_cashin=$bambang->tot_cashin;
    } else {
        $bambang_tot=0;
        $bambang_tot_in=0;
        $bambang_tot_out=0;
        $bambang_tot_cashin=0;
        $bambang_tot_others=0;
    }
    if ($bayombong) {
        $bayombong_tot=a($bayombong->tot_in)-a($bayombong->tot_out)-a($bayombong->tot_others)+a($bayombong->tot_cashin);
        $bayombong_tot_in=$bayombong->tot_in;
        $bayombong_tot_out=$bayombong->tot_out;
        $bayombong_tot_others=$bayombong->tot_others;
        $bayombong_tot_cashin=$bayombong->tot_cashin;
    } else {
        $bayombong_tot=0;
        $bayombong_tot_in=0;
        $bayombong_tot_out=0;
        $bayombong_tot_cashin=0;
        $bayombong_tot_others=0;
    }
    if ($castaneda) {
        $castaneda_tot=a($castaneda->tot_in)-a($castaneda->tot_out)-a($castaneda->tot_others)+a($castaneda->tot_cashin);
        $castaneda_tot_in=$castaneda->tot_in;
        $castaneda_tot_out=$castaneda->tot_out;
        $castaneda_tot_others=$castaneda->tot_others;
        $castaneda_tot_cashin=$castaneda->tot_cashin;
    } else {
        $castaneda_tot=0;
        $castaneda_tot_in=0;
        $castaneda_tot_out=0;
        $castaneda_tot_cashin=0;
        $castaneda_tot_others=0;
    }
    if ($diadi) {
        $diadi_tot=a($diadi->tot_in)-a($diadi->tot_out)-a($diadi->tot_others)+a($diadi->tot_cashin);
        $diadi_tot_in=$diadi->tot_in;
        $diadi_tot_out=$diadi->tot_out;
        $diadi_tot_others=$diadi->tot_others;
        $diadi_tot_cashin=$diadi->tot_cashin;
    } else {
        $diadi_tot=0;
        $diadi_tot_in=0;
        $diadi_tot_out=0;
        $diadi_tot_cashin=0;
        $diadi_tot_others=0;
    }
    if ($dupax_norte) {
        $dupax_norte_tot=a($dupax_norte->tot_in)-a($dupax_norte->tot_out)-a($dupax_norte->tot_others)+a($dupax_norte->tot_cashin);
        $dupax_norte_tot_in=$dupax_norte->tot_in;
        $dupax_norte_tot_out=$dupax_norte->tot_out;
        $dupax_norte_tot_others=$dupax_norte->tot_others;
        $dupax_norte_tot_cashin=$dupax_norte->tot_cashin;
    } else {
        $dupax_norte_tot=0;
        $dupax_norte_tot_in=0;
        $dupax_norte_tot_out=0;
        $dupax_norte_tot_cashin=0;
        $dupax_norte_tot_others=0;
    }
    if ($dupax_sur) {
        $dupax_sur_tot=a($dupax_sur->tot_in)-a($dupax_sur->tot_out)-a($dupax_sur->tot_others)+a($dupax_sur->tot_cashin);
        $dupax_sur_tot_in=$dupax_sur->tot_in;
        $dupax_sur_tot_out=$dupax_sur->tot_out;
        $dupax_sur_tot_others=$dupax_sur->tot_others;
        $dupax_sur_tot_cashin=$dupax_sur->tot_cashin;
    } else {
       $dupax_sur_tot=0;
       $dupax_sur_tot_in=0;
       $dupax_sur_tot_out=0;
       $dupax_sur_tot_cashin=0;
       $dupax_sur_tot_others=0;
    }
    if ($kayapa) {
        $kayapa_tot=a($kayapa->tot_in)-a($kayapa->tot_out)-a($kayapa->tot_others)+a($kayapa->tot_cashin);
        $kayapa_tot_in=$kayapa->tot_in;
        $kayapa_tot_out=$kayapa->tot_out;
        $kayapa_tot_others=$kayapa->tot_others;
        $kayapa_tot_cashin=$kayapa->tot_cashin;
    } else {
        $kayapa_tot=0;
        $kayapa_tot_in=0;
        $kayapa_tot_out=0;
        $kayapa_tot_cashin=0;
        $kayapa_tot_others=0;
    }
    if ($kasibu) {
        $kasibu_tot=a($kasibu->tot_in)-a($kasibu->tot_out)-a($kasibu->tot_others)+a($kasibu->tot_cashin);
        $kasibu_tot_in=$kasibu->tot_in;
        $kasibu_tot_out=$kasibu->tot_out;
        $kasibu_tot_others=$kasibu->tot_others;
        $kasibu_tot_cashin=$kasibu->tot_cashin;
    } else {
        $kasibu_tot=0;
        $kasibu_tot_in=0;
        $kasibu_tot_out=0;
        $kasibu_tot_cashin=0;
        $kasibu_tot_others=0;
    }
    if ($quezon) {
        $quezon_tot=a($quezon->tot_in)-a($quezon->tot_out)-a($quezon->tot_others)+a($quezon->tot_cashin);
        $quezon_tot_in=$quezon->tot_in;
        $quezon_tot_out=$quezon->tot_out;
        $quezon_tot_others=$quezon->tot_others;
        $quezon_tot_cashin=$quezon->tot_cashin;
    } else {
        $quezon_tot=0;
        $quezon_tot_in=0;
        $quezon_tot_out=0;
        $quezon_tot_cashin=0;
        $quezon_tot_others=0;
    }
    if ($solano) {
        $solano_tot=a($solano->tot_in)-a($solano->tot_out)-a($solano->tot_others)+a($solano->tot_cashin);
        $solano_tot_in=$solano->tot_in;
        $solano_tot_out=$solano->tot_out;
        $solano_tot_others=$solano->tot_others;
        $solano_tot_cashin=$solano->tot_cashin;
    } else {
        $solano_tot=0;
        $solano_tot_in=0;
        $solano_tot_out=0;
        $solano_tot_cashin=0;
        $solano_tot_others=0;
    }
    if ($sta_fe) {
        $sta_fe_tot=a($sta_fe->tot_in)-a($sta_fe->tot_out)-a($sta_fe->tot_others)+a($sta_fe->tot_cashin);
        $sta_fe_tot_in=$sta_fe->tot_in;
        $sta_fe_tot_out=$sta_fe->tot_out;
        $sta_fe_tot_others=$sta_fe->tot_others;
        $sta_fe_tot_cashin=$sta_fe->tot_cashin;
    } else {
        $sta_fe_tot=0;
        $sta_fe_tot_in=0;
        $sta_fe_tot_out=0;
        $sta_fe_tot_cashin=0;
        $sta_fe_tot_others=0;
    }
    if ($villaverde) {
        $villaverde_tot=a($villaverde->tot_in)-a($villaverde->tot_out)-a($villaverde->tot_others)+a($villaverde->tot_cashin);
        $villaverde_tot_in=$villaverde->tot_in;
        $villaverde_tot_out=$villaverde->tot_out;
        $villaverde_tot_others=$villaverde->tot_others;
        $villaverde_tot_cashin=$villaverde->tot_cashin;
    } else {
        $villaverde_tot=0;
        $villaverde_tot_in=0;
        $villaverde_tot_out=0;
        $villaverde_tot_cashin=0;
        $villaverde_tot_others=0;
    }
    

    /////////////////////////////////////////////////////////////////////////////////////////
   if(!$main_office_exp){
        $main_office_exp=0;
    }
    if(!$aritao_exp){
        $aritao_exp=0;
    }
    if (!$ambaguio_exp) {
        $ambaguio_exp=0;
    }
    if(!$bagabag_exp) {
        $bagabag_exp=0;
    } 
    if(!$bambang_exp) {
        $bambang_exp=0;
    }
    if(!$bambang_exp) {
        $bambang_exp=0;
    } 
    if(!$bayombong_exp) {
        $bayombong_exp=0;
    } 
    if(!$castaneda_exp) {
        $castaneda_exp=0;
    } 
    if(!$diadi_exp) {
        $diadi_exp=0;
    }
    if(!$dupax_norte_exp) {
        $dupax_norte_exp=0;
    }
    if(!$dupax_sur_exp) {
        $dupax_sur_exp=0;
    } 
    if(!$kayapa_exp) {
        $kayapa_exp=0;
    } 
    if(!$kasibu_exp) {
        $kasibu_exp=0;
    } 
    if(!$quezon_exp) {
        $quezon_exp=0;
    }
    if(!$solano_exp) {
        $solano_exp=0;
    }
    if(!$sta_fe_exp) {
        $sta_fe_exp=0;
    } 
    if(!$villaverde_exp) {
        $villaverde_exp=0;
    } 

    
//NET
    $main_office_net=$main_office_tot-$main_office_exp;
    $aritao_net=$aritao_tot-$aritao_exp;
    $ambaguio_net=$ambaguio_tot-$ambaguio_exp;
    $bagabag_net=$bagabag_tot-$bagabag_exp;
    $bambang_net=$bambang_tot-$bambang_exp;
    $bayombong_net=$bayombong_tot-$bayombong_exp;
    $castaneda_net=$castaneda_tot-$castaneda_exp;
    $diadi_net=$diadi_tot-$diadi_exp;
    $dupax_norte_net=$dupax_norte_tot-$dupax_norte_exp;
    $dupax_sur_net=$dupax_sur_tot-$dupax_sur_exp;
    $kayapa_net=$kayapa_tot-$kayapa_exp;
    $kasibu_net=$kasibu_tot-$kasibu_exp;
    $quezon_net=$quezon_tot-$quezon_exp;
    $solano_net=$solano_tot-$solano_exp;
    $sta_fe_net=$sta_fe_tot-$sta_fe_exp;
    $villaverde_net=$villaverde_tot-$villaverde_exp;


// GTOTAL
    $Gtotal_in=a($main_office_tot_in)+
    a($aritao_tot_in)+a($ambaguio_tot_in) +a($bagabag_tot_in)
    +a($bambang_tot_in)+a($bayombong_tot_in)+a($castaneda_tot_in)
    +a($diadi_tot_in)+a($dupax_norte_tot_in)+a($dupax_sur_tot_in)
    +a($kayapa_tot_in)+a($kasibu_tot_in)+a($quezon_tot_in)
    +a($solano_tot_in)+a($sta_fe_tot_in)+a($villaverde_tot_in) ;
    
    
    
   
    $Gtotal_out=a($main_office_tot_out)+
    a($aritao_tot_out)+a($ambaguio_tot_out) +a($bagabag_tot_out)
    +a($bambang_tot_out)+a($bayombong_tot_out)+a($castaneda_tot_out)
    +a($diadi_tot_out)+a($dupax_norte_tot_out)+a($dupax_sur_tot_out)
    +a($kayapa_tot_out)+a($kasibu_tot_out)+a($quezon_tot_out)
    +a($solano_tot_out)+a($sta_fe_tot_out)+a($villaverde_tot_out) ;
    
    $Gtotal_others=a($main_office_tot_others)+
    a($aritao_tot_others)+a($ambaguio_tot_others) +a($bagabag_tot_others)
    +a($bambang_tot_others)+a($bayombong_tot_others)+a($castaneda_tot_others)
    +a($diadi_tot_others)+a($dupax_norte_tot_others)+a($dupax_sur_tot_others)
    +a($kayapa_tot_others)+a($kasibu_tot_others)+a($quezon_tot_others)
    +a($solano_tot_others)+a($sta_fe_tot_others)+a($villaverde_tot_others) ;

    $Gtotal_cashin=a($main_office_tot_cashin)+
    a($aritao_tot_cashin)+a($ambaguio_tot_cashin) +a($bagabag_tot_cashin)
    +a($bambang_tot_cashin)+a($bayombong_tot_cashin)+a($castaneda_tot_cashin)
    +a($diadi_tot_cashin)+a($dupax_norte_tot_cashin)+a($dupax_sur_tot_cashin)
    +a($kayapa_tot_cashin)+a($kasibu_tot_cashin)+a($quezon_tot_cashin)
    +a($solano_tot_cashin)+a($sta_fe_tot_cashin)+a($villaverde_tot_cashin) ;

    $Gtotal_tot=$main_office_tot+
    $aritao_tot+$ambaguio_tot+$bagabag_tot+
    $bambang_tot+$bayombong_tot+$castaneda_tot+
    $diadi_tot+$dupax_norte_tot+$dupax_sur_tot+
    $kayapa_tot+$kasibu_tot+$quezon_tot+
    $solano_tot+$sta_fe_tot+$villaverde_tot;
    
 
    $Gtotal_exp=$main_office_exp+
    $aritao_exp+$ambaguio_exp+$bagabag_exp+
    $bambang_exp+$bayombong_exp+$castaneda_exp+
    $diadi_exp+$dupax_norte_exp+$dupax_sur_exp+
    $kayapa_exp+$kasibu_exp+$quezon_exp+
    $solano_exp+$sta_fe_exp+$villaverde_exp;



// NET TOTAL
    $netTotal= $main_office_net+
    $aritao_net+$ambaguio_net+$bagabag_net+
    $bambang_net+$bayombong_net+$castaneda_net+
    $diadi_net+$dupax_norte_net+$dupax_sur_net+
    $kayapa_net+$kasibu_net+$quezon_net+
    $solano_net+$sta_fe_net+$villaverde_net;
@endphp


<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            <div class="card p-4">

                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6 "><h3>DAILY CASH BALANCING</h3> <p class="text-primary"><b>BEGINNING CASH BALANCE :  {{ c($coh->cashonhand) }}</b> </p>  </div>
                        <div class="col-lg-6 text-right"><h3> {{ date('M. d, Y', strtotime($search_date)) }}</h3> </div>
                    </div>
                    <div class="rows">
                        <form action="{{ route('search-dcb') }}" method="POST">
                            @csrf
                            <input type="date" name="search_date" value="{{ $search_date }}">
                            <input type="submit" value="SEARCH">
                        </form>
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
                                    <td>{{ c($main_office_tot) }}</td>
                                    <td>{{ c($main_office_exp) }}</td>
                                    <td>{{ c($main_office_net) }}</td>
                                </tr>

                                <tr>
                                    <td>ARITAO</td>
                                    <td>{{ c($aritao_tot_in) }}</td>
                                    <td>{{ c($aritao_tot_out) }}</td>
                                    <td>{{ c($aritao_tot_cashin) }}</td>
                                    <td>{{ c($aritao_tot_others) }}</td>
                                    <td>{{ c($aritao_tot) }}</td>
                                    <td>{{ c($aritao_exp) }}</td>
                                    <td>{{ c($aritao_net) }}</td>
                                </tr>
                
                                <tr>
                                    <td>AMBAGUIO</td>
                                    <td>{{ c($ambaguio_tot_in) }}</td>
                                    <td>{{ c($ambaguio_tot_out) }}</td>
                                    <td>{{ c($ambaguio_tot_cashin) }}</td>
                                    <td>{{ c($ambaguio_tot_others) }}</td>
                                    <td>{{ c($ambaguio_tot) }}</td>
                                    <td>{{ c($ambaguio_exp) }}</td>
                                    <td>{{ c($ambaguio_net) }}</td>
                                </tr>
                                <tr>
                                    <td>BAGABAG</td>
                                    <td>{{ c($bagabag_tot_in) }}</td>
                                    <td>{{ c($bagabag_tot_out) }}</td>
                                    <td>{{ c($bagabag_tot_cashin) }}</td>
                                    <td>{{ c($bagabag_tot_others) }}</td>
                                    <td>{{ c($bagabag_tot) }}</td>
                                    <td>{{ c($bagabag_exp) }}</td>
                                    <td>{{ c($bagabag_net) }}</td>
                                </tr>
                                <tr>
                                    <td>BAMBANG</td>
                                    <td>{{ c($bambang_tot_in) }}</td>
                                    <td>{{ c($bambang_tot_out) }}</td>
                                    <td>{{ c($bambang_tot_cashin) }}</td>
                                    <td>{{ c($bambang_tot_others) }}</td>
                                    <td>{{ c($bambang_tot) }}</td>
                                    <td>{{ c($bambang_exp) }}</td>
                                    <td>{{ c($bambang_net) }}</td>
                                </tr>
                                <tr>
                                    <td>BOYOMBONG</td>
                                    <td>{{ c($bayombong_tot_in) }}</td>
                                    <td>{{ c($bayombong_tot_out) }}</td>
                                    <td>{{ c($bayombong_tot_cashin) }}</td>
                                    <td>{{ c($bayombong_tot_others) }}</td>
                                    <td>{{ c($bayombong_tot) }}</td>
                                    <td>{{ c($bayombong_exp) }}</td>
                                    <td>{{ c($bayombong_net) }}</td>
                                </tr>
                                <tr>
                                    <td>CASTANEDA</td>
                                    <td>{{ c($castaneda_tot_in) }}</td>
                                    <td>{{ c($castaneda_tot_out) }}</td>
                                    <td>{{ c($castaneda_tot_cashin) }}</td>
                                    <td>{{ c($castaneda_tot_others) }}</td>
                                    <td>{{ c($castaneda_tot) }}</td>
                                    <td>{{ c($castaneda_exp) }}</td>
                                    <td>{{ c($castaneda_net) }}</td>
                                </tr>
                                <tr>
                                    <td>DIADI</td>
                                    <td>{{ c($diadi_tot_in) }}</td>
                                    <td>{{ c($diadi_tot_out) }}</td>
                                    <td>{{ c($diadi_tot_cashin) }}</td>
                                    <td>{{ c($diadi_tot_others) }}</td>
                                    <td>{{ c($diadi_tot) }}</td>
                                    <td>{{ c($diadi_exp) }}</td>
                                    <td>{{ c($diadi_net) }}</td>
                                </tr>
                                <tr>
                                    <td>DUPAX NORTE</td>
                                    <td>{{ c($dupax_norte_tot_in) }}</td>
                                    <td>{{ c($dupax_norte_tot_out) }}</td>
                                    <td>{{ c($dupax_norte_tot_cashin) }}</td>
                                    <td>{{ c($dupax_norte_tot_others) }}</td>
                                    <td>{{ c($dupax_norte_tot) }}</td>
                                    <td>{{ c($dupax_norte_exp) }}</td>
                                    <td>{{ c($dupax_norte_net) }}</td>
                                </tr>
                                <tr>
                                    <td>DUPAX SUR</td>
                                    <td>{{ c($dupax_sur_tot_in) }}</td>
                                    <td>{{ c($dupax_sur_tot_out) }}</td>
                                    <td>{{ c($dupax_sur_tot_cashin) }}</td>
                                    <td>{{ c($dupax_sur_tot_others) }}</td>
                                    <td>{{ c($dupax_sur_tot) }}</td>
                                    <td>{{ c($dupax_sur_exp) }}</td>
                                    <td>{{ c($dupax_sur_net) }}</td>
                                </tr>
                                <tr>
                                    <td>KAYAPA</td>
                                    <td>{{ c($kayapa_tot_in) }}</td>
                                    <td>{{ c($kayapa_tot_out) }}</td>
                                    <td>{{ c($kayapa_tot_cashin) }}</td>
                                    <td>{{ c($kayapa_tot_others) }}</td>
                                    <td>{{ c($kayapa_tot) }}</td>
                                    <td>{{ c($kayapa_exp) }}</td>
                                    <td>{{ c($kayapa_net) }}</td>
                                </tr>
                                <tr>
                                    <td>KASIBU</td>
                                    <td>{{ c($kasibu_tot_in) }}</td>
                                    <td>{{ c($kasibu_tot_out) }}</td>
                                    <td>{{ c($kasibu_tot_cashin) }}</td>
                                    <td>{{ c($kasibu_tot_others) }}</td>
                                    <td>{{ c($kasibu_tot) }}</td>
                                    <td>{{ c($kasibu_exp) }}</td>
                                    <td>{{ c($kasibu_net) }}</td>
                                </tr>
                                <tr>
                                    <td>QUEZON</td>
                                    <td>{{ c($quezon_tot_in) }}</td>
                                    <td>{{ c($quezon_tot_out) }}</td>
                                    <td>{{ c($quezon_tot_cashin) }}</td>
                                    <td>{{ c($quezon_tot_others) }}</td>
                                    <td>{{ c($quezon_tot) }}</td>
                                    <td>{{ c($quezon_exp) }}</td>
                                    <td>{{ c($quezon_net) }}</td>
                                </tr>
                                <tr>
                                    <td>SOLANO</td>
                                    <td>{{ c($solano_tot_in) }}</td>
                                    <td>{{ c($solano_tot_out) }}</td>
                                    <td>{{ c($solano_tot_cashin) }}</td>
                                    <td>{{ c($solano_tot_others) }}</td>
                                    <td>{{ c($solano_tot) }}</td>
                                    <td>{{ c($solano_exp) }}</td>
                                    <td>{{ c($solano_net) }}</td>
                                </tr>
                                <tr>
                                    <td>STA. FE</td>
                                    <td>{{ c($sta_fe_tot_in) }}</td>
                                    <td>{{ c($sta_fe_tot_out) }}</td>
                                    <td>{{ c($sta_fe_tot_cashin) }}</td>
                                    <td>{{ c($sta_fe_tot_others) }}</td>
                                    <td>{{ c($sta_fe_tot) }}</td>
                                    <td>{{ c($sta_fe_exp) }}</td>
                                    <td>{{ c($sta_fe_net) }}</td>
                                </tr>

                                <tr>
                                    <td>VILLAVERDE</td>
                                    <td>{{ c($villaverde_tot_in) }}</td>
                                    <td>{{ c($villaverde_tot_out) }}</td>
                                    <td>{{ c($villaverde_tot_cashin) }}</td>
                                    <td>{{ c($villaverde_tot_others) }}</td>
                                    <td>{{ c($villaverde_tot) }}</td>
                                    <td>{{ c($villaverde_exp) }}</td>
                                    <td>{{ c($villaverde_net) }}</td>
                                </tr>

                                <tr class="bg-info">
                                    <td class="bg-primary"><b>GRAND TOTAL</b></td>
                                    <td>{{ c($Gtotal_in) }}</td>
                                    <td>{{ c($Gtotal_out) }}</td>
                                    <td>{{ c($Gtotal_cashin) }}</td>
                                    <td>{{ c($Gtotal_others) }}</td>
                                    <td>{{ c($Gtotal_tot) }}</td>
                                    <td>{{ c($Gtotal_exp) }}</td>
                                    <td class="bg-warning">{{ c($netTotal) }}</td>
                                </tr>
                      
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <p class="text-primary"><b>NEW BALANCE: {{ c($coh->cashonhand+$netTotal) }}</b></p>
                        </div>
                    </div>

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
