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
        Schema::create('barang', function (Blueprint $table) {
            $table->string('kode_barang')->primary();
            $table->string('nama_barang');
            $table->string('jenis_barang');
            $table->integer('jumlah');
            $table->decimal('harga', 8, 2);
            $table->date('updated_at');
            $table->date('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('barang');
    }
};
