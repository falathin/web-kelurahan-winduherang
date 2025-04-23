@extends('admin.layouts.app')

@section('title','Detail Kartu Keluarga')

@section('content')
<div class="container mx-auto p-6">
  <a href="{{ route('kk.index') }}" class="text-green-600 hover:underline">&larr; Kembali</a>

  <div class="bg-white shadow-lg rounded-lg overflow-hidden mt-4">
    <div class="p-6">
      <h2 class="text-2xl font-bold text-green-800 mb-4">Kartu Keluarga: {{ $kartuKeluarga->no_kk }}</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700 mb-6">
        <div><strong>Dusun:</strong> {{ $kartuKeluarga->hamlet->nama_dusun ?? '-' }}</div>
        <div><strong>RW:</strong> {{ $kartuKeluarga->rw->nomor_rw }}</div>
        <div><strong>RT:</strong> {{ $kartuKeluarga->rt->nomor_rt }}</div>
        <div><strong>Jumlah Anggota:</strong> {{ $kartuKeluarga->residents->count() }}</div>
      </div>
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">NIK</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">JK</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">SHDK</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-100">
          @foreach($kartuKeluarga->residents as $j=>$r)
            <tr>
              <td class="px-6 py-4">{{ $j+1 }}</td>
              <td class="px-6 py-4">{{ $r->nik }}</td>
              <td class="px-6 py-4">{{ $r->nama_lengkap }}</td>
              <td class="px-6 py-4">{{ $r->jenis_kelamin }}</td>
              <td class="px-6 py-4">{{ $r->shdk }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection