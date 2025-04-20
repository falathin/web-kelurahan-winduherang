{{-- resources/views/galeri.blade.php --}}
@extends('layouts.app')

@section('title', 'Galeri Kegiatan - Kelurahan Winduherang')

@section('content')
@php
    // Dummy gallery items with categories and dates
    $galleryItems = [
        (object)['id'=>1, 'title'=>'Gotong Royong Pembangunan Jalan','image'=>'https://picsum.photos/seed/11/800/600','category'=>'Kegiatan','date'=>\Carbon\Carbon::now()->subDays(2)],
        (object)['id'=>2, 'title'=>'Panen Sayur Organik','image'=>'https://picsum.photos/seed/12/800/600','category'=>'Umum','date'=>\Carbon\Carbon::now()->subDays(5)],
        (object)['id'=>3, 'title'=>'Festival Seni Budaya','image'=>'https://picsum.photos/seed/13/800/600','category'=>'Seni','date'=>\Carbon\Carbon::now()->subDays(10)],
        (object)['id'=>4, 'title'=>'Posyandu Balita','image'=>'https://picsum.photos/seed/14/800/600','category'=>'Kegiatan','date'=>\Carbon\Carbon::now()->subDays(1)],
        (object)['id'=>5, 'title'=>'Pelatihan Kader Kesehatan','image'=>'https://picsum.photos/seed/15/800/600','category'=>'Kesehatan','date'=>\Carbon\Carbon::now()->subDays(7)],
        (object)['id'=>6, 'title'=>'Peringatan HUT Desa','image'=>'https://picsum.photos/seed/16/800/600','category'=>'Umum','date'=>\Carbon\Carbon::now()->subDays(14)],
        (object)['id'=>7, 'title'=>'Penyuluhan Pertanian','image'=>'https://picsum.photos/seed/17/800/600','category'=>'Pertanian','date'=>\Carbon\Carbon::now()->subDays(3)],
        (object)['id'=>8, 'title'=>'Pasar Rakyat Mingguan','image'=>'https://picsum.photos/seed/18/800/600','category'=>'Ekonomi','date'=>\Carbon\Carbon::now()->subDays(4)],
    ];
    $categories = collect($galleryItems)->pluck('category')->unique();
@endphp

<section class="bg-green-50 py-16">
  <div class="max-w-6xl mx-auto px-4">
    <h1 class="text-4xl font-extrabold text-center mb-8 text-green-800">Galeri Kegiatan Desa</h1>

    {{-- Filters --}}
    <div class="flex flex-col md:flex-row justify-between items-center mb-8 space-y-4 md:space-y-0">
      <div class="relative w-full md:w-1/3">
        <input id="gallerySearch" type="text" placeholder="Cari judul..."
               class="w-full pl-10 pr-4 py-2 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-200"
               oninput="filterGallery()" />
        <svg class="absolute inset-y-0 left-0 ml-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
        </svg>
      </div>
      <div class="flex flex-wrap gap-2">
        <button class="category-btn px-4 py-1 rounded-lg bg-white border border-green-300 text-green-700 hover:bg-green-100 transition" data-cat="All" onclick="filterGallery()">All</button>
        @foreach($categories as $cat)
        <button class="category-btn px-4 py-1 rounded-lg bg-white border border-green-300 text-green-700 hover:bg-green-100 transition" data-cat="{{ $cat }}" onclick="filterGallery()">{{ $cat }}</button>
        @endforeach
      </div>
    </div>

    {{-- Gallery Grid --}}
    <div id="galleryGrid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      @foreach($galleryItems as $item)
      <div class="gallery-item group relative overflow-hidden rounded-lg shadow-lg cursor-pointer transform transition duration-300 hover:scale-105"
           data-category="{{ $item->category }}" data-title="{{ Str::lower($item->title) }}"
           onclick="openModal('{{ $item->image }}', '{{ $item->title }}')">
        <img src="{{ $item->image }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
          <span class="text-white font-bold text-lg text-center px-3">{{ $item->title }}</span>
          <span class="text-gray-200 text-sm mt-1">{{ $item->date->translatedFormat('d M Y') }}</span>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <!-- Modal -->
  <div id="galleryModal" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center hidden z-50">
    <div id="modalContent" class="relative bg-white rounded-lg overflow-hidden w-full max-w-3xl mx-4 animate__animated animate__zoomIn">
      <button id="modalClose" class="absolute top-4 right-4 text-white bg-green-700 rounded-full p-2 hover:bg-green-600 shadow-lg focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>
      <img id="modalImage" src="" alt="" class="w-full max-h-[80vh] object-contain bg-gray-100">
      <div class="p-4 bg-green-50">
        <h3 id="modalCaption" class="text-2xl font-semibold text-green-800"></h3>
      </div>
    </div>
  </div>
</section>

<script>
  function filterGallery() {
    const search = document.getElementById('gallerySearch').value.toLowerCase();
    const selected = document.querySelector('.category-btn.bg-green-100')?.dataset.cat || 'All';
    document.querySelectorAll('.gallery-item').forEach(item => {
      const title = item.dataset.title;
      const cat = item.dataset.category;
      const show = (selected === 'All' || cat === selected) && title.includes(search);
      item.style.display = show ? '' : 'none';
    });
  }
  document.querySelectorAll('.category-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.category-btn').forEach(b => b.classList.remove('bg-green-100','text-white'));
      btn.classList.add('bg-green-100','text-white');
    });
  });
  function openModal(src, caption) {
    document.getElementById('modalImage').src = src;
    document.getElementById('modalCaption').textContent = caption;
    document.getElementById('galleryModal').classList.remove('hidden');
  }
  function closeModal() {
    document.getElementById('galleryModal').classList.add('hidden');
  }
  // Close modal on outside click
  document.getElementById('galleryModal').addEventListener('click', function(e) {
    if (e.target.id === 'galleryModal') {
      closeModal();
    }
  });
  // Close on close button
  document.getElementById('modalClose').addEventListener('click', closeModal);
</script>
@endsection