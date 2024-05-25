<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id('id_pembelian');
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('jenis_barang');
            $table->integer('jumlah');
            $table->decimal('harga', 8, 2);
            $table->decimal('total', 8, 2);
            $table->string('ruang');
            $table->date('updated_at');
            $table->date('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembelian');
    }
};
