{{-- resources/views/berita.blade.php --}}
@extends('layouts.app')

@section('title', 'Berita Desa - Kelurahan Sukamulya')

@section('content')
@php
    // Dummy categories
    $categories = [
        (object)['id'=>1,'name'=>'Umum'],
        (object)['id'=>2,'name'=>'Kegiatan'],
        (object)['id'=>3,'name'=>'Pengumuman'],
    ];

    // Dummy news items with multiple images
    $newsItems = [
        (object)[
            'id'=>1,
            'title'=>'Panen Raya Padi di Sawah Desa',
            'excerpt'=>'Warga desa bersuka cita merayakan panen padi perdana dengan tumpeng tradisional.',
            'images'=>[
                'https://picsum.photos/seed/1a/800/500',
                'https://picsum.photos/seed/1b/800/500',
                'https://picsum.photos/seed/1c/800/500',
            ],
            'created_at'=>\Carbon\Carbon::now()->subDays(1),
            'category'=>$categories[1],
        ],
        (object)[
            'id'=>2,
            'title'=>'Posyandu Lansia Dibuka Setiap Rabu',
            'excerpt'=>'Layanan posyandu lansia buka setiap Rabu: cek tekanan darah, konseling gizi, dan senam ringan.',
            'images'=>[
                'https://picsum.photos/seed/2a/800/500',
                'https://picsum.photos/seed/2b/800/500',
            ],
            'created_at'=>\Carbon\Carbon::now()->subDays(3),
            'category'=>$categories[2],
        ],
        (object)[
            'id'=>3,
            'title'=>'Festival Kuliner Tradisional',
            'excerpt'=>'Festival kuliner menampilkan sate maranggi, peuyeum, dan gulai ikan lele khas desa.',
            'images'=>[
                'https://picsum.photos/seed/3a/800/500',
                'https://picsum.photos/seed/3b/800/500',
                'https://picsum.photos/seed/3c/800/500',
            ],
            'created_at'=>\Carbon\Carbon::now()->subDays(5),
            'category'=>$categories[0],
        ],
    ];
@endphp

<section class="bg-green-50 py-16">
  <div class="max-w-6xl mx-auto px-4">
    <h1 class="text-5xl font-extrabold text-center text-green-800 mb-12">Berita Desa</h1>

    {{-- Search & Filter --}}
    <div class="flex flex-col md:flex-row items-center justify-between mb-12 gap-4">
      <div class="relative w-full md:w-1/2">
        <input type="text" placeholder="Cari berita..."
               class="w-full py-3 pl-12 pr-4 rounded-lg border border-green-300 focus:outline-none focus:ring-2 focus:ring-green-200 transition" />
        <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
          <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
               viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
          </svg>
        </div>
      </div>
      <div class="relative w-full md:w-1/4">
        <select class="appearance-none w-full py-3 pl-4 pr-10 rounded-lg border border-green-300 focus:outline-none focus:ring-2 focus:ring-green-200 transition text-gray-700">
          <option value="">Semua Kategori</option>
          @foreach($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
          @endforeach
        </select>
        <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none">
          <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
               viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 9l-7 7-7-7"/>
          </svg>
        </div>
      </div>
      <div class="w-full md:w-auto">
        <button class="w-full md:w-auto flex items-center justify-center gap-2 bg-green-600 hover:bg-green-500 text-white py-3 px-6 rounded-lg transition">
          Filter
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
               viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L14 13.414V19a1 1 0 01-1.447.894l-4-2A1 1 0 018 17v-3.586L3.293 6.707A1 1 0 013 6V4z"/>
          </svg>
        </button>
      </div>
    </div>

    {{-- News Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach($newsItems as $idx => $item)
        <div
          class="group bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition cursor-pointer"
          data-index="{{ $idx }}"
          data-title="{{ $item->title }}"
          data-date="{{ $item->created_at->format('d M Y') }}"
          data-category="{{ $item->category->name }}"
          data-excerpt="{{ $item->excerpt }}"
          data-images="{{ implode('|', $item->images) }}"
          onclick="openDetail({{ $idx }})"
        >
          <div class="relative overflow-hidden">
            <img src="{{ $item->images[0] }}" alt="{{ $item->title }}"
                 class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500" />
            <span class="absolute top-4 left-4 bg-green-600 text-white px-3 py-1 rounded-full text-xs uppercase">{{ $item->category->name }}</span>
            <span class="absolute top-4 right-4 bg-white bg-opacity-80 text-gray-800 px-3 py-1 rounded-full text-xs">{{ $item->created_at->format('d M Y') }}</span>
          </div>
          <div class="p-6 flex flex-col h-48 justify-between">
            <h2 class="text-lg font-semibold text-gray-800 line-clamp-2">{{ $item->title }}</h2>
            <p class="text-gray-600 line-clamp-3">{{ $item->excerpt }}</p>
            <div class="mt-4 text-green-700 font-semibold hover:underline">Baca Detail &rarr;</div>
          </div>
        </div>
      @endforeach
    </div>

    {{-- Pagination Placeholder --}}
    <nav class="mt-12 flex justify-center space-x-2">
      <button class="px-4 py-1 bg-white border border-green-300 text-green-600 rounded-lg hover:bg-green-50 transition">&laquo;</button>
      <button class="px-4 py-1 bg-green-600 text-white rounded-lg">1</button>
      <button class="px-4 py-1 bg-white border border-green-300 text-green-600 rounded-lg hover:bg-green-50 transition">2</button>
      <button class="px-4 py-1 bg-white border border-green-300 text-green-600 rounded-lg hover:bg-green-50 transition">&raquo;</button>
    </nav>
  </div>
</section>

{{-- Detail Modal --}}
<div
  id="detailModal"
  class="fixed inset-0 bg-black bg-opacity-70 backdrop-blur-sm flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300 z-50"
>
  <div class="relative w-full max-w-2xl mx-4 bg-white rounded-lg overflow-hidden shadow-2xl">
    {{-- Close Button --}}
    <button
      id="detailClose"
      class="absolute top-4 right-4 bg-white rounded-full p-2 shadow hover:bg-gray-100 transition focus:outline-none"
      aria-label="Close detail"
    >
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
      </svg>
    </button>

    {{-- Image Slider --}}
    <div class="relative">
      <button
        onclick="prevDetail()"
        class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-white bg-opacity-80 rounded-full p-2 hover:bg-opacity-100 transition"
      >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
      </button>
      <img id="detailImage" src="" alt="" class="w-full object-contain max-h-[60vh] mx-auto" />
      <button
        onclick="nextDetail()"
        class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-white bg-opacity-80 rounded-full p-2 hover:bg-opacity-100 transition"
      >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
      </button>
    </div>

    {{-- Detail Content --}}
    <div class="p-6 overflow-y-auto max-h-[30vh]">
      <h2 id="detailTitle" class="text-2xl font-bold text-gray-800 mb-2"></h2>
      <div class="flex items-center gap-4 mb-4">
        <span id="detailDate" class="text-sm text-gray-500"></span>
        <span id="detailCategory" class="text-xs uppercase bg-green-200 text-green-800 px-2 py-1 rounded-full"></span>
      </div>
      <p id="detailExcerpt" class="text-gray-700 leading-relaxed"></p>
    </div>
  </div>
</div>

<script>
  // Gather all slides data from DOM
  const articles = document.querySelectorAll('[data-index]');
  let detailIndex = 0;
  let slideIndex = 0;
  let slideImages = [];

  function openDetail(idx) {
    const art = articles[idx];
    detailIndex = idx;
    slideImages = art.dataset.images.split('|');
    slideIndex = 0;
    updateDetail();
    const modal = document.getElementById('detailModal');
    modal.classList.remove('opacity-0','pointer-events-none');
  }

  function closeDetail() {
    const modal = document.getElementById('detailModal');
    modal.classList.add('opacity-0','pointer-events-none');
  }

  function updateDetail() {
    const art = articles[detailIndex];
    document.getElementById('detailImage').src = slideImages[slideIndex];
    document.getElementById('detailTitle').textContent = art.dataset.title;
    document.getElementById('detailDate').textContent = art.dataset.date;
    document.getElementById('detailCategory').textContent = art.dataset.category;
    document.getElementById('detailExcerpt').textContent = art.dataset.excerpt;
  }

  function nextDetail() {
    slideIndex = (slideIndex+1) % slideImages.length;
    updateDetail();
  }
  function prevDetail() {
    slideIndex = (slideIndex-1+slideImages.length) % slideImages.length;
    updateDetail();
  }

  document.getElementById('detailClose').addEventListener('click', closeDetail);
  document.getElementById('detailModal').addEventListener('click', e => {
    if(e.target.id==='detailModal') closeDetail();
  });
</script>
@endsection