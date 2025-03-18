<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    protected $table = 'permohonan';

    protected $fillable = [
        'id',
        'id_penerima',
        'kategori_barang',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function penerima(){
        return $this->belongsTo(Penerima::class, 'id_penerima', 'id');
    }

}
