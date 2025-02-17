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
        Schema::create('stokbarangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang', 4);
            $table->string('nama_barang', 50);
            $table->integer('jumlah');
            $table->integer('harga_jual');
            $table->integer('harga_pokok');
            $table->date('tgl_masuk');
            $table->date('tgl_expired');
            $table->uuid('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('kategoris');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stokbarangs');
    }
};
