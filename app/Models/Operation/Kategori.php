<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    protected $fillable = [
        'id',
        'nama',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function barang(){
        return $this->hasMany(Barang::class, 'id_kategori', 'id');
    }
}
