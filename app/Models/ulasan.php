<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\carbon;

class ulasan extends Model
{
    use HasFactory;
    
    protected $table = 'ulasan';
    protected $primaryKey = 'id_ulasan';
    protected $fillable = [
        'nama',
        'komentar',
        'rating',
        'date',
      ];

    public function getFromDateAttribute() {
    return Carbon::parse($this->attributes['created_at'])
    ->translatedFormat('1, d  F Y');
    }
}
