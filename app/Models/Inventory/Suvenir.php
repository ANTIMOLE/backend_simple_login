<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suvenir extends Model
{
    protected $table = 'suvenir';

    protected $fillable = [
        'id',
        'nama',
        'jumlah_poin',
        'gambar',
        'stok',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
