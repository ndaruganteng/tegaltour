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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string ('profile_picture')->nullable();
            $table->string('nama_lengkap');
            $table->string('no_telepon');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role');       
            $table->string ('status')->nullable(); 
            $table->string ('alamat')->nullable(); 
            $table->string ('rekening')->nullable(); 
            $table->string ('bukti_mitra')->nullable(); 
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
