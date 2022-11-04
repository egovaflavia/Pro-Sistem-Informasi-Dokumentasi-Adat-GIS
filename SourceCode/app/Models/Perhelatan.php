<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perhelatan extends Model
{
    use HasFactory;
    protected $table      = 'tb_perhelatan';
    protected $id         = 'perhelatan_id';
    public    $timestamps = false;
    protected $guarded   = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
