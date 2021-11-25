<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyColSumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_col_sum', function (Blueprint $table) {
            $table->id();
            $table->string('date_of_sale');
            $table->string('tot_in')->nullable();
            $table->string('tot_out')->nullable();
            $table->string('net_sales')->nullable();
            $table->string('username');
            $table->string('user_id');
            $table->string('status')->default(1);
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
        Schema::dropIfExists('daily_col_sum');
    }
}
