<?php

namespace App\Http\Middleware;
use App\Expenses;
use Redirect;
use withErrors;
use Closure;
use App\DailySale;

class AddExpenseMiddleware
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

        $date=date('Y-m-d');
        $sale =  DailySale::where('date_encoded', $date)->where('status','1')->where('accepted','1')->first();
        // dd($sale);
        if($sale){
            return redirect()->back()->with('error', 'You cannot add expenses for this day because it is already accepted. Please encoded it tomorrow.')->withInput();
        }else{
            return $next($request);
        }


    }
}
