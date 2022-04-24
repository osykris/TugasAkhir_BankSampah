<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanSampah extends Model
{
    // use HasFactory;

    protected $table = 'penjualan_sampahs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'date_input', 'saldo_penjualan', 'description'
    ];
    public $timestamps = true;
    
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'jual_id', 'id');
    }
}
