@extends('layouts.app')

@section('content')
@section('page-css')
    <link href="{{ asset('css/receipt.css') }}" rel="stylesheet">
@endsection



<div class="container mt-4 wrap">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('success'))
                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
            @endif

            @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
            @endif
            <div class="card p-4">

                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12 "><h3>DAILY RECEIPTS </h3> </div>
                        <div class="col-lg-7">
                            <form action="{{ route('search-daily-sales') }}" method="GET">
                                <select  name="month">
                                    <option  selected value="{{ $month }}">{{ strtoupper($month_name) }}</option>
                                    <option disabled></option>
                                    <option value="01">JANUARY</option>
                                    <option value="02">FEBRUARY</option>
                                    <option value="03">MARCH</option>
                                    <option value="04">APRIL</option>
                                    <option value="05">MAY</option>
                                    <option value="06">JUNE</option>
                                    <option value="07">JULY</option>
                                    <option value="08">AUGUST</option>
                                    <option value="09">SEPTEMBER</option>
                                    <option  value="10">OCTOBER</option>
                                    <option  value="11">NOVEMBER</option>
                                    <option  value="12">DECEMBER</option>
                                </select>  
                                <select  name="year">
                                    <option  selected value="{{ $year }}">{{ $year }}</option>
                                    <option disabled></option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                </select>   
                                <input type="submit" value="SEARCH" > 

                            </form>
                        </div>
                     
                        <div class="col-lg-5 text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                ADD SALES
                              </button>
                        </div>
                    </div>
                </div>

                <div class="card-body ">
                    <table class=" table-bordered table condensed table-sm" id="tbl1">
                        <thead>
                            <tr>
                                @if (Auth::user()->access_level=="Admin" OR Auth::user()->access_level=="User 1"  OR Auth::user()->access_level=="User 2")
                                    <th>DATE OF SALE</th>
                                    <th>DAILY SALE</th>
                                @endif
                               
                                @if (Auth::user()->access_level=="Admin" OR Auth::user()->access_level=="User 1"  OR Auth::user()->access_level=="User 3")
                                    <th>PRE-COLLECTION</th>
                                    <th>PRE-COLLECTION REPORT</th>
                                @endif

                                @if (Auth::user()->access_level=="Admin" OR Auth::user()->access_level=="User 1")
                                    <th>DAILY SALES REPORT</th>
                                @endif
                            </tr>
                        </thead>

                        <tbody id="sales_table">

                      @if (count($sales)<1)
                            <tr>
                                <td colspan="6">No record found.</td>
                            </tr>
                      @endif
                        @foreach ($sales as $sale)
                            <tr style="height: 25px">
                                <td>{{ date('M. d, Y', strtotime($sale->date_of_sale)) }}</td>
                                <td>
                                    <a href="{{ url('daily-sales/'.$sale->date_of_sale.'/edit') }}" class="sm-btn btn-success btn1">Update</a>
                                </td>
                            @if (Auth::user()->access_level=="Admin" OR Auth::user()->access_level=="User 1")
                                <td>
                                    <a href="{{ url('daily-pre-sales/'.$sale->date_of_sale.'/edit') }}" class="sm-btn btn-success btn1">Update</a>
                                </td>
                                <td>
                                    <a href="{{ url('daily-pre-sales/'.$sale->date_of_sale.'/report') }}" class="sm-btn btn-success btn1">View</a>
                                </td>
                                <td>
                                    <a href="{{ url('daily-sales-report/'.$sale->date_of_sale) }}" class="sm-btn btn-success btn1">View</a>
                                </td>
                            @endif
                            
                            </tr>
                        
                        @endforeach
                        </tbody>
                    </table>

                </div>



               
            </div>
        </div>
    </div>
</div>








 <!-- The Modal -->
 <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Select date of sale</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form action="{{ route('add-sales-date') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="date" class="form-control" name="date_of_sale">
                    <div class="input-group-append">
                        <input type="submit" value="ADD">
                    </div>
                </div>
            </form>
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
    function myFunction() {
        if(!confirm("Are You Sure to delete this"))
        event.preventDefault();
    }
</script>

<script>
    // $('#tbl1').dataTable( {
    //   "pageLength": 10,
    //   language: {
    //     searchPlaceholder: "MM-DD-YYYY"
    //     }
    // });
</script>


<script type="text/javascript">
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

@endsection
