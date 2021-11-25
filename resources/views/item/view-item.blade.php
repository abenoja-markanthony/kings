@extends('layouts.app')

@section('content')
<div class="container mt-4">

    
      
    <div class="row justify-content-center">

       
        <div class="col-md-10">

            @if(Session::has('success'))
                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
            @endif

            <div class="card p-4 mb-4">

                <div class="card-header">
                    <h4>{{ $staff->emp_name }}</h4>
                    <h5>{{ $staff->station }}</h5>
                </div>

                <div class="card-body ">
                 
                        <div class="row">
                            
                            <div class="col-lg-8  mt-4 text mb-1">
                               <h4>LIST OF RECEIVED ITEMS</h4>
                            </div>


                            <div class="col-lg-4 mt-4 text-right mb-1">
                               <button class="btn btn-sm btn-primary" id="addModal">Add Item</button>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-sm table-bordered table-condensed ">
                                    <thead class="table-primary text-center">
                                        <tr>
                                            <td style="display:none">ID</td>
                                            <td>DATE</td>
                                            <td>ITEM</td>
                                            <td>QTY</td>
                                            <td>REMARKS</td>
                                            <td>ACTION</td>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @if ($item->count()<1)
                                            <tr>
                                                <td colspan="5" class="text-center">No records found.</td>
                                            </tr>
                                        @endif
                                        @foreach ($item as $items)
                                            <tr>
                                                <td style="display:none">{{ $items->id }}</td>
                                                <td>{{ $items->date_of_receipt }}</td>
                                                <td>{{ $items->item }}</td>
                                                <td>{{ $items->qty }}</td>
                                                <td>{{ $items->remarks }}</td>
                                                <td>
                                                    <form action="{{route('item.destroy',$items->id)}}" method="POST" style="display: inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn1 btn-danger " onclick="return myFunction();">Delete</button>
                                                    </form> 
                                                
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
    
                </div>
               
            </div>
        </div>
    </div>
</div>
{{-- MODALS --}}
@include('modals.add-item-modal')

@endsection




@section('javascript')
<script>
    function myFunction() {
        if(!confirm("Are you sure you want to delete this record?"))
        event.preventDefault();
    }
</script>

<script>
    $('#tbl1').dataTable( {
      "pageLength": 10
    });
</script>

<script>
    $("#addModal").click(function(){
        $("#add_item_modal").modal('show')
    });
</script>
@endsection
