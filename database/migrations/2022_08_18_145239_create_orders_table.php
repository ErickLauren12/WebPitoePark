<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->text('keterangan');
            $table->enum('status_order', ['Done','Success','Processing','Pending','Canceled']);
            $table->timestamps();
            $table->unsignedBigInteger('meja_id');
            $table->double('total_price' , 8, 2);
            $table->bigInteger('cefes_id');
            $table->string('jumlah', 5);
            $table->string('no_order', 5);
            $table->string('name', 45);
            $table->string('jenis_pembayaran', 45);
            $table->string('kode_verifikasi', 255);
            $table->string('no_wa', 45);

            $table->foreign('meja_id')->references('id')->on('mejas');          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
