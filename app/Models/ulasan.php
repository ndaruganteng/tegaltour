<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Ulasan extends Model
{
    use HasFactory;
    
    protected $table = 'ulasan';
    protected $primaryKey = 'id_ulasan';
    protected $fillable = [
        'nama',
        'komentar',
        'komentar_wisata',
        'rating',
        'date',
        'id_wisata', // tambahkan jika belum ada
    ];

    // Definisikan relasi dengan model Wisata
    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'id_wisata');
    }

    public function getFromDateAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('1, d  F Y');
    }
}