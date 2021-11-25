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

                <div class="card-header"><h3>GENERATE MONTHLY EXPENSES SUMMARY REPORT</h3></div>

                <div class="card-body ">
                    
                    <form action="{{ route('gen-monthly-report4') }}" method="GET">
                        <div class="row">

                   
                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <select class="form-control" name="month">
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
