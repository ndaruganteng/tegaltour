<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\carbon;

class pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';
    protected $fillable = [
      'bukti_pembayaran',
      'jumlah_orang',
      'harga_satuan',
      'harga_total',
      'status',
      'status_perjalanan',
      'date',
      
    ];

    public function getFromDateAttribute() {
      return Carbon::parse($this->attributes['created_at'])
      ->translatedFormat('1, d  F Y');
    }
    
}
