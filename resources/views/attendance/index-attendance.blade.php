@extends('layouts.app')

@section('content')
<div class="container mt-4">

    
      
    <div class="row justify-content-center">

       
        <div class="col-md-10">

            @if($errors->any())
                <div class  ="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif 
                
            <div class="card p-4">

                <div class="card-header"><h3>REPORTS</h3></div>

                <div class="card-body ">
                    
                    <form action="{{ route('attendance.report') }}" method="GET">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <input type="date" class="form-control" name="from">
                                </div>
                            </div>


                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <input type="date" class="form-control" name="to">
                                </div>
                            </div>

                           

                            <div class="col-lg-4 text-left">
                                <input type="submit" value="GENERATE" class="btn btn-primary pl-4 pr-4">
                            </div>

                        </div>
    
                    </form>
                </div>
               
            </div>
        </div>
    </div>
</div>

@endsection
