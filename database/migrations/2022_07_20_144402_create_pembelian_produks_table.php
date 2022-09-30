<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelianProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian_produks', function (Blueprint $table) {
            $table->id('id_pembelian_product');
            $table->foreignId('id_pembelian');
            $table->foreignId('id_produk');
            $table->integer('jumlah');
            $table->string('nama');
            $table->integer('harga');
            $table->integer('berat');
            $table->integer('subberat');
            $table->integer('subharga');
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
        Schema::dropIfExists('pembelian_produks');
    }
}
