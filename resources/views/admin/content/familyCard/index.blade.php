<h1>Daftar Kartu Keluarga</h1>
<!-- Tabel data kartu keluarga -->
<table class="table table-bordered" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kartu Keluarga</th>
            <th>Nama Dusun</th>
            <th>Nomor RW</th>
            <th>Nomor RT</th>
            <th>Jumlah Anggota</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kartuKeluarga as $index => $familyCard)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $familyCard->no_kk }}</td>
                <td>{{ $familyCard->hamlet->nama_dusun ?? '' }}</td>
                <td>{{ $familyCard->rw->nomor_rw }}</td>
                <td>{{ $familyCard->rt->nomor_rt }}</td>
                <td>{{ $familyCard->residents->count() }}</td>
                <td>
                    <!-- Tombol untuk mengedit data kartu keluarga -->
                    <a href="{{ route('kk.edit', $familyCard->id) }}" class="btn btn-primary">Edit</a>


                    <!-- Tombol untuk melihat detail kartu keluarga -->
                    <a href="{{ route('kk.show', $familyCard->id) }}" class="btn btn-info">Detail</a>
                    
                    <!-- Tombol untuk menghapus data kartu keluarga -->
                    <form action="{{ route('kk.destroy', $familyCard->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<!-- Tombol untuk menambahkan data kartu keluarga baru -->
<a href="{{ route('kk.create') }}" class="btn btn-success">Tambah Kartu Keluarga</a>
