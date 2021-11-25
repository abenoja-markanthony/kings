<?php
namespace App\Http\Middleware;
use App\DailySale;
use Closure;

class AddSalesDate
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
            return redirect()->back()->with('message', 'Please enter the date of sale.')->withInput();
        }


        $sales =  DailySale::
        where('status', '1')
        ->where('date_of_sale', request('date_of_sale'))
        ->first();

        if ($sales) { 
            return redirect()->back()->with('error', 'The date you entered already exists.')->withInput();
        }else{
            return $next($request);
        }

    }
}
