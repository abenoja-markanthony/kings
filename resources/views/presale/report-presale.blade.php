@extends('layouts.app')

@section('content')
@section('page-css')
    <link href="{{ asset('css/edit-sales.css') }}" rel="stylesheet">
@endsection




<div class="container mt-4 wrap ">
    <div class="row justify-content-center">
        <div class="col-md-8" >
            @if(Session::has('success'))
                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
            @endif

            @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
            @endif
            <div class="card p-4"  style="background-color: #b3b4b5">

                <div class="card-header">
                    {{-- <div class="row">
                        <div class="col-lg-10 "><h3>PRE-SALE REPORT</h3> <h3>{{ date('M. d, Y', strtotime($date_of_sale)) }}</h3></div>
                        <div class="col-lg-2 "><a href="/daily-sales" class="btn btn-primary">BACK</a></div>
                       <input type="hidden" id="date_of_sale" value="{{ date('M. d, Y', strtotime($date_of_sale)) }}">
                    </div> --}}
                    <div class="row">
                        <div class="col-lg-6 "><h3>PRE-COLLECTION REPORT</h3> <p class="text-primary"></div>
                        <div class="col-lg-6 text-right">
                            <h3> {{ date('M. d, Y', strtotime($date_of_sale)) }}</h3> 
                            <form action="{{ route('PDF-pre-collect-report') }}" method="GET">
                                    <input type="hidden" name="date_of_sale" value="{{ $date_of_sale }}">
                                    <input type="submit" value="Convert to PDF">
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body ">
                    <table class="table table-bordered table-sm" id="tbl1"  style="background-color: #fff">
                        <thead>
                            <tr>
                                <th colspan="1"></th>
                                <th colspan="2">AM</th>
                                <th colspan="2"></th> 
                            </tr>
                            <tr>
                                <th style="display: none">DATE OF SALE</th>
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
                            $tot_win_AM=0;
                            $tot_loss_AM=0
                        @endphp
                        @foreach ($sales as $sale)
                            @php
                                $total=a($sale->AM_in)-a($sale->AM_out);
                            @endphp
                            <tr>
                                <td  style="display: none">{{ $sale->date_of_sale }}</td>
                                <td>{{ $sale->station }}</td>
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
                    <table class="table table-bordered table-sm" id="tbl1"  style="margin-top: 50px;background-color:#fff">
                        <thead>
                            <tr>
                                <th colspan="1"></th>
                                <th colspan="2">PM</th>
                                <th colspan="2"></th> 
                            </tr>
                            <tr>
                                <th style="display: none">DATE OF SALE</th>
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
                                <td  style="display: none">{{ $sale->date_of_sale }}</td>
                                <td>{{ $sale->station }}</td>
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

                    <table class="table table-bordered table-sm" id="tbl1" style="margin-top: 50px;background-color:#fff">
                        <thead>
                            <tr>
                                <th colspan="1"></th>
                                <th colspan="2">EXTRA</th>
                                <th colspan="2"></th> 
                            </tr>
                            <tr>
                                <th style="display: none">DATE OF SALE</th>
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
                                <td  style="display: none">{{ $sale->date_of_sale }}</td>
                                <td>{{ $sale->station }}</td>
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

                      <table class="table table-bordered table-sm" id="tbl1" style="margin-top: 50px;background-color:#fff">
                        <thead>
                            <tr>
                                <th colspan="1"></th>
                                <th colspan="2">SUMMARY</th>
                                <th colspan="2"></th> 
                            </tr>
                            <tr>
                                <th style="display: none">DATE OF SALE</th>
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
                                <td  style="display: none">{{ $sale->date_of_sale }}</td>
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
                                <td class="t-right">{{ c($tot_out_sum) }}</td>
                                <td class="bg-warning t-right">{{ c($tot_win_summary) }}</td>
                                <td class="bg-warning t-right">{{ c($tot_loss_summary) }}</td>
                            </tr>
                        </tbody>
                    </table>




                    <table class="table table-bordered table-sm" id="tbl1" style="margin-top: 50px;width:50%;background-color:#fff">
                        <thead>
                            <tr class="bg-primary">
                                <th colspan="4">SUMMARY OF RESULTS</th>;
                            </tr>
                            <tr>
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
                                <tr class="bg-danger">
                                    <td colspan="3" >LOSS</td>
                                    <td colspan="3" >{{ c($stat) }}</td>
                                </tr>
                            @else
                                <tr class="bg-success">
                                    <td colspan="3" >WIN</td>
                                    <td colspan="3" >{{ c($stat) }}</td>
                                </tr>
                            @endif
                            
                        </tbody>

                    </table>


                    <table class="table table-bordered table-sm" id="tbl1" style="margin-top: 50px;width:50%;background-color:#fff">
                        <thead>
                            <tr class="bg-primary">
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

                </div>



               
            </div>
        </div>
    </div>
</div>



{{-- MODALS --}}
@include('modals.add-sale-modal')
{{-- @include('modals.add-exp-modal')
@include('modals.view-exp-modal')
 --}}










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


<script>
    $(document).ready(function(){
        $('.btnEdit').click(function(){
            $("#edit").modal('show');
            $tr=$(this).closest('tr');

            var data= $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);
            $('#date_of_salex').val(data[0]);
            $('#date_of_sale1').val(data[0]);
            $('#date_of_sale2').val(data[0]);
            $('#station').val(data[1]);
            $('#AM_in').val(data[2]);
            $('#AM_out').val(data[3]);
            $('#PM_in').val(data[4]);
            $('#PM_out').val(data[5]);
            $('#EXTRA_in').val(data[6]);
            $('#EXTRA_out').val(data[7]);
            $('#id').val(data[8]);
            $('#EditSales').attr('action','/daily-pre-sales/'+data[8]+'/update');
            $('#EditSales').attr('method','POST');
        })
    });
</script>



<script>
    function c_format(nField){
        if (/^0/.test(nField.value))
            {
                nField.value = nField.value.substring(0,1);
            }
        if (Number(nField.value.replace(/,/g,"")))
            {
                var tmp = nField.value.replace(/,/g,"");
                tmp = tmp.toString().split('').reverse().join('').replace(/(\d{3})/g,'$1,').split('').reverse().join('').replace(/^,/,'');
                if (/\./g.test(tmp))
                {
                    tmp = tmp.split(".");
                    tmp[1] = tmp[1].replace(/\,/g,"").replace(/ /,"");
                    nField.value = tmp[0]+"."+tmp[1]
                }
                else   {
                    nField.value = tmp.replace(/ /,"");
                } 
            }
        else    {
                nField.value = nField.value.replace(/[^\d\,\.]/g,"").replace(/ /,"");
            }
    }
    </script>



@endsection
