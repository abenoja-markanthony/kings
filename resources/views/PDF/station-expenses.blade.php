@php
$monthNum  = $month;
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$monthName = $dateObj->format('F'); // March
$monthName1 = $dateObj->format('M'); // March
$g_total=
$main_office_exp+
$aritao_exp+
$ambaguio1_exp+
$ambaguio2_exp+
$bagabag_exp+
$bambang1_exp+
$bambang2_exp+
$bayombong_exp+
$castaneda_exp+
$diadi_exp+
$dupax_norte1_exp+
$dupax_norte2_exp+
$dupax_sur_exp+
$kayapa1_exp+
$kayapa2_exp+
$kasibu_exp+
$quezon_exp+
$solano1_exp+
$solano2_exp+
$sta_fe_exp+
$villaverde_exp;
@endphp 

<h1>&nbsp;</h1>
<div>
    <h3 class="t_center">MAIN OFFICE AND STATION EXPENSES</h3>
    <h5 class="t_center">NUEVA VIZCAYA - {{ $monthName." ".$year }}</h5>
</div>

<table  id="dcb" >
    <thead>
        <tr id="head">
            <th style="width:50%">STATION</th>
            <th>MONTHLY TOTAL EXPENSES</th>
        </tr>
    </thead>
    </thead>
    <tbody  id="body">
        <tr>
            <td class="t_center">MAIN OFFICE</td>
            <td class="t_right">{{ c($main_office_exp) }}</td>
        </tr>
        <tr>
            <td class="t_center">ARITAO</td>
            <td class="t_right">{{ c($aritao_exp) }}</td>
        </tr>
        <tr>
            <td class="t_center">AMBAGUIO 1</td>
            <td class="t_right">{{ c($ambaguio1_exp) }}</td>
        </tr>
        <tr>
            <td class="t_center">AMBAGUIO 2</td>
            <td class="t_right">{{ c($ambaguio2_exp) }}</td>
        </tr>
        <tr>
            <td class="t_center">BAGABAG</td>
            <td class="t_right">{{ c($bagabag_exp) }}</td>
        </tr>
        <tr>
            <td class="t_center">BAMBANG 1</td>
            <td class="t_right">{{ c($bambang1_exp) }}</td>
        </tr>
        <tr>
            <td class="t_center">BAMBANG 2</td>
            <td class="t_right">{{ c($bambang2_exp) }}</td>
        </tr>
        <tr>
            <td class="t_center">BAYOMBONG</td>
            <td class="t_right">{{ c($bayombong_exp) }}</td>
        </tr>
        <tr>
            <td class="t_center">CASTANEDA</td>
            <td class="t_right">{{ c($castaneda_exp) }}</td>
        </tr>
        <tr>
            <td class="t_center">DIADI</td>
            <td class="t_right">{{ c($diadi_exp) }}</td>
        </tr>
        <tr>
            <td class="t_center">DUPAX NORTE 1</td>
            <td class="t_right">{{ c($dupax_norte1_exp) }}</td>
        </tr>
        <tr>
            <td class="t_center">DUPAX NORTE 2</td>
            <td class="t_right">{{ c($dupax_norte2_exp) }}</td>
        </tr>
        <tr>
            <td class="t_center">DUPAX SUR</td>
            <td class="t_right">{{ c($dupax_sur_exp) }}</td>
        </tr>
        <tr>
            <td class="t_center">KAYAPA 1</td>
            <td class="t_right">{{ c($kayapa1_exp) }}</td>
        </tr>
        <tr>
            <td class="t_center">KAYAPA 2</td>
            <td class="t_right">{{ c($kayapa2_exp) }}</td>
        </tr>
        <tr>
            <td class="t_center">KASIBU</td>
            <td class="t_right">{{ c($kasibu_exp) }}</td>
        </tr>
        <tr>
            <td class="t_center">QUEZON</td>
            <td class="t_right">{{ c($quezon_exp) }}</td>
        </tr>
        <tr>
            <td class="t_center">SOLANO 1</td>
            <td class="t_right">{{ c($solano1_exp) }}</td>
        </tr>
        <tr>
            <td class="t_center">SOLANO 2</td>
            <td class="t_right">{{ c($solano2_exp) }}</td>
        </tr>
        <tr>
            <td class="t_center">STA. FE</td>
            <td class="t_right">{{ c($sta_fe_exp) }}</td>
        </tr>
        <tr>
            <td class="t_center">VILLAVERDE</td>
            <td class="t_right">{{ c($villaverde_exp) }}</td>
        </tr>
        <tr id="total">
            <td class="t_center"><h3>GRAND TOTAL</h3></td>
            <td class="t_right"><h3>{{ c1($g_total) }}</h3></td>
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
    function c1($x){
        if ($x!='') {
           $x=number_format($x,0);
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