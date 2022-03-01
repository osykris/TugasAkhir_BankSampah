<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanSampah extends Model
{
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'jual_id', 'id');
    }
}
