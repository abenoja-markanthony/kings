@extends('layouts.app')

@section('content')
<div class="container mt-4">

    
      
    <div class="row justify-content-center">

       
        <div class="col-md-10">

            <div class="card p-4">

                <div class="card-header"><h3>PERSONAL INFORMATION</h3></div>

                <div class="card-body ">
                    
                 
                        <div class="row">
                            
                            <div class="col-lg-8">
                                <div class="form-group ">
                                    <label for="location">EMPLOYEE NAME</label>
                                    <input type="text"  class="form-control" name="emp_name" value="{{ $emp->emp_name }}" disabled>
                                  </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <label for="location">EMPLOYEE #</label>
                                    <input type="text"  class="form-control" name="emp_number" value="{{ $emp->emp_number }}" disabled>
                                  </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <label for="location">GENDER</label>
                                    <input type="text"  class="form-control" name="gender" value="{{ $emp->gender }}" disabled>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <label for="location">BIRTH DATE</label>
                                    <input type="date" value="{{ $emp->birth_date }}"  class="form-control" name="birth_date" disabled>
                                  </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <label for="location">CONTACT #</label>
                                    <input type="text"  class="form-control" name="contact" value="{{ $emp->contact }}" disabled>
                                  </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group ">
                                    <label for="location">ADDRESS</label>
                                    <input type="text"  class="form-control" name="address" value="{{ $emp->address }}" disabled>
                                  </div>
                            </div>
    
    
                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="location">STATION</label>
                                    <input type="text"  class="form-control" name="station" value="{{ $emp->station }}" disabled>
                                  </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="location">POSITION</label>
                                    <input type="text"  class="form-control" name="position" value="{{ $emp->position }}" disabled>
                                  </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="location">WAGE TYPE</label>
                                    <input type="text"  class="form-control" name="wage_type" value="{{ $emp->wage_type }}" disabled>
                                  </div>
                            </div>


                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <label for="location">RATE</label>
                                    <input type="text" class="form-control" name="rate" value="{{ $emp->rate }}" disabled>
                                  </div>
                            </div>




                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <label for="location">DATE HIRED</label>
                                    <input type="date"  class="form-control" name="date_hired" value="{{ $emp->date_hired }}" disabled>
                                  </div>
                            </div>


                           

                            <div class="col-lg-12 mt-4 text-right">
                                <a href="{{ route('employee.index') }}" class="btn btn-primary">DONE</a>
                            </div>

                        </div>
    
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
