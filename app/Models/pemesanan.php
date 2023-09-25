<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
      'tanggal_berangkat',
      'status',
    ];
    
}
