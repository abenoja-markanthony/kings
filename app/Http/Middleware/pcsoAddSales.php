<?php
namespace App\Http\Middleware;
use App\DailySale;
use Closure;
use App\PreSaleAdmin;
use Redirect;

class pcsoAddSales
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(request('date_of_sale')==""){
            return Redirect::back()->with('success', 'Date is empty.');   
        }


        $sales =  PreSaleAdmin::
        where('status', '1')
        ->where('date_of_sale', request('date_of_sale'))
        ->first();

        if ($sales) { 
            return Redirect::back()->with('success', 'The date you entered already exists.');   
    }else{
            return $next($request);
        }

    }
}
