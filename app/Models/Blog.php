<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog'; // ← TAMBAHIN INI!
    protected $fillable = [
        'judul',
        'penulis',
        'konten',
        'foto',
        'kategori_id',
        'dibuat_oleh',
    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function creator()
    {
        return $this->belongsTo(User::class, 'dibuat_oleh');
    }

    public function views()
{
    return $this->hasMany(BlogView::class);
}

}
