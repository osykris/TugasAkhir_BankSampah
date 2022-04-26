<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaldoTPS3RKeluar extends Model
{
    // use HasFactory;

    protected $table = 'tps3r_saldo_keluars';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tgl_masuk', 'saldo_tps3r_keluar', 'ket'
    ];
    public $timestamps = true;
}
