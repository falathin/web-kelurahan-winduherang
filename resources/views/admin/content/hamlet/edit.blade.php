@extends('admin.layouts.app')

@section('title', 'Edit Dusun')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-green-800 mb-6">Edit Dusun</h1>

    @if($errors->any())
        <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-800 rounded-lg">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white shadow rounded-2xl p-6">
        <form action="{{ route('dusun.update', $dusun->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_dusun" class="block text-gray-700 font-medium mb-1">Nama Dusun</label>
                <input type="text" name="nama_dusun" id="nama_dusun" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-200" value="{{ old('nama_dusun', $dusun->nama_dusun) }}" required placeholder="Masukkan Nama Dusun">
            </div>
            <div class="flex justify-end space-x-2">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-500 transition">Simpan</button>
                <a href="{{ route('dusun.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection