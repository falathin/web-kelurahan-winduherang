@extends('admin.layouts.app')

@section('title','Tambah Kartu Keluarga')

@section('content')
<div class="container mx-auto p-6">
  <a href="{{ route('kk.index') }}" class="text-green-600 hover:underline">&larr; Kembali</a>

  <div class="bg-white shadow-lg rounded-lg p-6 mt-4" data-aos="fade-up">
    <h2 class="text-2xl font-bold text-green-800 mb-4">Form Tambah Kartu Keluarga</h2>

    @if($errors->any())
      <div class="mb-4 p-4 bg-red-100 text-red-800 rounded" data-aos="fade-up" data-aos-delay="100">
        <ul class="list-disc list-inside">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('kk.store') }}" method="POST" class="space-y-4" data-aos="fade-up" data-aos-delay="200">
      @csrf

      <div>
        <label class="block font-medium text-gray-700">No KK</label>
        <input type="text" name="no_kk" value="{{ old('no_kk') }}"
               class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200" required>
      </div>

      <div>
        <label class="block font-medium text-gray-700">Kepala Keluarga</label>
        <input type="text" name="kepala_keluarga" value="{{ old('kepala_keluarga') }}"
               class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200" required>
      </div>

      <div>
        <label class="block font-medium text-gray-700">Alamat</label>
        <textarea name="alamat" rows="3"
                  class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200"
                  required>{{ old('alamat') }}</textarea>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
          <label class="block font-medium text-gray-700">RT</label>
          <input type="text" name="id_rt" value="{{ old('id_rt') }}"
                 class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200" required>
        </div>
        <div>
          <label class="block font-medium text-gray-700">RW</label>
          <input type="text" name="id_rw" value="{{ old('id_rw') }}"
                 class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200" required>
        </div>
        <div>
          <label class="block font-medium text-gray-700">Dusun</label>
          <input type="text" name="id_dusun" value="{{ old('id_dusun') }}"
                 class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200" required>
        </div>
      </div>

      <div class="text-center">
        <button type="submit"
                class="bg-green-600 hover:bg-green-500 text-white px-6 py-2 rounded-lg shadow transition">
          Simpan Kartu
        </button>
      </div>
    </form>
  </div>
</div>
@endsection