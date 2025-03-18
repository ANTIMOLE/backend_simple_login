<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'rating';

    protected $fillable = [
        'id',
        'id_penitip',
        'kode_barang',
        'value',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function penitip(){
        return $this->belongsTo(Penitip::class, 'id_penitip', 'id');
    }

    public function barang(){
        return $this->belongsTo(Barang::class, 'kode_barang', 'kode_barang');
    }

    
}
