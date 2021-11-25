@extends('layouts.app')

@section('content') 
@section('page-css')
    <link href="{{ asset('css/receipt.css') }}" rel="stylesheet">
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

                {{-- INPUTS --}}
                <input type="hidden" id="from" value="{{ $from }}">
                <input type="hidden" id="to" value="{{ $to }}">

                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-9 "><h3>PAYROLL PERIOD </h3> <p>{{ date('M. d, Y', strtotime($from)) }} ~  {{ date('M. d, Y', strtotime($to)) }}</p></div>

                        <div class="col-lg-3">
                            <label for="">STATION:</label>
                            <select id="station" class="form-control" required>
                                @if (isset($station))
                                    <option selected>{{ $station }}</option>
                                    <option disabled>&nbsp</option>
                                    <option>ALL</option>
                                @else
                                    <option selected>ALL</option>
                                    <option disabled>&nbsp</option>
                                @endif
                                @foreach ($sttn as $sta)
                                    <option>{{ $sta->station_dd }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                                  
                    </div>

                </div>

                {{-- ACCEPTED --}}
                @php
                    $accepted=0;
                @endphp


                <div class="card-body ">
                    <table class=" table-bordered table condensed table-sm" id="tbl1">
                        <thead>
                            <tr>
                                @if (Auth::user()->access_level=="Admin" OR Auth::user()->access_level=="User 1"  OR Auth::user()->access_level=="User 2")
                                    <th style="display: none">ID</th>
                                    <th>EMPLOYEE NAME</th>
                                    <th>STATION</th>
                                    <th>POSITION</th>
                                    <th style="width:20px">RATE</th>
                                    <th style="width:20px">DAYS</th>
                                    <th style="width:20px">ABSENT</th>
                                    <th style="width:20px">-ADJUSTMENTS</th>
                                    <th >TOTAL</th>
                                    <th>ACTIONS</th>
                                @endif
                               
                            </tr>
                        </thead>

                        <tbody id="sales_table">

                      @if (count($pay)<1)
                            <tr>
                                <td colspan="6">No record found.</td>
                            </tr>
                      @endif
                      @php
                          $days=0;
                          $rate=0;
                          $absent=0;
                          $adjustment=0;
                      @endphp
                        @foreach ($pay as $pays)
                        @php
                            $accepted=$pays->accepted;
                        @endphp
                            
                            <tr style="height: 25px">
                                <td  style="display: none">{{ $pays->id }}</td>
                                <td>{{ $pays->emp_name }}</td>
                                <td>{{ $pays->station }}</td>
                                <td>{{ $pays->position }}</td>
                                <td><input type="text" class="text-center" value="{{ c($pays->rate) }}"></td>
                                <td><input type="number" class="text-center"  value="{{ c($pays->days) }}"></td>
                                <td><input type="number" class="text-center"  value="{{ c($pays->absent) }}"></td>
                                <td><input type="number" class="text-center"  value="{{ c($pays->adjustment) }}"></td>
                                <td class="total">{{ c(($pays->days-$pays->absent)*$pays->rate-$pays->adjustment)  }}</td>
                                <td>
                                    <button class="edit_btn  btn1 btn-primary">Update</button>
                                </td>
                            </tr>
                        
                        @endforeach

                        <tr>
                            <td colspan="6">Total</td>
                            <td id="g_total"></td>
                        </tr>
                        </tbody>
                    </table>



                    
                 

        @if ($accepted=='0')
            <form action="{{ route('accept-payroll') }}" method="POST">
                @csrf
            
                        <input type="hidden" name="from" value="{{ $from }}">
                        <input type="hidden" name="to" value="{{ $to }}">
    
                        <div class="col-lg-12 mt-4 text-center">
                            <p> <i>Kindly double-check all the data before accepting.Thank you.</i></p>
                            <input type="submit" value="ACCEPT" class="btn btn-primary pl-4 pr-4 mt-1">
                        </div>

            </form>

        @else
        <div class="col-lg-12 mt-4 text-center">
            <p style="color:green"> <i><i class="fa fa-check"></i> Accepted.</i></p>
        </div>
        @endif        




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
    $('.edit_btn').click(function(){
            $tr=$(this).closest('tr');
            var data= $tr.children("td").map(function(){
                return $(this).text();
            }).get();
            console.log(data);
            var id=data[0];
            var rate = $(this).closest('td').prev().prev().prev().prev().prev().find('input').val();
            var days = $(this).closest('td').prev().prev().prev().prev().find('input').val();
            var absent = $(this).closest('td').prev().prev().prev().find('input').val();
            var adjustment = $(this).closest('td').prev().prev().find('input').val();


            if(rate==''){
                alert('Rate is empty.');
            }else{
                if(days==''){
                    days=0;
                }
                if(absent==''){
                    absent=0;
                }
                var baseUrl = '/payroll/update/'+id+'/'+rate+'/'+days+'/'+absent+'/'+adjustment;
                // alert(baseUrl);
                window.location = baseUrl;

            }
           

           

            // $('#EditSales').attr('action','/daily-sales1/'+data[11]);
            // $('#EditSalesDaily').attr('action',baseUrl);
            // $('#EditSalesDaily').attr('method','POST');
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

<script>
    $("#station").change(function(){
        var station=$("#station").val();
        var from=$("#from").val();
        var to=$("#to").val();
        var baseUrl = '/payroll/'+from+'/'+to+'/'+station;
            window.location = baseUrl; 
    });
</script>


<script>
    var $rows = $('#sales_table tr');
    $('#search').change(function() {
        
        var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
        reg = RegExp(val, 'i'),
        text;

        
        $rows.show().filter(function() {

            text = $(this).text().replace(/\s+/g, ' ');
            return !reg.test(text);
            
        }).hide();
        ref();
    });
</script>


<script>
    var sum = 0;
    $(document).ready(function(){
        $('#tbl1 .total').each(function () {
        var x=this.innerText.replace(/[^\d.-]/g, '');

            sum += parseInt(x);

        });
        $("#g_total").text(parseFloat(sum, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    });

</script>
@endsection
