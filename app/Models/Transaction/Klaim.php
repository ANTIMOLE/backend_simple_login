<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Klaim extends Model
{
    protected $table = 'klaim';

    protected $fillable = [
        'id',
        'id_pelanggan',
        'id_suvenir',
        'total_poin',
        'status',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id');
    }

    public function suvenir(){
        return $this->belongsTo(Suvenir::class, 'id_suvenir', 'id');
    }

    
}
