<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang_Donasi extends Model
{
    protected $table = 'barang_donasi';

    protected $fillable = [
        'kode_donasi',
        'id_kategori',
        'gambar',
        'nama',
        'ukuran',
        'deskripsi',
        'berat',
        'status',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
