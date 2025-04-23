@extends('admin.layouts.app')

@section('title','Detail Kartu Keluarga')

@section('content')
<div class="container mx-auto p-6">
  <a href="{{ route('kk.index') }}" class="text-green-600 hover:underline">&larr; Kembali</a>

  <div class="bg-white shadow-lg rounded-lg overflow-hidden mt-4" data-aos="fade-up">
    <div class="p-6">
      <h2 class="text-2xl font-bold text-green-800 mb-4">No KK: {{ $kartuKeluarga->no_kk }}</h2>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700">
        <div>
          <p><strong>Kepala Keluarga:</strong> {{ $kartuKeluarga->kepala_keluarga }}</p>
          <p><strong>Alamat:</strong> {{ $kartuKeluarga->alamat }}</p>
        </div>
        <div>
          <p><strong>RT / RW:</strong> {{ $kartuKeluarga->id_rt }} / {{ $kartuKeluarga->id_rw }}</p>
          <p><strong>Dusun:</strong> {{ $kartuKeluarga->id_dusun }}</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
