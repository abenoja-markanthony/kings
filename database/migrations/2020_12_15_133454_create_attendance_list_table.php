<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('attendance_list')) return; 

        Schema::create('attendance_list', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id')->nullable();
            $table->string('remarks')->nullable();
            $table->integer('status');
            $table->integer('accepted')->nullable();;
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
        Schema::dropIfExists('attendance_list');
    }
}
