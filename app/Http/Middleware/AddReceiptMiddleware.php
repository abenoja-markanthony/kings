<?php

namespace App\Http\Middleware;
use App\Receipt;
use Redirect;
use withErrors;
use Closure;

class AddReceiptMiddleware
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

        $rct =  Receipt::
        where('status', '1')
        ->where('station', request('station'))
        ->where('r_date', request('r_date'))
        ->first();

        if ($rct) { 
            // return $this->withErrors( 'The date that you entered for this station has already on the database.');
            return redirect()->back()->withErrors([ 'The date that you entered for this station has already on the database.'])->withInput();
        }


        if(request('draw1_in')!="" AND request('draw1_out')==""){
            return redirect()->back()->withErrors([ 'Draw 1 table out is empty.'])->withInput();
        }

        if(request('draw1_out')!="" AND request('draw1_in')==""){
            return redirect()->back()->withErrors([ 'Draw 1 sales is empty.'])->withInput();
        }

        if(request('draw2_in')!="" AND request('draw2_out')==""){
            return redirect()->back()->withErrors([ 'Draw 2 table out is empty.'])->withInput();
        }

        if(request('draw2_out')!="" AND request('draw2_in')==""){
            return redirect()->back()->withErrors([ 'Draw 2 sales is empty.'])->withInput();
        }

        if(request('draw3_in')!="" AND request('draw3_out')==""){
            return redirect()->back()->withErrors([ 'Draw 3 table out is empty.'])->withInput();
        }

        if(request('draw3_out')!="" AND request('draw3_in')==""){
            return redirect()->back()->withErrors([ 'Draw 3 sales is empty.'])->withInput();
        }

        return $next($request);
    }
}
