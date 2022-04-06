<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $fillable = ['transaksi_id','sampah_id','jenis_sampah','total_berat','harga','total_harga'];


    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'id');
    }

    public function data_sampah()
    {
        return $this->belongsTo(DataSampah::class, 'sampah_id', 'id');
    }
}
