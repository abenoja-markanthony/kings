@extends('layouts.app')

@section('content')
<div class="container mt-4">

    
      
    <div class="row justify-content-center">

       
        <div class="col-md-10">

            @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
            @endif
                
            <div class="card p-4">

                <div class="card-header"><h3>AUDIT REPORTS</h3></div>

                <div class="card-body ">
                    
                    <form action="{{ route('audit-report') }}" method="GET">
                        {{-- <form action="{{ route('gen-monthly-report1') }}" method="GET"> --}}
                        <div class="row">

                   
                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <select class="form-control" name="month">
                                        <option value="{{ date('m') }}">{{ strtoupper( date('F')) }}</option>
                                        <option disabled><hr></option>
                                        <option value="01">JANUARY</option>
                                        <option value="02">FEBRUARY</option>
                                        <option value="03">MARCH</option>
                                        <option value="04">APRIL</option>
                                        <option value="05">MAY</option>
                                        <option value="06">JUNE</option>
                                        <option value="07">JULY</option>
                                        <option value="08">AUGUST</option>
                                        <option value="09">SEPTEMBER</option>
                                        <option value="10">OCTOBER</option>
                                        <option value="11">NOVEMBER</option>
                                        <option value="12">DECEMBER</option>
                                    </select>
                                  </div>
                            </div>


                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <select class="form-control" name="year">
                                        <option value="{{ date('Y') }}">{{ date('Y') }}</option>
                                        <option disabled><hr></option>
                                        <option>2020</option>
                                        <option>2021</option>
                                        <option>2022</option>
                                        <option>2023</option>
                                        <option>2024</option>
                                        <option>2025</option>
                                        <option>2026</option>
                                    </select>
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
