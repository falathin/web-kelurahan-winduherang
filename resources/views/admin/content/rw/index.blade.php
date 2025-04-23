@extends('admin.layouts.app')

@section('title','Daftar RW')

@section('content')
<div class="container mx-auto p-4">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">📋 Daftar RW</h1>
    <a href="{{ route('rw.create') }}"
       class="bg-green-600 hover:bg-green-500 text-white font-semibold px-5 py-2 rounded-lg shadow transition duration-200">
      + Tambah RW
    </a>
  </div>

  @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow">
      {{ session('success') }}
    </div>
  @endif

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
            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No</th>
            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nomor RW</th>
            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Dusun</th>
            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-100">
          @foreach ($rws as $i => $rw)
            <tr class="hover:bg-gray-50 transition">
              <td class="px-6 py-4 whitespace-nowrap">{{ $i + 1 }}</td>
              <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-800">{{ $rw->nomor_rw }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ optional($rw->dusun)->nama_dusun ?? '-' }}</td>
              <td class="px-6 py-4 whitespace-nowrap space-x-2">
                <a href="{{ route('rw.edit', $rw->id) }}"
                   class="inline-block bg-yellow-400 hover:bg-yellow-300 text-black px-3 py-1 rounded-lg transition duration-150">
                  ✏️ Edit
                </a>
                <form action="{{ route('rw.destroy', $rw->id) }}" method="POST" class="inline-block"
                      onsubmit="return confirm('Yakin ingin menghapus RW ini?')">
                  @csrf @method('DELETE')
                  <button type="submit"
                          class="bg-red-600 hover:bg-red-500 text-white px-3 py-1 rounded-lg transition duration-150">
                    🗑️ Hapus
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
</div>
@endsection
