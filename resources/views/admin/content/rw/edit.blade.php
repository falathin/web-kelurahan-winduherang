<h1>Edit RW</h1>
<!-- Form edit RW -->
<a href="{{ route('rw.index') }}">Kembali</a>
{{-- Menampilkan pesan sukses jika ada --}}
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form action="{{ route('rw.update', $rw->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="nomor_rw">Nomor RW:</label>
    <input type="text" name="nomor_rw" id="nomor_rw" value="{{ $rw->nomor_rw }}" required>

    <label for="nomor_rw">Nama Dusun</label>
    <select name="id_dusun" id="id_dusun" required>
        <option value="">Pilih Dusun</option>
        @foreach ($dusuns as $dusun)
            <option value="{{ $dusun->id }}" {{ $rw->dusun_id == $dusun->id ? 'selected' : '' }}>
                {{ $dusun->nama_dusun }}
            </option>
        @endforeach
    </select>
    <button type="submit">Simpan</button>
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