<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'kode_barang',
        'title',
        'description',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];


    public function pertanyaan(){
        return $this->hasMany(Pertanyaan::class,'id_forum','id');
    }

    public function  jawaban(){
        return $this->hasMany(Jawaban::class,'id_forum','id');
    }

    public function barang(){
        return $this->belongsTo(Barang::class,'id_barang','id');
    }
}
