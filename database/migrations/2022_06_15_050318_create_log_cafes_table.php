<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogCafesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_cafes', function (Blueprint $table) {
            $table->id();
            $table->string("action");
            $table->unsignedBigInteger("id_cafe");
            $table->unsignedBigInteger("id_account");
            $table->timestamp('date');
            $table->timestamps();

            $table->foreign('id_cafe')->references('id')->on('cafes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_cafes');
    }
}
