<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table      = 'tb_berita';
    protected $id         = 'berita_id';
    public    $timestamps = false;
    protected $fillable   = [
        'user_id',
        'berita_tgl',
        'berita_judul',
        'berita_isi',
        'berita_img',
        'berita_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
