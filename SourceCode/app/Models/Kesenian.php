<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kesenian extends Model
{
    use HasFactory;
    protected $table      = 'tb_kesenian';
    protected $id         = 'kesenian_id';
    public    $timestamps = false;
    protected $guarded   = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
