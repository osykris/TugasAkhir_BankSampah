<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable implements MustVerifyEmail
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'desa',
        'nohp',
        'alamat_lengkap',
        'saldo_user'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function artikels()
    {
        return $this->hasMany(Artikel::class, 'user_id', 'id');
    }

    public function produk_daur_ulangs()
    {
        return $this->hasMany(ProdukDaurUlang::class, 'user_id', 'id');
    }

    public function saldos()
    {
        return $this->hasMany(Saldo::class, 'user_id', 'id');
    }

    public function pernarikan_saldos()
    {
        return $this->hasMany(PenarikanSaldo::class, 'user_id', 'id');
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'user_id', 'id');
    }
}


