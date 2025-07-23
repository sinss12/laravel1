    <div class="mb-3">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $blog->judul ?? '') }}">
    </div>

    <div class="mb-3">
        <label for="penulis" class="form-label">Penulis</label>
        <input type="text" name="penulis" id="penulis" class="form-control" value="{{ old('penulis', $blog->penulis ?? '') }}">
    </div>

    <div class="mb-3">
        <label for="konten" class="form-label">Konten</label>
        <textarea name="konten" id="konten" class="form-control" rows="4">{{ old('konten', $blog->konten ?? '') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="kategori_id" class="form-label">Kategori</label>
        <select name="kategori_id" id="kategori_id" class="form-control">
            <option value="">-- Pilih Kategori --</option>
            @foreach ($kategori as $item)
                <option value="{{ $item->id }}" {{ old('kategori_id', $blog->kategori_id ?? '') == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" name="foto" id="foto" class="form-control">
        @error('foto')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        @if (!empty($blog) && !empty($blog->foto))
            <div class="mt-2">
                <img src="{{ asset('storage/' . $blog->foto) }}" width="100" alt="Foto">
                <p class="text-muted mb-0">File sebelumnya: {{ $blog->foto }}</p>
            </div>
        @endif
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-primary">{{ $submitButton ?? 'Simpan' }}</button>
    </div>
