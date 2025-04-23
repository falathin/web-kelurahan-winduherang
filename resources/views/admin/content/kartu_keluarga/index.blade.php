@extends('admin.layouts.app')

@section('title','Kelola Kartu Keluarga')

@section('content')
<div class="container mx-auto p-6">
  <div class="flex justify-between items-center mb-6" data-aos="fade-up">
    <h1 class="text-3xl font-bold text-green-800">Daftar Kartu Keluarga</h1>
    <a href="{{ route('kk.create') }}"
       class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded-lg shadow transition">
      + Tambah Kartu
    </a>
  </div>

  @if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-lg" data-aos="fade-up" data-aos-delay="100">
      {{ session('success') }}
    </div>
  @endif

  <div class="overflow-x-auto bg-white rounded-lg shadow" data-aos="fade-up" data-aos-delay="200">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-green-50">
        <tr>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No KK</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kepala Keluarga</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">RT / RW</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dusun</th>
          <th class="px-6 py-3"></th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-100">
        @forelse($kartuKeluarga as $kk)
          <tr data-aos="fade-up" data-aos-delay="300">
            <td class="px-6 py-4 text-sm">{{ $kk->no_kk }}</td>
            <td class="px-6 py-4 text-sm">{{ $kk->kepala_keluarga }}</td>
            <td class="px-6 py-4 text-sm">{{ Str::limit($kk->alamat, 40) }}</td>
            <td class="px-6 py-4 text-sm">{{ $kk->id_rt }} / {{ $kk->id_rw }}</td>
            <td class="px-6 py-4 text-sm">{{ $kk->id_dusun }}</td>
            <td class="px-6 py-4 text-right space-x-2">
              <a href="{{ route('kk.show',$kk) }}" class="text-blue-600 hover:underline">Lihat</a>
              <a href="{{ route('kk.edit',$kk) }}" class="text-yellow-600 hover:underline">Ubah</a>
              <form action="{{ route('kk.destroy',$kk) }}" method="POST" class="inline" onsubmit="return confirm('Hapus kartu keluarga ini?')">
                @csrf @method('DELETE')
                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada kartu keluarga.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection