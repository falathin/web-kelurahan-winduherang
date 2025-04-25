<h1>Edit Dusun</h1>
<form action="{{ route('dusun.update', $dusun->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Nama Dusun</label>
        <input type="text" name="nama_dusun" id="name" class="form-control" value="{{ old('name', $dusun->nama_dusun) }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>