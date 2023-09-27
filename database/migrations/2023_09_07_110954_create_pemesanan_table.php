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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id('id_pemesanan');
            $table->integer('id_wisata');
            $table->integer('id_user');
            $table->integer('id_mitra');
            $table->string('jumlah_orang');
            $table->string('harga_satuan');
            $table->string('harga_total');
            $table->string('tanggal_berangkat');
            $table->string('status')->nullable();
            $table->string('status_perjalanan')->nullable();
            $table->string ('bukti_pembayaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};
