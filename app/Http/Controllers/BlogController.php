<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        return view('blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'konten' => 'required',
        ]);

        Blog::create($request->all());

        return redirect()->route('blog.index')->with('success', 'Blog berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->update($request->all());

        return redirect()->route('blog.index')->with('success', 'Blog berhasil diupdate.');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('blog.index')->with('success', 'Blog berhasil dihapus.');
    }
}
