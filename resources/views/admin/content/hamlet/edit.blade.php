@extends('admin.layouts.app')

@section('title','Ubah Dusun')

@section('content')
<div class="container mx-auto p-4">
  <a href="{{ route('dusun.index') }}" class="inline-block text-green-600 hover:underline mb-4">&larr; Kembali</a>
  <div class="bg-white shadow-lg rounded-2xl p-6">
    <h2 class="text-2xl font-bold mb-6 text-green-800">✏️ Ubah Dusun</h2>

    @if($errors->any())
      <div class="mb-6 p-4 bg-red-100 text-red-800 rounded-lg">
        <ul class="list-disc list-inside space-y-1">
          @foreach($errors->all() as $e)
            <li>{{ $e }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('dusun.update', $dusun->id) }}" method="POST" class="space-y-5">
      @csrf @method('PUT')
      <div>
        <label class="block font-medium text-gray-700">Nama Dusun</label>
        <input type="text" name="nama_dusun" value="{{ old('nama_dusun', $dusun->nama_dusun) }}" required
               class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200 transition">
      </div>
      <div class="text-right">
        <button type="submit"
                class="bg-green-600 hover:bg-green-500 text-white font-semibold px-6 py-3 rounded-lg shadow transition">
          Perbarui
        </button>
      </div>
    </form>
  </div>
</div>
@endsection