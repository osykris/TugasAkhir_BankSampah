<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranTPS3R extends Model
{
    // use HasFactory;

    protected $table = 'tps3r_pembayarans';
    protected $primaryKey = 'id_payment';
    protected $fillable = [
        'tps3r_user_id', 'month', 'year'
    ];
    public $timestamps = true;
}
