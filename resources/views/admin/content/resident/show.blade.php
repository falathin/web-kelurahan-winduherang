<h1>Detail Penduduk</h1>

<a href="{{ route('penduduk.index') }}" class="btn btn-secondary mb-3">Kembali</a>

<div class="space-y-2">
    <div><strong>NIK:</strong> {{ $penduduk->nik }}</div>
    <div><strong>Nama Lengkap:</strong> {{ $penduduk->nama_lengkap }}</div>
    <div><strong>Tempat Lahir:</strong> {{ $penduduk->tempat_lahir }}</div>
    <div><strong>Tanggal Lahir:</strong> {{ $penduduk->tanggal_lahir }}</div>
    <div><strong>Jenis Kelamin:</strong> {{ $penduduk->jenis_kelamin }}</div>
    <div><strong>Agama:</strong> {{ $penduduk->agama }}</div>
    <div><strong>Status Perkawinan:</strong> {{ $penduduk->status_perkawinan }}</div>
    <div><strong>Pekerjaan:</strong> {{ $penduduk->pekerjaan }}</div>
    <div><strong>Pendidikan:</strong> {{ $penduduk->pendidikan }}</div>
    <div><strong>Golongan Darah:</strong> {{ $penduduk->gol_darah }}</div>
    <div><strong>SHDK:</strong> {{ $penduduk->shdk }}</div>
    <div><strong>No Kartu Keluarga:</strong> {{ $penduduk->familyCard->no_kk ?? '-' }}</div>
    <div><strong>NIK Ayah:</strong> {{ $penduduk->father->nama_lengkap ?? '-' }} ({{ $penduduk->father->nik ?? '-' }})</div>
    <div><strong>NIK Ibu:</strong> {{ $penduduk->mother->nama_lengkap ?? '-' }} ({{ $penduduk->mother->nik ?? '-' }})</div>
    <div><strong>No Telepon:</strong> {{ $penduduk->no_telp }}</div>
</div>