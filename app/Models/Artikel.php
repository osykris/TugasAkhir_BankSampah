<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikels';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id', 'title', 'content', 'gambar_artikel'
    ];
    public $timestamps = true;
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
