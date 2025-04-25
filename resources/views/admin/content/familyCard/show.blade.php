<h1>Edit Kartu Keluarga</h1>
<!-- Form edit kartu keluarga -->
<form action="{{ route('kk.update', $kartuKeluarga->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="no_kk">No Kartu Keluarga</label>
        <input type="text" name="no_kk" id="no_kk" class="form-control" value="{{ $kartuKeluarga->no_kk }}"
            required>
    </div>

    <div class="form-group">
        <p>Dusun : <strong>{{ $kartuKeluarga->hamlet->nama_dusun ?? '' }}</strong></p>
        <p>Rw : <strong>{{ $kartuKeluarga->rw->nomor_rw ?? '' }}</strong></p>
        <p>Rt : <strong>{{ $kartuKeluarga->rt->nomor_rt ?? '' }}</strong></p>

        <p>Jumlah Anggota : <strong>{{ $kartuKeluarga->residents->count() }}</strong></p>
        {{-- Penduduk Table --}}
        <table class="table table-bordered" border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama Penduduk</th>
                    <th>Jenis Kelamin</th>
                    <th>SHDK</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kartuKeluarga->residents as $index => $resident)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $resident->nik }}</td>
                        <td>{{ $resident->nama_lengkap }}</td>
                        <td>{{ $resident->jenis_kelamin }}</td>
                        <td>{{ $resident->shdk }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    <a href="{{ route('kk.index') }}" class="btn btn-secondary">Kembali</a>
</form>