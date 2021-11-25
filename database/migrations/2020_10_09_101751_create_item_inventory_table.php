<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_inventory', function (Blueprint $table) {
            $table->id();
            $table->string('date_of_receipt')->nullable();
            $table->string('staff_id')->nullable();
            $table->string('item')->nullable();
            $table->string('qty')->nullable();
            $table->string('remarks')->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('item_inventory');
    }
}
