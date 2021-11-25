<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalExpRecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_exp_recs', function (Blueprint $table) {
            $table->id();
            $table->string('date_of_receipt');
            $table->string('date_encoded')->nullable();
            $table->string('receipt_no')->nullable();
            $table->string('station')->nullable();
            $table->string('cash_in')->nullable();
            $table->string('cash_out')->nullable();
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
        Schema::dropIfExists('additional_exp_recs');
    }
}
