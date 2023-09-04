<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mitra extends Model
{
    use HasFactory;
    protected $table = 'mitra';
    protected $primaryKey = 'id_mitra';
    protected $fillable = [
        'nama_lengkap',
        'nama_bisnis',
        'alamat',
        'telepon',
        'email ',
        'password',
    ];
}
