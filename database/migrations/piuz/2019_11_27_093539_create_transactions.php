<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tax_service'); // TMT,SKS
            $table->integer('payer_id'); //Person paying the tax
            $table->float('amount');
            $table->string('gateway_used');
            $table->char('collected_status');
            $table->integer('lga_id');
            $table->integer('created_by');
            
            $table->foreign('payer_id')->references('id')->on('tax_payers');
            $table->foreign('tax_service')->references('id')->on('tax_services');
            $table->foreign('created_by')->references('id')->on('users');

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
        Schema::dropIfExists('transactions');
    }
}
