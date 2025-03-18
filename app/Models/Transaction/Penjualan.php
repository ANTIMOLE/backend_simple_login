<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';

    protected $fillable = [
        'id',
        'id_pelanggan',
        'list_penitip',
        'list_barang',
        'alamat',
        'total',
        'status',
        'tipe',
        'bukti_transfer',
        
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // public function pelanggan(){
    //     return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id');
    // }

    public function penitip(){
        return $this->belongsTo(Penitip::class, 'id_penitip', 'id');
    }
}
