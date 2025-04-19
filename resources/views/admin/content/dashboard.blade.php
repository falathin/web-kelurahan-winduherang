@extends('admin.layouts.app')

{{-- @yield('title','Dashboard Winduherang Admin Page') --}}

@section('content')

<!-- Dashboard Overview -->
<div class="container mx-auto py-12" data-aos="fade-up">
    <h1 class="text-5xl font-extrabold text-center text-white mb-12 bg-gradient-to-r from-purple-500 to-pink-500 p-4 rounded-xl shadow-lg">
      📊 Dashboard Admin Desa Winduherang
    </h1>
  
    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
      <!-- Card Produk -->
      <a href="#"
         class="block bg-gradient-to-br from-blue-200 to-blue-400 rounded-2xl shadow-xl p-6 hover:scale-105 transform transition duration-300">
        <div class="flex items-center space-x-4">
          <div class="text-4xl">📦</div>
          <div>
            <p class="text-sm text-gray-700">Total Produk</p>
            <p class="text-3xl font-extrabold text-gray-900">24</p>
          </div>
        </div>
        <p class="mt-4 text-gray-800">Lihat detail produk desa.</p>
      </a>
  
      <!-- Card Artikel -->
      <a href="#"
         class="block bg-gradient-to-br from-green-200 to-green-400 rounded-2xl shadow-xl p-6 hover:scale-105 transform transition duration-300">
        <div class="flex items-center space-x-4">
          <div class="text-4xl">📰</div>
          <div>
            <p class="text-sm text-gray-700">Total Artikel</p>
            <p class="text-3xl font-extrabold text-gray-900">47</p>
          </div>
        </div>
        <p class="mt-4 text-gray-800">Lihat berita & informasi desa.</p>
      </a>
  
      <!-- Card Kontak -->
      <a href="#"
         class="block bg-gradient-to-br from-purple-200 to-purple-400 rounded-2xl shadow-xl p-6 hover:scale-105 transform transition duration-300">
        <div class="flex items-center space-x-4">
          <div class="text-4xl">📬</div>
          <div>
            <p class="text-sm text-gray-700">Total Kontak</p>
            <p class="text-3xl font-extrabold text-gray-900">12</p>
          </div>
        </div>
        <p class="mt-4 text-gray-800">Lihat pesan & masukan warga.</p>
      </a>
  
      <!-- Card Jadwal Jumat -->
      <a href="#"
         class="block bg-gradient-to-br from-red-200 to-red-400 rounded-2xl shadow-xl p-6 hover:scale-105 transform transition duration-300">
        <div class="flex items-center space-x-4">
          <div class="text-4xl">🕌</div>
          <div>
            <p class="text-sm text-gray-700">Jadwal Jumat</p>
            <p class="text-3xl font-extrabold text-gray-900">8</p>
          </div>
        </div>
        <p class="mt-4 text-gray-800">Lihat jadwal imam & khatib.</p>
      </a>
  
      <!-- Card Kas Masjid -->
      <a href="#"
         class="block bg-gradient-to-br from-yellow-200 to-yellow-400 rounded-2xl shadow-xl p-6 hover:scale-105 transform transition duration-300">
        <div class="flex items-center space-x-4">
          <div class="text-4xl">💰</div>
          <div>
            <p class="text-sm text-gray-700">Kas Masjid</p>
            <p class="text-3xl font-extrabold text-gray-900">35</p>
          </div>
        </div>
        <p class="mt-4 text-gray-800">Lihat laporan keuangan.</p>
      </a>
    </div>
  </div>
  
  <!-- Be sure to include AOS initialization somewhere on the page: -->
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({ duration: 800, once: true });
  </script>  
@endsection
