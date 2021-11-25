<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\DailySale;
use App\Expenses;
use App\PreSale;
use App\AdditionalExpRec;
use App\CashOnHand; 
use Redirect;
use App\DailyCollectionSummary;

class AuditController extends Controller

{
    public function index()
    {
        return view('admin.index');
    }

    public function audit_report(Request $request)
    {
        $month=request('month');
        $year=request('year');

        $mdate=$year.'-'.$month.'-';
        $month_name=date('F', mktime(0, 0, 0, $month, 10));

        $xx= CashOnHand::select('id')->whereMonth('c_date',$month)->first();
        if($xx===null){
            return Redirect::back()->with('error', 'Reports unavailable.');   

        }
        $id=$xx->id-1;

        $coh= CashOnHand::whereMonth('c_date',$month)->latest()->first();
    
        $beg_bal=CashOnHand::where('id',$id)->first();

        $coh_day1= CashOnHand::select('cashonhand')->where('c_date',$mdate.'01')->sum('cashonhand');
        $coh_day2= CashOnHand::select('cashonhand')->where('c_date',$mdate.'02')->sum('cashonhand');
        $coh_day3= CashOnHand::select('cashonhand')->where('c_date',$mdate.'03')->sum('cashonhand');
        $coh_day4= CashOnHand::select('cashonhand')->where('c_date',$mdate.'04')->sum('cashonhand');
        $coh_day5= CashOnHand::select('cashonhand')->where('c_date',$mdate.'05')->sum('cashonhand');
        $coh_day6= CashOnHand::select('cashonhand')->where('c_date',$mdate.'06')->sum('cashonhand');
        $coh_day7= CashOnHand::select('cashonhand')->where('c_date',$mdate.'07')->sum('cashonhand');
        $coh_day8= CashOnHand::select('cashonhand')->where('c_date',$mdate.'08')->sum('cashonhand');
        $coh_day9= CashOnHand::select('cashonhand')->where('c_date',$mdate.'09')->sum('cashonhand');
        $coh_day10= CashOnHand::select('cashonhand')->where('c_date',$mdate.'10')->sum('cashonhand');
        $coh_day11= CashOnHand::select('cashonhand')->where('c_date',$mdate.'11')->sum('cashonhand');
        $coh_day12= CashOnHand::select('cashonhand')->where('c_date',$mdate.'12')->sum('cashonhand');
        $coh_day13= CashOnHand::select('cashonhand')->where('c_date',$mdate.'13')->sum('cashonhand');
        $coh_day14= CashOnHand::select('cashonhand')->where('c_date',$mdate.'14')->sum('cashonhand');
        $coh_day15= CashOnHand::select('cashonhand')->where('c_date',$mdate.'15')->sum('cashonhand');
        $coh_day16= CashOnHand::select('cashonhand')->where('c_date',$mdate.'16')->sum('cashonhand');
        $coh_day17= CashOnHand::select('cashonhand')->where('c_date',$mdate.'17')->sum('cashonhand');
        $coh_day18= CashOnHand::select('cashonhand')->where('c_date',$mdate.'18')->sum('cashonhand');
        $coh_day19= CashOnHand::select('cashonhand')->where('c_date',$mdate.'19')->sum('cashonhand');
        $coh_day20= CashOnHand::select('cashonhand')->where('c_date',$mdate.'20')->sum('cashonhand');
        $coh_day21= CashOnHand::select('cashonhand')->where('c_date',$mdate.'21')->sum('cashonhand');
        $coh_day22= CashOnHand::select('cashonhand')->where('c_date',$mdate.'22')->sum('cashonhand');
        $coh_day23= CashOnHand::select('cashonhand')->where('c_date',$mdate.'23')->sum('cashonhand');
        $coh_day24= CashOnHand::select('cashonhand')->where('c_date',$mdate.'24')->sum('cashonhand');
        $coh_day25= CashOnHand::select('cashonhand')->where('c_date',$mdate.'25')->sum('cashonhand');
        $coh_day26= CashOnHand::select('cashonhand')->where('c_date',$mdate.'26')->sum('cashonhand');
        $coh_day27= CashOnHand::select('cashonhand')->where('c_date',$mdate.'27')->sum('cashonhand');
        $coh_day28= CashOnHand::select('cashonhand')->where('c_date',$mdate.'28')->sum('cashonhand');
        $coh_day29= CashOnHand::select('cashonhand')->where('c_date',$mdate.'29')->sum('cashonhand');
        $coh_day30= CashOnHand::select('cashonhand')->where('c_date',$mdate.'30')->sum('cashonhand');
        $coh_day31= CashOnHand::select('cashonhand')->where('c_date',$mdate.'31')->sum('cashonhand');

        $day1= PreSale::where('date_of_sale',$mdate.'01')->active()->sum('net_sales');
        $day2= PreSale::where('date_of_sale',$mdate.'02')->active()->sum('net_sales');
        $day3= PreSale::where('date_of_sale',$mdate.'03')->active()->sum('net_sales');
        $day4= PreSale::where('date_of_sale',$mdate.'04')->active()->sum('net_sales');
        $day5= PreSale::where('date_of_sale',$mdate.'05')->active()->sum('net_sales');
        $day6= PreSale::where('date_of_sale',$mdate.'06')->active()->sum('net_sales');
        $day7= PreSale::where('date_of_sale',$mdate.'07')->active()->sum('net_sales');
        $day8= PreSale::where('date_of_sale',$mdate.'08')->active()->sum('net_sales');
        $day9= PreSale::where('date_of_sale',$mdate.'09')->active()->sum('net_sales');
        $day10= PreSale::where('date_of_sale',$mdate.'10')->active()->sum('net_sales');
        $day11= PreSale::where('date_of_sale',$mdate.'11')->active()->sum('net_sales');
        $day12= PreSale::where('date_of_sale',$mdate.'12')->active()->sum('net_sales');
        $day13= PreSale::where('date_of_sale',$mdate.'13')->active()->sum('net_sales');
        $day14= PreSale::where('date_of_sale',$mdate.'14')->active()->sum('net_sales');
        $day15= PreSale::where('date_of_sale',$mdate.'15')->active()->sum('net_sales');
        $day16= PreSale::where('date_of_sale',$mdate.'16')->active()->sum('net_sales');
        $day17= PreSale::where('date_of_sale',$mdate.'17')->active()->sum('net_sales');
        $day18= PreSale::where('date_of_sale',$mdate.'18')->active()->sum('net_sales');
        $day19= PreSale::where('date_of_sale',$mdate.'19')->active()->sum('net_sales');
        $day20= PreSale::where('date_of_sale',$mdate.'20')->active()->sum('net_sales');
        $day21= PreSale::where('date_of_sale',$mdate.'21')->active()->sum('net_sales');
        $day22= PreSale::where('date_of_sale',$mdate.'22')->active()->sum('net_sales');
        $day23= PreSale::where('date_of_sale',$mdate.'23')->active()->sum('net_sales');
        $day24= PreSale::where('date_of_sale',$mdate.'24')->active()->sum('net_sales');
        $day25= PreSale::where('date_of_sale',$mdate.'25')->active()->sum('net_sales');
        $day26= PreSale::where('date_of_sale',$mdate.'26')->active()->sum('net_sales');
        $day27= PreSale::where('date_of_sale',$mdate.'27')->active()->sum('net_sales');
        $day28= PreSale::where('date_of_sale',$mdate.'28')->active()->sum('net_sales');
        $day29= PreSale::where('date_of_sale',$mdate.'29')->active()->sum('net_sales');
        $day30= PreSale::where('date_of_sale',$mdate.'30')->active()->sum('net_sales');
        $day31= PreSale::where('date_of_sale',$mdate.'31')->active()->sum('net_sales');

        $ds_day1= DailySale::where('date_of_sale',$mdate.'01')->active()->sum('net_sales');
        $ds_day2= DailySale::where('date_of_sale',$mdate.'02')->active()->sum('net_sales');
        $ds_day3= DailySale::where('date_of_sale',$mdate.'03')->active()->sum('net_sales');
        $ds_day4= DailySale::where('date_of_sale',$mdate.'04')->active()->sum('net_sales');
        $ds_day5= DailySale::where('date_of_sale',$mdate.'05')->active()->sum('net_sales');
        $ds_day6= DailySale::where('date_of_sale',$mdate.'06')->active()->sum('net_sales');
        $ds_day7= DailySale::where('date_of_sale',$mdate.'07')->active()->sum('net_sales');
        $ds_day8= DailySale::where('date_of_sale',$mdate.'08')->active()->sum('net_sales');
        $ds_day9= DailySale::where('date_of_sale',$mdate.'09')->active()->sum('net_sales');
        $ds_day10= DailySale::where('date_of_sale',$mdate.'10')->active()->sum('net_sales');
        $ds_day11= DailySale::where('date_of_sale',$mdate.'11')->active()->sum('net_sales');
        $ds_day12= DailySale::where('date_of_sale',$mdate.'12')->active()->sum('net_sales');
        $ds_day13= DailySale::where('date_of_sale',$mdate.'13')->active()->sum('net_sales');
        $ds_day14= DailySale::where('date_of_sale',$mdate.'14')->active()->sum('net_sales');
        $ds_day15= DailySale::where('date_of_sale',$mdate.'15')->active()->sum('net_sales');
        $ds_day16= DailySale::where('date_of_sale',$mdate.'16')->active()->sum('net_sales');
        $ds_day17= DailySale::where('date_of_sale',$mdate.'17')->active()->sum('net_sales');
        $ds_day18= DailySale::where('date_of_sale',$mdate.'18')->active()->sum('net_sales');
        $ds_day19= DailySale::where('date_of_sale',$mdate.'19')->active()->sum('net_sales');
        $ds_day20= DailySale::where('date_of_sale',$mdate.'20')->active()->sum('net_sales');
        $ds_day21= DailySale::where('date_of_sale',$mdate.'21')->active()->sum('net_sales');
        $ds_day22= DailySale::where('date_of_sale',$mdate.'22')->active()->sum('net_sales');
        $ds_day23= DailySale::where('date_of_sale',$mdate.'23')->active()->sum('net_sales');
        $ds_day24= DailySale::where('date_of_sale',$mdate.'24')->active()->sum('net_sales');
        $ds_day25= DailySale::where('date_of_sale',$mdate.'25')->active()->sum('net_sales');
        $ds_day26= DailySale::where('date_of_sale',$mdate.'26')->active()->sum('net_sales');
        $ds_day27= DailySale::where('date_of_sale',$mdate.'27')->active()->sum('net_sales');
        $ds_day28= DailySale::where('date_of_sale',$mdate.'28')->active()->sum('net_sales');
        $ds_day29= DailySale::where('date_of_sale',$mdate.'29')->active()->sum('net_sales');
        $ds_day30= DailySale::where('date_of_sale',$mdate.'30')->active()->sum('net_sales');
        $ds_day31= DailySale::where('date_of_sale',$mdate.'31')->active()->sum('net_sales');

        $wrong_dated_exp= Expenses::whereMonth('date_encoded',$month)->whereMonth('e_date','!=',$month)->active()->get();


        // DCB
        for($i=1;$i<32;$i++){
            $date=$year.'-'.$month.'-'.sprintf("%02d", $i);
            ${'d'.$i.'_exp'} = Expenses:: where('date_encoded',$date)->active()->sum('amount');
            ${'d'.$i.'_in'} = DailySale:: where('date_encoded',$date)->active()->sum('tot_in');
            ${'d'.$i.'_out'} = DailySale:: where('date_encoded',$date)->active()->sum('tot_out');
            ${'d'.$i.'_cashin'} = AdditionalExpRec:: where('date_encoded',$date)->active()->sum('cash_in');
            ${'d'.$i.'_cashout'} = AdditionalExpRec:: where('date_encoded',$date)->active()->sum('cash_out');
        }
        
        $cashin=AdditionalExpRec:: whereMonth('date_of_receipt',$month)->active()->sum('cash_in');
        $cashout=AdditionalExpRec:: whereMonth('date_of_receipt',$month)->active()->sum('cash_out');


        // gen-report
        $mdate=$year.'-'.$month.'-';

        $day_1= DailyCollectionSummary::where('date_of_sale',$mdate.'01')->active()->first();
        $day_2= DailyCollectionSummary::where('date_of_sale',$mdate.'02')->active()->first();
        $day_3= DailyCollectionSummary::where('date_of_sale',$mdate.'03')->active()->first();
        $day_4= DailyCollectionSummary::where('date_of_sale',$mdate.'04')->active()->first();
        $day_5= DailyCollectionSummary::where('date_of_sale',$mdate.'05')->active()->first();
        $day_6= DailyCollectionSummary::where('date_of_sale',$mdate.'06')->active()->first();
        $day_7= DailyCollectionSummary::where('date_of_sale',$mdate.'07')->active()->first();
        $day_8= DailyCollectionSummary::where('date_of_sale',$mdate.'08')->active()->first();
        $day_9= DailyCollectionSummary::where('date_of_sale',$mdate.'09')->active()->first();
        $day_10= DailyCollectionSummary::where('date_of_sale',$mdate.'10')->active()->first();
        $day_11= DailyCollectionSummary::where('date_of_sale',$mdate.'11')->active()->first();
        $day_12= DailyCollectionSummary::where('date_of_sale',$mdate.'12')->active()->first();
        $day_13= DailyCollectionSummary::where('date_of_sale',$mdate.'13')->active()->first();
        $day_14= DailyCollectionSummary::where('date_of_sale',$mdate.'14')->active()->first();
        $day_15= DailyCollectionSummary::where('date_of_sale',$mdate.'15')->active()->first();
        $day_16= DailyCollectionSummary::where('date_of_sale',$mdate.'16')->active()->first();
        $day_17= DailyCollectionSummary::where('date_of_sale',$mdate.'17')->active()->first();
        $day_18= DailyCollectionSummary::where('date_of_sale',$mdate.'18')->active()->first();
        $day_19= DailyCollectionSummary::where('date_of_sale',$mdate.'19')->active()->first();
        $day_20= DailyCollectionSummary::where('date_of_sale',$mdate.'20')->active()->first();
        $day_21= DailyCollectionSummary::where('date_of_sale',$mdate.'21')->active()->first();
        $day_22= DailyCollectionSummary::where('date_of_sale',$mdate.'22')->active()->first();
        $day_23= DailyCollectionSummary::where('date_of_sale',$mdate.'23')->active()->first();
        $day_24= DailyCollectionSummary::where('date_of_sale',$mdate.'24')->active()->first();
        $day_25= DailyCollectionSummary::where('date_of_sale',$mdate.'25')->active()->first();
        $day_26= DailyCollectionSummary::where('date_of_sale',$mdate.'26')->active()->first();
        $day_27= DailyCollectionSummary::where('date_of_sale',$mdate.'27')->active()->first();
        $day_28= DailyCollectionSummary::where('date_of_sale',$mdate.'28')->active()->first();
        $day_29= DailyCollectionSummary::where('date_of_sale',$mdate.'29')->active()->first();
        $day_30= DailyCollectionSummary::where('date_of_sale',$mdate.'30')->active()->first();
        $day_31= DailyCollectionSummary::where('date_of_sale',$mdate.'31')->active()->first();
    
        $pcso1 = Expenses::where('e_date',$mdate.'01')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso2 = Expenses::where('e_date',$mdate.'02')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso3 = Expenses::where('e_date',$mdate.'03')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso4 = Expenses::where('e_date',$mdate.'04')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso5 = Expenses::where('e_date',$mdate.'05')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso6 = Expenses::where('e_date',$mdate.'06')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso7 = Expenses::where('e_date',$mdate.'07')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso8 = Expenses::where('e_date',$mdate.'08')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso9 = Expenses::where('e_date',$mdate.'09')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso10 = Expenses::where('e_date',$mdate.'10')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso11 = Expenses::where('e_date',$mdate.'11')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso12 = Expenses::where('e_date',$mdate.'12')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso13 = Expenses::where('e_date',$mdate.'13')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso14 = Expenses::where('e_date',$mdate.'14')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso15 = Expenses::where('e_date',$mdate.'15')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso16 = Expenses::where('e_date',$mdate.'16')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso17 = Expenses::where('e_date',$mdate.'17')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso18 = Expenses::where('e_date',$mdate.'18')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso19 = Expenses::where('e_date',$mdate.'19')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso20 = Expenses::where('e_date',$mdate.'20')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso21 = Expenses::where('e_date',$mdate.'21')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso22 = Expenses::where('e_date',$mdate.'22')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso23 = Expenses::where('e_date',$mdate.'23')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso24 = Expenses::where('e_date',$mdate.'24')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso25 = Expenses::where('e_date',$mdate.'25')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso26 = Expenses::where('e_date',$mdate.'26')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso27 = Expenses::where('e_date',$mdate.'27')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso28 = Expenses::where('e_date',$mdate.'28')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso29 = Expenses::where('e_date',$mdate.'29')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso30 = Expenses::where('e_date',$mdate.'30')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $pcso31= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    
        $la_national= Expenses::whereMonth('e_date', '=', $month)->where('type_of_exp','NATIONAL')->active()->sum('amount');
        $la_local= Expenses::whereMonth('e_date', '=', $month)->where('type_of_exp','LOCAL')->active()->sum('amount');
        $la_loan= Expenses::whereMonth('e_date', '=', $month)->where('type_of_exp','LOAN')->active()->sum('amount');
        $la_ticket= Expenses::whereMonth('e_date', '=', $month)->where('type_of_exp','TICKET')->active()->sum('amount');
        $la_pcso= Expenses::whereMonth('e_date', '=', $month)->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
        $la_flexible_fund= Expenses::whereMonth('e_date', '=', $month)->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');
        $la_expenses= Expenses::whereMonth('e_date', '=', $month)
                        ->where('type_of_exp','!=','LOAN')
                        ->where('type_of_exp','!=','PCSO DAILY REMITTANCE')
                        ->where('type_of_exp','!=','NATIONAL') 
                        ->where('type_of_exp','!=','LOCAL')
                        ->where('type_of_exp','!=','TICKET')
                        ->where('type_of_exp','!=','FLEXIBLE FUND')
                        ->active()->sum('amount');
       

        return view('admin.audit',compact('beg_bal','wrong_dated_exp',
            'day1','day2','day3','day4','day5',
            'day6','day7','day8','day9','day10',
            'day11','day12','day13','day14','day15',
            'day16','day17','day18','day19','day20',
            'day21','day22','day23','day24','day25',
            'day26','day27','day28','day29','day30','day31',

            'day_1','day_2','day_3','day_4','day_5','day_6','day_7','day_8','day_9','day_10',
            'day_11','day_12','day_13','day_14','day_15','day_16','day_17','day_18','day_19','day_20',
            'day_21','day_22','day_23','day_24','day_25','day_26','day_27','day_28','day_29','day_30','day_31',
            'pcso1','pcso2','pcso3','pcso4','pcso5','pcso6','pcso7','pcso8','pcso9','pcso10',
            'pcso11','pcso12','pcso13','pcso14','pcso15','pcso16','pcso17','pcso18','pcso19','pcso20',
            'pcso21','pcso22','pcso23','pcso24','pcso25','pcso26','pcso27','pcso28','pcso29','pcso30','pcso31',
            'la_national','la_local','la_expenses','la_loan','la_ticket','la_pcso','la_flexible_fund',

            'ds_day1','ds_day2','ds_day3','ds_day4','ds_day5',
            'ds_day6','ds_day7','ds_day8','ds_day9','ds_day10',
            'ds_day11','ds_day12','ds_day13','ds_day14','ds_day15',
            'ds_day16','ds_day17','ds_day18','ds_day19','ds_day20',
            'ds_day21','ds_day22','ds_day23','ds_day24','ds_day25',
            'ds_day26','ds_day27','ds_day28','ds_day29','ds_day30','ds_day31',
            'month_name','year',

            'd1_exp','d1_in','d1_out','d1_cashin','d1_cashout',
            'd2_exp','d2_in','d2_out','d2_cashin','d2_cashout',
            'd3_exp','d3_in','d3_out','d3_cashin','d3_cashout',
            'd4_exp','d4_in','d4_out','d4_cashin','d4_cashout',
            'd5_exp','d5_in','d5_out','d5_cashin','d5_cashout',
            'd6_exp','d6_in','d6_out','d6_cashin','d6_cashout',
            'd7_exp','d7_in','d7_out','d7_cashin','d7_cashout',
            'd8_exp','d8_in','d8_out','d8_cashin','d8_cashout',
            'd9_exp','d9_in','d9_out','d9_cashin','d9_cashout',
            'd10_exp','d10_in','d10_out','d10_cashin','d10_cashout',
            'd11_exp','d11_in','d11_out','d11_cashin','d11_cashout',
            'd12_exp','d12_in','d12_out','d12_cashin','d12_cashout',
            'd13_exp','d13_in','d13_out','d13_cashin','d13_cashout',
            'd14_exp','d14_in','d14_out','d14_cashin','d14_cashout',
            'd15_exp','d15_in','d15_out','d15_cashin','d15_cashout',
            'd16_exp','d16_in','d16_out','d16_cashin','d16_cashout',
            'd17_exp','d17_in','d17_out','d17_cashin','d17_cashout',
            'd18_exp','d18_in','d18_out','d18_cashin','d18_cashout',
            'd19_exp','d19_in','d19_out','d19_cashin','d19_cashout',
            'd20_exp','d20_in','d20_out','d20_cashin','d20_cashout',
            'd21_exp','d21_in','d21_out','d21_cashin','d21_cashout',
            'd22_exp','d22_in','d22_out','d22_cashin','d22_cashout',
            'd23_exp','d23_in','d23_out','d23_cashin','d23_cashout',
            'd24_exp','d24_in','d24_out','d24_cashin','d24_cashout',
            'd25_exp','d25_in','d25_out','d25_cashin','d25_cashout',
            'd26_exp','d26_in','d26_out','d26_cashin','d26_cashout',
            'd27_exp','d27_in','d27_out','d27_cashin','d27_cashout',
            'd28_exp','d28_in','d28_out','d28_cashin','d28_cashout',
            'd29_exp','d29_in','d29_out','d29_cashin','d29_cashout',
            'd30_exp','d30_in','d30_out','d30_cashin','d30_cashout',
            'd31_exp','d31_in','d31_out','d31_cashin','d31_cashout',

            'coh_day1','coh_day2','coh_day3','coh_day4','coh_day5',
            'coh_day6','coh_day7','coh_day8','coh_day9','coh_day10',
            'coh_day11','coh_day12','coh_day13','coh_day14','coh_day15',
            'coh_day16','coh_day17','coh_day18','coh_day19','coh_day20',
            'coh_day21','coh_day22','coh_day23','coh_day24','coh_day25',
            'coh_day26','coh_day27','coh_day28','coh_day29','coh_day30',
            'coh_day31',

            'cashin','cashout','coh'
            
           
        
        ));


    }
}
 