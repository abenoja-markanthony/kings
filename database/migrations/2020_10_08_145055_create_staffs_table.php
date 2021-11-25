<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->string('emp_name');
            $table->string('emp_number')->nullable();
            $table->string('position')->nullable();
            $table->string('date_hired')->nullable();
            $table->string('rate')->nullable();;
            $table->string('gender')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('address')->nullable();
            $table->string('contact')->nullable();
            $table->string('station');
            $table->string('status');
            $table->string('user_id');
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
        Schema::dropIfExists('staffs');
    }
}
