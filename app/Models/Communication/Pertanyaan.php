<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $fillable = [
        'id',
        'id_forum',
        'pertanyaan',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function forum(){
        return $this->belongsTo(Forum::class,'id_forum','id');
    }

    public function jawaban(){
        return $this->hasMany(Jawaban::class,'id_pertanyaan','id');
    }
}
