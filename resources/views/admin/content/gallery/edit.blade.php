@extends('admin.layouts.app')

@section('title','Ubah Galeri')

@section('content')
<div class="container mx-auto p-4">
  <a href="{{ route('admin.gallery.index') }}" class="inline-block text-green-600 hover:underline mb-4">&larr; Kembali</a>
  <div class="bg-white shadow-lg rounded-2xl p-8" data-aos="fade-up">
    <h2 class="text-2xl font-bold mb-6 text-green-800">✏️ Ubah Item Galeri</h2>

    @if($errors->any())
      <div class="mb-6 p-4 bg-red-100 text-red-800 rounded-lg shadow-sm">
        <ul class="list-disc list-inside space-y-1">
          @foreach($errors->all() as $e)
            <li>{{ $e }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.gallery.update',$item) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf @method('PUT')
      <div>
        <label class="block font-medium text-gray-700">Judul</label>
        <input type="text" name="title" value="{{ old('title',$item->title) }}"
               class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200 transition" required>
      </div>
      <div>
        <label class="block font-medium text-gray-700">Kategori</label>
        <input type="text" name="category" value="{{ old('category',$item->category) }}"
               class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200 transition" required>
      </div>
      <div>
        <label class="block font-medium text-gray-700">Tanggal</label>
        <input type="date" name="date" id="dateInput"
               class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200 transition" required>
      </div>
      <div>
        <label class="block font-medium text-gray-700">Gambar Saat Ini</label>
        <img src="{{ $item->image_url }}" class="h-32 w-full object-cover rounded-lg mb-4 shadow-md">
        <label class="block font-medium text-gray-700">Ganti Gambar</label>
        <input type="file" name="image" accept="image/*"
               class="w-full text-gray-600 focus:outline-none">
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

<script>
// isi tanggal dengan value lama atau hari ini jika belum ada
window.addEventListener('DOMContentLoaded', () => {
  const inp = document.getElementById('dateInput');
  if (inp) {
    inp.value = inp.value || new Date().toISOString().slice(0,10);
  }
});
</script>
@endsection