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
      'namauser',
      'namawisata',
      'jumlahorang',
      'hargasatuan',
      'hargatotal',
      'tanggalberangkat',
      'status',
      'status_perjalanan',
    ];
    
}
