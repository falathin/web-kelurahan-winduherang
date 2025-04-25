<h1>Daftar Dusun</h1>
<a href="{{ route('dusun.create') }}">Tambah Dusun</a>  
{{-- Menampilkan pesan sukses jika ada --}}
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Dusun</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dusuns as $index => $dusun)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $dusun->nama_dusun }}</td>
                {{-- @dd($dusun->id) --}}
                <td>
                    <a href="{{ route('dusun.edit', $dusun->id) }}">Edit</a> |
                    <form action="{{ route('dusun.destroy', $dusun->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus dusun ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>