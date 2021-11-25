<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditExpensesUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ExpAudit', function (Blueprint $table) {
            $table->id();
            $table->string('old_e_date')->nullable();
            $table->string('old_exp_cat')->nullable();
            $table->string('old_location')->nullable();
            $table->string('old_receipt_type')->nullable();
            $table->string('old_receipt_number')->nullable();
            $table->string('old_type_of_exp')->nullable();
            $table->string('old_rental_month')->nullable();
            $table->string('old_amount')->nullable();
            $table->string('old_remarks')->nullable();
            $table->string('exp_id');
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
        Schema::dropIfExists('ExpAudit');
    }
}
