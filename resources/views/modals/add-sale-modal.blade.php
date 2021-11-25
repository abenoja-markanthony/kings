 <!-- EDIT Modal -->
 <div class="modal" id="edit">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header --> 
        <div class="modal-header">
          <h4 class="modal-title">EDIT SALE</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <p><b><i>NOTE: All inputs should be equal to PRE-COLLECTION inputs.</i></b></p>

            <form id="EditSalesDaily" >
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <input type="hidden" id="date_of_salex" name="date_of_sale">
                <input type="hidden" id="id" name="id">
                <input type="hidden" id="tot_in1" name="tot_in">
                <input type="hidden" id="tot_out1" name="tot_out">
                <input type="hidden" id="net_sales1" name="net_sales">
                <input type="hidden" id="station1" name="station">
                <table class="table table-bordered">
                    <tr>
                        <th colspan="2"><input type="text" id="station"  disabled class="form-control text-center" style="font-weight: bolder"></th>
                        <th><input type="text" id="date_of_sale2" disabled  class="form-control text-center" style="font-weight: bolder"></th>
                    </tr>
                     
                    <tr>
                        <th></th>
                        <th>SALES</th> 
                        <th>TABLE OUT</th>    
                    </tr>      

                    <tr>
                        <td>AM</td>
                        <td><input type="text" class="form-control t-right" name="AM_in" id="AM_in" placeholder="0.00" onkeyup="c_format(this)" ></td>
                        <td><input type="text" class="form-control t-right" name="AM_out" id="AM_out" placeholder="0.00" onkeyup="c_format(this)"></td>
                    </tr>

                  
                    <tr>
                        <td>PM</td>
                        <td><input type="text" class="form-control t-right" name="PM_in" id="PM_in" placeholder="0.00" onkeyup="c_format(this)"></td>
                        <td><input type="text" class="form-control t-right" name="PM_out" id="PM_out" placeholder="0.00" onkeyup="c_format(this)"></td>
                    </tr>
                        

                    <tr>
                        <td>EXTRA</td>
                        <td><input type="text" class="form-control t-right" name="EXTRA_in" id="EXTRA_in" placeholder="0.00" onkeyup="c_format(this)"></td>
                        <td><input type="text" class="form-control t-right" name="EXTRA_out" id="EXTRA_out" placeholder="0.00" onkeyup="c_format(this)"></td>
                    </tr>
                </table>

                <div id="message" class="alert alert-danger" role="alert" style="display: none">
                   
                </div>
                <div id="success" class="alert alert-success text-center" role="alert" style="display: none">
                      All inputs are correct. You can now press the update button.
                </div>

                {{-- PRE_SALES DATA --}}
               <input type="text" style="display:none "  id="pre_AM_in"  >
               <input type="text" style="display:none "  id="pre_AM_out"  >
               <input type="text" style="display:none "  id="pre_PM_in"  >
               <input type="text" style="display:none "  id="pre_PM_out"  >
               <input type="text" style="display:none "  id="pre_EXTRA_in"  >
               <input type="text" style="display:none "  id="pre_EXTRA_out"  >

                <div class="row">
                    <div class="col-lg-12 text-right">
                        <input type="submit" value="UPDATE" class="btn btn-primary" id="update_btn" style="display: none">
                        <button id="validate" type="button"  class="btn btn-primary">VALIDATE</button>
                    </div>
                </div>

            </form>
        </div>
        
      </div>
    </div>
  </div>



   <!-- EDIT Modal -->
 <div class="modal" id="presale-edit">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header --> 
        <div class="modal-header">
          <h4 class="modal-title">EDIT SALE</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

            <form id="EditSalesPre" >
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <input type="hidden" id="date_of_salex1" name="date_of_sale">
                <input type="hidden" id="id1" name="id">
                <input type="hidden" id="tot_in11" name="tot_in">
                <input type="hidden" id="tot_out11" name="tot_out">
                <input type="hidden" id="net_sales11" name="net_sales">
                <input type="hidden" id="station11" name="station">
                <table class="table table-bordered">
                    <tr>
                        <th colspan="2"><input type="text" id="stationx"  disabled class="form-control text-center" style="font-weight: bolder"></th>
                        <th><input type="text" id="date_of_sale21" disabled  class="form-control text-center" style="font-weight: bolder"></th>
                    </tr>
                     
                    <tr>
                        <th></th>
                        <th>SALES</th> 
                        <th>TABLE OUT</th>    
                    </tr>      

                    <tr>
                        <td>AM</td>
                        <td><input type="text" class="form-control t-right" name="AM_in" id="AM_in1" placeholder="0.00" onkeyup="c_format(this)" ></td>
                        <td><input type="text" class="form-control t-right" name="AM_out" id="AM_out1" placeholder="0.00" onkeyup="c_format(this)"></td>
                    </tr>

                  
                    <tr>
                        <td>PM</td>
                        <td><input type="text" class="form-control t-right" name="PM_in" id="PM_in1" placeholder="0.00" onkeyup="c_format(this)"></td>
                        <td><input type="text" class="form-control t-right" name="PM_out" id="PM_out1" placeholder="0.00" onkeyup="c_format(this)"></td>
                    </tr>
                        

                    <tr>
                        <td>EXTRA</td>
                        <td><input type="text" class="form-control t-right" name="EXTRA_in" id="EXTRA_in1" placeholder="0.00" onkeyup="c_format(this)"></td>
                        <td><input type="text" class="form-control t-right" name="EXTRA_out" id="EXTRA_out1" placeholder="0.00" onkeyup="c_format(this)"></td>
                    </tr>
                </table>

              

                <div class="row">
                    <div class="col-lg-12 text-right">
                        <input type="submit" value="UPDATE" class="btn btn-primary">
                    </div>
                </div>

            </form>
        </div>
        
      </div>
    </div>
  </div>

