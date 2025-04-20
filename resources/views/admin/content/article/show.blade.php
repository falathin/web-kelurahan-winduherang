@extends('admin.layouts.app')

@section('title', 'Detail Artikel')

@section('content')
<div class="container mx-auto px-4 py-10" data-aos="fade-up">
  <!-- Tombol Kembali -->
  <div class="mb-6">
    <a href="{{ route('admin.article.index') }}" class="inline-flex items-center text-blue-600 hover:underline">
      &larr; Kembali ke Daftar Artikel
    </a>
  </div>

  <!-- Gambar Utama -->
  @if($article->image)
    <div class="rounded-lg overflow-hidden shadow-md mb-6 cursor-pointer group" onclick="openImageModal('{{ asset('storage/' . $article->image) }}')">
      <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" 
           class="w-full h-72 md:h-96 object-cover transition-transform duration-300 group-hover:scale-105">
    </div>
  @endif

  <!-- Judul dan Metadata -->
  <div class="mb-4">
    <h1 class="text-4xl font-bold leading-snug text-gray-800 mb-2">{{ $article->title }}</h1>
    <div class="text-sm text-gray-500">
      <span class="inline-block bg-blue-100 text-blue-700 px-2 py-1 rounded-full text-xs font-semibold">
        {{ $article->category }}
      </span>
      <span class="ml-3">{{ \Carbon\Carbon::parse($article->date)->format('d M Y') }}</span>
    </div>
  </div>

  <!-- Konten Artikel -->
  <div class="prose prose-lg max-w-full text-gray-800 mt-6">
    {!! $article->content !!}
  </div>

  <!-- Penulis -->
  @if($article->author_name)
    <div class="flex items-center mt-10 p-4 bg-gray-100 rounded-lg shadow-sm max-w-md">
      @if($article->author_photo)
        <div class="w-14 h-14 rounded-full overflow-hidden">
          <img src="{{ asset('storage/' . $article->author_photo) }}" alt="{{ $article->author_name }}" class="w-full h-full object-cover">
        </div>
      @endif
      <div class="ml-4">
        <p class="text-sm text-gray-600">Ditulis oleh</p>
        <p class="font-semibold text-gray-800">{{ $article->author_name }}</p>
      </div>
    </div>
  @endif
</div>

<!-- Modal Gambar -->
<div id="imageModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-80">
  <div class="relative">
    <button onclick="closeImageModal()" class="absolute top-2 right-2 text-white text-4xl font-bold z-10 focus:outline-none">&times;</button>
    <img id="modalImage" src="" alt="Detail Gambar" class="max-h-screen max-w-full rounded shadow-2xl">
  </div>
</div>

<!-- Script Modal -->
<script>
  function openImageModal(src) {
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImage');
    modalImg.src = src;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
  }

  function closeImageModal() {
    const modal = document.getElementById('imageModal');
    modal.classList.remove('flex');
    modal.classList.add('hidden');
    document.body.style.overflow = '';
  }

  document.getElementById('imageModal').addEventListener('click', function(e) {
    if (e.target === this) {
      closeImageModal();
    }
  });
</script>
@endsection