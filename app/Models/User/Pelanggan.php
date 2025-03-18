<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Pelanggan extends Model
{
    use HasApiTokens, HasFactory;
    protected $table = 'Pelanggan';
    protected $fillable = [
        'id',
        'nama',
        'email',
        'verified',
        'tanggal_lahir',
        'noTelp',
        'poin',
        'password',
    ];

    protected $hidden = [
        'verified_at',
        'created_at',
        'updated_at',
    ];

    protected $cast = [
        'tanggal_lahir' => 'date:d-m-Y',
        'created_at' => 'date:d-m-Y',
        'updated_at' => 'date:d-m-Y',
        'verified_at' => 'date:d-m-Y',
        'poin' => 'integer',
        'verified' => 'boolean',
    ];

    // public function penitip(){
    //     return $this->hasMany(Penitip::class, 'id_pelanggan', 'id');
    // }

    public function alamat(){
        return $this->hasOne(Alamat::class, 'id_pelanggan', 'id');
    }
}
