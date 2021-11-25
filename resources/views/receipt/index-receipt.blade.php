@extends('layouts.app')

@section('content')
@section('page-css')
    <link href="{{ asset('css/receipt.css') }}" rel="stylesheet">
@endsection




<div class="container mt-4 wrap">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            <div class="card p-4">

                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-10 "><h3>DAILY RECEIPTS</h3> </div>
                        <div class="col-lg-2 text-right"> </div>
                    </div>
                    <div class="row">
                        
                            <div class="col-lg-10">
                                <form action="{{ route('search-receipt') }}" method="GET">
                                    @csrf
                                    <input type="date" name="search_date" value="{{ $search_date }}"><input type="submit" value="SEARCH">
                                </form>
                            </div>
                           
                            <div class="col-lg-2">
                                <a class="nav-link btn-sm btn btn-primary" href="{{ route('add-receipt') }}">Add Receipt</a>
                            </div>
                       
                    </div>
                   
                </div>

                <div class="card-body ">
                    <table class="table table-bordered table-sm" id="tbl1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>DATE</th>
                                <th>STATION</th>
                                <th>TOTAL SALES</th>
                                <th>TABLE OUT</th>
                                <th id="action">ACTION</th>
                            </tr>
                        </thead>

                        <tbody>
                      @php
                          $ctr=1;
                      @endphp

                      @if (count($rct)<1)
                            <tr>
                                <td colspan="6">No record found.</td>
                            </tr>
                      @endif
                        
                        @foreach ($rct as $rcts)
                            <tr>
                                <td>{{ $ctr }}</td>
                                <td>{{ date('M. d, Y', strtotime($rcts->r_date)) }}</td>
                                <td>{{ $rcts->station }}</td>
                                <td>{{ c($rcts->tot_in) }}</td>
                                <td>{{ c($rcts->tot_out) }}</td>
                               
                                <td>
                                    <a href="{{ url('receipt/'.$rcts->id.'/show') }}" class="sm-btn btn-success btn1">View</a>
                                    @if ($rcts->accepted=='0')
                                    | 
                                        <a href="{{ url('receipt/'.$rcts->id.'/edit') }}" class="sm-btn btn-primary btn1">Edit</a> |
                                        <a href="{{ url('receipt/'.$rcts->id.'/delete') }}" class="sm-btn btn-danger btn1" onclick="return myFunction();">Delete</a>

                                    @else
                                    @endif
                                    
                                </td>
                            </tr>
                        
                        @php
                            $ctr++;
                        @endphp
                        @endforeach
                        </tbody>
                    </table>
                    {!! $rct->links() !!}

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
    function myFunction() {
        if(!confirm("Are You Sure to delete this"))
        event.preventDefault();
    }
</script>


@endsection
