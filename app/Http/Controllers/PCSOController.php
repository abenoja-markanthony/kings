<?php
 
namespace App\Http\Controllers;

use App\DailySale;
use App\PreSale;
use App\Sale;
use App\PreSaleAdmin;
use App\SalesAssump;
use Illuminate\Http\Request;
use App\Expenses;
use DB;
use Auth;
use Redirect;
use App\AdditionalExpRec;
use App\DailyCollectionSummary;

class PCSOController extends Controller
{
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
        
        $sales =  PreSale::where('status', '1') ->select('date_of_sale')->distinct()
        ->whereYear('date_of_sale', '=', $year)
        ->whereMonth('date_of_sale', '=', $month)->orderBy('date_of_sale','desc')->latest()->get();
       
        return view('pcso.pre-sale',compact('sales','month','month_name','year'));
       
    }


    public function assump_store(Request $request)
    {


        for ($i = 0; $i < count($request->input('station')); $i++) {

            $check_id=SalesAssump::where('p_date',request('p_date'))->where('station',$request->input('station')[$i])->first();
            
            if(!$check_id){

                $sales=new SalesAssump();
                $sales->p_date=request('p_date');
                $sales->station=$request->input('station')[$i];
                $sales->AM_in=preg_replace("/[^0-9.]/", "",$request->input('am_in')[$i]);
                $sales->AM_out=preg_replace("/[^0-9.]/", "",$request->input('am_out')[$i]);
                $sales->PM_in=preg_replace("/[^0-9.]/", "",$request->input('pm_in')[$i]);
                $sales->PM_out=preg_replace("/[^0-9.]/", "",$request->input('pm_out')[$i]);
                $sales->EXTRA_in=preg_replace("/[^0-9.]/", "",$request->input('extra_in')[$i]);
                $sales->EXTRA_out=preg_replace("/[^0-9.]/", "",$request->input('extra_out')[$i]);
                $sales->user_id=Auth::id();
                $sales->username=Auth::user()->name;
                $sales->save();

            }else{

                $sales=SalesAssump::find($check_id->id);
                $sales->AM_in=preg_replace("/[^0-9.]/", "",$request->input('am_in')[$i]);
                $sales->AM_out=preg_replace("/[^0-9.]/", "",$request->input('am_out')[$i]);
                $sales->PM_in=preg_replace("/[^0-9.]/", "",$request->input('pm_in')[$i]);
                $sales->PM_out=preg_replace("/[^0-9.]/", "",$request->input('pm_out')[$i]);
                $sales->EXTRA_in=preg_replace("/[^0-9.]/", "",$request->input('extra_in')[$i]);
                $sales->EXTRA_out=preg_replace("/[^0-9.]/", "",$request->input('extra_out')[$i]);
                $sales->user_id=Auth::id();
                $sales->username=Auth::user()->name;
                $sales->save();
            }



        }
        return Redirect::back()->with('success', 'Success!');
        
    }




    public function store(Request $request)
    {
        $station=array(
           'AMBAGUIO 1',
           'AMBAGUIO 2',
           'ARITAO',
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
          
            $sales1=new PreSaleAdmin();
            $sales1->station=$station[$i];
            $sales1->date_of_sale=request('date_of_sale');
            $sales1->user_id=Auth::id();
            $sales1->username=Auth::user()->name;
            $sales1->save();

        }

        return Redirect::back()->with('success', 'Date of sale has been added.');   

      
    }

    public function edit($date_of_sale) 
    {
        $net_sales = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('net_sales');
        $tot_in = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('tot_in');
        $tot_out = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('tot_out');

        $net_sales = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('net_sales');
        $tot_in = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('tot_in');
        $tot_out = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('tot_out');

        $tot_in_AM = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('AM_in');
        $tot_out_AM = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('AM_out');

        $tot_in_PM = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('PM_in');
        $tot_out_PM = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('PM_out');

        $tot_in_EXTRA = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('EXTRA_in');
        $tot_out_EXTRA = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('EXTRA_out');

        
        $sales =  PreSale::where('status', '1')
        ->where('date_of_sale',request('date_of_sale'))->get();
        return view('pcso.edit-sales',compact(
            'sales','date_of_sale','tot_in','tot_out','net_sales',
            'tot_in_AM',
            'tot_in_PM',
            'tot_in_EXTRA',
            'tot_out_AM',
            'tot_out_PM',
            'tot_out_EXTRA'
        ));
    }

    public function pcso($date_of_sale) 
    {
        $sale_assump=SalesAssump::where('p_date',$date_of_sale)->get();


        $net_sales = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('net_sales');
        $tot_in = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('tot_in');
        $tot_out = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('tot_out');

        $net_sales = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('net_sales');
        $tot_in = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('tot_in');
        $tot_out = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('tot_out');

        $tot_in_AM = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('AM_in');
        $tot_out_AM = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('AM_out');

        $tot_in_PM = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('PM_in');
        $tot_out_PM = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('PM_out');

        $tot_in_EXTRA = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('EXTRA_in');
        $tot_out_EXTRA = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('EXTRA_out');

        
        $sales =  PreSale::where('status', '1')
        ->where('date_of_sale',request('date_of_sale'))->get();
        return view('pcso.edit-pcso',compact(
            'sale_assump',
            'sales','date_of_sale','tot_in','tot_out','net_sales',
            'tot_in_AM',
            'tot_in_PM',
            'tot_in_EXTRA',
            'tot_out_AM',
            'tot_out_PM',
            'tot_out_EXTRA'
        ));
    }

    public function assumption(Request $request) 
    {
        
        $date_of_sale=request('date_of_sale');
        $sale_assump=SalesAssump::where('p_date',$date_of_sale)->get();
        $assumption=request('assumption');
        $net_sales = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('net_sales');
        $tot_in = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('tot_in');
        $tot_out = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('tot_out');

        $net_sales = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('net_sales');
        $tot_in = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('tot_in');
        $tot_out = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('tot_out');

        $tot_in_AM = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('AM_in');
        $tot_out_AM = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('AM_out');

        $tot_in_PM = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('PM_in');
        $tot_out_PM = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('PM_out');

        $tot_in_EXTRA = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('EXTRA_in');
        $tot_out_EXTRA = PreSale:: where('date_of_sale',$date_of_sale)->where('status','1')->sum('EXTRA_out');

        
        $sales =  PreSale::where('status', '1')
        ->where('date_of_sale',request('date_of_sale'))->get();
        return view('pcso.edit-pcso',compact(
            'sale_assump',
            'sales','date_of_sale','tot_in','tot_out','net_sales',
            'tot_in_AM',
            'tot_in_PM',
            'tot_in_EXTRA',
            'tot_out_AM',
            'tot_out_PM',
            'tot_out_EXTRA',
            'assumption'
        ));
    }

    public function update(Request $request, $id)
    {
        $sale=PreSale::find($id);

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

        $total_in= PreSale:: where('date_of_sale',request('date_of_sale'))->where('status','1')->sum('tot_in');
        $total_out= PreSale:: where('date_of_sale',request('date_of_sale'))->where('status','1')->sum('tot_out');
        $net=$total_in-$total_out;

        return Redirect::back()->with('success', 'Record has been updated successfully.');   
    }
}
