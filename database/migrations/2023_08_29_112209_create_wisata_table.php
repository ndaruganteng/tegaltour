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
        Schema::create('wisata', function (Blueprint $table) {
            $table->id('id_wisata');
            $table->integer('id_mitra');
            $table->string ('image')->default("");
            $table->string('namawisata');
            $table->string('harga');
            $table->string('durasi');
            $table->string('kategori');
            $table->string('lokasi');
            $table->string('fasilitas');
            $table->string('tanggalberangkat');
            $table->string('linklokasi');
            $table->string('deskripsi',9000);
            $table->timestamp('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wisata');
    }
};
