<h1>Tambah Dusun</h1>
<form action="{{ route('dusun.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Nama Dusun</label>
        <input type="text" name="nama_dusun" id="name" class="form-control" value="{{ old('name') }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>