<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'kode_barang',
        'id_penitip',
        'id_kategori',
        'kondisi',
        'gambar',
        'nama',
        'ukuran',
        'deskripsi',
        'hunter',
        'berat',
        'masa_penitipan',
        'perpanjangan',
        'harga',
        'status',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function penitip()
    {
        return $this->belongsTo(Penitip::class, 'id_penitip', 'id');
    }

    public function barang(){
        return $this->hasMany(Barang::class, 'kode_barang', 'kode_barang');
    }

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }
}
