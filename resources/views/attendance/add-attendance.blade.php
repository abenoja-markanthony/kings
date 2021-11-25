@extends('layouts.app')

@section('content')
@section('page-css')
    <link href="{{ asset('css/employee.css') }}" rel="stylesheet">
@endsection

<div class="fluid mt-4 mb-4 pl-4 pr-4"> 
    
    <div class="row justify-content-center">

        <div class="col-md-8">
            @if(Session::has('success'))
                <script>alert('Attendance has been recorded successfully!');</script>
            @endif

            @if(Session::has('delete'))
                <script>alert('Attendance has been deleted successfully!');</script>
            @endif
            @if(Session::has('error'))
                <script>alert('Please select atleast 1 employee!');</script>
                @endif

            <form action="{{ route('attendance.store') }}" method="POST">
                @csrf
                <div class="card p-4">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-12"><h5>EMPLOYEES</h5> </div>
                            <div class="col-lg-4">
                                <input type="date" class="form-control1" name="date_of_absent" value="{{ $date }}" required>
                            </div>
                            <div class="col-lg-4">
                                <select class="form-control1" id="station" >
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
                            <div class="col-lg-4">
                                <input type="text" class="form-control1" placeholder="Search for name" id="search">
                            </div>
                           

                        </div>
                    
                    </div>

                    <div class="card-body "   style="overflow:scroll; height:300px;">

                        <table class="table table-bordered table-sm" id="tbl1">
                            <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>STATION</th>
                                    <th>MARK AS ABSENT</th>
                                </tr>
                            </thead>

                            <tbody id="tbl_body">
                        
                            @foreach ($emp as $emps)
                                <tr>
                                    <td>{{ $emps->emp_name }}</td>
                                    <td>{{ $emps->station }}</td>
                                    <td><input type="checkbox" name="attendance[]" class="form-control1" value="{{ $emps->id }}"></td>
                                
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="col-lg-12 text-right">
                        <input type="submit" class="btn btn-primary mt-4  " value="Submit" name="submit">
                    </div>
                </div>
            </form>
            {{-- CARD --}}
        </div>

    </div>
</div>

<script>
    function myFunction() {
        if(!confirm("Are you sure you want to delete this?"))
        event.preventDefault();
    }
</script>
{{-- 
<script>
    $('#tbl1').dataTable( {
      "pageLength": 10
    });
</script> --}}
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
    $('#station1').change(function(){
        var $rows = $('#tbl_body1 tr');
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
    $('#search1').keyup(function(){
        var $rows = $('#tbl_body1 tr');
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
    $('#station1').change(function(){
        var $rows = $('#tbl_body1 tr');
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
    $('#date1').change(function(){
        var $rows = $('#tbl_body1 tr');
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

