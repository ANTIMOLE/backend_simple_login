<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang_Donasi extends Model
{
    protected $table = 'barang_donasis';

    protected $fillable = [
        'id_barang_donasi',
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

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function donasibarang()
    {
        return $this->hasMany(donasi_barang::class, 'id_barang_donasi', 'id_barang_donasi');
    }
}
