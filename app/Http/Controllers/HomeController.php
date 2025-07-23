<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua data blog dengan relasi kategori
        $blog = Blog::with('kategori')->latest()->get();
        $blog = Blog::latest()->paginate(6); // Tambahkan pagination jika diperlukan

        // Kirim ke view home/index.blade.php
        return view('home.index', compact('blog'));
    }
}
