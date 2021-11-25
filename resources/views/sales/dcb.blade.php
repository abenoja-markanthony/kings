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
                        <div class="col-lg-4 "><h3>DAILY INPUTS</h3> </div>
                        <div class="col-lg-5">
                            <form action="{{ route('search-dcb') }}" method="GET">
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
                        <div class="col-lg-3 "><input type="text" id="search" class="form-control1" placeholder="Search..."></div>
                        
                    </div>
                </div>

                <div class="card-body ">
                    <table class="table table-bordered table-sm" id="tbl1">
                        <thead>
                            <tr>
                                <th>DATE OF ENCODE</th>
                                <th>DCB</th>
                            </tr>
                        </thead>

                        <tbody id="sales_table">

                      @if (count($sales)<1)
                            <tr>
                                <td colspan="6">No record found.</td>
                            </tr>
                      @endif
                        @foreach ($sales as $sale)
                            <tr>
                                <td>{{ date('F d, Y', strtotime($sale->date_encoded)) }}</td>
                             
                                <td>
                                    <a href="{{ url('daily-cash-acceptance/'.$sale->date_encoded.'/accept') }}" class="sm-btn btn-success btn1">REVIEW</a>
                                </td>
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
                    <input type="date" class="form-control" name="date_encoded">
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



<script type="text/javascript">
    var $rows = $('#sales_table tr');
    $('#search').keyup(function() {
        
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
