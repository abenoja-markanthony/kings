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

                <div class="card-header"><h3>ADD EMPLOYEE</h3></div>

                <div class="card-body ">
                    
                    <form action="{{ route('employee.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            
                            <div class="col-lg-8">
                                <div class="form-group ">
                                    <label for="location">EMPLOYEE NAME</label>
                                    <input type="text"  class="form-control" name="emp_name" required>
                                  </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <label for="location">EMPLOYEE #</label>
                                    <input type="text"  class="form-control" name="emp_number">
                                  </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <label for="location">GENDER</label>
                                    <select class="form-control" name="gender">
                                        <option>MALE</option>
                                        <option>FEMALE</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <label for="location">BIRTH DATE</label>
                                    <input type="date" value="2000-01-01"  class="form-control" name="birth_date">
                                  </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <label for="location">CONTACT #</label>
                                    <input type="text"  class="form-control" name="contact">
                                  </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group ">
                                    <label for="location">ADDRESS</label>
                                    <input type="text"  class="form-control" name="address">
                                  </div>
                            </div>
    
    
                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="location">STATION</label>
                                    <select class="form-control" name="station">
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
                                        <option>SOLANO</option>
                                        <option>STA. FE</option>
                                        <option>VILLAVERDE</option>
                                    </select>
                                  </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="location">POSITION</label>
                                    <select class="form-control" name="position">
                                        <option>CASHIER</option>
                                        <option>STAFF</option>
                                    </select>
                                  </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="location">WAGE TYPE</label>
                                    <select class="form-control" name="wage_type">
                                        <option>DAILY RATE</option>
                                        <option>FIXED RATE</option>
                                    </select>
                                  </div>
                            </div>


                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <label for="location">RATE</label>
                                    <input type="text" class="form-control" name="rate"  onkeyup="c_format(this)" required>
                                  </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="location">COMMIDA</label>
                                    <input type="text" class="form-control currency_format1 col-lg-8" name="commida"  onkeyup="c_format(this)">
                                  </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="location">TRANSPO ALLOWANCE</label>
                                    <input type="text" class="form-control currency_format1 col-lg-8" name="transpo"  onkeyup="c_format(this)">
                                  </div>
                            </div>




                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <label for="location">DATE HIRED</label>
                                    <input type="date"  class="form-control" name="date_hired">
                                  </div>
                            </div>


                           

                            <div class="col-lg-12 mt-4 text-left">
                                <input type="submit" value="SUBMIT" class="btn btn-primary pl-4 pr-4">
                            </div>

                        </div>
    
                    </form>


                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection


@section('javascript')
    <script>
        function c_format(nField){
            if (/^0/.test(nField.value))
                {
                 nField.value = nField.value.substring(0,1);
                }
            if (Number(nField.value.replace(/,/g,"")))
                {
                 var tmp = nField.value.replace(/,/g,"");
                 tmp = tmp.toString().split('').reverse().join('').replace(/(\d{3})/g,'$1,').split('').reverse().join('').replace(/^,/,'');
                 if (/\./g.test(tmp))
                    {
                     tmp = tmp.split(".");
                     tmp[1] = tmp[1].replace(/\,/g,"").replace(/ /,"");
                     nField.value = tmp[0]+"."+tmp[1]
                    }
                 else   {
                     nField.value = tmp.replace(/ /,"");
                    } 
                }
            else    {
                 nField.value = nField.value.replace(/[^\d\,\.]/g,"").replace(/ /,"");
                }
        }
        </script>

@endsection
