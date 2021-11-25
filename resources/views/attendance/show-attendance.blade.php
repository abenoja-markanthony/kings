@extends('layouts.app')

@section('content')
<div class="container mt-4">

    
      
    <div class="row justify-content-center">

        <div class="col-md-8">
            @if($errors->any())
                <div class  ="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif

            <div class="card p-4">

                <div class="card-header"><h3>EXPENSES</h3></div>
                <div class="card-body ">
                    
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="location">DATE</label>
                                    <input type="date" value="{{ $exp->e_date }}" class="form-control1" name="e_date" required>
                                  </div>
                            </div>
                            <div class="col-lg-6">&nbsp</div>
                               
                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="location">EXPENSE CATEGORY</label>
                                    <input type="text" class="form-control1" name="exp_cat" value="{{ $exp->exp_cat }}" disabled>
                                  </div>
                            </div>
    
    
                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="location">STATION</label>
                                    <input type="text" class="form-control1" name="location" value="{{ $exp->location }}" disabled>
                                  </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="location">RECEIPT TYPE</label>
                                    <input type="text" class="form-control1" name="receipt_type" value="{{ $exp->receipt_type }}" disabled>
                                  </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="location">VOUCHER/OR #</label>
                                    <input type="text" class="form-control1" name="receipt_number" value="{{ $exp->receipt_number }}" disabled>
                                  </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="location">TYPE OF EXPENSE</label>
                                    <input type="text" class="form-control1" name="type_of_exp" value="{{ $exp->type_of_exp }}" disabled>
                                  </div>
                            </div>



                            
                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="location">AMOUNT</label>
                                    <input type="text" class="form-control1" name="amount" value="{{ $exp->amount }}" disabled>
                                  </div>
                            </div>

                            


                            
                            <div class="col-lg-12">
                                <div class="form-group ">
                                    <label for="location">REMARKS</label>
                                    <textarea name="remarks" class="form-control1" cols="30" rows="1" disabled>{{ $exp->remarks }}</textarea>
                                  </div>
                            </div>


                            <div class="mt-4">
                                <a href="{{ route('expenses') }}" class="btn btn-primary">Done</a>
                            </div>


                        </div>
    
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection



@section('javascript')
<script>
    $(document).ready(function(){
        $("#type_of_exp").change(function(){
            if($(this).val()=='RENTAL'){
               $('#month_div').css('display','block');
            }else{
                $('#month_div').css('display','none');
            }
        });
    });
</script>
    
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
