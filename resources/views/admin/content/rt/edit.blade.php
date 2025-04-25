<h1>Edit RT</h1>
<!-- Form edit RT -->
<form action="{{ route('rt.update', $rt->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nomor_rt">Nomor RT</label>
        <input type="text" name="nomor_rt" id="nomor_rt" class="form-control" value="{{ $rt->nomor_rt }}" required>
    </div>
    <div class="form-group">
        <label for="id_rw">Nomor RW</label>
        <select name="id_rw" id="id_rw" class="form-control" required>
            <option value="">Pilih Rw</option>
            @foreach ($rws as $rw)
                <option value="{{ $rw->id }}">{{ $rw->nomor_rw }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('rt.index') }}" class="btn btn-secondary">Kembali</a>
</form>
{{-- Menampilkan pesan error jika ada --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif