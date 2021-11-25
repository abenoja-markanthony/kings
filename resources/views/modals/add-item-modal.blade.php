<!-- EXP Modal -->
<div class="modal" id="add_item_modal">
    <div class="modal-dialog" >
      <div class="modal-content"  style="width: 500px">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">ADD ITEM</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form action="{{ route('item.store') }}" method="POST">
                @csrf
                <table class="table table-bordered">
                    
                   <input type="hidden" name="staff_id" value="{{ $staff->id }}">

                   <tr>
                       <td>DATE</td>
                       <td>
                            <input type="date" class="form-control1 text-center" name="date_of_receipt" required>
                       </td>
                   </tr>

                   <tr>
                       <td>ITEM</td>
                       <td> <input type="text" class="form-control1 currency_format1 t-right" name="item"   required></td>
                   </tr>

                   <tr>
                        <td>QTY</td>
                        <td> <input type="number" class="form-control1 currency_format1 t-right" name="qty"   required></td>
                    </tr>


                   <tr>
                       <td>REMARKS</td>
                       <td> <textarea name="remarks" class="form-control1" cols="50" rows="3"  ></textarea></td>
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
