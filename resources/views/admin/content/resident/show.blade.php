@extends('admin.layouts.app')

@section('title','Detail Penduduk')

@section('content')
<div class="container mx-auto p-6" data-aos="fade-up">
  <a href="{{ route('penduduk.index') }}" class="text-green-600 hover:underline">&larr; Kembali</a>

  <div class="bg-white shadow-lg rounded-lg p-6 mt-4">
    <h2 class="text-2xl font-bold text-green-800 mb-4">Detail Penduduk</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700">
      <div>
        <p><strong>NIK:</strong> {{ $penduduk->nik }}</p>
        <p><strong>Nama Lengkap:</strong> {{ $penduduk->nama_lengkap }}</p>
        <p><strong>Tempat Lahir:</strong> {{ $penduduk->tempat_lahir }}</p>
        <p><strong>Tanggal Lahir:</strong> {{ $penduduk->tanggal_lahir }}</p>
      </div>
      <div>
        <p><strong>Jenis Kelamin:</strong> {{ $penduduk->jenis_kelamin }}</p>
        <p><strong>Agama:</strong> {{ $penduduk->agama }}</p>
        <p><strong>Status Perkawinan:</strong> {{ $penduduk->status_perkawinan }}</p>
        <p><strong>Golongan Darah:</strong> {{ $penduduk->gol_darah }}</p>
      </div>
      <div>
        <p><strong>Pekerjaan:</strong> {{ $penduduk->pekerjaan }}</p>
        <p><strong>Pendidikan:</strong> {{ $penduduk->pendidikan }}</p>
        <p><strong>SHDK:</strong> {{ $penduduk->shdk }}</p>
        <p><strong>No Telepon:</strong> {{ $penduduk->no_telp }}</p>
      </div>
      <div>
        <p><strong>No KK:</strong> {{ $penduduk->familyCard->no_kk ?? '-' }}</p>
        <p><strong>Ayah:</strong> {{ $penduduk->father->nama_lengkap ?? '-' }} ({{ $penduduk->father->nik ?? '-' }})</p>
        <p><strong>Ibu:</strong> {{ $penduduk->mother->nama_lengkap ?? '-' }} ({{ $penduduk->mother->nik ?? '-' }})</p>
      </div>
    </div>
  </div>
</div>
@endsection