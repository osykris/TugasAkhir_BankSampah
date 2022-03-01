<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSampah extends Model
{
    public function detail_transaksis()
    {
        return $this->hasMany(DetailTransaksi::class, 'sampah_id', 'id');
    }
}
