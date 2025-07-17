<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog'; // <-- ini penting

    protected $fillable = [
        'judul',
        'penulis',
        'konten',
    ];
}
