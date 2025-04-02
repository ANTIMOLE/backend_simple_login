<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawais';

    protected $fillable = [
        'id_pegawai',
        'nama',
        'email',
        'password',
        'tanggal_lahir',
        'noTelp',
        'id_jabatan',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id_jabatan');
    }
    public function penitipan()
    {
        return $this->hasMany(Penitipan::class, 'id_pegawai', 'id_pegawai');
    }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class, 'id_pegawai', 'id_pegawai');
    }

}
