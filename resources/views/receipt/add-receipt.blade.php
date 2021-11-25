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
                   
                    <form action="{{ route('store-receipt') }}" method="POST">
                        @csrf
                        {{-- <h4 class="page-header">CBB: {{ number_format($coh->cashonhand,2) }}</h4> --}}
                       
                        <div class="row">

                            <div class="form-group col-lg-5">
                                <input type="date"  class="form-control1" name="r_date" value="{{ old('r_date', date('Y-m-d')) }}" required>
                            </div>
                            <div class="form-group col-lg-5 ">
                                    <select class="form-control1" name="station" id="station" required >
                                        @if(old('station', null) != null)
                                        <option>{{ old('station') }}</option>
                                        <option disabled>&nbsp;</option>
                                            
                                        @endif
                                        <option>ARITAO</option>
                                        <option>AMBAGUIO 1</option>
                                        <option>AMBAGUIO 2</option>
                                        <option>BAGABAG</option>
                                        <option>BAMBANG 1</option>
                                        <option>BAMBANG 2</option>
                                        <option>BAYOMBONG</option>
                                        <option>CASTANEDA</option>
                                        <option>DIADI</option>
                                        <option>DUPAX NORTE 1</option>
                                        <option>DUPAX NORTE 2</option>
                                        <option>DUPAX SUR</option>
                                        <option>KAYAPA 1</option>
                                        <option>KAYAPA 2</option>
                                        <option>KASIBU</option>
                                        <option>QUEZON</option>
                                        <option>SOLANO</option>
                                        <option>STA. FE</option>
                                        <option>VILLAVERDE</option>
                                        <option>MAIN OFFICE</option>
                                    </select>
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
                                    <td><input type="text" class=" input1 text-right" name="draw1_in" id="draw1_in" onkeyup="c_format(this)" value="{{ old('draw1_in') }}" ></td>
                                    <td><input type="text" class=" input1 text-right" name="draw1_out" id="draw1_out"  onkeyup="c_format(this)" value="{{ old('draw1_out') }}" ></td>
                                </tr>

                                <tr>
                                    <td>DRAW 2</td>
                                    <td><input type="text" class="input1  text-right" name="draw2_in" id="draw2_in" onkeyup="c_format(this)" value="{{ old('draw2_in') }}"></td>
                                    <td><input type="text" class="input1  text-right" name="draw2_out" id="draw2_out" onkeyup="c_format(this)" value="{{ old('draw2_out') }}"></td>
                                </tr>

                                <tr>
                                    <td>DRAW 3</td>
                                    <td><input type="text" class="input1  text-right" name="draw3_in" id="draw3_in" onkeyup="c_format(this)" value="{{ old('draw3_in') }}"></td>
                                    <td><input type="text" class=" input1  text-right" name="draw3_out" id="draw3_out" onkeyup="c_format(this)" value="{{ old('draw3_out') }}"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><h6 class="text-right text-primary pr-5 mr-3" id="sales_in"></h6></td>
                                    <td><h6 class="text-right text-primary  pr-5 mr-3" id="tbl_out"></h6></td>
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
                                <td><input type="text"  name="cash1_title" value="{{ old('cash1_title') }}"></td>
                                <td><input type="text" class="input1  text-right" name="cash1_amt" id="cash1_amt" onkeyup="c_format(this)" value="{{ old('cash1_amt') }}"></td>
                            </tr>
                            <tr class='add_others'>
                                <td>2</td>
                                <td><input type="text"  name="cash2_title" value="{{ old('cash2_title') }}"></td>
                                <td><input type="text" class="input1  text-right" name="cash2_amt" id="cash2_amt" onkeyup="c_format(this)" value="{{ old('cash2_amt') }}"></td>
                            </tr>
                           
                            <tr class='add_others'>
                                <td>#</td>
                                <td></td>
                                <td><h6 class="text-right text-primary pr-5 mr-3" id="tot_cash"></h6></td>
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
                                <td><input type="text"  name="add1_title" value="{{ old('add1_title') }}"></td>
                                <td><input type="text" class="input1  text-right" name="add1_amt" id="add1_amt" onkeyup="c_format(this)" value="{{ old('add1_amt') }}"></td>
                            </tr>
                            <tr class='add_others'>
                                <td>2</td>
                                <td><input type="text"  name="add2_title" value="{{ old('add2_title') }}"></td>
                                <td><input type="text" class="input1  text-right" name="add2_amt" id="add2_amt" onkeyup="c_format(this)" value="{{ old('add2_amt') }}"></td>
                            </tr>
                            <tr class='add_others'>
                                <td>3</td>
                                <td><input type="text"  name="add3_title" value="{{ old('add3_title') }}"></td>
                                <td><input type="text" class="input1  text-right" name="add3_amt" id="add3_amt" onkeyup="c_format(this)" value="{{ old('add3_amt') }}"></td>
                            </tr>
                            <tr class='add_others'>
                                <td>4</td>
                                <td><input type="text"  name="add4_title" value="{{ old('add4_title') }}"></td>
                                <td><input type="text" class="input1  text-right" name="add4_amt" id="add4_amt" onkeyup="c_format(this)" value="{{ old('add4_amt') }}"></td>
                            </tr>
                            <tr class='add_others'>
                                <td>#</td>
                                <td></td>
                                <td><h6 class="text-right text-primary pr-5 mr-3" id="tot_others1"></h6></td>
                            </tr>
                        </tbody>
                    </table>
                        

                        {{-- <div class="row ">
                            <div class="col-lg-12 text-right">
                                <h5 id="subtotal" class="text-primary"></h5>
                            </div>
                        </div>     --}}

                        


                        <div class="col-lg-12 mt-4 text-center">
                           <p> <i>Kindly double-check all the inputs before saving.Thank you.</i></p>
                            <input type="submit" value="SUBMIT" class="btn btn-primary pl-4 pr-4 mt-1">
                        </div>

                        <input type="hidden" id="tot_in" name="tot_in">
                        <input type="hidden" id="tot_out" name="tot_out">
                        <input type="hidden" id="tot_others" name="tot_others">
                        <input type="hidden" id="tot_cashin" name="tot_cashin">

                        
                    </form>
                </div>
               
            </div>
        </div>
    </div>
</div>


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
        $("#tot_cashin").val(tot_cash.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
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
