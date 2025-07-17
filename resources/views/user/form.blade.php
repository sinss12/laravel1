@csrf

<div class="mb-3">
    <label for="name" class="form-label">Nama</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="password" class="form-label">Password {{ isset($user) ? '(Kosongkan jika tidak diubah)' : '' }}</label>
    <input type="password" name="password" id="password" class="form-control" {{ isset($user) ? '' : 'required' }}>
</div>

<div class="mb-3">
    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
        <option value="">-- Pilih Jenis Kelamin --</option>
        <option value="Laki-laki" {{ old('jenis_kelamin', $user->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
        <option value="Perempuan" {{ old('jenis_kelamin', $user->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
    </select>
</div>

<div class="mb-3">
    <label for="foto" class="form-label">Foto</label>
    <input type="file" name="foto" id="foto" class="form-control">
    @error('foto')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    @if (!empty($user) && !empty($user->foto))
        <div class="mt-2">
            <img src="{{ asset('storage/' . $user->foto) }}" width="100" alt="Foto">
            <p class="text-muted mb-0">File sebelumnya: {{ $user->foto }}</p>
        </div>
    @endif
</div>

<div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea name="alamat" id="alamat" class="form-control" rows="3" required>{{ old('alamat', $user->alamat ?? '') }}</textarea>
</div>

<div class="text-end">
    <button type="submit" class="btn btn-info">Simpan</button>
</div>
