{{-- resources/views/wartawargi.blade.php --}}
@extends('layouts.app')

{{-- @section('title', 'Warta Wargi - Kelurahan Sukamulya') --}}

@php
use Illuminate\Support\Str;
use Carbon\Carbon;

$messages = collect([
  ['name'=>'Ahmad Sutanto',  'date'=>'2025-04-12', 'text'=>'Mohon perbaikan lampu jalan di RT 03, sering mati saat malam hari sehingga warga kesulitan pulang.'],
  ['name'=>'Siti Rahma',     'date'=>'2025-04-10', 'text'=>'Tolongan pengadaan tempat sampah di tiap sudut desa agar sampah tidak berserakan.'],
  ['name'=>'Budi Santoso',   'date'=>'2025-04-08', 'text'=>'Usulan klinik keliling setiap bulan untuk pemeriksaan gratis bagi lansia.'],
  ['name'=>'Dewi Kartika',   'date'=>'2025-04-05', 'text'=>'Permohonan pelatihan komputer dasar untuk pemuda desa di balai desa.'],
  ['name'=>'Rina Wulandari', 'date'=>'2025-04-02', 'text'=>'Saran pembuatan taman baca di sudut desa sebagai ruang belajar anak-anak.'],
])->map(fn($m) => (object) $m);
@endphp

@section('content')

{{-- Hero Section --}}
<section class="relative bg-gradient-to-r from-emerald-700 via-emerald-500 to-emerald-300 bg-[length:400%_400%] animate-[pulse_10s_ease-in-out_infinite] overflow-hidden rounded-2xl shadow-2xl py-20 mb-16">
  <div class="absolute inset-0 bg-black/40"></div>
  <div class="relative max-w-3xl mx-auto text-center px-6 text-white space-y-6">
    <h1 class="text-5xl font-extrabold">🌿 Warta Wargi</h1>
    <p class="text-xl text-emerald-100">
      Media interaktif bagi warga Sukamulya untuk menyampaikan aspirasi, saran, & aduan dengan mudah.
    </p>
    <a href="https://bit.ly/WartaWargi" target="_blank" rel="noopener noreferrer"
       class="inline-flex items-center gap-2 bg-white text-emerald-800 font-semibold px-8 py-3 rounded-full shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition"
       aria-label="Kunjungi Warta Wargi via Bit.ly">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
      </svg>
      Kunjungi Warta Wargi
    </a>
  </div>
</section>

{{-- Messages Section --}}
<section class="max-w-7xl mx-auto px-4 py-16 bg-gray-50 rounded-xl shadow-lg">
  <div class="text-center mb-12">
    <h2 class="text-3xl font-bold text-gray-800">Pesan & Aspirasi Warga</h2>
    <p class="text-gray-600 mt-2">Lihat apa yang disampaikan oleh sesama tetangga Sukamulya</p>
  </div>

  <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
    @foreach($messages as $msg)
      <article class="flex flex-col bg-white rounded-lg shadow-md hover:shadow-xl transition p-6">
        <header class="flex items-center mb-4">
          <div class="h-10 w-10 bg-emerald-100 text-emerald-700 flex items-center justify-center rounded-full font-semibold mr-3">
            {{ strtoupper(substr($msg->name,0,1)) }}
          </div>
          <div>
            <p class="font-semibold text-gray-800">{{ $msg->name }}</p>
            <time class="text-sm text-gray-500">{{ Carbon::parse($msg->date)->format('d M Y') }}</time>
          </div>
        </header>
        <p class="text-gray-700 flex-grow mb-4">{{ Str::limit($msg->text, 100) }}</p>
        <a href="#" class="mt-auto inline-block text-emerald-600 font-semibold hover:underline">
          Baca Selengkapnya &rarr;
        </a>
      </article>
    @endforeach
  </div>
</section>

@endsection