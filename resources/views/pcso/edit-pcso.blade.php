@extends('layouts.app')

@section('content')
@section('page-css')
    <link href="{{ asset('css/edit-pcso.css') }}" rel="stylesheet">
@endsection




<div class="fluid mt-4 wrap p-4">
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
                    <table class="table table-bordered table-sm tbl1">
                        <thead>
                            <tr>
                                <th colspan="1"></th>
                                <th colspan="3">AM</th>
                                <th colspan="3">PM</th>
                                <th colspan="3">EXTRA</th>
                                <th colspan="3"></th>
                            </tr>
                            <tr>
                                <th>STATION</th>
                                <th class='bg-success'>IN</th>
                                <th class='bg-danger'>OUT</th>
                                <th class='bg-primary'>NET</th>
                                <th class='bg-success'>IN</th>
                                <th class='bg-danger'>OUT</th>
                                <th class='bg-primary'>NET</th>
                                <th class='bg-success'>IN</th>
                                <th class='bg-danger'>OUT</th>
                                <th class='bg-primary'>NET</th>
                                <th class='bg-success'>TOTAL IN</th>
                                <th class='bg-danger'>TOTAL OUT</th>
                                <th class='bg-primary'>TOTAL NET</th>
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
                                <td>{{ $sale->station }}</td>
                                <td class="t-right">{{ c($sale->AM_in) }}</td>
                                <td class="t-right">{{ c($sale->AM_out) }}</td>
                                <td class="t-right">{{ c(a($sale->AM_in)-a($sale->AM_out)) }}</td>
                                <td class="t-right">{{ c($sale->PM_in) }}</td>
                                <td class="t-right">{{ c($sale->PM_out) }}</td>
                                <td class="t-right">{{ c(a($sale->PM_in)-a($sale->PM_out)) }}</td>
                                <td class="t-right">{{ c($sale->EXTRA_in) }}</td>
                                <td class="t-right">{{ c($sale->EXTRA_out) }}</td>
                                <td class="t-right">{{ c(a($sale->EXTRA_in)-a($sale->EXTRA_out)) }}</td>
                                <td class="t-right">{{ c(a($sale->AM_in)+a($sale->PM_in)+a($sale->EXTRA_in)) }}</td>
                                <td class="t-right">{{ c(a($sale->AM_out)+a($sale->PM_out)+a($sale->EXTRA_out)) }}</td>
                                <td class="t-right">{{ c((a($sale->AM_in)+a($sale->PM_in)+a($sale->EXTRA_in))-(a($sale->AM_out)+a($sale->PM_out)+a($sale->EXTRA_out))) }}</td>
                            </tr>
                            
                        
                        @endforeach
                        @php
                            $tot_in=a($tot_in_AM)+a($tot_in_PM)+a($tot_in_EXTRA);
                            $tot_out=a($tot_out_AM)+a($tot_out_PM)+a($tot_out_EXTRA);
                        @endphp
                            <tr>
                                <td class="bg-warning t-right">GRAND TOTAL</td>
                                <td class="bg-warning t-right">{{ c($tot_in_AM) }}</td>
                                <td class="bg-warning t-right">{{ c($tot_out_AM) }}</td>
                                <td class="bg-warning t-right">{{ c($tot_in_AM-$tot_out_AM) }}</td>
                                <td class="bg-warning t-right">{{ c($tot_in_PM) }}</td>
                                <td class="bg-warning t-right">{{ c($tot_out_PM) }}</td>
                                <td class="bg-warning t-right">{{ c($tot_in_AM-$tot_out_AM) }}</td>
                                <td class="bg-warning t-right">{{ c($tot_in_EXTRA) }}</td>
                                <td class="bg-warning t-right">{{ c($tot_out_EXTRA) }}</td>
                                <td class="bg-warning t-right">{{ c($tot_in_EXTRA-$tot_out_EXTRA) }}</td>
                                <td class="bg-warning t-right">{{ c($tot_in) }}</td>
                                <td class="bg-warning t-right">{{ c($tot_out) }}</td>
                                <td class="bg-success t-right">{{ c($net_sales) }}</td>
                            </tr>
                        </tbody>
                    </table>

                    @php
                        if(isset($assumption)){
                            $assump=$assumption;
                            $percent=round($assumption/$tot_in,4);
                        }else{
                            $assump='';
                            $percent=0;
                        }
                       
                    @endphp

                    <form action="{{ route('pcso-sales-assump') }}" method="GET">
                        <input type="hidden" value="{{ $date_of_sale }}" name="date_of_sale">
                        ASSUMPTION: <input type="text" name="assumption" value="{{ $assump }}" >
                        <input type="submit" value="Submit" class="btn1 btn-primary">
                        PERCENTAGE: <input type="text" name="percentage" disabled value="{{ $percent }}">
                    </form>

                    <br><br>

                  

                {{-- FOR EDIT --}}
                @if (count($sale_assump)>0)
                <h4><u>EDIT</u></h4><br>
                    <form action="{{ route('pcso.assump-store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="p_date" value="{{ $date_of_sale }}">

                        <table class="table table-bordered table-sm tbl1">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th colspan="4">AM</th>
                                    <th colspan="4">PM</th>
                                    <th colspan="4">EXTRA</th>
                                    <th colspan="4"></th>
                                </tr>
                                <tr>
                                    <th>STATION</th>
                                    <th>AM PCSO</th>
                                    <th>PRICE FUND</th>
                                    <th>AM OUT</th>
                                    <th>NET PF</th>
                                    <th>PM PCSO</th>
                                    <th>PRICE FUND</th>
                                    <th>PM OUT</th>
                                    <th>NET PF</th>
                                    <th>EXTRA PCSO</th>
                                    <th>PRICE FUND</th>
                                    <th>EXTRA OUT</th>
                                    <th>NET PF</th>
                                    <th>TOTAL PCSO</th>
                                    <th>TOTAL PF</th>
                                    <th>TOTAL OUT</th>
                                    <th>TOTAL NET PF</th>
                                </tr>
                            </thead>

                            <tbody>
                              
                                    @foreach ($sale_assump as $sale)
                                        <input type="hidden"  name="station[]" value="{{ $sale->station }}">
                                        <input type="hidden"  name="am_in[]" value="{{ a($sale->AM_in) }}">
                                        <input type="hidden"  name="pm_in[]" value="{{ a($sale->PM_in) }}">
                                        <input type="hidden"  name="extra_in[]" value="{{ a($sale->EXTRA_in) }}">
                                    <tr>
                                        
                                        <td>{{ $sale->station }}</td>
                                        <td class="t-right am_pcso">{{ c(a($sale->AM_in)) }}</td>
                                        <td class="t-right am_pf">{{ c(a($sale->AM_in*.31205)) }}</td>
                                        <td class="t-right"><input type="number" name="am_out[]" class="AM_out_input" value="{{ $sale->AM_out }}" ></td>
                                        <td class="t-right am_net_pf">{{ c(a($sale->AM_in*.31205)-a($sale->AM_out)) }}</td>
                                        <td class="t-right pm_pcso">{{ c(a($sale->PM_in)) }}</td>
                                        <td class="t-right pm_pf">{{ c(a($sale->PM_in*.31205)) }}</td>
                                        <td class="t-right"><input type="number" name="pm_out[]" class="PM_out_input"  value="{{ $sale->PM_out }}" ></td>
                                        <td class="t-right pm_net_pf">{{ c(a($sale->PM_in*.31205)-a($sale->PM_out)) }}</td>
                                        <td class="t-right extra_pcso">{{ c(a($sale->EXTRA_in)) }}</td>
                                        <td class="t-right extra_pf">{{ c(a($sale->EXTRA_in*.31205)) }}</td>
                                        <td class="t-right"><input type="number" name="extra_out[]" class="EXTRA_out_input"  value="{{ $sale->EXTRA_out }}" ></td>
                                        <td class="t-right extra_net_pf">{{ c(round(a($sale->EXTRA_in*.31205,0)-a($sale->EXTRA_out))) }}</td>
                                        <td class="t-right total_pcso bg-info">{{ c((a($sale->AM_in))+(a($sale->PM_in))+(a($sale->EXTRA_in))) }}</td>
                                        <td class="t-right total_pf bg-primary">{{ c(a($sale->AM_in*.31205)+a($sale->PM_in*.31205)+a($sale->EXTRA_in*.31205)) }}</td>
                                        <td class="t-right total_out bg-info">{{ c(a($sale->AM_out)+a($sale->PM_out)+a($sale->EXTRA_out)) }}</td>
                                        <td class="t-right net_pf bg-primary">{{ c(a($sale->AM_in*.31205)-a($sale->AM_out)+a($sale->PM_in*.31205)-a($sale->PM_out)+a($sale->EXTRA_in*.31205)-a($sale->EXTRA_out)) }}</td>
                                        
                                    </tr>
                                    @endforeach

                                    <tr class="text-right bg-warning">
                                        <td><b>TOTAL</b></td>
                                        <td id="Gtotal_am_pcso"></td>
                                        <td id="Gtotal_am_pf"></td>
                                        <td id="Gtotal_am_out"></td>
                                        <td id="Gtotal_am_net_pf"></td>
                                        <td id="Gtotal_pm_pcso"></td>
                                        <td id="Gtotal_pm_pf"></td>
                                        <td id="Gtotal_pm_out"></td>
                                        <td id="Gtotal_pm_net_pf"></td>
                                        <td id="Gtotal_extra_pcso"></td>
                                        <td id="Gtotal_extra_pf"></td>
                                        <td id="Gtotal_extra_out"></td>
                                        <td id="Gtotal_extra_net_pf"></td>
                                        <td id="Gtotal_pcso"></td>
                                        <td id="Gtotal_pf"></td>
                                        <td id="Gtotal_outx"></td>
                                        <td id="Gnet_pf"></td>
                                    </tr>
                                    
                                  
                            </tbody>
                        </table>
                        <div class="text-center">
                            <input type="submit" value="UPDATE" class="btn btn-primary">
                        </div>

                    </form>

                {{-- NEW RECORD --}}
                @else
                    <h4><u>NEW RECORD</u></h4><br>
                    <form action="{{ route('pcso.assump-store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="p_date" value="{{ $date_of_sale }}">

                        <table class="table table-bordered table-sm tbl1">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th colspan="4">AM</th>
                                    <th colspan="4">PM</th>
                                    <th colspan="4">EXTRA</th>
                                    <th colspan="4"></th>
                                </tr>
                                <tr>
                                    <th>STATION</th>
                                    <th>AM PCSO</th>
                                    <th>PRICE FUND</th>
                                    <th>AM OUT</th>
                                    <th>NET PF</th>
                                    <th>PM PCSO</th>
                                    <th>PRICE FUND</th>
                                    <th>PM OUT</th>
                                    <th>NET PF</th>
                                    <th>EXTRA PCSO</th>
                                    <th>PRICE FUND</th>
                                    <th>EXTRA OUT</th>
                                    <th>NET PF</th>
                                    <th>TOTAL PCSO</th>
                                    <th>TOTAL PF</th>
                                    <th>TOTAL OUT</th>
                                    <th>TOTAL NET PF</th>
                                </tr>
                            </thead>

                            <tbody>

                                    @foreach ($sales as $sale)
                                            <input type="hidden"  name="station[]" value="{{ $sale->station }}">
                                            <input type="hidden"  name="am_in[]" value="{{ a($sale->AM_in)*$percent }}">
                                            <input type="hidden"  name="pm_in[]" value="{{ a($sale->PM_in)*$percent }}">
                                            <input type="hidden"  name="extra_in[]" value="{{a($sale->EXTRA_in)*$percent }}">
                                        <tr>
                                            
                                            <td>{{ $sale->station }}</td>
                                            <td class="t-right am_pcso">{{ c(a($sale->AM_in)*$percent) }}</td>
                                            <td class="t-right am_pf">{{ c(a($sale->AM_in*$percent)*.31205)}}</td>
                                            <td class="t-right"><input type="number" name="am_out[]" class="AM_out_input" ></td>
                                            <td class="t-right am_net_pf"></td>
                                            <td class="t-right pm_pcso">{{ c(a($sale->PM_in)*$percent) }}</td>
                                            <td class="t-right pm_pf">{{ c((a($sale->PM_in)*$percent)*.31205) }}</td>
                                            <td class="t-right"><input type="number" name="pm_out[]" class="PM_out_input" ></td>
                                            <td class="t-right pm_net_pf"></td>
                                            <td class="t-right extra_pcso">{{ c(a($sale->EXTRA_in)*$percent) }}</td>
                                            <td class="t-right extra_pf">{{ c((a($sale->EXTRA_in)*$percent)*.31205) }}</td>
                                            <td class="t-right"><input type="number" name="extra_out[]" class="EXTRA_out_input" ></td>
                                            <td class="t-right extra_net_pf"></td>
                                            <td class="t-right total_pcso">{{ c((a($sale->AM_in)*$percent)+(a($sale->PM_in)*$percent)+(a($sale->EXTRA_in)*$percent)) }}</td>
                                            <td class="t-right total_pf">{{ c(((a($sale->AM_in)*$percent)*.31205)+((a($sale->PM_in)*$percent)*.31205)+((a($sale->EXTRA_in)*$percent)*.31205)) }}</td>
                                            <td class="t-right total_out"></td>
                                            <td class="t-right net_pf"></td>
                                        </tr>
                                    
                                    @endforeach
                                    <tr class="text-right bg-warning">
                                        <td><b>TOTAL</b></td>
                                        <td id="Gtotal_am_pcso"></td>
                                        <td id="Gtotal_am_pf"></td>
                                        <td id="Gtotal_am_out"></td>
                                        <td id="Gtotal_am_net_pf"></td>
                                        <td id="Gtotal_pm_pcso"></td>
                                        <td id="Gtotal_pm_pf"></td>
                                        <td id="Gtotal_pm_out"></td>
                                        <td id="Gtotal_pm_net_pf"></td>
                                        <td id="Gtotal_extra_pcso"></td>
                                        <td id="Gtotal_extra_pf"></td>
                                        <td id="Gtotal_extra_out"></td>
                                        <td id="Gtotal_extra_net_pf"></td>
                                        <td id="Gtotal_pcso"></td>
                                        <td id="Gtotal_pf"></td>
                                        <td id="Gtotal_outx"></td>
                                        <td id="Gnet_pf"></td>
                                    </tr>
                            </tbody>
                        </table>
                        <div class="text-center">
                            <input type="submit" value="SAVE" class="btn btn-primary">
                        </div>
                    </form>   
                @endif
                    

                
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
            $x=0;
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
    $('#assumption').keyup(function(){
        var assumption=$(this).val();
        var total_in=$('#total_in').val();
        var percentage = assumption/total_in;
            percentage=percentage.toFixed(4)
            $('#percentage').val(percentage);
    });
</script>

<script>
    $('.AM_out_input').keyup(function(){
        calculate();
    });

    $('.PM_out_input').keyup(function(){
        calculate();
    });

    $('.EXTRA_out_input').keyup(function(){
        calculate();
    });

    function calculate(){
        $("tr").each(function(){
            var am_out=$(this).closest('tr').find('.AM_out_input').val();
            
            var pm_out=$(this).closest('tr').find('.PM_out_input').val();
            var extra_out=$(this).closest('tr').find('.EXTRA_out_input').val();
            var am_pf=$(this).closest('tr').find('.am_pf').text();
            var pm_pf=$(this).closest('tr').find('.pm_pf').text();
            var extra_pf=$(this).closest('tr').find('.extra_pf').text();

            if(am_out==''){
                am_out=0;
            }
            if(pm_out==''){
                pm_out=0;
            } 
            if(extra_out==''){
                extra_out=0;
            }
            if(am_pf==''){
                am_pf=0;
            }else{
                am_pf=am_pf.replace(/[^\d.-]/g, '');     
            }
            if(pm_pf==''){
                pm_pf=0;
            }else{
                pm_pf=pm_pf.replace(/[^\d.-]/g, '');     
            }
            if(extra_pf==''){
                extra_pf=0;
            }else{
                extra_pf=extra_pf.replace(/[^\d.-]/g, '');     
            }
           
            var am_net_pf=parseFloat(am_pf)-parseFloat(am_out);
            var pm_net_pf=parseFloat(pm_pf)-parseFloat(pm_out);
            var extra_net_pf=parseFloat(extra_pf)-parseFloat(extra_out);
            var total_out=parseFloat(am_out)+parseFloat(pm_out)+parseFloat(extra_out);
            var net_pf=am_net_pf+pm_net_pf+extra_net_pf;

            $(this).closest('tr').find('.am_net_pf').text(am_net_pf.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
            $(this).closest('tr').find('.pm_net_pf').text(pm_net_pf.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
            $(this).closest('tr').find('.extra_net_pf').text(extra_net_pf.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));

            $(this).closest('tr').find('.total_out').text(total_out.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
            $(this).closest('tr').find('.net_pf').text(net_pf.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));

 
            Gtotal_am_pcso();
            Gtotal_am_pf();
            Gtotal_pm_pcso();
            Gtotal_pm_pf();
            Gtotal_extra_pcso();
            Gtotal_extra_pf();
            Gtotal_am_out();
            Gtotal_pm_out();
            Gtotal_extra_out();
            Gtotal_am_net_pf();
            Gtotal_pm_net_pf();
            Gtotal_extra_net_pf();
            
            Gtotal_pcso();
            Gtotal_pf();
            Gtotal_out();
            Gnet_pf();

        });
    }
    
</script>


<script>
    $(document).ready(function(){
        Gtotal_am_pcso();
        Gtotal_am_pf();
        Gtotal_pm_pcso();
        Gtotal_pm_pf();
        Gtotal_extra_pcso();
        Gtotal_extra_pf();

        Gtotal_am_out();
        Gtotal_pm_out();
        Gtotal_extra_out();
        
        Gtotal_pcso();
        Gtotal_pf();
        Gtotal_out();
        Gnet_pf();
        calculate();
    });
</script>

<script>
function Gtotal_pcso(){
    var sum = 0;
    var x=0;

    $('.total_pcso').each(function() {
        x=$(this).text();
        if(x==''){
            x=0;
        }else{
            x=x.replace(/[^\d.-]/g, '');
        }
       
        sum += parseFloat(x);
    });
    sum=Math.round(sum);
    $('#Gtotal_pcso').text(sum.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));

}
</script>


<script>
function Gtotal_pf(){
    var sum = 0;
    var x=0;
    $('.total_pf').each(function() {
        x=$(this).text();
        if(x==''){
            x=0;
        }else{
            x=x.replace(/[^\d.-]/g, '');
        }
       
        sum += parseFloat(x);
    });
    sum=Math.round(sum);
   
    $('#Gtotal_pf').text(sum.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));

}
</script>


<script>
function Gtotal_out(){
    var sum = 0;
    var x=0;
    $('.total_out').each(function() {
        x=$(this).text();
        if(x==''){
            x=0;
        }else{
            x=x.replace(/[^\d.-]/g, '');
        }
        
        sum += parseFloat(x);
    });
    sum=Math.round(sum);
    
    $('#Gtotal_outx').text(sum.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));

}
</script>

<script>
    function Gnet_pf(){
        var sum = 0;
        var x=0;
        $('.net_pf').each(function() {
            x=$(this).text();
            if(x==''){
                x=0;
            }else{
                x=x.replace(/[^\d.-]/g, '');
            }
           
            sum += parseFloat(x);
        });
        sum=Math.round(sum);
        
        $('#Gnet_pf').text(sum.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
    }
</script>

<script>
    function Gtotal_am_pcso(){
        var sum = 0;
        var x=0;
        $('.am_pcso').each(function() {
            x=$(this).text();
            if(x==''){
                x=0;
            }else{
                x=x.replace(/[^\d.-]/g, '');
            }
           
            sum += parseFloat(x);
        });
        sum=Math.round(sum);
       
        $('#Gtotal_am_pcso').text(sum.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
    }
</script>

<script>
    function Gtotal_am_pf(){
        var sum = 0;
        var x=0;
        $('.am_pf').each(function() {
            x=$(this).text();
            if(x==''){
                x=0;
            }else{
                x=x.replace(/[^\d.-]/g, '');
            }
           
            sum += parseFloat(x);
        });
        sum=Math.round(sum);
       
        $('#Gtotal_am_pf').text(sum.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
    }
</script>

<script>
    function Gtotal_pm_pcso(){
        var sum = 0;
        var x=0;
        $('.pm_pcso').each(function() {
            x=$(this).text();
            if(x==''){
                x=0;
            }else{
                x=x.replace(/[^\d.-]/g, '');
            }
           
            sum += parseFloat(x);
        });
        sum=Math.round(sum);
       
        $('#Gtotal_pm_pcso').text(sum.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
    }
</script>

<script>
    function Gtotal_pm_pf(){
        var sum = 0;
        var x=0;
        $('.pm_pf').each(function() {
            x=$(this).text();
            if(x==''){
                x=0;
            }else{
                x=x.replace(/[^\d.-]/g, '');
            }
           
            sum += parseFloat(x);
        });
        sum=Math.round(sum);
       
        $('#Gtotal_pm_pf').text(sum.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
    }
</script>

<script>
    function Gtotal_extra_pcso(){
        var sum = 0;
        var x=0;
        $('.extra_pcso').each(function() {
            x=$(this).text();
            if(x==''){
                x=0;
            }else{
                x=x.replace(/[^\d.-]/g, '');
            }
           
            sum += parseFloat(x);
        });
        sum=Math.round(sum);
       
        $('#Gtotal_extra_pcso').text(sum.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
    }
</script>

<script>
    function Gtotal_extra_pf(){
        var sum = 0;
        var x=0;
        $('.extra_pf').each(function() {
            x=$(this).text();
            if(x==''){
                x=0;
            }else{
                x=x.replace(/[^\d.-]/g, '');
            }
           
            sum += parseFloat(x);
        });
        sum=Math.round(sum);
       
        $('#Gtotal_extra_pf').text(sum.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
    }
</script>

<script>
    function Gtotal_am_out(){
        var sum = 0;
        var x=0;

        $('.AM_out_input').each(function() {
            x=$(this).val();
            if(x==''){
                x=0;
            }else{
                x=x.replace(/[^\d.-]/g, '');
            }
           
            sum += parseFloat(x);
        });
        sum=Math.round(sum);
       
        $('#Gtotal_am_out').text(sum.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
    }
</script>

<script>
    function Gtotal_pm_out(){
        var sum = 0;
        var x=0;
        $('.PM_out_input').each(function() {
            x=$(this).val();
            if(x==''){
                x=0;
            }else{
                x=x.replace(/[^\d.-]/g, '');
            }
           
            sum += parseFloat(x);
        });
        sum=Math.round(sum);
       
        $('#Gtotal_pm_out').text(sum.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
    }
</script>


<script>
    function Gtotal_extra_out(){
        var sum = 0;
        var x=0;
        $('.EXTRA_out_input').each(function() {
            x=$(this).val();
            if(x==''){
                x=0;
            }else{
                x=x.replace(/[^\d.-]/g, '');
            }
           
            sum += parseFloat(x);
        });
        sum=Math.round(sum);
       
        $('#Gtotal_extra_out').text(sum.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
    }
</script>

<script>
    function Gtotal_am_net_pf(){
        var sum = 0;
        var x=0;
        $('.am_net_pf').each(function() {
            x=$(this).text();
            if(x==''){
                x=0;
            }else{
                x=x.replace(/[^\d.-]/g, '');
            }
           
            sum += parseFloat(x);
        });
        sum=Math.round(sum);
       
        $('#Gtotal_am_net_pf').text(sum.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
    }
</script>

<script>
    function Gtotal_pm_net_pf(){
        var sum = 0;
        var x=0;
        $('.pm_net_pf').each(function() {
            x=$(this).text();
            if(x==''){
                x=0;
            }else{
                x=x.replace(/[^\d.-]/g, '');
            }
           
            sum += parseFloat(x);
        });
        sum=Math.round(sum);
       
        $('#Gtotal_pm_net_pf').text(sum.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
    }
</script>


<script>
    function Gtotal_extra_net_pf(){
        var sum = 0;
        var x=0;
        $('.extra_net_pf').each(function() {
            x=$(this).text();
            if(x==''){
                x=0;
            }else{
                x=x.replace(/[^\d.-]/g, '');
            }
           
            sum += parseFloat(x);
        });
        sum=Math.round(sum);
       
        $('#Gtotal_extra_net_pf').text(sum.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
    }
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

