@extends('layouts.app')
@section('page-css')
    <link href="{{ asset('css/station_exp_report.css') }}" rel="stylesheet">
@endsection


@section('content')
<div class="container con1 mt-4 pt-4 pb-4">
    <div class="col-lg-12 text-center">
            @php
                $monthNum  = $month;
                $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                $monthName = $dateObj->format('F'); // March
                $monthName1 = $dateObj->format('M'); // March
                $g_total=
                $main_office_exp+
                $aritao_exp+
                $ambaguio1_exp+
                $ambaguio2_exp+
                $bagabag_exp+
                $bambang1_exp+
                $bambang2_exp+
                $bayombong_exp+
                $castaneda_exp+
                $diadi_exp+
                $dupax_norte1_exp+
                $dupax_norte2_exp+
                $dupax_sur_exp+
                $kayapa1_exp+
                $kayapa2_exp+
                $kasibu_exp+
                $quezon_exp+
                $solano_exp+
                $sta_fe_exp+
                $villaverde_exp;
            @endphp 
    <div class="row">
     
        <div class="col-lg-6 offset-3">
                <h3>MAIN OFFICE AND STATION EXPENSES</h3>
                <h5>NUEVA VIZCAYA - {{ $monthName." ".$year }}</h5>
        </div>
        <div class="col-lg-3">
            <form action="{{ route('PDF-station-expenses') }}" method="GET">
                <input type="hidden" name="month" value="{{ $month }}">
                <input type="hidden" name="year" value="{{ $year }}">
                <input type="submit" value="Convert to PDF">
        </form>
        </div>
    </div>
          
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">

            <table id="table1">
                <thead>
                    <tr>
            
                        <th style="width:50%">STATION</th>
                        <th>MONTHLY TOTAL EXPENSES</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>MAIN OFFICE</td>
                        <td class="t_right">{{ c($main_office_exp) }}</td>
                    </tr>
                    <tr>
                        <td>ARITAO</td>
                        <td class="t_right">{{ c($aritao_exp) }}</td>
                    </tr>
                    <tr>
                        <td>AMBAGUIO 1</td>
                        <td class="t_right">{{ c($ambaguio1_exp) }}</td>
                    </tr>
                    <tr>
                        <td>AMBAGUIO 2</td>
                        <td class="t_right">{{ c($ambaguio2_exp) }}</td>
                    </tr>
                    <tr>
                        <td>BAGABAG</td>
                        <td class="t_right">{{ c($bagabag_exp) }}</td>
                    </tr>
                    <tr>
                        <td>BAMBANG 1</td>
                        <td class="t_right">{{ c($bambang1_exp) }}</td>
                    </tr>
                    <tr>
                        <td>BAMBANG 2</td>
                        <td class="t_right">{{ c($bambang2_exp) }}</td>
                    </tr>
                    <tr>
                        <td>BAYOMBONG</td>
                        <td class="t_right">{{ c($bayombong_exp) }}</td>
                    </tr>
                    <tr>
                        <td>CASTANEDA</td>
                        <td class="t_right">{{ c($castaneda_exp) }}</td>
                    </tr>
                    <tr>
                        <td>DIADI</td>
                        <td class="t_right">{{ c($diadi_exp) }}</td>
                    </tr>
                    <tr>
                        <td>DUPAX NORTE 1</td>
                        <td class="t_right">{{ c($dupax_norte1_exp) }}</td>
                    </tr>
                    <tr>
                        <td>DUPAX NORTE 2</td>
                        <td class="t_right">{{ c($dupax_norte2_exp) }}</td>
                    </tr>
                    <tr>
                        <td>DUPAX SUR</td>
                        <td class="t_right">{{ c($dupax_sur_exp) }}</td>
                    </tr>
                    <tr>
                        <td>KAYAPA 1</td>
                        <td class="t_right">{{ c($kayapa1_exp) }}</td>
                    </tr>
                    <tr>
                        <td>KAYAPA 2</td>
                        <td class="t_right">{{ c($kayapa2_exp) }}</td>
                    </tr>
                    <tr>
                        <td>KASIBU</td>
                        <td class="t_right">{{ c($kasibu_exp) }}</td>
                    </tr>
                    <tr>
                        <td>QUEZON</td>
                        <td class="t_right">{{ c($quezon_exp) }}</td>
                    </tr>
                    <tr>
                        <td>SOLANO</td>
                        <td class="t_right">{{ c($solano_exp) }}</td>
                    </tr>
                    <tr>
                        <td>STA. FE</td>
                        <td class="t_right">{{ c($sta_fe_exp) }}</td>
                    </tr>
                    <tr>
                        <td>VILLAVERDE</td>
                        <td class="t_right">{{ c($villaverde_exp) }}</td>
                    </tr>
                    <tr class="bg-warning">
                        <td><h5>GRAND TOTAL</h5></td>
                        <td class="t_right"><h5>{{ c($g_total) }}</h5></td>
                    </tr>

                </tbody>
            </table>


        </div>
    </div>
</div>





@php
    function c($x){
        if ($x!='') {
           $x=number_format($x,0);
            return $x;
        }else{
            return $x;
        }
    }
    function c1($x){
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
