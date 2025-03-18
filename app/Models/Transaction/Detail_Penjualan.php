<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail_Penjualan extends Model
{
    protected $table = 'detail_penjualan';

    protected $fillable = [
        'id',
        'id_penjualan',
        'no_nota',
        'komisi',
        'total_transaksi',
        'total_penitip',
        'total_reusemart',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function penjualan(){
        return $this->belongsTo(Penjualan::class,'id_penjualan','id');
    }
}
