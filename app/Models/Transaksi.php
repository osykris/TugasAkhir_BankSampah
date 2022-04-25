<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{

    protected $table = 'transaksis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'metode_penyetoran', 'kabupaten', 'kecamatan', 'desa', 'alamat_lengkap', 'no_hp', 'tanggal', 'waktu',
        'total_berat', 'status'
    ];
    public $timestamps = true;

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
