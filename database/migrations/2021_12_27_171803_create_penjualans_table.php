<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pelanggan')->unsigned();
            $table->bigInteger('id_chart')->unsigned();
            $table->date('tgl_pembelian');
            $table->integer('total_pembelian');
            //relasi
            $table->foreign('id_pelanggan')->references('id')
                ->on('pelanggans');
            $table->foreign('id_chart')->references('id')
                ->on('charts');
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
        Schema::dropIfExists('penjualans');
    }
}
