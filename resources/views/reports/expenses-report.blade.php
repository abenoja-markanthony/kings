@extends('layouts.app')

@section('content')
<div class="fluid mt-4">
    <div class="col-lg-12 text-center">
            @php
                $monthNum  = $month;
                $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                $monthName = $dateObj->format('F'); // March
                $monthName1 = $dateObj->format('M'); // March
            @endphp 

            <h5>MAIN OFFICE AND STATIONS EXPENSES (with O.R. & PCV)</h5>
            <h5>{{ $monthName." ".$year }}</h5>
            <h5>{{ $station }}</h5>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">

            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>{{ $monthName1 }}</th>
                        <th>Electricity</th>
                        <th>Water</th>
                        <th>Cable/Tel</th>
                        <th>M.O Supplies</th>
                        <th>Station Supplies</th>
                        <th>Repairs & Maintenance</th>
                        <th>LPG & Gas</th>
                        <th>Medicine</th>
                        <th>Meals</th>
                        <th>Trans. Exp.</th>
                        <th>Miscellaneous</th>
                        <th>Representation</th>
                        <th>SSS</th>
                        <th>Pagibig</th>
                        <th>Taxes</th>
                        <th>Others</th>
                        <th>Particulars</th>
                    </tr>
                </thead>

                <tbody>
                
                @foreach ($exp as $exps)

                @php
                    $d=$exps->e_date;
                    $day=strtotime($d)
                @endphp
                    <tr>
                       
                        <td>{{ date("d", $day) }}</td>
                        <td>@if($exps->type_of_exp=='ELECTRICITY'){{ number_format($exps->amount,2) }} @endif</td>
                        <td>@if($exps->type_of_exp=='WATER'){{ number_format($exps->amount,2) }} @endif</td>
                        <td>@if($exps->type_of_exp=='CABLE/TELEPHONE'){{ number_format($exps->amount,2) }} @endif</td>
                        <td>@if($exps->type_of_exp=='MAIN OFFICE SUPPLIES'){{ number_format($exps->amount,2) }} @endif</td>
                        <td>@if($exps->type_of_exp=='STATION SUPPLIES'){{ number_format($exps->amount,2) }} @endif</td>
                        <td>@if($exps->type_of_exp=='REPAIRS & MAINTENANCE'){{ number_format($exps->amount,2) }} @endif</td>
                        <td>@if($exps->type_of_exp=='LPG & GASOLINE'){{ number_format($exps->amount,2) }} @endif</td>
                        <td>@if($exps->type_of_exp=='MEDICINE'){{ number_format($exps->amount,2) }} @endif</td>
                        <td>@if($exps->type_of_exp=='MEALS'){{ number_format($exps->amount,2) }} @endif</td>
                        <td>@if($exps->type_of_exp=='TRANSPORTATION'){{ number_format($exps->amount,2) }} @endif</td>
                        <td>@if($exps->type_of_exp=='MISCELLANEOUS'){{ number_format($exps->amount,2) }} @endif</td>
                        <td>@if($exps->type_of_exp=='REPRESENTATION'){{ number_format($exps->amount,2) }} @endif</td>
                        <td>@if($exps->type_of_exp=='SSS'){{ number_format($exps->amount,2) }} @endif</td>
                        <td>@if($exps->type_of_exp=='PAGIBIG'){{ number_format($exps->amount,2) }} @endif</td>
                        <td>@if($exps->type_of_exp=='TAXES'){{ number_format($exps->amount,2) }} @endif</td>
                        <td>@if($exps->type_of_exp=='OTHERS'){{ number_format($exps->amount,2) }} @endif</td>
                        <td>{{ $exps->remarks }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
    </div>
</div>
@endsection
