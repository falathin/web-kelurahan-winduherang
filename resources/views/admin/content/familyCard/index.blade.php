@extends('admin.layouts.app')

@section('title','Daftar Kartu Keluarga')

@section('content')
<div class="container mx-auto p-6">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-green-800">Daftar Kartu Keluarga</h1>
    <a href="{{ route('kk.create') }}"
       class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded-lg shadow">
      + Tambah Kartu Keluarga
    </a>
  </div>

  <div class="overflow-x-auto bg-white rounded-lg shadow">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No KK</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Dusun</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">RW</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">RT</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Anggota</th>
          <th class="px-6 py-3"></th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-100">
        @foreach($kartuKeluarga as $i=>$kk)
          <tr>
            <td class="px-6 py-4">{{ $i+1 }}</td>
            <td class="px-6 py-4">{{ $kk->no_kk }}</td>
            <td class="px-6 py-4">{{ $kk->hamlet->nama_dusun ?? '-' }}</td>
            <td class="px-6 py-4">{{ $kk->rw->nomor_rw }}</td>
            <td class="px-6 py-4">{{ $kk->rt->nomor_rt }}</td>
            <td class="px-6 py-4">{{ $kk->residents->count() }}</td>
            <td class="px-6 py-4 text-right space-x-2">
              <a href="{{ route('kk.show',$kk) }}" class="text-blue-600 hover:underline">Detail</a>
              <a href="{{ route('kk.edit',$kk) }}" class="text-yellow-600 hover:underline">Edit</a>
              <form action="{{ route('kk.destroy',$kk) }}" method="POST" class="inline" onsubmit="return confirm('Hapus?')">
                @csrf @method('DELETE')
                <button class="text-red-600 hover:underline">Hapus</button>
              </form>
            </td>
          </tr>
        @endforeach
        @if($kartuKeluarga->isEmpty())
          <tr>
            <td colspan="7" class="px-6 py-4 text-center text-gray-500">Belum ada data KK.</td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>
@endsection