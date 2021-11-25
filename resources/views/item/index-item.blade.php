@extends('layouts.app')

@section('content')
@section('page-css')
    <link href="{{ asset('css/employee.css') }}" rel="stylesheet">
@endsection

<div class="container mt-4">
    
    <div class="row justify-content-center">

        <div class="col-md-12">
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            <div class="card p-4">

                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-10 "><h3>ITEM RECORDS</h3> </div>
                        <div class="col-lg-2 text-right"><button class="btn btn-sm btn-primary" id="addModal">Add Item</button></div>
                    </div>
                   
                </div>

                <div class="card-body ">
                    <table class="table table-bordered table-sm" id="tbl1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>STATION</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>

                        <tbody>
                      
                        @foreach ($emp as $emps)
                            <tr>
                                <td>{{ $emps->id }}</td>
                                <td>{{ $emps->emp_name }}</td>
                                <td>{{ $emps->station }}</td>
                                <td>
                                    <a href="{{ url('staff/'.$emps->id.'/show') }}" class="btn btn-info btn1">View</a> | 
                                    <a href="{{ url('staff/'.$emps->id.'/edit') }}" class="btn btn-primary btn1">Edit</a> |  
                                    <a href="{{ url('staff/'.$emps->id.'/delete') }}" class="btn btn-danger btn1" onclick="return myFunction();">Delete</a>


                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $emp->links() !!}

                </div>
               
            </div>
        </div>
    </div>
</div>

{{-- MODALS --}}
@include('modals.add-item-modal')



@endsection




@section('javascript')

<script>
    function myFunction() {
        if(!confirm("Are You Sure to delete this"))
        event.preventDefault();
    }
</script>

<script>
    $('#tbl1').dataTable( {
      "pageLength": 10
    });
</script>

<script>
    $("#addModal").click(function(){
        alert('ds');
    });
</script>





@endsection
