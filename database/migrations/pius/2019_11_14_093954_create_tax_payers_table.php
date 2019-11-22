<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxPayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_payers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('oname');
            $table->string('phone');
            $table->string('address');
            $table->string('gender');
            $table->string('email');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('lga_id');
            $table->string('occupation');
            $table->string('photo');
            $table->string('tin');
            $table->string('work_type');
            $table->string('finger_print');
            $table->string('logical_address');
            $table->string('created_by');
            $table->string('status');
            $table->timestamps();
            $table->foreign('state_id')->references('state_id')->on('states');
            $table->foreign('lga_id')->references('local_id')->on('locals');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tax_payers');
    }
}
