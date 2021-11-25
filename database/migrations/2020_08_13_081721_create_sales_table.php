<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('dcb_date')->nullable();
            $table->string('main_office_tot_in')->nullable();
            $table->string('main_office_tot_out')->nullable();
            $table->string('main_office_exp')->nullable();
            $table->string('aritao_tot_in')->nullable();
            $table->string('aritao_tot_out')->nullable();
            $table->string('aritao_exp')->nullable();
            $table->string('ambaguio1_tot_in')->nullable();
            $table->string('ambaguio1_tot_out')->nullable();
            $table->string('ambaguio1_exp')->nullable();
            $table->string('ambaguio2_tot_in')->nullable();
            $table->string('ambaguio2_tot_out')->nullable();
            $table->string('ambaguio2_exp')->nullable();
            $table->string('bagabag_tot_in')->nullable();
            $table->string('bagabag_tot_out')->nullable();
            $table->string('bagabag_exp')->nullable();
            $table->string('bambang1_tot_in')->nullable();
            $table->string('bambang1_tot_out')->nullable();
            $table->string('bambang1_exp')->nullable();
            $table->string('bambang2_tot_in')->nullable();
            $table->string('bambang2_tot_out')->nullable();
            $table->string('bambang2_exp')->nullable();
            $table->string('bayombong_tot_in')->nullable();
            $table->string('bayombong_tot_out')->nullable();
            $table->string('bayombong_exp')->nullable();
            $table->string('castaneda_tot_in')->nullable();
            $table->string('castaneda_tot_out')->nullable();
            $table->string('castaneda_exp')->nullable();
            $table->string('diadi_tot_in')->nullable();
            $table->string('diadi_tot_out')->nullable();
            $table->string('diadi_exp')->nullable();
            $table->string('dupax_norte1_tot_in')->nullable();
            $table->string('dupax_norte1_tot_out')->nullable();
            $table->string('dupax_norte1_exp')->nullable();
            $table->string('dupax_norte2_tot_in')->nullable();
            $table->string('dupax_norte2_tot_out')->nullable();
            $table->string('dupax_norte2_exp')->nullable();
            $table->string('dupax_sur_tot_in')->nullable();
            $table->string('dupax_sur_tot_out')->nullable();
            $table->string('dupax_sur_exp')->nullable();
            $table->string('kayapa1_tot_in')->nullable();
            $table->string('kayapa1_tot_out')->nullable();
            $table->string('kayapa1_exp')->nullable();
            $table->string('kayapa2_tot_in')->nullable();
            $table->string('kayapa2_tot_out')->nullable();
            $table->string('kayapa2_exp')->nullable();
            $table->string('kasibu_tot_in')->nullable();
            $table->string('kasibu_tot_out')->nullable();
            $table->string('kasibu_exp')->nullable();
            $table->string('quezon_tot_in')->nullable();
            $table->string('quezon_tot_out')->nullable();
            $table->string('quezon_exp')->nullable();
            $table->string('solano1_tot_in')->nullable();
            $table->string('solano1_tot_out')->nullable();
            $table->string('solano1_exp')->nullable();
            $table->string('solano2_tot_in')->nullable();
            $table->string('solano2_tot_out')->nullable();
            $table->string('solano2_exp')->nullable();
            $table->string('sta_fe_tot_in')->nullable();
            $table->string('sta_fe_tot_out')->nullable();
            $table->string('sta_fe_exp')->nullable();
            $table->string('villaverde_tot_in')->nullable();
            $table->string('villaverde_tot_out')->nullable();
            $table->string('villaverde_exp')->nullable();
            $table->string('Gtotal_in')->nullable();
            $table->string('Gtotal_out')->nullable();
            $table->string('Gtotal_exp')->nullable();
            $table->string('beg_balance')->nullable();
            $table->string('netTotal')->nullable();
            $table->string('new_balance')->nullable();
            $table->string('user_id');
            $table->string('status');
            $table->timestamps();
            
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
