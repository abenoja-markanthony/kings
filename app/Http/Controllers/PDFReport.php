<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\DailySale;
use App\Expenses;
use App\DailyCollectionSummary;
use App\Receipt;
use App\PreSale;
use App\Sale;
use App\AdditionalExpRec;
use App\CashOnHand;
use Auth;
use Illuminate\Support\Facades\Validator;

class PDFReport extends Controller
{
    public function PDF_DAILY(Request $request)
    {
        if(request('search_date')){
            $search_date= request('search_date');
        }else{ 
            $search_date=date('Y-m-d');
        }
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
       

        $main_office_tot_in = DailySale:: where('date_of_sale',$search_date)->active()->where('station','MAIN OFFICE')->sum('tot_in');
        $aritao_tot_in = DailySale:: where('date_of_sale',$search_date)->active()->where('station','ARITAO')->sum('tot_in');
        $ambaguio1_tot_in = DailySale:: where('date_of_sale',$search_date)->active()->where('station','AMBAGUIO 1')->sum('tot_in');
        $ambaguio2_tot_in = DailySale:: where('date_of_sale',$search_date)->active()->where('station','AMBAGUIO 2')->sum('tot_in');
        $bagabag_tot_in = DailySale:: where('date_of_sale',$search_date)->active()->where('station','BAGABAG')->sum('tot_in');
        $bambang1_tot_in = DailySale:: where('date_of_sale',$search_date)->active()->where('station','BAMBANG 1')->sum('tot_in');
        $bambang2_tot_in = DailySale:: where('date_of_sale',$search_date)->active()->where('station','BAMBANG 2')->sum('tot_in');
        $bayombong_tot_in = DailySale:: where('date_of_sale',$search_date)->active()->where('station','BAYOMBONG')->sum('tot_in');
        $castaneda_tot_in = DailySale:: where('date_of_sale',$search_date)->active()->where('station','CASTANEDA')->sum('tot_in');
        $diadi_tot_in = DailySale:: where('date_of_sale',$search_date)->active()->where('station','DIADI')->sum('tot_in');
        $dupax_norte1_tot_in = DailySale:: where('date_of_sale',$search_date)->active()->where('station','DUPAX NORTE 1')->sum('tot_in');
        $dupax_norte2_tot_in = DailySale:: where('date_of_sale',$search_date)->active()->where('station','DUPAX NORTE 2')->sum('tot_in');
        $dupax_sur_tot_in = DailySale:: where('date_of_sale',$search_date)->active()->where('station','DUPAX SUR')->sum('tot_in');
        $kayapa1_tot_in = DailySale:: where('date_of_sale',$search_date)->active()->where('station','KAYAPA 1')->sum('tot_in');
        $kayapa2_tot_in = DailySale:: where('date_of_sale',$search_date)->active()->where('station','KAYAPA 2')->sum('tot_in');
        $kasibu_tot_in = DailySale:: where('date_of_sale',$search_date)->active()->where('station','KASIBU')->sum('tot_in');
        $quezon_tot_in = DailySale:: where('date_of_sale',$search_date)->active()->where('station','QUEZON')->sum('tot_in');
        $solano1_tot_in = DailySale:: where('date_of_sale',$search_date)->active()->where('station','SOLANO 1')->sum('tot_in');
        $solano2_tot_in = DailySale:: where('date_of_sale',$search_date)->active()->where('station','SOLANO 2')->sum('tot_in');
        $sta_fe_tot_in = DailySale:: where('date_of_sale',$search_date)->active()->where('station','STA. FE')->sum('tot_in');
        $villaverde_tot_in = DailySale:: where('date_of_sale',$search_date)->active()->where('station','VILLAVERDE')->sum('tot_in');
     

        
        $main_office_tot_out = DailySale:: where('date_of_sale',$search_date)->active()->where('station','MAIN OFFICE')->sum('tot_out');
        $aritao_tot_out = DailySale:: where('date_of_sale',$search_date)->active()->where('station','ARITAO')->sum('tot_out');
        $ambaguio1_tot_out = DailySale:: where('date_of_sale',$search_date)->active()->where('station','AMBAGUIO 1')->sum('tot_out');
        $ambaguio2_tot_out = DailySale:: where('date_of_sale',$search_date)->active()->where('station','AMBAGUIO 2')->sum('tot_out');
        $bagabag_tot_out = DailySale:: where('date_of_sale',$search_date)->active()->where('station','BAGABAG')->sum('tot_out');
        $bambang1_tot_out = DailySale:: where('date_of_sale',$search_date)->active()->where('station','BAMBANG 1')->sum('tot_out');
        $bambang2_tot_out = DailySale:: where('date_of_sale',$search_date)->active()->where('station','BAMBANG 2')->sum('tot_out');
        $bayombong_tot_out = DailySale:: where('date_of_sale',$search_date)->active()->where('station','BAYOMBONG')->sum('tot_out');
        $castaneda_tot_out = DailySale:: where('date_of_sale',$search_date)->active()->where('station','CASTANEDA')->sum('tot_out');
        $diadi_tot_out = DailySale:: where('date_of_sale',$search_date)->active()->where('station','DIADI')->sum('tot_out');
        $dupax_norte1_tot_out = DailySale:: where('date_of_sale',$search_date)->active()->where('station','DUPAX NORTE 1')->sum('tot_out');
        $dupax_norte2_tot_out = DailySale:: where('date_of_sale',$search_date)->active()->where('station','DUPAX NORTE 2')->sum('tot_out');
        $dupax_sur_tot_out = DailySale:: where('date_of_sale',$search_date)->active()->where('station','DUPAX SUR')->sum('tot_out');
        $kayapa1_tot_out = DailySale:: where('date_of_sale',$search_date)->active()->where('station','KAYAPA 1')->sum('tot_out');
        $kayapa2_tot_out = DailySale:: where('date_of_sale',$search_date)->active()->where('station','KAYAPA 2')->sum('tot_out');
        $kasibu_tot_out = DailySale:: where('date_of_sale',$search_date)->active()->where('station','KASIBU')->sum('tot_out');
        $quezon_tot_out = DailySale:: where('date_of_sale',$search_date)->active()->where('station','QUEZON')->sum('tot_out');
        $solano1_tot_out = DailySale:: where('date_of_sale',$search_date)->active()->where('station','SOLANO 1')->sum('tot_out');
        $solano2_tot_out = DailySale:: where('date_of_sale',$search_date)->active()->where('station','SOLANO 2')->sum('tot_out');
        $sta_fe_tot_out = DailySale:: where('date_of_sale',$search_date)->active()->where('station','STA. FE')->sum('tot_out');
        $villaverde_tot_out = DailySale:: where('date_of_sale',$search_date)->active()->where('station','VILLAVERDE')->sum('tot_out');
     

        $main_office_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','MAIN OFFICE')->sum('cash_in');
        $aritao_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','ARITAO')->sum('cash_in');
        $ambaguio1_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','AMBAGUIO 1')->sum('cash_in');
        $ambaguio2_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','AMBAGUIO 2')->sum('cash_in');
        $bagabag_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','BAGABAG')->sum('cash_in');
        $bambang1_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','BAMBANG 1')->sum('cash_in');
        $bambang2_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','BAMBANG 2')->sum('cash_in');
        $bayombong_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','BAYOMBONG')->sum('cash_in');
        $castaneda_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','CASTANEDA')->sum('cash_in');
        $diadi_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','DIADI')->sum('cash_in');
        $dupax_norte1_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','DUPAX NORTE 1')->sum('cash_in');
        $dupax_norte2_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','DUPAX NORTE 2')->sum('cash_in');
        $dupax_sur_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','DUPAX SUR')->sum('cash_in');
        $kayapa1_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','KAYAPA 1')->sum('cash_in');
        $kayapa2_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','KAYAPA 2')->sum('cash_in');
        $kasibu_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','KASIBU')->sum('cash_in');
        $quezon_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','QUEZON')->sum('cash_in');
        $solano1_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','SOLANO 1')->sum('cash_in');
        $solano2_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','SOLANO 2')->sum('cash_in');
        $sta_fe_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','STA. FE')->sum('cash_in');
        $villaverde_tot_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','VILLAVERDE')->sum('cash_in');
     


        $main_office_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','MAIN OFFICE')->sum('cash_out');
        $aritao_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','ARITAO')->sum('cash_out');
        $ambaguio1_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','AMBAGUIO 1')->sum('cash_out');
        $ambaguio2_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','AMBAGUIO 2')->sum('cash_out');
        $bagabag_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','BAGABAG')->sum('cash_out');
        $bambang1_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','BAMBANG 1')->sum('cash_out');
        $bambang2_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','BAMBANG 2')->sum('cash_out');
        $bayombong_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','BAYOMBONG')->sum('cash_out');
        $castaneda_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','CASTANEDA')->sum('cash_out');
        $diadi_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','DIADI')->sum('cash_out');
        $dupax_norte1_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','DUPAX NORTE 1')->sum('cash_out');
        $dupax_norte2_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','DUPAX NORTE 2')->sum('cash_out');
        $dupax_sur_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','DUPAX SUR')->sum('cash_out');
        $kayapa1_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','KAYAPA 1')->sum('cash_out');
        $kayapa2_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','KAYAPA 2')->sum('cash_out');
        $kasibu_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','KASIBU')->sum('cash_out');
        $quezon_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','QUEZON')->sum('cash_out');
        $solano1_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','SOLANO 1')->sum('cash_out');
        $solano2_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','SOLANO 2')->sum('cash_out');
        $sta_fe_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','STA. FE')->sum('cash_out');
        $villaverde_tot_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->where('station','VILLAVERDE')->sum('cash_out');
     


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
        $solano1_exp = Expenses:: where('e_date',$search_date)->active()->where('location','SOLANO 1')->sum('amount');
        $solano2_exp = Expenses:: where('e_date',$search_date)->active()->where('location','SOLANO 2')->sum('amount');
        $sta_fe_exp = Expenses:: where('e_date',$search_date)->active()->where('location','STA. FE')->sum('amount');
        $villaverde_exp = Expenses:: where('e_date',$search_date)->active()->where('location','VILLAVERDE')->sum('amount');
     
        $Gtotal_exp = Expenses:: where('e_date',$search_date)->active()->sum('amount');


        $Gtotal_in = DailySale:: where('date_of_sale',$search_date)->active()->sum('tot_in');
        $Gtotal_out = DailySale:: where('date_of_sale',$search_date)->active()->sum('tot_out');
        $Gtotal_cashin = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->sum('cash_in');
        $Gtotal_others = AdditionalExpRec:: where('date_of_receipt',$search_date)->active()->sum('cash_out');


        $filename='DCB_'.$search_date.'.pdf';
        $name=Auth::user()->name;

        $mpdf=new \Mpdf\Mpdf([
            'margin_left'=>10,
            'margin_right'=>10,
            'margin_top'=>10,
            'margin_bottom'=>10,
            'margin_header'=>10,
            'margin_footer'=>10
        ]);

        $html= \View::make('PDF.daily-report',
        
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
            
        'name'

        ]));
        $html=$html->render();
        $mpdf->SetHeader('DAILY SALES REPORT');
        $mpdf->SetFooter('KINGS');
        $stylesheet=file_get_contents(url('/css/DCB-PDF.css'));
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($html);
        $mpdf->Output($filename,'I');


        // return view('PDF.report',compact('data'));
    }


    


    public function DCB_REPORT(Request $request)
    {
        if(request('search_date')){
            $search_date= request('search_date');
        }else{
            $search_date=date('Y-m-d');
        }

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


        $hide_me='0';
        $filename='DCB-REPORT-'.$search_date.'.pdf';
        $name=Auth::user()->name;

        $mpdf=new \Mpdf\Mpdf([
            'margin_left'=>10,
            'margin_right'=>10,
            'margin_top'=>10,
            'margin_bottom'=>10,
            'margin_header'=>10,
            'margin_footer'=>10
        ]);

        $html= \View::make('PDF.dcb-report',
        
        compact([
            'hide_me',
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
            
        'name'

        ]));
        $html=$html->render();
        $mpdf->SetHeader('DAILY CASH BALANCE');
        $mpdf->SetFooter('KINGS');
        $stylesheet=file_get_contents(url('/css/DCB-PDF.css'));
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($html);
        $mpdf->Output($filename,'I');


        // return view('PDF.report',compact('data'));
    }


public function pre_collect(Request $request)
{

    $date_of_sale=request('date_of_sale');
    $net_sales = PreSale:: where('date_of_sale',$date_of_sale)->active()->sum('net_sales');
    $tot_in = PreSale:: where('date_of_sale',$date_of_sale)->active()->sum('tot_in');
    $tot_out = PreSale:: where('date_of_sale',$date_of_sale)->active()->sum('tot_out');

    $net_sales = PreSale:: where('date_of_sale',$date_of_sale)->active()->sum('net_sales');
    $tot_in = PreSale:: where('date_of_sale',$date_of_sale)->active()->sum('tot_in');
    $tot_out = PreSale:: where('date_of_sale',$date_of_sale)->active()->sum('tot_out');

    $tot_in_AM = PreSale:: where('date_of_sale',$date_of_sale)->active()->sum('AM_in');
    $tot_out_AM = PreSale:: where('date_of_sale',$date_of_sale)->active()->sum('AM_out');

    $tot_in_PM = PreSale:: where('date_of_sale',$date_of_sale)->active()->sum('PM_in');
    $tot_out_PM = PreSale:: where('date_of_sale',$date_of_sale)->active()->sum('PM_out');

    $tot_in_EXTRA = PreSale:: where('date_of_sale',$date_of_sale)->active()->sum('EXTRA_in');
    $tot_out_EXTRA = PreSale:: where('date_of_sale',$date_of_sale)->active()->sum('EXTRA_out');

    $get_id = DailyCollectionSummary:: where('date_of_sale',$date_of_sale)->active()->first();
    $id=$get_id->id;
    $id1=$id-1;
    $id2=$id-2;

    $first_liq = DailyCollectionSummary:: where('id',$id1)->active()->first();
    $second_liq = DailyCollectionSummary:: where('id',$id2)->active()->first();

    if($first_liq){
        $first_date=$first_liq->date_of_sale;
        $first_net=number_format($first_liq->net_sales,2);
    }else{
        $first_date='';
        $first_net='';
    }

    if($second_liq){
        $second_date=$second_liq->date_of_sale;
        $second_net=number_format($second_liq->net_sales,2);
    }else{
        $second_date='';
        $second_net=''; 
    }

    $filename='PRE-COLLECTION-'.$date_of_sale.'.pdf';
    $name=Auth::user()->name;
    $sales =  PreSale::where('status', '1')
    ->where('date_of_sale',request('date_of_sale'))->get();

    $mpdf=new \Mpdf\Mpdf([
        'margin_left'=>10,
        'margin_right'=>10,
        'margin_top'=>10,
        'margin_bottom'=>10,
        'margin_header'=>10,
        'margin_footer'=>10
    ]);
    

    $html= \View::make('PDF.pre-collection',
        
    compact([
        'sales','date_of_sale','tot_in','tot_out','net_sales',
            'tot_in_AM',
            'tot_in_PM',
            'tot_in_EXTRA',
            'tot_out_AM',
            'tot_out_PM',
            'tot_out_EXTRA',
            'first_date',
            'second_date',
            'first_net',
            'second_net'

    ]));
    $html=$html->render();
    $mpdf->SetHeader('DAILY PRE-COLLECTION REPORT');
    $mpdf->SetFooter('KINGS');
    $stylesheet=file_get_contents(url('/css/pre-collect.css'));
    $mpdf->WriteHTML($stylesheet,1);
    $mpdf->WriteHTML($html);
    $mpdf->Output($filename,'I');

        

}


public function station_expenses(Request $request)
{
    $month=request('month');
    $year=request('year');
    // dd($month);
    $main_office_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','MAIN OFFICE')
                ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                ->where('type_of_exp','!=','LOCAL')->active()->sum('amount');
    $aritao_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','ARITAO')
                ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                ->where('type_of_exp','!=','LOCAL')->active()->sum('amount');
    $ambaguio1_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','AMBAGUIO 1')
                ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                ->where('type_of_exp','!=','LOCAL')->active()->sum('amount');
    $ambaguio2_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','AMBAGUIO 2')
                ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                ->where('type_of_exp','!=','LOCAL')->active()->sum('amount');
    $bagabag_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','BAGABAG')
                ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                ->where('type_of_exp','!=','LOCAL')->active()->sum('amount');
    $bambang1_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','BAMBANG 1')
                ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                ->where('type_of_exp','!=','LOCAL')->active()->sum('amount');
    $bambang2_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','BAMBANG 2')
                ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                ->where('type_of_exp','!=','LOCAL')->active()->sum('amount');
    $bayombong_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','BAYOMBONG')
                ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                ->where('type_of_exp','!=','LOCAL')->active()->sum('amount');
    $castaneda_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','CASTANEDA')
                ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                ->where('type_of_exp','!=','LOCAL')->active()->sum('amount');
    $diadi_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','DIADI')
                ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                ->where('type_of_exp','!=','LOCAL')->active()->sum('amount');
    $dupax_norte1_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','DUPAX NORTE 1')
                ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                ->where('type_of_exp','!=','LOCAL')->active()->sum('amount');
    $dupax_norte2_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','DUPAX NORTE 2')
                ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                ->where('type_of_exp','!=','LOCAL')->active()->sum('amount');
    $dupax_sur_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','DUPAX SUR')
                ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                ->where('type_of_exp','!=','LOCAL')->active()->sum('amount');
    $kayapa1_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','KAYAPA 1')
                ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                ->where('type_of_exp','!=','LOCAL')->active()->sum('amount');
    $kayapa2_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','KAYAPA 2')
                ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                ->where('type_of_exp','!=','LOCAL')->active()->sum('amount');
    $kasibu_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','KASIBU')
                ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                ->where('type_of_exp','!=','LOCAL')->active()->sum('amount');
    $quezon_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','QUEZON')
                ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                ->where('type_of_exp','!=','LOCAL')->active()->sum('amount');
    $solano1_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','SOLANO 1')
                ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                ->where('type_of_exp','!=','LOCAL')->active()->sum('amount');
    $solano2_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','SOLANO 2')
                ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                ->where('type_of_exp','!=','LOCAL')->active()->sum('amount');
    $sta_fe_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','STA. FE')
                ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                ->where('type_of_exp','!=','LOCAL')->active()->sum('amount');
    $villaverde_exp= Expenses::whereMonth('e_date', '=', $month)->where('location','VILLAVERDE')
                ->where('type_of_exp','!=','LOAN')->where('type_of_exp','!=','PCSO DAILY REMITTANCE')->where('type_of_exp','!=','TICKET')->where('type_of_exp','!=','NATIONAL')
                ->where('type_of_exp','!=','LOCAL')->active()->sum('amount');

    
    $filename='STATION EXPENSES-'.$month.'-'.$year.'.pdf';
    $name=Auth::user()->name;
   
    $mpdf=new \Mpdf\Mpdf([
        'margin_left'=>10,
        'margin_right'=>10,
        'margin_top'=>10,
        'margin_bottom'=>10,
        'margin_header'=>10,
        'margin_footer'=>10,
        
    ]);

    $html= \View::make('PDF.station-expenses',
        
    compact([
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
        'solano1_exp',
        'solano2_exp',
        'sta_fe_exp',
        'villaverde_exp'

    ]));
    $html=$html->render();
    $mpdf->SetHeader('EXPENSES REPORT');
    $mpdf->SetFooter('KINGS');
    $stylesheet=file_get_contents(url('/css/station_expenses.css'));
    $mpdf->WriteHTML($stylesheet,1);
    $mpdf->WriteHTML($html);
    $mpdf->Output($filename,'I');

}





public function monthly_report(Request $request)
{
    $month=request('month');
    $year=request('year');
    $mdate=$year.'-'.$month.'-';

    $day1= DailyCollectionSummary::where('date_of_sale',$mdate.'01')->active()->first();
    $day2= DailyCollectionSummary::where('date_of_sale',$mdate.'02')->active()->first();
    $day3= DailyCollectionSummary::where('date_of_sale',$mdate.'03')->active()->first();
    $day4= DailyCollectionSummary::where('date_of_sale',$mdate.'04')->active()->first();
    $day5= DailyCollectionSummary::where('date_of_sale',$mdate.'05')->active()->first();
    $day6= DailyCollectionSummary::where('date_of_sale',$mdate.'06')->active()->first();
    $day7= DailyCollectionSummary::where('date_of_sale',$mdate.'07')->active()->first();
    $day8= DailyCollectionSummary::where('date_of_sale',$mdate.'08')->active()->first();
    $day9= DailyCollectionSummary::where('date_of_sale',$mdate.'09')->active()->first();
    $day10= DailyCollectionSummary::where('date_of_sale',$mdate.'10')->active()->first();
    $day11= DailyCollectionSummary::where('date_of_sale',$mdate.'11')->active()->first();
    $day12= DailyCollectionSummary::where('date_of_sale',$mdate.'12')->active()->first();
    $day13= DailyCollectionSummary::where('date_of_sale',$mdate.'13')->active()->first();
    $day14= DailyCollectionSummary::where('date_of_sale',$mdate.'14')->active()->first();
    $day15= DailyCollectionSummary::where('date_of_sale',$mdate.'15')->active()->first();
    $day16= DailyCollectionSummary::where('date_of_sale',$mdate.'16')->active()->first();
    $day17= DailyCollectionSummary::where('date_of_sale',$mdate.'17')->active()->first();
    $day18= DailyCollectionSummary::where('date_of_sale',$mdate.'18')->active()->first();
    $day19= DailyCollectionSummary::where('date_of_sale',$mdate.'19')->active()->first();
    $day20= DailyCollectionSummary::where('date_of_sale',$mdate.'20')->active()->first();
    $day21= DailyCollectionSummary::where('date_of_sale',$mdate.'21')->active()->first();
    $day22= DailyCollectionSummary::where('date_of_sale',$mdate.'22')->active()->first();
    $day23= DailyCollectionSummary::where('date_of_sale',$mdate.'23')->active()->first();
    $day24= DailyCollectionSummary::where('date_of_sale',$mdate.'24')->active()->first();
    $day25= DailyCollectionSummary::where('date_of_sale',$mdate.'25')->active()->first();
    $day26= DailyCollectionSummary::where('date_of_sale',$mdate.'26')->active()->first();
    $day27= DailyCollectionSummary::where('date_of_sale',$mdate.'27')->active()->first();
    $day28= DailyCollectionSummary::where('date_of_sale',$mdate.'28')->active()->first();
    $day29= DailyCollectionSummary::where('date_of_sale',$mdate.'29')->active()->first();
    $day30= DailyCollectionSummary::where('date_of_sale',$mdate.'30')->active()->first();
    $day31= DailyCollectionSummary::where('date_of_sale',$mdate.'31')->active()->first();

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
    
    $filename='MONTHLY REPORT-'.$month.'-'.$year.'.pdf';
    $name=Auth::user()->name;
   
    $mpdf=new \Mpdf\Mpdf([
        'margin_left'=>10,
        'margin_right'=>10,
        'margin_top'=>5,
        'margin_bottom'=>10,
        'margin_header'=>10,
        'margin_footer'=>10,
        'orientation' => 'L'
    ]);

    $html= \View::make('PDF.monthly-report',
        
    compact([
        'month','year',
        'day1','day2','day3','day4','day5','day6','day7','day8','day9','day10',
        'day11','day12','day13','day14','day15','day16','day17','day18','day19','day20',
        'day21','day22','day23','day24','day25','day26','day27','day28','day29','day30','day31',
        'pcso1','pcso2','pcso3','pcso4','pcso5','pcso6','pcso7','pcso8','pcso9','pcso10',
        'pcso11','pcso12','pcso13','pcso14','pcso15','pcso16','pcso17','pcso18','pcso19','pcso20',
        'pcso21','pcso22','pcso23','pcso24','pcso25','pcso26','pcso27','pcso28','pcso29','pcso30','pcso31',
        'la_national','la_local','la_expenses','la_loan','la_ticket','la_pcso','la_flexible_fund'

    ]));
    $html=$html->render();
    // $mpdf->SetHeader('MONTHLY REPORT');
    // $mpdf->SetFooter('KINGS');
    $stylesheet=file_get_contents(url('/css/monthly_report.css'));
    $mpdf->WriteHTML($stylesheet,1);
    $mpdf->WriteHTML($html);
    $mpdf->Output($filename,'I');

}

public function manager_exp1(Request $request)
{
    $month=request('month');
    $year=request('year');

    $pre= PreSale::whereMonth('date_of_sale', '=', $month)->active()->sum('net_sales');
    $day= DailySale::whereMonth('date_of_sale', '=', $month)->active()->sum('net_sales');
    dd(number_format($pre,2 ).'-'.number_format($day,2 ).'='.number_format($pre-$day,2));


}


public function manager_exp(Request $request)
{
    $month=request('month');
    $year=request('year');
    $mdate=$year.'-'.$month.'-';
    $month=request('month');
    $year=request('year');
    $manager=request('manager');
    $exp= Expenses::whereMonth('e_date', '=', $month)->orderBy('e_date', 'ASC')->where('exp_cat',$manager)->active()->get();
    $total=Expenses::whereMonth('e_date', '=', $month)->where('exp_cat',$manager)->active()->sum('amount');
    
    $filename='MANAGER EXPENSE-'.$month.'-'.$year.'.pdf';
    $name=Auth::user()->name;
   
    $mpdf=new \Mpdf\Mpdf([
        'margin_left'=>10,
        'margin_right'=>10,
        'margin_top'=>5,
        'margin_bottom'=>10,
        'margin_header'=>10,
        'margin_footer'=>10,
        'format' => 'A4-P'
        // 'orientation' => 'L'
    ]);

    $html= \View::make('PDF.manager-expense-report',
        
    compact([
        'month','year','exp','manager','total'
    ]));
    $html=$html->render();
    // $mpdf->SetHeader('EXPENSES REPORT');
    // $mpdf->SetFooter('MONTHLY MANAGERS EXPENSE REPORT');
    $stylesheet=file_get_contents(url('/css/manager_exp.css'));
    $mpdf->WriteHTML($stylesheet,1);
    $mpdf->WriteHTML($html);
    $mpdf->Output($filename,'I');

}




public function monthly_report4(Request $request)
{
    $month=request('month');
    $year=request('year');
    $mdate=$year.'-'.$month.'-';

    $day1_ffund= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day1_loan= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day1_brgy= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day1_cable= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day1_comida= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day1_donation= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day1_electricity= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day1_gasoline= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day1_house_rental= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day1_lpg= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','LPG')->active()->sum('amount');
    $day1_meals= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day1_medicine= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day1_miscellaneous= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day1_pagibig= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day1_pcso= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day1_philhealth= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day1_porlata= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day1_repairs= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day1_representation= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day1_salaries= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day1_sss= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','SSS')->active()->sum('amount');
    $day1_supplies_station= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day1_supplies_main_office= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day1_taxes_bir= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day1_taxes_pcso= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day1_trans_vac= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day1_travelling= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day1_vehicle_rental= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day1_water_drinking= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day1_water_bill= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day1_national= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day1_local= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day1_management= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day1_ticket= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day1_others= Expenses::where('e_date',$mdate.'01')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day2_ffund= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day2_loan= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day2_brgy= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day2_cable= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day2_comida= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day2_donation= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day2_electricity= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day2_gasoline= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day2_house_rental= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day2_lpg= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','LPG')->active()->sum('amount');
    $day2_meals= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day2_medicine= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day2_miscellaneous= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day2_pagibig= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day2_pcso= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day2_philhealth= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day2_porlata= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day2_repairs= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day2_representation= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day2_salaries= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day2_sss= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','SSS')->active()->sum('amount');
    $day2_supplies_station= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day2_supplies_main_office= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day2_taxes_bir= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day2_taxes_pcso= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day2_trans_vac= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day2_travelling= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day2_vehicle_rental= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day2_water_drinking= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day2_water_bill= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day2_national= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day2_local= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day2_management= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day2_ticket= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day2_others= Expenses::where('e_date',$mdate.'02')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day3_ffund= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day3_loan= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day3_brgy= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day3_cable= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day3_comida= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day3_donation= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day3_electricity= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day3_gasoline= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day3_house_rental= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day3_lpg= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','LPG')->active()->sum('amount');
    $day3_meals= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day3_medicine= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day3_miscellaneous= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day3_pagibig= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day3_pcso= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day3_philhealth= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day3_porlata= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day3_repairs= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day3_representation= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day3_salaries= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day3_sss= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','SSS')->active()->sum('amount');
    $day3_supplies_station= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day3_supplies_main_office= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day3_taxes_bir= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day3_taxes_pcso= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day3_trans_vac= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day3_travelling= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day3_vehicle_rental= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day3_water_drinking= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day3_water_bill= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day3_national= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day3_local= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day3_management= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day3_ticket= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day3_others= Expenses::where('e_date',$mdate.'03')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day4_ffund= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day4_loan= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day4_brgy= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day4_cable= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day4_comida= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day4_donation= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day4_electricity= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day4_gasoline= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day4_house_rental= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day4_lpg= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','LPG')->active()->sum('amount');
    $day4_meals= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day4_medicine= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day4_miscellaneous= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day4_pagibig= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day4_pcso= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day4_philhealth= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day4_porlata= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day4_repairs= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day4_representation= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day4_salaries= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day4_sss= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','SSS')->active()->sum('amount');
    $day4_supplies_station= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day4_supplies_main_office= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day4_taxes_bir= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day4_taxes_pcso= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day4_trans_vac= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day4_travelling= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day4_vehicle_rental= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day4_water_drinking= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day4_water_bill= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day4_national= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day4_local= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day4_management= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day4_ticket= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day4_others= Expenses::where('e_date',$mdate.'04')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day5_ffund= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day5_loan= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day5_brgy= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day5_cable= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day5_comida= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day5_donation= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day5_electricity= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day5_gasoline= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day5_house_rental= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day5_lpg= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','LPG')->active()->sum('amount');
    $day5_meals= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day5_medicine= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day5_miscellaneous= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day5_pagibig= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day5_pcso= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day5_philhealth= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day5_porlata= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day5_repairs= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day5_representation= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day5_salaries= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day5_sss= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','SSS')->active()->sum('amount');
    $day5_supplies_station= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day5_supplies_main_office= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day5_taxes_bir= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day5_taxes_pcso= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day5_trans_vac= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day5_travelling= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day5_vehicle_rental= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day5_water_drinking= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day5_water_bill= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day5_national= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day5_local= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day5_management= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day5_ticket= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day5_others= Expenses::where('e_date',$mdate.'05')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day6_ffund= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day6_loan= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day6_brgy= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day6_cable= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day6_comida= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day6_donation= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day6_electricity= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day6_gasoline= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day6_house_rental= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day6_lpg= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','LPG')->active()->sum('amount');
    $day6_meals= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day6_medicine= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day6_miscellaneous= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day6_pagibig= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day6_pcso= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day6_philhealth= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day6_porlata= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day6_repairs= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day6_representation= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day6_salaries= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day6_sss= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','SSS')->active()->sum('amount');
    $day6_supplies_station= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day6_supplies_main_office= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day6_taxes_bir= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day6_taxes_pcso= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day6_trans_vac= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day6_travelling= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day6_vehicle_rental= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day6_water_drinking= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day6_water_bill= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day6_national= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day6_local= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day6_management= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day6_ticket= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day6_others= Expenses::where('e_date',$mdate.'06')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day7_ffund= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day7_loan= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day7_brgy= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day7_cable= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day7_comida= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day7_donation= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day7_electricity= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day7_gasoline= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day7_house_rental= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day7_lpg= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','LPG')->active()->sum('amount');
    $day7_meals= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day7_medicine= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day7_miscellaneous= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day7_pagibig= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day7_pcso= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day7_philhealth= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day7_porlata= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day7_repairs= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day7_representation= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day7_salaries= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day7_sss= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','SSS')->active()->sum('amount');
    $day7_supplies_station= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day7_supplies_main_office= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day7_taxes_bir= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day7_taxes_pcso= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day7_trans_vac= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day7_travelling= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day7_vehicle_rental= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day7_water_drinking= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day7_water_bill= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day7_national= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day7_local= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day7_management= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day7_ticket= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day7_others= Expenses::where('e_date',$mdate.'07')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day8_ffund= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day8_loan= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day8_brgy= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day8_cable= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day8_comida= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day8_donation= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day8_electricity= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day8_gasoline= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day8_house_rental= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day8_lpg= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','LPG')->active()->sum('amount');
    $day8_meals= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day8_medicine= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day8_miscellaneous= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day8_pagibig= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day8_pcso= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day8_philhealth= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day8_porlata= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day8_repairs= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day8_representation= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day8_salaries= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day8_sss= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','SSS')->active()->sum('amount');
    $day8_supplies_station= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day8_supplies_main_office= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day8_taxes_bir= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day8_taxes_pcso= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day8_trans_vac= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day8_travelling= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day8_vehicle_rental= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day8_water_drinking= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day8_water_bill= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day8_national= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day8_local= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day8_management= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day8_ticket= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day8_others= Expenses::where('e_date',$mdate.'08')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day9_ffund= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day9_loan= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day9_brgy= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day9_cable= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day9_comida= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day9_donation= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day9_electricity= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day9_gasoline= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day9_house_rental= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day9_lpg= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','LPG')->active()->sum('amount');
    $day9_meals= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day9_medicine= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day9_miscellaneous= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day9_pagibig= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day9_pcso= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day9_philhealth= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day9_porlata= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day9_repairs= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day9_representation= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day9_salaries= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day9_sss= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','SSS')->active()->sum('amount');
    $day9_supplies_station= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day9_supplies_main_office= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day9_taxes_bir= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day9_taxes_pcso= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day9_trans_vac= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day9_travelling= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day9_vehicle_rental= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day9_water_drinking= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day9_water_bill= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day9_national= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day9_local= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day9_management= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day9_ticket= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day9_others= Expenses::where('e_date',$mdate.'09')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day10_ffund= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day10_loan= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day10_brgy= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day10_cable= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day10_comida= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day10_donation= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day10_electricity= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day10_gasoline= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day10_house_rental= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day10_lpg= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','LPG')->active()->sum('amount');
    $day10_meals= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day10_medicine= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day10_miscellaneous= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day10_pagibig= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day10_pcso= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day10_philhealth= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day10_porlata= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day10_repairs= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day10_representation= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day10_salaries= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day10_sss= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','SSS')->active()->sum('amount');
    $day10_supplies_station= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day10_supplies_main_office= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day10_taxes_bir= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day10_taxes_pcso= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day10_trans_vac= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day10_travelling= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day10_vehicle_rental= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day10_water_drinking= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day10_water_bill= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day10_national= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day10_local= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day10_management= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day10_ticket= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day10_others= Expenses::where('e_date',$mdate.'10')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day11_ffund= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day11_loan= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day11_brgy= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day11_cable= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day11_comida= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day11_donation= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day11_electricity= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day11_gasoline= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day11_house_rental= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day11_lpg= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','LPG')->active()->sum('amount');
    $day11_meals= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day11_medicine= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day11_miscellaneous= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day11_pagibig= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day11_pcso= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day11_philhealth= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day11_porlata= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day11_repairs= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day11_representation= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day11_salaries= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day11_sss= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','SSS')->active()->sum('amount');
    $day11_supplies_station= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day11_supplies_main_office= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day11_taxes_bir= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day11_taxes_pcso= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day11_trans_vac= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day11_travelling= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day11_vehicle_rental= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day11_water_drinking= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day11_water_bill= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day11_national= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day11_local= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day11_management= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day11_ticket= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day11_others= Expenses::where('e_date',$mdate.'11')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day12_ffund= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day12_loan= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day12_brgy= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day12_cable= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day12_comida= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day12_donation= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day12_electricity= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day12_gasoline= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day12_house_rental= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day12_lpg= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','LPG')->active()->sum('amount');
    $day12_meals= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day12_medicine= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day12_miscellaneous= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day12_pagibig= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day12_pcso= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day12_philhealth= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day12_porlata= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day12_repairs= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day12_representation= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day12_salaries= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day12_sss= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','SSS')->active()->sum('amount');
    $day12_supplies_station= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day12_supplies_main_office= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day12_taxes_bir= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day12_taxes_pcso= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day12_trans_vac= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day12_travelling= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day12_vehicle_rental= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day12_water_drinking= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day12_water_bill= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day12_national= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day12_local= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day12_management= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day12_ticket= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day12_others= Expenses::where('e_date',$mdate.'12')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day13_ffund= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day13_loan= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day13_brgy= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day13_cable= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day13_comida= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day13_donation= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day13_electricity= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day13_gasoline= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day13_house_rental= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day13_lpg= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','LPG')->active()->sum('amount');
    $day13_meals= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day13_medicine= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day13_miscellaneous= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day13_pagibig= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day13_pcso= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day13_philhealth= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day13_porlata= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day13_repairs= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day13_representation= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day13_salaries= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day13_sss= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','SSS')->active()->sum('amount');
    $day13_supplies_station= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day13_supplies_main_office= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day13_taxes_bir= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day13_taxes_pcso= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day13_trans_vac= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day13_travelling= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day13_vehicle_rental= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day13_water_drinking= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day13_water_bill= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day13_national= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day13_local= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day13_management= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day13_ticket= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day13_others= Expenses::where('e_date',$mdate.'13')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day14_ffund= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day14_loan= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day14_brgy= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day14_cable= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day14_comida= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day14_donation= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day14_electricity= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day14_gasoline= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day14_house_rental= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day14_lpg= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','LPG')->active()->sum('amount');
    $day14_meals= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day14_medicine= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day14_miscellaneous= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day14_pagibig= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day14_pcso= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day14_philhealth= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day14_porlata= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day14_repairs= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day14_representation= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day14_salaries= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day14_sss= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','SSS')->active()->sum('amount');
    $day14_supplies_station= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day14_supplies_main_office= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day14_taxes_bir= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day14_taxes_pcso= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day14_trans_vac= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day14_travelling= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day14_vehicle_rental= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day14_water_drinking= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day14_water_bill= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day14_national= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day14_local= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day14_management= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day14_ticket= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day14_others= Expenses::where('e_date',$mdate.'14')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day15_ffund= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day15_loan= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day15_brgy= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day15_cable= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day15_comida= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day15_donation= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day15_electricity= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day15_gasoline= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day15_house_rental= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day15_lpg= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','LPG')->active()->sum('amount');
    $day15_meals= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day15_medicine= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day15_miscellaneous= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day15_pagibig= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day15_pcso= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day15_philhealth= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day15_porlata= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day15_repairs= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day15_representation= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day15_salaries= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day15_sss= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','SSS')->active()->sum('amount');
    $day15_supplies_station= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day15_supplies_main_office= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day15_taxes_bir= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day15_taxes_pcso= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day15_trans_vac= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day15_travelling= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day15_vehicle_rental= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day15_water_drinking= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day15_water_bill= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day15_national= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day15_local= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day15_management= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day15_ticket= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day15_others= Expenses::where('e_date',$mdate.'15')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day16_ffund= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day16_loan= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day16_brgy= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day16_cable= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day16_comida= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day16_donation= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day16_electricity= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day16_gasoline= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day16_house_rental= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day16_lpg= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','LPG')->active()->sum('amount');
    $day16_meals= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day16_medicine= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day16_miscellaneous= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day16_pagibig= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day16_pcso= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day16_philhealth= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day16_porlata= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day16_repairs= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day16_representation= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day16_salaries= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day16_sss= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','SSS')->active()->sum('amount');
    $day16_supplies_station= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day16_supplies_main_office= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day16_taxes_bir= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day16_taxes_pcso= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day16_trans_vac= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day16_travelling= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day16_vehicle_rental= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day16_water_drinking= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day16_water_bill= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day16_national= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day16_local= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day16_management= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day16_ticket= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day16_others= Expenses::where('e_date',$mdate.'16')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day17_ffund= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day17_loan= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day17_brgy= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day17_cable= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day17_comida= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day17_donation= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day17_electricity= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day17_gasoline= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day17_house_rental= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day17_lpg= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','LPG')->active()->sum('amount');
    $day17_meals= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day17_medicine= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day17_miscellaneous= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day17_pagibig= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day17_pcso= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day17_philhealth= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day17_porlata= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day17_repairs= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day17_representation= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day17_salaries= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day17_sss= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','SSS')->active()->sum('amount');
    $day17_supplies_station= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day17_supplies_main_office= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day17_taxes_bir= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day17_taxes_pcso= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day17_trans_vac= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day17_travelling= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day17_vehicle_rental= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day17_water_drinking= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day17_water_bill= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day17_national= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day17_local= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day17_management= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day17_ticket= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day17_others= Expenses::where('e_date',$mdate.'17')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day18_ffund= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day18_loan= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day18_brgy= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day18_cable= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day18_comida= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day18_donation= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day18_electricity= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day18_gasoline= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day18_house_rental= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day18_lpg= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','LPG')->active()->sum('amount');
    $day18_meals= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day18_medicine= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day18_miscellaneous= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day18_pagibig= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day18_pcso= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day18_philhealth= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day18_porlata= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day18_repairs= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day18_representation= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day18_salaries= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day18_sss= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','SSS')->active()->sum('amount');
    $day18_supplies_station= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day18_supplies_main_office= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day18_taxes_bir= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day18_taxes_pcso= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day18_trans_vac= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day18_travelling= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day18_vehicle_rental= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day18_water_drinking= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day18_water_bill= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day18_national= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day18_local= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day18_management= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day18_ticket= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day18_others= Expenses::where('e_date',$mdate.'18')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day19_ffund= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day19_loan= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day19_brgy= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day19_cable= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day19_comida= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day19_donation= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day19_electricity= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day19_gasoline= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day19_house_rental= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day19_lpg= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','LPG')->active()->sum('amount');
    $day19_meals= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day19_medicine= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day19_miscellaneous= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day19_pagibig= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day19_pcso= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day19_philhealth= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day19_porlata= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day19_repairs= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day19_representation= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day19_salaries= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day19_sss= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','SSS')->active()->sum('amount');
    $day19_supplies_station= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day19_supplies_main_office= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day19_taxes_bir= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day19_taxes_pcso= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day19_trans_vac= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day19_travelling= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day19_vehicle_rental= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day19_water_drinking= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day19_water_bill= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day19_national= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day19_local= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day19_management= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day19_ticket= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day19_others= Expenses::where('e_date',$mdate.'19')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day20_ffund= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day20_loan= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day20_brgy= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day20_cable= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day20_comida= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day20_donation= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day20_electricity= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day20_gasoline= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day20_house_rental= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day20_lpg= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','LPG')->active()->sum('amount');
    $day20_meals= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day20_medicine= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day20_miscellaneous= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day20_pagibig= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day20_pcso= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day20_philhealth= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day20_porlata= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day20_repairs= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day20_representation= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day20_salaries= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day20_sss= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','SSS')->active()->sum('amount');
    $day20_supplies_station= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day20_supplies_main_office= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day20_taxes_bir= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day20_taxes_pcso= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day20_trans_vac= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day20_travelling= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day20_vehicle_rental= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day20_water_drinking= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day20_water_bill= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day20_national= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day20_local= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day20_management= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day20_ticket= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day20_others= Expenses::where('e_date',$mdate.'20')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day21_ffund= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day21_loan= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day21_brgy= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day21_cable= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day21_comida= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day21_donation= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day21_electricity= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day21_gasoline= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day21_house_rental= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day21_lpg= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','LPG')->active()->sum('amount');
    $day21_meals= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day21_medicine= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day21_miscellaneous= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day21_pagibig= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day21_pcso= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day21_philhealth= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day21_porlata= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day21_repairs= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day21_representation= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day21_salaries= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day21_sss= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','SSS')->active()->sum('amount');
    $day21_supplies_station= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day21_supplies_main_office= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day21_taxes_bir= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day21_taxes_pcso= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day21_trans_vac= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day21_travelling= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day21_vehicle_rental= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day21_water_drinking= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day21_water_bill= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day21_national= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day21_local= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day21_management= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day21_ticket= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day21_others= Expenses::where('e_date',$mdate.'21')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day22_ffund= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day22_loan= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day22_brgy= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day22_cable= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day22_comida= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day22_donation= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day22_electricity= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day22_gasoline= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day22_house_rental= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day22_lpg= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','LPG')->active()->sum('amount');
    $day22_meals= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day22_medicine= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day22_miscellaneous= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day22_pagibig= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day22_pcso= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day22_philhealth= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day22_porlata= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day22_repairs= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day22_representation= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day22_salaries= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day22_sss= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','SSS')->active()->sum('amount');
    $day22_supplies_station= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day22_supplies_main_office= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day22_taxes_bir= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day22_taxes_pcso= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day22_trans_vac= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day22_travelling= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day22_vehicle_rental= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day22_water_drinking= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day22_water_bill= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day22_national= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day22_local= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day22_management= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day22_ticket= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day22_others= Expenses::where('e_date',$mdate.'22')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day23_ffund= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day23_loan= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day23_brgy= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day23_cable= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day23_comida= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day23_donation= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day23_electricity= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day23_gasoline= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day23_house_rental= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day23_lpg= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','LPG')->active()->sum('amount');
    $day23_meals= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day23_medicine= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day23_miscellaneous= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day23_pagibig= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day23_pcso= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day23_philhealth= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day23_porlata= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day23_repairs= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day23_representation= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day23_salaries= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day23_sss= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','SSS')->active()->sum('amount');
    $day23_supplies_station= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day23_supplies_main_office= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day23_taxes_bir= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day23_taxes_pcso= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day23_trans_vac= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day23_travelling= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day23_vehicle_rental= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day23_water_drinking= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day23_water_bill= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day23_national= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day23_local= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day23_management= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day23_ticket= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day23_others= Expenses::where('e_date',$mdate.'23')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day24_ffund= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day24_loan= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day24_brgy= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day24_cable= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day24_comida= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day24_donation= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day24_electricity= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day24_gasoline= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day24_house_rental= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day24_lpg= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','LPG')->active()->sum('amount');
    $day24_meals= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day24_medicine= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day24_miscellaneous= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day24_pagibig= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day24_pcso= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day24_philhealth= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day24_porlata= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day24_repairs= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day24_representation= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day24_salaries= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day24_sss= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','SSS')->active()->sum('amount');
    $day24_supplies_station= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day24_supplies_main_office= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day24_taxes_bir= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day24_taxes_pcso= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day24_trans_vac= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day24_travelling= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day24_vehicle_rental= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day24_water_drinking= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day24_water_bill= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day24_national= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day24_local= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day24_management= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day24_ticket= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day24_others= Expenses::where('e_date',$mdate.'24')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day25_ffund= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day25_loan= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day25_brgy= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day25_cable= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day25_comida= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day25_donation= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day25_electricity= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day25_gasoline= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day25_house_rental= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day25_lpg= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','LPG')->active()->sum('amount');
    $day25_meals= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day25_medicine= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day25_miscellaneous= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day25_pagibig= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day25_pcso= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day25_philhealth= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day25_porlata= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day25_repairs= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day25_representation= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day25_salaries= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day25_sss= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','SSS')->active()->sum('amount');
    $day25_supplies_station= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day25_supplies_main_office= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day25_taxes_bir= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day25_taxes_pcso= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day25_trans_vac= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day25_travelling= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day25_vehicle_rental= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day25_water_drinking= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day25_water_bill= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day25_national= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day25_local= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day25_management= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day25_ticket= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day25_others= Expenses::where('e_date',$mdate.'25')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day26_ffund= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day26_loan= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day26_brgy= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day26_cable= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day26_comida= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day26_donation= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day26_electricity= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day26_gasoline= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day26_house_rental= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day26_lpg= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','LPG')->active()->sum('amount');
    $day26_meals= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day26_medicine= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day26_miscellaneous= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day26_pagibig= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day26_pcso= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day26_philhealth= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day26_porlata= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day26_repairs= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day26_representation= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day26_salaries= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day26_sss= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','SSS')->active()->sum('amount');
    $day26_supplies_station= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day26_supplies_main_office= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day26_taxes_bir= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day26_taxes_pcso= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day26_trans_vac= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day26_travelling= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day26_vehicle_rental= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day26_water_drinking= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day26_water_bill= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day26_national= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day26_local= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day26_management= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day26_ticket= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day26_others= Expenses::where('e_date',$mdate.'26')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day27_ffund= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day27_loan= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day27_brgy= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day27_cable= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day27_comida= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day27_donation= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day27_electricity= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day27_gasoline= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day27_house_rental= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day27_lpg= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','LPG')->active()->sum('amount');
    $day27_meals= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day27_medicine= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day27_miscellaneous= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day27_pagibig= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day27_pcso= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day27_philhealth= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day27_porlata= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day27_repairs= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day27_representation= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day27_salaries= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day27_sss= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','SSS')->active()->sum('amount');
    $day27_supplies_station= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day27_supplies_main_office= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day27_taxes_bir= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day27_taxes_pcso= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day27_trans_vac= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day27_travelling= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day27_vehicle_rental= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day27_water_drinking= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day27_water_bill= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day27_national= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day27_local= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day27_management= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day27_ticket= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day27_others= Expenses::where('e_date',$mdate.'27')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day28_ffund= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day28_loan= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day28_brgy= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day28_cable= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day28_comida= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day28_donation= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day28_electricity= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day28_gasoline= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day28_house_rental= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day28_lpg= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','LPG')->active()->sum('amount');
    $day28_meals= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day28_medicine= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day28_miscellaneous= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day28_pagibig= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day28_pcso= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day28_philhealth= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day28_porlata= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day28_repairs= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day28_representation= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day28_salaries= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day28_sss= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','SSS')->active()->sum('amount');
    $day28_supplies_station= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day28_supplies_main_office= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day28_taxes_bir= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day28_taxes_pcso= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day28_trans_vac= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day28_travelling= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day28_vehicle_rental= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day28_water_drinking= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day28_water_bill= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day28_national= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day28_local= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day28_management= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day28_ticket= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day28_others= Expenses::where('e_date',$mdate.'28')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day29_ffund= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day29_loan= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day29_brgy= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day29_cable= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day29_comida= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day29_donation= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day29_electricity= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day29_gasoline= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day29_house_rental= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day29_lpg= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','LPG')->active()->sum('amount');
    $day29_meals= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day29_medicine= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day29_miscellaneous= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day29_pagibig= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day29_pcso= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day29_philhealth= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day29_porlata= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day29_repairs= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day29_representation= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day29_salaries= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day29_sss= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','SSS')->active()->sum('amount');
    $day29_supplies_station= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day29_supplies_main_office= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day29_taxes_bir= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day29_taxes_pcso= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day29_trans_vac= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day29_travelling= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day29_vehicle_rental= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day29_water_drinking= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day29_water_bill= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day29_national= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day29_local= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day29_management= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day29_ticket= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day29_others= Expenses::where('e_date',$mdate.'29')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day30_ffund= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day30_loan= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day30_brgy= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day30_cable= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day30_comida= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day30_donation= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day30_electricity= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day30_gasoline= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day30_house_rental= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day30_lpg= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','LPG')->active()->sum('amount');
    $day30_meals= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day30_medicine= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day30_miscellaneous= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day30_pagibig= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day30_pcso= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day30_philhealth= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day30_porlata= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day30_repairs= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day30_representation= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day30_salaries= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day30_sss= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','SSS')->active()->sum('amount');
    $day30_supplies_station= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day30_supplies_main_office= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day30_taxes_bir= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day30_taxes_pcso= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day30_trans_vac= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day30_travelling= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day30_vehicle_rental= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day30_water_drinking= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day30_water_bill= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day30_national= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day30_local= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day30_management= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day30_ticket= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day30_others= Expenses::where('e_date',$mdate.'30')->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day31_ffund= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');    
    $day31_loan= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','LOAN')->active()->sum('amount');
    $day31_brgy= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $day31_cable= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $day31_comida= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','COMIDA')->active()->sum('amount');
    $day31_donation= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $day31_electricity= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $day31_gasoline= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $day31_house_rental= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $day31_lpg= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','LPG')->active()->sum('amount');
    $day31_meals= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','MEALS')->active()->sum('amount');
    $day31_medicine= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $day31_miscellaneous= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $day31_pagibig= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $day31_pcso= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $day31_philhealth= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $day31_porlata= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','POR LATA')->active()->sum('amount');
    $day31_repairs= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $day31_representation= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $day31_salaries= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','SALARIES')->active()->sum('amount');
    $day31_sss= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','SSS')->active()->sum('amount');
    $day31_supplies_station= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $day31_supplies_main_office= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $day31_taxes_bir= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $day31_taxes_pcso= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $day31_trans_vac= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $day31_travelling= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $day31_vehicle_rental= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $day31_water_drinking= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $day31_water_bill= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $day31_national= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $day31_local= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','LOCAL')->active()->sum('amount');
    $day31_management= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $day31_ticket= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','TICKET')->active()->sum('amount');
    $day31_others= Expenses::where('e_date',$mdate.'31')->where('type_of_exp','OTHERS...')->active()->sum('amount');


    $total_brgy= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','BRGY./TIMBRE')->active()->sum('amount');
    $total_cable= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','CABLE/TELEPHONE')->active()->sum('amount');
    $total_comida= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','COMIDA')->active()->sum('amount');
    $total_donation= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','DONATIONS & SPONSORSHIP')->active()->sum('amount');
    $total_electricity= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','ELECTRICITY')->active()->sum('amount');
    $total_gasoline= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','GASOLINE')->active()->sum('amount');
    $total_house_rental= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','HOUSE RENTAL')->active()->sum('amount');
    $total_lpg= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','LPG')->active()->sum('amount');
    $total_meals= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','MEALS')->active()->sum('amount');
    $total_medicine= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','MEDICINE')->active()->sum('amount');
    $total_miscellaneous= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','MISCELLANEOUS')->active()->sum('amount');
    $total_pagibig= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','PAGIBIG')->active()->sum('amount');
    $total_pcso= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','PCSO DAILY REMITTANCE')->active()->sum('amount');
    $total_philhealth= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','PHILHEALTH')->active()->sum('amount');
    $total_porlata= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','POR LATA')->active()->sum('amount');
    $total_repairs= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','REPAIRS & MAINTENANCE')->active()->sum('amount');
    $total_representation= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','REPRESENTATION')->active()->sum('amount');
    $total_salaries= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','SALARIES')->active()->sum('amount');
    $total_sss= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','SSS')->active()->sum('amount');
    $total_supplies_station= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','SUPPLIES-STATION')->active()->sum('amount');
    $total_supplies_main_office= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','SUPPLIES-MAIN OFFICE')->active()->sum('amount');
    $total_taxes_bir= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','TAXES-BIR')->active()->sum('amount');
    $total_taxes_pcso= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','TAXES-PCSO')->active()->sum('amount');
    $total_trans_vac= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','TRANS/VACATION ALLOWANCE')->active()->sum('amount');
    $total_travelling= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','TRAVELLING')->active()->sum('amount');
    $total_vehicle_rental= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','VEHICLE RENTAL')->active()->sum('amount');
    $total_water_drinking= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','WATER-DRINKING')->active()->sum('amount');
    $total_water_bill= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','WATER BILL')->active()->sum('amount');
    $total_national= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','NATIONAL')->active()->sum('amount');
    $total_local= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','LOCAL')->active()->sum('amount');
    $total_management= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','MANAGEMENT')->active()->sum('amount');
    $total_ticket= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','TICKET')->active()->sum('amount');
    $total_loan= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','LOAN')->active()->sum('amount');
    $total_ffund= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','FLEXIBLE FUND')->active()->sum('amount');
    $total_others= Expenses::whereMonth('e_date','=',$month)->where('type_of_exp','OTHERS...')->active()->sum('amount');

    $day1_exp= Expenses::where('e_date',$mdate.'01')->active()->sum('amount');
    $day2_exp= Expenses::where('e_date',$mdate.'02')->active()->sum('amount');
    $day3_exp= Expenses::where('e_date',$mdate.'03')->active()->sum('amount');
    $day4_exp= Expenses::where('e_date',$mdate.'04')->active()->sum('amount');
    $day5_exp= Expenses::where('e_date',$mdate.'05')->active()->sum('amount');
    $day6_exp= Expenses::where('e_date',$mdate.'06')->active()->sum('amount');
    $day7_exp= Expenses::where('e_date',$mdate.'07')->active()->sum('amount');
    $day8_exp= Expenses::where('e_date',$mdate.'08')->active()->sum('amount');
    $day9_exp= Expenses::where('e_date',$mdate.'09')->active()->sum('amount');
    $day10_exp= Expenses::where('e_date',$mdate.'10')->active()->sum('amount');
    $day11_exp= Expenses::where('e_date',$mdate.'11')->active()->sum('amount');
    $day12_exp= Expenses::where('e_date',$mdate.'12')->active()->sum('amount');
    $day13_exp= Expenses::where('e_date',$mdate.'13')->active()->sum('amount');
    $day14_exp= Expenses::where('e_date',$mdate.'14')->active()->sum('amount');
    $day15_exp= Expenses::where('e_date',$mdate.'15')->active()->sum('amount');
    $day16_exp= Expenses::where('e_date',$mdate.'16')->active()->sum('amount');
    $day17_exp= Expenses::where('e_date',$mdate.'17')->active()->sum('amount');
    $day18_exp= Expenses::where('e_date',$mdate.'18')->active()->sum('amount');
    $day19_exp= Expenses::where('e_date',$mdate.'19')->active()->sum('amount');
    $day20_exp= Expenses::where('e_date',$mdate.'20')->active()->sum('amount');
    $day21_exp= Expenses::where('e_date',$mdate.'21')->active()->sum('amount');
    $day22_exp= Expenses::where('e_date',$mdate.'22')->active()->sum('amount');
    $day23_exp= Expenses::where('e_date',$mdate.'23')->active()->sum('amount');
    $day24_exp= Expenses::where('e_date',$mdate.'24')->active()->sum('amount');
    $day25_exp= Expenses::where('e_date',$mdate.'25')->active()->sum('amount');
    $day26_exp= Expenses::where('e_date',$mdate.'26')->active()->sum('amount');
    $day27_exp= Expenses::where('e_date',$mdate.'27')->active()->sum('amount');
    $day28_exp= Expenses::where('e_date',$mdate.'28')->active()->sum('amount');
    $day29_exp= Expenses::where('e_date',$mdate.'29')->active()->sum('amount');
    $day30_exp= Expenses::where('e_date',$mdate.'30')->active()->sum('amount');
    $day31_exp= Expenses::where('e_date',$mdate.'31')->active()->sum('amount');


    // $from='2020-01-01';
    // $to='2020-09-30';

    // if ($month='09') {
    //     $grand_total= Expenses::whereBetween('e_date', [$from, $to])->active()->sum('amount');
    //     $exp =  Expenses::whereBetween('e_date', [$from, $to])->where('status', '1')->sum('amount');
    // }else{
        $grand_total= Expenses::whereMonth('e_date','=',$month)->active()->sum('amount');
        $exp =  Expenses::whereMonth('e_date','=',$month)->where('status', '1')->sum('amount');
    // }

    // $day_exp= Expenses::whereBetween('e_date', [$from1, $to1])->active()->sum('amount');
    // $dcb_exp= Expenses::whereBetween('date_encoded', [$from1, $to1])->active()->sum('amount');



    $filename='MONTHLY-EXP-'.$month.'-'.$year.'.pdf';
    $name=Auth::user()->name;
   
    $mpdf=new \Mpdf\Mpdf([
        'margin_left'=>10,
        'margin_right'=>10,
        'margin_top'=>5,
        'margin_bottom'=>10,
        'margin_header'=>10,
        'margin_footer'=>10,
        'orientation' => 'L'
    ]);

    $html= \View::make('PDF.monthly-exp-sum-report',
        
    compact([
        'month','year','grand_total','exp',
        'day1_brgy','day1_cable','day1_comida','day1_donation','day1_electricity','day1_gasoline','day1_house_rental',
        'day1_lpg','day1_meals','day1_medicine','day1_miscellaneous','day1_pagibig','day1_pcso','day1_philhealth',
        'day1_porlata','day1_repairs','day1_representation','day1_salaries','day1_sss','day1_supplies_station',
        'day1_supplies_main_office','day1_taxes_bir','day1_taxes_pcso','day1_trans_vac','day1_travelling','day1_vehicle_rental',
        'day1_water_drinking','day1_water_bill','day1_national','day1_local','day1_management','day1_ticket','day1_others','day1_loan','day1_ffund',
        
        'day2_brgy','day2_cable','day2_comida','day2_donation','day2_electricity','day2_gasoline','day2_house_rental',
        'day2_lpg','day2_meals','day2_medicine','day2_miscellaneous','day2_pagibig','day2_pcso','day2_philhealth',
        'day2_porlata','day2_repairs','day2_representation','day2_salaries','day2_sss','day2_supplies_station',
        'day2_supplies_main_office','day2_taxes_bir','day2_taxes_pcso','day2_trans_vac','day2_travelling','day2_vehicle_rental',
        'day2_water_drinking','day2_water_bill','day2_national','day2_local','day2_management','day2_ticket','day2_others','day2_loan','day2_ffund',
        
        'day3_brgy','day3_cable','day3_comida','day3_donation','day3_electricity','day3_gasoline','day3_house_rental',
        'day3_lpg','day3_meals','day3_medicine','day3_miscellaneous','day3_pagibig','day3_pcso','day3_philhealth',
        'day3_porlata','day3_repairs','day3_representation','day3_salaries','day3_sss','day3_supplies_station',
        'day3_supplies_main_office','day3_taxes_bir','day3_taxes_pcso','day3_trans_vac','day3_travelling','day3_vehicle_rental',
        'day3_water_drinking','day3_water_bill','day3_national','day3_local','day3_management','day3_ticket','day3_others','day3_loan','day3_ffund',

        'day4_brgy','day4_cable','day4_comida','day4_donation','day4_electricity','day4_gasoline','day4_house_rental',
        'day4_lpg','day4_meals','day4_medicine','day4_miscellaneous','day4_pagibig','day4_pcso','day4_philhealth',
        'day4_porlata','day4_repairs','day4_representation','day4_salaries','day4_sss','day4_supplies_station',
        'day4_supplies_main_office','day4_taxes_bir','day4_taxes_pcso','day4_trans_vac','day4_travelling','day4_vehicle_rental',
        'day4_water_drinking','day4_water_bill','day4_national','day4_local','day4_management','day4_ticket','day4_others','day4_loan','day4_ffund',

        'day5_brgy','day5_cable','day5_comida','day5_donation','day5_electricity','day5_gasoline','day5_house_rental',
        'day5_lpg','day5_meals','day5_medicine','day5_miscellaneous','day5_pagibig','day5_pcso','day5_philhealth',
        'day5_porlata','day5_repairs','day5_representation','day5_salaries','day5_sss','day5_supplies_station',
        'day5_supplies_main_office','day5_taxes_bir','day5_taxes_pcso','day5_trans_vac','day5_travelling','day5_vehicle_rental',
        'day5_water_drinking','day5_water_bill','day5_national','day5_local','day5_management','day5_ticket','day5_others','day5_loan','day5_ffund',

        'day6_brgy','day6_cable','day6_comida','day6_donation','day6_electricity','day6_gasoline','day6_house_rental',
        'day6_lpg','day6_meals','day6_medicine','day6_miscellaneous','day6_pagibig','day6_pcso','day6_philhealth',
        'day6_porlata','day6_repairs','day6_representation','day6_salaries','day6_sss','day6_supplies_station',
        'day6_supplies_main_office','day6_taxes_bir','day6_taxes_pcso','day6_trans_vac','day6_travelling','day6_vehicle_rental',
        'day6_water_drinking','day6_water_bill','day6_national','day6_local','day6_management','day6_ticket','day6_others','day6_loan','day6_ffund',

        'day7_brgy','day7_cable','day7_comida','day7_donation','day7_electricity','day7_gasoline','day7_house_rental',
        'day7_lpg','day7_meals','day7_medicine','day7_miscellaneous','day7_pagibig','day7_pcso','day7_philhealth',
        'day7_porlata','day7_repairs','day7_representation','day7_salaries','day7_sss','day7_supplies_station',
        'day7_supplies_main_office','day7_taxes_bir','day7_taxes_pcso','day7_trans_vac','day7_travelling','day7_vehicle_rental',
        'day7_water_drinking','day7_water_bill','day7_national','day7_local','day7_management','day7_ticket','day7_others','day7_loan','day7_ffund',

        'day8_brgy','day8_cable','day8_comida','day8_donation','day8_electricity','day8_gasoline','day8_house_rental',
        'day8_lpg','day8_meals','day8_medicine','day8_miscellaneous','day8_pagibig','day8_pcso','day8_philhealth',
        'day8_porlata','day8_repairs','day8_representation','day8_salaries','day8_sss','day8_supplies_station',
        'day8_supplies_main_office','day8_taxes_bir','day8_taxes_pcso','day8_trans_vac','day8_travelling','day8_vehicle_rental',
        'day8_water_drinking','day8_water_bill','day8_national','day8_local','day8_management','day8_ticket','day8_others','day8_loan','day8_ffund',

        'day9_brgy','day9_cable','day9_comida','day9_donation','day9_electricity','day9_gasoline','day9_house_rental',
        'day9_lpg','day9_meals','day9_medicine','day9_miscellaneous','day9_pagibig','day9_pcso','day9_philhealth',
        'day9_porlata','day9_repairs','day9_representation','day9_salaries','day9_sss','day9_supplies_station',
        'day9_supplies_main_office','day9_taxes_bir','day9_taxes_pcso','day9_trans_vac','day9_travelling','day9_vehicle_rental',
        'day9_water_drinking','day9_water_bill','day9_national','day9_local','day9_management','day9_ticket','day9_others','day9_loan','day9_ffund',

        'day10_brgy','day10_cable','day10_comida','day10_donation','day10_electricity','day10_gasoline','day10_house_rental',
        'day10_lpg','day10_meals','day10_medicine','day10_miscellaneous','day10_pagibig','day10_pcso','day10_philhealth',
        'day10_porlata','day10_repairs','day10_representation','day10_salaries','day10_sss','day10_supplies_station',
        'day10_supplies_main_office','day10_taxes_bir','day10_taxes_pcso','day10_trans_vac','day10_travelling','day10_vehicle_rental',
        'day10_water_drinking','day10_water_bill','day10_national','day10_local','day10_management','day10_ticket','day10_others','day10_loan','day10_ffund',

        'day11_brgy','day11_cable','day11_comida','day11_donation','day11_electricity','day11_gasoline','day11_house_rental',
        'day11_lpg','day11_meals','day11_medicine','day11_miscellaneous','day11_pagibig','day11_pcso','day11_philhealth',
        'day11_porlata','day11_repairs','day11_representation','day11_salaries','day11_sss','day11_supplies_station',
        'day11_supplies_main_office','day11_taxes_bir','day11_taxes_pcso','day11_trans_vac','day11_travelling','day11_vehicle_rental',
        'day11_water_drinking','day11_water_bill','day11_national','day11_local','day11_management','day11_ticket','day11_others','day11_loan','day11_ffund',

        'day12_brgy','day12_cable','day12_comida','day12_donation','day12_electricity','day12_gasoline','day12_house_rental',
        'day12_lpg','day12_meals','day12_medicine','day12_miscellaneous','day12_pagibig','day12_pcso','day12_philhealth',
        'day12_porlata','day12_repairs','day12_representation','day12_salaries','day12_sss','day12_supplies_station',
        'day12_supplies_main_office','day12_taxes_bir','day12_taxes_pcso','day12_trans_vac','day12_travelling','day12_vehicle_rental',
        'day12_water_drinking','day12_water_bill','day12_national','day12_local','day12_management','day12_ticket','day12_others','day12_loan','day12_ffund',

        'day13_brgy','day13_cable','day13_comida','day13_donation','day13_electricity','day13_gasoline','day13_house_rental',
        'day13_lpg','day13_meals','day13_medicine','day13_miscellaneous','day13_pagibig','day13_pcso','day13_philhealth',
        'day13_porlata','day13_repairs','day13_representation','day13_salaries','day13_sss','day13_supplies_station',
        'day13_supplies_main_office','day13_taxes_bir','day13_taxes_pcso','day13_trans_vac','day13_travelling','day13_vehicle_rental',
        'day13_water_drinking','day13_water_bill','day13_national','day13_local','day13_management','day13_ticket','day13_others','day13_loan','day13_ffund',

        'day14_brgy','day14_cable','day14_comida','day14_donation','day14_electricity','day14_gasoline','day14_house_rental',
        'day14_lpg','day14_meals','day14_medicine','day14_miscellaneous','day14_pagibig','day14_pcso','day14_philhealth',
        'day14_porlata','day14_repairs','day14_representation','day14_salaries','day14_sss','day14_supplies_station',
        'day14_supplies_main_office','day14_taxes_bir','day14_taxes_pcso','day14_trans_vac','day14_travelling','day14_vehicle_rental',
        'day14_water_drinking','day14_water_bill','day14_national','day14_local','day14_management','day14_ticket','day14_others','day14_loan','day14_ffund',

        'day15_brgy','day15_cable','day15_comida','day15_donation','day15_electricity','day15_gasoline','day15_house_rental',
        'day15_lpg','day15_meals','day15_medicine','day15_miscellaneous','day15_pagibig','day15_pcso','day15_philhealth',
        'day15_porlata','day15_repairs','day15_representation','day15_salaries','day15_sss','day15_supplies_station',
        'day15_supplies_main_office','day15_taxes_bir','day15_taxes_pcso','day15_trans_vac','day15_travelling','day15_vehicle_rental',
        'day15_water_drinking','day15_water_bill','day15_national','day15_local','day15_management','day15_ticket','day15_others','day15_loan','day15_ffund',

        'day16_brgy','day16_cable','day16_comida','day16_donation','day16_electricity','day16_gasoline','day16_house_rental',
        'day16_lpg','day16_meals','day16_medicine','day16_miscellaneous','day16_pagibig','day16_pcso','day16_philhealth',
        'day16_porlata','day16_repairs','day16_representation','day16_salaries','day16_sss','day16_supplies_station',
        'day16_supplies_main_office','day16_taxes_bir','day16_taxes_pcso','day16_trans_vac','day16_travelling','day16_vehicle_rental',
        'day16_water_drinking','day16_water_bill','day16_national','day16_local','day16_management','day16_ticket','day16_others','day16_loan','day16_ffund',

        'day17_brgy','day17_cable','day17_comida','day17_donation','day17_electricity','day17_gasoline','day17_house_rental',
        'day17_lpg','day17_meals','day17_medicine','day17_miscellaneous','day17_pagibig','day17_pcso','day17_philhealth',
        'day17_porlata','day17_repairs','day17_representation','day17_salaries','day17_sss','day17_supplies_station',
        'day17_supplies_main_office','day17_taxes_bir','day17_taxes_pcso','day17_trans_vac','day17_travelling','day17_vehicle_rental',
        'day17_water_drinking','day17_water_bill','day17_national','day17_local','day17_management','day17_ticket','day17_others','day17_loan','day17_ffund',

        'day18_brgy','day18_cable','day18_comida','day18_donation','day18_electricity','day18_gasoline','day18_house_rental',
        'day18_lpg','day18_meals','day18_medicine','day18_miscellaneous','day18_pagibig','day18_pcso','day18_philhealth',
        'day18_porlata','day18_repairs','day18_representation','day18_salaries','day18_sss','day18_supplies_station',
        'day18_supplies_main_office','day18_taxes_bir','day18_taxes_pcso','day18_trans_vac','day18_travelling','day18_vehicle_rental',
        'day18_water_drinking','day18_water_bill','day18_national','day18_local','day18_management','day18_ticket','day18_others','day18_loan','day18_ffund',

        'day19_brgy','day19_cable','day19_comida','day19_donation','day19_electricity','day19_gasoline','day19_house_rental',
        'day19_lpg','day19_meals','day19_medicine','day19_miscellaneous','day19_pagibig','day19_pcso','day19_philhealth',
        'day19_porlata','day19_repairs','day19_representation','day19_salaries','day19_sss','day19_supplies_station',
        'day19_supplies_main_office','day19_taxes_bir','day19_taxes_pcso','day19_trans_vac','day19_travelling','day19_vehicle_rental',
        'day19_water_drinking','day19_water_bill','day19_national','day19_local','day19_management','day19_ticket','day19_others','day19_loan','day19_ffund',

        'day20_brgy','day20_cable','day20_comida','day20_donation','day20_electricity','day20_gasoline','day20_house_rental',
        'day20_lpg','day20_meals','day20_medicine','day20_miscellaneous','day20_pagibig','day20_pcso','day20_philhealth',
        'day20_porlata','day20_repairs','day20_representation','day20_salaries','day20_sss','day20_supplies_station',
        'day20_supplies_main_office','day20_taxes_bir','day20_taxes_pcso','day20_trans_vac','day20_travelling','day20_vehicle_rental',
        'day20_water_drinking','day20_water_bill','day20_national','day20_local','day20_management','day20_ticket','day20_others','day20_loan','day20_ffund',

        'day21_brgy','day21_cable','day21_comida','day21_donation','day21_electricity','day21_gasoline','day21_house_rental',
        'day21_lpg','day21_meals','day21_medicine','day21_miscellaneous','day21_pagibig','day21_pcso','day21_philhealth',
        'day21_porlata','day21_repairs','day21_representation','day21_salaries','day21_sss','day21_supplies_station',
        'day21_supplies_main_office','day21_taxes_bir','day21_taxes_pcso','day21_trans_vac','day21_travelling','day21_vehicle_rental',
        'day21_water_drinking','day21_water_bill','day21_national','day21_local','day21_management','day21_ticket','day21_others','day21_loan','day21_ffund',

        'day22_brgy','day22_cable','day22_comida','day22_donation','day22_electricity','day22_gasoline','day22_house_rental',
        'day22_lpg','day22_meals','day22_medicine','day22_miscellaneous','day22_pagibig','day22_pcso','day22_philhealth',
        'day22_porlata','day22_repairs','day22_representation','day22_salaries','day22_sss','day22_supplies_station',
        'day22_supplies_main_office','day22_taxes_bir','day22_taxes_pcso','day22_trans_vac','day22_travelling','day22_vehicle_rental',
        'day22_water_drinking','day22_water_bill','day22_national','day22_local','day22_management','day22_ticket','day22_others','day22_loan','day22_ffund',

        'day23_brgy','day23_cable','day23_comida','day23_donation','day23_electricity','day23_gasoline','day23_house_rental',
        'day23_lpg','day23_meals','day23_medicine','day23_miscellaneous','day23_pagibig','day23_pcso','day23_philhealth',
        'day23_porlata','day23_repairs','day23_representation','day23_salaries','day23_sss','day23_supplies_station',
        'day23_supplies_main_office','day23_taxes_bir','day23_taxes_pcso','day23_trans_vac','day23_travelling','day23_vehicle_rental',
        'day23_water_drinking','day23_water_bill','day23_national','day23_local','day23_management','day23_ticket','day23_others','day23_loan','day23_ffund',

        'day24_brgy','day24_cable','day24_comida','day24_donation','day24_electricity','day24_gasoline','day24_house_rental',
        'day24_lpg','day24_meals','day24_medicine','day24_miscellaneous','day24_pagibig','day24_pcso','day24_philhealth',
        'day24_porlata','day24_repairs','day24_representation','day24_salaries','day24_sss','day24_supplies_station',
        'day24_supplies_main_office','day24_taxes_bir','day24_taxes_pcso','day24_trans_vac','day24_travelling','day24_vehicle_rental',
        'day24_water_drinking','day24_water_bill','day24_national','day24_local','day24_management','day24_ticket','day24_others','day24_loan','day24_ffund',

        'day25_brgy','day25_cable','day25_comida','day25_donation','day25_electricity','day25_gasoline','day25_house_rental',
        'day25_lpg','day25_meals','day25_medicine','day25_miscellaneous','day25_pagibig','day25_pcso','day25_philhealth',
        'day25_porlata','day25_repairs','day25_representation','day25_salaries','day25_sss','day25_supplies_station',
        'day25_supplies_main_office','day25_taxes_bir','day25_taxes_pcso','day25_trans_vac','day25_travelling','day25_vehicle_rental',
        'day25_water_drinking','day25_water_bill','day25_national','day25_local','day25_management','day25_ticket','day25_others','day25_loan','day25_ffund',

        'day26_brgy','day26_cable','day26_comida','day26_donation','day26_electricity','day26_gasoline','day26_house_rental',
        'day26_lpg','day26_meals','day26_medicine','day26_miscellaneous','day26_pagibig','day26_pcso','day26_philhealth',
        'day26_porlata','day26_repairs','day26_representation','day26_salaries','day26_sss','day26_supplies_station',
        'day26_supplies_main_office','day26_taxes_bir','day26_taxes_pcso','day26_trans_vac','day26_travelling','day26_vehicle_rental',
        'day26_water_drinking','day26_water_bill','day26_national','day26_local','day26_management','day26_ticket','day26_others','day26_loan','day26_ffund',

        'day27_brgy','day27_cable','day27_comida','day27_donation','day27_electricity','day27_gasoline','day27_house_rental',
        'day27_lpg','day27_meals','day27_medicine','day27_miscellaneous','day27_pagibig','day27_pcso','day27_philhealth',
        'day27_porlata','day27_repairs','day27_representation','day27_salaries','day27_sss','day27_supplies_station',
        'day27_supplies_main_office','day27_taxes_bir','day27_taxes_pcso','day27_trans_vac','day27_travelling','day27_vehicle_rental',
        'day27_water_drinking','day27_water_bill','day27_national','day27_local','day27_management','day27_ticket','day27_others','day27_loan','day27_ffund',

        'day28_brgy','day28_cable','day28_comida','day28_donation','day28_electricity','day28_gasoline','day28_house_rental',
        'day28_lpg','day28_meals','day28_medicine','day28_miscellaneous','day28_pagibig','day28_pcso','day28_philhealth',
        'day28_porlata','day28_repairs','day28_representation','day28_salaries','day28_sss','day28_supplies_station',
        'day28_supplies_main_office','day28_taxes_bir','day28_taxes_pcso','day28_trans_vac','day28_travelling','day28_vehicle_rental',
        'day28_water_drinking','day28_water_bill','day28_national','day28_local','day28_management','day28_ticket','day28_others','day28_loan','day28_ffund',

        'day29_brgy','day29_cable','day29_comida','day29_donation','day29_electricity','day29_gasoline','day29_house_rental',
        'day29_lpg','day29_meals','day29_medicine','day29_miscellaneous','day29_pagibig','day29_pcso','day29_philhealth',
        'day29_porlata','day29_repairs','day29_representation','day29_salaries','day29_sss','day29_supplies_station',
        'day29_supplies_main_office','day29_taxes_bir','day29_taxes_pcso','day29_trans_vac','day29_travelling','day29_vehicle_rental',
        'day29_water_drinking','day29_water_bill','day29_national','day29_local','day29_management','day29_ticket','day29_others','day29_loan','day29_ffund',

        'day30_brgy','day30_cable','day30_comida','day30_donation','day30_electricity','day30_gasoline','day30_house_rental',
        'day30_lpg','day30_meals','day30_medicine','day30_miscellaneous','day30_pagibig','day30_pcso','day30_philhealth',
        'day30_porlata','day30_repairs','day30_representation','day30_salaries','day30_sss','day30_supplies_station',
        'day30_supplies_main_office','day30_taxes_bir','day30_taxes_pcso','day30_trans_vac','day30_travelling','day30_vehicle_rental',
        'day30_water_drinking','day30_water_bill','day30_national','day30_local','day30_management','day30_ticket','day30_others','day30_loan','day30_ffund',

        'day31_brgy','day31_cable','day31_comida','day31_donation','day31_electricity','day31_gasoline','day31_house_rental',
        'day31_lpg','day31_meals','day31_medicine','day31_miscellaneous','day31_pagibig','day31_pcso','day31_philhealth',
        'day31_porlata','day31_repairs','day31_representation','day31_salaries','day31_sss','day31_supplies_station',
        'day31_supplies_main_office','day31_taxes_bir','day31_taxes_pcso','day31_trans_vac','day31_travelling','day31_vehicle_rental',
        'day31_water_drinking','day31_water_bill','day31_national','day31_local','day31_management','day31_ticket','day31_others','day31_loan','day31_ffund',

        'total_brgy','total_cable','total_comida','total_donation','total_electricity','total_gasoline','total_house_rental',
        'total_lpg','total_meals','total_medicine','total_miscellaneous','total_pagibig','total_pcso','total_philhealth',
        'total_porlata','total_repairs','total_representation','total_salaries','total_sss','total_supplies_station',
        'total_supplies_main_office','total_taxes_bir','total_taxes_pcso','total_trans_vac','total_travelling','total_vehicle_rental',
        'total_water_drinking','total_water_bill','total_national','total_local','total_management','total_ticket','total_others','total_loan','total_ffund',
        
        'day1_exp',
        'day2_exp',
        'day3_exp',
        'day4_exp',
        'day5_exp',
        'day6_exp',
        'day7_exp',
        'day8_exp',
        'day9_exp',
        'day10_exp',
        'day11_exp',
        'day12_exp',
        'day13_exp',
        'day14_exp',
        'day15_exp',
        'day16_exp',
        'day17_exp',
        'day18_exp',
        'day19_exp',
        'day20_exp',
        'day21_exp',
        'day22_exp',
        'day23_exp',
        'day24_exp',
        'day25_exp',
        'day26_exp',
        'day27_exp',
        'day28_exp',
        'day29_exp',
        'day30_exp',
        'day31_exp'
    ]));
    $html=$html->render();
    $mpdf->SetHeader('MONTHLY EXPENSES SUMMARY REPORT');
    // $mpdf->SetFooter('KINGS');
    $stylesheet=file_get_contents(url('/css/monthly-exp-sum-report.css'));
    $mpdf->WriteHTML($stylesheet,1);
    $mpdf->WriteHTML($html);
    $mpdf->Output($filename,'I');

}

    
    
}
