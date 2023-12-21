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

  public function ulasan()
  {
      return $this->hasMany(Ulasan::class, 'id_wisata');
  }

  public function getAverageRating()
  {
      return $this->ulasan->avg('rating');
  }

  public function getTotalRatingHtml()
  {
      $totalRating = $this->getAverageRating();
      $stars = '';

      for ($i = 1; $i <= 5; $i++) {
          if ($i <= round($totalRating)) {
              $stars .= '<span class="fa fa-star checked"></span>';
          } else {
              $stars .= '<span class="fa fa-star"></span>';
          }
      }

      return $stars;
  }

}