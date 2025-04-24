@extends('admin.layouts.app')

@section('title','Tambah Penduduk')

@section('content')
<div class="container mx-auto p-6">
  <div class="flex justify-between items-center mb-6" data-aos="fade-up">
    <h1 class="text-2xl font-bold text-green-800">Tambah Penduduk</h1>
    <a href="{{ route('penduduk.index') }}" class="text-green-600 hover:underline">&larr; Kembali</a>
  </div>

  @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg" data-aos="fade-up" data-aos-delay="100">
      {{ session('success') }}
    </div>
  @endif

  @if($errors->any())
    <div class="mb-6 p-4 bg-red-100 text-red-800 rounded-lg" data-aos="fade-up" data-aos-delay="100">
      <ul class="list-disc list-inside space-y-1">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="bg-white shadow-lg rounded-lg p-6" data-aos="fade-up" data-aos-delay="200">
    <form action="{{ route('penduduk.store') }}" method="POST" class="space-y-4">
      @csrf

      <div>
        <label class="block text-gray-700 font-medium">NIK</label>
        <input type="text" name="nik" id="nik" maxlength="16" minlength="16" required
               class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
      </div>

      <div>
        <label class="block text-gray-700 font-medium">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" id="nama_lengkap" required
               class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-gray-700 font-medium">Tempat Lahir</label>
          <input type="text" name="tempat_lahir" id="tempat_lahir" required
                 class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
        </div>
        <div>
          <label class="block text-gray-700 font-medium">Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" id="tanggal_lahir" required
                 class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-gray-700 font-medium">Jenis Kelamin</label>
          <select name="jenis_kelamin" id="jenis_kelamin" required
                  class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
            <option disabled selected>Pilih Jenis Kelamin</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
        <div>
          <label class="block text-gray-700 font-medium">Agama</label>
          <select name="agama" id="agama" required
                  class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
            <option disabled selected>Pilih Agama</option>
            @foreach(['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu'] as $agama)
              <option value="{{ $agama }}">{{ $agama }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-gray-700 font-medium">Status Perkawinan</label>
          <select name="status_perkawinan" id="status_perkawinan" required
                  class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
            <option disabled selected>Pilih Status</option>
            @foreach(['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati'] as $status)
              <option value="{{ $status }}">{{ $status }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="block text-gray-700 font-medium">Golongan Darah</label>
          <select name="gol_darah" id="gol_darah"
                  class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
            <option disabled selected>Pilih Golongan Darah</option>
            @foreach(['A','B','AB','O'] as $gol)
              <option value="{{ $gol }}">{{ $gol }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
          <label class="block text-gray-700 font-medium">Pekerjaan</label>
          <input type="text" name="pekerjaan" id="pekerjaan"
                 class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
        </div>
        <div>
          <label class="block text-gray-700 font-medium">Pendidikan</label>
          <input type="text" name="pendidikan" id="pendidikan"
                 class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
        </div>
        <div>
          <label class="block text-gray-700 font-medium">SHDK</label>
          <select name="shdk" id="shdk"
                  class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
            <option disabled selected>Pilih SHDK</option>
            @foreach(['Kepala Keluarga','Istri','Anak','Orang Tua','Lainnya'] as $shdk)
              <option value="{{ $shdk }}">{{ $shdk }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div>
        <label class="block text-gray-700 font-medium">No Kartu Keluarga</label>
        <select name="id_kk" id="id_kk" required
                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
          <option disabled selected>Pilih Kartu Keluarga</option>
          @foreach($kks as $kk)
            <option value="{{ $kk->id }}">{{ $kk->no_kk }}</option>
          @endforeach
        </select>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        {{-- <div>
          <label class="block text-gray-700 font-medium">NIK Ayah</label>
          <select name="nik_ayah" id="nik_ayah"
                  class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
            <option disabled selected>Pilih Ayah</option>
          </select>
        </div>
        <div>
          <label class="block text-gray-700 font-medium">NIK Ibu</label>
          <select name="nik_ibu" id="nik_ibu"
                  class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
            <option disabled selected>Pilih Ibu</option>
          </select>
        </div> --}}
      </div>

      <div>
        <label class="block text-gray-700 font-medium">No Telepon</label>
        <input type="text" name="no_telp" id="no_telp"
               class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
      </div>

      <div class="text-center">
        <button type="submit"
                class="bg-green-600 hover:bg-green-500 text-white px-6 py-2 rounded-lg shadow transition">
          Simpan Penduduk
        </button>
      </div>
    </form>
  </div>
</div>

<script>
  const kkResidentsMap = @json($kks->mapWithKeys(fn($kk) => [
    $kk->id => $kk->residents->map(fn($res) => [
      'nik' => $res->nik,
      'nama_lengkap' => $res->nama_lengkap,
      'jenis_kelamin' => $res->jenis_kelamin
    ])
  ]));

  document.addEventListener("DOMContentLoaded", () => {
    const idKk = document.getElementById("id_kk");
    const selAyah = document.getElementById("nik_ayah");
    const selIbu = document.getElementById("nik_ibu");

    function updateParents(residents) {
      selAyah.innerHTML = '<option disabled selected>Pilih Ayah</option>';
      selIbu.innerHTML = '<option disabled selected>Pilih Ibu</option>';
      residents.forEach(r => {
        const opt = document.createElement("option");
        opt.value = r.nik;
        opt.textContent = `${r.nama_lengkap} (${r.nik})`;
        if (r.jenis_kelamin === "Laki-laki") selAyah.append(opt);
        else if (r.jenis_kelamin === "Perempuan") selIbu.append(opt);
      });
    }

    idKk.addEventListener("change", () => {
      updateParents(kkResidentsMap[idKk.value] ?? []);
    });
  });
</script>
@endsection