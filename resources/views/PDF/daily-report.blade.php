
                   <h1>&nbsp;</h1>
                   <h3> {{ date('M. d, Y', strtotime($search_date)) }}</h3>

                    <table  id="dcb">
                        <thead>
                            <tr  id="head">
                                <th>STATION</th>
                                <th>SALES</th>
                                <th>TABLE OUT</th>
                                <th>CASH IN</th>
                                <th>CASH OUT</th>
                                <th>TOTAL</th>
                                <th>DISBURSMENT</th>
                                <th>NET</th>
                            </tr>
                        </thead>

                        <tbody>

                                <tr  id="body">
                                    <td>MAIN OFFICE</td>
                                    <td>{{ c($main_office_tot_in) }}</td>
                                    <td>{{ c($main_office_tot_out) }}</td>
                                    <td>{{ c($main_office_tot_cashin) }}</td>
                                    <td>{{ c($main_office_tot_others) }}</td>
                                    <td>{{ c(a($main_office_tot_in)+a($main_office_tot_cashin)-a($main_office_tot_out)-a($main_office_tot_others)) }}</td>
                                    <td>{{ c($main_office_exp) }}</td>
                                    <td>{{ c(a($main_office_tot_in)+a($main_office_tot_cashin)-a($main_office_exp)-a($main_office_tot_out)-a($main_office_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>ARITAO</td>
                                    <td>{{ c($aritao_tot_in) }}</td>
                                    <td>{{ c($aritao_tot_out) }}</td>
                                    <td>{{ c($aritao_tot_cashin) }}</td>
                                    <td>{{ c($aritao_tot_others) }}</td>
                                    <td>{{ c(a($aritao_tot_in)+a($aritao_tot_cashin)-a($aritao_tot_out)-a($aritao_tot_others)) }}</td>
                                    <td>{{ c($aritao_exp) }}</td>
                                    <td>{{ c(a($aritao_tot_in)+a($aritao_tot_cashin)-a($aritao_exp)-a($aritao_tot_out)-a($aritao_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>AMBAGUIO 1</td>
                                    <td>{{ c($ambaguio1_tot_in) }}</td>
                                    <td>{{ c($ambaguio1_tot_out) }}</td>
                                    <td>{{ c($ambaguio1_tot_cashin) }}</td>
                                    <td>{{ c($ambaguio1_tot_others) }}</td>
                                    <td>{{ c(a($ambaguio1_tot_in)+a($ambaguio1_tot_cashin)-a($ambaguio1_tot_out)-a($ambaguio1_tot_others)) }}</td>
                                    <td>{{ c($ambaguio1_exp) }}</td>
                                    <td>{{ c(a($ambaguio1_tot_in)+a($ambaguio1_tot_cashin)-a($ambaguio1_exp)-a($ambaguio1_tot_out)-a($ambaguio1_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>AMBAGUIO 2</td>
                                    <td>{{ c($ambaguio2_tot_in) }}</td>
                                    <td>{{ c($ambaguio2_tot_out) }}</td>
                                    <td>{{ c($ambaguio2_tot_cashin) }}</td>
                                    <td>{{ c($ambaguio2_tot_others) }}</td>
                                    <td>{{ c(a($ambaguio2_tot_in)+a($ambaguio2_tot_cashin)-a($ambaguio2_tot_out)-a($ambaguio2_tot_others)) }}</td>
                                    <td>{{ c($ambaguio2_exp) }}</td>
                                    <td>{{ c(a($ambaguio2_tot_in)+a($ambaguio2_tot_cashin)-a($ambaguio2_exp)-a($ambaguio2_tot_out)-a($ambaguio2_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>BAGABAG</td>
                                    <td>{{ c($bagabag_tot_in) }}</td>
                                    <td>{{ c($bagabag_tot_out) }}</td>
                                    <td>{{ c($bagabag_tot_cashin) }}</td>
                                    <td>{{ c($bagabag_tot_others) }}</td>
                                    <td>{{ c(a($bagabag_tot_in)+a($bagabag_tot_cashin)-a($bagabag_tot_out)-a($bagabag_tot_others)) }}</td>
                                    <td>{{ c($bagabag_exp) }}</td>
                                    <td>{{ c(a($bagabag_tot_in)+a($bagabag_tot_cashin)-a($bagabag_exp)-a($bagabag_tot_out)-a($bagabag_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>BAMBANG 1</td>
                                    <td>{{ c($bambang1_tot_in) }}</td>
                                    <td>{{ c($bambang1_tot_out) }}</td>
                                    <td>{{ c($bambang1_tot_cashin) }}</td>
                                    <td>{{ c($bambang1_tot_others) }}</td>
                                    <td>{{ c(a($bambang1_tot_in)+a($bambang1_tot_cashin)-a($bambang1_tot_out)-a($bambang1_tot_others)) }}</td>
                                    <td>{{ c($bambang1_exp) }}</td>
                                    <td>{{ c(a($bambang1_tot_in)+a($bambang1_tot_cashin)-a($bambang1_exp)-a($bambang1_tot_out)-a($bambang1_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>BAMBANG 2</td>
                                    <td>{{ c($bambang2_tot_in) }}</td>
                                    <td>{{ c($bambang2_tot_out) }}</td>
                                    <td>{{ c($bambang2_tot_cashin) }}</td>
                                    <td>{{ c($bambang2_tot_others) }}</td>
                                    <td>{{ c(a($bambang2_tot_in)+a($bambang2_tot_cashin)-a($bambang2_tot_out)-a($bambang2_tot_others)) }}</td>
                                    <td>{{ c($bambang2_exp) }}</td>
                                    <td>{{ c(a($bambang2_tot_in)+a($bambang2_tot_cashin)-a($bambang2_exp)-a($bambang2_tot_out)-a($bambang2_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>BOYOMBONG</td>
                                    <td>{{ c($bayombong_tot_in) }}</td>
                                    <td>{{ c($bayombong_tot_out) }}</td>
                                    <td>{{ c($bayombong_tot_cashin) }}</td>
                                    <td>{{ c($bayombong_tot_others) }}</td>
                                    <td>{{ c(a($bayombong_tot_in)+a($bayombong_tot_cashin)-a($bayombong_tot_out)-a($bayombong_tot_others)) }}</td>
                                    <td>{{ c($bayombong_exp) }}</td>
                                    <td>{{ c(a($bayombong_tot_in)+a($bayombong_tot_cashin)-a($bayombong_exp)-a($bayombong_tot_out)-a($bayombong_tot_others)) }}</td>
                                </tr>


                                <tr>
                                    <td>CASTANEDA</td>
                                    <td>{{ c($castaneda_tot_in) }}</td>
                                    <td>{{ c($castaneda_tot_out) }}</td>
                                    <td>{{ c($castaneda_tot_cashin) }}</td>
                                    <td>{{ c($castaneda_tot_others) }}</td>
                                    <td>{{ c(a($castaneda_tot_in)+a($castaneda_tot_cashin)-a($castaneda_tot_out)-a($castaneda_tot_others)) }}</td>
                                    <td>{{ c($castaneda_exp) }}</td>
                                    <td>{{ c(a($castaneda_tot_in)+a($castaneda_tot_cashin)-a($castaneda_exp)-a($castaneda_tot_out)-a($castaneda_tot_others)) }}</td>
                                </tr>


                                <tr>
                                    <td>DIADI</td>
                                    <td>{{ c($diadi_tot_in) }}</td>
                                    <td>{{ c($diadi_tot_out) }}</td>
                                    <td>{{ c($diadi_tot_cashin) }}</td>
                                    <td>{{ c($diadi_tot_others) }}</td>
                                    <td>{{ c(a($diadi_tot_in)+a($diadi_tot_cashin)-a($diadi_tot_out)-a($diadi_tot_others)) }}</td>
                                    <td>{{ c($diadi_exp) }}</td>
                                    <td>{{ c(a($diadi_tot_in)+a($diadi_tot_cashin)-a($diadi_exp)-a($diadi_tot_out)-a($diadi_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>DUPAX NORTE 1</td>
                                    <td>{{ c($dupax_norte1_tot_in) }}</td>
                                    <td>{{ c($dupax_norte1_tot_out) }}</td>
                                    <td>{{ c($dupax_norte1_tot_cashin) }}</td>
                                    <td>{{ c($dupax_norte1_tot_others) }}</td>
                                    <td>{{ c(a($dupax_norte1_tot_in)+a($dupax_norte1_tot_cashin)-a($dupax_norte1_tot_out)-a($dupax_norte1_tot_others)) }}</td>
                                    <td>{{ c($dupax_norte1_exp) }}</td>
                                    <td>{{ c(a($dupax_norte1_tot_in)+a($dupax_norte1_tot_cashin)-a($dupax_norte1_exp)-a($dupax_norte1_tot_out)-a($dupax_norte1_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>DUPAX NORTE 2</td>
                                    <td>{{ c($dupax_norte2_tot_in) }}</td>
                                    <td>{{ c($dupax_norte2_tot_out) }}</td>
                                    <td>{{ c($dupax_norte2_tot_cashin) }}</td>
                                    <td>{{ c($dupax_norte2_tot_others) }}</td>
                                    <td>{{ c(a($dupax_norte2_tot_in)+a($dupax_norte2_tot_cashin)-a($dupax_norte2_tot_out)-a($dupax_norte2_tot_others)) }}</td>
                                    <td>{{ c($dupax_norte2_exp) }}</td>
                                    <td>{{ c(a($dupax_norte2_tot_in)+a($dupax_norte2_tot_cashin)-a($dupax_norte2_exp)-a($dupax_norte2_tot_out)-a($dupax_norte2_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>DUPAX SUR</td>
                                    <td>{{ c($dupax_sur_tot_in) }}</td>
                                    <td>{{ c($dupax_sur_tot_out) }}</td>
                                    <td>{{ c($dupax_sur_tot_cashin) }}</td>
                                    <td>{{ c($dupax_sur_tot_others) }}</td>
                                    <td>{{ c(a($dupax_sur_tot_in)+a($dupax_sur_tot_cashin)-a($dupax_sur_tot_out)-a($dupax_sur_tot_others)) }}</td>
                                    <td>{{ c($dupax_sur_exp) }}</td>
                                    <td>{{ c(a($dupax_sur_tot_in)+a($dupax_sur_tot_cashin)-a($dupax_sur_exp)-a($dupax_sur_tot_out)-a($dupax_sur_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>KAYAPA 1</td>
                                    <td>{{ c($kayapa1_tot_in) }}</td>
                                    <td>{{ c($kayapa1_tot_out) }}</td>
                                    <td>{{ c($kayapa1_tot_cashin) }}</td>
                                    <td>{{ c($kayapa1_tot_others) }}</td>
                                    <td>{{ c(a($kayapa1_tot_in)+a($kayapa1_tot_cashin)-a($kayapa1_tot_out)-a($kayapa1_tot_others)) }}</td>
                                    <td>{{ c($kayapa1_exp) }}</td>
                                    <td>{{ c(a($kayapa1_tot_in)+a($kayapa1_tot_cashin)-a($kayapa1_exp)-a($kayapa1_tot_out)-a($kayapa1_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>KAYAPA 2</td>
                                    <td>{{ c($kayapa2_tot_in) }}</td>
                                    <td>{{ c($kayapa2_tot_out) }}</td>
                                    <td>{{ c($kayapa2_tot_cashin) }}</td>
                                    <td>{{ c($kayapa2_tot_others) }}</td>
                                    <td>{{ c(a($kayapa2_tot_in)+a($kayapa2_tot_cashin)-a($kayapa2_tot_out)-a($kayapa2_tot_others)) }}</td>
                                    <td>{{ c($kayapa2_exp) }}</td>
                                    <td>{{ c(a($kayapa2_tot_in)+a($kayapa2_tot_cashin)-a($kayapa2_exp)-a($kayapa2_tot_out)-a($kayapa2_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>KASIBU</td>
                                    <td>{{ c($kasibu_tot_in) }}</td>
                                    <td>{{ c($kasibu_tot_out) }}</td>
                                    <td>{{ c($kasibu_tot_cashin) }}</td>
                                    <td>{{ c($kasibu_tot_others) }}</td>
                                    <td>{{ c(a($kasibu_tot_in)+a($kasibu_tot_cashin)-a($kasibu_tot_out)-a($kasibu_tot_others)) }}</td>
                                    <td>{{ c($kasibu_exp) }}</td>
                                    <td>{{ c(a($kasibu_tot_in)+a($kasibu_tot_cashin)-a($kasibu_exp)-a($kasibu_tot_out)-a($kasibu_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>QUEZON</td>
                                    <td>{{ c($quezon_tot_in) }}</td>
                                    <td>{{ c($quezon_tot_out) }}</td>
                                    <td>{{ c($quezon_tot_cashin) }}</td>
                                    <td>{{ c($quezon_tot_others) }}</td>
                                    <td>{{ c(a($quezon_tot_in)+a($quezon_tot_cashin)-a($quezon_tot_out)-a($quezon_tot_others)) }}</td>
                                    <td>{{ c($quezon_exp) }}</td>
                                    <td>{{ c(a($quezon_tot_in)+a($quezon_tot_cashin)-a($quezon_exp)-a($quezon_tot_out)-a($quezon_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>SOLANO 1</td>
                                    <td>{{ c($solano1_tot_in) }}</td>
                                    <td>{{ c($solano1_tot_out) }}</td>
                                    <td>{{ c($solano1_tot_cashin) }}</td>
                                    <td>{{ c($solano1_tot_others) }}</td>
                                    <td>{{ c(a($solano1_tot_in)+a($solano1_tot_cashin)-a($solano1_tot_out)-a($solano1_tot_others)) }}</td>
                                    <td>{{ c($solano1_exp) }}</td>
                                    <td>{{ c(a($solano1_tot_in)+a($solano1_tot_cashin)-a($solano1_exp)-a($solano1_tot_out)-a($solano1_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>SOLANO 2</td>
                                    <td>{{ c($solano2_tot_in) }}</td>
                                    <td>{{ c($solano2_tot_out) }}</td>
                                    <td>{{ c($solano2_tot_cashin) }}</td>
                                    <td>{{ c($solano2_tot_others) }}</td>
                                    <td>{{ c(a($solano2_tot_in)+a($solano2_tot_cashin)-a($solano2_tot_out)-a($solano2_tot_others)) }}</td>
                                    <td>{{ c($solano2_exp) }}</td>
                                    <td>{{ c(a($solano2_tot_in)+a($solano2_tot_cashin)-a($solano2_exp)-a($solano2_tot_out)-a($solano2_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>STA. FE</td>
                                    <td>{{ c($sta_fe_tot_in) }}</td>
                                    <td>{{ c($sta_fe_tot_out) }}</td>
                                    <td>{{ c($sta_fe_tot_cashin) }}</td>
                                    <td>{{ c($sta_fe_tot_others) }}</td>
                                    <td>{{ c(a($sta_fe_tot_in)+a($sta_fe_tot_cashin)-a($sta_fe_tot_out)-a($sta_fe_tot_others)) }}</td>
                                    <td>{{ c($sta_fe_exp) }}</td>
                                    <td>{{ c(a($sta_fe_tot_in)+a($sta_fe_tot_cashin)-a($sta_fe_exp)-a($sta_fe_tot_out)-a($sta_fe_tot_others)) }}</td>
                                </tr>

                                <tr>
                                    <td>VILLAVERDE</td>
                                    <td>{{ c($villaverde_tot_in) }}</td>
                                    <td>{{ c($villaverde_tot_out) }}</td>
                                    <td>{{ c($villaverde_tot_cashin) }}</td>
                                    <td>{{ c($villaverde_tot_others) }}</td>
                                    <td>{{ c(a($villaverde_tot_in)+a($villaverde_tot_cashin)-a($villaverde_tot_out)-a($villaverde_tot_others)) }}</td>
                                    <td>{{ c($villaverde_exp) }}</td>
                                    <td>{{ c(a($villaverde_tot_in)+a($villaverde_tot_cashin)-a($villaverde_exp)-a($villaverde_tot_out)-a($villaverde_tot_others)) }}</td>
                                </tr>



                                <tr style="background-color: orange">
                                    <td><b>GRAND TOTAL</b></td>
                                    <td>{{ c($Gtotal_in) }}</td>
                                    <td>{{ c($Gtotal_out) }}</td>
                                    <td>{{ c($Gtotal_cashin) }}</td>
                                    <td>{{ c($Gtotal_others) }}</td>
                                    <td>{{ c(a($Gtotal_in)+a($Gtotal_cashin)-a($Gtotal_out)-a($Gtotal_others)) }}</td>
                                    <td>{{ c($Gtotal_exp) }}</td>
                                    <td ><h4>{{ c(a($Gtotal_in)+a($Gtotal_cashin)-a($Gtotal_exp)-a($Gtotal_out)-a($Gtotal_others)) }}</h4></td>
                                </tr>
                      
                        </tbody>
                    </table>


                    @php
                        $netTotal=a($Gtotal_in)+a($Gtotal_cashin)-a($Gtotal_exp)-a($Gtotal_out)-a($Gtotal_others);
                        $new_total=$cashonhand+$netTotal;
                    @endphp

                 

                   

                <h1>&nbsp;</h1>
                {{-- <div id="accept_by" >
                    <h5>Accepted By:{{ $name}}</h5>
                </div> --}}

                 

       
               


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
