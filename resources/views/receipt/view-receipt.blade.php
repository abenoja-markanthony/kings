@extends('layouts.app')

@section('content')
@section('page-css')
    <link href="{{ asset('css/add-receipt.css') }}" rel="stylesheet">
@endsection

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if($errors->any())
                <div class  ="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif

            <div class="card p-4 mb-4">

                

                <div class="card-body ">
                        <div class="row">

                            <div class="form-group col-lg-5">
                                <input type="date"  class="form-control1" name="r_date" value="{{ $rct->r_date }}" disabled>
                            </div>
                            <div class="form-group col-lg-5 ">
                                <input type="text" class=" input1 text-right pr-2" name="station" id="station"  value="{{ $rct->station }}" disabled></td>
                            </div>
                        </div>

                    <div id="draw_div">
                        <div class="text-center"><h5> RECEIPTS </h5></div>
                        
                        <table class=" table-condensed table-bordered tbl1">
                            <thead>
                                <tr>
                                    <th class="th1">DRAW #</th>
                                    <th>SALES</th>
                                    <th>TABLE OUT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>DRAW 1</td>
                                    <td><input type="text" class=" input1 text-right pr-2" name="draw1_in" id="draw1_in" onkeyup="c_format(this)" value="{{ c($rct->draw1_in) }}" disabled></td>
                                    <td><input type="text" class=" input1 text-right pr-2" name="draw1_out" id="draw1_out"  onkeyup="c_format(this)" value="{{ c($rct->draw1_out) }}" disabled></td>
                                </tr>

                                <tr>
                                    <td>DRAW 2</td>
                                    <td><input type="text" class="input1  text-right pr-2" name="draw2_in" id="draw2_in" onkeyup="c_format(this)" value="{{ c($rct->draw2_in) }}" disabled></td>
                                    <td><input type="text" class="input1  text-right pr-2" name="draw2_out" id="draw2_out" onkeyup="c_format(this)" value="{{ c($rct->draw2_out) }}" disabled></td>
                                </tr>

                                <tr>
                                    <td>DRAW 3</td>
                                    <td><input type="text" class="input1  text-right pr-2" name="draw3_in" id="draw3_in" onkeyup="c_format(this)" value="{{ c($rct->draw3_in) }}" disabled></td>
                                    <td><input type="text" class=" input1  text-right pr-2" name="draw3_out" id="draw3_out" onkeyup="c_format(this)" value="{{ c($rct->draw3_out) }}" disabled></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><h6 class="text-right pr-2 text-primary pr-5 mr-3" id="sales_in"></h6></td>
                                    <td><h6 class="text-right pr-2 text-primary  pr-5 mr-3" id="tbl_out"></h6></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                        {{-- <button id="show_add_others" type="button">Add Others</button> --}}
                    <div class="text-center mt-2"><h5> CASH-IN </h5></div>

                    <table class="table-condensed table-bordered tbl1" id="add_others">
                        <thead>
                            <tr>
                                <th class="th1">#</th>
                                <th>REMARKS</th>
                                <th>AMOUNT</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class='add_others'>
                                <td>1</td>
                                <td><input type="text" class="pl-2"  name="cash1_title" value="{{ $rct->cash1_title }}" disabled></td>
                                <td><input type="text" class="input1  text-right pr-2" name="cash1_amt" id="cash1_amt" onkeyup="c_format(this)" value="{{ c($rct->cash1_amt) }}" disabled></td>
                            </tr>
                            <tr class='add_others'>
                                <td>2</td>
                                <td><input type="text"  class="pl-2"  name="cash2_title" value="{{ $rct->cash2_title }}" disabled></td>
                                <td><input type="text" class="input1  text-right pr-2" name="cash2_amt" id="cash2_amt" onkeyup="c_format(this)" value="{{ c($rct->cash2_amt) }}" disabled></td>
                            </tr>
                           
                            <tr class='add_others'>
                                <td>#</td>
                                <td></td>
                                <td><h6 class="text-right pr-2 text-primary pr-5 mr-3" id="tot_cash"></h6></td>
                            </tr>
                        </tbody>
                    </table>
                    

                       

                         {{-- <button id="show_add_others" type="button">Add Others</button> --}}
                    <div class="text-center mt-2"><h5> CASH-OUT </h5></div>

                    <table class="table-condensed table-bordered tbl1" id="add_others">
                        <thead>
                            <tr>
                                <th class="th1">#</th>
                                <th>REMARKS</th>
                                <th>AMOUNT</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class='add_others'>
                                <td>1</td>
                                <td><input type="text"  class="pl-2"  name="add1_title" value="{{ $rct->add1_title }}" disabled></td>
                                <td><input type="text" class="input1  text-right pr-2" name="add1_amt" id="add1_amt" onkeyup="c_format(this)" value="{{ c($rct->add1_amt) }}" disabled></td>
                            </tr>
                            <tr class='add_others'>
                                <td>2</td>
                                <td><input type="text"  class="pl-2"  name="add2_title" value="{{ $rct->add2_title }}" disabled></td>
                                <td><input type="text" class="input1  text-right pr-2" name="add2_amt" id="add2_amt" onkeyup="c_format(this)" value="{{ c($rct->add2_amt) }}" disabled></td>
                            </tr>
                            <tr class='add_others'>
                                <td>3</td>
                                <td><input type="text"  class="pl-2"  name="add3_title" value="{{ $rct->add3_title }}" disabled></td>
                                <td><input type="text" class="input1  text-right pr-2" name="add3_amt" id="add3_amt" onkeyup="c_format(this)" value="{{ c($rct->add3_amt) }}"disabled></td>
                            </tr>
                            <tr class='add_others'>
                                <td>4</td>
                                <td><input type="text"  class="pl-2"  name="add4_title" value="{{ $rct->add4_title }}" disabled></td>
                                <td><input type="text" class="input1  text-right pr-2" name="add4_amt" id="add4_amt" onkeyup="c_format(this)" value="{{ c($rct->add4_amt) }}" disabled></td>
                            </tr>
                            <tr class='add_others'>
                                <td>#</td>
                                <td></td>
                                <td><h6 class="text-right pr-2 text-primary pr-5 mr-3" id="tot_others1"></h6></td>
                            </tr>
                        </tbody>
                    </table>
                        

                        {{-- <div class="row ">
                            <div class="col-lg-12 text-right">
                                <h5 id="subtotal" class="text-primary"></h5>
                            </div>
                        </div>     --}}

                        


                        <div class="col-lg-12 mt-4 text-center">
                           <a href="{{ route('receipt') }}" class="btn btn-primary">DONE</a>
                        </div>

                        <input type="hidden" id="tot_in" name="tot_in">
                        <input type="hidden" id="tot_out" name="tot_out">
                        <input type="hidden" id="tot_others" name="tot_others">

                        
                    </form>
                </div>
               
            </div>
        </div>
    </div>
</div>

@php
    function c($x){
        if ($x!='') {
           $x=number_format($x,2);
            return $x;
        }else{
            return $x;
        }
    }
@endphp

@endsection




@section('javascript')

<script>
    $('.input1').keyup(function(){
        getTotal();
    });
    $(document).ready(function(){
        getTotal();
    });


    function getTotal(){
        if($('#draw1_in').val()!=""){
            var draw1_in = $('#draw1_in').val();
            draw1_in=parseFloat(draw1_in.replace(/[^\d.-]/g, ''));
        }else{
            var draw1_in =0;
        }
        if($('#draw2_in').val()!=""){
            var draw2_in = $('#draw2_in').val();
            draw2_in=parseFloat(draw2_in.replace(/[^\d.-]/g, ''));
        }else{
            var draw2_in =0;
        }
        if($('#draw3_in').val()!=""){
            var draw3_in = $('#draw3_in').val();
            draw3_in=parseFloat(draw3_in.replace(/[^\d.-]/g, ''));
        }else{
            var draw3_in =0;
        }
        if($('#draw1_out').val()!=""){
            var draw1_out = $('#draw1_out').val();
            draw1_out=parseFloat(draw1_out.replace(/[^\d.-]/g, ''));
        }else{
            var draw1_out =0;
        }
        if($('#draw2_out').val()!=""){
            var draw2_out = $('#draw2_out').val();
            draw2_out=parseFloat(draw2_out.replace(/[^\d.-]/g, ''));
        }else{
            var draw2_out =0;
        }
        if($('#draw3_out').val()!=""){
            var draw3_out = $('#draw3_out').val();
            draw3_out=parseFloat(draw3_out.replace(/[^\d.-]/g, ''));
        }else{
            var draw3_out =0;
        }
        if($('#add1_amt').val()!=""){
            var add1_amt = $('#add1_amt').val();
            add1_amt=parseFloat(add1_amt.replace(/[^\d.-]/g, ''));
        }else{
            var add1_amt =0;
        }
        if($('#add2_amt').val()!=""){
            var add2_amt = $('#add2_amt').val();
            add2_amt=parseFloat(add2_amt.replace(/[^\d.-]/g, ''));
        }else{
            var add2_amt =0;
        }
        if($('#add3_amt').val()!=""){
            var add3_amt = $('#add3_amt').val();
            add3_amt=parseFloat(add3_amt.replace(/[^\d.-]/g, ''));
        }else{
            var add3_amt =0;
        }
        if($('#add4_amt').val()!=""){
            var add4_amt = $('#add4_amt').val();
            add4_amt=parseFloat(add4_amt.replace(/[^\d.-]/g, ''));
        }else{
            var add4_amt =0;
        }
        if($('#cash1_amt').val()!=""){
            var cash1_amt = $('#cash1_amt').val();
            cash1_amt=parseFloat(cash1_amt.replace(/[^\d.-]/g, ''));
        }else{
            var cash1_amt =0;
        }
        if($('#cash2_amt').val()!=""){
            var cash2_amt = $('#cash2_amt').val();
            cash2_amt=parseFloat(cash2_amt.replace(/[^\d.-]/g, ''));
        }else{
            var cash2_amt =0;
        }
        var subtotal=draw1_in+draw2_in+draw3_in+cash1_amt+cash2_amt-draw1_out-draw2_out-draw3_out-add1_amt-add2_amt-add3_amt-add4_amt;
        var tot_in=draw1_in+draw2_in+draw3_in;
        var tot_out=draw1_out+draw2_out+draw3_out;
        var tot_cash=cash1_amt+cash2_amt;
        var tot_others=add1_amt+add2_amt+add3_amt+add4_amt
        $("#tot_cash").text(tot_cash.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
        $("#sales_in").text(tot_in.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
        $("#tbl_out").text(tot_out.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
        $("#tot_in").val(tot_in.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
        $("#tot_out").val(tot_out.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
        $("#tot_others").val(tot_others.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
        $("#tot_others1").text(tot_others.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
        $("#subtotal").text(
            tot_in.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString()+"-"+
            tot_out.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString()+"+"+
            tot_cash.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString()+"-"+
            tot_others.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString()+"="+
            subtotal.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString()
            
            );
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


<script>
    $("#show_add_others").click(function(){
        $('#add_others').css('display','block');
        $(this).css('display','none');
    });
</script>

<script>
     $("#station").change(function(){
         if($(this).val()=='MAIN OFFICE'){
             $('#draw_div').css('display','none');
         }else{
            $('#draw_div').css('display','block');
         }
    });
</script>



@endsection
