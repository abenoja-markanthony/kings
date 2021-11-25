@extends('layouts.app')
@section('page-css')
    <link href="{{ asset('css/audit-report.css') }}" rel="stylesheet">
@endsection


@section('content')
<div class="container text-center" id="top">
    <h4>{{ strtoupper($month_name) }} {{ $year }} AUDIT</h4>

    <div class="row">
        <div class="col-sm-12">
            <ul class="nav nav-pills  justify-content-center" id="nav1">
                <li class="active"><a href="#pre_sale_vs_daily" data-toggle='tab' class="btn btn-primary">PRE-SALES vs DAILY SALES</a></li> 
                <li ><a href="#daily_cash_balance" data-toggle='tab'  class="btn btn-primary">DAILY CASH BALANCE</a></li>
                <li ><a href="#cashin_cashout" data-toggle='tab'  class="btn btn-primary">CASH-IN vs CASH-OUT</a></li>
                <li ><a href="#expenses" data-toggle='tab'  class="btn btn-primary">EXPENSES</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="fluid m-4" style="font-size: 12px">
    

    <div class="row justify-content-center tab-content">
        <div class="col-md-12">
            @if($errors->any())
                <div class  ="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif 
        </div>



        <div class="col-md-5  tab-pane  active" id="pre_sale_vs_daily">
            <table class="table table-bordered table-sm">
                
                <thead class=" table-primary">
                    <tr class="head1">
                        <th colspan="4" class="text-center">PRE-SALES VS. DAILY SALES</th>
                    </tr>
                    <tr class="text-center">
                        <th>DAY</th>
                        <th>PRE-SALE</th>
                        <th>DAILY-SALE</th>
                        <th>STATUS</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @php
                        $diff=0;
                    @endphp
                    @for ($i = 1; $i < 32; $i++)
                        <tr class="text-center">
                            <td>{{ $i }}</td>
                            <td class="text-right pr-4">{{ number_format(${'day'.$i},2) }}</td>
                            <td class="text-right pr-4">{{ number_format(${'ds_day'.$i},2) }}</td>
                            @if (${'day'.$i}-${'ds_day'.$i}==0)
                                <td class="text-success"><i class="fa fa-check"></i></td>
                            @else
                                <td>{{ number_format(${'day'.$i}-${'ds_day'.$i},2) }}</td>
                                @php
                                    $diff+=${'day'.$i}-${'ds_day'.$i};
                                @endphp
                            @endif
                        </tr>   
                    @endfor
                    <tr class="bg-info text-center">
                        <td colspan="3"><b>TOTAL ADJUSTMENT</b></td>
                        <td><b>{{ number_format($diff,2) }}</b></td>
                    </tr>
               
                </tbody>
            </table>
        </div>

        <div class="col-md-12  tab-pane fade" id="daily_cash_balance">
            <table class="table table-bordered table-sm">
                <thead class=" table-primary">
                    <tr class="head1">
                        <th colspan="12" class="text-center">DAILY CASH BALANCE</th>
                    </tr>
                    <tr class="text-center">
                        <th>DAY</th>
                        <th>BEG. BALANCE</th>
                        <th>SALES</th>
                        <th>TABLE OUT</th>
                        <th>CASH IN</th>
                        <th>CASH OUT</th>
                        <th>TOTAL</th>
                        <th>DISBURSMENT</th>
                        <th>NET</th>
                        <th>ENDING BALANCE</th>
                        <th>ENCODED BALANCE</th>
                        <th>STATUS</th>

                    </tr>  
                </thead>
                <tbody class="bg-white">
                    @php
                        $diff=0;
                        $beg_balance=$beg_bal->cashonhand;
                    @endphp
                    @for ($i = 1; $i < 32; $i++)
                    @php
                        $sys_gen=${'d'.$i.'_in'}-${'d'.$i.'_out'}+${'d'.$i.'_cashin'}-${'d'.$i.'_cashout'}-${'d'.$i.'_exp'};
                        $end_bal=${'d'.$i.'_in'}-${'d'.$i.'_out'}+${'d'.$i.'_cashin'}-${'d'.$i.'_cashout'}-${'d'.$i.'_exp'}+$beg_balance;
                        $encoded_balance=${'coh_day'.$i};
                    @endphp
                        <tr class="text-right">
                            <td  class="text-center">{{ $i }}</td>
                            <td>{{ number_format($beg_balance,2) }}</td>
                            <td>{{ number_format(${'d'.$i.'_in'},2) }}</td>
                            <td>{{ number_format(${'d'.$i.'_out'},2) }}</td>
                            <td>{{ number_format(${'d'.$i.'_cashin'},2) }}</td>
                            <td>{{ number_format(${'d'.$i.'_cashout'},2) }}</td>
                            <td>{{ number_format(${'d'.$i.'_in'}-${'d'.$i.'_out'}+${'d'.$i.'_cashin'}-${'d'.$i.'_cashout'},2) }}</td>
                            <td>{{ number_format(${'d'.$i.'_exp'},2) }}</td>
                            <td>{{ number_format($sys_gen,2) }}</td>
                            <td ><input type="text" value="{{ $end_bal }}" class="text-right"></td>
                            <td>{{ number_format($encoded_balance,2) }}</td>
                            
                            @if (round(floatval($end_bal)-floatval($encoded_balance))==0)
                                <td  class="text-success text-center"><i class="fa fa-check"></i></td>
                            @else
                                <td>{{number_format(round(floatval($end_bal)-floatval($encoded_balance)),2) }}</td>
                            @endif
                        </tr>  
                        @php

                            $beg_balance=${'d'.$i.'_in'}-${'d'.$i.'_out'}+${'d'.$i.'_cashin'}-${'d'.$i.'_cashout'}-${'d'.$i.'_exp'}+$beg_balance;
                        @endphp
                        
                    @endfor
                    {{-- <tr class="bg-info text-center">
                        <td colspan="3"><b>TOTAL ADJUSTMENT {{ $d30_exp }}</b></td>
                        <td><b>{{ number_format($diff,2) }}</b></td>
                    </tr> --}}
               
                </tbody>
            </table>
        </div>


        <div class="col-md-8 tab-pane fade" id="expenses">
            <table class="table table-bordered table-sm">
                <thead class=" table-primary">
                    <tr class="head1">
                        <th colspan="12" class="text-center">EXPENSES DATED ON DIFFERENT MONTH</th>
                    </tr>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>DATE OF RECEIPT</th>
                        <th>DATE ENCODED</th>
                        <th>TYPE OF EXPENSE</th>
                        <th>AMOUNT</th>
                        <th>ENCODED BY</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                        @foreach ($wrong_dated_exp as $exp)
                            <tr class="text-center">
                                <td>{{ $exp->id }}</td>
                                <td>{{ $exp->e_date }}</td>
                                <td>{{ $exp->date_encoded }}</td>
                                <td>{{ $exp->type_of_exp }}</td>
                                <td class="text-right pr-4">{{ c($exp->amount) }}</td>
                                <td>{{ $exp->username }}</td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        </div>


        <div class="col-md-5 tab-pane fade" id="cashin_cashout">
            <table class="table table-bordered table-sm  bg-white">
                <thead class=" table-primary">
                    <tr class="head1">
                        <th colspan="12" class="text-center">CASH-IN vs CASH-OUT</th>
                    </tr>
                    <tr class="text-center">
                        <th>CASH-IN</th>
                        <th>CASH-OUT</th>
                        <th>DIFFERENCE</th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <td class="text-right pr-4">{{ c($cashin) }}</td>
                        <td class="text-right pr-4">{{ c($cashout) }}</td>
                        <td class="text-right pr-4">{{ c($cashout-$cashin) }}</td>
                    </tr>
                </thead>

            </table>

            <table class="table table-bordered table-sm  bg-white">
                <tr class="text-center">
                    <th>DCB</th>
                    <th>{{ c($coh->cashonhand) }}</th>
                </tr>
                <tr class="text-center">
                    <th>DIFF</th>
                    <th>{{ c($cashout-$cashin) }}</th>
                </tr>
                <tr class="text-center">
                    <th>TOTAL</th>
                    <th>{{ c($cashout-$cashin+$coh->cashonhand) }}</th>
                </tr>
            </table>

            
        @php
        if ($day_1) {
            $d1_sales=$day_1->tot_in;
            $d1_out=$day_1->tot_out;
            $d1_tot=$d1_sales-$d1_out-national($d1_sales)-local($d1_sales)-expenses($d1_sales)-loan($d1_sales)-ticket($d1_sales)-f_fund($d1_sales)-$pcso1;
        }else{
            $d1_sales=0;
            $d1_out=0;
            $d1_tot=0;
        }
        if ($day_2) {
            $d2_sales=$day_2->tot_in;
            $d2_out=$day_2->tot_out;
            $d2_tot=$d2_sales-$d2_out-national($d2_sales)-local($d2_sales)-expenses($d2_sales)-loan($d2_sales)-ticket($d2_sales)-f_fund($d2_sales)-$pcso2;
        }else{
            $d2_sales=0;
            $d2_out=0;
            $d2_tot=0;
        }
        if ($day_3) {
            $d3_sales=$day_3->tot_in;
            $d3_out=$day_3->tot_out;
            $d3_tot=$d3_sales-$d3_out-national($d3_sales)-local($d3_sales)-expenses($d3_sales)-loan($d3_sales)-ticket($d3_sales)-f_fund($d3_sales)-$pcso3;
        }else{
            $d3_sales=0;
            $d3_out=0;
            $d3_tot=0;
        }
        if ($day_4) {
            $d4_sales=$day_4->tot_in;
            $d4_out=$day_4->tot_out;
            $d4_tot=$d4_sales-$d4_out-national($d4_sales)-local($d4_sales)-expenses($d4_sales)-loan($d4_sales)-ticket($d4_sales)-f_fund($d4_sales)-$pcso4;
        }else{
            $d4_sales=0;
            $d4_out=0;
            $d4_tot=0;
        }
        if ($day_5) {
            $d5_sales=$day_5->tot_in;
            $d5_out=$day_5->tot_out;
            $d5_tot=$d5_sales-$d5_out-national($d5_sales)-local($d5_sales)-expenses($d5_sales)-loan($d5_sales)-ticket($d5_sales)-f_fund($d5_sales)-$pcso5;
        }else{
            $d5_sales=0;
            $d5_out=0;
            $d5_tot=0;
        }
        if ($day_6) {
            $d6_sales=$day_6->tot_in;
            $d6_out=$day_6->tot_out;
            $d6_tot=$d6_sales-$d6_out-national($d6_sales)-local($d6_sales)-expenses($d6_sales)-loan($d6_sales)-ticket($d6_sales)-f_fund($d6_sales)-$pcso6;
        }else{
            $d6_sales=0;
            $d6_out=0;
            $d6_tot=0;
        }
        if ($day_7) {
            $d7_sales=$day_7->tot_in;
            $d7_out=$day_7->tot_out;
            $d7_tot=$d7_sales-$d7_out-national($d7_sales)-local($d7_sales)-expenses($d7_sales)-loan($d7_sales)-ticket($d7_sales)-f_fund($d7_sales)-$pcso7;
        }else{
            $d7_sales=0;
            $d7_out=0;
            $d7_tot=0;
        }
        if ($day_8) {
            $d8_sales=$day_8->tot_in;
            $d8_out=$day_8->tot_out;
            $d8_tot=$d8_sales-$d8_out-national($d8_sales)-local($d8_sales)-expenses($d8_sales)-loan($d8_sales)-ticket($d8_sales)-f_fund($d8_sales)-$pcso8;
        }else{
            $d8_sales=0;
            $d8_out=0;
            $d8_tot=0;
        }
        if ($day_9) {
            $d9_sales=$day_9->tot_in;
            $d9_out=$day_9->tot_out;
            $d9_tot=$d9_sales-$d9_out-national($d9_sales)-local($d9_sales)-expenses($d9_sales)-loan($d9_sales)-ticket($d9_sales)-f_fund($d9_sales)-$pcso9;
        }else{
            $d9_sales=0;
            $d9_out=0;
            $d9_tot=0;
        }
        if ($day_10) {
            $d10_sales=$day_10->tot_in;
            $d10_out=$day_10->tot_out;
            $d10_tot=$d10_sales-$d10_out-national($d10_sales)-local($d10_sales)-expenses($d10_sales)-loan($d10_sales)-ticket($d10_sales)-f_fund($d10_sales)-$pcso10;
        }else{
            $d10_sales=0;
            $d10_out=0;
            $d10_tot=0;
        }
        if ($day_11) {
            $d11_sales=$day_11->tot_in;
            $d11_out=$day_11->tot_out;
            $d11_tot=$d11_sales-$d11_out-national($d11_sales)-local($d11_sales)-expenses($d11_sales)-loan($d11_sales)-ticket($d11_sales)-f_fund($d11_sales)-$pcso11;
        }else{
            $d11_sales=0;
            $d11_out=0;
            $d11_tot=0;
        }
        if ($day_12) {
            $d12_sales=$day_12->tot_in;
            $d12_out=$day_12->tot_out;
            $d12_tot=$d12_sales-$d12_out-national($d12_sales)-local($d12_sales)-expenses($d12_sales)-loan($d12_sales)-ticket($d12_sales)-f_fund($d12_sales)-$pcso12;
        }else{
            $d12_sales=0;
            $d12_out=0;
            $d12_tot=0;
        }
        if ($day_13) {
            $d13_sales=$day_13->tot_in;
            $d13_out=$day_13->tot_out;
            $d13_tot=$d13_sales-$d13_out-national($d13_sales)-local($d13_sales)-expenses($d13_sales)-loan($d13_sales)-ticket($d13_sales)-f_fund($d13_sales)-$pcso13;
        }else{
            $d13_sales=0;
            $d13_out=0;
            $d13_tot=0;
        }
        if ($day_14) {
            $d14_sales=$day_14->tot_in;
            $d14_out=$day_14->tot_out;
            $d14_tot=$d14_sales-$d14_out-national($d14_sales)-local($d14_sales)-expenses($d14_sales)-loan($d14_sales)-ticket($d14_sales)-f_fund($d14_sales)-$pcso14;
        }else{
            $d14_sales=0;
            $d14_out=0;
            $d14_tot=0;
        }
        if ($day_15) {
            $d15_sales=$day_15->tot_in;
            $d15_out=$day_15->tot_out;
            $d15_tot=$d15_sales-$d15_out-national($d15_sales)-local($d15_sales)-expenses($d15_sales)-loan($d15_sales)-ticket($d15_sales)-f_fund($d15_sales)-$pcso15;
        }else{
            $d15_sales=0;
            $d15_out=0;
            $d15_tot=0;
        }
        if ($day_16) {
            $d16_sales=$day_16->tot_in;
            $d16_out=$day_16->tot_out;
            $d16_tot=$d16_sales-$d16_out-national($d16_sales)-local($d16_sales)-expenses($d16_sales)-loan($d16_sales)-ticket($d16_sales)-f_fund($d16_sales)-$pcso16;
        }else{
            $d16_sales=0;
            $d16_out=0;
            $d16_tot=0;
        }
        if ($day_17) {
            $d17_sales=$day_17->tot_in;
            $d17_out=$day_17->tot_out;
            $d17_tot=$d17_sales-$d17_out-national($d17_sales)-local($d17_sales)-expenses($d17_sales)-loan($d17_sales)-ticket($d17_sales)-f_fund($d17_sales)-$pcso17;
        }else{
            $d17_sales=0;
            $d17_out=0;
            $d17_tot=0;
        }
        if ($day_18) {
            $d18_sales=$day_18->tot_in;
            $d18_out=$day_18->tot_out;
            $d18_tot=$d18_sales-$d18_out-national($d18_sales)-local($d18_sales)-expenses($d18_sales)-loan($d18_sales)-ticket($d18_sales)-f_fund($d18_sales)-$pcso18;
        }else{
            $d18_sales=0;
            $d18_out=0;
            $d18_tot=0;
        }
        if ($day_19) {
            $d19_sales=$day_19->tot_in;
            $d19_out=$day_19->tot_out;
            $d19_tot=$d19_sales-$d19_out-national($d19_sales)-local($d19_sales)-expenses($d19_sales)-loan($d19_sales)-ticket($d19_sales)-f_fund($d19_sales)-$pcso19;
        }else{
            $d19_sales=0;
            $d19_out=0;
            $d19_tot=0;
        }
        if ($day_20) {
            $d20_sales=$day_20->tot_in;
            $d20_out=$day_20->tot_out;
            $d20_tot=$d20_sales-$d20_out-national($d20_sales)-local($d20_sales)-expenses($d20_sales)-loan($d20_sales)-ticket($d20_sales)-f_fund($d20_sales)-$pcso20;
        }else{
            $d20_sales=0;
            $d20_out=0;
            $d20_tot=0;
        }
        if ($day_21) {
            $d21_sales=$day_21->tot_in;
            $d21_out=$day_21->tot_out;
            $d21_tot=$d21_sales-$d21_out-national($d21_sales)-local($d21_sales)-expenses($d21_sales)-loan($d21_sales)-ticket($d21_sales)-f_fund($d21_sales)-$pcso21;
        }else{
            $d21_sales=0;
            $d21_out=0;
            $d21_tot=0;
        }
        if ($day_22) {
            $d22_sales=$day_22->tot_in;
            $d22_out=$day_22->tot_out;
            $d22_tot=$d22_sales-$d22_out-national($d22_sales)-local($d22_sales)-expenses($d22_sales)-loan($d22_sales)-ticket($d22_sales)-f_fund($d22_sales)-$pcso22;
        }else{
            $d22_sales=0;
            $d22_out=0;
            $d22_tot=0;
        }
        if ($day_23) {
            $d23_sales=$day_23->tot_in;
            $d23_out=$day_23->tot_out;
            $d23_tot=$d23_sales-$d23_out-national($d23_sales)-local($d23_sales)-expenses($d23_sales)-loan($d23_sales)-ticket($d23_sales)-f_fund($d23_sales)-$pcso23;
        }else{
            $d23_sales=0;
            $d23_out=0;
            $d23_tot=0;
        }
        if ($day_24) {
            $d24_sales=$day_24->tot_in;
            $d24_out=$day_24->tot_out;
            $d24_tot=$d24_sales-$d24_out-national($d24_sales)-local($d24_sales)-expenses($d24_sales)-loan($d24_sales)-ticket($d24_sales)-f_fund($d24_sales)-$pcso24;
        }else{
            $d24_sales=0;
            $d24_out=0;
            $d24_tot=0;
        }
        if ($day_25) {
            $d25_sales=$day_25->tot_in;
            $d25_out=$day_25->tot_out;
            $d25_tot=$d25_sales-$d25_out-national($d25_sales)-local($d25_sales)-expenses($d25_sales)-loan($d25_sales)-ticket($d25_sales)-f_fund($d25_sales)-$pcso25;
        }else{
            $d25_sales=0;
            $d25_out=0;
            $d25_tot=0;
        }
        if ($day_26) {
            $d26_sales=$day_26->tot_in;
            $d26_out=$day_26->tot_out;
            $d26_tot=$d26_sales-$d26_out-national($d26_sales)-local($d26_sales)-expenses($d26_sales)-loan($d26_sales)-ticket($d26_sales)-f_fund($d26_sales)-$pcso26;
        }else{
            $d26_sales=0;
            $d26_out=0;
            $d26_tot=0;
        }
        if ($day_27) {
            $d27_sales=$day_27->tot_in;
            $d27_out=$day_27->tot_out;
            $d27_tot=$d27_sales-$d27_out-national($d27_sales)-local($d27_sales)-expenses($d27_sales)-loan($d27_sales)-ticket($d27_sales)-f_fund($d27_sales)-$pcso27;
        }else{
            $d27_sales=0;
            $d27_out=0;
            $d27_tot=0;
        }
        if ($day_28) {
            $d28_sales=$day_28->tot_in;
            $d28_out=$day_28->tot_out;
            $d28_tot=$d28_sales-$d28_out-national($d28_sales)-local($d28_sales)-expenses($d28_sales)-loan($d28_sales)-ticket($d28_sales)-f_fund($d28_sales)-$pcso28;
        }else{
            $d28_sales=0;
            $d28_out=0;
            $d28_tot=0;
        }
        if ($day_29) {
            $d29_sales=$day_29->tot_in;
            $d29_out=$day_29->tot_out;
            $d29_tot=$d29_sales-$d29_out-national($d29_sales)-local($d29_sales)-expenses($d29_sales)-loan($d29_sales)-ticket($d29_sales)-f_fund($d29_sales)-$pcso29;
        }else{
            $d29_sales=0;
            $d29_out=0;
            $d29_tot=0;
        }
        if ($day_30) {
            $d30_sales=$day_30->tot_in;
            $d30_out=$day_30->tot_out;
            $d30_tot=$d30_sales-$d30_out-national($d30_sales)-local($d30_sales)-expenses($d30_sales)-loan($d30_sales)-ticket($d30_sales)-f_fund($d30_sales)-$pcso30;
        }else{
            $d30_sales=0;
            $d30_out=0;
            $d30_tot=0;
        }
        if ($day_31) {
            $d31_sales=$day_31->tot_in;
            $d31_out=$day_31->tot_out;
            $d31_tot=$d31_sales-$d31_out-national($d31_sales)-local($d31_sales)-expenses($d31_sales)-loan($d31_sales)-ticket($d31_sales)-f_fund($d31_sales)-$pcso31;
        }else{
            $d31_sales=0;
            $d31_out=0;
            $d31_tot=0;
        }


        $sales_total=0;
        $out_total=0;
        $national_total=0;
        $local_total=0;
        $expenses_tot=0;
        $loan_total=0;
        $ticket_total=0;
        $f_fund_total=0;
        $pcso_total=0;
        $grand_total=0
        @endphp


        @for ($i = 1; $i < 32; $i++)
         @php
             $sales=${'d'.$i.'_sales'};
             $out=${'d'.$i.'_out'};
             $tot=${'d'.$i.'_tot'};
             $pcso=${'pcso'.$i};
         @endphp
   
            @php
                $sales_total+=$sales;
                $out_total+=$out;
                $national_total+=national($sales);
                $local_total+=local($sales);
                $expenses_tot+=expenses($sales);
                $loan_total+=loan($sales);
                $ticket_total+=ticket($sales);
                $f_fund_total+=f_fund($sales);
                $pcso_total+=$pcso;
                $grand_total+=$tot;
            @endphp
        @endfor



        @php
            $net_results_total= 
            $national_total-$la_national+
            $local_total-$la_local+
            $expenses_tot-$la_expenses+
            $loan_total-$la_loan+
            $f_fund_total-$la_flexible_fund+
            $ticket_total-$la_ticket+
            $pcso_total-$la_pcso;
        @endphp


            <table class="table table-bordered table-sm bg-white" >
                <thead >
                    <tr>
                        <th>MONTHLY ENDING BALANCE</th>
                        <th  class="text-right pr-4">{{ c($grand_total+$net_results_total) }}</th>
                    </tr>
                </thead>

            </table>

        </div>


    </div>
</div>







@php
   function national($x){
        $a=$x*.15;
        return $a;
    }
    function local($x){
        $a=$x*.08;
        return $a;
    }
    function expenses($x){
        $a=$x*.045;
        return $a;
    }
    function loan($x){
        $a=$x*.015;
        return $a;
    }
    function ticket($x){
        $a=$x*.015;
        return $a;
    }
    function f_fund($x){
        $a=$x*.01;
        return $a;
    }
    function pcso_rem($x){
        $a=$x*.00;
        return $a;
    }
    function total($x){
        $a=$x*.00;
        return $a;
    }

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
