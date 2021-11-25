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
                        <div class="col-lg-10 "><h3>EMPLOYEES</h3> </div>
                        <div class="col-lg-2 text-right"> <a class="nav-link btn btn-primary" href="{{ route('employee.create') }}">Add Employee</a></div>
                    </div>
                   
                </div>

                <div class="card-body ">
                    <table class="table table-bordered table-sm" id="tbl1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>CONTACT #</th>
                                <th>STATION</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>

                        <tbody>
                      
                        @foreach ($emp as $emps)
                            <tr>
                                <td>{{ $emps->id }}</td>
                                <td>{{ $emps->emp_name }}</td>
                                <td>{{ $emps->contact }}</td>
                                <td>{{ $emps->station }}</td>
                                <td>
                                    <a href="{{ url('employee/'.$emps->id.'/show') }}" class="btn btn-primary btn2"  data-toggle="tooltip" title="View Record"> <i class="fa fa-search"></i>  </a>  
                                    <a href="{{ url('employee/'.$emps->id.'/edit') }}" class="btn btn-success btn2"  data-toggle="tooltip" title="Update Record"> <i class="fa fa-edit" ></i>  </a> 
                                    <a href="{{ url('employee/'.$emps->id.'/delete') }}" class="btn btn-danger btn2" onclick="return myFunction();"  data-toggle="tooltip" title="Delete Record"> <i class="fa fa-trash" ></i>  </a>
                                 
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
