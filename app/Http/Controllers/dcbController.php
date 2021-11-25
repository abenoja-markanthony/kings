<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DailySale;
use App\Expenses;
use App\AdditionalExpRec;
use App\CashOnHand; 
use Auth;
use Illuminate\Support\Facades\Validator;

class dcbController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coh=CashOnHand::get()->last();
        $new_coh=new CashOnHand();

        if(request('netTotal')<0){
           $new_coh->cash_out=request('netTotal');
        }else{
            $new_coh->cash_in=request('netTotal');
        }

        $new_coh->c_date=request('dcb_date');
        $new_coh->cashonhand=request('new_total');
        $new_coh->user_id=1;
        $new_coh->status=1;
        $new_coh->save();

        Expenses::where('date_encoded', request('dcb_date'))->update(['accepted' => 1]);
        DailySale::where('date_encoded', request('dcb_date'))->update(['accepted' => 1]);

        return redirect()->back()->with('message', 'Record has been accepted successfully.');

        
    }


    public function accept($date_of_sale)
    {

        $search_date= $date_of_sale;

        $coh1 =  CashOnHand:: where('c_date', $search_date)->active()->first();

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
       

        $main_office_tot_in = DailySale:: where('date_encoded',$search_date)->active()->where('station','MAIN OFFICE')->sum('tot_in');
        $aritao_tot_in = DailySale:: where('date_encoded',$search_date)->active()->where('station','ARITAO')->sum('tot_in');
        $ambaguio1_tot_in = DailySale:: where('date_encoded',$search_date)->active()->where('station','AMBAGUIO 1')->sum('tot_in');
        $ambaguio2_tot_in = DailySale:: where('date_encoded',$search_date)->active()->where('station','AMBAGUIO 2')->sum('tot_in');
        $bagabag_tot_in = DailySale:: where('date_encoded',$search_date)->active()->where('station','BAGABAG')->sum('tot_in');
        $bambang1_tot_in = DailySale:: where('date_encoded',$search_date)->active()->where('station','BAMBANG 1')->sum('tot_in');
        $bambang2_tot_in = DailySale:: where('date_encoded',$search_date)->active()->where('station','BAMBANG 2')->sum('tot_in');
        $bayombong_tot_in = DailySale:: where('date_encoded',$search_date)->active()->where('station','BAYOMBONG')->sum('tot_in');
        $castaneda_tot_in = DailySale:: where('date_encoded',$search_date)->active()->where('station','CASTANEDA')->sum('tot_in');
        $diadi_tot_in = DailySale:: where('date_encoded',$search_date)->active()->where('station','DIADI')->sum('tot_in');
        $dupax_norte1_tot_in = DailySale:: where('date_encoded',$search_date)->active()->where('station','DUPAX NORTE 1')->sum('tot_in');
        $dupax_norte2_tot_in = DailySale:: where('date_encoded',$search_date)->active()->where('station','DUPAX NORTE 2')->sum('tot_in');
        $dupax_sur_tot_in = DailySale:: where('date_encoded',$search_date)->active()->where('station','DUPAX SUR')->sum('tot_in');
        $kayapa1_tot_in = DailySale:: where('date_encoded',$search_date)->active()->where('station','KAYAPA 1')->sum('tot_in');
        $kayapa2_tot_in = DailySale:: where('date_encoded',$search_date)->active()->where('station','KAYAPA 2')->sum('tot_in');
        $kasibu_tot_in = DailySale:: where('date_encoded',$search_date)->active()->where('station','KASIBU')->sum('tot_in');
        $quezon_tot_in = DailySale:: where('date_encoded',$search_date)->active()->where('station','QUEZON')->sum('tot_in');
        $solano1_tot_in = DailySale:: where('date_encoded',$search_date)->active()->where('station','SOLANO 1')->sum('tot_in');
        $solano2_tot_in = DailySale:: where('date_encoded',$search_date)->active()->where('station','SOLANO 2')->sum('tot_in');
        $sta_fe_tot_in = DailySale:: where('date_encoded',$search_date)->active()->where('station','STA. FE')->sum('tot_in');
        $villaverde_tot_in = DailySale:: where('date_encoded',$search_date)->active()->where('station','VILLAVERDE')->sum('tot_in');
     

        
        $main_office_tot_out = DailySale:: where('date_encoded',$search_date)->active()->where('station','MAIN OFFICE')->sum('tot_out');
        $aritao_tot_out = DailySale:: where('date_encoded',$search_date)->active()->where('station','ARITAO')->sum('tot_out');
        $ambaguio1_tot_out = DailySale:: where('date_encoded',$search_date)->active()->where('station','AMBAGUIO 1')->sum('tot_out');
        $ambaguio2_tot_out = DailySale:: where('date_encoded',$search_date)->active()->where('station','AMBAGUIO 2')->sum('tot_out');
        $bagabag_tot_out = DailySale:: where('date_encoded',$search_date)->active()->where('station','BAGABAG')->sum('tot_out');
        $bambang1_tot_out = DailySale:: where('date_encoded',$search_date)->active()->where('station','BAMBANG 1')->sum('tot_out');
        $bambang2_tot_out = DailySale:: where('date_encoded',$search_date)->active()->where('station','BAMBANG 2')->sum('tot_out');
        $bayombong_tot_out = DailySale:: where('date_encoded',$search_date)->active()->where('station','BAYOMBONG')->sum('tot_out');
        $castaneda_tot_out = DailySale:: where('date_encoded',$search_date)->active()->where('station','CASTANEDA')->sum('tot_out');
        $diadi_tot_out = DailySale:: where('date_encoded',$search_date)->active()->where('station','DIADI')->sum('tot_out');
        $dupax_norte1_tot_out = DailySale:: where('date_encoded',$search_date)->active()->where('station','DUPAX NORTE 1')->sum('tot_out');
        $dupax_norte2_tot_out = DailySale:: where('date_encoded',$search_date)->active()->where('station','DUPAX NORTE 2')->sum('tot_out');
        $dupax_sur_tot_out = DailySale:: where('date_encoded',$search_date)->active()->where('station','DUPAX SUR')->sum('tot_out');
        $kayapa1_tot_out = DailySale:: where('date_encoded',$search_date)->active()->where('station','KAYAPA 1')->sum('tot_out');
        $kayapa2_tot_out = DailySale:: where('date_encoded',$search_date)->active()->where('station','KAYAPA 2')->sum('tot_out');
        $kasibu_tot_out = DailySale:: where('date_encoded',$search_date)->active()->where('station','KASIBU')->sum('tot_out');
        $quezon_tot_out = DailySale:: where('date_encoded',$search_date)->active()->where('station','QUEZON')->sum('tot_out');
        $solano1_tot_out = DailySale:: where('date_encoded',$search_date)->active()->where('station','SOLANO 1')->sum('tot_out');
        $solano2_tot_out = DailySale:: where('date_encoded',$search_date)->active()->where('station','SOLANO 2')->sum('tot_out');
        $sta_fe_tot_out = DailySale:: where('date_encoded',$search_date)->active()->where('station','STA. FE')->sum('tot_out');
        $villaverde_tot_out = DailySale:: where('date_encoded',$search_date)->active()->where('station','VILLAVERDE')->sum('tot_out');
     

        $main_office_tot_cashin = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','MAIN OFFICE')->sum('cash_in');
        $aritao_tot_cashin = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','ARITAO')->sum('cash_in');
        $ambaguio1_tot_cashin = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','AMBAGUIO 1')->sum('cash_in');
        $ambaguio2_tot_cashin = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','AMBAGUIO 2')->sum('cash_in');
        $bagabag_tot_cashin = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','BAGABAG')->sum('cash_in');
        $bambang1_tot_cashin = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','BAMBANG 1')->sum('cash_in');
        $bambang2_tot_cashin = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','BAMBANG 2')->sum('cash_in');
        $bayombong_tot_cashin = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','BAYOMBONG')->sum('cash_in');
        $castaneda_tot_cashin = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','CASTANEDA')->sum('cash_in');
        $diadi_tot_cashin = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','DIADI')->sum('cash_in');
        $dupax_norte1_tot_cashin = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','DUPAX NORTE 1')->sum('cash_in');
        $dupax_norte2_tot_cashin = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','DUPAX NORTE 2')->sum('cash_in');
        $dupax_sur_tot_cashin = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','DUPAX SUR')->sum('cash_in');
        $kayapa1_tot_cashin = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','KAYAPA 1')->sum('cash_in');
        $kayapa2_tot_cashin = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','KAYAPA 2')->sum('cash_in');
        $kasibu_tot_cashin = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','KASIBU')->sum('cash_in');
        $quezon_tot_cashin = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','QUEZON')->sum('cash_in');
        $solano1_tot_cashin = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','SOLANO 1')->sum('cash_in');
        $solano2_tot_cashin = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','SOLANO 2')->sum('cash_in');
        $sta_fe_tot_cashin = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','STA. FE')->sum('cash_in');
        $villaverde_tot_cashin = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','VILLAVERDE')->sum('cash_in');
     


        $main_office_tot_others = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','MAIN OFFICE')->sum('cash_out');
        $aritao_tot_others = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','ARITAO')->sum('cash_out');
        $ambaguio1_tot_others = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','AMBAGUIO 1')->sum('cash_out');
        $ambaguio2_tot_others = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','AMBAGUIO 2')->sum('cash_out');
        $bagabag_tot_others = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','BAGABAG')->sum('cash_out');
        $bambang1_tot_others = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','BAMBANG 1')->sum('cash_out');
        $bambang2_tot_others = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','BAMBANG 2')->sum('cash_out');
        $bayombong_tot_others = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','BAYOMBONG')->sum('cash_out');
        $castaneda_tot_others = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','CASTANEDA')->sum('cash_out');
        $diadi_tot_others = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','DIADI')->sum('cash_out');
        $dupax_norte1_tot_others = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','DUPAX NORTE 1')->sum('cash_out');
        $dupax_norte2_tot_others = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','DUPAX NORTE 2')->sum('cash_out');
        $dupax_sur_tot_others = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','DUPAX SUR')->sum('cash_out');
        $kayapa1_tot_others = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','KAYAPA 1')->sum('cash_out');
        $kayapa2_tot_others = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','KAYAPA 2')->sum('cash_out');
        $kasibu_tot_others = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','KASIBU')->sum('cash_out');
        $quezon_tot_others = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','QUEZON')->sum('cash_out');
        $solano1_tot_others = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','SOLANO 1')->sum('cash_out');
        $solano2_tot_others = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','SOLANO 2')->sum('cash_out');
        $sta_fe_tot_others = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','STA. FE')->sum('cash_out');
        $villaverde_tot_others = AdditionalExpRec:: where('date_encoded',$search_date)->active()->where('station','VILLAVERDE')->sum('cash_out');
     


        $main_office_exp = Expenses:: where('date_encoded',$search_date)->active()->where('location','MAIN OFFICE')->sum('amount');
        $aritao_exp= Expenses:: where('date_encoded',$search_date)->active()->where('location','ARITAO')->sum('amount');
        $ambaguio1_exp = Expenses:: where('date_encoded',$search_date)->active()->where('location','AMBAGUIO 1')->sum('amount');
        $ambaguio2_exp = Expenses:: where('date_encoded',$search_date)->active()->where('location','AMBAGUIO 2')->sum('amount');
        $bagabag_exp = Expenses:: where('date_encoded',$search_date)->active()->where('location','BAGABAG')->sum('amount');
        $bambang1_exp = Expenses:: where('date_encoded',$search_date)->active()->where('location','BAMBANG 1')->sum('amount');
        $bambang2_exp = Expenses:: where('date_encoded',$search_date)->active()->where('location','BAMBANG 2')->sum('amount');
        $bayombong_exp = Expenses:: where('date_encoded',$search_date)->active()->where('location','BAYOMBONG')->sum('amount');
        $castaneda_exp = Expenses:: where('date_encoded',$search_date)->active()->where('location','CASTANEDA')->sum('amount');
        $diadi_exp = Expenses:: where('date_encoded',$search_date)->active()->where('location','DIADI')->sum('amount');
        $dupax_norte1_exp = Expenses:: where('date_encoded',$search_date)->active()->where('location','DUPAX NORTE 1')->sum('amount');
        $dupax_norte2_exp = Expenses:: where('date_encoded',$search_date)->active()->where('location','DUPAX NORTE 2')->sum('amount');
        $dupax_sur_exp = Expenses:: where('date_encoded',$search_date)->active()->where('location','DUPAX SUR')->sum('amount');
        $kayapa1_exp = Expenses:: where('date_encoded',$search_date)->active()->where('location','KAYAPA 1')->sum('amount');
        $kayapa2_exp = Expenses:: where('date_encoded',$search_date)->active()->where('location','KAYAPA 2')->sum('amount');
        $kasibu_exp = Expenses:: where('date_encoded',$search_date)->active()->where('location','KASIBU')->sum('amount');
        $quezon_exp = Expenses:: where('date_encoded',$search_date)->active()->where('location','QUEZON')->sum('amount');
        $solano1_exp = Expenses:: where('date_encoded',$search_date)->active()->where('location','SOLANO 1')->sum('amount');
        $solano2_exp = Expenses:: where('date_encoded',$search_date)->active()->where('location','SOLANO 2')->sum('amount');
        $sta_fe_exp = Expenses:: where('date_encoded',$search_date)->active()->where('location','STA. FE')->sum('amount');
        $villaverde_exp = Expenses:: where('date_encoded',$search_date)->active()->where('location','VILLAVERDE')->sum('amount');
     
        $Gtotal_exp = Expenses:: where('date_encoded',$search_date)->active()->sum('amount');


        $Gtotal_in = DailySale:: where('date_encoded',$search_date)->active()->sum('tot_in');
        $Gtotal_out = DailySale:: where('date_encoded',$search_date)->active()->sum('tot_out');
        $Gtotal_cashin = AdditionalExpRec:: where('date_encoded',$search_date)->active()->sum('cash_in');
        $Gtotal_others = AdditionalExpRec:: where('date_encoded',$search_date)->active()->sum('cash_out');



        // return view('daily-cash-balancing.accept-DCB.blade.php',
        return view('dcb.review',
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







    public function report(Request $request)
    {


        if(request('search_date')){
            $search_date= request('search_date');
        }else{
            $search_date=date('Y-m-d');
        }

        $coh1 =  CashOnHand:: where('c_date', $search_date)->where('status', 1) ->first();

        if ($coh1) { 
            $aaa =  CashOnHand::where('id','<',$coh1->id)->orderBy('id','desc')->first();
            $coh=CashOnHand::find($aaa->id);
            $cashonhand=$coh->cashonhand;
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
       

        $main_office_tot_in = Receipt:: where('r_date',$search_date)->active()->where('station','MAIN OFFICE')->sum('tot_in');
        $aritao_tot_in = Receipt:: where('r_date',$search_date)->active()->where('station','ARITAO')->sum('tot_in');
        $ambaguio1_tot_in = Receipt:: where('r_date',$search_date)->active()->where('station','AMBAGUIO 1')->sum('tot_in');
        $ambaguio2_tot_in = Receipt:: where('r_date',$search_date)->active()->where('station','AMBAGUIO 2')->sum('tot_in');
        $bagabag_tot_in = Receipt:: where('r_date',$search_date)->active()->where('station','BAGABAG')->sum('tot_in');
        $bambang1_tot_in = Receipt:: where('r_date',$search_date)->active()->where('station','BAMBANG 1')->sum('tot_in');
        $bambang2_tot_in = Receipt:: where('r_date',$search_date)->active()->where('station','BAMBANG 2')->sum('tot_in');
        $bayombong_tot_in = Receipt:: where('r_date',$search_date)->active()->where('station','BAYOMBONG')->sum('tot_in');
        $castaneda_tot_in = Receipt:: where('r_date',$search_date)->active()->where('station','CASTANEDA')->sum('tot_in');
        $diadi_tot_in = Receipt:: where('r_date',$search_date)->active()->where('station','DIADI')->sum('tot_in');
        $dupax_norte1_tot_in = Receipt:: where('r_date',$search_date)->active()->where('station','DUPAX NORTE 1')->sum('tot_in');
        $dupax_norte2_tot_in = Receipt:: where('r_date',$search_date)->active()->where('station','DUPAX NORTE 2')->sum('tot_in');
        $dupax_sur_tot_in = Receipt:: where('r_date',$search_date)->active()->where('station','DUPAX SUR')->sum('tot_in');
        $kayapa1_tot_in = Receipt:: where('r_date',$search_date)->active()->where('station','KAYAPA 1')->sum('tot_in');
        $kayapa2_tot_in = Receipt:: where('r_date',$search_date)->active()->where('station','KAYAPA 2')->sum('tot_in');
        $kasibu_tot_in = Receipt:: where('r_date',$search_date)->active()->where('station','KASIBU')->sum('tot_in');
        $quezon_tot_in = Receipt:: where('r_date',$search_date)->active()->where('station','QUEZON')->sum('tot_in');
        $solano_tot_in = Receipt:: where('r_date',$search_date)->active()->where('station','SOLANO')->sum('tot_in');
        $sta_fe_tot_in = Receipt:: where('r_date',$search_date)->active()->where('station','STA. FE')->sum('tot_in');
        $villaverde_tot_in = Receipt:: where('r_date',$search_date)->active()->where('station','VILLAVERDE')->sum('tot_in');
     

        
        $main_office_tot_out = Receipt:: where('r_date',$search_date)->active()->where('station','MAIN OFFICE')->sum('tot_out');
        $aritao_tot_out = Receipt:: where('r_date',$search_date)->active()->where('station','ARITAO')->sum('tot_out');
        $ambaguio1_tot_out = Receipt:: where('r_date',$search_date)->active()->where('station','AMBAGUIO 1')->sum('tot_out');
        $ambaguio2_tot_out = Receipt:: where('r_date',$search_date)->active()->where('station','AMBAGUIO 2')->sum('tot_out');
        $bagabag_tot_out = Receipt:: where('r_date',$search_date)->active()->where('station','BAGABAG')->sum('tot_out');
        $bambang1_tot_out = Receipt:: where('r_date',$search_date)->active()->where('station','BAMBANG 1')->sum('tot_out');
        $bambang2_tot_out = Receipt:: where('r_date',$search_date)->active()->where('station','BAMBANG 2')->sum('tot_out');
        $bayombong_tot_out = Receipt:: where('r_date',$search_date)->active()->where('station','BAYOMBONG')->sum('tot_out');
        $castaneda_tot_out = Receipt:: where('r_date',$search_date)->active()->where('station','CASTANEDA')->sum('tot_out');
        $diadi_tot_out = Receipt:: where('r_date',$search_date)->active()->where('station','DIADI')->sum('tot_out');
        $dupax_norte1_tot_out = Receipt:: where('r_date',$search_date)->active()->where('station','DUPAX NORTE 1')->sum('tot_out');
        $dupax_norte2_tot_out = Receipt:: where('r_date',$search_date)->active()->where('station','DUPAX NORTE 2')->sum('tot_out');
        $dupax_sur_tot_out = Receipt:: where('r_date',$search_date)->active()->where('station','DUPAX SUR')->sum('tot_out');
        $kayapa1_tot_out = Receipt:: where('r_date',$search_date)->active()->where('station','KAYAPA 1')->sum('tot_out');
        $kayapa2_tot_out = Receipt:: where('r_date',$search_date)->active()->where('station','KAYAPA 2')->sum('tot_out');
        $kasibu_tot_out = Receipt:: where('r_date',$search_date)->active()->where('station','KASIBU')->sum('tot_out');
        $quezon_tot_out = Receipt:: where('r_date',$search_date)->active()->where('station','QUEZON')->sum('tot_out');
        $solano_tot_out = Receipt:: where('r_date',$search_date)->active()->where('station','SOLANO')->sum('tot_out');
        $sta_fe_tot_out = Receipt:: where('r_date',$search_date)->active()->where('station','STA. FE')->sum('tot_out');
        $villaverde_tot_out = Receipt:: where('r_date',$search_date)->active()->where('station','VILLAVERDE')->sum('tot_out');
     

        $main_office_tot_cashin = Receipt:: where('r_date',$search_date)->active()->where('station','MAIN OFFICE')->sum('tot_cashin');
        $aritao_tot_cashin = Receipt:: where('r_date',$search_date)->active()->where('station','ARITAO')->sum('tot_cashin');
        $ambaguio1_tot_cashin = Receipt:: where('r_date',$search_date)->active()->where('station','AMBAGUIO 1')->sum('tot_cashin');
        $ambaguio2_tot_cashin = Receipt:: where('r_date',$search_date)->active()->where('station','AMBAGUIO 2')->sum('tot_cashin');
        $bagabag_tot_cashin = Receipt:: where('r_date',$search_date)->active()->where('station','BAGABAG')->sum('tot_cashin');
        $bambang1_tot_cashin = Receipt:: where('r_date',$search_date)->active()->where('station','BAMBANG 1')->sum('tot_cashin');
        $bambang2_tot_cashin = Receipt:: where('r_date',$search_date)->active()->where('station','BAMBANG 2')->sum('tot_cashin');
        $bayombong_tot_cashin = Receipt:: where('r_date',$search_date)->active()->where('station','BAYOMBONG')->sum('tot_cashin');
        $castaneda_tot_cashin = Receipt:: where('r_date',$search_date)->active()->where('station','CASTANEDA')->sum('tot_cashin');
        $diadi_tot_cashin = Receipt:: where('r_date',$search_date)->active()->where('station','DIADI')->sum('tot_cashin');
        $dupax_norte1_tot_cashin = Receipt:: where('r_date',$search_date)->active()->where('station','DUPAX NORTE 1')->sum('tot_cashin');
        $dupax_norte2_tot_cashin = Receipt:: where('r_date',$search_date)->active()->where('station','DUPAX NORTE 2')->sum('tot_cashin');
        $dupax_sur_tot_cashin = Receipt:: where('r_date',$search_date)->active()->where('station','DUPAX SUR')->sum('tot_cashin');
        $kayapa1_tot_cashin = Receipt:: where('r_date',$search_date)->active()->where('station','KAYAPA 1')->sum('tot_cashin');
        $kayapa2_tot_cashin = Receipt:: where('r_date',$search_date)->active()->where('station','KAYAPA 2')->sum('tot_cashin');
        $kasibu_tot_cashin = Receipt:: where('r_date',$search_date)->active()->where('station','KASIBU')->sum('tot_cashin');
        $quezon_tot_cashin = Receipt:: where('r_date',$search_date)->active()->where('station','QUEZON')->sum('tot_cashin');
        $solano_tot_cashin = Receipt:: where('r_date',$search_date)->active()->where('station','SOLANO')->sum('tot_cashin');
        $sta_fe_tot_cashin = Receipt:: where('r_date',$search_date)->active()->where('station','STA. FE')->sum('tot_cashin');
        $villaverde_tot_cashin = Receipt:: where('r_date',$search_date)->active()->where('station','VILLAVERDE')->sum('tot_cashin');
     


        $main_office_tot_others = Receipt:: where('r_date',$search_date)->active()->where('station','MAIN OFFICE')->sum('tot_others');
        $aritao_tot_others = Receipt:: where('r_date',$search_date)->active()->where('station','ARITAO')->sum('tot_others');
        $ambaguio1_tot_others = Receipt:: where('r_date',$search_date)->active()->where('station','AMBAGUIO 1')->sum('tot_others');
        $ambaguio2_tot_others = Receipt:: where('r_date',$search_date)->active()->where('station','AMBAGUIO 2')->sum('tot_others');
        $bagabag_tot_others = Receipt:: where('r_date',$search_date)->active()->where('station','BAGABAG')->sum('tot_others');
        $bambang1_tot_others = Receipt:: where('r_date',$search_date)->active()->where('station','BAMBANG 1')->sum('tot_others');
        $bambang2_tot_others = Receipt:: where('r_date',$search_date)->active()->where('station','BAMBANG 2')->sum('tot_others');
        $bayombong_tot_others = Receipt:: where('r_date',$search_date)->active()->where('station','BAYOMBONG')->sum('tot_others');
        $castaneda_tot_others = Receipt:: where('r_date',$search_date)->active()->where('station','CASTANEDA')->sum('tot_others');
        $diadi_tot_others = Receipt:: where('r_date',$search_date)->active()->where('station','DIADI')->sum('tot_others');
        $dupax_norte1_tot_others = Receipt:: where('r_date',$search_date)->active()->where('station','DUPAX NORTE 1')->sum('tot_others');
        $dupax_norte2_tot_others = Receipt:: where('r_date',$search_date)->active()->where('station','DUPAX NORTE 2')->sum('tot_others');
        $dupax_sur_tot_others = Receipt:: where('r_date',$search_date)->active()->where('station','DUPAX SUR')->sum('tot_others');
        $kayapa1_tot_others = Receipt:: where('r_date',$search_date)->active()->where('station','KAYAPA 1')->sum('tot_others');
        $kayapa2_tot_others = Receipt:: where('r_date',$search_date)->active()->where('station','KAYAPA 2')->sum('tot_others');
        $kasibu_tot_others = Receipt:: where('r_date',$search_date)->active()->where('station','KASIBU')->sum('tot_others');
        $quezon_tot_others = Receipt:: where('r_date',$search_date)->active()->where('station','QUEZON')->sum('tot_others');
        $solano_tot_others = Receipt:: where('r_date',$search_date)->active()->where('station','SOLANO')->sum('tot_others');
        $sta_fe_tot_others = Receipt:: where('r_date',$search_date)->active()->where('station','STA. FE')->sum('tot_others');
        $villaverde_tot_others = Receipt:: where('r_date',$search_date)->active()->where('station','VILLAVERDE')->sum('tot_others');
     


        $main_office_exp = Expenses:: where('e_date',$search_date)->active()->where('location','MAIN OFFICE')->sum('amount');
        $aritao_exp= Expenses:: where('e_date',$search_date)->active()->where('location','ARITAO')->sum('amount');
        $ambaguio1_exp = Expenses:: where('e_date',$search_date)->active()->where('location','AMBAGUIO 1')->sum('amount');
        $ambaguio2_exp = Expenses:: where('e_date',$search_date)->active()->where('location','AMBAGUIO 2')->sum('amount');
        $bagabag_exp = Expenses:: where('e_date',$search_date)->active()->where('location','BAGABAG')->sum('amount');
        $bambang1_exp = Expenses:: where('e_date',$search_date)->active()->where('location','BAMBANG 1')->sum('amount');
        $bambang2_exp = Expenses:: where('e_date',$search_date)->active()->where('location','BAMBANG 2')->sum('amount');
        $bayombong_exp = Expenses:: where('e_date',$search_date)->active()->where('location','BAYOMBONG')->sum('amount');
        $castaneda_exp = Expenses:: where('e_date',$search_date)->active()->where('location','CASTANEDA')->sum('amount');
        $diadi_exp = Expenses:: where('e_date',$search_date)->active()->where('location','DIADI')->sum('amount');
        $dupax_norte1_exp = Expenses:: where('e_date',$search_date)->active()->where('location','DUPAX NORTE 1')->sum('amount');
        $dupax_norte2_exp = Expenses:: where('e_date',$search_date)->active()->where('location','DUPAX NORTE 2')->sum('amount');
        $dupax_sur_exp = Expenses:: where('e_date',$search_date)->active()->where('location','DUPAX SUR')->sum('amount');
        $kayapa1_exp = Expenses:: where('e_date',$search_date)->active()->where('location','KAYAPA 1')->sum('amount');
        $kayapa2_exp = Expenses:: where('e_date',$search_date)->active()->where('location','KAYAPA 2')->sum('amount');
        $kasibu_exp = Expenses:: where('e_date',$search_date)->active()->where('location','KASIBU')->sum('amount');
        $quezon_exp = Expenses:: where('e_date',$search_date)->active()->where('location','QUEZON')->sum('amount');
        $solano_exp = Expenses:: where('e_date',$search_date)->active()->where('location','SOLANO')->sum('amount');
        $sta_fe_exp = Expenses:: where('e_date',$search_date)->active()->where('location','STA. FE')->sum('amount');
        $villaverde_exp = Expenses:: where('e_date',$search_date)->active()->where('location','VILLAVERDE')->sum('amount');
     
        $Gtotal_exp = Expenses:: where('e_date',$search_date)->active()->sum('amount');
        $Gtotal_in = Receipt:: where('r_date',$search_date)->active()->sum('tot_in');
        $Gtotal_out = Receipt:: where('r_date',$search_date)->active()->sum('tot_out');
        $Gtotal_cashin = Receipt:: where('r_date',$search_date)->active()->sum('tot_cashin');
        $Gtotal_others = Receipt:: where('r_date',$search_date)->active()->sum('tot_others');



        // return view('daily-cash-balancing.accept-DCB.blade.php',
        return view('dcb.report',
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
        'solano_tot_in',
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
        'solano_tot_out',
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
        'solano_tot_cashin',
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
        'solano_tot_others',
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
        'solano_exp',
        'sta_fe_exp',
        'villaverde_exp',
            




            ]));
    }





}
