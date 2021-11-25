<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('emp_name');
            $table->string('emp_number');
            $table->string('position');
            $table->string('date_hired')->nullable();
            $table->string('rate')->nullable();;
            $table->string('department')->nullable();;
            $table->string('commida')->nullable();;
            $table->string('transpo')->nullable();;
            $table->string('gender')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('address')->nullable();
            $table->string('contact')->nullable();
            $table->string('station');
            $table->string('wage_type');
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
        Schema::dropIfExists('employee');
    }
}
