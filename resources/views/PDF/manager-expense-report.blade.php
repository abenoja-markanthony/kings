@php
    $monthNum  = $month;
    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
    $monthName = $dateObj->format('F'); // March
    $monthName1 = $dateObj->format('M'); // March
@endphp

<div>
    {{-- <img src="{{ asset('images/kings.png') }}" alt="Company Logo" class="logo" width="150px"> --}}
    <h3 class="t_center">{{ $manager }} EXPENSES REPORT</h3>
    <h5 class="t_center" style="margin-top:-50px">NUEVA VIZCAYA - {{ $monthName." ".$year }}</h5>
</div>
<table id="dcb">
    <thead>
        <tr  id="head">
            <th>Date</th>
            <th>Type of Expense</th>
            <th>Amount</th>
            <th>Remarks</th>
        </tr>
    </thead>

    <tbody id="body">
    
    @foreach ($exp as $exps)

        <tr>
           
            <td>{{ date('M. d, Y', strtotime($exps->e_date)) }}</td>
            <td>{{ $exps->type_of_exp }}</td>
            <td class="t_right">{{ c($exps->amount) }}</td>
            <td>{{ $exps->remarks }}</td>
        </tr>

    @endforeach

    <tr id="total">
        <td colspan="2">TOTAL</td>
        <td class="t_right">{{c( $total) }}</td>
    </tr>
    </tbody>
</table>

@php
    function c($x){
        if ($x!='') {
           $x=number_format($x,2);
            return $x;
        }else{
            return $x;
        }
    }
    function a($x){
        if ($x!='') {
            return $x;
        }else{
            $x=0;
            return $x;
        }
    }

@endphp