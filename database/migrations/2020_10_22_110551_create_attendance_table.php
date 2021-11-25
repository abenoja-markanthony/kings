<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('attendance')) return; 
        
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->string('month');
            $table->string('year');
            $table->string('d01')->nullable();
            $table->string('d02')->nullable();
            $table->string('d03')->nullable();
            $table->string('d04')->nullable();
            $table->string('d05')->nullable();
            $table->string('d06')->nullable();
            $table->string('d07')->nullable();
            $table->string('d08')->nullable();
            $table->string('d09')->nullable();
            $table->string('d10')->nullable();
            $table->string('d12')->nullable();
            $table->string('d13')->nullable();
            $table->string('d14')->nullable();
            $table->string('d15')->nullable();
            $table->string('d16')->nullable();
            $table->string('d17')->nullable();
            $table->string('d18')->nullable();
            $table->string('d19')->nullable();
            $table->string('d20')->nullable();
            $table->string('d21')->nullable();
            $table->string('d22')->nullable();
            $table->string('d23')->nullable();
            $table->string('d24')->nullable();
            $table->string('d25')->nullable();
            $table->string('d26')->nullable();
            $table->string('d27')->nullable();
            $table->string('d28')->nullable();
            $table->string('d29')->nullable();
            $table->string('d30')->nullable();
            $table->string('d31')->nullable();
            $table->string('emp_id')->nullable();
            $table->string('remarks')->nullable();
            $table->integer('status');
            $table->integer('accepted');
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
        Schema::dropIfExists('attendance');
    }
}
