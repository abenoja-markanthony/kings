<!-- EXP Modal -->
<div class="modal" id="cash_in_out_modal">
    <div class="modal-dialog  modal-lg" >
      <div class="modal-content" >
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">CASH IN / CASH OUT</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form action="{{ route('store-addtional-receipt') }}" method="POST">
                @csrf
                <table class="table table-bordered table-sm">
                    
                    <tr>
                        <th>
                            <select class="form-control1" name="station" required>
                                <option selected>MAIN OFFICE</option>
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
                        </th>
                        <th><input type="date" id="date_of_receipt" disabled  class="form-control text-center"></th>
                        <input type="hidden" id="date_of_receipt1" name="date_of_receipt">
                    </tr>
                    <tr>
                        <th>RECEIPT/VOUCHER #</th>
                        <th>CASH IN</th>
                        <th>CASH OUT</th>
                        <th>REMARKS</th>
                        <th>ACTION</th>
                    </tr>
                     

                  
                   <tr>
                        <td><input type="text" class="form-control1 text-center" name="receipt_no" > </td>
                        <td> <input type="text" class="form-control1 currency_format1 t-right" name="cash_in"  value="{{ old('cash_in') }}"  onkeyup="c_format(this)"></td>
                        <td> <input type="text" class="form-control1 currency_format1 t-right" name="cash_out"  value="{{ old('cash_out') }}"  onkeyup="c_format(this)"></td>
                        <td> <textarea name="remarks" class="form-control1" cols="30" rows="1"  value="{{ old('remarks') }}" ></textarea></td>
                        <td> <input type="submit" value="ADD" class="btn btn-primary" ></td>
                   </tr>
                </table>
            </form>



            <table class="table table-bordered table-sm">
                <tr>
                    <th>STATION</th>
                    <th>RECEIPT/VOUCHER #</th>
                    <th>CASH IN</th>
                    <th>CASH OUT</th>
                    <th>REMARKS</th>
                    <th>ACTION</th>
                </tr>

                @foreach ($additional_rec as $addtnl)
                    <tr>
                        <td>{{ $addtnl->station }}</td>
                        <td>{{ $addtnl->receipt_no }}</td>
                        <td>{{ c($addtnl->cash_in) }}</td>
                        <td>{{ c($addtnl->cash_out) }}</td>
                        <td>{{ $addtnl->remarks }}</td>
                        <td><a href="{{ url('addtional-receipt/'.$addtnl->id.'/'.$addtnl->date_of_receipt.'/delete') }}" class="sm-btn btn-danger btn1" onclick="return myFunction();">Delete</a></td>
                    </tr>
                @endforeach
                
                @if ($additional_rec->count()>0)
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="bg-warning">{{ c($sum_additional_in) }}</td>
                        <td class="bg-warning">{{ c($sum_additional_out) }}</td>
                        <td></td>
                    </tr>
                @else
                <tr>
                    <td colspan="5" class="text-center">No record found</td>
                </tr>
                @endif
               
            </table>
        </div>
        
      </div>
    </div>
  </div>


<script>
    function myFunction() {
        if(!confirm("Are You Sure to delete this"))
        event.preventDefault();
    }
</script>
