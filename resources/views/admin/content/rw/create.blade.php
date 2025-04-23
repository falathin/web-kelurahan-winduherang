@extends('admin.layouts.app')

@section('title','Tambah RW')

@section('content')
<div class="container mx-auto p-4">
  <a href="{{ route('rw.index') }}" class="inline-block text-green-600 hover:underline mb-4">&larr; Kembali</a>
  <div class="bg-white shadow-lg rounded-2xl p-6">
    <h2 class="text-2xl font-bold mb-6 text-green-800">➕ Tambah RW</h2>

    @if($errors->any())
      <div class="mb-6 p-4 bg-red-100 text-red-800 rounded-lg">
        <ul class="list-disc list-inside space-y-1">
          @foreach($errors->all() as $e)
            <li>{{ $e }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('rw.store') }}" method="POST" class="space-y-5">
      @csrf
      <div>
        <label class="block font-medium text-gray-700">Nomor RW</label>
        <input type="text" name="nomor_rw" value="{{ old('nomor_rw') }}" required
               class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200 transition">
      </div>
      <div>
        <label class="block font-medium text-gray-700">Nama Dusun</label>
        <select name="id_dusun" required
                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200 transition">
          <option value="">Pilih Dusun</option>
          @foreach ($dusuns as $dusun)
            <option value="{{ $dusun->id }}" {{ old('id_dusun') == $dusun->id ? 'selected' : '' }}>
              {{ $dusun->nama_dusun }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="text-right">
        <button type="submit"
                class="bg-green-600 hover:bg-green-500 text-white font-semibold px-6 py-3 rounded-lg shadow transition">
          Simpan
        </button>
      </div>
    </form>
  </div>
</div>
@endsection