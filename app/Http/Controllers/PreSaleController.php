<?php
namespace App\Http\Controllers;

use App\DailySale;
use App\PreSale;
use Illuminate\Http\Request;
use App\Expenses;
use App\DailyCollectionSummary;
use Auth;
use DB;

class PreSaleController extends Controller
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
    public function index()
    {
        //
    }

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
        //
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
        return view('presale.edit-presale',compact(
            'sales','date_of_sale','tot_in','tot_out','net_sales',
            'tot_in_AM',
            'tot_in_PM',
            'tot_in_EXTRA',
            'tot_out_AM',
            'tot_out_PM',
            'tot_out_EXTRA'
        
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

        DB::table('daily_col_sum')
        ->where("daily_col_sum.date_of_sale", '=',  request('date_of_sale'))
        ->update([
            'daily_col_sum.tot_in'=> $total_in,
            'daily_col_sum.tot_out'=>  $total_out,
            'daily_col_sum.net_sales'=> $net,
            'daily_col_sum.status'=> 1,
            'daily_col_sum.user_id'=> Auth::id(),
            'daily_col_sum.username'=> Auth::user()->name,
            ]);
        
        

        return redirect(url('daily-pre-sales/'.request('date_of_sale').'/edit'))->with('success', 'Record has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function report($date_of_sale)
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

        $get_id = DailyCollectionSummary:: where('date_of_sale',$date_of_sale)->where('status','1')->first();
        $id=$get_id->id;
        $id1=$id-1;
        $id2=$id-2;

        $first_liq = DailyCollectionSummary:: where('id',$id2)->where('status','1')->first();
        $second_liq = DailyCollectionSummary:: where('id',$id1)->where('status','1')->first();

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


        
        $sales =  PreSale::where('status', '1')
        ->where('date_of_sale',request('date_of_sale'))->get();
        return view('presale.report-presale',compact(
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


        ));
    }
}
