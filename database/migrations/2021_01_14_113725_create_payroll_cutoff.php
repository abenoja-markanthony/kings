<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollCutoff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('payroll_cutoff')) return; 

        Schema::create('payroll_cutoff', function (Blueprint $table) {
            $table->id();
            $table->string('period_from');
            $table->string('period_to');
            $table->string('emp_id');
            $table->string('rate');
            $table->string('days')->nullable();
            $table->string('absent')->nullable();
            $table->string('adjustment')->nullable();
            $table->string('remarks')->nullable();
            $table->integer('status')->default(1);
            $table->integer('accepted')->default(0);;
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
        Schema::dropIfExists('payroll_cutoff');
    }
}
