@extends('layouts.app')

@section('content')
@section('page-css')
    <link href="{{ asset('css/attendance.css') }}" rel="stylesheet">
@endsection

<div class="container mt-4 mb-4 pl-4 pr-4"> 
    <div class="row justify-content-center">
        <table class="dcb">
            <thead>
                <tr  id="head">
                    <th style="width:250px">NAME</th>
                    <th>01</th>
                    <th>02</th>
                    <th>03</th>
                    <th>04</th>
                    <th>05</th>
                    <th>06</th>
                    <th>07</th>
                    <th>08</th>
                    <th>09</th>
                    <th>10</th>
                    <th>11</th>
                    <th>12</th>
                    <th>13</th>
                    <th>14</th>
                    <th>15</th>
                    <th>16</th>
                    <th>17</th>
                    <th>18</th>
                    <th>19</th>
                    <th>20</th>
                    <th>21</th>
                    <th>22</th>
                    <th>23</th>
                    <th>24</th>
                    <th>25</th>
                    <th>26</th>
                    <th>27</th>
                    <th>28</th>
                    <th>29</th>
                    <th>30</th>
                    <th>31</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($pay as $attend)
                    <tr id="body">
                        <td>{{ $attend->emp_name }}</td>
                        
                        @if ($attend->d01=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d02=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d03=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d04=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d05=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d06=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d07=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d08=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d09=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d10=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d11=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d12=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d13=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d14=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d15=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d16=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d17=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d18=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d19=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d20=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d21=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d22=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d23=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d24=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d25=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d26=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d27=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d28=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d29=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d30=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                        @if ($attend->d31=='')
                            <td></td>
                        @else
                            <td class="bg-danger"><a href="" >X</a></td>
                        @endif

                    </tr>
                @endforeach
              
            </tbody>
        </table>

        {{-- <table class="table table-bordered table-sm" id="tbl1">
            <thead>
                <tr>
                    <th>DATE</th>
                    <th>NAME</th>
                    <th>DEPT</th>
                    <th>STATION</th>
                </tr>
            </thead>

            <tbody id="tbl_body1" >
        
            @foreach ($pay as $emps)
                <tr>
                    <td>{{ $emps->date_of_absent }}</td>
                    <td>{{ $emps->emp_name }}</td>
                    <td>{{ $emps->department }}</td>
                    <td>{{ $emps->station }}</td>
                </tr>
            @endforeach
            </tbody>
        </table> --}}
        
    </div>
</div>



<script>
    function myFunction() {
        if(!confirm("Are you sure you want to remove this records?"))
        event.preventDefault();
    }
</script>
@endsection

