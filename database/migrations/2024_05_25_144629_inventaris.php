<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->index();
            $table->string('nama_barang');
            $table->bigInteger('id_jenis_barang')->unsigned()->index();
            $table->date('tanggal_pembelian');
            $table->date('tanggal_pemakaian');
            $table->bigInteger('id_ruangan')->unsigned()->index();
            $table->text('keterangan')->nullable();
        });

        Schema::table('inventaris', function (Blueprint $table) {
            $table->foreign('id_jenis_barang')->references('id_jenis_barang')->on('jenis_barangs');
            $table->foreign('id_ruangan')->references('id_ruangan')->on('ruangans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventaris');
    }
};
