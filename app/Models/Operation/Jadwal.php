<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';

    protected $fillable = [
        'id',
        'id_pegawai',
        'tipe',
        'tanggal',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function pegawai(){
        return $this->belongsTo(Pegawai::class,'id_pegawai','id');
    }

    public function pengiriman(){
        return $this->hasOne(Pengiriman::class,'id_jadwal','id');
    }

    public function pengambilan(){
        return $this->hasOne(Pengambilan::class,'id_jadwal','id');
    }
}
