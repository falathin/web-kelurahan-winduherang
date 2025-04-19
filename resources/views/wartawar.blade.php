{{-- resources/views/wartawargi.blade.php --}}
@extends('layouts.app')

@section('title', 'Pengaduan Masyarakat & Kontak - Kelurahan Sukamulya')

@section('content')
    {{-- Hero --}}
    <section
        class="relative bg-gradient-to-br from-green-700 via-emerald-500 to-lime-300 overflow-hidden rounded-3xl shadow-lg py-32 mb-24">
        <div class="absolute inset-0 bg-black/30"></div>
        <div class="relative max-w-3xl mx-auto px-6 text-center text-white space-y-6">
            <h1 class="text-5xl font-extrabold">💬 Pengaduan Masyarakat</h1>
            <p class="text-lg md:text-xl">Sampaikan aspirasi, keluhan, dan saran Anda. Kami siap mendengarkan dan
                menindaklanjuti!</p>
            <a href="#form-pengaduan"
                class="inline-flex items-center gap-2 bg-white text-green-800 font-semibold px-8 py-3 rounded-full shadow hover:bg-gray-100 transition">
                Isi Formulir Pengaduan
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>
    </section>

    {{-- Form Pengaduan --}}
    <section id="form-pengaduan" class="max-w-3xl mx-auto px-4 py-16 bg-white rounded-2xl shadow-lg mb-24">
        <h2 class="text-2xl font-bold text-green-800 mb-6 text-center">Form Pengaduan Masyarakat</h2>
        <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Nama Pelapor</label>
                    <input type="text" name="nama" placeholder="Nama lengkap"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-200" />
                </div>
                <div class="flex space-x-4">
                    <div class="flex-1">
                        <label class="block text-gray-700 font-medium mb-1">RW</label>
                        <input type="text" name="rw" placeholder="RW"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-200" />
                    </div>
                    <div class="flex-1">
                        <label class="block text-gray-700 font-medium mb-1">RT</label>
                        <input type="text" name="rt" placeholder="RT"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-200" />
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Tanggal & Waktu</label>
                    <input type="datetime-local" name="waktu"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-200" />
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Lokasi Masalah</label>
                    <input type="text" name="lokasi" placeholder="Contoh: Jalan Desa RT 03"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-200" />
                </div>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Deskripsi Masalah</label>
                <textarea name="deskripsi" rows="4" placeholder="Jelaskan secara singkat masalah atau keluhan Anda..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-200"></textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Dokumentasi (gambar)</label>
                <input type="file" name="bukti[]" accept="image/*" multiple class="w-full text-gray-600" />
                <p class="text-sm text-gray-500 mt-1">Unggah hingga 5 foto untuk memperkuat bukti.</p>
            </div>

            <div class="text-center">
                <button type="submit"
                    class="bg-green-600 hover:bg-green-500 text-white font-semibold px-8 py-3 rounded-lg shadow-md transition">
                    Kirim Pengaduan
                </button>
            </div>
        </form>
    </section>

    <!-- Pengaduan Populer Lengkap -->
    <section class="max-w-6xl mx-auto px-4 py-16 bg-white rounded-2xl shadow-md mb-24">
        <h2 class="text-3xl font-bold text-green-800 mb-8 text-center">📋 Pengaduan Populer</h2>

        <!-- Item Pengaduan -->
        <div class="space-y-10">

            <!-- Pengaduan 1 -->
            <div class="p-6 border-l-4 border-green-600 bg-green-50 rounded-lg shadow-sm">
                <h3 class="text-xl font-semibold mb-2">Lampu Jalan Rusak</h3>
                <p class="text-gray-600 mb-4">Dikeluhkan sejak 2 minggu terakhir, terutama di RT 03 dan RT 05.</p>

                <!-- Info Pelapor -->
                <div class="text-sm text-gray-700 space-y-1 mb-4">
                    <p><span class="font-medium">Pelapor:</span> Siti Rohmah</p>
                    <p><span class="font-medium">Alamat:</span> RT 03 / RW 01</p>
                    <p><span class="font-medium">Tanggal:</span> Selasa, 15 April 2025</p>
                    <p><span class="font-medium">Waktu:</span> 19:45 WIB</p>
                    <p><span class="font-medium">Lokasi:</span> Jalan Kenanga, depan warung Bu Eni</p>
                </div>

                <!-- Gambar Dokumentasi -->
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <img src="https://via.placeholder.com/300x200?text=Lampu+1" alt="Bukti 1" class="rounded shadow">
                    <img src="https://via.placeholder.com/300x200?text=Lampu+2" alt="Bukti 2" class="rounded shadow">
                    <img src="https://via.placeholder.com/300x200?text=Lampu+3" alt="Bukti 3" class="rounded shadow">
                </div>
            </div>

            <!-- Pengaduan 2 -->
            <div class="p-6 border-l-4 border-green-600 bg-green-50 rounded-lg shadow-sm">
                <h3 class="text-xl font-semibold mb-2">Jalan Berlumpur Saat Hujan</h3>
                <p class="text-gray-600 mb-4">Beberapa titik jalan desa tergenang air dan berlumpur.</p>

                <!-- Info Pelapor -->
                <div class="text-sm text-gray-700 space-y-1 mb-4">
                    <p><span class="font-medium">Pelapor:</span> Bambang Setiawan</p>
                    <p><span class="font-medium">Alamat:</span> RT 05 / RW 02</p>
                    <p><span class="font-medium">Tanggal:</span> Minggu, 13 April 2025</p>
                    <p><span class="font-medium">Waktu:</span> 10:30 WIB</p>
                    <p><span class="font-medium">Lokasi:</span> Jalan Raya Sukamaju dekat jembatan</p>
                </div>

                <!-- Gambar Dokumentasi -->
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <img src="https://via.placeholder.com/300x200?text=Jalan+1" alt="Bukti 1" class="rounded shadow">
                    <img src="https://via.placeholder.com/300x200?text=Jalan+2" alt="Bukti 2" class="rounded shadow">
                </div>
            </div>

            <!-- Pengaduan 3 -->
            <div class="p-6 border-l-4 border-green-600 bg-green-50 rounded-lg shadow-sm">
                <h3 class="text-xl font-semibold mb-2">Sampah Tidak Terangkut</h3>
                <p class="text-gray-600 mb-4">Terjadi penumpukan sampah di sekitar TPS RW 02.</p>

                <!-- Info Pelapor -->
                <div class="text-sm text-gray-700 space-y-1 mb-4">
                    <p><span class="font-medium">Pelapor:</span> Nurhadi</p>
                    <p><span class="font-medium">Alamat:</span> RT 02 / RW 02</p>
                    <p><span class="font-medium">Tanggal:</span> Jumat, 11 April 2025</p>
                    <p><span class="font-medium">Waktu:</span> 08:15 WIB</p>
                    <p><span class="font-medium">Lokasi:</span> TPS belakang balai desa</p>
                </div>

                <!-- Gambar Dokumentasi -->
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <img src="https://via.placeholder.com/300x200?text=Sampah+1" alt="Bukti 1" class="rounded shadow">
                    <img src="https://via.placeholder.com/300x200?text=Sampah+2" alt="Bukti 2" class="rounded shadow">
                    <img src="https://via.placeholder.com/300x200?text=Sampah+3" alt="Bukti 3" class="rounded shadow">
                    <img src="https://via.placeholder.com/300x200?text=Sampah+4" alt="Bukti 4" class="rounded shadow">
                </div>
            </div>

        </div>
    </section>


    {{-- Kontak Kami --}}
    <section class="max-w-3xl mx-auto px-4 py-16 bg-gradient-to-br from-gray-100 to-emerald-50 rounded-2xl shadow-inner">
        <h2 class="text-2xl font-bold text-center text-green-800 mb-8">Kontak Kami</h2>
        <div class="space-y-6 text-center">
            <div class="inline-flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600" fill="none"
                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5h4l2 7l-2 7H3m18-14h-4l-2 7l2 7h4" />
                </svg>
                <a href="tel:+628123456789" class="text-gray-700 font-medium hover:text-green-800">+62 812‑3456‑789</a>
            </div>
            <div class="inline-flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600" fill="none"
                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 8l7-3l7 3m0 0v8l-7 3m7-11l-7 3M3 8v8l7 3" />
                </svg>
                <a href="mailto:info@sukamulya.com"
                    class="text-gray-700 font-medium hover:text-green-800">info@sukamulya.com</a>
            </div>
            <div class="inline-flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600" fill="none"
                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 2l2 7h7l-5.5 4l2 7L12 16l-5.5 4l2-7L2 9h7z" />
                </svg>
                <a href="https://wa.me/628123456789" target="_blank"
                    class="text-gray-700 font-medium hover:text-green-800">Chat WhatsApp</a>
            </div>
            <div class="inline-flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600" fill="none"
                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18" />
                </svg>
                <span class="text-gray-700">Jl. Merdeka No.11, Sukamulya, Kuningan</span>
            </div>
        </div>
    </section>
@endsection