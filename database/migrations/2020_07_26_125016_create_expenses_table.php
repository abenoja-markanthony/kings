<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('e_date');
            $table->string('date_encoded');
            $table->string('exp_cat');
            $table->string('location');
            $table->string('receipt_type');
            $table->string('receipt_number')->nullable();
            $table->string('type_of_exp');
            $table->string('amount');
            $table->string('remarks')->nullable();
            $table->string('user_id')->nullable();
            $table->string('username')->nullable();
            $table->integer('status');
            $table->integer('accepted');
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
        Schema::dropIfExists('expenses');
    }
}
