<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaldoTPS3R extends Model
{
    // use HasFactory;

    protected $table = 'tps3r_saldos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tanggal_input', 'saldo', 'keterangan'
    ];
    public $timestamps = false;
}
