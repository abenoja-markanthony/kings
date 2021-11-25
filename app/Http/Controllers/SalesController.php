<?php

namespace App\Http\Controllers;

use App\DailySale;
use App\PreSale;
use App\Sale;
use App\PreSaleAdmin;
use Illuminate\Http\Request;
use App\Expenses;
use DB;
use Auth;
use Redirect;
use App\AdditionalExpRec;
use App\DailyCollectionSummary;

class SalesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('revalidate');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(request('month')){
            $year=request('year');
            $month=request('month');
            $month_name= date("F", mktime(0, 0, 0, $month, 1));
        }else{
            $year=date('Y');
            $month=date('m');
            $month_name=date('F');
        }
        
        $sales =  DailySale::where('status', '1') ->select('date_of_sale')->distinct()
        ->whereYear('date_of_sale', '=', $year)
        ->whereMonth('date_of_sale', '=', $month)->orderBy('date_of_sale','desc')->latest()->get();
       
        return view('sales.index-sales',compact('sales','month','month_name','year'));
       
    }

    public function dcb(Request $request)
    {

        if(request('month')){
            $year=request('year');
            $month=request('month');
            $month_name= date("F", mktime(0, 0, 0, $month, 1));
        }else{
            $year=date('Y');
            $month=date('m');
            $month_name=date('F');
        }
        $sales =  DailySale::where('status', '1')
        ->where('date_encoded','<>',null)
        ->select('date_encoded')->distinct()
        ->whereMonth('date_encoded', '=', $month)
        ->whereYear('date_encoded', '=', $year)
        ->orderBy('date_encoded','desc')->latest()->get();
        return view('sales.dcb',compact('sales','month','month_name','year'));
       
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $station=array(
           'MAIN OFFICE',
           'ARITAO',
           'AMBAGUIO 1',
           'AMBAGUIO 2',
           'BAGABAG',
           'BAMBANG 1',
           'BAMBANG 2',
           'BAYOMBONG',
           'CASTANEDA',
           'DIADI',
           'DUPAX NORTE 1',
           'DUPAX NORTE 2',
           'DUPAX SUR',
           'KASIBU',
           'KAYAPA 1',
           'KAYAPA 2',
           'QUEZON',
           'SOLANO 1',
           'SOLANO 2',
           'STA. FE',
           'VILLAVERDE'
            
        );


        for($i = 0; $i < count($station); $i++){
          
            $sales=new DailySale();
            $sales->station=$station[$i];
            $sales->date_of_sale=request('date_of_sale');
            $sales->user_id=Auth::id();
            $sales->username=Auth::user()->name;
            $sales->save();

        }

     

        for($i = 0; $i < count($station); $i++){
          
            $sales1=new PreSale();
            $sales1->station=$station[$i];
            $sales1->date_of_sale=request('date_of_sale');
            $sales1->user_id=Auth::id();
            $sales1->username=Auth::user()->name;
            $sales1->save();

        }

        $dcs=new DailyCollectionSummary();
        $dcs->date_of_sale=request('date_of_sale');
        $dcs->status=1;
        $dcs->user_id=Auth::id();
        $dcs->username=Auth::user()->name;
        $dcs->save();
        return redirect('/daily-sales')->with('success', 'Date of sale has been added.');

      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($date_of_sale) 
    {
        $grand_total = DailySale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('net_sales');
        $grand_in = DailySale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('tot_in');
        $grand_out = DailySale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('tot_out');

        $main_office_exp =  Expenses::where('status', '1') ->where('location', 'MAIN OFFICE')->where('e_date', $date_of_sale)->latest()->get(); 
        $aritao_exp =  Expenses::where('status', '1') ->where('location', 'ARITAO')->where('e_date', $date_of_sale)->latest()->get(); 
        $ambaguio1_exp =  Expenses::where('status', '1') ->where('location', 'AMBAGUIO 1')->where('e_date', $date_of_sale)->latest()->get(); 
        $ambaguio2_exp =  Expenses::where('status', '1') ->where('location', 'AMBAGUIO 2')->where('e_date', $date_of_sale)->latest()->get(); 
        $bagabag_exp =  Expenses::where('status', '1') ->where('location', 'BAGABAG')->where('e_date', $date_of_sale)->latest()->get(); 
        $bambang1_exp =  Expenses::where('status', '1') ->where('location', 'BAMBANG 1')->where('e_date', $date_of_sale)->latest()->get(); 
        $bambang2_exp =  Expenses::where('status', '1') ->where('location', 'BAMBANG 2')->where('e_date', $date_of_sale)->latest()->get(); 
        $bayombong_exp =  Expenses::where('status', '1') ->where('location', 'BAYOMBONG')->where('e_date', $date_of_sale)->latest()->get(); 
        $castaneda_exp =  Expenses::where('status', '1') ->where('location', 'CASTANEDA')->where('e_date', $date_of_sale)->latest()->get(); 
        $diadi_exp =  Expenses::where('status', '1') ->where('location', 'DIADI')->where('e_date', $date_of_sale)->latest()->get(); 
        $dupax_norte1_exp =  Expenses::where('status', '1') ->where('location', 'DUPAX NORTE 1')->where('e_date', $date_of_sale)->latest()->get(); 
        $dupax_norte2_exp =  Expenses::where('status', '1') ->where('location', 'DUPAX NORTE 2')->where('e_date', $date_of_sale)->latest()->get(); 
        $dupax_sur_exp =  Expenses::where('status', '1') ->where('location', 'DUPAX SUR')->where('e_date', $date_of_sale)->latest()->get(); 
        $kayapa1_exp =  Expenses::where('status', '1') ->where('location', 'KAYAPA 1')->where('e_date', $date_of_sale)->latest()->get(); 
        $kayapa2_exp =  Expenses::where('status', '1') ->where('location', 'KAYAPA 2')->where('e_date', $date_of_sale)->latest()->get(); 
        $kasibu_exp =  Expenses::where('status', '1') ->where('location', 'KASIBU')->where('e_date', $date_of_sale)->latest()->get(); 
        $quezon_exp =  Expenses::where('status', '1') ->where('location', 'QUEZON')->where('e_date', $date_of_sale)->latest()->get(); 
        $solano1_exp =  Expenses::where('status', '1') ->where('location', 'SOLANO 1')->where('e_date', $date_of_sale)->latest()->get(); 
        $solano2_exp =  Expenses::where('status', '1') ->where('location', 'SOLANO 2')->where('e_date', $date_of_sale)->latest()->get(); 
        $sta_fe_exp =  Expenses::where('status', '1') ->where('location', 'STA. FE')->where('e_date', $date_of_sale)->latest()->get(); 
        $villaverde_exp =  Expenses::where('status', '1') ->where('location', 'VILLAVERDE')->where('e_date', $date_of_sale)->latest()->get();
        
        $additional_rec =  AdditionalExpRec::where('status', '1') ->where('date_of_receipt', $date_of_sale)->latest()->get(); 
        $sum_additional_in = AdditionalExpRec:: where('date_of_receipt',$date_of_sale)->where('status','1')->sum('cash_in');
        $sum_additional_out = AdditionalExpRec:: where('date_of_receipt',$date_of_sale)->where('status','1')->sum('cash_out');
        
       
        $exp =  Expenses::where('status', '1')->where('e_date', $date_of_sale)->latest()->paginate(10);
       
        
        
        $sales =  DailySale::where('status', '1') ->where('date_of_sale',request('date_of_sale'))->get();
        $presales =  PreSale::where('status', '1') ->where('date_of_sale',request('date_of_sale'))->get();

        $data=DB::table('daily_sales')
                    ->where('daily_sales.date_of_sale', '=', request('date_of_sale'))
                    ->where('pre_sales.date_of_sale', '=', request('date_of_sale'))
                    ->join('pre_sales','pre_sales.station','=','daily_sales.station')
                    ->get(['daily_sales.*','pre_sales.station as pre_station', 'pre_sales.date_of_sale as pre_date', 'pre_sales.AM_in as pre_AM_in', 'pre_sales.PM_in as pre_PM_in', 'pre_sales.EXTRA_in as pre_EXTRA_in', 'pre_sales.AM_out as pre_AM_out', 'pre_sales.PM_out as pre_PM_out', 'pre_sales.EXTRA_out as pre_EXTRA_out']);
       
        return view('sales.edit-sales',compact(
            'sales','grand_total','grand_in','grand_out','date_of_sale','exp','presales','data',
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
            'additional_rec',
            'sum_additional_in',
            'sum_additional_out'
        ));
    }

    /** 
     * Update the specified resource in storage.    
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd(request('date_of_sale'));
        $sale=DailySale::find($id);

        $am_in=preg_replace("/[^0-9.]/", "",request('AM_in'));
        $pm_in=preg_replace("/[^0-9.]/", "",request('PM_in'));
        $extra_in=preg_replace("/[^0-9.]/", "",request('EXTRA_in'));
        $am_out=preg_replace("/[^0-9.]/", "",request('AM_out'));
        $pm_out=preg_replace("/[^0-9.]/", "",request('PM_out'));
        $extra_out=preg_replace("/[^0-9.]/", "",request('EXTRA_out'));


        if($am_in==""){
            $am_in=0;
        }
        if($pm_in==""){
            $pm_in=0;
        }
        if($extra_in==""){
            $extra_in=0;
        }
        if($am_out==""){
            $am_out=0;
        }
        if($pm_out==""){
            $pm_out=0;
        }
        if($extra_out==""){
            $extra_out=0;
        }

        $tot_in=$am_in+$pm_in+$extra_in;

        $tot_out=$am_out+$pm_out+$extra_out;

        $net_sales=$tot_in-$tot_out;

        if($tot_in!=0 OR $tot_out !=0){
            $sale->AM_in=preg_replace("/[^0-9.]/", "",request('AM_in'));
            $sale->PM_in=preg_replace("/[^0-9.]/", "",request('PM_in'));
            $sale->EXTRA_in=preg_replace("/[^0-9.]/", "",request('EXTRA_in'));
            $sale->AM_out=preg_replace("/[^0-9.]/", "",request('AM_out'));
            $sale->PM_out=preg_replace("/[^0-9.]/", "",request('PM_out'));
            $sale->EXTRA_out=preg_replace("/[^0-9.]/", "",request('EXTRA_out'));
            $sale->tot_in=$tot_in;
            $sale->tot_out=$tot_out;
            $sale->net_sales=$net_sales;
            $sale->date_encoded=date('Y-m-d');
            $sale->status=1;
            $sale->user_id=Auth::id();
            $sale->username=Auth::user()->name;
            $sale->save();
            return Redirect::back()->with('success', 'Record has been updated successfully.');
        }else{
            return Redirect::back()->with('success', 'Please input data on the fields.');
        }
       
        // return redirect(url('public/daily-sales/'.request('date_of_sale').'/edit'))->with('success', 'Record has been updated successfully.');
    }



       /** 
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function accept($date_of_sale)
    {
        $total_net = DailySale:: where('date_encoded',$date_of_sale)->where('status','1')->sum('net_sales');
        $net_in = DailySale:: where('date_encoded',$date_of_sale)->where('status','1')->sum('tot_in');
        $net_out = DailySale:: where('date_encoded',$date_of_sale)->where('status','1')->sum('tot_out');


        $main_office_exp =  Expenses::where('status', '1') ->where('location', 'MAIN OFFICE')->where('date_encoded', $date_of_sale)->sum('amount');
        $aritao_exp =  Expenses::where('status', '1') ->where('location', 'ARITAO')->where('date_encoded', $date_of_sale)->sum('amount'); 
        $ambaguio1_exp =  Expenses::where('status', '1') ->where('location', 'AMBAGUIO 1')->where('date_encoded', $date_of_sale)->sum('amount'); 
        $ambaguio2_exp =  Expenses::where('status', '1') ->where('location', 'AMBAGUIO 2')->where('date_encoded', $date_of_sale)->sum('amount'); 
        $bagabag_exp =  Expenses::where('status', '1') ->where('location', 'BAGABAG')->where('date_encoded', $date_of_sale)->sum('amount'); 
        $bambang1_exp =  Expenses::where('status', '1') ->where('location', 'BAMBANG 1')->where('date_encoded', $date_of_sale)->sum('amount'); 
        $bambang2_exp =  Expenses::where('status', '1') ->where('location', 'BAMBANG 2')->where('date_encoded', $date_of_sale)->sum('amount'); 
        $bayombong_exp =  Expenses::where('status', '1') ->where('location', 'BAYOMBONG')->where('date_encoded', $date_of_sale)->sum('amount'); 
        $castaneda_exp =  Expenses::where('status', '1') ->where('location', 'CASTANEDA')->where('date_encoded', $date_of_sale)->sum('amount'); 
        $diadi_exp =  Expenses::where('status', '1') ->where('location', 'DIADI')->where('date_encoded', $date_of_sale)->sum('amount'); 
        $dupax_norte1_exp =  Expenses::where('status', '1') ->where('location', 'DUPAX NORTE 1')->where('date_encoded', $date_of_sale)->sum('amount'); 
        $dupax_norte2_exp =  Expenses::where('status', '1') ->where('location', 'DUPAX NORTE 2')->where('date_encoded', $date_of_sale)->sum('amount'); 
        $dupax_sur_exp =  Expenses::where('status', '1') ->where('location', 'DUPAX SUR')->where('date_encoded', $date_of_sale)->sum('amount'); 
        $kayapa1_exp =  Expenses::where('status', '1') ->where('location', 'KAYAPA 1')->where('date_encoded', $date_of_sale)->sum('amount'); 
        $kayapa2_exp =  Expenses::where('status', '1') ->where('location', 'KAYAPA 2')->where('date_encoded', $date_of_sale)->sum('amount'); 
        $kasibu_exp =  Expenses::where('status', '1') ->where('location', 'KASIBU')->where('date_encoded', $date_of_sale)->sum('amount'); 
        $quezon_exp =  Expenses::where('status', '1') ->where('location', 'QUEZON')->where('date_encoded', $date_of_sale)->sum('amount'); 
        $solano_exp =  Expenses::where('status', '1') ->where('location', 'SOLANO')->where('date_encoded', $date_of_sale)->sum('amount'); 
        $sta_fe_exp =  Expenses::where('status', '1') ->where('location', 'STA. FE')->where('date_encoded', $date_of_sale)->sum('amount'); 
        $villaverde_exp =  Expenses::where('status', '1') ->where('location', 'VILLAVERDE')->where('date_encoded', $date_of_sale)->sum('amount');
        
        $sum_additional_in = AdditionalExpRec:: where('date_encoded',$date_of_sale)->where('status','1')->sum('cash_in');
        $sum_additional_out = AdditionalExpRec:: where('date_encoded',$date_of_sale)->where('status','1')->sum('cash_out');
        
       
        $total_exp =  Expenses::where('status', '1')->where('date_encoded', $date_of_sale)->sum('amount');
       
        
        
        $sales =  DailySale::where('status', '1')
        ->where('date_encoded',request('date_of_sale'))->get();
        return view('sales.accept-sales',compact(
            'sales','total_net','net_in','net_out','date_of_sale','total_exp',
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
            'villaverde_exp',
            'sum_additional_in',
            'sum_additional_out'
        ));
    }

    public function AcceptDR(Request $request)
    {
        $validatedData = $request->validate([
            'dcb_date' => ['required'],
        ]);
   
        $sale=new Sale();
        $sale->dcb_date=request('dcb_date');
        $sale->main_office_tot_in=request('main_office_tot_in');
        $sale->main_office_tot_out=request('main_office_tot_out');
        $sale->main_office_exp=request('main_office_exp');
        $sale->aritao_tot_in=request('aritao_tot_in');
        $sale->aritao_tot_out=request('aritao_tot_out');
        $sale->aritao_exp=request('aritao_exp');
        $sale->ambaguio1_tot_in=request('ambaguio1_tot_in');
        $sale->ambaguio1_tot_out=request('ambaguio1_tot_out');
        $sale->ambaguio1_exp=request('ambaguio1_exp');
        $sale->ambaguio2_tot_in=request('ambaguio2_tot_in');
        $sale->ambaguio2_tot_out=request('ambaguio2_tot_out');
        $sale->ambaguio2_exp=request('ambaguio2_exp');
        $sale->bagabag_tot_in=request('bagabag_tot_in');
        $sale->bagabag_tot_out=request('bagabag_tot_out');
        $sale->bagabag_exp=request('bagabag_exp');
        $sale->bambang1_tot_in=request('bambang1_tot_in');
        $sale->bambang1_tot_out=request('bambang1_tot_out');
        $sale->bambang1_exp=request('bambang1_exp');
        $sale->bambang2_tot_in=request('bambang2_tot_in');
        $sale->bambang2_tot_out=request('bambang2_tot_out');
        $sale->bambang2_exp=request('bambang2_exp');
        $sale->bayombong_tot_in=request('bayombong_tot_in');
        $sale->bayombong_tot_out=request('bayombong_tot_out');
        $sale->bayombong_exp=request('bayombong_exp');
        $sale->castaneda_tot_in=request('castaneda_tot_in');
        $sale->castaneda_tot_out=request('castaneda_tot_out');
        $sale->castaneda_exp=request('castaneda_exp');
        $sale->diadi_tot_in=request('diadi_tot_in');
        $sale->diadi_tot_out=request('diadi_tot_out');
        $sale->diadi_exp=request('diadi_exp');
        $sale->dupax_norte1_tot_in=request('dupax_norte1_tot_in');
        $sale->dupax_norte1_tot_out=request('dupax_norte_1tot_out');
        $sale->dupax_norte1_exp=request('dupax_norte1_exp');
        $sale->dupax_norte2_tot_in=request('dupax_norte2_tot_in');
        $sale->dupax_norte2_tot_out=request('dupax2norte_2tot_out');
        $sale->dupax_norte2_exp=request('dupax_norte2_exp');
        $sale->dupax_sur_tot_in=request('dupax_sur_tot_in');
        $sale->dupax_sur_tot_out=request('dupax_sur_tot_out');
        $sale->dupax_sur_exp=request('dupax_sur_exp');
        $sale->kayapa1_tot_in=request('kayapa1_tot_in');
        $sale->kayapa1_tot_out=request('kayapa1_tot_out');
        $sale->kayapa1_exp=request('kayapa1_exp');
        $sale->kayapa2_tot_in=request('kayapa2_tot_in');
        $sale->kayapa2_tot_out=request('kayapa2_tot_out');
        $sale->kayapa2_exp=request('kayapa2_exp');
        $sale->kasibu_tot_in=request('kasibu_tot_in');
        $sale->kasibu_tot_out=request('kasibu_tot_out');
        $sale->kasibu_exp=request('kasibu_exp');
        $sale->quezon_tot_in=request('quezon_tot_in');
        $sale->quezon_tot_out=request('quezon_tot_out');
        $sale->quezon_exp=request('quezon_exp');
        $sale->solano_tot_in=request('solano_tot_in');
        $sale->solano_tot_out=request('solano_tot_out');
        $sale->solano_exp=request('solano_exp');
        $sale->sta_fe_tot_in=request('sta_fe_tot_in');
        $sale->sta_fe_tot_out=request('sta_fe_tot_out');
        $sale->sta_fe_exp=request('sta_fe_exp');
        $sale->villaverde_tot_in=request('villaverde_tot_in');
        $sale->villaverde_tot_out=request('villaverde_tot_out');
        $sale->villaverde_exp=request('villaverde_exp');
        $sale->Gtotal_in=request('Gtotal_in');
        $sale->Gtotal_out=request('Gtotal_out');
        $sale->Gtotal_exp=request('Gtotal_exp');
        $sale->netTotal=request('netTotal');
        $sale->new_balance=request('new_balance');
        $sale->beg_balance=request('beg_balance');
        $sale->user_id=1;
        $sale->status=1;
        $sale->save();

       

        return redirect()->back()->with('message', 'Record has been accepted successfully.')->with('ACCEPTANCE','ALLOWED');

        
    }
}
