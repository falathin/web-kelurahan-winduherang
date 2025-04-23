@extends('admin.layouts.app')

@section('title','Tambah RT')

@section('content')
<div class="container mx-auto p-4">
  <a href="{{ route('rt.index') }}" class="inline-block text-green-600 hover:underline mb-4">&larr; Kembali</a>

  @if($errors->any())
    <div class="mb-6 p-4 bg-red-100 text-red-800 rounded-lg shadow-sm">
      <ul class="list-disc list-inside space-y-1">
        @foreach($errors->all() as $e)
          <li>{{ $e }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="bg-white shadow-lg rounded-2xl p-8">
    <h2 class="text-2xl font-bold mb-6 text-green-800">➕ Tambah RT</h2>
    <form action="{{ route('rt.store') }}" method="POST" class="space-y-6">
      @csrf
      <div>
        <label class="block font-medium text-gray-700">Nomor RT</label>
        <input type="text" name="nomor_rt" id="nomor_rt" value="{{ old('nomor_rt') }}"
               class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200" required>
      </div>
      <div>
        <label class="block font-medium text-gray-700">Nomor RW</label>
        <select name="id_rw" id="id_rw"
                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200" required>
          <option value="">Pilih RW</option>
          @foreach($rws as $rw)
            <option value="{{ $rw->id }}"{{ old('id_rw') == $rw->id ? ' selected' : '' }}>
              {{ $rw->nomor_rw }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="text-right">
        <button type="submit"
                class="bg-green-600 hover:bg-green-500 text-white font-semibold px-6 py-3 rounded-lg">
          Simpan
        </button>
      </div>
    </form>
  </div>
</div>
@endsection