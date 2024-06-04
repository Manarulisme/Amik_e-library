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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penulis');
            $table->string('tahun_terbit');
            $table->string('kategori');
            $table->string('judul');
            $table->string('deskripsi');
            $table->string('penerbit');
            $table->string('kota');
            $table->string('jml_hal');
            $table->string('nisbn')->nullable();
            $table->string('cover_buku')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
