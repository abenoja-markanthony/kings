@php
    $monthNum  = $month;
    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
    $monthName = $dateObj->format('F'); // March
    $monthName1 = $dateObj->format('M'); // March
@endphp

<div>
    {{-- <img src="{{ asset('images/kings.png') }}" alt="Company Logo" class="logo" width="150px"> --}}
    <h3 class="t_center"> SALARY REPORT </h3>
    <h5 class="t_center" style="margin-top:-50px">NUEVA VIZCAYA - {{ $monthName." ".$year }}</h5>
</div>


@php
    $grand_total=0;
@endphp


{{-- ++++++++++ MAIN OFFICE ++++++++++++++ --}}
<table id="dcb">
    <thead>
        <tr  id="head">
            <th colspan="6">MAIN OFFICE</th>
        </tr>
    </thead>
    <thead>
        <tr  id="head">
            <th>Name</th>
            <th>Position</th>
            <th>Rate</th>
            <th style="width:90px">No. of days</th>
            <th>Absent</th>
            <th>Total</th>
        </tr>
    </thead>

    <tbody id="body">
   

    @php
        $mo_total=0;
        $ctr=0;
        $ctr1=0;
    @endphp


   
    @foreach ($result as $a)

        @if ($a->station=='MAIN OFFICE' AND $a->wage_type=='DAILY RATE')
            @php
                $total=($days-$a->total)*$a->rate;
            @endphp
               
            @php   $ctr++;   @endphp
            <tr>
                <td>{{ $a->emp_name }}</td>
                <td>{{ $a->position }}</td>
                <td>{{ $a->rate }}</td>
                <td>{{ $days }}</td>
                <td>{{ $a->total }}</td>
                <td class="t_right">{{ c($total) }}</td>
                
            </tr>
            @php
                $mo_total+=$total;
            @endphp
        @endif
       
    @endforeach

    @foreach ($b_list as $b)

       
    @endforeach
    <tr id="total">
        <td colspan="5">TOTAL</td>
        <td class="t_right">{{c( $mo_total) }}</td>
    </tr> 

   
    </tbody>
</table>
{{-- ++++++++++ MAIN OFFICE ++++++++++++++ --}}


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