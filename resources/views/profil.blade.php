{{-- resources/views/profile.blade.php --}}
@extends('layouts.app')

@section('title', 'Profil Desa Sukamulya')

@section('content')

<!-- Hero Slider -->
<section
  x-data="{
    slides: [
      'https://picsum.photos/1200/500?random=21',
      'https://picsum.photos/1200/500?random=22',
      'https://picsum.photos/1200/500?random=23'
    ],
    current: 0,
    init() { setInterval(() => this.current = (this.current + 1) % this.slides.length, 5000) },
    prev() { this.current = (this.current - 1 + this.slides.length) % this.slides.length },
    next() { this.current = (this.current + 1) % this.slides.length }
  }"
  x-init="init()"
  class="relative h-64 md:h-96 overflow-hidden"
>
  <template x-for="(src,i) in slides" :key="i">
    <div
      x-show="current===i"
      class="absolute inset-0 bg-cover bg-center transition-opacity duration-700"
      :style="`background-image:url(${src});`"
    ></div>
  </template>
  <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-white px-4">
    <h1 class="text-3xl md:text-5xl font-bold">Profil Desa Sukamulya</h1>
    <p class="mt-2 text-sm md:text-lg">Temukan informasi lengkap tentang desa kita</p>
    <div class="flex space-x-4 mt-4">
      <button @click="prev()" class="p-2 bg-green-700 rounded-full hover:bg-green-600 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
      </button>
      <button @click="next()" class="p-2 bg-green-700 rounded-full hover:bg-green-600 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
        </svg>
      </button>
    </div>
    <div class="flex space-x-2 mt-4">
      <template x-for="(_,i) in slides" :key="i">
        <button class="w-2 h-2 rounded-full" :class="i===current ? 'bg-white' : 'bg-white bg-opacity-50'" @click="current=i"></button>
      </template>
    </div>
  </div>
</section>

<section class="bg-green-50 py-16 space-y-16">
  <div class="max-w-4xl mx-auto px-4 space-y-16">

    <!-- Sejarah -->
    <div class="bg-white rounded-lg shadow-lg p-8">
      <h2 class="text-3xl font-bold text-green-800 text-center mb-6">Sejarah</h2>
      <p class="text-gray-700 leading-relaxed mb-4">
        Posyandu (Pos Pelayanan Terpadu) adalah kegiatan kesehatan dasar yang diselenggarakan dari, oleh, dan
        untuk masyarakat yang dibantu oleh petugas kesehatan. Posyandu Anggrek 1 RW 014 merupakan posyandu
        balita dan lansia yang berada di wilayah RW 014 Desa Kalangsari. Posyandu ini dibentuk atas inisiatif
        warga dan kader kesehatan dengan tujuan meningkatkan pelayanan dasar bagi balita dan lansia.
      </p>
      <p class="text-gray-700 leading-relaxed">
        Seiring waktu, Posyandu Anggrek 1 berkembang menjadi pusat informasi dan pelayanan kesehatan penting
        bagi masyarakat setempat. Kegiatan rutin meliputi penimbangan balita, imunisasi, penyuluhan kesehatan,
        serta pemeriksaan lansia.
      </p>
    </div>

    <!-- Visi & Misi -->
    <div class="bg-white rounded-lg shadow-lg p-8">
      <h2 class="text-3xl font-bold text-green-800 text-center mb-6">Visi &amp; Misi</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div>
          <h3 class="text-xl font-semibold text-green-700 mb-2">Visi</h3>
          <p class="italic text-gray-700">“Menjadi Posyandu unggul dalam pelayanan kesehatan dasar masyarakat.”</p>
        </div>
        <div>
          <h3 class="text-xl font-semibold text-green-700 mb-2">Misi</h3>
          <ul class="list-disc list-inside space-y-2 text-gray-700">
            <li>Meningkatkan kualitas pelayanan balita dan lansia.</li>
            <li>Menyelenggarakan penyuluhan kesehatan secara rutin.</li>
            <li>Mendorong partisipasi aktif masyarakat.</li>
            <li>Berkolaborasi dengan instansi terkait untuk layanan terbaik.</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Struktur Organisasi -->
    <div class="bg-white rounded-lg shadow-lg p-8">
      <h2 class="text-3xl font-bold text-green-800 text-center mb-6">Struktur Organisasi</h2>
      <div class="flex justify-center">
        <div class="overflow-hidden rounded-xl shadow-xl hover:scale-105 transition-transform duration-300 ring-1 ring-green-200">
          <img src="{{ asset('images/strukorg.jpg') }}" alt="Struktur Organisasi" class="object-contain w-full md:w-[700px]" />
        </div>
      </div>
    </div>

    <!-- Program & Kegiatan -->
    <div class="bg-white rounded-lg shadow-lg p-8">
      <h2 class="text-3xl font-bold text-green-800 text-center mb-6">Program &amp; Kegiatan</h2>
      <div class="space-y-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
          <div>
            <h3 class="text-2xl font-semibold text-green-700 mb-2">Kegiatan Rutin</h3>
            <p class="text-gray-700 leading-relaxed">
              Penimbangan balita bulanan, pemberian vitamin &amp; imunisasi, pemeriksaan lansia, dan penyuluhan gizi.
            </p>
          </div>
          <img src="{{ asset('storage/kegiatan1.jpg') }}" alt="Kegiatan Rutin" class="rounded-lg shadow-md w-full h-48 object-cover" />
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
          <img src="{{ asset('storage/kegiatan2.jpg') }}" alt="Pelatihan" class="rounded-lg shadow-md w-full h-48 object-cover" />
          <div>
            <h3 class="text-2xl font-semibold text-green-700 mb-2">Pelatihan Kader</h3>
            <p class="text-gray-700 leading-relaxed">
              Peningkatan kapasitas kader dalam pelayanan kesehatan dan administrasi posyandu.
            </p>
          </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
          <div>
            <h3 class="text-2xl font-semibold text-green-700 mb-2">Taman Herbal Keluarga 🌿</h3>
            <p class="text-gray-700 leading-relaxed">
              Edukasi dan pemanfaatan tanaman obat keluarga sebagai sarana belajar dan kesehatan.
            </p>
          </div>
          <img src="{{ asset('storage/kegiatan3.jpg') }}" alt="TOGA" class="rounded-lg shadow-md w-full h-48 object-cover" />
        </div>
      </div>
    </div>

    <!-- Kondisi Geografis -->
    <div class="bg-white rounded-lg shadow-lg p-8">
      <h2 class="text-3xl font-bold text-green-800 text-center mb-6">Kondisi Geografis</h2>
      <p class="text-gray-700 leading-relaxed mb-4">
        Posyandu Anggrek 1 terletak di RW 014, Desa Kalangsari, Kecamatan Rengasdengklok, Kabupaten Karawang.
      </p>
      <p class="text-gray-700 leading-relaxed">
        Lingkungan padat penduduk, strategis dekat balai RW dan sekolah, memudahkan akses masyarakat.
      </p>
    </div>

    <!-- Demografi -->
    <div class="bg-white rounded-lg shadow-lg p-8">
      <h2 class="text-3xl font-bold text-green-800 text-center mb-8">Demografi</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
        <div>
          <span class="text-4xl block mb-2">👥</span>
          <p class="font-semibold text-gray-800">Total Penduduk</p>
          <p class="text-green-700">3.750 Jiwa</p>
        </div>
        <div>
          <span class="text-4xl block mb-2">👨</span>
          <p class="font-semibold text-gray-800">Laki‑laki</p>
          <p class="text-green-700">1.846</p>
        </div>
        <div>
          <span class="text-4xl block mb-2">👩</span>
          <p class="font-semibold text-gray-800">Perempuan</p>
          <p class="text-green-700">1.904</p>
        </div>
      </div>
    </div>

    <!-- Agama -->
    <div class="bg-white rounded-lg shadow-lg p-8">
      <h2 class="text-3xl font-bold text-green-800 text-center mb-6">Agama</h2>
      <p class="text-center text-gray-700 mb-8">Mayoritas Islam, sebagian kecil Kristen.</p>
      <div class="flex justify-center gap-16">
        <div class="text-center">
          <span class="text-4xl block mb-2">🕌</span>
          <p class="font-semibold text-gray-800">Islam</p>
          <p class="text-green-700">92%</p>
        </div>
        <div class="text-center">
          <span class="text-4xl block mb-2">⛪</span>
          <p class="font-semibold text-gray-800">Kristen</p>
          <p class="text-green-700">8%</p>
        </div>
      </div>
    </div>

    <!-- Pekerjaan -->
    <div class="bg-white rounded-lg shadow-lg p-8">
      <h2 class="text-3xl font-bold text-green-800 text-center mb-8">Pekerjaan</h2>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
        @foreach ([
          ['emoji'=>'🌱','label'=>'Pertanian','count'=>'375'],
          ['emoji'=>'🐄','label'=>'Peternakan','count'=>'120'],
          ['emoji'=>'💼','label'=>'Jasa','count'=>'40'],
          ['emoji'=>'🛒','label'=>'Pedagang','count'=>'285'],
          ['emoji'=>'🏥','label'=>'PNS','count'=>'55'],
          ['emoji'=>'👮','label'=>'TNI/POLRI','count'=>'4'],
          ['emoji'=>'🏢','label'=>'Swasta','count'=>'42'],
          ['emoji'=>'🚀','label'=>'Wiraswasta','count'=>'126'],
        ] as $job)
          <div>
            <span class="text-4xl block mb-2">{{ $job['emoji'] }}</span>
            <p class="font-semibold text-gray-800">{{ $job['label'] }}</p>
            <p class="text-green-700">{{ $job['count'] }} Orang</p>
          </div>
        @endforeach
      </div>
    </div>

  </div>
</section>

<!-- Alpine.js for slider -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

@endsection