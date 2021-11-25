<?php

namespace App\Http\Middleware;
use App\PreSale;
use App\DailySale;
use Closure;

class CheckSalesInput
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
        $pre= PreSale:: where('date_of_sale',request('date_of_sale'))->where('station',request('station'))->where('status','1')->first();
        return redirect()->back()->with('error', 'The date you entered already exists.')->withInput();

        
        return $next($request);
    }
}
