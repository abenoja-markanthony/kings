@extends('layouts.app')

@section('content')
@section('page-css')
    <link href="{{ asset('css/employee.css') }}" rel="stylesheet">
@endsection

<div class="container mt-4">
    
    <div class="row justify-content-center">

        <div class="col-md-12">
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
            @endif
            <div class="card p-4">

                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-10 "><h3>STAFF RECORDS</h3> </div>
                        <div class="col-lg-2 text-right"> <a class="nav-link btn btn-primary" href="{{ route('staff.create') }}">Add Staff</a></div>
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
                                    <a href="{{ route('item.show',$emps->id) }}"  class="btn btn-warning btn1">Item</a> 
                                    <a href="{{ route('staff.show',$emps->id) }}" class="btn btn-success btn1">View</a>
                                    <a href="{{ route('staff.edit',$emps->id) }}" class="btn btn-primary btn1">Edit</a>
                                    <form action="{{route('staff.destroy',$emps->id)}}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn1" onclick="return myFunction();">Delete</button>
                                    </form> 
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
        if(!confirm("Are you sure you want to delete this record?")){
            event.preventDefault();
        }
    }
</script>



<script>
    $('#tbl1').dataTable( {
      "pageLength": 10
    });
</script>


@endsection
