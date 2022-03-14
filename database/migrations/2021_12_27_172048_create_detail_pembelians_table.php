<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pembelians', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_penjualan')->unsigned();
            $table->bigInteger('id_pakaian')->unsigned();
            $table->integer('jumlah');
            $table->integer('jumlah_harga');
            //relasi
            $table->foreign('id_penjualan')->references('id')
                ->on('penjualans');
            $table->foreign('id_pakaian')->references('id')
                ->on('pakaians');
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
        Schema::dropIfExists('detail_pembelians');
    }
}
