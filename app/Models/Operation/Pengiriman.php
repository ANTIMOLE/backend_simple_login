<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    protected $table = 'pengiriman';

    protected $fillable = [
        'id',
        'id_jadwal',
        'id_penjualan',
        'status',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function jadwal(){
        return $this->belongsTo(Jadwal::class,'id_jadwal','id');
    }

    public function penjualan(){
        return $this->belongsTo(Penjualan::class,'id_penjualan','id');
    }
}
