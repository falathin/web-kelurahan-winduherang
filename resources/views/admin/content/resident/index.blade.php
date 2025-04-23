@extends('admin.layouts.app')

@section('title','Daftar Penduduk')

@section('content')
<div class="container mx-auto py-8" data-aos="fade-up">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-green-800">Daftar Penduduk</h1>
    <a href="{{ route('penduduk.create') }}"
       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow">
      + Tambah Penduduk
    </a>
  </div>

  @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
      {{ session('success') }}
    </div>
  @endif

  <div class="overflow-x-auto bg-white rounded-lg shadow">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">NIK</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Lengkap</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">TTL</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">JK</th>
          <th class="px-6 py-3"></th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-100">
        @forelse($penduduk as $res)
          <tr data-aos="fade-up">
            <td class="px-6 py-4 text-sm">{{ $res->nik }}</td>
            <td class="px-6 py-4 text-sm">{{ $res->nama_lengkap }}</td>
            <td class="px-6 py-4 text-sm">{{ $res->tempat_lahir }}, {{ $res->tanggal_lahir }}</td>
            <td class="px-6 py-4 text-sm">{{ $res->jenis_kelamin }}</td>
            <td class="px-6 py-4 text-right space-x-2">
              <a href="{{ route('penduduk.show', $res) }}" class="text-blue-600 hover:underline">Detail</a>
              <a href="{{ route('penduduk.edit', $res) }}" class="text-yellow-600 hover:underline">Edit</a>
              <form action="{{ route('penduduk.destroy', $res) }}" method="POST" class="inline"
                    onsubmit="return confirm('Hapus data penduduk ini?')">
                @csrf @method('DELETE')
                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada data penduduk.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection