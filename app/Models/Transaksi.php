<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function detail_transaksis()
    {
        return $this->hasMany(DetailTransaksi::class, 'transaksi_id', 'id');
    }

    public function saldo()
    {
        return $this->hasOne(Saldo::class, 'transaksi_id', 'id');
    }

    public function penjualan_sampah()
    {
        return $this->belongsTo(PenjualanSampah::class, 'jual_id', 'id');
    }

}
