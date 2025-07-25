<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\console\Command;

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
        'slug',
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

public function setSlugAttribute($value)
    {
        $blog = Blog::whereNull('slug')->orWhere('slug', '')->get();

        if ($blog->isEmpty()) {
            $this->info('No blog found without a slug.');
            return Command::SUCCESS;
        }

        $this->info('Generating slugs for ' . $blog->count() . ' blog...');

        foreach ($blog as $blog) {
            $slug = Str::slug($blog->name);
            $originalSlug = $slug;
            $count = 1;

            while (Blog::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }

            $blog->slug = $slug;
            $blog->save();
            $this->info('Generated slug for ' . $blog->name . ': ' . $slug);
        }

        $this->info('All slugs generated successfully!');

        return Command::SUCCESS;
    }
    
}
