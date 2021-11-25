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

            @if(Session::has('error'))
                <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
            @endif

            @if(Session::has('success'))
                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
            @endif

            <div class="card p-4">

                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-9">
                            <h3>ADD EXPENSES</h3>
                        </div>
    
                        <div class="col-lg-3">
                            <a href="/expenses" class="btn btn-primary">EXPENSES RECORDS</a>
                        </div>
                    </div>
                </div>

                <div class="card-body ">
                    
                    <form action="{{ route('expenses.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="location">DATE</label>
                                    <input type="date" value="{{  date('Y-m-d') }}" class="form-control1" name="e_date" value="{{ old('e_date', date('Y-m-d')) }}" required>
                                  </div>
                            </div>
                            <div class="col-lg-6">&nbsp</div>

                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="location">EXPENSE CATEGORY</label>
                                    <select class="form-control1" name="exp_cat" required>
                                        <option>STATIONS</option>
                                        <option>OM</option>
                                        <option>GM</option>
                                    </select>
                                  </div>
                            </div>
    
    
                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="location">STATION</label>
                                    <select class="form-control1" name="location" required>
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
                                        <option>SOLANO 1</option>
                                        <option>SOLANO 2</option>
                                        <option>STA. FE</option>
                                        <option>VILLAVERDE</option>
                                    </select>
                                  </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="location">RECEIPT TYPE</label>
                                    <select class="form-control1" name="receipt_type" required>
                                        <option>VOUCHER</option>
                                        <option>OFFICIAL RECEIPT</option>
                                    </select>
                                  </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="location">RECEIPT #</label>
                                    <input type="text" class="form-control1" name="receipt_number" required>
                                  </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="location">TYPE OF EXPENSE</label>
                                    <select class="form-control1" id="type_of_exp" name="type_of_exp" required>
                                        <option>BRGY./TIMBRE</option>
                                        <option>CABLE/TELEPHONE</option>
                                        <option>COMIDA</option>
                                        <option>DONATIONS & SPONSORSHIP</option>
                                        <option>ELECTRICITY</option>
                                        <option>FLEXIBLE FUND</option>
                                        <option>GASOLINE</option>
                                        <option>HOUSE RENTAL</option>
                                        <option>LOAN</option>
                                        <option>LPG</option>
                                        <option>MEALS</option>
                                        <option>MEDICINE</option>
                                        <option>MISCELLANEOUS</option>
                                        <option>PAGIBIG</option>
                                        <option>PCSO DAILY REMITTANCE</option>
                                        <option>PHILHEALTH</option>
                                        <option>POR LATA</option>
                                        <option>REPAIRS & MAINTENANCE</option>
                                        <option>REPRESENTATION</option>
                                        <option>SALARIES</option>
                                        <option>SSS</option>
                                        <option>SUPPLIES-STATION</option>
                                        <option>SUPPLIES-MAIN OFFICE</option>
                                        <option>TAXES-BIR</option>
                                        <option>TAXES-PCSO</option>
                                        <option>TRANS/VACATION ALLOWANCE</option>
                                        <option>TRAVELLING</option>
                                        <option>VEHICLE RENTAL</option>
                                        <option>WATER-DRINKING</option>
                                        <option>WATER BILL</option>
                                        {{-- FOR IAN ONLY --}}
                                        @if (Auth::user()->access_level=="Admin" OR Auth::user()->access_level=="User 1")
                                            <option>NATIONAL</option>
                                            <option>LOCAL</option>
                                            <option>MANAGEMENT</option>
                                            <option>TICKET</option>      
                                        @endif
                                        <option>OTHERS...</option>
                                        {{-- FOR IAN ONLY --}}
                                        {{-- NOTE --}}
                                        {{-- EXPENSES REPORT FOR OM GM SEPARATE --}}
                                    </select>
                                  </div>
                            </div>

                            <div class="col-lg-6" id="month_div" style="display:none">
                                <div class="form-group ">
                                    <label for="location">MONTH</label>
                                    <select class="form-control1" id="type_of_exp" name="rental month" required>
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


                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="location">AMOUNT</label>
                                    <input type="text" class="form-control1 " name="amount"  value="{{ old('amount') }}" required onkeyup="c_format(this)">
                                  </div>
                            </div>


                            
                            <div class="col-lg-12">
                                <div class="form-group ">
                                    <label for="location">REMARKS</label>
                                    <textarea name="remarks" class="form-control1" cols="30" rows="1"  value="{{ old('amount') }}" ></textarea>
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
