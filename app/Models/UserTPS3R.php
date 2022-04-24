<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTPS3R extends Model
{
    // use HasFactory;

    protected $table = 'tps3r_users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name_user', 'full_address', 'village', 'district', 'city', 'phone'
    ];
    public $timestamps = false;
}
