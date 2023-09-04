<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rekening extends Model
{
    use HasFactory;

    protected $table = 'rekening';
    protected $fillable = [
      'image_rekening',
      'nama_bank',
      'no_rekening',
      'nama_rekening',
    ];
}
