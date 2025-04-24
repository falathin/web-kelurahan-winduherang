@extends('admin.layouts.app')

@section('title','Daftar Kartu Keluarga')

@section('content')
<div class="container mx-auto p-4">
  <div class="flex flex-col md:flex-row justify-between items-center mb-6 space-y-4 md:space-y-0">
    <div>
      <h1 class="text-3xl font-bold text-gray-800">📋 Daftar Kartu Keluarga</h1>
    </div>
    <div class="flex items-center space-x-2">
      <form method="GET" action="{{ route('kk.index') }}" class="flex">
        <input
          type="text"
          name="search"
          value="{{ request('search') }}"
          placeholder="Cari No KK, Dusun, RW, RT..."
          class="border border-gray-300 rounded-l-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-200"
        />
        <button type="submit"
                class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded-r-lg transition">
          🔍
        </button>
      </form>
      <a href="{{ route('kk.create') }}"
         class="bg-green-600 hover:bg-green-500 text-white font-semibold px-5 py-2 rounded-lg shadow transition">
        + Tambah Kartu Keluarga
      </a>
    </div>
  </div>

  @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow">
      {{ session('success') }}
    </div>
  @endif

  <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
    @if($kartuKeluarga->isEmpty())
      <div class="p-6 text-center text-gray-500">
        <p class="text-lg">😔 Belum ada data Kartu Keluarga.</p>
        <p class="mt-2">Klik tombol <strong>Tambah Kartu Keluarga</strong> untuk menambahkan data baru.</p>
      </div>
    @else
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">No</th>
              <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">No KK</th>
              <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Dusun</th>
              <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">RW</th>
              <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">RT</th>
              <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Anggota</th>
              <th class="px-6 py-3"></th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-100">
            @foreach($kartuKeluarga as $i => $kk)
              <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 whitespace-nowrap">{{ $kartuKeluarga->firstItem() + $i }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $kk->no_kk }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $kk->hamlet->nama_dusun ?? '-' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $kk->rw->nomor_rw }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $kk->rt->nomor_rt }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $kk->residents->count() }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                  <a href="{{ route('kk.show', $kk) }}" class="text-blue-600 hover:underline">Detail</a>
                  <a href="{{ route('kk.edit', $kk) }}" class="text-yellow-600 hover:underline">Edit</a>
                  <form action="{{ route('kk.destroy', $kk) }}" method="POST" class="inline-block"
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

      {{-- Pagination --}}
      <div class="px-6 py-4">
        {{ $kartuKeluarga->withQueryString()->links('vendor.pagination.tailwind') }}
      </div>
    @endif
  </div>
</div>
@endsection