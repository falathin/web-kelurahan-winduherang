@extends('layouts.app')

@section('content')
<section class="bg-green-50 py-16">
  <div class="max-w-4xl mx-auto px-4 space-y-16">

    <!-- Sejarah -->
    <div class="bg-white rounded-lg shadow-lg p-8">
      <h2 class="text-3xl font-bold text-green-800 text-center mb-6">Sejarah</h2>
      <p class="text-gray-700 leading-relaxed mb-4">
        Posyandu (Pos Pelayanan Terpadu) adalah kegiatan kesehatan dasar yang diselenggarakan dari, oleh, dan
        untuk masyarakat yang dibantu oleh petugas kesehatan. Posyandu Anggrek 1 RW 014 merupakan posyandu
        balita dan lansia yang berada di wilayah RW 014 Desa Kalangsari. Posyandu ini dibentuk berdasarkan
        inisiatif warga dan kader kesehatan dengan tujuan meningkatkan pelayanan kesehatan dasar, khususnya
        bagi balita dan lansia di lingkungan tersebut.
      </p>
      <p class="text-gray-700 leading-relaxed">
        Seiring waktu, Posyandu Anggrek 1 berkembang menjadi pusat informasi dan pelayanan kesehatan yang
        penting bagi masyarakat setempat. Kegiatan rutin yang dilaksanakan meliputi penimbangan balita,
        pemberian imunisasi, penyuluhan kesehatan, serta pemeriksaan kesehatan lansia.
      </p>
    </div>

    <!-- Visi dan Misi -->
    <div class="bg-white rounded-lg shadow-lg p-8">
      <h2 class="text-3xl font-bold text-green-800 text-center mb-6">Visi dan Misi</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div>
          <h3 class="text-xl font-semibold text-green-700 mb-2">Visi</h3>
          <p class="italic text-gray-700">“Menjadi Posyandu yang unggul dalam pelayanan kesehatan dasar
            masyarakat.”</p>
        </div>
        <div>
          <h3 class="text-xl font-semibold text-green-700 mb-2">Misi</h3>
          <ul class="list-disc list-inside space-y-2 text-gray-700">
            <li>Meningkatkan kualitas pelayanan kesehatan balita dan lansia.</li>
            <li>Melakukan penyuluhan dan edukasi kesehatan secara rutin.</li>
            <li>Mendorong partisipasi aktif masyarakat dalam kegiatan posyandu.</li>
            <li>Bekerja sama dengan instansi terkait dalam peningkatan layanan kesehatan.</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Struktur Organisasi -->
    <div class="bg-white rounded-lg shadow-lg p-8">
      <h2 class="text-3xl font-bold text-green-800 text-center mb-6">Struktur Organisasi</h2>
      <div class="flex justify-center">
        <img src="{{ asset('storage/struktur.png') }}" alt="Struktur Organisasi"
             class="rounded shadow-md w-full md:w-2/3 object-contain" />
      </div>
    </div>

    <!-- Program dan Kegiatan -->
    <div class="bg-white rounded-lg shadow-lg p-8">
      <h2 class="text-3xl font-bold text-green-800 text-center mb-6">Program dan Kegiatan</h2>
      <div class="space-y-12">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
          <div>
            <h3 class="text-2xl font-semibold text-green-700 mb-2">Kegiatan Rutin Posyandu</h3>
            <p class="text-gray-700 mb-4 leading-relaxed">
              Posyandu Anggrek 1 rutin melaksanakan kegiatan penimbangan balita setiap bulan, serta pemberian
              vitamin dan imunisasi. Selain itu, dilakukan pemeriksaan kesehatan dasar untuk lansia dan
              penyuluhan gizi.
            </p>
          </div>
          <img src="{{ asset('storage/kegiatan1.jpg') }}" alt="Kegiatan Rutin"
               class="rounded-lg shadow-md w-full h-48 object-cover" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
          <img src="{{ asset('storage/kegiatan2.jpg') }}" alt="Pelatihan"
               class="rounded-lg shadow-md w-full h-48 object-cover" />
          <div>
            <h3 class="text-2xl font-semibold text-green-700 mb-2">Pelatihan Kesehatan</h3>
            <p class="text-gray-700 mb-4 leading-relaxed">
              Kader posyandu mengikuti pelatihan peningkatan kapasitas dalam pelayanan kesehatan dan administrasi.
              Pelatihan ini bertujuan untuk meningkatkan kompetensi kader dalam memberikan layanan terbaik.
            </p>
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
          <div>
            <h3 class="text-2xl font-semibold text-green-700 mb-2">Pemanfaatan Taman Herbal Keluarga (TOGA)</h3>
            <p class="text-gray-700 mb-4 leading-relaxed">
              Posyandu mengembangkan Taman Obat Keluarga sebagai media edukasi dan pemanfaatan tanaman obat alami.
              TOGA menjadi sarana belajar masyarakat dalam mengenal dan memanfaatkan tanaman herbal.
            </p>
          </div>
          <img src="{{ asset('storage/kegiatan3.jpg') }}" alt="TOGA"
               class="rounded-lg shadow-md w-full h-48 object-cover" />
        </div>

      </div>
    </div>

    <!-- Kondisi Geografis -->
    <div class="bg-white rounded-lg shadow-lg p-8">
      <h2 class="text-3xl font-bold text-green-800 text-center mb-6">Kondisi Geografis</h2>
      <p class="text-gray-700 mb-4 leading-relaxed">
        Posyandu Anggrek 1 terletak di RW 014, Desa Kalangsari, Kecamatan Rengasdengklok, Kabupaten Karawang.
        Wilayah ini merupakan kawasan padat penduduk dengan lingkungan sosial yang aktif dan partisipatif.
      </p>
      <p class="text-gray-700 leading-relaxed">
        Kondisi geografis yang strategis mendukung mobilitas masyarakat untuk mengakses layanan posyandu. Lokasinya
        yang dekat dengan fasilitas umum seperti balai RW dan sekolah membuat Posyandu Anggrek 1 mudah dijangkau.
      </p>
    </div>

  </div>
</section>
@endsection