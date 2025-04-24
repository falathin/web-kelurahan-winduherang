@extends('admin.layouts.app')

@section('title','Daftar Penduduk')

@section('content')
<div class="container mx-auto p-4">
  <div class="flex flex-col md:flex-row justify-between items-center mb-6 space-y-4 md:space-y-0">
    <div>
      <h1 class="text-3xl font-bold text-gray-800">📋 Daftar Penduduk</h1>
    </div>
    <div class="flex items-center space-x-2">
      <!-- Form Pencarian -->
      <form method="GET" action="{{ route('penduduk.index') }}" class="flex">
        <input
          type="text"
          name="search"
          value="{{ request('search', $search ?? '') }}"
          placeholder="Cari NIK atau Nama..."
          class="border border-gray-300 rounded-l-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-200"
        />
        <button type="submit"
                class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded-r-lg transition">
          🔍
        </button>
      </form>
      <a href="{{ route('penduduk.create') }}"
         class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-5 py-2 rounded-lg shadow transition">
        + Tambah Penduduk
      </a>
    </div>
  </div>

  @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow">
      {{ session('success') }}
    </div>
  @endif

  <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
    @if($penduduk->isEmpty())
      <div class="p-6 text-center text-gray-500">
        <p class="text-lg">😔 Belum ada data Penduduk.</p>
        <p class="mt-2">Klik tombol <strong>Tambah Penduduk</strong> untuk menambahkan data baru.</p>
      </div>
    @else
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">NIK</th>
              <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Nama Lengkap</th>
              <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">TTL</th>
              <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">JK</th>
              <th class="px-6 py-3"></th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-100">
            @foreach($penduduk as $res)
              <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $res->nik }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $res->nama_lengkap }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                  {{ $res->tempat_lahir }}, {{ \Carbon\Carbon::parse($res->tanggal_lahir)->format('d M Y') }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $res->jenis_kelamin }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                  <a href="{{ route('penduduk.show', $res) }}" class="text-blue-600 hover:underline">Detail</a>
                  <a href="{{ route('penduduk.edit', $res) }}" class="text-yellow-600 hover:underline">Edit</a>
                  <form action="{{ route('penduduk.destroy', $res) }}" method="POST" class="inline-block"
                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="px-6 py-4">
        {{ $penduduk->withQueryString()->links('vendor.pagination.tailwind') }}
      </div>
    @endif
  </div>
</div>
@endsection