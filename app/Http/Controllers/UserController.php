<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'alamat' => 'required|string',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ], [
        'name.required' => 'Nama lengkap harus diisi.',
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email sudah terdaftar.',
        'password.required' => 'Password tidak boleh kosong.',
        'password.min' => 'Password minimal 6 karakter.',
        'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
        'jenis_kelamin.in' => 'Pilih jenis kelamin yang valid.',
        'alamat.required' => 'Alamat tidak boleh kosong.',
        'foto.image' => 'File foto harus berupa gambar.',
        'foto.mimes' => 'Foto hanya boleh berekstensi jpg, jpeg, atau png.',
        'foto.max' => 'Ukuran foto maksimal 2MB.',
    ]);

    $fotoPath = null;
    if ($request->hasFile('foto')) {
        $fotoPath = $request->file('foto')->store('user', 'public');
    }

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'jenis_kelamin' => $request->jenis_kelamin,
        'alamat' => $request->alamat,
        'foto' => $fotoPath,
    ]);

    return redirect('/user')->with('success', 'User berhasil ditambahkan.');
}


    // ✅ Ini dia yang harus ditambahkan
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'alamat' => 'nullable|string',
            'foto' => 'nullable|image|max:2048'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat = $request->alamat;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('foto')) {
            if ($user->foto && Storage::exists('public/' . $user->foto)) {
                Storage::delete('public/' . $user->foto);
            }

            $user->foto = $request->file('foto')->store('user_photos', 'public');
        }

        $user->save();

        return redirect('/user')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect('/user')->with('success', 'User berhasil dihapus.');
    }
}
