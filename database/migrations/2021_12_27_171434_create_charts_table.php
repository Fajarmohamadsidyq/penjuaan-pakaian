<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pelanggan')->unsigned();
            $table->bigInteger('id_pakaian')->unsigned();
            $table->integer('qty');
            $table->integer('total_harga');
            //relasi
            $table->foreign('id_pelanggan')->references('id')
                ->on('pelanggans');
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
        Schema::dropIfExists('charts');
    }
}
