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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_product');
            $table->string('nama');
            $table->unsignedBigInteger('suplayer_id');
            $table->foreign('suplayer_id')->references('id')->on('suplayers');
            $table->string('kategori');
            $table->string('jenis');
            $table->string('stok');
            $table->string('gambar');
            $table->string('harga');
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
        Schema::dropIfExists('products');
    }
};