<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreSaleAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('pre_sale_admin')) return; 

        Schema::create('pre_sale_admin', function (Blueprint $table) {
            $table->id();
            $table->string('date_of_sale');
            $table->string('date_encoded')->nullable();
            $table->string('station')->nullable();
            $table->string('AM_in')->nullable();
            $table->string('AM_out')->nullable();
            $table->string('PM_in')->nullable();
            $table->string('PM_out')->nullable();
            $table->string('EXTRA_in')->nullable();
            $table->string('EXTRA_out')->nullable();
            $table->string('tot_in')->nullable();
            $table->string('tot_out')->nullable();
            $table->string('net_sales')->nullable();
            $table->string('username');
            $table->string('user_id');
            $table->string('accepted')->nullable();
            $table->string('status')->default(1);
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('pre_sale_admin');
    }
}
