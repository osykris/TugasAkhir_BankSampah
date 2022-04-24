<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $table = 'kontak';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama', 'email', 'nohp', 'pesan'
    ];
    public $timestamps = true;
}
