@extends('layouts.app')
@section('page-css')
    <link href="{{ asset('css/monthly_report.css') }}" rel="stylesheet">
@endsection


@section('content')
<div class="fluid m-4" style="background-color: #fff">
    <div class="col-lg-12 text-center">
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
                    <img src="{{ asset('images/kings.png') }}" alt="Company Logo" class="logo" width="150px">
                    <h4>KING'S 810 GAMING CORPORATION</h4>
                    <h5>NUEVA VIZCAYA - {{ $monthName." ".$year }}</h5>
                </div>
                <div class="col-lg-3">
                    <form action="{{ route('PDF-monthly-report') }}" method="GET">
                        <input type="hidden" name="month" value="{{ $month }}">
                        <input type="hidden" name="year" value="{{ $year }}">
                        <input type="submit" value="Convert to PDF">
                    </form>
                </div>
            </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">

                <table  id="dcb">
                    <thead id="head1">
                        <tr class="text-center">
                            <th >DATE</th>
                            <th>TABLE SALES</th>
                            <th>TABLE OUT</th>
                            <th>NATIONAL 15%</th>
                            <th>LOCAL 8%</th>
                            <th>EXPENSES 4.5</th>
                            <th>LOAN 1.5%</th>
                            <th>TICKET 1.5%</th>
                            <th>FLEXIBLE FUND 1%</th>
                            <th>PCSO REMITTANCE</th>
                            <th>TOTAL GAIN/<span>LOSS</span></th>
                        </tr>
                    </thead>
                    </thead>
                    <tbody  id="body" >
                        @php
                        if ($day1) {
                            $d1_sales=$day1->tot_in;
                            $d1_out=$day1->tot_out;
                            $d1_tot=$d1_sales-$d1_out-national($d1_sales)-local($d1_sales)-expenses($d1_sales)-loan($d1_sales)-ticket($d1_sales)-f_fund($d1_sales)-$pcso1;
                        }else{
                            $d1_sales=0;
                            $d1_out=0;
                            $d1_tot=0;
                        }
                        if ($day2) {
                            $d2_sales=$day2->tot_in;
                            $d2_out=$day2->tot_out;
                            $d2_tot=$d2_sales-$d2_out-national($d2_sales)-local($d2_sales)-expenses($d2_sales)-loan($d2_sales)-ticket($d2_sales)-f_fund($d2_sales)-$pcso2;
                        }else{
                            $d2_sales=0;
                            $d2_out=0;
                            $d2_tot=0;
                        }
                        if ($day3) {
                            $d3_sales=$day3->tot_in;
                            $d3_out=$day3->tot_out;
                            $d3_tot=$d3_sales-$d3_out-national($d3_sales)-local($d3_sales)-expenses($d3_sales)-loan($d3_sales)-ticket($d3_sales)-f_fund($d3_sales)-$pcso3;
                        }else{
                            $d3_sales=0;
                            $d3_out=0;
                            $d3_tot=0;
                        }
                        if ($day4) {
                            $d4_sales=$day4->tot_in;
                            $d4_out=$day4->tot_out;
                            $d4_tot=$d4_sales-$d4_out-national($d4_sales)-local($d4_sales)-expenses($d4_sales)-loan($d4_sales)-ticket($d4_sales)-f_fund($d4_sales)-$pcso4;
                        }else{
                            $d4_sales=0;
                            $d4_out=0;
                            $d4_tot=0;
                        }
                        if ($day5) {
                            $d5_sales=$day5->tot_in;
                            $d5_out=$day5->tot_out;
                            $d5_tot=$d5_sales-$d5_out-national($d5_sales)-local($d5_sales)-expenses($d5_sales)-loan($d5_sales)-ticket($d5_sales)-f_fund($d5_sales)-$pcso5;
                        }else{
                            $d5_sales=0;
                            $d5_out=0;
                            $d5_tot=0;
                        }
                        if ($day6) {
                            $d6_sales=$day6->tot_in;
                            $d6_out=$day6->tot_out;
                            $d6_tot=$d6_sales-$d6_out-national($d6_sales)-local($d6_sales)-expenses($d6_sales)-loan($d6_sales)-ticket($d6_sales)-f_fund($d6_sales)-$pcso6;
                        }else{
                            $d6_sales=0;
                            $d6_out=0;
                            $d6_tot=0;
                        }
                        if ($day7) {
                            $d7_sales=$day7->tot_in;
                            $d7_out=$day7->tot_out;
                            $d7_tot=$d7_sales-$d7_out-national($d7_sales)-local($d7_sales)-expenses($d7_sales)-loan($d7_sales)-ticket($d7_sales)-f_fund($d7_sales)-$pcso7;
                        }else{
                            $d7_sales=0;
                            $d7_out=0;
                            $d7_tot=0;
                        }
                        if ($day8) {
                            $d8_sales=$day8->tot_in;
                            $d8_out=$day8->tot_out;
                            $d8_tot=$d8_sales-$d8_out-national($d8_sales)-local($d8_sales)-expenses($d8_sales)-loan($d8_sales)-ticket($d8_sales)-f_fund($d8_sales)-$pcso8;
                        }else{
                            $d8_sales=0;
                            $d8_out=0;
                            $d8_tot=0;
                        }
                        if ($day9) {
                            $d9_sales=$day9->tot_in;
                            $d9_out=$day9->tot_out;
                            $d9_tot=$d9_sales-$d9_out-national($d9_sales)-local($d9_sales)-expenses($d9_sales)-loan($d9_sales)-ticket($d9_sales)-f_fund($d9_sales)-$pcso9;
                        }else{
                            $d9_sales=0;
                            $d9_out=0;
                            $d9_tot=0;
                        }
                        if ($day10) {
                            $d10_sales=$day10->tot_in;
                            $d10_out=$day10->tot_out;
                            $d10_tot=$d10_sales-$d10_out-national($d10_sales)-local($d10_sales)-expenses($d10_sales)-loan($d10_sales)-ticket($d10_sales)-f_fund($d10_sales)-$pcso10;
                        }else{
                            $d10_sales=0;
                            $d10_out=0;
                            $d10_tot=0;
                        }
                        if ($day11) {
                            $d11_sales=$day11->tot_in;
                            $d11_out=$day11->tot_out;
                            $d11_tot=$d11_sales-$d11_out-national($d11_sales)-local($d11_sales)-expenses($d11_sales)-loan($d11_sales)-ticket($d11_sales)-f_fund($d11_sales)-$pcso11;
                        }else{
                            $d11_sales=0;
                            $d11_out=0;
                            $d11_tot=0;
                        }
                        if ($day12) {
                            $d12_sales=$day12->tot_in;
                            $d12_out=$day12->tot_out;
                            $d12_tot=$d12_sales-$d12_out-national($d12_sales)-local($d12_sales)-expenses($d12_sales)-loan($d12_sales)-ticket($d12_sales)-f_fund($d12_sales)-$pcso12;
                        }else{
                            $d12_sales=0;
                            $d12_out=0;
                            $d12_tot=0;
                        }
                        if ($day13) {
                            $d13_sales=$day13->tot_in;
                            $d13_out=$day13->tot_out;
                            $d13_tot=$d13_sales-$d13_out-national($d13_sales)-local($d13_sales)-expenses($d13_sales)-loan($d13_sales)-ticket($d13_sales)-f_fund($d13_sales)-$pcso13;
                        }else{
                            $d13_sales=0;
                            $d13_out=0;
                            $d13_tot=0;
                        }
                        if ($day14) {
                            $d14_sales=$day14->tot_in;
                            $d14_out=$day14->tot_out;
                            $d14_tot=$d14_sales-$d14_out-national($d14_sales)-local($d14_sales)-expenses($d14_sales)-loan($d14_sales)-ticket($d14_sales)-f_fund($d14_sales)-$pcso14;
                        }else{
                            $d14_sales=0;
                            $d14_out=0;
                            $d14_tot=0;
                        }
                        if ($day15) {
                            $d15_sales=$day15->tot_in;
                            $d15_out=$day15->tot_out;
                            $d15_tot=$d15_sales-$d15_out-national($d15_sales)-local($d15_sales)-expenses($d15_sales)-loan($d15_sales)-ticket($d15_sales)-f_fund($d15_sales)-$pcso15;
                        }else{
                            $d15_sales=0;
                            $d15_out=0;
                            $d15_tot=0;
                        }
                        if ($day16) {
                            $d16_sales=$day16->tot_in;
                            $d16_out=$day16->tot_out;
                            $d16_tot=$d16_sales-$d16_out-national($d16_sales)-local($d16_sales)-expenses($d16_sales)-loan($d16_sales)-ticket($d16_sales)-f_fund($d16_sales)-$pcso16;
                        }else{
                            $d16_sales=0;
                            $d16_out=0;
                            $d16_tot=0;
                        }
                        if ($day17) {
                            $d17_sales=$day17->tot_in;
                            $d17_out=$day17->tot_out;
                            $d17_tot=$d17_sales-$d17_out-national($d17_sales)-local($d17_sales)-expenses($d17_sales)-loan($d17_sales)-ticket($d17_sales)-f_fund($d17_sales)-$pcso17;
                        }else{
                            $d17_sales=0;
                            $d17_out=0;
                            $d17_tot=0;
                        }
                        if ($day18) {
                            $d18_sales=$day18->tot_in;
                            $d18_out=$day18->tot_out;
                            $d18_tot=$d18_sales-$d18_out-national($d18_sales)-local($d18_sales)-expenses($d18_sales)-loan($d18_sales)-ticket($d18_sales)-f_fund($d18_sales)-$pcso18;
                        }else{
                            $d18_sales=0;
                            $d18_out=0;
                            $d18_tot=0;
                        }
                        if ($day19) {
                            $d19_sales=$day19->tot_in;
                            $d19_out=$day19->tot_out;
                            $d19_tot=$d19_sales-$d19_out-national($d19_sales)-local($d19_sales)-expenses($d19_sales)-loan($d19_sales)-ticket($d19_sales)-f_fund($d19_sales)-$pcso19;
                        }else{
                            $d19_sales=0;
                            $d19_out=0;
                            $d19_tot=0;
                        }
                        if ($day20) {
                            $d20_sales=$day20->tot_in;
                            $d20_out=$day20->tot_out;
                            $d20_tot=$d20_sales-$d20_out-national($d20_sales)-local($d20_sales)-expenses($d20_sales)-loan($d20_sales)-ticket($d20_sales)-f_fund($d20_sales)-$pcso20;
                        }else{
                            $d20_sales=0;
                            $d20_out=0;
                            $d20_tot=0;
                        }
                        if ($day21) {
                            $d21_sales=$day21->tot_in;
                            $d21_out=$day21->tot_out;
                            $d21_tot=$d21_sales-$d21_out-national($d21_sales)-local($d21_sales)-expenses($d21_sales)-loan($d21_sales)-ticket($d21_sales)-f_fund($d21_sales)-$pcso21;
                        }else{
                            $d21_sales=0;
                            $d21_out=0;
                            $d21_tot=0;
                        }
                        if ($day22) {
                            $d22_sales=$day22->tot_in;
                            $d22_out=$day22->tot_out;
                            $d22_tot=$d22_sales-$d22_out-national($d22_sales)-local($d22_sales)-expenses($d22_sales)-loan($d22_sales)-ticket($d22_sales)-f_fund($d22_sales)-$pcso22;
                        }else{
                            $d22_sales=0;
                            $d22_out=0;
                            $d22_tot=0;
                        }
                        if ($day23) {
                            $d23_sales=$day23->tot_in;
                            $d23_out=$day23->tot_out;
                            $d23_tot=$d23_sales-$d23_out-national($d23_sales)-local($d23_sales)-expenses($d23_sales)-loan($d23_sales)-ticket($d23_sales)-f_fund($d23_sales)-$pcso23;
                        }else{
                            $d23_sales=0;
                            $d23_out=0;
                            $d23_tot=0;
                        }
                        if ($day24) {
                            $d24_sales=$day24->tot_in;
                            $d24_out=$day24->tot_out;
                            $d24_tot=$d24_sales-$d24_out-national($d24_sales)-local($d24_sales)-expenses($d24_sales)-loan($d24_sales)-ticket($d24_sales)-f_fund($d24_sales)-$pcso24;
                        }else{
                            $d24_sales=0;
                            $d24_out=0;
                            $d24_tot=0;
                        }
                        if ($day25) {
                            $d25_sales=$day25->tot_in;
                            $d25_out=$day25->tot_out;
                            $d25_tot=$d25_sales-$d25_out-national($d25_sales)-local($d25_sales)-expenses($d25_sales)-loan($d25_sales)-ticket($d25_sales)-f_fund($d25_sales)-$pcso25;
                        }else{
                            $d25_sales=0;
                            $d25_out=0;
                            $d25_tot=0;
                        }
                        if ($day26) {
                            $d26_sales=$day26->tot_in;
                            $d26_out=$day26->tot_out;
                            $d26_tot=$d26_sales-$d26_out-national($d26_sales)-local($d26_sales)-expenses($d26_sales)-loan($d26_sales)-ticket($d26_sales)-f_fund($d26_sales)-$pcso26;
                        }else{
                            $d26_sales=0;
                            $d26_out=0;
                            $d26_tot=0;
                        }
                        if ($day27) {
                            $d27_sales=$day27->tot_in;
                            $d27_out=$day27->tot_out;
                            $d27_tot=$d27_sales-$d27_out-national($d27_sales)-local($d27_sales)-expenses($d27_sales)-loan($d27_sales)-ticket($d27_sales)-f_fund($d27_sales)-$pcso27;
                        }else{
                            $d27_sales=0;
                            $d27_out=0;
                            $d27_tot=0;
                        }
                        if ($day28) {
                            $d28_sales=$day28->tot_in;
                            $d28_out=$day28->tot_out;
                            $d28_tot=$d28_sales-$d28_out-national($d28_sales)-local($d28_sales)-expenses($d28_sales)-loan($d28_sales)-ticket($d28_sales)-f_fund($d28_sales)-$pcso28;
                        }else{
                            $d28_sales=0;
                            $d28_out=0;
                            $d28_tot=0;
                        }
                        if ($day29) {
                            $d29_sales=$day29->tot_in;
                            $d29_out=$day29->tot_out;
                            $d29_tot=$d29_sales-$d29_out-national($d29_sales)-local($d29_sales)-expenses($d29_sales)-loan($d29_sales)-ticket($d29_sales)-f_fund($d29_sales)-$pcso29;
                        }else{
                            $d29_sales=0;
                            $d29_out=0;
                            $d29_tot=0;
                        }
                        if ($day30) {
                            $d30_sales=$day30->tot_in;
                            $d30_out=$day30->tot_out;
                            $d30_tot=$d30_sales-$d30_out-national($d30_sales)-local($d30_sales)-expenses($d30_sales)-loan($d30_sales)-ticket($d30_sales)-f_fund($d30_sales)-$pcso30;
                        }else{
                            $d30_sales=0;
                            $d30_out=0;
                            $d30_tot=0;
                        }
                        if ($day31) {
                            $d31_sales=$day31->tot_in;
                            $d31_out=$day31->tot_out;
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
                            <tr>
                                <td class="text-center">{{$i.'-'.$monthName1 }}</td>
                                <td>{{ c($sales) }}</td>
                                <td>{{ c($out) }}</td>
                                <td>{{ c(national($sales)) }}</td>
                                <td>{{ c(local($sales)) }}</td>
                                <td>{{ c(expenses($sales)) }}</td>
                                <td>{{ c(loan($sales)) }}</td>
                                <td>{{ c(ticket($sales)) }}</td>
                                <td>{{ c(f_fund($sales)) }}</td>
                                <td>{{ c1($pcso) }}</td>
                                @if ($tot<0)
                                    <td class="text-danger">{{ c($tot) }}</td>
                                @else
                                    <td>{{ c($tot) }}</td>
                                @endif
                            </tr>

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


                        <tr style="background-color:#c7f2d2 ">
                            <td class="total">TOTAL</td>
                            <td class="total">{{ c($sales_total) }}</td>
                            <td class="total">{{ c($out_total) }}</td>
                            <td class="total">{{ c($national_total) }}</td>
                            <td class="total">{{ c($local_total) }}</td>
                            <td class="total">{{ c($expenses_tot) }}</td>
                            <td class="total">{{ c($loan_total) }}</td>
                            <td class="total">{{ c($ticket_total) }}</td>
                            <td class="total">{{ c($f_fund_total) }}</td>
                            <td class="total">{{ c($pcso_total) }}</td>
                            <td class="total" style="background-color: #6ea6f5">{{ c($grand_total) }}</td>
                        </tr>


                        <tr class="bottom">
                            <td></td>
                            <td></td>
                            <td>LESS ACTUAL:</td>
                            <td>{{ c($la_national) }}</td>
                            <td>{{ c($la_local) }}</td>
                            <td>{{ c($la_expenses) }}</td>
                            <td>{{ c($la_loan) }}</td>
                            <td>{{ c($la_ticket) }}</td>
                            <td>0</td>
                            <td>{{ c($la_pcso) }}</td>
                            <td></td>
                        </tr>
                        @php
                            $net_results_total= 
                            $national_total-$la_national+
                            $local_total-$la_local+
                            $expenses_tot-$la_expenses+
                            $loan_total-$la_loan+
                            $f_fund_total+
                            $ticket_total-$la_ticket+
                            $pcso_total-$la_pcso;
                        @endphp
                        <tr class="bottom">
                            <td></td>
                            <td></td>
                            <td>NET RESULTS:</td>
                            @if ($national_total-$la_national<0)
                                <td class="t_red">{{ c($national_total-$la_national) }}</td>
                            @else
                                <td>{{ c($national_total-$la_national) }}</td>
                            @endif
                            @if ($local_total-$la_local<0)
                                <td class="t_red">{{ c($local_total-$la_local) }}</td>
                            @else
                                <td>{{ c($local_total-$la_local) }}</td>
                            @endif
                            @if ($expenses_tot-$la_expenses<0)
                                <td class="t_red">{{ c($expenses_tot-$la_expenses) }}</td>
                            @else
                                <td>{{ c($expenses_tot-$la_expenses) }}</td>
                            @endif
                            @if ($loan_total-$la_loan<0)
                                <td class="t_red">{{ c($loan_total-$la_loan) }}</td>
                            @else
                                <td>{{ c($loan_total-$la_loan) }}</td>
                            @endif
                            @if ($ticket_total-$la_ticket<0)
                                <td class="t_red">{{ c($ticket_total-$la_ticket) }}</td>
                            @else
                                <td>{{ c($ticket_total-$la_ticket) }}</td>
                            @endif
                            <td>{{ c($f_fund_total) }}</td>
                            @if ($pcso_total-$la_pcso<0)
                                <td class="t_red">{{ c($pcso_total-$la_pcso) }}</td>
                            @else
                                <td>{{ c($pcso_total-$la_pcso) }}</td>
                            @endif
                            <td  style="background-color: #eba134;font-size:15px">{{  c($net_results_total) }}</td>
                        </tr>




                        <tr>
                            <td colspan="8"></td>
                            <td colspan="2" class="end_bal">ENDING BALANCE:</td>
                            <td class="end_bal">{{ c($grand_total+$net_results_total) }}</td>
                        </tr>  
                    </tbody>
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
