<h1>Daftar RT</h1>
<!-- Tombol Tambah RT -->
<a href="{{ route('rt.create') }}" class="btn btn-primary">Tambah RT</a>
<!-- Tabel data RT -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor RT</th>
            <th>Nomor RW</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($rts as $index => $rt)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $rt->nomor_rt }}</td>
            <td>{{ $rt->rw->nomor_rw }}</td>
            <td>
                <!-- Tombol Edit -->
                <a href="{{ route('rt.edit', $rt->id) }}" class="btn btn-warning">Edit</a>

                <!-- Tombol Hapus -->
                <form action="{{ route('rt.destroy', $rt->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>