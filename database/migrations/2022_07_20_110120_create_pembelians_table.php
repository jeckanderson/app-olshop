<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelians', function (Blueprint $table) {
            $table->id('id_pembelian');
            $table->foreignId('user_id');
            $table->date('tanggal_pembelian');
            $table->integer('total_pembelian');
            $table->text('alamat_pengiriman');
            $table->string('status_pembelian');
            $table->string('resi_pengiriman');
            $table->integer('totalberat');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('tipe');
            $table->string('kodepos');
            $table->string('ekspedisi');
            $table->string('paket');
            $table->integer('ongkir');
            $table->string('estimasi');
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
        Schema::dropIfExists('pembelians');
    }
}
