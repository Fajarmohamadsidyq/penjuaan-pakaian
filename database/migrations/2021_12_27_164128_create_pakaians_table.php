<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePakaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pakaians', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->bigInteger('id_merk')->unsigned();
            $table->bigInteger('id_jenis')->unsigned();
            $table->integer('harga');
            $table->bigInteger('id_supplier')->unsigned();
            // relasi
            $table->foreign('id_merk')->references('id')
                ->on('merks');
            $table->foreign('id_jenis')->references('id')
                ->on('jenis_barangs');
            $table->foreign('id_supplier')->references('id')
                ->on('suppliers');
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
        Schema::dropIfExists('pakaians');
    }
}
