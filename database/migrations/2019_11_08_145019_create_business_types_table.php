<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_types', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->integer('lg_id')->unsigned();
            $table->integer('TIN_id');
            $table->string('address');
            $table->string('description');
            $table->string('business_size')->nullable();
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();

            $table->foreign('lg_id')->references('id')->on('local_governments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_types');
    }
}
