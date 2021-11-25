<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DailySale;
use App\Expenses;
use App\Receipt;
use App\Sale;
use App\DailyCollectionSummary;
use App\PreSale;
use App\AdditionalExpRec;
use App\CashOnHand;
use Auth;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('revalidate');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reports.index-report');

    }

    public function gen_monthly_sales()
    {

        return view('reports.gen-monthly-sales');
    }
    public function gen_station_expenses()
    {

        return view('reports.gen-station-report');
    }
    public function gen_monthly_exp_sum()
    {

        return view('reports.gen-monthly-exp-report');
    }



    // public function monthly_report1(Request $request)
    // {
    //     $month=request('month');
    //     $year=request('year');
    //     $mdate=$year.'-'.$month.'-';

    //     $day1= DailyCollectionSummary::where('date_of_sale',$mdate.'01')->where('status','1')->first();
    //     $day2= DailyCollectionSummary::where('date_of_sale',$mdate.'02')->where('status','1')->first();
    //     $day3= DailyCollectionSummary::where('date_of_sale',$mdate.'03')->where('status','1')->first();
    //     $day4= DailyCollectionSummary::where('date_of_sale',$mdate.'04')->where('status','1')->first();
    //     $day5= DailyCollectionSummary::where('date_of_sale',$mdate.'05')->where('status','1')->first();
    //     $day6= DailyCollectionSummary::where('date_of_sale',$mdate.'06')->where('status','1')->first();
    //     $day7= DailyCollectionSummary::where('date_of_sale',$mdate.'07')->where('status','1')->first();
    //     $day8= DailyCollectionSummary::where('date_of_sale',$mdate.'08')->where('status','1')->first();
    //     $day9= DailyCollectionSummary::where('date_of_sale',$mdate.'09')->where('status','1')->first();
    //     $day10= DailyCollectionSummary::where('date_of_sale',$mdate.'10')->where('status','1')->first();
    //     $day11= DailyCollectionSummary::where('date_of_sale',$mdate.'11')->where('status','1')->first();
    //     $day12= DailyCollectionSummary::where('date_of_sale',$mdate.'12')->where('status','1')->first();
    //     $day13= DailyCollectionSummary::where('date_of_sale',$mdate.'13')->where('status','1')->first();
    //     $day14= DailyCollectionSummary::where('date_of_sale',$mdate.'14')->where('status','1')->first();
    //     $day15= DailyCollectionSummary::where('date_of_sale',$mdate.'15')->where('status','1')->first();
    //     $day16= DailyCollectionSummary::where('date_of_sale',$mdate.'16')->where('status','1')->first();
    //     $day17= DailyCollectionSummary::where('date_of_sale',$mdate.'17')->where('status','1')->first();
    //     $day18= DailyCollectionSummary::where('date_of_sale',$mdate.'18')->where('status','1')->first();
    //     $day19= DailyCollectionSummary::where('date_of_sale',$mdate.'19')->where('status','1')->first();
    //     $day20= DailyCollectionSummary::where('date_of_sale',$mdate.'20')->where('status','1')->first();
    //     $day21= DailyCollectionSummary::where('date_of_sale',$mdate.'21')->where('status','1')->first();
    //     $day22= DailyCollectionSummary::where('date_of_sale',$mdate.'22')->where('status','1')->first();
    //     $day23= DailyCollectionSummary::where('date_of_sale',$mdate.'23')->where('status','1')->first();
    //     $day24= DailyCollectionSummary::where('date_of_sale',$mdate.'24')->where('status','1')->first();
    //     $day25= DailyCollectionSummary::where('date_of_sale',$mdate.'25')->where('status','1')->first();
    //     $day26= DailyCollectionSummary::where('date_of_sale',$mdate.'26')->where('status','1')->first();
    //     $day27= DailyCollectionSummary::where('date_of_sale',$mdate.'27')->where('status','1')->first();
    //     $day28= DailyCollectionSummary::where('date_of_sale',$mdate.'28')->where('status','1')->first();
    //     $day29= DailyCollectionSummary::where('date_of_sale',$mdate.'29')->where('status','1')->first();
    //     $day30= DailyCollectionSummary::where('date_of_sale',$mdate.'30')->where('status','1')->first();
    //     $day31= DailyCollectionSummary::where('date_of_sale',$mdate.'31')->where('status','1')->first();

    //     $pcso1 = Expenses::where('e_date',$mdate.'01')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso2 = Expenses::where('e_date',$mdate.'02')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso3 = Expenses::where('e_date',$mdate.'03')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso4 = Expenses::where('e_date',$mdate.'04')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso5 = Expenses::where('e_date',$mdate.'05')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso6 = Expenses::where('e_date',$mdate.'06')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso7 = Expenses::where('e_date',$mdate.'07')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso8 = Expenses::where('e_date',$mdate.'08')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso9 = Expenses::where('e_date',$mdate.'09')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso10 = Expenses::where('e_date',$mdate.'10')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso11 = Expenses::where('e_date',$mdate.'11')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso12 = Expenses::where('e_date',$mdate.'12')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso13 = Expenses::where('e_date',$mdate.'13')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso14 = Expenses::where('e_date',$mdate.'14')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso15 = Expenses::where('e_date',$mdate.'15')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso16 = Expenses::where('e_date',$mdate.'16')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso17 = Expenses::where('e_date',$mdate.'17')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso18 = Expenses::where('e_date',$mdate.'18')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso19 = Expenses::where('e_date',$mdate.'19')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso20 = Expenses::where('e_date',$mdate.'20')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso21 = Expenses::where('e_date',$mdate.'21')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso22 = Expenses::where('e_date',$mdate.'22')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso23 = Expenses::where('e_date',$mdate.'23')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso24 = Expenses::where('e_date',$mdate.'24')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso25 = Expenses::where('e_date',$mdate.'25')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso26 = Expenses::where('e_date',$mdate.'26')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso27 = Expenses::where('e_date',$mdate.'27')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso28 = Expenses::where('e_date',$mdate.'28')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso29 = Expenses::where('e_date',$mdate.'29')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso30 = Expenses::where('e_date',$mdate.'30')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $pcso31= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');


    //     $from='2020-01-01';
    //     $to='2020-10-30';

    //     $monthly_exp= Expenses::whereBetween('e_date', [$from, $to])->where('type_of_exp','NATIONAL')->where('status','1')->sum('amount');

          
    //     // $la_national= Expenses::whereBetween('e_date', [$from, $to])->where('type_of_exp','NATIONAL')->where('status','1')->sum('amount');
    //     // $la_local= Expenses::whereBetween('e_date', [$from, $to])->where('type_of_exp','LOCAL')->where('status','1')->sum('amount');
    //     // $la_loan= Expenses::whereBetween('e_date', [$from, $to])->where('type_of_exp','LOAN')->where('status','1')->sum('amount');
    //     // $la_ticket= Expenses::whereBetween('e_date', [$from, $to])->where('type_of_exp','TICKET')->where('status','1')->sum('amount');
    //     // $la_pcso= Expenses::whereBetween('e_date', [$from, $to])->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     // $la_expenses= Expenses::whereBetween('e_date', [$from, $to])
    //     //             ->where('type_of_exp','!=','LOAN')
    //     //             ->where('type_of_exp','!=','PCSO DAILY REMITTANCE')
    //     //             ->where('type_of_exp','!=','NATIONAL') 
    //     //             ->where('type_of_exp','!=','LOCAL')
    //     //             ->where('type_of_exp','!=','TICKET')
    //     //             ->where('status','1')->sum('amount');
        
    //     $la_national= Expenses::whereMonth('e_date', '=', $month)->where('type_of_exp','NATIONAL')->where('status','1')->sum('amount');
    //     $la_local= Expenses::whereMonth('e_date', '=', $month)->where('type_of_exp','LOCAL')->where('status','1')->sum('amount');
    //     $la_loan= Expenses::whereMonth('e_date', '=', $month)->where('type_of_exp','LOAN')->where('status','1')->sum('amount');
    //     $la_ticket= Expenses::whereMonth('e_date', '=', $month)->where('type_of_exp','TICKET')->where('status','1')->sum('amount');
    //     $la_pcso= Expenses::whereMonth('e_date', '=', $month)->where('type_of_exp','PCSO DAILY REMITTANCE')->where('status','1')->sum('amount');
    //     $la_expenses= Expenses::whereMonth('e_date', '=', $month)
    //                 ->where('type_of_exp','!=','LOAN')
    //                 ->where('type_of_exp','!=','PCSO DAILY REMITTANCE')
    //                 ->where('type_of_exp','!=','NATIONAL') 
    //                 ->where('type_of_exp','!=','LOCAL')
    //                 ->where('type_of_exp','!=','TICKET')
    //                 ->where('status','1')->sum('amount');
                
    //     return view('reports.monthly-report',compact(
    //         'month','year',
    //         'day1','day2','day3','day4','day5','day6','day7','day8','day9','day10',
    //         'day11','day12','day13','day14','day15','day16','day17','day18','day19','day20',
    //         'day21','day22','day23','day24','day25','day26','day27','day28','day29','day30','day31',
    //         'pcso1','pcso2','pcso3','pcso4','pcso5','pcso6','pcso7','pcso8','pcso9','pcso10',
    //         'pcso11','pcso12','pcso13','pcso14','pcso15','pcso16','pcso17','pcso18','pcso19','pcso20',
    //         'pcso21','pcso22','pcso23','pcso24','pcso25','pcso26','pcso27','pcso28','pcso29','pcso30','pcso31',
    //         'la_national','la_local','la_expenses','la_loan','la_ticket','la_pcso'
    //     ));

    // }



    public function monthly_report2(Request $request)
    {

        $month=request('month');
        $year=request('year');
        // dd($month);
        $main_office_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','MAIN OFFICE')
                    ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                    ->where('type_of_exp','!=','LOCAL')->where('status','1')->sum('amount');
        $aritao_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','ARITAO')
                    ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                    ->where('type_of_exp','!=','LOCAL')->where('status','1')->sum('amount');
        $ambaguio1_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','AMBAGUIO 1')
                    ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                    ->where('type_of_exp','!=','LOCAL')->where('status','1')->sum('amount');
        $ambaguio2_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','AMBAGUIO 2')
                    ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                    ->where('type_of_exp','!=','LOCAL')->where('status','1')->sum('amount');
        $bagabag_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','BAGABAG')
                    ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                    ->where('type_of_exp','!=','LOCAL')->where('status','1')->sum('amount');
        $bambang1_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','BAMBANG 1')
                    ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                    ->where('type_of_exp','!=','LOCAL')->where('status','1')->sum('amount');
        $bambang2_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','BAMBANG 2')
                    ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                    ->where('type_of_exp','!=','LOCAL')->where('status','1')->sum('amount');
        $bayombong_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','BAYOMBONG')
                    ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                    ->where('type_of_exp','!=','LOCAL')->where('status','1')->sum('amount');
        $castaneda_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','CASTANEDA')
                    ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                    ->where('type_of_exp','!=','LOCAL')->where('status','1')->sum('amount');
        $diadi_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','DIADI')
                    ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                    ->where('type_of_exp','!=','LOCAL')->where('status','1')->sum('amount');
        $dupax_norte1_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','DUPAX NORTE 1')
                    ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                    ->where('type_of_exp','!=','LOCAL')->where('status','1')->sum('amount');
        $dupax_norte2_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','DUPAX NORTE 2')
                    ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                    ->where('type_of_exp','!=','LOCAL')->where('status','1')->sum('amount');
        $dupax_sur_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','DUPAX SUR')
                    ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                    ->where('type_of_exp','!=','LOCAL')->where('status','1')->sum('amount');
        $kayapa1_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','KAYAPA 1')
                    ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                    ->where('type_of_exp','!=','LOCAL')->where('status','1')->sum('amount');
        $kayapa2_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','KAYAPA 2')
                    ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                    ->where('type_of_exp','!=','LOCAL')->where('status','1')->sum('amount');
        $kasibu_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','KASIBU')
                    ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                    ->where('type_of_exp','!=','LOCAL')->where('status','1')->sum('amount');
        $quezon_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','QUEZON')
                    ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                    ->where('type_of_exp','!=','LOCAL')->where('status','1')->sum('amount');
        $solano_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','SOLANO')
                    ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                    ->where('type_of_exp','!=','LOCAL')->where('status','1')->sum('amount');
        $sta_fe_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','STA. FE')
                    ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                    ->where('type_of_exp','!=','LOCAL')->where('status','1')->sum('amount');
        $villaverde_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','VILLAVERDE')
                    ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                    ->where('type_of_exp','!=','LOCAL')->where('status','1')->sum('amount');

        

        return view('reports.monthly-report1',compact(
                'month','year',
                'main_office_exp',
                'aritao_exp',
                'ambaguio1_exp',
                'ambaguio2_exp',
                'bagabag_exp',
                'bambang1_exp',
                'bambang2_exp',
                'bayombong_exp',
                'castaneda_exp',
                'diadi_exp',
                'dupax_norte1_exp',
                'dupax_norte2_exp',
                'dupax_sur_exp',
                'kayapa1_exp',
                'kayapa2_exp',
                'kasibu_exp',
                'quezon_exp',
                'solano_exp',
                'sta_fe_exp',
                'villaverde_exp'
        ));

    }


    public function disbursement(Request $request)
    {
    $month=request('month');
    $year=request('year');
    $station=request('station');
    $exp =  Expenses::
        where('status', '1')
      ->where('location', request('station'))
      ->whereMonth('e_date', '=', request('month'))
      ->whereYear('e_date', '=', request('year'))
      ->orderBy('e_date', 'ASC') 
      ->latest()->get();

      if($exp){
        return view('reports.expenses-report',compact('exp','month','year','station'));
      }else{
        dd('NO RESULT!');
      }

    }



    // DAILY SALES REPORT 
    public function report( $request)
    {


        $search_date= $request;
        $accept =  CashOnHand:: where('c_date', $search_date)->where('status', 1) ->first();


        $coh1 =  CashOnHand:: where('c_date', $search_date)->where('status', 1) ->first();

        if ($coh1) { 
            $aaa =  CashOnHand::where('id','<',$coh1->id)->orderBy('id','desc')->first();
            if($aaa){
                $coh=CashOnHand::find($aaa->id);
                $cashonhand=$coh->cashonhand;
            }else{
                $cashonhand=0;
            }
            $acceptance='NOT ALLOWED';
        }else{
            $coh=CashOnHand::get()->last();
            if($coh){
                $cashonhand=$coh->cashonhand;
            }else{
                $cashonhand=0;
            }
            $acceptance='ALLOWED';
        }
       

        $main_office_tot_in = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','MAIN OFFICE')->sum('tot_in');
        $aritao_tot_in = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','ARITAO')->sum('tot_in');
        $ambaguio1_tot_in = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','AMBAGUIO 1')->sum('tot_in');
        $ambaguio2_tot_in = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','AMBAGUIO 2')->sum('tot_in');
        $bagabag_tot_in = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','BAGABAG')->sum('tot_in');
        $bambang1_tot_in = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','BAMBANG 1')->sum('tot_in');
        $bambang2_tot_in = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','BAMBANG 2')->sum('tot_in');
        $bayombong_tot_in = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','BAYOMBONG')->sum('tot_in');
        $castaneda_tot_in = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','CASTANEDA')->sum('tot_in');
        $diadi_tot_in = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','DIADI')->sum('tot_in');
        $dupax_norte1_tot_in = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','DUPAX NORTE 1')->sum('tot_in');
        $dupax_norte2_tot_in = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','DUPAX NORTE 2')->sum('tot_in');
        $dupax_sur_tot_in = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','DUPAX SUR')->sum('tot_in');
        $kayapa1_tot_in = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','KAYAPA 1')->sum('tot_in');
        $kayapa2_tot_in = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','KAYAPA 2')->sum('tot_in');
        $kasibu_tot_in = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','KASIBU')->sum('tot_in');
        $quezon_tot_in = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','QUEZON')->sum('tot_in');
        $solano1_tot_in = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','SOLANO 1')->sum('tot_in');
        $solano2_tot_in = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','SOLANO 2')->sum('tot_in');
        $sta_fe_tot_in = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','STA. FE')->sum('tot_in');
        $villaverde_tot_in = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','VILLAVERDE')->sum('tot_in');
     

        
        $main_office_tot_out = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','MAIN OFFICE')->sum('tot_out');
        $aritao_tot_out = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','ARITAO')->sum('tot_out');
        $ambaguio1_tot_out = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','AMBAGUIO 1')->sum('tot_out');
        $ambaguio2_tot_out = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','AMBAGUIO 2')->sum('tot_out');
        $bagabag_tot_out = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','BAGABAG')->sum('tot_out');
        $bambang1_tot_out = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','BAMBANG 1')->sum('tot_out');
        $bambang2_tot_out = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','BAMBANG 2')->sum('tot_out');
        $bayombong_tot_out = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','BAYOMBONG')->sum('tot_out');
        $castaneda_tot_out = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','CASTANEDA')->sum('tot_out');
        $diadi_tot_out = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','DIADI')->sum('tot_out');
        $dupax_norte1_tot_out = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','DUPAX NORTE 1')->sum('tot_out');
        $dupax_norte2_tot_out = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','DUPAX NORTE 2')->sum('tot_out');
        $dupax_sur_tot_out = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','DUPAX SUR')->sum('tot_out');
        $kayapa1_tot_out = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','KAYAPA 1')->sum('tot_out');
        $kayapa2_tot_out = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','KAYAPA 2')->sum('tot_out');
        $kasibu_tot_out = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','KASIBU')->sum('tot_out');
        $quezon_tot_out = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','QUEZON')->sum('tot_out');
        $solano1_tot_out = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','SOLANO 1')->sum('tot_out');
        $solano2_tot_out = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','SOLANO 2')->sum('tot_out');
        $sta_fe_tot_out = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','STA. FE')->sum('tot_out');
        $villaverde_tot_out = DailySale:: where('date_of_sale',$search_date)->where('status','1')->where('station','VILLAVERDE')->sum('tot_out');
     

        $main_office_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','MAIN OFFICE')->sum('cash_in');
        $aritao_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','ARITAO')->sum('cash_in');
        $ambaguio1_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','AMBAGUIO 1')->sum('cash_in');
        $ambaguio2_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','AMBAGUIO 2')->sum('cash_in');
        $bagabag_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','BAGABAG')->sum('cash_in');
        $bambang1_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','BAMBANG 1')->sum('cash_in');
        $bambang2_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','BAMBANG 2')->sum('cash_in');
        $bayombong_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','BAYOMBONG')->sum('cash_in');
        $castaneda_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','CASTANEDA')->sum('cash_in');
        $diadi_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','DIADI')->sum('cash_in');
        $dupax_norte1_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','DUPAX NORTE 1')->sum('cash_in');
        $dupax_norte2_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','DUPAX NORTE 2')->sum('cash_in');
        $dupax_sur_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','DUPAX SUR')->sum('cash_in');
        $kayapa1_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','KAYAPA 1')->sum('cash_in');
        $kayapa2_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','KAYAPA 2')->sum('cash_in');
        $kasibu_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','KASIBU')->sum('cash_in');
        $quezon_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','QUEZON')->sum('cash_in');
        $solano1_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','SOLANO 1')->sum('cash_in');
        $solano2_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','SOLANO 2')->sum('cash_in');
        $sta_fe_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','STA. FE')->sum('cash_in');
        $villaverde_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','VILLAVERDE')->sum('cash_in');
     


        $main_office_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','MAIN OFFICE')->sum('cash_out');
        $aritao_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','ARITAO')->sum('cash_out');
        $ambaguio1_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','AMBAGUIO 1')->sum('cash_out');
        $ambaguio2_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','AMBAGUIO 2')->sum('cash_out');
        $bagabag_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','BAGABAG')->sum('cash_out');
        $bambang1_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','BAMBANG 1')->sum('cash_out');
        $bambang2_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','BAMBANG 2')->sum('cash_out');
        $bayombong_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','BAYOMBONG')->sum('cash_out');
        $castaneda_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','CASTANEDA')->sum('cash_out');
        $diadi_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','DIADI')->sum('cash_out');
        $dupax_norte1_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','DUPAX NORTE 1')->sum('cash_out');
        $dupax_norte2_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','DUPAX NORTE 2')->sum('cash_out');
        $dupax_sur_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','DUPAX SUR')->sum('cash_out');
        $kayapa1_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','KAYAPA 1')->sum('cash_out');
        $kayapa2_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','KAYAPA 2')->sum('cash_out');
        $kasibu_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','KASIBU')->sum('cash_out');
        $quezon_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','QUEZON')->sum('cash_out');
        $solano1_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','SOLANO 1')->sum('cash_out');
        $solano2_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','SOLANO 2')->sum('cash_out');
        $sta_fe_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','STA. FE')->sum('cash_out');
        $villaverde_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->where('station','VILLAVERDE')->sum('cash_out');
     


        $main_office_exp = Expenses:: where('e_date',$search_date)->where('status','1')->where('location','MAIN OFFICE')->sum('amount');
        $aritao_exp= Expenses:: where('e_date',$search_date)->where('status','1')->where('location','ARITAO')->sum('amount');
        $ambaguio1_exp = Expenses:: where('e_date',$search_date)->where('status','1')->where('location','AMBAGUIO 1')->sum('amount');
        $ambaguio2_exp = Expenses:: where('e_date',$search_date)->where('status','1')->where('location','AMBAGUIO 2')->sum('amount');
        $bagabag_exp = Expenses:: where('e_date',$search_date)->where('status','1')->where('location','BAGABAG')->sum('amount');
        $bambang1_exp = Expenses:: where('e_date',$search_date)->where('status','1')->where('location','BAMBANG 1')->sum('amount');
        $bambang2_exp = Expenses:: where('e_date',$search_date)->where('status','1')->where('location','BAMBANG 2')->sum('amount');
        $bayombong_exp = Expenses:: where('e_date',$search_date)->where('status','1')->where('location','BAYOMBONG')->sum('amount');
        $castaneda_exp = Expenses:: where('e_date',$search_date)->where('status','1')->where('location','CASTANEDA')->sum('amount');
        $diadi_exp = Expenses:: where('e_date',$search_date)->where('status','1')->where('location','DIADI')->sum('amount');
        $dupax_norte1_exp = Expenses:: where('e_date',$search_date)->where('status','1')->where('location','DUPAX NORTE 1')->sum('amount');
        $dupax_norte2_exp = Expenses:: where('e_date',$search_date)->where('status','1')->where('location','DUPAX NORTE 2')->sum('amount');
        $dupax_sur_exp = Expenses:: where('e_date',$search_date)->where('status','1')->where('location','DUPAX SUR')->sum('amount');
        $kayapa1_exp = Expenses:: where('e_date',$search_date)->where('status','1')->where('location','KAYAPA 1')->sum('amount');
        $kayapa2_exp = Expenses:: where('e_date',$search_date)->where('status','1')->where('location','KAYAPA 2')->sum('amount');
        $kasibu_exp = Expenses:: where('e_date',$search_date)->where('status','1')->where('location','KASIBU')->sum('amount');
        $quezon_exp = Expenses:: where('e_date',$search_date)->where('status','1')->where('location','QUEZON')->sum('amount');
        $solano1_exp = Expenses:: where('e_date',$search_date)->where('status','1')->where('location','SOLANO 1')->sum('amount');
        $solano2_exp = Expenses:: where('e_date',$search_date)->where('status','1')->where('location','SOLANO 2')->sum('amount');
        $sta_fe_exp = Expenses:: where('e_date',$search_date)->where('status','1')->where('location','STA. FE')->sum('amount');
        $villaverde_exp = Expenses:: where('e_date',$search_date)->where('status','1')->where('location','VILLAVERDE')->sum('amount');
     
        $Gtotal_exp = Expenses:: where('e_date',$search_date)->where('status','1')->sum('amount');
        $Gtotal_in = DailySale:: where('date_of_sale',$search_date)->where('status','1')->sum('tot_in');
        $Gtotal_out = DailySale:: where('date_of_sale',$search_date)->where('status','1')->sum('tot_out');
        $Gtotal_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->sum('cash_in');
        $Gtotal_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->where('status','1')->sum('cash_out');

        // return view('daily-cash-balancing.accept-DCB.blade.php',
        return view('sales.daily-report',
        compact([
            'cashonhand',
            'search_date',
            'Gtotal_in',
            'Gtotal_out',
            'Gtotal_cashin',
            'Gtotal_others',
            'Gtotal_exp',
            'acceptance',
            


        'main_office_tot_in',
        'aritao_tot_in',
        'ambaguio1_tot_in',
        'ambaguio2_tot_in',
        'bagabag_tot_in',
        'bambang1_tot_in',
        'bambang2_tot_in',
        'bayombong_tot_in',
        'castaneda_tot_in',
        'diadi_tot_in',
        'dupax_norte1_tot_in',
        'dupax_norte2_tot_in',
        'dupax_sur_tot_in',
        'kayapa1_tot_in',
        'kayapa2_tot_in',
        'kasibu_tot_in',
        'quezon_tot_in',
        'solano1_tot_in',
        'solano2_tot_in',
        'sta_fe_tot_in',
        'villaverde_tot_in',

        'main_office_tot_out',
        'aritao_tot_out',
        'ambaguio1_tot_out',
        'ambaguio2_tot_out',
        'bagabag_tot_out',
        'bambang1_tot_out',
        'bambang2_tot_out',
        'bayombong_tot_out',
        'castaneda_tot_out',
        'diadi_tot_out',
        'dupax_norte1_tot_out',
        'dupax_norte2_tot_out',
        'dupax_sur_tot_out',
        'kayapa1_tot_out',
        'kayapa2_tot_out',
        'kasibu_tot_out',
        'quezon_tot_out',
        'solano1_tot_out',
        'solano2_tot_out',
        'sta_fe_tot_out',
        'villaverde_tot_out',

        'main_office_tot_cashin',
        'aritao_tot_cashin',
        'ambaguio1_tot_cashin',
        'ambaguio2_tot_cashin',
        'bagabag_tot_cashin',
        'bambang1_tot_cashin',
        'bambang2_tot_cashin',
        'bayombong_tot_cashin',
        'castaneda_tot_cashin',
        'diadi_tot_cashin',
        'dupax_norte1_tot_cashin',
        'dupax_norte2_tot_cashin',
        'dupax_sur_tot_cashin',
        'kayapa1_tot_cashin',
        'kayapa2_tot_cashin',
        'kasibu_tot_cashin',
        'quezon_tot_cashin',
        'solano1_tot_cashin',
        'solano2_tot_cashin',
        'sta_fe_tot_cashin',
        'villaverde_tot_cashin',

        'main_office_tot_others',
        'aritao_tot_others',
        'ambaguio1_tot_others',
        'ambaguio2_tot_others',
        'bagabag_tot_others',
        'bambang1_tot_others',
        'bambang2_tot_others',
        'bayombong_tot_others',
        'castaneda_tot_others',
        'diadi_tot_others',
        'dupax_norte1_tot_others',
        'dupax_norte2_tot_others',
        'dupax_sur_tot_others',
        'kayapa1_tot_others',
        'kayapa2_tot_others',
        'kasibu_tot_others',
        'quezon_tot_others',
        'solano1_tot_others',
        'solano2_tot_others',
        'sta_fe_tot_others',
        'villaverde_tot_others',


        'main_office_exp',
        'aritao_exp',
        'ambaguio1_exp',
        'ambaguio2_exp',
        'bagabag_exp',
        'bambang1_exp',
        'bambang2_exp',
        'bayombong_exp',
        'castaneda_exp',
        'diadi_exp',
        'dupax_norte1_exp',
        'dupax_norte2_exp',
        'dupax_sur_exp',
        'kayapa1_exp',
        'kayapa2_exp',
        'kasibu_exp',
        'quezon_exp',
        'solano1_exp',
        'solano2_exp',
        'sta_fe_exp',
        'villaverde_exp',
            




            ]));
    }


public function gm_exp(Request $request)
{
    return view('reports.gen-manager-exp');

}






   


}
