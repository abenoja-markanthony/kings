<!-- EXP Modal -->
<div class="modal" id="exp_modal">
    <div class="modal-dialog" >
      <div class="modal-content"  style="width: 500px">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">ADD EXPENSES</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form action="{{ route('expenses.store') }}" method="POST">
                @csrf
                <table class="table table-bordered">
                    
                    <tr>
                        <th ><input type="text" id="e_station" name="location"   class="form-control text-center"></th>
                        <th><input type="text" id="e_date_of_sale" name="e_date"   class="form-control text-center"></th>
                    </tr>
                     
                    <tr>
                        <td>EXPENSE CATEGORY</td>
                        <td>
                            <select class="form-control1" name="exp_cat" required>
                                <option>STATIONS</option>
                                <option>OM</option>
                                <option>GM</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>TYPE OF EXPENSE</td>
                        <td>
                             <select class="form-control1" id="type_of_exp" name="type_of_exp" required>
                                 <option>BRGY./TIMBRE</option>
                                 <option>CABLE/TELEPHONE</option>
                                 <option>COMIDA</option>
                                 <option>DONATIONS & SPONSORSHIP</option>
                                 <option>ELECTRICITY</option>
                                 <option>GASOLINE</option>
                                 <option>HOUSE RENTAL</option>
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
                        </td>
                    </tr>

                   <tr>
                       <td>RECEIPT TYPE</td>
                       <td>
                            <select class="form-control1 " name="receipt_type" required>
                                <option>VOUCHER</option>
                                <option>OFFICIAL RECEIPT</option>
                            </select>
                       </td>
                   </tr>

                   <tr>
                       <td>RECEIPT/VOUCHER #</td>
                       <td>
                            <input type="text" class="form-control1 text-center" name="receipt_number" >
                       </td>
                   </tr>

                   <tr>
                       <td>AMOUNT</td>
                       <td> <input type="text" class="form-control1 currency_format1 t-right" name="amount"  value="{{ old('amount') }}" required onkeyup="c_format(this)"></td>
                   </tr>

                   <tr>
                       <td>REMARKS</td>
                       <td> <textarea name="remarks" class="form-control1" cols="30" rows="1"  value="{{ old('amount') }}" ></textarea></td>
                   </tr>
                </table>

                <div class="row">
                    <div class="col-lg-12 text-right">
                        <input type="submit" value="ADD" class="btn btn-primary" >
                    </div>
                </div>

            </form>
        </div>
        
      </div>
    </div>
  </div>
