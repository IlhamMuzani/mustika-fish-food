<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pembeli');
            $table->unsignedBigInteger('ikan_id');
            $table->foreign('ikan_id')->references('id')->on('ikans');
            $table->unsignedBigInteger('pakan_id');
            $table->foreign('pakan_id')->references('id')->on('pakans');
            $table->string('kategori_produk');
            $table->string('tanggal');
            $table->string('jumlah_jual');
            $table->string('harga_jual');
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
        Schema::dropIfExists('transaksis');
    }
};