@extends('layouts.app')
@section('page-css')
    <link href="{{ asset('css/manager_exp.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="fluid mt-4">
    

    <div class="row justify-content-center mb-4">
        <div class="col-md-12" style="background-color: #fff">
            <div class="col-lg-12 text-center mt-4">
                @php
                    $monthNum  = $month;
                    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                    $monthName = $dateObj->format('F'); // March
                    $monthName1 = $dateObj->format('M'); // March
                @endphp 

                <div class="row">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6">
                        {{-- <img src="{{ asset('images/kings.png') }}" alt="Company Logo" class="logo" width="150px"> --}}
                        <h5>{{ $monthName." ".$year }}</h5>
                    </div>
                    <div class="col-lg-3">
                        <form action="{{ route('PDF-manager-exp-report') }}" method="GET">
                            <input type="hidden" name="month" value="{{ $month }}">
                            <input type="hidden" name="year" value="{{ $year }}">
                            <input type="submit" value="Convert to PDF">
                        </form>
                    </div>
                </div>
            </div>
            @php
                $amount=0;
                $ctr=1;
            @endphp
           
            <table id="dcb" class="mb-4">
                <thead>
                    <tr id="head" class="text-center">
                        <th>Date</th>
                        <th>Brgy. Timbre</th>
                        <th >Cable/Telephone</th>
                        <th >Donations & Sponsorship</th>
                        <th >Electricity</th>
                        <th >Gasoline</th>
                        <th >House Rental</th>
                        <th >LPG</th>
                        <th >Meals</th>
                        <th >Medicine</th>
                        <th >Miscellaneous</th>
                        <th >PAGIBIB</th>
                        <th >PCSO Remittance</th>
                        <th >PHILHEALTH</th>
                        <th >Por Lata</th>
                        <th >Repairs & Maintenance</th>
                    </tr>
                </thead>
               
                <tbody id="body">
                    <tr>
                        <td>{{ $monthName1 }}-01</td>
                        <td>{{ c($day1_brgy) }}</td>
                        <td>{{ c($day1_cable) }}</td>
                        <td>{{ c($day1_donation) }}</td>
                        <td>{{ c($day1_electricity) }}</td>
                        <td>{{ c($day1_gasoline) }}</td>
                        <td>{{ c($day1_house_rental) }}</td>
                        <td>{{ c($day1_lpg) }}</td>
                        <td>{{ c($day1_meals) }}</td>
                        <td>{{ c($day1_medicine) }}</td>
                        <td>{{ c($day1_miscellaneous) }}</td>
                        <td>{{ c($day1_pagibig) }}</td>
                        <td>{{ c($day1_pcso) }}</td>
                        <td>{{ c($day1_philhealth) }}</td>
                        <td>{{ c($day1_porlata) }}</td>
                        <td>{{ c($day1_repairs) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-02</td>
                        <td>{{ c($day2_brgy) }}</td>
                        <td>{{ c($day2_cable) }}</td>
                        <td>{{ c($day2_donation) }}</td>
                        <td>{{ c($day2_electricity) }}</td>
                        <td>{{ c($day2_gasoline) }}</td>
                        <td>{{ c($day2_house_rental) }}</td>
                        <td>{{ c($day2_lpg) }}</td>
                        <td>{{ c($day2_meals) }}</td>
                        <td>{{ c($day2_medicine) }}</td>
                        <td>{{ c($day2_miscellaneous) }}</td>
                        <td>{{ c($day2_pagibig) }}</td>
                        <td>{{ c($day2_pcso) }}</td>
                        <td>{{ c($day2_philhealth) }}</td>
                        <td>{{ c($day2_porlata) }}</td>
                        <td>{{ c($day2_repairs) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-03</td>
                        <td>{{ c($day3_brgy) }}</td>
                        <td>{{ c($day3_cable) }}</td>
                        <td>{{ c($day3_donation) }}</td>
                        <td>{{ c($day3_electricity) }}</td>
                        <td>{{ c($day3_gasoline) }}</td>
                        <td>{{ c($day3_house_rental) }}</td>
                        <td>{{ c($day3_lpg) }}</td>
                        <td>{{ c($day3_meals) }}</td>
                        <td>{{ c($day3_medicine) }}</td>
                        <td>{{ c($day3_miscellaneous) }}</td>
                        <td>{{ c($day3_pagibig) }}</td>
                        <td>{{ c($day3_pcso) }}</td>
                        <td>{{ c($day3_philhealth) }}</td>
                        <td>{{ c($day3_porlata) }}</td>
                        <td>{{ c($day3_repairs) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-04</td>
                        <td>{{ c($day4_brgy) }}</td>
                        <td>{{ c($day4_cable) }}</td>
                        <td>{{ c($day4_donation) }}</td>
                        <td>{{ c($day4_electricity) }}</td>
                        <td>{{ c($day4_gasoline) }}</td>
                        <td>{{ c($day4_house_rental) }}</td>
                        <td>{{ c($day4_lpg) }}</td>
                        <td>{{ c($day4_meals) }}</td>
                        <td>{{ c($day4_medicine) }}</td>
                        <td>{{ c($day4_miscellaneous) }}</td>
                        <td>{{ c($day4_pagibig) }}</td>
                        <td>{{ c($day4_pcso) }}</td>
                        <td>{{ c($day4_philhealth) }}</td>
                        <td>{{ c($day4_porlata) }}</td>
                        <td>{{ c($day4_repairs) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-05</td>
                        <td>{{ c($day5_brgy) }}</td>
                        <td>{{ c($day5_cable) }}</td>
                        <td>{{ c($day5_donation) }}</td>
                        <td>{{ c($day5_electricity) }}</td>
                        <td>{{ c($day5_gasoline) }}</td>
                        <td>{{ c($day5_house_rental) }}</td>
                        <td>{{ c($day5_lpg) }}</td>
                        <td>{{ c($day5_meals) }}</td>
                        <td>{{ c($day5_medicine) }}</td>
                        <td>{{ c($day5_miscellaneous) }}</td>
                        <td>{{ c($day5_pagibig) }}</td>
                        <td>{{ c($day5_pcso) }}</td>
                        <td>{{ c($day5_philhealth) }}</td>
                        <td>{{ c($day5_porlata) }}</td>
                        <td>{{ c($day5_repairs) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-06</td>
                        <td>{{ c($day6_brgy) }}</td>
                        <td>{{ c($day6_cable) }}</td>
                        <td>{{ c($day6_donation) }}</td>
                        <td>{{ c($day6_electricity) }}</td>
                        <td>{{ c($day6_gasoline) }}</td>
                        <td>{{ c($day6_house_rental) }}</td>
                        <td>{{ c($day6_lpg) }}</td>
                        <td>{{ c($day6_meals) }}</td>
                        <td>{{ c($day6_medicine) }}</td>
                        <td>{{ c($day6_miscellaneous) }}</td>
                        <td>{{ c($day6_pagibig) }}</td>
                        <td>{{ c($day6_pcso) }}</td>
                        <td>{{ c($day6_philhealth) }}</td>
                        <td>{{ c($day6_porlata) }}</td>
                        <td>{{ c($day6_repairs) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-07</td>
                        <td>{{ c($day7_brgy) }}</td>
                        <td>{{ c($day7_cable) }}</td>
                        <td>{{ c($day7_donation) }}</td>
                        <td>{{ c($day7_electricity) }}</td>
                        <td>{{ c($day7_gasoline) }}</td>
                        <td>{{ c($day7_house_rental) }}</td>
                        <td>{{ c($day7_lpg) }}</td>
                        <td>{{ c($day7_meals) }}</td>
                        <td>{{ c($day7_medicine) }}</td>
                        <td>{{ c($day7_miscellaneous) }}</td>
                        <td>{{ c($day7_pagibig) }}</td>
                        <td>{{ c($day7_pcso) }}</td>
                        <td>{{ c($day7_philhealth) }}</td>
                        <td>{{ c($day7_porlata) }}</td>
                        <td>{{ c($day7_repairs) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-08</td>
                        <td>{{ c($day8_brgy) }}</td>
                        <td>{{ c($day8_cable) }}</td>
                        <td>{{ c($day8_donation) }}</td>
                        <td>{{ c($day8_electricity) }}</td>
                        <td>{{ c($day8_gasoline) }}</td>
                        <td>{{ c($day8_house_rental) }}</td>
                        <td>{{ c($day8_lpg) }}</td>
                        <td>{{ c($day8_meals) }}</td>
                        <td>{{ c($day8_medicine) }}</td>
                        <td>{{ c($day8_miscellaneous) }}</td>
                        <td>{{ c($day8_pagibig) }}</td>
                        <td>{{ c($day8_pcso) }}</td>
                        <td>{{ c($day8_philhealth) }}</td>
                        <td>{{ c($day8_porlata) }}</td>
                        <td>{{ c($day8_repairs) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-09</td>
                        <td>{{ c($day9_brgy) }}</td>
                        <td>{{ c($day9_cable) }}</td>
                        <td>{{ c($day9_donation) }}</td>
                        <td>{{ c($day9_electricity) }}</td>
                        <td>{{ c($day9_gasoline) }}</td>
                        <td>{{ c($day9_house_rental) }}</td>
                        <td>{{ c($day9_lpg) }}</td>
                        <td>{{ c($day9_meals) }}</td>
                        <td>{{ c($day9_medicine) }}</td>
                        <td>{{ c($day9_miscellaneous) }}</td>
                        <td>{{ c($day9_pagibig) }}</td>
                        <td>{{ c($day9_pcso) }}</td>
                        <td>{{ c($day9_philhealth) }}</td>
                        <td>{{ c($day9_porlata) }}</td>
                        <td>{{ c($day9_repairs) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-10</td>
                        <td>{{ c($day10_brgy) }}</td>
                        <td>{{ c($day10_cable) }}</td>
                        <td>{{ c($day10_donation) }}</td>
                        <td>{{ c($day10_electricity) }}</td>
                        <td>{{ c($day10_gasoline) }}</td>
                        <td>{{ c($day10_house_rental) }}</td>
                        <td>{{ c($day10_lpg) }}</td>
                        <td>{{ c($day10_meals) }}</td>
                        <td>{{ c($day10_medicine) }}</td>
                        <td>{{ c($day10_miscellaneous) }}</td>
                        <td>{{ c($day10_pagibig) }}</td>
                        <td>{{ c($day10_pcso) }}</td>
                        <td>{{ c($day10_philhealth) }}</td>
                        <td>{{ c($day10_porlata) }}</td>
                        <td>{{ c($day10_repairs) }}</td>
                    </tr>

                    <tr>
                        <td>{{ $monthName1 }}-11</td>
                        <td>{{ c($day11_brgy) }}</td>
                        <td>{{ c($day11_cable) }}</td>
                        <td>{{ c($day11_donation) }}</td>
                        <td>{{ c($day11_electricity) }}</td>
                        <td>{{ c($day11_gasoline) }}</td>
                        <td>{{ c($day11_house_rental) }}</td>
                        <td>{{ c($day11_lpg) }}</td>
                        <td>{{ c($day11_meals) }}</td>
                        <td>{{ c($day11_medicine) }}</td>
                        <td>{{ c($day11_miscellaneous) }}</td>
                        <td>{{ c($day11_pagibig) }}</td>
                        <td>{{ c($day11_pcso) }}</td>
                        <td>{{ c($day11_philhealth) }}</td>
                        <td>{{ c($day11_porlata) }}</td>
                        <td>{{ c($day11_repairs) }}</td>
                    </tr>

                    <tr>
                        <td>{{ $monthName1 }}-12</td>
                        <td>{{ c($day12_brgy) }}</td>
                        <td>{{ c($day12_cable) }}</td>
                        <td>{{ c($day12_donation) }}</td>
                        <td>{{ c($day12_electricity) }}</td>
                        <td>{{ c($day12_gasoline) }}</td>
                        <td>{{ c($day12_house_rental) }}</td>
                        <td>{{ c($day12_lpg) }}</td>
                        <td>{{ c($day12_meals) }}</td>
                        <td>{{ c($day12_medicine) }}</td>
                        <td>{{ c($day12_miscellaneous) }}</td>
                        <td>{{ c($day12_pagibig) }}</td>
                        <td>{{ c($day12_pcso) }}</td>
                        <td>{{ c($day12_philhealth) }}</td>
                        <td>{{ c($day12_porlata) }}</td>
                        <td>{{ c($day12_repairs) }}</td>
                    </tr>

                    <tr>
                        <td>{{ $monthName1 }}-13</td>
                        <td>{{ c($day13_brgy) }}</td>
                        <td>{{ c($day13_cable) }}</td>
                        <td>{{ c($day13_donation) }}</td>
                        <td>{{ c($day13_electricity) }}</td>
                        <td>{{ c($day13_gasoline) }}</td>
                        <td>{{ c($day13_house_rental) }}</td>
                        <td>{{ c($day13_lpg) }}</td>
                        <td>{{ c($day13_meals) }}</td>
                        <td>{{ c($day13_medicine) }}</td>
                        <td>{{ c($day13_miscellaneous) }}</td>
                        <td>{{ c($day13_pagibig) }}</td>
                        <td>{{ c($day13_pcso) }}</td>
                        <td>{{ c($day13_philhealth) }}</td>
                        <td>{{ c($day13_porlata) }}</td>
                        <td>{{ c($day13_repairs) }}</td>
                    </tr>

                    <tr>
                        <td>{{ $monthName1 }}-14</td>
                        <td>{{ c($day14_brgy) }}</td>
                        <td>{{ c($day14_cable) }}</td>
                        <td>{{ c($day14_donation) }}</td>
                        <td>{{ c($day14_electricity) }}</td>
                        <td>{{ c($day14_gasoline) }}</td>
                        <td>{{ c($day14_house_rental) }}</td>
                        <td>{{ c($day14_lpg) }}</td>
                        <td>{{ c($day14_meals) }}</td>
                        <td>{{ c($day14_medicine) }}</td>
                        <td>{{ c($day14_miscellaneous) }}</td>
                        <td>{{ c($day14_pagibig) }}</td>
                        <td>{{ c($day14_pcso) }}</td>
                        <td>{{ c($day14_philhealth) }}</td>
                        <td>{{ c($day14_porlata) }}</td>
                        <td>{{ c($day14_repairs) }}</td>
                    </tr>

                    <tr>
                        <td>{{ $monthName1 }}-15</td>
                        <td>{{ c($day15_brgy) }}</td>
                        <td>{{ c($day15_cable) }}</td>
                        <td>{{ c($day15_donation) }}</td>
                        <td>{{ c($day15_electricity) }}</td>
                        <td>{{ c($day15_gasoline) }}</td>
                        <td>{{ c($day15_house_rental) }}</td>
                        <td>{{ c($day15_lpg) }}</td>
                        <td>{{ c($day15_meals) }}</td>
                        <td>{{ c($day15_medicine) }}</td>
                        <td>{{ c($day15_miscellaneous) }}</td>
                        <td>{{ c($day15_pagibig) }}</td>
                        <td>{{ c($day15_pcso) }}</td>
                        <td>{{ c($day15_philhealth) }}</td>
                        <td>{{ c($day15_porlata) }}</td>
                        <td>{{ c($day15_repairs) }}</td>
                    </tr>

                    <tr>
                        <td>{{ $monthName1 }}-16</td>
                        <td>{{ c($day16_brgy) }}</td>
                        <td>{{ c($day16_cable) }}</td>
                        <td>{{ c($day16_donation) }}</td>
                        <td>{{ c($day16_electricity) }}</td>
                        <td>{{ c($day16_gasoline) }}</td>
                        <td>{{ c($day16_house_rental) }}</td>
                        <td>{{ c($day16_lpg) }}</td>
                        <td>{{ c($day16_meals) }}</td>
                        <td>{{ c($day16_medicine) }}</td>
                        <td>{{ c($day16_miscellaneous) }}</td>
                        <td>{{ c($day16_pagibig) }}</td>
                        <td>{{ c($day16_pcso) }}</td>
                        <td>{{ c($day16_philhealth) }}</td>
                        <td>{{ c($day16_porlata) }}</td>
                        <td>{{ c($day16_repairs) }}</td>
                    </tr>

                    <tr>
                        <td>{{ $monthName1 }}-17</td>
                        <td>{{ c($day17_brgy) }}</td>
                        <td>{{ c($day17_cable) }}</td>
                        <td>{{ c($day17_donation) }}</td>
                        <td>{{ c($day17_electricity) }}</td>
                        <td>{{ c($day17_gasoline) }}</td>
                        <td>{{ c($day17_house_rental) }}</td>
                        <td>{{ c($day17_lpg) }}</td>
                        <td>{{ c($day17_meals) }}</td>
                        <td>{{ c($day17_medicine) }}</td>
                        <td>{{ c($day17_miscellaneous) }}</td>
                        <td>{{ c($day17_pagibig) }}</td>
                        <td>{{ c($day17_pcso) }}</td>
                        <td>{{ c($day17_philhealth) }}</td>
                        <td>{{ c($day17_porlata) }}</td>
                        <td>{{ c($day17_repairs) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-18</td>
                        <td>{{ c($day18_brgy) }}</td>
                        <td>{{ c($day18_cable) }}</td>
                        <td>{{ c($day18_donation) }}</td>
                        <td>{{ c($day18_electricity) }}</td>
                        <td>{{ c($day18_gasoline) }}</td>
                        <td>{{ c($day18_house_rental) }}</td>
                        <td>{{ c($day18_lpg) }}</td>
                        <td>{{ c($day18_meals) }}</td>
                        <td>{{ c($day18_medicine) }}</td>
                        <td>{{ c($day18_miscellaneous) }}</td>
                        <td>{{ c($day18_pagibig) }}</td>
                        <td>{{ c($day18_pcso) }}</td>
                        <td>{{ c($day18_philhealth) }}</td>
                        <td>{{ c($day18_porlata) }}</td>
                        <td>{{ c($day18_repairs) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-19</td>
                        <td>{{ c($day19_brgy) }}</td>
                        <td>{{ c($day19_cable) }}</td>
                        <td>{{ c($day19_donation) }}</td>
                        <td>{{ c($day19_electricity) }}</td>
                        <td>{{ c($day19_gasoline) }}</td>
                        <td>{{ c($day19_house_rental) }}</td>
                        <td>{{ c($day19_lpg) }}</td>
                        <td>{{ c($day19_meals) }}</td>
                        <td>{{ c($day19_medicine) }}</td>
                        <td>{{ c($day19_miscellaneous) }}</td>
                        <td>{{ c($day19_pagibig) }}</td>
                        <td>{{ c($day19_pcso) }}</td>
                        <td>{{ c($day19_philhealth) }}</td>
                        <td>{{ c($day19_porlata) }}</td>
                        <td>{{ c($day19_repairs) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-20</td>
                        <td>{{ c($day20_brgy) }}</td>
                        <td>{{ c($day20_cable) }}</td>
                        <td>{{ c($day20_donation) }}</td>
                        <td>{{ c($day20_electricity) }}</td>
                        <td>{{ c($day20_gasoline) }}</td>
                        <td>{{ c($day20_house_rental) }}</td>
                        <td>{{ c($day20_lpg) }}</td>
                        <td>{{ c($day20_meals) }}</td>
                        <td>{{ c($day20_medicine) }}</td>
                        <td>{{ c($day20_miscellaneous) }}</td>
                        <td>{{ c($day20_pagibig) }}</td>
                        <td>{{ c($day20_pcso) }}</td>
                        <td>{{ c($day20_philhealth) }}</td>
                        <td>{{ c($day20_porlata) }}</td>
                        <td>{{ c($day20_repairs) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-21</td>
                        <td>{{ c($day21_brgy) }}</td>
                        <td>{{ c($day21_cable) }}</td>
                        <td>{{ c($day21_donation) }}</td>
                        <td>{{ c($day21_electricity) }}</td>
                        <td>{{ c($day21_gasoline) }}</td>
                        <td>{{ c($day21_house_rental) }}</td>
                        <td>{{ c($day21_lpg) }}</td>
                        <td>{{ c($day21_meals) }}</td>
                        <td>{{ c($day21_medicine) }}</td>
                        <td>{{ c($day21_miscellaneous) }}</td>
                        <td>{{ c($day21_pagibig) }}</td>
                        <td>{{ c($day21_pcso) }}</td>
                        <td>{{ c($day21_philhealth) }}</td>
                        <td>{{ c($day21_porlata) }}</td>
                        <td>{{ c($day21_repairs) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-22</td>
                        <td>{{ c($day22_brgy) }}</td>
                        <td>{{ c($day22_cable) }}</td>
                        <td>{{ c($day22_donation) }}</td>
                        <td>{{ c($day22_electricity) }}</td>
                        <td>{{ c($day22_gasoline) }}</td>
                        <td>{{ c($day22_house_rental) }}</td>
                        <td>{{ c($day22_lpg) }}</td>
                        <td>{{ c($day22_meals) }}</td>
                        <td>{{ c($day22_medicine) }}</td>
                        <td>{{ c($day22_miscellaneous) }}</td>
                        <td>{{ c($day22_pagibig) }}</td>
                        <td>{{ c($day22_pcso) }}</td>
                        <td>{{ c($day22_philhealth) }}</td>
                        <td>{{ c($day22_porlata) }}</td>
                        <td>{{ c($day22_repairs) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-23</td>
                        <td>{{ c($day23_brgy) }}</td>
                        <td>{{ c($day23_cable) }}</td>
                        <td>{{ c($day23_donation) }}</td>
                        <td>{{ c($day23_electricity) }}</td>
                        <td>{{ c($day23_gasoline) }}</td>
                        <td>{{ c($day23_house_rental) }}</td>
                        <td>{{ c($day23_lpg) }}</td>
                        <td>{{ c($day23_meals) }}</td>
                        <td>{{ c($day23_medicine) }}</td>
                        <td>{{ c($day23_miscellaneous) }}</td>
                        <td>{{ c($day23_pagibig) }}</td>
                        <td>{{ c($day23_pcso) }}</td>
                        <td>{{ c($day23_philhealth) }}</td>
                        <td>{{ c($day23_porlata) }}</td>
                        <td>{{ c($day23_repairs) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-24</td>
                        <td>{{ c($day24_brgy) }}</td>
                        <td>{{ c($day24_cable) }}</td>
                        <td>{{ c($day24_donation) }}</td>
                        <td>{{ c($day24_electricity) }}</td>
                        <td>{{ c($day24_gasoline) }}</td>
                        <td>{{ c($day24_house_rental) }}</td>
                        <td>{{ c($day24_lpg) }}</td>
                        <td>{{ c($day24_meals) }}</td>
                        <td>{{ c($day24_medicine) }}</td>
                        <td>{{ c($day24_miscellaneous) }}</td>
                        <td>{{ c($day24_pagibig) }}</td>
                        <td>{{ c($day24_pcso) }}</td>
                        <td>{{ c($day24_philhealth) }}</td>
                        <td>{{ c($day24_porlata) }}</td>
                        <td>{{ c($day24_repairs) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-25</td>
                        <td>{{ c($day25_brgy) }}</td>
                        <td>{{ c($day25_cable) }}</td>
                        <td>{{ c($day25_donation) }}</td>
                        <td>{{ c($day25_electricity) }}</td>
                        <td>{{ c($day25_gasoline) }}</td>
                        <td>{{ c($day25_house_rental) }}</td>
                        <td>{{ c($day25_lpg) }}</td>
                        <td>{{ c($day25_meals) }}</td>
                        <td>{{ c($day25_medicine) }}</td>
                        <td>{{ c($day25_miscellaneous) }}</td>
                        <td>{{ c($day25_pagibig) }}</td>
                        <td>{{ c($day25_pcso) }}</td>
                        <td>{{ c($day25_philhealth) }}</td>
                        <td>{{ c($day25_porlata) }}</td>
                        <td>{{ c($day25_repairs) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-26</td>
                        <td>{{ c($day26_brgy) }}</td>
                        <td>{{ c($day26_cable) }}</td>
                        <td>{{ c($day26_donation) }}</td>
                        <td>{{ c($day26_electricity) }}</td>
                        <td>{{ c($day26_gasoline) }}</td>
                        <td>{{ c($day26_house_rental) }}</td>
                        <td>{{ c($day26_lpg) }}</td>
                        <td>{{ c($day26_meals) }}</td>
                        <td>{{ c($day26_medicine) }}</td>
                        <td>{{ c($day26_miscellaneous) }}</td>
                        <td>{{ c($day26_pagibig) }}</td>
                        <td>{{ c($day26_pcso) }}</td>
                        <td>{{ c($day26_philhealth) }}</td>
                        <td>{{ c($day26_porlata) }}</td>
                        <td>{{ c($day26_repairs) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-27</td>
                        <td>{{ c($day27_brgy) }}</td>
                        <td>{{ c($day27_cable) }}</td>
                        <td>{{ c($day27_donation) }}</td>
                        <td>{{ c($day27_electricity) }}</td>
                        <td>{{ c($day27_gasoline) }}</td>
                        <td>{{ c($day27_house_rental) }}</td>
                        <td>{{ c($day27_lpg) }}</td>
                        <td>{{ c($day27_meals) }}</td>
                        <td>{{ c($day27_medicine) }}</td>
                        <td>{{ c($day27_miscellaneous) }}</td>
                        <td>{{ c($day27_pagibig) }}</td>
                        <td>{{ c($day27_pcso) }}</td>
                        <td>{{ c($day27_philhealth) }}</td>
                        <td>{{ c($day27_porlata) }}</td>
                        <td>{{ c($day27_repairs) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-28</td>
                        <td>{{ c($day28_brgy) }}</td>
                        <td>{{ c($day28_cable) }}</td>
                        <td>{{ c($day28_donation) }}</td>
                        <td>{{ c($day28_electricity) }}</td>
                        <td>{{ c($day28_gasoline) }}</td>
                        <td>{{ c($day28_house_rental) }}</td>
                        <td>{{ c($day28_lpg) }}</td>
                        <td>{{ c($day28_meals) }}</td>
                        <td>{{ c($day28_medicine) }}</td>
                        <td>{{ c($day28_miscellaneous) }}</td>
                        <td>{{ c($day28_pagibig) }}</td>
                        <td>{{ c($day28_pcso) }}</td>
                        <td>{{ c($day28_philhealth) }}</td>
                        <td>{{ c($day28_porlata) }}</td>
                        <td>{{ c($day28_repairs) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-29</td>
                        <td>{{ c($day29_brgy) }}</td>
                        <td>{{ c($day29_cable) }}</td>
                        <td>{{ c($day29_donation) }}</td>
                        <td>{{ c($day29_electricity) }}</td>
                        <td>{{ c($day29_gasoline) }}</td>
                        <td>{{ c($day29_house_rental) }}</td>
                        <td>{{ c($day29_lpg) }}</td>
                        <td>{{ c($day29_meals) }}</td>
                        <td>{{ c($day29_medicine) }}</td>
                        <td>{{ c($day29_miscellaneous) }}</td>
                        <td>{{ c($day29_pagibig) }}</td>
                        <td>{{ c($day29_pcso) }}</td>
                        <td>{{ c($day29_philhealth) }}</td>
                        <td>{{ c($day29_porlata) }}</td>
                        <td>{{ c($day29_repairs) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-30</td>
                        <td>{{ c($day30_brgy) }}</td>
                        <td>{{ c($day30_cable) }}</td>
                        <td>{{ c($day30_donation) }}</td>
                        <td>{{ c($day30_electricity) }}</td>
                        <td>{{ c($day30_gasoline) }}</td>
                        <td>{{ c($day30_house_rental) }}</td>
                        <td>{{ c($day30_lpg) }}</td>
                        <td>{{ c($day30_meals) }}</td>
                        <td>{{ c($day30_medicine) }}</td>
                        <td>{{ c($day30_miscellaneous) }}</td>
                        <td>{{ c($day30_pagibig) }}</td>
                        <td>{{ c($day30_pcso) }}</td>
                        <td>{{ c($day30_philhealth) }}</td>
                        <td>{{ c($day30_porlata) }}</td>
                        <td>{{ c($day30_repairs) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-31</td>
                        <td>{{ c($day31_brgy) }}</td>
                        <td>{{ c($day31_cable) }}</td>
                        <td>{{ c($day31_donation) }}</td>
                        <td>{{ c($day31_electricity) }}</td>
                        <td>{{ c($day31_gasoline) }}</td>
                        <td>{{ c($day31_house_rental) }}</td>
                        <td>{{ c($day31_lpg) }}</td>
                        <td>{{ c($day31_meals) }}</td>
                        <td>{{ c($day31_medicine) }}</td>
                        <td>{{ c($day31_miscellaneous) }}</td>
                        <td>{{ c($day31_pagibig) }}</td>
                        <td>{{ c($day31_pcso) }}</td>
                        <td>{{ c($day31_philhealth) }}</td>
                        <td>{{ c($day31_porlata) }}</td>
                        <td>{{ c($day31_repairs) }}</td>
                    </tr>
                    {{-- TOTAL --}}
                    <tr>
                        <td>TOTAL</td>
                        <td>{{ c($total_brgy) }}</td>
                        <td>{{ c($total_cable) }}</td>
                        <td>{{ c($total_donation) }}</td>
                        <td>{{ c($total_electricity) }}</td>
                        <td>{{ c($total_gasoline) }}</td>
                        <td>{{ c($total_house_rental) }}</td>
                        <td>{{ c($total_lpg) }}</td>
                        <td>{{ c($total_meals) }}</td>
                        <td>{{ c($total_medicine) }}</td>
                        <td>{{ c($total_miscellaneous) }}</td>
                        <td>{{ c($total_pagibig) }}</td>
                        <td>{{ c($total_pcso) }}</td>
                        <td>{{ c($total_philhealth) }}</td>
                        <td>{{ c($total_porlata) }}</td>
                        <td>{{ c($total_repairs) }}</td>
                    </tr>
              
                </tbody>
            </table>


{{-- =========================================================================================== --}}
{{-- =========================================================================================== --}}
{{-- =========================================================================================== --}}
{{-- =========================================================================================== --}}
{{-- =========================================================================================== --}}


            <table id="dcb" class="mb-4">
                <thead>
                    <tr id="head" class="text-center">
                        <th>Date</th>
                        <th >Representation</th>
                        <th >Salaries</th>
                        <th>Supplies-Station</th>
                        <th>Supplies-Main Office</th>
                        <th>Taxes-BIR</th>
                        <th>Taxes-PCSO</th>
                        <th>Trans/Vacation Allowance</th>
                        <th>Travelling</th>
                        <th>Vehicle Rental</th>
                        <th>Water-Drinking</th>
                        <th>Water Bill</th>
                        <th>National</th>
                        <th>Local</th>
                        <th>Management</th>
                        <th>Ticket</th>
                        <th>Others</th>
                        
                    </tr>
                </thead>
               
                <tbody id="body">
                    <tr>
                        <td>{{ $monthName1 }}-01</td>
                        <td>{{ c($day1_representation) }}</td>
                        <td>{{ c($day1_salaries) }}</td>
                        <td>{{ c($day1_supplies_station) }}</td>
                        <td>{{ c($day1_supplies_main_office) }}</td>
                        <td>{{ c($day1_taxes_bir) }}</td>
                        <td>{{ c($day1_taxes_pcso) }}</td>
                        <td>{{ c($day1_trans_vac) }}</td>
                        <td>{{ c($day1_travelling) }}</td>
                        <td>{{ c($day1_vehicle_rental) }}</td>
                        <td>{{ c($day1_water_drinking) }}</td>
                        <td>{{ c($day1_water_bill) }}</td>
                        <td>{{ c($day1_national) }}</td>
                        <td>{{ c($day1_local) }}</td>
                        <td>{{ c($day1_management) }}</td>
                        <td>{{ c($day1_ticket) }}</td>
                        <td>{{ c($day1_others) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-02</td>
                        <td>{{ c($day2_representation) }}</td>
                        <td>{{ c($day2_salaries) }}</td>
                        <td>{{ c($day2_supplies_station) }}</td>
                        <td>{{ c($day2_supplies_main_office) }}</td>
                        <td>{{ c($day2_taxes_bir) }}</td>
                        <td>{{ c($day2_taxes_pcso) }}</td>
                        <td>{{ c($day2_trans_vac) }}</td>
                        <td>{{ c($day2_travelling) }}</td>
                        <td>{{ c($day2_vehicle_rental) }}</td>
                        <td>{{ c($day2_water_drinking) }}</td>
                        <td>{{ c($day2_water_bill) }}</td>
                        <td>{{ c($day2_national) }}</td>
                        <td>{{ c($day2_local) }}</td>
                        <td>{{ c($day2_management) }}</td>
                        <td>{{ c($day2_ticket) }}</td>
                        <td>{{ c($day2_others) }}</td>
                    </tr><tr>
                        <td>{{ $monthName1 }}-03</td>
                        <td>{{ c($day3_representation) }}</td>
                        <td>{{ c($day3_salaries) }}</td>
                        <td>{{ c($day3_supplies_station) }}</td>
                        <td>{{ c($day3_supplies_main_office) }}</td>
                        <td>{{ c($day3_taxes_bir) }}</td>
                        <td>{{ c($day3_taxes_pcso) }}</td>
                        <td>{{ c($day3_trans_vac) }}</td>
                        <td>{{ c($day3_travelling) }}</td>
                        <td>{{ c($day3_vehicle_rental) }}</td>
                        <td>{{ c($day3_water_drinking) }}</td>
                        <td>{{ c($day3_water_bill) }}</td>
                        <td>{{ c($day3_national) }}</td>
                        <td>{{ c($day3_local) }}</td>
                        <td>{{ c($day3_management) }}</td>
                        <td>{{ c($day3_ticket) }}</td>
                        <td>{{ c($day3_others) }}</td>
                    </tr><tr>
                        <td>{{ $monthName1 }}-04</td>
                        <td>{{ c($day4_representation) }}</td>
                        <td>{{ c($day4_salaries) }}</td>
                        <td>{{ c($day4_supplies_station) }}</td>
                        <td>{{ c($day4_supplies_main_office) }}</td>
                        <td>{{ c($day4_taxes_bir) }}</td>
                        <td>{{ c($day4_taxes_pcso) }}</td>
                        <td>{{ c($day4_trans_vac) }}</td>
                        <td>{{ c($day4_travelling) }}</td>
                        <td>{{ c($day4_vehicle_rental) }}</td>
                        <td>{{ c($day4_water_drinking) }}</td>
                        <td>{{ c($day4_water_bill) }}</td>
                        <td>{{ c($day4_national) }}</td>
                        <td>{{ c($day4_local) }}</td>
                        <td>{{ c($day4_management) }}</td>
                        <td>{{ c($day4_ticket) }}</td>
                        <td>{{ c($day4_others) }}</td>
                    </tr><tr>
                        <td>{{ $monthName1 }}-05</td>
                        <td>{{ c($day5_representation) }}</td>
                        <td>{{ c($day5_salaries) }}</td>
                        <td>{{ c($day5_supplies_station) }}</td>
                        <td>{{ c($day5_supplies_main_office) }}</td>
                        <td>{{ c($day5_taxes_bir) }}</td>
                        <td>{{ c($day5_taxes_pcso) }}</td>
                        <td>{{ c($day5_trans_vac) }}</td>
                        <td>{{ c($day5_travelling) }}</td>
                        <td>{{ c($day5_vehicle_rental) }}</td>
                        <td>{{ c($day5_water_drinking) }}</td>
                        <td>{{ c($day5_water_bill) }}</td>
                        <td>{{ c($day5_national) }}</td>
                        <td>{{ c($day5_local) }}</td>
                        <td>{{ c($day5_management) }}</td>
                        <td>{{ c($day5_ticket) }}</td>
                        <td>{{ c($day5_others) }}</td>
                    </tr><tr>
                        <td>{{ $monthName1 }}-06</td>
                        <td>{{ c($day6_representation) }}</td>
                        <td>{{ c($day6_salaries) }}</td>
                        <td>{{ c($day6_supplies_station) }}</td>
                        <td>{{ c($day6_supplies_main_office) }}</td>
                        <td>{{ c($day6_taxes_bir) }}</td>
                        <td>{{ c($day6_taxes_pcso) }}</td>
                        <td>{{ c($day6_trans_vac) }}</td>
                        <td>{{ c($day6_travelling) }}</td>
                        <td>{{ c($day6_vehicle_rental) }}</td>
                        <td>{{ c($day6_water_drinking) }}</td>
                        <td>{{ c($day6_water_bill) }}</td>
                        <td>{{ c($day6_national) }}</td>
                        <td>{{ c($day6_local) }}</td>
                        <td>{{ c($day6_management) }}</td>
                        <td>{{ c($day6_ticket) }}</td>
                        <td>{{ c($day6_others) }}</td>
                    </tr><tr>
                        <td>{{ $monthName1 }}-07</td>
                        <td>{{ c($day7_representation) }}</td>
                        <td>{{ c($day7_salaries) }}</td>
                        <td>{{ c($day7_supplies_station) }}</td>
                        <td>{{ c($day7_supplies_main_office) }}</td>
                        <td>{{ c($day7_taxes_bir) }}</td>
                        <td>{{ c($day7_taxes_pcso) }}</td>
                        <td>{{ c($day7_trans_vac) }}</td>
                        <td>{{ c($day7_travelling) }}</td>
                        <td>{{ c($day7_vehicle_rental) }}</td>
                        <td>{{ c($day7_water_drinking) }}</td>
                        <td>{{ c($day7_water_bill) }}</td>
                        <td>{{ c($day7_national) }}</td>
                        <td>{{ c($day7_local) }}</td>
                        <td>{{ c($day7_management) }}</td>
                        <td>{{ c($day7_ticket) }}</td>
                        <td>{{ c($day7_others) }}</td>
                    </tr><tr>
                        <td>{{ $monthName1 }}-08</td>
                        <td>{{ c($day8_representation) }}</td>
                        <td>{{ c($day8_salaries) }}</td>
                        <td>{{ c($day8_supplies_station) }}</td>
                        <td>{{ c($day8_supplies_main_office) }}</td>
                        <td>{{ c($day8_taxes_bir) }}</td>
                        <td>{{ c($day8_taxes_pcso) }}</td>
                        <td>{{ c($day8_trans_vac) }}</td>
                        <td>{{ c($day8_travelling) }}</td>
                        <td>{{ c($day8_vehicle_rental) }}</td>
                        <td>{{ c($day8_water_drinking) }}</td>
                        <td>{{ c($day8_water_bill) }}</td>
                        <td>{{ c($day8_national) }}</td>
                        <td>{{ c($day8_local) }}</td>
                        <td>{{ c($day8_management) }}</td>
                        <td>{{ c($day8_ticket) }}</td>
                        <td>{{ c($day8_others) }}</td>
                    </tr><tr>
                        <td>{{ $monthName1 }}-09</td>
                        <td>{{ c($day9_representation) }}</td>
                        <td>{{ c($day9_salaries) }}</td>
                        <td>{{ c($day9_supplies_station) }}</td>
                        <td>{{ c($day9_supplies_main_office) }}</td>
                        <td>{{ c($day9_taxes_bir) }}</td>
                        <td>{{ c($day9_taxes_pcso) }}</td>
                        <td>{{ c($day9_trans_vac) }}</td>
                        <td>{{ c($day9_travelling) }}</td>
                        <td>{{ c($day9_vehicle_rental) }}</td>
                        <td>{{ c($day9_water_drinking) }}</td>
                        <td>{{ c($day9_water_bill) }}</td>
                        <td>{{ c($day9_national) }}</td>
                        <td>{{ c($day9_local) }}</td>
                        <td>{{ c($day9_management) }}</td>
                        <td>{{ c($day9_ticket) }}</td>
                        <td>{{ c($day9_others) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-10</td>
                        <td>{{ c($day10_representation) }}</td>
                        <td>{{ c($day10_salaries) }}</td>
                        <td>{{ c($day10_supplies_station) }}</td>
                        <td>{{ c($day10_supplies_main_office) }}</td>
                        <td>{{ c($day10_taxes_bir) }}</td>
                        <td>{{ c($day10_taxes_pcso) }}</td>
                        <td>{{ c($day10_trans_vac) }}</td>
                        <td>{{ c($day10_travelling) }}</td>
                        <td>{{ c($day10_vehicle_rental) }}</td>
                        <td>{{ c($day10_water_drinking) }}</td>
                        <td>{{ c($day10_water_bill) }}</td>
                        <td>{{ c($day10_national) }}</td>
                        <td>{{ c($day10_local) }}</td>
                        <td>{{ c($day10_management) }}</td>
                        <td>{{ c($day10_ticket) }}</td>
                        <td>{{ c($day10_others) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-11</td>
                        <td>{{ c($day11_representation) }}</td>
                        <td>{{ c($day11_salaries) }}</td>
                        <td>{{ c($day11_supplies_station) }}</td>
                        <td>{{ c($day11_supplies_main_office) }}</td>
                        <td>{{ c($day11_taxes_bir) }}</td>
                        <td>{{ c($day11_taxes_pcso) }}</td>
                        <td>{{ c($day11_trans_vac) }}</td>
                        <td>{{ c($day11_travelling) }}</td>
                        <td>{{ c($day11_vehicle_rental) }}</td>
                        <td>{{ c($day11_water_drinking) }}</td>
                        <td>{{ c($day11_water_bill) }}</td>
                        <td>{{ c($day11_national) }}</td>
                        <td>{{ c($day11_local) }}</td>
                        <td>{{ c($day11_management) }}</td>
                        <td>{{ c($day11_ticket) }}</td>
                        <td>{{ c($day11_others) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-12</td>
                        <td>{{ c($day12_representation) }}</td>
                        <td>{{ c($day12_salaries) }}</td>
                        <td>{{ c($day12_supplies_station) }}</td>
                        <td>{{ c($day12_supplies_main_office) }}</td>
                        <td>{{ c($day12_taxes_bir) }}</td>
                        <td>{{ c($day12_taxes_pcso) }}</td>
                        <td>{{ c($day12_trans_vac) }}</td>
                        <td>{{ c($day12_travelling) }}</td>
                        <td>{{ c($day12_vehicle_rental) }}</td>
                        <td>{{ c($day12_water_drinking) }}</td>
                        <td>{{ c($day12_water_bill) }}</td>
                        <td>{{ c($day12_national) }}</td>
                        <td>{{ c($day12_local) }}</td>
                        <td>{{ c($day12_management) }}</td>
                        <td>{{ c($day12_ticket) }}</td>
                        <td>{{ c($day12_others) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-13</td>
                        <td>{{ c($day13_representation) }}</td>
                        <td>{{ c($day13_salaries) }}</td>
                        <td>{{ c($day13_supplies_station) }}</td>
                        <td>{{ c($day13_supplies_main_office) }}</td>
                        <td>{{ c($day13_taxes_bir) }}</td>
                        <td>{{ c($day13_taxes_pcso) }}</td>
                        <td>{{ c($day13_trans_vac) }}</td>
                        <td>{{ c($day13_travelling) }}</td>
                        <td>{{ c($day13_vehicle_rental) }}</td>
                        <td>{{ c($day13_water_drinking) }}</td>
                        <td>{{ c($day13_water_bill) }}</td>
                        <td>{{ c($day13_national) }}</td>
                        <td>{{ c($day13_local) }}</td>
                        <td>{{ c($day13_management) }}</td>
                        <td>{{ c($day13_ticket) }}</td>
                        <td>{{ c($day13_others) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-14</td>
                        <td>{{ c($day14_representation) }}</td>
                        <td>{{ c($day14_salaries) }}</td>
                        <td>{{ c($day14_supplies_station) }}</td>
                        <td>{{ c($day14_supplies_main_office) }}</td>
                        <td>{{ c($day14_taxes_bir) }}</td>
                        <td>{{ c($day14_taxes_pcso) }}</td>
                        <td>{{ c($day14_trans_vac) }}</td>
                        <td>{{ c($day14_travelling) }}</td>
                        <td>{{ c($day14_vehicle_rental) }}</td>
                        <td>{{ c($day14_water_drinking) }}</td>
                        <td>{{ c($day14_water_bill) }}</td>
                        <td>{{ c($day14_national) }}</td>
                        <td>{{ c($day14_local) }}</td>
                        <td>{{ c($day14_management) }}</td>
                        <td>{{ c($day14_ticket) }}</td>
                        <td>{{ c($day14_others) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-15</td>
                        <td>{{ c($day15_representation) }}</td>
                        <td>{{ c($day15_salaries) }}</td>
                        <td>{{ c($day15_supplies_station) }}</td>
                        <td>{{ c($day15_supplies_main_office) }}</td>
                        <td>{{ c($day15_taxes_bir) }}</td>
                        <td>{{ c($day15_taxes_pcso) }}</td>
                        <td>{{ c($day15_trans_vac) }}</td>
                        <td>{{ c($day15_travelling) }}</td>
                        <td>{{ c($day15_vehicle_rental) }}</td>
                        <td>{{ c($day15_water_drinking) }}</td>
                        <td>{{ c($day15_water_bill) }}</td>
                        <td>{{ c($day15_national) }}</td>
                        <td>{{ c($day15_local) }}</td>
                        <td>{{ c($day15_management) }}</td>
                        <td>{{ c($day15_ticket) }}</td>
                        <td>{{ c($day15_others) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-16</td>
                        <td>{{ c($day16_representation) }}</td>
                        <td>{{ c($day16_salaries) }}</td>
                        <td>{{ c($day16_supplies_station) }}</td>
                        <td>{{ c($day16_supplies_main_office) }}</td>
                        <td>{{ c($day16_taxes_bir) }}</td>
                        <td>{{ c($day16_taxes_pcso) }}</td>
                        <td>{{ c($day16_trans_vac) }}</td>
                        <td>{{ c($day16_travelling) }}</td>
                        <td>{{ c($day16_vehicle_rental) }}</td>
                        <td>{{ c($day16_water_drinking) }}</td>
                        <td>{{ c($day16_water_bill) }}</td>
                        <td>{{ c($day16_national) }}</td>
                        <td>{{ c($day16_local) }}</td>
                        <td>{{ c($day16_management) }}</td>
                        <td>{{ c($day16_ticket) }}</td>
                        <td>{{ c($day16_others) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-17</td>
                        <td>{{ c($day17_representation) }}</td>
                        <td>{{ c($day17_salaries) }}</td>
                        <td>{{ c($day17_supplies_station) }}</td>
                        <td>{{ c($day17_supplies_main_office) }}</td>
                        <td>{{ c($day17_taxes_bir) }}</td>
                        <td>{{ c($day17_taxes_pcso) }}</td>
                        <td>{{ c($day17_trans_vac) }}</td>
                        <td>{{ c($day17_travelling) }}</td>
                        <td>{{ c($day17_vehicle_rental) }}</td>
                        <td>{{ c($day17_water_drinking) }}</td>
                        <td>{{ c($day17_water_bill) }}</td>
                        <td>{{ c($day17_national) }}</td>
                        <td>{{ c($day17_local) }}</td>
                        <td>{{ c($day17_management) }}</td>
                        <td>{{ c($day17_ticket) }}</td>
                        <td>{{ c($day17_others) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-18</td>
                        <td>{{ c($day18_representation) }}</td>
                        <td>{{ c($day18_salaries) }}</td>
                        <td>{{ c($day18_supplies_station) }}</td>
                        <td>{{ c($day18_supplies_main_office) }}</td>
                        <td>{{ c($day18_taxes_bir) }}</td>
                        <td>{{ c($day18_taxes_pcso) }}</td>
                        <td>{{ c($day18_trans_vac) }}</td>
                        <td>{{ c($day18_travelling) }}</td>
                        <td>{{ c($day18_vehicle_rental) }}</td>
                        <td>{{ c($day18_water_drinking) }}</td>
                        <td>{{ c($day18_water_bill) }}</td>
                        <td>{{ c($day18_national) }}</td>
                        <td>{{ c($day18_local) }}</td>
                        <td>{{ c($day18_management) }}</td>
                        <td>{{ c($day18_ticket) }}</td>
                        <td>{{ c($day18_others) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-19</td>
                        <td>{{ c($day19_representation) }}</td>
                        <td>{{ c($day19_salaries) }}</td>
                        <td>{{ c($day19_supplies_station) }}</td>
                        <td>{{ c($day19_supplies_main_office) }}</td>
                        <td>{{ c($day19_taxes_bir) }}</td>
                        <td>{{ c($day19_taxes_pcso) }}</td>
                        <td>{{ c($day19_trans_vac) }}</td>
                        <td>{{ c($day19_travelling) }}</td>
                        <td>{{ c($day19_vehicle_rental) }}</td>
                        <td>{{ c($day19_water_drinking) }}</td>
                        <td>{{ c($day19_water_bill) }}</td>
                        <td>{{ c($day19_national) }}</td>
                        <td>{{ c($day19_local) }}</td>
                        <td>{{ c($day19_management) }}</td>
                        <td>{{ c($day19_ticket) }}</td>
                        <td>{{ c($day19_others) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-20</td>
                        <td>{{ c($day20_representation) }}</td>
                        <td>{{ c($day20_salaries) }}</td>
                        <td>{{ c($day20_supplies_station) }}</td>
                        <td>{{ c($day20_supplies_main_office) }}</td>
                        <td>{{ c($day20_taxes_bir) }}</td>
                        <td>{{ c($day20_taxes_pcso) }}</td>
                        <td>{{ c($day20_trans_vac) }}</td>
                        <td>{{ c($day20_travelling) }}</td>
                        <td>{{ c($day20_vehicle_rental) }}</td>
                        <td>{{ c($day20_water_drinking) }}</td>
                        <td>{{ c($day20_water_bill) }}</td>
                        <td>{{ c($day20_national) }}</td>
                        <td>{{ c($day20_local) }}</td>
                        <td>{{ c($day20_management) }}</td>
                        <td>{{ c($day20_ticket) }}</td>
                        <td>{{ c($day20_others) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-21</td>
                        <td>{{ c($day21_representation) }}</td>
                        <td>{{ c($day21_salaries) }}</td>
                        <td>{{ c($day21_supplies_station) }}</td>
                        <td>{{ c($day21_supplies_main_office) }}</td>
                        <td>{{ c($day21_taxes_bir) }}</td>
                        <td>{{ c($day21_taxes_pcso) }}</td>
                        <td>{{ c($day21_trans_vac) }}</td>
                        <td>{{ c($day21_travelling) }}</td>
                        <td>{{ c($day21_vehicle_rental) }}</td>
                        <td>{{ c($day21_water_drinking) }}</td>
                        <td>{{ c($day21_water_bill) }}</td>
                        <td>{{ c($day21_national) }}</td>
                        <td>{{ c($day21_local) }}</td>
                        <td>{{ c($day21_management) }}</td>
                        <td>{{ c($day21_ticket) }}</td>
                        <td>{{ c($day21_others) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-22</td>
                        <td>{{ c($day22_representation) }}</td>
                        <td>{{ c($day22_salaries) }}</td>
                        <td>{{ c($day22_supplies_station) }}</td>
                        <td>{{ c($day22_supplies_main_office) }}</td>
                        <td>{{ c($day22_taxes_bir) }}</td>
                        <td>{{ c($day22_taxes_pcso) }}</td>
                        <td>{{ c($day22_trans_vac) }}</td>
                        <td>{{ c($day22_travelling) }}</td>
                        <td>{{ c($day22_vehicle_rental) }}</td>
                        <td>{{ c($day22_water_drinking) }}</td>
                        <td>{{ c($day22_water_bill) }}</td>
                        <td>{{ c($day22_national) }}</td>
                        <td>{{ c($day22_local) }}</td>
                        <td>{{ c($day22_management) }}</td>
                        <td>{{ c($day22_ticket) }}</td>
                        <td>{{ c($day22_others) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-23</td>
                        <td>{{ c($day23_representation) }}</td>
                        <td>{{ c($day23_salaries) }}</td>
                        <td>{{ c($day23_supplies_station) }}</td>
                        <td>{{ c($day23_supplies_main_office) }}</td>
                        <td>{{ c($day23_taxes_bir) }}</td>
                        <td>{{ c($day23_taxes_pcso) }}</td>
                        <td>{{ c($day23_trans_vac) }}</td>
                        <td>{{ c($day23_travelling) }}</td>
                        <td>{{ c($day23_vehicle_rental) }}</td>
                        <td>{{ c($day23_water_drinking) }}</td>
                        <td>{{ c($day23_water_bill) }}</td>
                        <td>{{ c($day23_national) }}</td>
                        <td>{{ c($day23_local) }}</td>
                        <td>{{ c($day23_management) }}</td>
                        <td>{{ c($day23_ticket) }}</td>
                        <td>{{ c($day23_others) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-24</td>
                        <td>{{ c($day24_representation) }}</td>
                        <td>{{ c($day24_salaries) }}</td>
                        <td>{{ c($day24_supplies_station) }}</td>
                        <td>{{ c($day24_supplies_main_office) }}</td>
                        <td>{{ c($day24_taxes_bir) }}</td>
                        <td>{{ c($day24_taxes_pcso) }}</td>
                        <td>{{ c($day24_trans_vac) }}</td>
                        <td>{{ c($day24_travelling) }}</td>
                        <td>{{ c($day24_vehicle_rental) }}</td>
                        <td>{{ c($day24_water_drinking) }}</td>
                        <td>{{ c($day24_water_bill) }}</td>
                        <td>{{ c($day24_national) }}</td>
                        <td>{{ c($day24_local) }}</td>
                        <td>{{ c($day24_management) }}</td>
                        <td>{{ c($day24_ticket) }}</td>
                        <td>{{ c($day24_others) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-25</td>
                        <td>{{ c($day25_representation) }}</td>
                        <td>{{ c($day25_salaries) }}</td>
                        <td>{{ c($day25_supplies_station) }}</td>
                        <td>{{ c($day25_supplies_main_office) }}</td>
                        <td>{{ c($day25_taxes_bir) }}</td>
                        <td>{{ c($day25_taxes_pcso) }}</td>
                        <td>{{ c($day25_trans_vac) }}</td>
                        <td>{{ c($day25_travelling) }}</td>
                        <td>{{ c($day25_vehicle_rental) }}</td>
                        <td>{{ c($day25_water_drinking) }}</td>
                        <td>{{ c($day25_water_bill) }}</td>
                        <td>{{ c($day25_national) }}</td>
                        <td>{{ c($day25_local) }}</td>
                        <td>{{ c($day25_management) }}</td>
                        <td>{{ c($day25_ticket) }}</td>
                        <td>{{ c($day25_others) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-26</td>
                        <td>{{ c($day26_representation) }}</td>
                        <td>{{ c($day26_salaries) }}</td>
                        <td>{{ c($day26_supplies_station) }}</td>
                        <td>{{ c($day26_supplies_main_office) }}</td>
                        <td>{{ c($day26_taxes_bir) }}</td>
                        <td>{{ c($day26_taxes_pcso) }}</td>
                        <td>{{ c($day26_trans_vac) }}</td>
                        <td>{{ c($day26_travelling) }}</td>
                        <td>{{ c($day26_vehicle_rental) }}</td>
                        <td>{{ c($day26_water_drinking) }}</td>
                        <td>{{ c($day26_water_bill) }}</td>
                        <td>{{ c($day26_national) }}</td>
                        <td>{{ c($day26_local) }}</td>
                        <td>{{ c($day26_management) }}</td>
                        <td>{{ c($day26_ticket) }}</td>
                        <td>{{ c($day26_others) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-27</td>
                        <td>{{ c($day27_representation) }}</td>
                        <td>{{ c($day27_salaries) }}</td>
                        <td>{{ c($day27_supplies_station) }}</td>
                        <td>{{ c($day27_supplies_main_office) }}</td>
                        <td>{{ c($day27_taxes_bir) }}</td>
                        <td>{{ c($day27_taxes_pcso) }}</td>
                        <td>{{ c($day27_trans_vac) }}</td>
                        <td>{{ c($day27_travelling) }}</td>
                        <td>{{ c($day27_vehicle_rental) }}</td>
                        <td>{{ c($day27_water_drinking) }}</td>
                        <td>{{ c($day27_water_bill) }}</td>
                        <td>{{ c($day27_national) }}</td>
                        <td>{{ c($day27_local) }}</td>
                        <td>{{ c($day27_management) }}</td>
                        <td>{{ c($day27_ticket) }}</td>
                        <td>{{ c($day27_others) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-28</td>
                        <td>{{ c($day28_representation) }}</td>
                        <td>{{ c($day28_salaries) }}</td>
                        <td>{{ c($day28_supplies_station) }}</td>
                        <td>{{ c($day28_supplies_main_office) }}</td>
                        <td>{{ c($day28_taxes_bir) }}</td>
                        <td>{{ c($day28_taxes_pcso) }}</td>
                        <td>{{ c($day28_trans_vac) }}</td>
                        <td>{{ c($day28_travelling) }}</td>
                        <td>{{ c($day28_vehicle_rental) }}</td>
                        <td>{{ c($day28_water_drinking) }}</td>
                        <td>{{ c($day28_water_bill) }}</td>
                        <td>{{ c($day28_national) }}</td>
                        <td>{{ c($day28_local) }}</td>
                        <td>{{ c($day28_management) }}</td>
                        <td>{{ c($day28_ticket) }}</td>
                        <td>{{ c($day28_others) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-29</td>
                        <td>{{ c($day29_representation) }}</td>
                        <td>{{ c($day29_salaries) }}</td>
                        <td>{{ c($day29_supplies_station) }}</td>
                        <td>{{ c($day29_supplies_main_office) }}</td>
                        <td>{{ c($day29_taxes_bir) }}</td>
                        <td>{{ c($day29_taxes_pcso) }}</td>
                        <td>{{ c($day29_trans_vac) }}</td>
                        <td>{{ c($day29_travelling) }}</td>
                        <td>{{ c($day29_vehicle_rental) }}</td>
                        <td>{{ c($day29_water_drinking) }}</td>
                        <td>{{ c($day29_water_bill) }}</td>
                        <td>{{ c($day29_national) }}</td>
                        <td>{{ c($day29_local) }}</td>
                        <td>{{ c($day29_management) }}</td>
                        <td>{{ c($day29_ticket) }}</td>
                        <td>{{ c($day29_others) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-30</td>
                        <td>{{ c($day30_representation) }}</td>
                        <td>{{ c($day30_salaries) }}</td>
                        <td>{{ c($day30_supplies_station) }}</td>
                        <td>{{ c($day30_supplies_main_office) }}</td>
                        <td>{{ c($day30_taxes_bir) }}</td>
                        <td>{{ c($day30_taxes_pcso) }}</td>
                        <td>{{ c($day30_trans_vac) }}</td>
                        <td>{{ c($day30_travelling) }}</td>
                        <td>{{ c($day30_vehicle_rental) }}</td>
                        <td>{{ c($day30_water_drinking) }}</td>
                        <td>{{ c($day30_water_bill) }}</td>
                        <td>{{ c($day30_national) }}</td>
                        <td>{{ c($day30_local) }}</td>
                        <td>{{ c($day30_management) }}</td>
                        <td>{{ c($day30_ticket) }}</td>
                        <td>{{ c($day30_others) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $monthName1 }}-31</td>
                        <td>{{ c($day31_representation) }}</td>
                        <td>{{ c($day31_salaries) }}</td>
                        <td>{{ c($day31_supplies_station) }}</td>
                        <td>{{ c($day31_supplies_main_office) }}</td>
                        <td>{{ c($day31_taxes_bir) }}</td>
                        <td>{{ c($day31_taxes_pcso) }}</td>
                        <td>{{ c($day31_trans_vac) }}</td>
                        <td>{{ c($day31_travelling) }}</td>
                        <td>{{ c($day31_vehicle_rental) }}</td>
                        <td>{{ c($day31_water_drinking) }}</td>
                        <td>{{ c($day31_water_bill) }}</td>
                        <td>{{ c($day31_national) }}</td>
                        <td>{{ c($day31_local) }}</td>
                        <td>{{ c($day31_management) }}</td>
                        <td>{{ c($day31_ticket) }}</td>
                        <td>{{ c($day31_others) }}</td>
                    </tr>


                    {{-- TOTAL --}}
                    <tr id="total">
                        <td>TOTAL</td>
                        <td>{{ c($total_representation) }}</td>
                        <td>{{ c($total_salaries) }}</td>
                        <td>{{ c($total_supplies_station) }}</td>
                        <td>{{ c($total_supplies_main_office) }}</td>
                        <td>{{ c($total_taxes_bir) }}</td>
                        <td>{{ c($total_taxes_pcso) }}</td>
                        <td>{{ c($total_trans_vac) }}</td>
                        <td>{{ c($total_travelling) }}</td>
                        <td>{{ c($total_vehicle_rental) }}</td>
                        <td>{{ c($total_water_drinking) }}</td>
                        <td>{{ c($total_water_bill) }}</td>
                        <td>{{ c($total_national) }}</td>
                        <td>{{ c($total_local) }}</td>
                        <td>{{ c($total_management) }}</td>
                        <td>{{ c($total_ticket) }}</td>
                        <td>{{ c($total_others) }}</td>
                    </tr>
              
                </tbody>
            </table>


            <h4>TOTAL EXPENSES :{{ c1( $grand_total) }}</h4>
            <h4>TOTAL EXPENSES :{{ c1( $exp) }}</h4>


        </div>
    </div>
</div>


@php
     function c($x){
        if ($x!='') {
           $x=number_format($x,2);
            return $x;
        }else{
            return $x;
        }
    }

    function c1($x){
        if ($x!='') {
           $x=number_format($x,0);
            return $x;
        }else{
            return $x;
        }
    }
@endphp
@endsection
