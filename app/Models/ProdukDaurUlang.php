<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukDaurUlang extends Model
{
    protected $table = 'produk_daur_ulangs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id', 'nama', 'deskripsi', 'harga', 'gambar'
    ];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
