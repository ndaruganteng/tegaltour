<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\carbon;

class wisata extends Model
{
  use HasFactory;

  protected $table = 'wisata';
  protected $primaryKey = 'id_wisata';
  protected $fillable = [
    'image',
    'namawisata',
    'harga',
    'kategori',
    'durasi',
    'lokasi ',
    'titikkumpul ',
    'fasilitas',
    'tanggalberangkat',
    'jamberangkat',
    'linklokasi',
    'deskripsi',
    'status_wisata',
    'date',
  ];

  public function getFromDateAttribute() {
    return Carbon::parse($this->attributes['created_at'])
    ->translatedFormat('1, d  F Y');
  }

}
