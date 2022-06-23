<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogGaleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_galeries', function (Blueprint $table) {
            $table->id();
            $table->string("action");
            $table->unsignedBigInteger("id_galery");
            $table->unsignedBigInteger("id_account");
            $table->timestamp('date');
            $table->timestamps();

            $table->foreign('id_galery')->references('id')->on('galeries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_galeries');
    }
}
