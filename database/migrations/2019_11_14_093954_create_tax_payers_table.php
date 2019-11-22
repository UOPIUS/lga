<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxPayersTable extends Migration
{
    /**
     * Run the migrations.
     
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
            $table->string('state_id');
            $table->string('lga_id');
            $table->string('photo');
            $table->string('tin');
            $table->string('work_type');
            $table->string('finger_print');
            $table->string('logical_address');
            $table->string('created_by');
            $table->string('status');
            $table->timestamps();
            
            $table->foreign('lga_id')->references('local_id')->on('locals');
            $table->foreign('state_id')->references('state_id')->on('states');
            $table->foreign('created_by')->references('id')->on('users');
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
