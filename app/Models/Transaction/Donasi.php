<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    protected $table = 'donasi';

    protected $fillable = [
        'id',
        'id_penerima',
        'id_barang_donasi',
        'tanggal_donasi',
        'status',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function penerima(){
        return $this->belongsTo(Penerima::class, 'id_penerima', 'id');
    }

    public function barang_donasi(){
        return $this->belongsTo(Barang_Donasi::class, 'id_barang_donasi', 'id');
    }
}
