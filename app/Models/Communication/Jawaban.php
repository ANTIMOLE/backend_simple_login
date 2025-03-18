<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $fillable = [
        'id',
        'id_forum',
        'id_pertanyaan',
        'jawaban',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function forum(){
        return $this->belongsTo(Forum::class,'id_forum','id');
    }

    public function pertanyaan(){
        return $this->belongsTo(Pertanyaan::class,'id_pertanyaan','id');
    }
}
