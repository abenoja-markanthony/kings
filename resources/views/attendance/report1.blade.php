@extends('layouts.app')

@section('content')
@section('page-css')
    <link href="{{ asset('css/employee.css') }}" rel="stylesheet">
@endsection

<div class="fluid mt-4 mb-4 pl-4 pr-4"> 
    
    <div class="row justify-content-center">

        <div class="col-md-8">
            @if(Session::has('success'))
                <script>alert('Attendance has been remove successfully!');</script>
            @endif

            @if(Session::has('delete'))
                <script>alert('Attendance has been deleted successfully!');</script>
            @endif
            @if(Session::has('error'))
                <script>alert('Please select atleast 1 employee!');</script>
                @endif

                <div class="card p-4">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-8"><h5>LIST OF ABSENTS</h5> </div>
                            <div class="col-lg-2"><a href="{{ route('attendance') }}" class="btn btn-primary">Attendance</a></div>
                            <div class="col-lg-2"><a href="{{ route('attendance.create') }}" class="btn btn-primary">Update</a></div>
                        </div>
                        

                        <div class="row">
                            <form action="{{ route('attendance.absent') }}" method="GET">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>Station</label>
                                        <div class="form-group ">
                                            <select name="station" class="form-control" required>
                                                @if (isset($station))
                                                    <option selected>{{ $station }}</option>
                                                    <option disabled>&nbsp</option>
                                                    <option>ALL</option>
                                                @else
                                                    <option selected>ALL</option>
                                                    <option disabled>&nbsp</option>
                                                @endif
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
        
                                    <div class="col-lg-3">
                                        <label>From</label>
                                        <div class="form-group ">
                                            <input type="date" class="form-control" name="from" value="{{ $date }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label>To</label>
                                        <div class="form-group ">
                                            <input type="date" class="form-control" name="to" value="{{ $date }}">
                                        </div>
                                    </div>
        
                                    <div class="col-lg-2 text-left">
                                        <label>&nbsp;</label>
                                        <input type="submit" value="GENERATE" class="btn btn-primary pl-4 pr-4">
                                    </div>
        
                                </div>
            
                            </form>
                        </div>
                    </div>

                    <div class="card-body "   style="overflow:scroll; height:300px;">

                        <table class="table table-bordered table-sm" id="tbl1">
                            <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>STATION</th>
                                    <th>POSITION</th>
                                    <th>DATE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>

                            <tbody id="tbl_body">
                        
                            @foreach ($a_list as $a)
                                <tr>
                                    <td>{{ $a->emp_name }}</td>
                                    <td>{{ $a->station }}</td>
                                    <td>{{ $a->total }}</td>
                                    
                                
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                        <table class="table table-bordered table-sm" id="tbl1">
                            <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>STATION</th>
                                    <th>POSITION</th>
                                    <th>DATE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>

                            <tbody id="tbl_body">
                        
                            @foreach ($b_list as $b)
                                <tr>
                                    <td>{{ $b->emp_name }}</td>
                                    <td>{{ $b->station }}</td>
                                    
                                
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            {{-- CARD --}}
        </div>

    </div>
</div>


<script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<script>
    $('#station').change(function(){
        var $rows = $('#tbl_body tr');
        var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
            reg = RegExp(val, 'i'),
            text;
        
        $rows.show().filter(function() {

            text = $(this).text().replace(/\s+/g, ' ');
            return !reg.test(text);
        
        }).hide();
    });
</script>

<script>
    $('#search').keyup(function(){
        var $rows = $('#tbl_body tr');
        var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
            reg = RegExp(val, 'i'),
            text;
        
        $rows.show().filter(function() {

            text = $(this).text().replace(/\s+/g, ' ');
            return !reg.test(text);
        
        }).hide();
    });
</script>



<script>
    function myFunction() {
        if(!confirm("Are you sure you want to remove this records?"))
        event.preventDefault();
    }
</script>
@endsection

