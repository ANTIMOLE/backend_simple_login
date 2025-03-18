<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penerima extends Model
{
    protected $table = 'penerima';

    protected $fillable = [
        'id',
        'nama',
        'email',
        'no_Telp',
        'lokasi',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function permohonan(){
        return $this->hasMany(Permohonan::class, 'id_penerima', 'id');
    }
}
