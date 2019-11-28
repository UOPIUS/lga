<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('payer_id');
            $table->string('cofo');
            $table->string('address');
            $table->string('ppty_code');
            $table->string('created_by');
            $table->char('status',1);
            $table->timestamps();
            $table->foreign('payer_id')->references('id')->on('tax_payers');
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
        Schema::dropIfExists('tenements');
    }
}
