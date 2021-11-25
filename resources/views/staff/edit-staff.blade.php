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

            <div class="card p-4 mb-4">

                <div class="card-header"><h3>EDIT STAFF</h3></div>

                <div class="card-body ">
                    
                    <form action="{{ url('staff/' . $emp->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            
                            <div class="col-lg-8">
                                <div class="form-group ">
                                    <label for="location">NAME</label>
                                    <input type="text"  class="form-control1" name="emp_name" value="{{ $emp->emp_name }}">
                                  </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <label for="location">STAFF #</label>
                                    <input type="text"  class="form-control1" name="emp_number" value="{{ $emp->emp_number }}">
                                  </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <label for="location">GENDER</label>
                                    <select class="form-control1" name="gender">
                                        <option selected>{{ $emp->gender }}</option>
                                        <option disabled>&nbsp</option>
                                        <option>MALE</option>
                                        <option>FEMALE</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <label for="location">BIRTH DATE</label>
                                    <input type="date" value="{{ $emp->birth_date }}"  class="form-control1" name="birth_date">
                                  </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <label for="location">CONTACT #</label>
                                    <input type="text"  class="form-control1" name="contact" value="{{ $emp->contact }}">
                                  </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group ">
                                    <label for="location">ADDRESS</label>
                                    <input type="text"  class="form-control1" name="address" value="{{ $emp->address }}">
                                  </div>
                            </div>
    
    
                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="location">STATION</label>
                                    <select class="form-control1" name="station">
                                        <option selected>{{ $emp->station }}</option>
                                        <option disabled>&nbsp</option>
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
                                    <select class="form-control1" name="position">
                                        <option selected>{{ $emp->position }}</option>
                                        <option disabled>&nbsp</option>
                                        <option>CASHIER</option>
                                        <option>STAFF</option>
                                    </select>
                                  </div>
                            </div>



                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <label for="location">RATE</label>
                                    <input type="text" class="form-control1" name="rate" value="{{ $emp->rate }}"  onkeyup="c_format(this)">
                                  </div>
                            </div>

                          



                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <label for="location">DATE HIRED</label>
                                    <input type="date"  class="form-control1" name="date_hired" value="{{ $emp->date_hired }}">
                                  </div>
                            </div>


                           

                            <div class="col-lg-12 mt-4 text-left">
                                <input type="submit" value="UPDATE" class="btn btn-primary pl-4 pr-4">
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

