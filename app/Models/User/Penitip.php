<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penitip extends Model
{
    use HasApiTokens, HasFactory;

    protected $table = 'penitip';

    protected $fillable = [
        'id',
        'nama',
        'email',
        'verified',
        'tanggal_lahir',
        'noTelp',
        'poin',
        'password',
        'nomer_induk_penduduk',
        'barang_titipan',
        'rating_total',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function customer (){
        return $this->belongsTo(Pegawai::class, 'id_pelanggan', 'id');
    } 

    public function rating(){
        return $this->hasMany(Rating::class, 'id_penitip', 'id');
    }
}
