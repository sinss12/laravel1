<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
     public $timestamps = false; 
    
    protected $table = 'kategori';
    protected $fillable = ['name', 'slug'];

    // Relasi: 1 kategori punya banyak blog
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'kategori_id');
    }

    public function edit($id)
{
    $kategori = Kategori::findOrFail($id);
    return view('kategori.edit', compact('kategori'));
}
}