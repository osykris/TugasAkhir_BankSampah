<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSampah extends Model
{

    protected $table = 'data_sampahs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_jenisSampah', 'harga'
    ];
    public $timestamps = false;

    public function detail_transaksis()
    {
        return $this->hasMany(DetailTransaksi::class, 'sampah_id', 'id');
    }

}
