{{-- resources/views/pemerintahan.blade.php --}}
@extends('layouts.app')

@section('title', 'Pemerintahan Desa Winduherang')

@section('content')
<!-- Hero Slider -->
<section
  x-data="{
    slides: [
      { src: 'https://picsum.photos/1200/400?random=1', title: 'LPM & Pemberdayaan' },
      { src: 'https://picsum.photos/1200/400?random=2', title: 'Karang Taruna' },
      { src: 'https://picsum.photos/1200/400?random=3', title: 'PKK & Keluarga' }
    ],
    current: 0,
    init() { setInterval(this.next, 5000) },
    prev() { this.current = (this.current - 1 + this.slides.length) % this.slides.length },
    next() { this.current = (this.current + 1) % this.slides.length },
    go(i) { this.current = i }
  }"
  x-init="init()"
  class="relative h-64 md:h-96 overflow-hidden"
>
  <template x-for="(slide, i) in slides" :key="i">
    <div
      x-show="current === i"
      class="absolute inset-0 bg-cover bg-center transition-opacity duration-700"
      :style="`background-image:url(${slide.src})`"
    ></div>
  </template>
  <div class="absolute inset-0 bg-green-900 bg-opacity-50 flex flex-col justify-center items-center text-white px-4">
    <h1 class="text-2xl md:text-4xl font-extrabold mb-2" x-text="slides[current].title"></h1>
    <div class="flex space-x-4 mt-4">
      <button @click="prev" class="p-2 bg-white bg-opacity-20 rounded-full hover:bg-opacity-40 transition">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
        </svg>
      </button>
      <button @click="next" class="p-2 bg-white bg-opacity-20 rounded-full hover:bg-opacity-40 transition">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
        </svg>
      </button>
    </div>
    <div class="flex space-x-2 mt-6">
      <template x-for="(_, i) in slides" :key="i">
        <button
          class="w-3 h-3 rounded-full"
          :class="i === current ? 'bg-white' : 'bg-white bg-opacity-50'"
          @click="go(i)"
        ></button>
      </template>
    </div>
  </div>
</section>

<div class="max-w-7xl mx-auto px-4 py-16 space-y-24">

  <!-- LPM Section -->
  <section class="space-y-6">
    <h2 class="text-3xl font-bold text-green-800 border-b-4 border-green-300 inline-block">
      LPM (Lembaga Pemberdayaan Masyarakat)
    </h2>
    <p class="text-gray-700 leading-relaxed">
      LPM adalah mitra pemerintah desa dalam memberdayakan warga melalui program sosial, ekonomi, dan budaya.
      Mereka merancang, melaksanakan, dan mengevaluasi kegiatan demi kemajuan bersama.
    </p>
    <div class="flex flex-col md:flex-row gap-6">
      <img src="https://picsum.photos/seed/lpm/400/250" alt="Struktur LPM"
           class="rounded-lg shadow-lg object-cover w-full md:w-1/3">
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 flex-1">
        @foreach([
          ['role'=>'Ketua','name'=>'Ahmad Sukardi'],
          ['role'=>'Wakil Ketua','name'=>'Siti Marlina'],
          ['role'=>'Sekretaris','name'=>'Budi Santoso'],
          ['role'=>'Bendahara','name'=>'Dewi Kartika'],
        ] as $m)
          <div class="bg-white p-4 rounded-lg shadow hover:shadow-xl transition">
            <p class="font-semibold text-gray-800">{{ $m['role'] }}</p>
            <p class="text-green-700">{{ $m['name'] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Karang Taruna Section -->
  <section class="space-y-6">
    <h2 class="text-3xl font-bold text-green-800 border-b-4 border-green-300 inline-block">
      Karang Taruna
    </h2>
    <p class="text-gray-700 leading-relaxed">
      Karang Taruna mempersatukan pemuda desa untuk kegiatan sosial, budaya, dan olahraga melalui pelatihan dan bakti sosial.
    </p>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
      @foreach([
        ['Pembina','H. Kusnadi'],
        ['Ketua','Rina Wulandari'],
        ['Sekretaris','Taufik Hidayat'],
        ['Bendahara','Indah Permata'],
      ] as $m)
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition text-center">
          <p class="font-semibold">{{ $m[0] }}</p>
          <p class="text-green-700">{{ $m[1] }}</p>
        </div>
      @endforeach
    </div>
  </section>

  <!-- Posyandu Section -->
  <section class="space-y-6">
    <h2 class="text-3xl font-bold text-green-800 border-b-4 border-green-300 inline-block">
      Posyandu Anggrek I
    </h2>
    <p class="text-gray-700 leading-relaxed">
      Posyandu Anggrek I RW 014 melayani penimbangan, imunisasi, dan penyuluhan gizi untuk balita dan lansia.
    </p>
    <div class="flex flex-col md:flex-row gap-6">
      <img src="https://picsum.photos/seed/posyandu/400/250" alt="Struktur Posyandu"
           class="rounded-lg shadow-lg object-cover w-full md:w-1/3">
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 flex-1">
        @foreach([
          ['Kader Utama','Sari Melati'],
          ['Kader Pendamping','Dewi Anggraini'],
          ['Sekretaris','Rudi Hartono'],
        ] as $m)
          <div class="bg-white p-4 rounded-lg shadow hover:shadow-xl transition">
            <p class="font-semibold">{{ $m[0] }}</p>
            <p class="text-green-700">{{ $m[1] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- PKK Section -->
  <section class="space-y-6">
    <h2 class="text-3xl font-bold text-green-800 border-b-4 border-green-300 inline-block">
      PKK Desa
    </h2>
    <p class="text-gray-700 leading-relaxed">
      PKK mengelola program pemberdayaan ekonomi keluarga, kesehatan ibu & anak, serta lingkungan sehat.
    </p>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
      @foreach([
        ['Ketua','Yulia Rahma'],
        ['Wakil','Maya Sari'],
        ['Sekretaris','Nur Aisyah'],
        ['Bendahara','Citra Lestari'],
      ] as $m)
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition text-center">
          <p class="font-semibold">{{ $m[0] }}</p>
          <p class="text-green-700">{{ $m[1] }}</p>
        </div>
      @endforeach
    </div>
  </section>

  <!-- RT/RW Section -->
  <section class="space-y-6">
    <h2 class="text-3xl font-bold text-green-800 border-b-4 border-green-300 inline-block">
      RT / RW
    </h2>
    <p class="text-gray-700 leading-relaxed">
      Daftar Ketua RT & RW di Kelurahan Winduherang.
    </p>
    <div class="overflow-x-auto">
      <table class="w-full bg-white rounded-lg shadow">
        <thead class="bg-green-100">
          <tr>
            <th class="px-4 py-2">RT</th>
            <th class="px-4 py-2">Ketua RT</th>
            <th class="px-4 py-2">RW</th>
            <th class="px-4 py-2">Ketua RW</th>
          </tr>
        </thead>
        <tbody>
          @foreach(range(1,4) as $n)
            <tr class="{{ $loop->odd ? 'bg-white' : 'bg-green-50' }}">
              <td class="px-4 py-2">RT {{ sprintf('%02d',$n) }}</td>
              <td class="px-4 py-2">Nama RT {{ $n }}</td>
              <td class="px-4 py-2">RW 01</td>
              <td class="px-4 py-2">Nama RW 01</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </section>

  <!-- Linmas Section -->
  <section class="space-y-6">
    <h2 class="text-3xl font-bold text-green-800 border-b-4 border-green-300 inline-block">
      Linmas
    </h2>
    <p class="text-gray-700 leading-relaxed">
      Linmas (Perlindungan Masyarakat) menjaga keamanan lingkungan dan membantu penanganan bencana.
    </p>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
      @foreach(['Koordinator','Anggota 1','Anggota 2','Anggota 3'] as $p)
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition text-center">
          <p class="font-semibold">{{ $p }}</p>
          <p class="text-green-700">Nama {{ $p }}</p>
        </div>
      @endforeach
    </div>
  </section>

  <!-- Kelompok Tani Section -->
<section class="space-y-6">
    <h2 class="text-3xl font-bold text-green-800 border-b-4 border-green-300 inline-block">
      Kelompok Tani
    </h2>
    <p class="text-gray-700 leading-relaxed">
      Kelompok Tani Mandiri merupakan wadah yang berperan penting dalam pengelolaan pertanian di desa Winduherang.
      Kelompok ini membina para petani, mengembangkan teknik budidaya, serta membantu dalam memasarkan hasil panen.
    </p>
    <p class="text-gray-700 leading-relaxed">
      Saat ini terdapat tiga kelompok tani aktif di desa Winduherang:
    </p>
    <ul class="list-disc list-inside text-gray-700 space-y-2">
      <li><strong>Maju Jaya</strong>, dipimpin oleh <strong>Ketua Maju Jaya</strong>.</li>
      <li><strong>Subur Makmur</strong>, dipimpin oleh <strong>Ketua Subur Makmur</strong>.</li>
      <li><strong>Panen Raya</strong>, dipimpin oleh <strong>Ketua Panen Raya</strong>.</li>
    </ul>
  </section>  

  <!-- Struktur Lembaga Desa -->
<section class="space-y-6">
    <h2 class="text-3xl font-bold text-green-800 border-b-4 border-green-300 inline-block">
      Struktur Lembaga Desa
    </h2>
    <p class="text-gray-700 leading-relaxed">
      Berikut adalah struktur pemerintahan desa Winduherang:
    </p>
    <div class="overflow-x-auto">
      <table class="w-full bg-white rounded-lg shadow">
        <thead class="bg-green-100">
          <tr>
            <th class="px-4 py-2 text-left">No</th>
            <th class="px-4 py-2 text-left">Nama</th>
            <th class="px-4 py-2 text-left">Jabatan</th>
          </tr>
        </thead>
        <tbody>
          @foreach([
            ['Tatang', 'Kepala Desa'],
            ['Endang Mulyana', 'Sekretaris Desa'],
            ['Andi Suryana', 'Kaur Pemerintahan'],
            ['Tedi', 'Kaur Kesejahteraan'],
            ['Yayat Suheryat', 'Kaur Keuangan'],
            ['Ajat Sudrajat', 'Kaur Umum'],
            ['Wawan Setiawan', 'Kasi Pelayanan'],
            ['Winda Heryana', 'Kasi Pemerintahan'],
            ['Yudi', 'Kasi Kesejahteraan'],
            ['Asep Saepulloh', 'Kadus 1'],
            ['Entang', 'Kadus 2'],
          ] as $index => $item)
          <tr class="{{ $index % 2 === 0 ? 'bg-white' : 'bg-green-50' }}">
            <td class="px-4 py-2">{{ $index + 1 }}</td>
            <td class="px-4 py-2">{{ $item[0] }}</td>
            <td class="px-4 py-2">{{ $item[1] }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </section>
  

</div>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection