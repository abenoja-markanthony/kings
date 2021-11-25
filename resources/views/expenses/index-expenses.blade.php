@extends('layouts.app')

@section('content')
@section('page-css')
    <link href="{{ asset('css/expenses.css') }}" rel="stylesheet">
@endsection


<div class="container mt-4">
      
    <div class="row justify-content-center">
       
        <div class="col-md-12">
            @if(Session::has('success'))
                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
            @endif
            <div class="card p-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-10 "><h3>EXPENSES</h3> </div>
                        <div class="col-lg-2 text-right"> </div>
                    </div>
                    <div class="row">
                            <div class="col-lg-7">
                                <form action="{{ route('search-expenses') }}" method="GET">
                                    @if ($to)
                                        <input type="date" name="date_from" value="{{ $from }}" required> to  
                                        <input type="date" name="date_to" value="{{ $to }}" required>
                                    @else
                                        <input type="date" name="date_from" value="" required> to  
                                        <input type="date" name="date_to" value="" required>
                                    @endif
                                   
                                    <select name="station" required style="height: 30px">
                                        @if ($station)
                                            <option selected>{{ $station }}</option>
                                            <option disabled>&nbsp</option>
                                            <option>ALL</option>
                                        @else
                                            <option selected>ALL</option>
                                            <option disabled>&nbsp</option>
                                        @endif
                                        <option>MAIN OFFICE</option>
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
                                        <option>SOLANO 1</option>
                                        <option>SOLANO 2</option>
                                        <option>STA. FE</option>
                                        <option>VILLAVERDE</option>
                                    </select>
                                    <input type="submit" value="SEARCH">
                                </form>
                            </div>
                            <div class="col-lg-3">
                                <p>TOTAL: {{ c($exp_sum) }}</p>
                            </div>
                            <div class="col-lg-2">
                                <a class="nav-link btn-sm btn btn-primary" href="{{ route('expenses.create') }}">Add Expenses</a>
                            </div>
                    </div>
                </div>

                <div class="card-body ">
                    <table class="table table-bordered table-sm" id="tbl1">
                        <thead>
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th style="width: 10%">DATE</th>
                                <th>CATEGORY</th>
                                <th  style="width: 150px">LOCATION</th>
                                <th>RECEIPT</th> 
                                <th>RECEIPT #</th>
                                <th>EXPENSE</th>
                                <th>AMOUNT</th>
                                <th>REMARKS</th>
                                <th style="width: 150px">ACTION</th>
                            </tr>
                        </thead>

                        <tbody>
                      
                        @foreach ($exp as $exps)
                            <tr>
                                {{-- <td>{{ $exps->id }}</td> --}}
                                <td  style="width: 10%">{{ date('M. d, Y', strtotime($exps->e_date)) }}</td>
                                <td>{{ $exps->exp_cat }}</td>
                                <td  style="width: 150px">{{ $exps->location }}</td> 
                                <td>{{ $exps->receipt_type }}</td>
                                <td>{{ $exps->receipt_number }}</td>
                                <td>{{ $exps->type_of_exp }}</td>
                                <td>{{ c(a($exps->amount)) }}</td>
                                <td>{{ $exps->remarks }}</td>

                                @if ($exps->accepted=='0' OR ($access_level=='Admin' AND $name='Mark Anthony Abenoja'))
                                <td  style="width: 150px">
      

                                    <a href="{{ route('expenses.show',$exps->id) }}" class="btn2 btn-primary btn"  data-toggle="tooltip" title="View Record"> <i class="fa fa-search"></i>  </a>  
                                    <a href="{{ route('expenses.edit',$exps->id) }}" class="btn2 btn-success btn"  data-toggle="tooltip" title="Update Record"> <i class="fa fa-edit" ></i>  </a> 
                                    <form action="{{route('expenses.destroy',$exps->id)}}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn2 btn-danger btn"  data-toggle="tooltip" title="Delete Record" onclick="return myFunction();"> <i class="fa fa-trash" ></i></button>
                                    </form> 
                                </td>  
                                @else
                                <td>ACCEPTED</td>
                                    
                                @endif
                                
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $exp->links() }} --}}
                </div>
               
            </div>
        </div>
    </div>
</div>
@php
    function c($c){
        if ($c!='') {
           $c=number_format($c,2);
            return $c;
        }else{
            return $c;
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
        if(!confirm("Are you sure you want to delete this record?"))
        event.preventDefault();
    }
</script>

<script>
    $('#tbl1').dataTable( {
      "pageLength": 10
    });
</script>
<script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
</script>

@endsection
