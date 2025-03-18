<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komisi extends Model
{
    protected $fillable = [
        'id',
        'id_pegawai',
        'id_penjualan',
        'id_barang',
        'komisi',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function pegawai(){
        return $this->belongsTo(Pegawai::class,'id_pegawai','id');
    }

    public function penjualan(){
        return $this->belongsTo(Penjualan::class,'id_penjualan','id');
    }

    public function barang(){
        return $this->belongsTo(Barang::class,'id_barang','id');
    }
}
