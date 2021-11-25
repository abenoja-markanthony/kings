@extends('layouts.app')

@section('content')
@section('page-css')
    <link href="{{ asset('css/edit-sales.css') }}" rel="stylesheet">
@endsection




<div class="container mt-4 wrap">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(Session::has('success'))
                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
            @endif

            @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
            @endif
            <div class="card p-4">

                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-10 "><h3>PRE-SALE RECEIPTS</h3> <h3>{{ date('M. d, Y', strtotime($date_of_sale)) }}</h3></div>
                        <div class="col-lg-2 "><a href="/daily-sales" class="btn btn-primary">BACK</a></div>
                       <input type="hidden" id="date_of_sale" value="{{ date('M. d, Y', strtotime($date_of_sale)) }}">
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-sm" id="tbl1">
                        <thead>
                            <tr>
                              
                                <th colspan="1"></th>
                                <th colspan="2">AM</th>
                                <th colspan="2">PM</th>
                                <th colspan="2">EXTRA</th>
                                <th colspan="5"></th>
                            </tr>
                            <tr>
                                <th style="display: none">DATE OF SALE</th>
                                <th>STATION</th>
                                <th>IN</th>
                                <th>OUT</th>
                                <th>IN</th>
                                <th>OUT</th>
                                <th>IN</th>
                                <th>OUT</th>
                                <th>UPDATED BY</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>

                        <tbody>

                      @if (count($sales)<1)
                            <tr>
                                <td colspan="6">No record found.</td>
                            </tr>
                      @endif
                        
                        @foreach ($sales as $sale)
                            <tr>
                                <td  style="display: none">{{ $sale->date_of_sale }}</td>
                                <td>{{ $sale->station }}</td>
                                <td class="t-right">{{ c($sale->AM_in) }}</td>
                                <td class="t-right">{{ c($sale->AM_out) }}</td>
                                <td class="t-right">{{ c($sale->PM_in) }}</td>
                                <td class="t-right">{{ c($sale->PM_out) }}</td>
                                <td class="t-right">{{ c($sale->EXTRA_in) }}</td>
                                <td class="t-right">{{ c($sale->EXTRA_out) }}</td>
                                <td style="display: none">{{ $sale->id }}</td>
                                <td>{{ $sale->username }}</td>
                               
                                <td  class="action_td">
                                    @if ($sale->accepted==0)
                                        <button class="btn1 btn-primary btnEdit" >Edit</button>
                                    @else
                                        ACCEPTED
                                    @endif
                                </td>
                            </tr>
                            
                        
                        @endforeach

                            <tr>
                                <td >GRAND TOTAL</td>
                                <td class="t-right">{{ c($tot_in_AM) }}</td>
                                <td class="t-right">{{ c($tot_out_AM) }}</td>
                                <td class="t-right">{{ c($tot_in_PM) }}</td>
                                <td class="t-right">{{ c($tot_out_PM) }}</td>
                                <td class="t-right">{{ c($tot_in_EXTRA) }}</td>
                                <td class="t-right">{{ c($tot_out_EXTRA) }}</td>
                                <td class="bg-warning t-right">{{ c($net_sales) }}</td>
                                <td colspan="2"></td>
                            </tr>
                        </tbody>
                    </table>

                    @php
                        $tot_in=a($tot_in_AM)+a($tot_in_PM)+a($tot_in_EXTRA);
                        $tot_out=a($tot_out_AM)+a($tot_out_PM)+a($tot_out_EXTRA);
                    @endphp

                    TOTAL IN:<input type="text" id="tot_in" value="{{ $tot_in }}">
                    TOTAL OUT:<input type="text" id="tot_out" value="{{ $tot_out }}">
                    NET:<input type="text" id="net_sales" value="{{ $net_sales }}">

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
            $("#presale-edit").modal('show');
            $tr=$(this).closest('tr');

            var data= $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            var tot_in=$('#tot_in').val();
            var tot_out=$('#tot_out').val();
            var net_sales=$('#net_sales').val();

            console.log(data);

            $('#date_of_salex1').val(data[0]);
            $('#date_of_sale11').val(data[0]);
            $('#date_of_sale21').val(data[0]);
            $('#stationx').val(data[1]);
            $('#AM_in1').val(data[2]);
            $('#AM_out1').val(data[3]);
            $('#PM_in1').val(data[4]);
            $('#PM_out1').val(data[5]);
            $('#EXTRA_in1').val(data[6]);
            $('#EXTRA_out1').val(data[7]);
            $('#tot_in11').val(tot_in);
            $('#tot_out11').val(tot_out);
            $('#net_sales11').val(net_sales);
            $('#id1').val(data[8]);
            $('#EditSalesPre').attr('action','/pcso-pre-sales/'+data[8]+'/update');
            $('#EditSalesPre').attr('method','POST');
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
