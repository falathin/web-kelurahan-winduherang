<h1>Daftar RW</h1>
<!-- Tabel data RW -->
<a href="{{ route('rw.create') }}">Tambah RW</a>  
{{-- Menampilkan pesan sukses jika ada --}}
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>No RW</th>
            <th>Nama Dusun</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rws as $index => $rw)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $rw->nomor_rw }}</td>
                <td>{{ $rw->hamlet->nama_dusun ?? '-' }}</td>
                <td>
                    <a href="{{ route('rw.edit', $rw->id) }}">Edit</a> |
                    <form action="{{ route('rw.destroy', $rw->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus RW ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>