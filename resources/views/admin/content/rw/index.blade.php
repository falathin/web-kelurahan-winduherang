@extends('admin.layouts.app')

@section('title','Daftar RW')

@section('content')
<div class="container mx-auto p-4">

  {{-- Header + Search + Tambah --}}
  <div class="flex flex-col md:flex-row items-center justify-between mb-6 space-y-4 md:space-y-0">
    <h1 class="text-3xl font-bold text-gray-800">📋 Daftar RW</h1>
    <div class="flex items-center space-x-2 w-full md:w-auto">
      {{-- Form Search --}}
      <form method="GET" action="{{ route('rw.index') }}" class="flex flex-1 md:flex-none">
        <input
          type="text"
          name="search"
          value="{{ $search }}"
          placeholder="Cari RW atau Dusun…"
          class="w-full md:w-64 border border-gray-300 rounded-l-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-200"
        />
        <button type="submit"
                class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded-r-lg transition">
          🔍
        </button>
      </form>
      {{-- Button Tambah --}}
      <a href="{{ route('rw.create') }}"
         class="bg-green-600 hover:bg-green-500 text-white font-semibold px-5 py-2 rounded-lg shadow transition">
        + Tambah RW
      </a>
    </div>
  </div>

  {{-- Flash Success --}}
  @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow">
      {{ session('success') }}
    </div>
  @endif

  {{-- Table --}}
  <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
    @if($rws->isEmpty())
      <div class="p-6 text-center text-gray-500">
        <p class="text-lg">😔 Belum ada data RW.</p>
        <p class="mt-2">Klik tombol <strong>Tambah RW</strong> untuk menambahkan data baru.</p>
      </div>
    @else
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">No</th>
            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Nomor RW</th>
            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Nama Dusun</th>
            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-100">
          @foreach ($rws as $i => $rw)
            <tr class="hover:bg-gray-50 transition">
              <td class="px-6 py-4 whitespace-nowrap">{{ $rws->firstItem() + $i }}</td>
              <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-800">{{ $rw->nomor_rw }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-gray-700">
                {{ optional($rw->hamlet)->nama_dusun ?? '-' }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap space-x-2">
                <a href="{{ route('rw.edit', $rw->id) }}"
                   class="inline-block bg-yellow-400 hover:bg-yellow-300 text-black px-3 py-1 rounded-lg transition">
                  ✏️ Edit
                </a>
                <form action="{{ route('rw.destroy', $rw->id) }}" method="POST" class="inline-block"
                      onsubmit="return confirm('Yakin ingin menghapus RW ini?')">
                  @csrf @method('DELETE')
                  <button type="submit"
                          class="bg-red-600 hover:bg-red-500 text-white px-3 py-1 rounded-lg transition">
                    🗑️ Hapus
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      {{-- Pagination --}}
      <div class="px-6 py-4">
        {{ $rws->links('vendor.pagination.tailwind') }}
      </div>
    @endif
  </div>
</div>
@endsection