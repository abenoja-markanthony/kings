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
                        <div class="col-lg-6 "><h3>DAILY RECEIPTSs</h3> <h3>{{ date('M. d, Y', strtotime($date_of_sale)) }}</h3></div>
                        <div class="col-lg-4 "><button class="btn btn-primary" id="add_receipt">CASH IN /CASH OUT</button></div>
                        <div class="col-lg-2 "><a href="/daily-sales" class="btn btn-primary">BACK</a></div>
                       <input type="hidden" id="date_of_sale" value="{{ date('M. d, Y', strtotime($date_of_sale)) }}">
                       <input type="hidden" id="date_of_sale1" value="{{ $date_of_sale }}">
                    </div>
                </div>
               
                <div class="card-body ">
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
                                <th>TOTAL IN</th>
                                <th>TOTAL OUT</th>
                                <th>NET TOTAL</th>
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
                        
                        @foreach ($data as $sale)
                            <tr>
                                <td  style="display: none">{{ $sale->date_of_sale }}</td>
                                <td>{{ $sale->station }}</td>
                                <td class="t-right">{{ c($sale->AM_in) }}</td>
                                <td class="t-right">{{ c($sale->AM_out) }}</td>
                                <td class="t-right">{{ c($sale->PM_in) }}</td>
                                <td class="t-right">{{ c($sale->PM_out) }}</td>
                                <td class="t-right">{{ c($sale->EXTRA_in) }}</td>
                                <td class="t-right">{{ c($sale->EXTRA_out) }}</td>
                                <td class="t-right">{{ c($sale->tot_in) }}</td>
                                <td class="t-right">{{ c($sale->tot_out) }}</td>
                                <td class="t-right">{{ c($sale->net_sales) }}</td>
                                <td style="display: none">{{ $sale->id }}</td>
                                <td  style="display: none">{{ $sale->station }}</td>
                                <td style="display: none">{{ $sale->pre_AM_in }}</td>
                                <td style="display: none">{{ $sale->pre_AM_out }}</td>
                                <td style="display: none">{{ $sale->pre_PM_in }}</td>
                                <td style="display: none">{{ $sale->pre_PM_out }}</td>
                                <td style="display: none">{{ $sale->pre_EXTRA_in }}</td>
                                <td style="display: none">{{ $sale->pre_EXTRA_out }}</td>

                                <td>{{ $sale->username }}</td>
                               
                                <td>

                                    @if ($sale->accepted==0)
                                       
                                        <div class="dropdown">
                                            <button class=" btn-secondary btn1 dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              ACTION
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                <button class="dropdown-item text-primary"  disabled>{{ $sale->station }}</button>
                                                <button class="dropdown-item btnEdit" >Edit Sale</button>
                                                <button class="dropdown-item btnExp" id="{{ $sale->station }}">Add Expenses</button>
                                                <button class="dropdown-item viewExp" id="{{ $sale->station }}">View Expenses</button>
                                            </div>
                                        </div>
                                        
                                    @else
                                        ACCEPTED
                                    @endif
                                    


                                </td>
                            </tr>
                            
                        
                        @endforeach

                            <tr>
                                <td  colspan="7">GRAND TOTAL</td>
                                <td class="t-right">{{ c($grand_in) }}</td>
                                <td class="t-right">{{ c($grand_out) }}</td>
                                <td class="bg-warning t-right">{{ c($grand_total) }}</td>
                                <td colspan="2"></td>
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
@include('modals.add-exp-modal')
@include('modals.view-exp-modal')
@include('modals.add-receipt-modal')










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
$(document).ready(function() {
        $("form").bind("keypress", function(e) {
            if (e.keyCode == 13) {
                return false;
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('#add_receipt').click(function(){
        var date_of_sale=$('#date_of_sale1').val();
            $("#cash_in_out_modal").modal('show');
            $('#date_of_receipt').val(date_of_sale);
            $('#date_of_receipt1').val(date_of_sale);
            
        })
    });
</script>


<script>
    $(document).ready(function(){
        $('.btnEdit').click(function(){
            $('#success').css('display','none');
            $('#message').css('display','none');
            $('#validate').css('display','block');
            $('#update_btn').css('display','none');
            $("#edit").modal('show');
            $('.t-right').css('background-color','#fff');
            $('.t-right').prop('readonly', false);

            $tr=$(this).closest('tr');

            var data= $tr.children("td").map(function(){
                return $(this).text();
            }).get();
            console.log(data);
            var baseUrl = "{{  URL::to("daily-sales1") }}" + "/" +data[11];
            $('#date_of_salex').val(data[0]);
            $('#date_of_sale2').val(data[0]);
            $('#station').val(data[1]);
            $('#AM_in').val(data[2]);
            $('#AM_out').val(data[3]);
            $('#PM_in').val(data[4]);
            $('#PM_out').val(data[5]);
            $('#EXTRA_in').val(data[6]);
            $('#EXTRA_out').val(data[7]);
            $('#id').val(data[11]);
            $('#station1').val(data[12]);

            $('#pre_AM_in').val(data[13]);
            $('#pre_AM_out').val(data[14]);
            $('#pre_PM_in').val(data[15]);
            $('#pre_PM_out').val(data[16]);
            $('#pre_EXTRA_in').val(data[17]);
            $('#pre_EXTRA_out').val(data[18]);


            // $('#EditSales').attr('action','/daily-sales1/'+data[11]);
            $('#EditSalesDaily').attr('action',baseUrl);
            $('#EditSalesDaily').attr('method','POST');
        })
    });
</script>


<script>
    $(document).ready(function(){
        $('#validate').click(function(){
            var am_in= e($('#AM_in').val());
            var am_out= e($('#AM_out').val());
            var pm_in= e($('#PM_in').val());
            var pm_out= e($('#PM_out').val());
            var extra_in= e($('#EXTRA_in').val());
            var extra_out= e($('#EXTRA_out').val());

            var pre_am_in= e($('#pre_AM_in').val());
            var pre_am_out= e($('#pre_AM_out').val());
            var pre_pm_in= e($('#pre_PM_in').val());
            var pre_pm_out= e($('#pre_PM_out').val());
            var pre_extra_in= e($('#pre_EXTRA_in').val());
            var pre_extra_out= e($('#pre_EXTRA_out').val());
        
            var in_am = compare(am_in,pre_am_in);
            var in_pm = compare(pm_in,pre_pm_in);
            var in_extra = compare(extra_in,pre_extra_in);

            var out_am = compare(am_out,pre_am_out);
            var out_pm = compare(pm_out,pre_pm_out);
            var out_extra = compare(extra_out,pre_extra_out);
           
            var ctr=0;
            
            $('#message').html('<h5>Corrections:</h5>');

            if(in_am!='TRUE'){
                $("#message").append("<small>- AM sales is not equal to pre-collection data!</small><br>");
                $('#AM_in').css('background-color','#f7b9b5');
            }else{
                $('#AM_in').css('background-color','#a9ebba');
                ctr++;
            }
            if(out_am!='TRUE'){
                $("#message").append("<small>- AM table out is not equal to pre-collection data!</small><br>");
                $('#AM_out').css('background-color','#f7b9b5');
            }else{
                $('#AM_out').css('background-color','#a9ebba');
                ctr++;
            }
            if(in_pm!='TRUE'){
                $("#message").append("<small>- PM sales is not equal to pre-collection data!</small><br>");
                $('#PM_in').css('background-color','#f7b9b5');
            }else{
                $('#PM_in').css('background-color','#a9ebba');
                ctr++;
            }
            if(out_pm!='TRUE'){
                $("#message").append("<small>- PM table out is not equal to pre-collection data!</small><br>");
                $('#PM_out').css('background-color','#f7b9b5');
            }else{
                $('#PM_out').css('background-color','#a9ebba');
                ctr++;
            }
            if(in_extra!='TRUE'){
                $("#message").append("<small>- EXTRA sales is not equal to pre-collection data!</small><br>");
                $('#EXTRA_in').css('background-color','#f7b9b5');
            }else{
                $('#EXTRA_in').css('background-color','#a9ebba');
                ctr++;
            }
            if(out_extra!='TRUE'){
                $("#message").append("<small>- EXTRA table out is not equal to pre-collection data!</small><br>");
                $('#EXTRA_out').css('background-color','#f7b9b5');
            }else{
                $('#EXTRA_out').css('background-color','#a9ebba');
                ctr++;
            }
            
            if(ctr>5){
                $('#message').css('display','none');
                $('#update_btn').css('display','block');
                $('#update_btn').css('float','left');
                $(this).css('display','none');
                $('.t-right').prop('readonly', true);
                $('#success').css('display','block');
            }else{
                $('#message').css('display','block');
            }
            
        });

    
        function compare(a, b) {
           
            a=parseFloat(a);
            b=parseFloat(b);
            if(a==b){
                return 'TRUE';
                
            }else{
                return 'FALSE';
            }
        }

      

        function e(x){
            if(x==""){
                return 0;
            }else{
                return x.replace(/[^\d.-]/g, '');
            }
        }
    });
   

    
</script>

<script>
    $(document).ready(function(){
        $('.btnExp').click(function(){
            $("#exp_modal").modal('show');
            var station=$(this).attr('id');

            $tr=$(this).closest('tr');

            var data= $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);
            $('#e_date_of_sale').val(data[0]);
            $('#e_station').val(data[1]);
        })
    });
</script>

<script>
    $(document).ready(function(){
        $('.viewExp').click(function(){
            var date_of_sale=$('#date_of_sale').val();
            var station=$(this).attr('id');
                $(".station").text(station);
                $(".dos").text(date_of_sale);

            switch(station) {
            case 'MAIN OFFICE':
                $("#mo_exp_modal").modal('show');
                break;
            case 'ARITAO':
                $("#aritao_exp_modal").modal('show');
                break;
            case 'AMBAGUIO 1':
                $("#ambaguio1_exp_modal").modal('show');
                break;
            case 'AMBAGUIO 2':
                $("#ambaguio2_exp_modal").modal('show');
                break;
            case 'BAGABAG':
                $("#bagabag_exp_modal").modal('show');
                break;
            case 'BAMBANG 1':
                $("#bambang1_exp_modal").modal('show');
                break;
            case 'BAMBANG 2':
                $("#bambang2_exp_modal").modal('show');
                break;
            case 'BAYOMBONG':
                $("#bayombong_exp_modal").modal('show');
                break;
            case 'CASTANEDA':
                $("#castaneda_exp_modal").modal('show');
                break;
            case 'DIADI':
                $("#diadi_exp_modal").modal('show');
                break;
            case 'DUPAX NORTE 1':
                $("#dupax_norte1_exp_modal").modal('show');
                break;
            case 'DUPAX NORTE 2':
                $("#dupax_norte2_exp_modal").modal('show');
                break;
            case 'DUPAX SUR':
                $("#dupax_sur_exp_modal").modal('show');
                break;
            case 'KAYAPA 1':
                $("#kayapa1_exp_modal").modal('show');
                break;
            case 'KAYAPA 2':
                $("#kayapa2_exp_modal").modal('show');
                break;
            case 'KASIBU':
                $("#kasibu_exp_modal").modal('show');
                break;
            case 'QUEZON':
                $("#quezon_exp_modal").modal('show');
                break;
            case 'SOLANO 1':
                $("#solano1_exp_modal").modal('show');
                break;
            case 'SOLANO 2':
                $("#solano2_exp_modal").modal('show');
                break;
            case 'STA. FE':
                $("#sta_fe_exp_modal").modal('show');
                break;
            case 'VILLAVERDE':
                $("#villaverde_exp_modal").modal('show');
                break;
            
            default:
                // code 
            }
            
          
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
