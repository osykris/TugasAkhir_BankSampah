<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenarikanSaldo extends Model
{
    protected $table = 'penarikan_saldos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id', 'nama_pengirim', 'nominal', 'bank', 'bank_pengirim', 'norek', 'tanggal', 'bukti_pembayaran', 'metode_penarikan'
    ];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function saldos()
    {
        return $this->hasMany(PenarikanSaldo::class, 'penarikan_id', 'id');
    }

}
