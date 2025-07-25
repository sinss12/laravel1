<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\BlogView;

class BlogController extends Controller
{
    // Tampilkan semua blog
    public function index(Request $request)
    {
        $query = Blog::with('kategori');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                    ->orWhereHas('kategori', function ($qKategori) use ($search) {
                        $qKategori->where('nama', 'like', '%' . $search . '%');
                    });
            });
        }

        $blog = $query->latest()->paginate(6);

        return view('blog/index', compact('blog'));
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $blog = Blog::where('judul', 'like', "%$keyword%")
            ->orWhereHas('kategori', function ($q) use ($keyword) {
                $q->where('name', 'like', "%$keyword%");
            })
            ->latest()
            ->paginate(6);

        return view('blog.search_results', compact('blog'));
    }


    // Form create blog
    public function create()
    {
        $kategori = Kategori::all(); // Ambil semua kategori
        return view('blog.create', compact('kategori'));
    }

    // Simpan blog baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:100',
            'konten' => 'required|string',
            'kategori_id' => 'required|exists:kategori,id',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        ]);

        $data = $request->only(['judul', 'penulis', 'konten', 'kategori_id',]);
        $data['dibuat_oleh'] = Auth::id();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('blog', 'public');
        }

        Blog::create($data);


        return redirect()->route('blog.index')->with('success', 'Blog berhasil ditambahkan.');
    }

    // Tampilkan detail blog
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        $ipAddress = request()->ip();

        // If it's a new view, create a new row in product_views table
        $view = \App\Models\BlogView::firstOrCreate(
            ['blog_id' => $blog->id, 'ip_address' => $ipAddress],
            ['viewed_at' => now()]
        );

        // If it's a new view (or updated), increment view count (optional, but good for total views)
        // You might want to add a 'views_count' column to your blog table
        // For now, we'll just count from product_views table

        $blogViewsCount = \App\Models\BlogView::where('blog_id', $blog->id)->count();

        return view('blog.show', compact('blog', 'blogViewsCount'));
    }

    // Form edit blog
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $kategori = Kategori::all(); // Tambahkan ini bro

        return view('blog.edit', compact('blog', 'kategori'));
    }




    // Update blog
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:100',
            'konten' => 'required|string',
            'kategori_id' => 'required|exists:kategori,id',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['judul', 'penulis', 'konten', 'kategori_id']);

        if ($request->hasFile('foto')) {
            // hapus foto lama jika ada
            if ($blog->foto && Storage::disk('public')->exists($blog->foto)) {
                Storage::disk('public')->delete($blog->foto);
            }
            $data['foto'] = $request->file('foto')->store('blog', 'public');
        }

        $blog->update($data);

        return redirect()->route('blog.index')->with('success', 'Blog berhasil diperbarui.');
    }

    // Hapus blog
    public function destroy(Blog $blog)
    {
        if ($blog->foto && Storage::disk('public')->exists($blog->foto)) {
            Storage::disk('public')->delete($blog->foto);
        }

        $blog->delete();
        return redirect()->route('blog.index')->with('success', 'Blog berhasil dihapus.');
    }

    // Method untuk halaman kategori teknologi
    public function teknologi()
    {
        $blog = Blog::with('kategori')
            ->whereHas('kategori', function ($q) {
                $q->where('name', 'teknologi');
            })
            ->latest()
            ->paginate(9);

        $kategori = 'Teknologi';
        return view('home.teknologi', compact('blog', 'kategori'));
    }

    // Method untuk halaman kategori sport
    public function sport()
    {
        $blog = Blog::with('kategori')
            ->whereHas('kategori', function ($q) {
                $q->where('name', 'sport');
            })
            ->latest()
            ->paginate(9);

        $kategori = 'Sport';
        return view('home.sport', compact('blog', 'kategori'));
    }

    // Method untuk halaman kategori otomotif
    public function otomotif()
    {
        $blog = Blog::with('kategori')
            ->whereHas('kategori', function ($q) {
                $q->where('name', 'otomotif');
            })
            ->latest()
            ->paginate(9);

        $kategori = 'Otomotif';
        return view('home.otomotif', compact('blog', 'kategori'));
    }

    // Method untuk halaman kategori politik
    public function politik()
    {
        $blog = Blog::with('kategori')
            ->whereHas('kategori', function ($q) {
                $q->where('name', 'politik');
            })
            ->latest()
            ->paginate(9);

        $kategori = 'Politik';
        return view('home.politik', compact('blog', 'kategori'));
    }

    // Method untuk halaman kategori hiburan
    public function hiburan()
    {
        $blog = Blog::with('kategori')
            ->whereHas('kategori', function ($q) {
                $q->where('name', 'hiburan');
            })
            ->latest()
            ->paginate(9);

        $kategori = 'Hiburan';
        return view('home.hiburan', compact('blog', 'kategori'));
    }

    // Method untuk halaman kategori trending
    public function trending()
    {
        $blog = Blog::with('kategori')
            ->whereHas('kategori', function ($q) {
                $q->where('name', 'trending');
            })
            ->latest()
            ->paginate(9);

        $kategori = 'Trending';
        return view('home.trending', compact('blog', 'kategori'));
    }
}
