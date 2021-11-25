<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesAssumpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_assumps', function (Blueprint $table) {
            $table->id();
            $table->string('p_date');
            $table->string('station');
            $table->string('AM_in')->nullable();
            $table->string('AM_out')->nullable();
            $table->string('PM_in')->nullable();
            $table->string('PM_out')->nullable();
            $table->string('EXTRA_in')->nullable();
            $table->string('EXTRA_out')->nullable();
            $table->string('tot_in')->nullable();
            $table->string('tot_out')->nullable();
            $table->integer('status')->default(1);
            $table->integer('accepted')->default(0);
            $table->string('user_id');
            $table->string('username');
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
        Schema::dropIfExists('sales_assumps');
    }
}
