<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_facilities', function (Blueprint $table) {
            $table->id();
            $table->string("action");
            $table->unsignedBigInteger("id_facility");
            $table->unsignedBigInteger("id_account");
            $table->timestamp('date');
            $table->timestamps();

            $table->foreign('id_facility')->references('id')->on('facilities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_facilities');
    }
}
