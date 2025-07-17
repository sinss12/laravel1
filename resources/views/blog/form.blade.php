<div class="mb-3">
    <label for="judul" class="form-label">Judul</label>
    <input type="text" name="judul" class="form-control" value="{{ old('judul', $blog->judul ?? '') }}">
</div>
<div class="mb-3">
    <label for="penulis" class="form-label">Penulis</label>
    <input type="text" name="penulis" class="form-control" value="{{ old('penulis', $blog->penulis ?? '') }}">
</div>
<div class="mb-3">
    <label for="konten" class="form-label">Konten</label>
    <textarea name="konten" class="form-control" rows="4">{{ old('konten', $blog->konten ?? '') }}</textarea>
</div>
<div class="text-end">
    <button type="submit" class="btn btn-success">Simpan</button>
</div>
