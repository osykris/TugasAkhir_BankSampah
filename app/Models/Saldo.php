<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function transaksis()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'id');
    }

    public function penarikan_saldo()
    {
        return $this->belongsTo(PenarikanSaldo::class, 'penarikan_id', 'id');
    }
}
