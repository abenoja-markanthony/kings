
{{-- //MAIN OFFICE --}}
<!-- EXP Modal -->
<div class="modal" id="mo_exp_modal">
    <div class="modal-dialog modal-xl" >
      <div class="modal-content" >
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">EXPENSES</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <table class="table table-bordered table-sm" id="tbl1">
            <thead>
                <tr>
                    <th class="station"></th>
                    <th class="dos"></th>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>EXP. CATEGORY</th>
                    <th>TYPE OF RECEIPT</th>
                    <th>RECEIPT NUMBER</th>
                    <th>TYPE OF EXPENSES</th>
                    <th>AMOUNT</th>
                    <th>REMARKS</th>
                    <th>UPDATED BY</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody id="exp-body">
                @php
                    $sum=0;
                @endphp
            @foreach ($main_office_exp as $exps)
                @php
                    $sum+=$exps->amount;
                @endphp
                    <tr>
                        <td>{{ $exps->exp_cat }}</td>
                        <td>{{ $exps->receipt_type }}</td>
                        <td>{{ $exps->receipt_number }}</td>
                        <td>{{ $exps->type_of_exp }}</td>
                        <td>{{ number_format($exps->amount,2) }}</td>
                        <td>{{ $exps->remarks }}</td>
                        <td>{{ $exps->username }}</td>

                        @if ($exps->accepted=='0')
                        <td>
                            <a href="{{ route('expenses.edit',$exps->id) }}" class="btn2 btn-success btn"  data-toggle="tooltip" title="Update Record"> <i class="fa fa-edit" ></i>  </a> 
                            <form action="{{route('expenses.destroy',$exps->id)}}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn2 btn-danger btn"  data-toggle="tooltip" title="Delete Record" onclick="return myFunction();"> <i class="fa fa-trash" ></i></button>
                            </form> 
                        </td>  
                        @else
                        <td>ACCEPTED</td>
                        @endif
                    </tr>
                @endforeach

                    <tr>
                        <td colspan="4">TOTAL</td>
                        <td class="bg-warning">{{ number_format($sum,2) }}</td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        </div>
    </div>
</div>
{{-- //MAIN OFFICE --}}




{{-- //ARITAO  --}}
<!-- EXP Modal -->
<div class="modal" id="aritao_exp_modal">
    <div class="modal-dialog modal-xl" >
      <div class="modal-content" >
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">EXPENSES</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <table class="table table-bordered table-sm" id="tbl1">
            <thead>
                <tr>
                    <th class="station"></th>
                    <th class="dos"></th>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>EXP. CATEGORY</th>
                    <th>TYPE OF RECEIPT</th>
                    <th>RECEIPT NUMBER</th>
                    <th>TYPE OF EXPENSES</th>
                    <th>AMOUNT</th>
                    <th>REMARKS</th>
                    <th>UPDATED BY</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody id="exp-body">
                @php
                    $sum=0;
                @endphp
            @foreach ($aritao_exp as $exps)
                @php
                    $sum+=$exps->amount;
                @endphp
                    <tr>
                        <td>{{ $exps->exp_cat }}</td>
                        <td>{{ $exps->receipt_type }}</td>
                        <td>{{ $exps->receipt_number }}</td>
                        <td>{{ $exps->type_of_exp }}</td>
                        <td>{{ number_format($exps->amount,2) }}</td>
                        <td>{{ $exps->remarks }}</td>
                        <td>{{ $exps->username }}</td>

                        @if ($exps->accepted=='0')
                        <td>
                            <a href="{{ route('expenses.edit',$exps->id) }}" class="btn2 btn-primary btn"  data-toggle="tooltip" title="Update Record"> <i class="fa fa-edit" ></i>  </a> 
                            <form action="{{route('expenses.destroy',$exps->id)}}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn2 btn-danger btn"  data-toggle="tooltip" title="Delete Record" onclick="return myFunction();"> <i class="fa fa-trash" ></i></button>
                            </form> 
                        </td>   
                        @else
                        <td>ACCEPTED</td>
                        @endif
                    </tr>
                @endforeach

                    <tr>
                        <td colspan="4">TOTAL</td>
                        <td class="bg-warning">{{ number_format($sum,2) }}</td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        </div>
    </div>
</div>
{{-- //ARITAO  --}}



{{-- //AMBAGUIO1  --}}
<!-- EXP Modal -->
<div class="modal" id="ambaguio1_exp_modal">
    <div class="modal-dialog modal-xl" >
      <div class="modal-content" >
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">EXPENSES</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <table class="table table-bordered table-sm" id="tbl1">
            <thead>
                <tr>
                    <th class="station"></th>
                    <th class="dos"></th>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>EXP. CATEGORY</th>
                    <th>TYPE OF RECEIPT</th>
                    <th>RECEIPT NUMBER</th>
                    <th>TYPE OF EXPENSES</th>
                    <th>AMOUNT</th>
                    <th>REMARKS</th>
                    <th>UPDATED BY</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody id="exp-body">
                @php
                    $sum=0;
                @endphp
            @foreach ($ambaguio1_exp as $exps)
                @php
                    $sum+=$exps->amount;
                @endphp
                    <tr>
                        <td>{{ $exps->exp_cat }}</td>
                        <td>{{ $exps->receipt_type }}</td>
                        <td>{{ $exps->receipt_number }}</td>
                        <td>{{ $exps->type_of_exp }}</td>
                        <td>{{ number_format($exps->amount,2) }}</td>
                        <td>{{ $exps->remarks }}</td>
                        <td>{{ $exps->username }}</td>

                        @if ($exps->accepted=='0')
                        <td>
                            <a href="{{ url('expenses/'.$exps->id.'/edit') }}" class="sm-btn btn-primary btn1">Edit</a> |
                            <a href="{{ url('expenses/'.$exps->id.'/delete') }}" class="sm-btn btn-danger btn1" onclick="return myFunction();">Delete</a>
                        </td>  
                        @else
                        <td>ACCEPTED</td>
                        @endif
                    </tr>
                @endforeach

                    <tr>
                        <td colspan="4">TOTAL</td>
                        <td class="bg-warning">{{ number_format($sum,2) }}</td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        </div>
    </div>
</div>
{{-- //AMBAUIO 1 --}}


{{-- //AMBAGUIO2  --}}
<!-- EXP Modal -->
<div class="modal" id="ambaguio2_exp_modal">
    <div class="modal-dialog modal-xl" >
      <div class="modal-content" >
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">EXPENSES</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <table class="table table-bordered table-sm" id="tbl1">
            <thead>
                <tr>
                    <th class="station"></th>
                    <th class="dos"></th>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>EXP. CATEGORY</th>
                    <th>TYPE OF RECEIPT</th>
                    <th>RECEIPT NUMBER</th>
                    <th>TYPE OF EXPENSES</th>
                    <th>AMOUNT</th>
                    <th>REMARKS</th>
                    <th>UPDATED BY</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody id="exp-body">
                @php
                    $sum=0;
                @endphp
            @foreach ($ambaguio2_exp as $exps)
                @php
                    $sum+=$exps->amount;
                @endphp
                    <tr>
                        <td>{{ $exps->exp_cat }}</td>
                        <td>{{ $exps->receipt_type }}</td>
                        <td>{{ $exps->receipt_number }}</td>
                        <td>{{ $exps->type_of_exp }}</td>
                        <td>{{ number_format($exps->amount,2) }}</td>
                        <td>{{ $exps->remarks }}</td>
                        <td>{{ $exps->username }}</td>

                        @if ($exps->accepted=='0')
                        <td>
                            <a href="{{ url('expenses/'.$exps->id.'/edit') }}" class="sm-btn btn-primary btn1">Edit</a> |
                            <a href="{{ url('expenses/'.$exps->id.'/delete') }}" class="sm-btn btn-danger btn1" onclick="return myFunction();">Delete</a>
                        </td>  
                        @else
                        <td>ACCEPTED</td>
                        @endif
                    </tr>
                @endforeach

                    <tr>
                        <td colspan="4">TOTAL</td>
                        <td class="bg-warning">{{ number_format($sum,2) }}</td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        </div>
    </div>
</div>
{{-- //AMBAGUIO 2 --}}



{{-- //BAGABAG  --}}
<!-- EXP Modal -->
<div class="modal" id="bagabag_exp_modal">
    <div class="modal-dialog modal-xl" >
      <div class="modal-content" >
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">EXPENSES</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <table class="table table-bordered table-sm" id="tbl1">
            <thead>
                <tr>
                    <th class="station"></th>
                    <th class="dos"></th>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>EXP. CATEGORY</th>
                    <th>TYPE OF RECEIPT</th>
                    <th>RECEIPT NUMBER</th>
                    <th>TYPE OF EXPENSES</th>
                    <th>AMOUNT</th>
                    <th>REMARKS</th>
                    <th>UPDATED BY</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody id="exp-body">
                @php
                    $sum=0;
                @endphp
            @foreach ($bagabag_exp as $exps)
                @php
                    $sum+=$exps->amount;
                @endphp
                    <tr>
                        <td>{{ $exps->exp_cat }}</td>
                        <td>{{ $exps->receipt_type }}</td>
                        <td>{{ $exps->receipt_number }}</td>
                        <td>{{ $exps->type_of_exp }}</td>
                        <td>{{ number_format($exps->amount,2) }}</td>
                        <td>{{ $exps->remarks }}</td>
                        <td>{{ $exps->username }}</td>

                        @if ($exps->accepted=='0')
                        <td>
                            <a href="{{ url('expenses/'.$exps->id.'/edit') }}" class="sm-btn btn-primary btn1">Edit</a> |
                            <a href="{{ url('expenses/'.$exps->id.'/delete') }}" class="sm-btn btn-danger btn1" onclick="return myFunction();">Delete</a>
                        </td>  
                        @else
                        <td>ACCEPTED</td>
                        @endif
                    </tr>
                @endforeach

                    <tr>
                        <td colspan="4">TOTAL</td>
                        <td class="bg-warning">{{ number_format($sum,2) }}</td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        </div>
    </div>
</div>
{{-- //BAGABAG --}}



{{-- //BAMBANG1  --}}
<!-- EXP Modal -->
<div class="modal" id="bambang1_exp_modal">
    <div class="modal-dialog modal-xl" >
      <div class="modal-content" >
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">EXPENSES</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <table class="table table-bordered table-sm" id="tbl1">
            <thead>
                <tr>
                    <th class="station"></th>
                    <th class="dos"></th>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>EXP. CATEGORY</th>
                    <th>TYPE OF RECEIPT</th>
                    <th>RECEIPT NUMBER</th>
                    <th>TYPE OF EXPENSES</th>
                    <th>AMOUNT</th>
                    <th>REMARKS</th>
                    <th>UPDATED BY</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody id="exp-body">
                @php
                    $sum=0;
                @endphp
            @foreach ($bambang1_exp as $exps)
                @php
                    $sum+=$exps->amount;
                @endphp
                    <tr>
                        <td>{{ $exps->exp_cat }}</td>
                        <td>{{ $exps->receipt_type }}</td>
                        <td>{{ $exps->receipt_number }}</td>
                        <td>{{ $exps->type_of_exp }}</td>
                        <td>{{ number_format($exps->amount,2) }}</td>
                        <td>{{ $exps->remarks }}</td>
                        <td>{{ $exps->username }}</td>

                        @if ($exps->accepted=='0')
                        <td>
                            <a href="{{ url('expenses/'.$exps->id.'/edit') }}" class="sm-btn btn-primary btn1">Edit</a> |
                            <a href="{{ url('expenses/'.$exps->id.'/delete') }}" class="sm-btn btn-danger btn1" onclick="return myFunction();">Delete</a>
                        </td>  
                        @else
                        <td>ACCEPTED</td>
                        @endif
                    </tr>
                @endforeach

                    <tr>
                        <td colspan="4">TOTAL</td>
                        <td class="bg-warning">{{ number_format($sum,2) }}</td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        </div>
    </div>
</div>
{{-- //BAMBANG 1 --}}


{{-- //BAMBANG2  --}}
<!-- EXP Modal -->
<div class="modal" id="bambang2_exp_modal">
    <div class="modal-dialog modal-xl" >
      <div class="modal-content" >
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">EXPENSES</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <table class="table table-bordered table-sm" id="tbl1">
            <thead>
                <tr>
                    <th class="station"></th>
                    <th class="dos"></th>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>EXP. CATEGORY</th>
                    <th>TYPE OF RECEIPT</th>
                    <th>RECEIPT NUMBER</th>
                    <th>TYPE OF EXPENSES</th>
                    <th>AMOUNT</th>
                    <th>REMARKS</th>
                    <th>UPDATED BY</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody id="exp-body">
                @php
                    $sum=0;
                @endphp
            @foreach ($bambang2_exp as $exps)
                @php
                    $sum+=$exps->amount;
                @endphp
                    <tr>
                        <td>{{ $exps->exp_cat }}</td>
                        <td>{{ $exps->receipt_type }}</td>
                        <td>{{ $exps->receipt_number }}</td>
                        <td>{{ $exps->type_of_exp }}</td>
                        <td>{{ number_format($exps->amount,2) }}</td>
                        <td>{{ $exps->remarks }}</td>
                        <td>{{ $exps->username }}</td>

                        @if ($exps->accepted=='0')
                        <td>
                            <a href="{{ url('expenses/'.$exps->id.'/edit') }}" class="sm-btn btn-primary btn1">Edit</a> |
                            <a href="{{ url('expenses/'.$exps->id.'/delete') }}" class="sm-btn btn-danger btn1" onclick="return myFunction();">Delete</a>
                        </td>  
                        @else
                        <td>ACCEPTED</td>
                        @endif
                    </tr>
                @endforeach

                    <tr>
                        <td colspan="4">TOTAL</td>
                        <td class="bg-warning">{{ number_format($sum,2) }}</td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        </div>
    </div>
</div>
{{-- //BAMBANG 2 --}}






{{-- //BAYOMBONG  --}}
<!-- EXP Modal -->
<div class="modal" id="bayombong_exp_modal">
    <div class="modal-dialog modal-xl" >
      <div class="modal-content" >
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">EXPENSES</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <table class="table table-bordered table-sm" id="tbl1">
            <thead>
                <tr>
                    <th class="station"></th>
                    <th class="dos"></th>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>EXP. CATEGORY</th>
                    <th>TYPE OF RECEIPT</th>
                    <th>RECEIPT NUMBER</th>
                    <th>TYPE OF EXPENSES</th>
                    <th>AMOUNT</th>
                    <th>REMARKS</th>
                    <th>UPDATED BY</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody id="exp-body">
                @php
                    $sum=0;
                @endphp
            @foreach ($bayombong_exp as $exps)
                @php
                    $sum+=$exps->amount;
                @endphp
                    <tr>
                        <td>{{ $exps->exp_cat }}</td>
                        <td>{{ $exps->receipt_type }}</td>
                        <td>{{ $exps->receipt_number }}</td>
                        <td>{{ $exps->type_of_exp }}</td>
                        <td>{{ number_format($exps->amount,2) }}</td>
                        <td>{{ $exps->remarks }}</td>
                        <td>{{ $exps->username }}</td>

                        @if ($exps->accepted=='0')
                        <td>
                            <a href="{{ url('expenses/'.$exps->id.'/edit') }}" class="sm-btn btn-primary btn1">Edit</a> |
                            <a href="{{ url('expenses/'.$exps->id.'/delete') }}" class="sm-btn btn-danger btn1" onclick="return myFunction();">Delete</a>
                        </td>  
                        @else
                        <td>ACCEPTED</td>
                        @endif
                    </tr>
                @endforeach

                    <tr>
                        <td colspan="4">TOTAL</td>
                        <td class="bg-warning">{{ number_format($sum,2) }}</td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        </div>
    </div>
</div>
{{-- //BAYOMBONG --}}





{{-- //CASTANEDA  --}}
<!-- EXP Modal -->
<div class="modal" id="castaneda_exp_modal">
    <div class="modal-dialog modal-xl" >
      <div class="modal-content" >
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">EXPENSES</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <table class="table table-bordered table-sm" id="tbl1">
            <thead>
                <tr>
                    <th class="station"></th>
                    <th class="dos"></th>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>EXP. CATEGORY</th>
                    <th>TYPE OF RECEIPT</th>
                    <th>RECEIPT NUMBER</th>
                    <th>TYPE OF EXPENSES</th>
                    <th>AMOUNT</th>
                    <th>REMARKS</th>
                    <th>UPDATED BY</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody id="exp-body">
                @php
                    $sum=0;
                @endphp
            @foreach ($castaneda_exp as $exps)
                @php
                    $sum+=$exps->amount;
                @endphp
                    <tr>
                        <td>{{ $exps->exp_cat }}</td>
                        <td>{{ $exps->receipt_type }}</td>
                        <td>{{ $exps->receipt_number }}</td>
                        <td>{{ $exps->type_of_exp }}</td>
                        <td>{{ number_format($exps->amount,2) }}</td>
                        <td>{{ $exps->remarks }}</td>
                        <td>{{ $exps->username }}</td>

                        @if ($exps->accepted=='0')
                        <td>
                            <a href="{{ url('expenses/'.$exps->id.'/edit') }}" class="sm-btn btn-primary btn1">Edit</a> |
                            <a href="{{ url('expenses/'.$exps->id.'/delete') }}" class="sm-btn btn-danger btn1" onclick="return myFunction();">Delete</a>
                        </td>  
                        @else
                        <td>ACCEPTED</td>
                        @endif
                    </tr>
                @endforeach

                    <tr>
                        <td colspan="4">TOTAL</td>
                        <td class="bg-warning">{{ number_format($sum,2) }}</td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        </div>
    </div>
</div>
{{-- //CASTANEDA --}}



{{-- //DIADI  --}}
<!-- EXP Modal -->
<div class="modal" id="diadi_exp_modal">
    <div class="modal-dialog modal-xl" >
      <div class="modal-content" >
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">EXPENSES</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <table class="table table-bordered table-sm" id="tbl1">
            <thead>
                <tr>
                    <th class="station"></th>
                    <th class="dos"></th>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>EXP. CATEGORY</th>
                    <th>TYPE OF RECEIPT</th>
                    <th>RECEIPT NUMBER</th>
                    <th>TYPE OF EXPENSES</th>
                    <th>AMOUNT</th>
                    <th>REMARKS</th>
                    <th>UPDATED BY</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody id="exp-body">
                @php
                    $sum=0;
                @endphp
            @foreach ($diadi_exp as $exps)
                @php
                    $sum+=$exps->amount;
                @endphp
                    <tr>
                        <td>{{ $exps->exp_cat }}</td>
                        <td>{{ $exps->receipt_type }}</td>
                        <td>{{ $exps->receipt_number }}</td>
                        <td>{{ $exps->type_of_exp }}</td>
                        <td>{{ number_format($exps->amount,2) }}</td>
                        <td>{{ $exps->remarks }}</td>
                        <td>{{ $exps->username }}</td>

                        @if ($exps->accepted=='0')
                        <td>
                            <a href="{{ url('expenses/'.$exps->id.'/edit') }}" class="sm-btn btn-primary btn1">Edit</a> |
                            <a href="{{ url('expenses/'.$exps->id.'/delete') }}" class="sm-btn btn-danger btn1" onclick="return myFunction();">Delete</a>
                        </td>  
                        @else
                        <td>ACCEPTED</td>
                        @endif
                    </tr>
                @endforeach

                    <tr>
                        <td colspan="4">TOTAL</td>
                        <td class="bg-warning">{{ number_format($sum,2) }}</td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        </div>
    </div>
</div>
{{-- //DIADI --}}


{{-- //DUPAX norte 1  --}}
<!-- EXP Modal -->
<div class="modal" id="dupax_norte1_exp_modal">
    <div class="modal-dialog modal-xl" >
      <div class="modal-content" >
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">EXPENSES</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <table class="table table-bordered table-sm" id="tbl1">
            <thead>
                <tr>
                    <th class="station"></th>
                    <th class="dos"></th>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>EXP. CATEGORY</th>
                    <th>TYPE OF RECEIPT</th>
                    <th>RECEIPT NUMBER</th>
                    <th>TYPE OF EXPENSES</th>
                    <th>AMOUNT</th>
                    <th>REMARKS</th>
                    <th>UPDATED BY</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody id="exp-body">
                @php
                    $sum=0;
                @endphp
            @foreach ($dupax_norte1_exp as $exps)
                @php
                    $sum+=$exps->amount;
                @endphp
                    <tr>
                        <td>{{ $exps->exp_cat }}</td>
                        <td>{{ $exps->receipt_type }}</td>
                        <td>{{ $exps->receipt_number }}</td>
                        <td>{{ $exps->type_of_exp }}</td>
                        <td>{{ number_format($exps->amount,2) }}</td>
                        <td>{{ $exps->remarks }}</td>
                        <td>{{ $exps->username }}</td>

                        @if ($exps->accepted=='0')
                        <td>
                            <a href="{{ url('expenses/'.$exps->id.'/edit') }}" class="sm-btn btn-primary btn1">Edit</a> |
                            <a href="{{ url('expenses/'.$exps->id.'/delete') }}" class="sm-btn btn-danger btn1" onclick="return myFunction();">Delete</a>
                        </td>  
                        @else
                        <td>ACCEPTED</td>
                        @endif
                    </tr>
                @endforeach

                    <tr>
                        <td colspan="4">TOTAL</td>
                        <td class="bg-warning">{{ number_format($sum,2) }}</td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        </div>
    </div>
</div>
{{-- //DUPAX NORTE 1 --}}


{{-- //DUPAX norte 2  --}}
<!-- EXP Modal -->
<div class="modal" id="dupax_norte2_exp_modal">
    <div class="modal-dialog modal-xl" >
      <div class="modal-content" >
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">EXPENSES</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <table class="table table-bordered table-sm" id="tbl1">
            <thead>
                <tr>
                    <th class="station"></th>
                    <th class="dos"></th>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>EXP. CATEGORY</th>
                    <th>TYPE OF RECEIPT</th>
                    <th>RECEIPT NUMBER</th>
                    <th>TYPE OF EXPENSES</th>
                    <th>AMOUNT</th>
                    <th>REMARKS</th>
                    <th>UPDATED BY</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody id="exp-body">
                @php
                    $sum=0;
                @endphp
            @foreach ($dupax_norte2_exp as $exps)
                @php
                    $sum+=$exps->amount;
                @endphp
                    <tr>
                        <td>{{ $exps->exp_cat }}</td>
                        <td>{{ $exps->receipt_type }}</td>
                        <td>{{ $exps->receipt_number }}</td>
                        <td>{{ $exps->type_of_exp }}</td>
                        <td>{{ number_format($exps->amount,2) }}</td>
                        <td>{{ $exps->remarks }}</td>
                        <td>{{ $exps->username }}</td>

                        @if ($exps->accepted=='0')
                        <td>
                            <a href="{{ url('expenses/'.$exps->id.'/edit') }}" class="sm-btn btn-primary btn1">Edit</a> |
                            <a href="{{ url('expenses/'.$exps->id.'/delete') }}" class="sm-btn btn-danger btn1" onclick="return myFunction();">Delete</a>
                        </td>  
                        @else
                        <td>ACCEPTED</td>
                        @endif
                    </tr>
                @endforeach

                    <tr>
                        <td colspan="4">TOTAL</td>
                        <td class="bg-warning">{{ number_format($sum,2) }}</td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        </div>
    </div>
</div>
{{-- //DUPAX NORTE 2 --}}





{{-- //DUPAX SUR  --}}
<!-- EXP Modal -->
<div class="modal" id="dupax_sur_exp_modal">
    <div class="modal-dialog modal-xl" >
      <div class="modal-content" >
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">EXPENSES</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <table class="table table-bordered table-sm" id="tbl1">
            <thead>
                <tr>
                    <th class="station"></th>
                    <th class="dos"></th>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>EXP. CATEGORY</th>
                    <th>TYPE OF RECEIPT</th>
                    <th>RECEIPT NUMBER</th>
                    <th>TYPE OF EXPENSES</th>
                    <th>AMOUNT</th>
                    <th>REMARKS</th>
                    <th>UPDATED BY</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody id="exp-body">
                @php
                    $sum=0;
                @endphp
            @foreach ($dupax_sur_exp as $exps)
                @php
                    $sum+=$exps->amount;
                @endphp
                    <tr>
                        <td>{{ $exps->exp_cat }}</td>
                        <td>{{ $exps->receipt_type }}</td>
                        <td>{{ $exps->receipt_number }}</td>
                        <td>{{ $exps->type_of_exp }}</td>
                        <td>{{ number_format($exps->amount,2) }}</td>
                        <td>{{ $exps->remarks }}</td>
                        <td>{{ $exps->username }}</td>

                        @if ($exps->accepted=='0')
                        <td>
                            <a href="{{ url('expenses/'.$exps->id.'/edit') }}" class="sm-btn btn-primary btn1">Edit</a> |
                            <a href="{{ url('expenses/'.$exps->id.'/delete') }}" class="sm-btn btn-danger btn1" onclick="return myFunction();">Delete</a>
                        </td>  
                        @else
                        <td>ACCEPTED</td>
                        @endif
                    </tr>
                @endforeach

                    <tr>
                        <td colspan="4">TOTAL</td>
                        <td class="bg-warning">{{ number_format($sum,2) }}</td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        </div>
    </div>
</div>
{{-- //DUPAX SUR --}}

{{-- //kayapa1  --}}
<!-- EXP Modal -->
<div class="modal" id="kayapa1_exp_modal">
    <div class="modal-dialog modal-xl" >
      <div class="modal-content" >
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">EXPENSES</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <table class="table table-bordered table-sm" id="tbl1">
            <thead>
                <tr>
                    <th class="station"></th>
                    <th class="dos"></th>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>EXP. CATEGORY</th>
                    <th>TYPE OF RECEIPT</th>
                    <th>RECEIPT NUMBER</th>
                    <th>TYPE OF EXPENSES</th>
                    <th>AMOUNT</th>
                    <th>REMARKS</th>
                    <th>UPDATED BY</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody id="exp-body">
                @php
                    $sum=0;
                @endphp
            @foreach ($kayapa1_exp as $exps)
                @php
                    $sum+=$exps->amount;
                @endphp
                    <tr>
                        <td>{{ $exps->exp_cat }}</td>
                        <td>{{ $exps->receipt_type }}</td>
                        <td>{{ $exps->receipt_number }}</td>
                        <td>{{ $exps->type_of_exp }}</td>
                        <td>{{ number_format($exps->amount,2) }}</td>
                        <td>{{ $exps->remarks }}</td>
                        <td>{{ $exps->username }}</td>

                        @if ($exps->accepted=='0')
                        <td>
                            <a href="{{ url('expenses/'.$exps->id.'/edit') }}" class="sm-btn btn-primary btn1">Edit</a> |
                            <a href="{{ url('expenses/'.$exps->id.'/delete') }}" class="sm-btn btn-danger btn1" onclick="return myFunction();">Delete</a>
                        </td>  
                        @else
                        <td>ACCEPTED</td>
                        @endif
                    </tr>
                @endforeach

                    <tr>
                        <td colspan="4">TOTAL</td>
                        <td class="bg-warning">{{ number_format($sum,2) }}</td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        </div>
    </div>
</div>
{{-- //KAYAPA 1--}}


{{-- //kayapa2  --}}
<!-- EXP Modal -->
<div class="modal" id="kayapa2_exp_modal">
    <div class="modal-dialog modal-xl" >
      <div class="modal-content" >
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">EXPENSES</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <table class="table table-bordered table-sm" id="tbl1">
            <thead>
                <tr>
                    <th class="station"></th>
                    <th class="dos"></th>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>EXP. CATEGORY</th>
                    <th>TYPE OF RECEIPT</th>
                    <th>RECEIPT NUMBER</th>
                    <th>TYPE OF EXPENSES</th>
                    <th>AMOUNT</th>
                    <th>REMARKS</th>
                    <th>UPDATED BY</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody id="exp-body">
                @php
                    $sum=0;
                @endphp
            @foreach ($kayapa2_exp as $exps)
                @php
                    $sum+=$exps->amount;
                @endphp
                    <tr>
                        <td>{{ $exps->exp_cat }}</td>
                        <td>{{ $exps->receipt_type }}</td>
                        <td>{{ $exps->receipt_number }}</td>
                        <td>{{ $exps->type_of_exp }}</td>
                        <td>{{ number_format($exps->amount,2) }}</td>
                        <td>{{ $exps->remarks }}</td>
                        <td>{{ $exps->username }}</td>

                        @if ($exps->accepted=='0')
                        <td>
                            <a href="{{ url('expenses/'.$exps->id.'/edit') }}" class="sm-btn btn-primary btn1">Edit</a> |
                            <a href="{{ url('expenses/'.$exps->id.'/delete') }}" class="sm-btn btn-danger btn1" onclick="return myFunction();">Delete</a>
                        </td>  
                        @else
                        <td>ACCEPTED</td>
                        @endif
                    </tr>
                @endforeach

                    <tr>
                        <td colspan="4">TOTAL</td>
                        <td class="bg-warning">{{ number_format($sum,2) }}</td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        </div>
    </div>
</div>
{{-- //KAYAPA 2--}}


{{-- //KASIBU  --}}
<!-- EXP Modal -->
<div class="modal" id="kasibu_exp_modal">
    <div class="modal-dialog modal-xl" >
      <div class="modal-content" >
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">EXPENSES</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <table class="table table-bordered table-sm" id="tbl1">
            <thead>
                <tr>
                    <th class="station"></th>
                    <th class="dos"></th>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>EXP. CATEGORY</th>
                    <th>TYPE OF RECEIPT</th>
                    <th>RECEIPT NUMBER</th>
                    <th>TYPE OF EXPENSES</th>
                    <th>AMOUNT</th>
                    <th>REMARKS</th>
                    <th>UPDATED BY</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody id="exp-body">
                @php
                    $sum=0;
                @endphp
            @foreach ($kasibu_exp as $exps)
                @php
                    $sum+=$exps->amount;
                @endphp
                    <tr>
                        <td>{{ $exps->exp_cat }}</td>
                        <td>{{ $exps->receipt_type }}</td>
                        <td>{{ $exps->receipt_number }}</td>
                        <td>{{ $exps->type_of_exp }}</td>
                        <td>{{ number_format($exps->amount,2) }}</td>
                        <td>{{ $exps->remarks }}</td>
                        <td>{{ $exps->username }}</td>

                        @if ($exps->accepted=='0')
                        <td>
                            <a href="{{ url('expenses/'.$exps->id.'/edit') }}" class="sm-btn btn-primary btn1">Edit</a> |
                            <a href="{{ url('expenses/'.$exps->id.'/delete') }}" class="sm-btn btn-danger btn1" onclick="return myFunction();">Delete</a>
                        </td>  
                        @else
                        <td>ACCEPTED</td>
                        @endif
                    </tr>
                @endforeach

                    <tr>
                        <td colspan="4">TOTAL</td>
                        <td class="bg-warning">{{ number_format($sum,2) }}</td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        </div>
    </div>
</div>
{{-- //KASIBU-}}


{{-- //QUEZON  --}}
<!-- EXP Modal -->
<div class="modal" id="quezon_exp_modal">
    <div class="modal-dialog modal-xl" >
      <div class="modal-content" >
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">EXPENSES</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <table class="table table-bordered table-sm" id="tbl1">
            <thead>
                <tr>
                    <th class="station"></th>
                    <th class="dos"></th>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>EXP. CATEGORY</th>
                    <th>TYPE OF RECEIPT</th>
                    <th>RECEIPT NUMBER</th>
                    <th>TYPE OF EXPENSES</th>
                    <th>AMOUNT</th>
                    <th>REMARKS</th>
                    <th>UPDATED BY</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody id="exp-body">
                @php
                    $sum=0;
                @endphp
            @foreach ($quezon_exp as $exps)
                @php
                    $sum+=$exps->amount;
                @endphp
                    <tr>
                        <td>{{ $exps->exp_cat }}</td>
                        <td>{{ $exps->receipt_type }}</td>
                        <td>{{ $exps->receipt_number }}</td>
                        <td>{{ $exps->type_of_exp }}</td>
                        <td>{{ number_format($exps->amount,2) }}</td>
                        <td>{{ $exps->remarks }}</td>
                        <td>{{ $exps->username }}</td>

                        @if ($exps->accepted=='0')
                        <td>
                            <a href="{{ url('expenses/'.$exps->id.'/edit') }}" class="sm-btn btn-primary btn1">Edit</a> |
                            <a href="{{ url('expenses/'.$exps->id.'/delete') }}" class="sm-btn btn-danger btn1" onclick="return myFunction();">Delete</a>
                        </td>  
                        @else
                        <td>ACCEPTED</td>
                        @endif
                    </tr>
                @endforeach

                    <tr>
                        <td colspan="4">TOTAL</td>
                        <td class="bg-warning">{{ number_format($sum,2) }}</td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        </div>
    </div>
</div>
{{-- //QUEZON--}}


{{-- //SOLANO1  --}}
<!-- EXP Modal -->
<div class="modal" id="solano1_exp_modal">
    <div class="modal-dialog modal-xl" >
      <div class="modal-content" >
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">EXPENSES</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <table class="table table-bordered table-sm" id="tbl1">
            <thead>
                <tr>
                    <th class="station"></th>
                    <th class="dos"></th>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>EXP. CATEGORY</th>
                    <th>TYPE OF RECEIPT</th>
                    <th>RECEIPT NUMBER</th>
                    <th>TYPE OF EXPENSES</th>
                    <th>AMOUNT</th>
                    <th>REMARKS</th>
                    <th>UPDATED BY</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody id="exp-body">
                @php
                    $sum=0;
                @endphp
            @foreach ($solano1_exp as $exps)
                @php
                    $sum+=$exps->amount;
                @endphp
                    <tr>
                        <td>{{ $exps->exp_cat }}</td>
                        <td>{{ $exps->receipt_type }}</td>
                        <td>{{ $exps->receipt_number }}</td>
                        <td>{{ $exps->type_of_exp }}</td>
                        <td>{{ number_format($exps->amount,2) }}</td>
                        <td>{{ $exps->remarks }}</td>
                        <td>{{ $exps->username }}</td>

                        @if ($exps->accepted=='0')
                        <td>
                            <a href="{{ url('expenses/'.$exps->id.'/edit') }}" class="sm-btn btn-primary btn1">Edit</a> |
                            <a href="{{ url('expenses/'.$exps->id.'/delete') }}" class="sm-btn btn-danger btn1" onclick="return myFunction();">Delete</a>
                        </td>  
                        @else
                        <td>ACCEPTED</td>
                        @endif
                    </tr>
                @endforeach

                    <tr>
                        <td colspan="4">TOTAL</td>
                        <td class="bg-warning">{{ number_format($sum,2) }}</td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        </div>
    </div>
</div>
{{-- //SOLANO1--}}

{{-- //SOLANO2  --}}
<!-- EXP Modal -->
<div class="modal" id="solano2_exp_modal">
    <div class="modal-dialog modal-xl" >
      <div class="modal-content" >
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">EXPENSES</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <table class="table table-bordered table-sm" id="tbl1">
            <thead>
                <tr>
                    <th class="station"></th>
                    <th class="dos"></th>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>EXP. CATEGORY</th>
                    <th>TYPE OF RECEIPT</th>
                    <th>RECEIPT NUMBER</th>
                    <th>TYPE OF EXPENSES</th>
                    <th>AMOUNT</th>
                    <th>REMARKS</th>
                    <th>UPDATED BY</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody id="exp-body">
                @php
                    $sum=0;
                @endphp
            @foreach ($solano2_exp as $exps)
                @php
                    $sum+=$exps->amount;
                @endphp
                    <tr>
                        <td>{{ $exps->exp_cat }}</td>
                        <td>{{ $exps->receipt_type }}</td>
                        <td>{{ $exps->receipt_number }}</td>
                        <td>{{ $exps->type_of_exp }}</td>
                        <td>{{ number_format($exps->amount,2) }}</td>
                        <td>{{ $exps->remarks }}</td>
                        <td>{{ $exps->username }}</td>

                        @if ($exps->accepted=='0')
                        <td>
                            <a href="{{ url('expenses/'.$exps->id.'/edit') }}" class="sm-btn btn-primary btn1">Edit</a> |
                            <a href="{{ url('expenses/'.$exps->id.'/delete') }}" class="sm-btn btn-danger btn1" onclick="return myFunction();">Delete</a>
                        </td>  
                        @else
                        <td>ACCEPTED</td>
                        @endif
                    </tr>
                @endforeach

                    <tr>
                        <td colspan="4">TOTAL</td>
                        <td class="bg-warning">{{ number_format($sum,2) }}</td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        </div>
    </div>
</div>
{{-- //SOLANO2--}}


{{-- //STA FE  --}}
<!-- EXP Modal -->
<div class="modal" id="sta_fe_exp_modal">
    <div class="modal-dialog modal-xl" >
      <div class="modal-content" >
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">EXPENSES</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <table class="table table-bordered table-sm" id="tbl1">
            <thead>
                <tr>
                    <th class="station"></th>
                    <th class="dos"></th>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>EXP. CATEGORY</th>
                    <th>TYPE OF RECEIPT</th>
                    <th>RECEIPT NUMBER</th>
                    <th>TYPE OF EXPENSES</th>
                    <th>AMOUNT</th>
                    <th>REMARKS</th>
                    <th>UPDATED BY</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody id="exp-body">
                @php
                    $sum=0;
                @endphp
            @foreach ($sta_fe_exp as $exps)
                @php
                    $sum+=$exps->amount;
                @endphp
                    <tr>
                        <td>{{ $exps->exp_cat }}</td>
                        <td>{{ $exps->receipt_type }}</td>
                        <td>{{ $exps->receipt_number }}</td>
                        <td>{{ $exps->type_of_exp }}</td>
                        <td>{{ number_format($exps->amount,2) }}</td>
                        <td>{{ $exps->remarks }}</td>
                        <td>{{ $exps->username }}</td>

                        @if ($exps->accepted=='0')
                        <td>
                            <a href="{{ url('expenses/'.$exps->id.'/edit') }}" class="sm-btn btn-primary btn1">Edit</a> |
                            <a href="{{ url('expenses/'.$exps->id.'/delete') }}" class="sm-btn btn-danger btn1" onclick="return myFunction();">Delete</a>
                        </td>  
                        @else
                        <td>ACCEPTED</td>
                        @endif
                    </tr>
                @endforeach

                    <tr>
                        <td colspan="4">TOTAL</td>
                        <td class="bg-warning">{{ number_format($sum,2) }}</td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        </div>
    </div>
</div>
{{-- //STA FE--}}

{{-- //VILLAVERDE  --}}
<!-- EXP Modal -->
<div class="modal" id="villaverde_exp_modal">
    <div class="modal-dialog modal-xl" >
      <div class="modal-content" >
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">EXPENSES</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <table class="table table-bordered table-sm" id="tbl1">
            <thead>
                <tr>
                    <th class="station"></th>
                    <th class="dos"></th>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>EXP. CATEGORY</th>
                    <th>TYPE OF RECEIPT</th>
                    <th>RECEIPT NUMBER</th>
                    <th>TYPE OF EXPENSES</th>
                    <th>AMOUNT</th>
                    <th>REMARKS</th>
                    <th>UPDATED BY</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody id="exp-body">
                @php
                    $sum=0;
                @endphp
            @foreach ($villaverde_exp as $exps)
                @php
                    $sum+=$exps->amount;
                @endphp
                    <tr>
                        <td>{{ $exps->exp_cat }}</td>
                        <td>{{ $exps->receipt_type }}</td>
                        <td>{{ $exps->receipt_number }}</td>
                        <td>{{ $exps->type_of_exp }}</td>
                        <td>{{ number_format($exps->amount,2) }}</td>
                        <td>{{ $exps->remarks }}</td>
                        <td>{{ $exps->username }}</td>

                        @if ($exps->accepted=='0')
                        <td>
                            <a href="{{ url('expenses/'.$exps->id.'/edit') }}" class="sm-btn btn-primary btn1">Edit</a> |
                            <a href="{{ url('expenses/'.$exps->id.'/delete') }}" class="sm-btn btn-danger btn1" onclick="return myFunction();">Delete</a>
                        </td>  
                        @else
                        <td>ACCEPTED</td>
                        @endif
                    </tr>
                @endforeach

                    <tr>
                        <td colspan="4">TOTAL</td>
                        <td class="bg-warning">{{ number_format($sum,2) }}</td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        </div>
    </div>
</div>
{{-- //VILLAVERDE--}}



















































































<script>
    function myFunction() {
        if(!confirm("Are You Sure to delete this"))
        event.preventDefault();
    }
</script>
