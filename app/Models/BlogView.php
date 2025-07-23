<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogView extends Model
{
    // App\Models\BlogView
protected $fillable = ['blog_id', 'ip_address', 'viewed_at'];

    // Relasi: 1 blog view milik 1 blog
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    // Relasi: 1 blog view milik 1 user (jika ada)



}
