@extends('admin.layouts.app')

@section('title','Daftar RT')

@section('content')
<div class="container mx-auto p-4">
  <div class="flex flex-col md:flex-row justify-between items-center mb-6 space-y-4 md:space-y-0">
    <h1 class="text-3xl font-bold text-gray-800">📋 Daftar RT</h1>
    <div class="flex items-center space-x-2">
      <!-- Search Form -->
      <form method="GET" action="{{ route('rt.index') }}" class="flex">
        <input
          type="text"
          name="search"
          value="{{ $search }}"
          placeholder="Cari RT / RW..."
          class="border border-gray-300 rounded-l-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-200"
        />
        <button type="submit"
                class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded-r-lg transition">
          🔍
        </button>
      </form>
      <a href="{{ route('rt.create') }}"
         class="bg-green-600 hover:bg-green-500 text-white font-semibold px-5 py-2 rounded-lg shadow transition">
        + Tambah RT
      </a>
    </div>
  </div>

  @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow">
      {{ session('success') }}
    </div>
  @endif

  <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
    @if($rts->isEmpty())
      <div class="p-6 text-center text-gray-500">
        <p class="text-lg">😔 Belum ada data RT.</p>
        <p class="mt-2">Klik tombol <strong>Tambah RT</strong> untuk membuat data baru.</p>
      </div>
    @else
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">No</th>
            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Nomor RT</th>
            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Nomor RW</th>
            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-100">
          @foreach ($rts as $i => $rt)
            <tr class="hover:bg-gray-50 transition">
              <td class="px-6 py-4 whitespace-nowrap">{{ $rts->firstItem() + $i }}</td>
              <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-800">{{ $rt->nomor_rt }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $rt->rw->nomor_rw }}</td>
              <td class="px-6 py-4 whitespace-nowrap space-x-2">
                <a href="{{ route('rt.edit', $rt->id) }}"
                   class="inline-block bg-yellow-400 hover:bg-yellow-300 text-black px-3 py-1 rounded-lg transition">
                  ✏️ Edit
                </a>
                <form action="{{ route('rt.destroy', $rt->id) }}" method="POST" class="inline-block"
                      onsubmit="return confirm('Yakin ingin menghapus RT ini?')">
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
        {{ $rts->links('vendor.pagination.tailwind') }}
      </div>
    @endif
  </div>
</div>
@endsection