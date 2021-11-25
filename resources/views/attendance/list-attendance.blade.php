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
                    @php
                        $ctr=0;
                        $emp='';

                        foreach ($pay as $pays) {
                            if ($pays->id==$emp) {
                                $ctr++;
                            }else{
                                $emp='';
                            }
                            $emp=$pays->id;
                           echo $emp;

                        }
                    @endphp
                    <h1>{{ $ctr }}</h1>

                </div>
               
            </div>
        </div>
    </div>
</div>

@endsection
