
<h4 style="magin-top:-10px">{{ $date_of_sale }}</h4>
<table class="pc" id="top">
    <thead>
        <tr  id="head">
            <th colspan="1"></th>
            <th colspan="2">AM</th>
            <th colspan="2"></th> 
        </tr>
        <tr  id="head">
            <th style="text-align: center">STATION</th>
            <th>IN</th>
            <th>OUT</th>
            <th>WIN</th>
            <th>LOSS</th>
        </tr>
    </thead>
    <tbody>
    @if (count($sales)<1)
            <tr>
                <td colspan="6">No record found.</td>
            </tr>
    @endif

    @php
        $tot_win_AM=0;
        $tot_loss_AM=0
    @endphp
    @foreach ($sales as $sale)
        @php
            $total=a($sale->AM_in)-a($sale->AM_out);
        @endphp
        <tr>
            <td  style="text-align: center">{{ $sale->station }}</td>
            <td class="t-right">{{ c($sale->AM_in) }}</td>
            <td class="t-right">{{ c($sale->AM_out) }}</td>
           @if ($total<0)
            <td class="t-right">&nbsp;</td>
            <td class="t-right text-danger">{{ c($total) }}</td>
             @php   $tot_loss_AM+=a($total); @endphp

           @else
            <td class="t-right text-success">{{ c($total) }}</td>
            <td class="t-right">&nbsp;</td>
             @php   $tot_win_AM+=a($total); @endphp
             @endif
        </tr>
    @endforeach
        <tr>
            <td >GRAND TOTAL</td>
            <td class="t-right">{{ c($tot_in_AM) }}</td>
            <td class="t-right">{{ c($tot_out_AM) }}</td>
            <td class="bg-warning t-right">{{ c($tot_win_AM) }}</td>
            <td class="bg-warning t-right">{{ c($tot_loss_AM) }}</td>
        </tr>
    </tbody>
</table>





{{-- PM --}}
<table  class="pc"  style="margin-top: 50px">
    <thead >
        <tr  id="head">
            <th colspan="1"></th>
            <th colspan="2">PM</th>
            <th colspan="2"></th> 
        </tr>
        <tr  id="head">
            <th>STATION</th>
            <th>IN</th>
            <th>OUT</th>
            <th>WIN</th>
            <th>LOSS</th>
        </tr>
    </thead>
    <tbody>
    @if (count($sales)<1)
            <tr>
                <td colspan="6">No record found.</td>
            </tr>
    @endif

    @php
        $tot_win_PM=0;
        $tot_loss_PM=0
    @endphp
    @foreach ($sales as $sale)
        @php
            $total=a($sale->PM_in)-a($sale->PM_out);
        @endphp
        <tr>
            <td  style="text-align: center">{{ $sale->station }}</td>
            <td class="t-right">{{ c($sale->PM_in) }}</td>
            <td class="t-right">{{ c($sale->PM_out) }}</td>
           @if ($total<0)
            <td class="t-right">&nbsp;</td>
            <td class="t-right text-danger">{{ c($total) }}</td>
             @php   $tot_loss_PM+=a($total); @endphp

           @else
            <td class="t-right text-success">{{ c($total) }}</td>
            <td class="t-right">&nbsp;</td>
             @php   $tot_win_PM+=a($total); @endphp
             @endif
        </tr>
    @endforeach
        <tr>
            <td >GRAND TOTAL</td>
            <td class="t-right">{{ c($tot_in_PM) }}</td>
            <td class="t-right">{{ c($tot_out_PM) }}</td>
            <td class="bg-warning t-right">{{ c($tot_win_PM) }}</td>
            <td class="bg-warning t-right">{{ c($tot_loss_PM) }}</td>
        </tr>
    </tbody>
</table>



{{-- EXTRA --}}

<table class="pc" style="margin-top: 50px">
    <thead>
        <tr  id="head">
            <th colspan="1"></th>
            <th colspan="2">EXTRA</th>
            <th colspan="2"></th> 
        </tr>
        <tr  id="head">
            <th>STATION</th>
            <th>IN</th>
            <th>OUT</th>
            <th>WIN</th>
            <th>LOSS</th>
        </tr>
    </thead>
    <tbody>
    @if (count($sales)<1)
            <tr>
                <td colspan="6">No record found.</td>
            </tr>
    @endif

    @php
        $tot_win_EXTRA=0;
        $tot_loss_EXTRA=0
    @endphp
    @foreach ($sales as $sale)
    @php
        $total=a($sale->EXTRA_in)-a($sale->EXTRA_out);
    @endphp

        <tr>
            <td  style="text-align: center">{{ $sale->station }}</td>
            <td class="t-right">{{ c($sale->EXTRA_in) }}</td>
            <td class="t-right">{{ c($sale->EXTRA_out) }}</td>
           @if ($total<0)
            <td class="t-right">&nbsp;</td>
            <td class="t-right text-danger">{{ c($total) }}</td>
             @php   $tot_loss_EXTRA+=a($total); @endphp

           @else
            <td class="t-right text-success">{{ c($total) }}</td>
            <td class="t-right">&nbsp;</td>
             @php   $tot_win_EXTRA+=a($total); @endphp
             @endif
        </tr>
    @endforeach
        <tr>
            <td >GRAND TOTAL</td>
            <td class="t-right">{{ c($tot_in_EXTRA) }}</td>
            <td class="t-right">{{ c($tot_out_EXTRA) }}</td>
            <td class="bg-warning t-right">{{ c($tot_win_EXTRA) }}</td>
            <td class="bg-warning t-right">{{ c($tot_loss_EXTRA) }}</td>
        </tr>
    </tbody>
</table>



{{-- summary --}}

<table class="pc" style="margin-top: 50px">
    <thead>
        <tr  id="head">
            <th colspan="1"></th>
            <th colspan="2">SUMMARY</th>
            <th colspan="2"></th> 
        </tr>
        <tr  id="head">
            <th>STATION</th>
            <th>IN</th>
            <th>OUT</th>
            <th>WIN</th>
            <th>LOSS</th>
        </tr>
    </thead>
    <tbody>
    @if (count($sales)<1)
            <tr>
                <td colspan="6">No record found.</td>
            </tr>
    @endif

    @php
        $tot_win_summary=0;
        $tot_loss_summary=0;
        $tot_in_sum=0;
        $tot_out_sum=0;
    @endphp
    @foreach ($sales as $sale)
    @php
    $tot_sale=a($sale->EXTRA_in)+a($sale->AM_in)+a($sale->PM_in);
    $tot_out=a($sale->EXTRA_out)+a($sale->AM_out)+a($sale->PM_out);
    $total=a($tot_sale)-a($tot_out);
    $tot_in_sum+=$tot_sale;
    $tot_out_sum+=$tot_out;
    @endphp
        <tr>
            <td>{{ $sale->station }}</td>
            <td class="t-right">{{ c(a($sale->EXTRA_in)+a($sale->AM_in)+a($sale->PM_in)) }}</td>
            <td class="t-right">{{ c(a($sale->EXTRA_out)+a($sale->AM_out)+a($sale->PM_out)) }}</td>
           @if ($total<0)
            <td class="t-right">&nbsp;</td>
            <td class="t-right text-danger">{{ c($total) }}</td>
             @php   $tot_loss_summary+=a($total); @endphp

           @else
            <td class="t-right text-success">{{ c($total) }}</td>
            <td class="t-right">&nbsp;</td>
             @php   $tot_win_summary+=a($total); @endphp
             @endif
        </tr>

       
    @endforeach
        <tr>
            <td >GRAND TOTAL</td>
            <td class="t-right">{{ c($tot_in_sum) }}</td>
            <td class="t-right">{{  c($tot_out_sum) }}</td>
            <td class="bg-warning t-right">{{ c($tot_win_summary) }}</td>
            <td class="bg-warning t-right">{{ c($tot_loss_summary) }}</td>
        </tr>
    </tbody>
</table>


<h1>&nbsp;</h1>



<table class="pc" style="margin-top: 50px;width:50%">
    <thead>
        <tr id="head">
            <th colspan="4">SUMMARY OF RESULTS</th>
        </tr>
        <tr  id="head">
            <th></th>
            <th>IN</th>
            <th>OUT</th>
            <th>NET</th>
        </tr>
    </thead> 

    <tbody>
        <tr>
            <td>AM</td>
            <td>{{ number_format($tot_in_AM,2) }}</td>
            <td>{{ number_format($tot_out_AM,2) }}</td>
            <td>{{ number_format(a($tot_in_AM)-a($tot_out_AM),2) }}</td>
        </tr>
        <tr>
            <td>PM</td>
            <td>{{ number_format($tot_in_PM,2) }}</td>
            <td>{{ number_format($tot_out_PM,2) }}</td>
            <td>{{ number_format(a($tot_in_PM)-a($tot_out_PM),2) }}</td>
        </tr>
        <tr>
            <td>EXTRA</td>
            <td>{{ number_format($tot_in_EXTRA,2) }}</td>
            <td>{{ number_format($tot_out_EXTRA,2) }}</td>
            <td>{{ number_format(a($tot_in_EXTRA)-a($tot_out_EXTRA),2) }}</td>
        </tr>
        <tr class="bg-warning">
            <td>TOTAL</td>
            <td>{{ c($tot_in_sum) }}</td>
            <td>{{ c($tot_out_sum) }}</td>
            <td></td>
        </tr>

        @php
            $stat= $tot_win_summary+$tot_loss_summary;
        @endphp

        @if ($stat<0)
            <tr>
                <td colspan="3" >LOSS</td>
                <td colspan="3" >{{ c($stat) }}</td>
            </tr>
        @else
            <tr>
                <td colspan="3" >WIN</td>
                <td colspan="3" >{{ c($stat) }}</td>
            </tr>
        @endif
    </tbody>

</table>


<table class="pc" style="margin-top: 50px;width:50%">
    <thead>
        <tr id="head">
            <th colspan="2">LIQUIDATION</th>
        </tr>
       
    </thead>

    <tbody>
        <tr>
            <td>{{ $first_date }}</td>
            <td>{{ $first_net }}</td>
        </tr>
        <tr>
            <td>{{ $second_date }}</td>
            <td>{{ $second_net }}</td>
        </tr>
        <tr>
            <td>{{ $date_of_sale }}</td>
            <td>{{ number_format(a($tot_in_EXTRA)-a($tot_out_EXTRA)+a($tot_in_AM)-a($tot_out_AM)+a($tot_in_PM)-a($tot_out_PM),2) }}</td>
        </tr>
    </tbody>

</table>

@php
    function c($x){
        if ($x!='') {
           $x=number_format($x,2);
            return $x;
        }else{
            return $x;
        }
    }
    function a($x){
        if ($x!='') {
            return $x;
        }else{
            $x=0;
            return $x;
        }
    }

@endphp