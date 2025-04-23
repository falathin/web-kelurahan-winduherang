@extends('admin.layouts.app')

@section('title','Ubah Penduduk')

@section('content')
<div class="container mx-auto p-6">
  <div class="flex justify-between items-center mb-6" data-aos="fade-up">
    <h1 class="text-2xl font-bold text-green-800">Ubah Penduduk</h1>
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
    <form action="{{ route('penduduk.update', $penduduk) }}" method="POST" class="space-y-4">
      @csrf @method('PUT')

      <div>
        <label class="block text-gray-700 font-medium">NIK</label>
        <input type="text" name="nik" id="nik" maxlength="16" minlength="16" required
               value="{{ old('nik', $penduduk->nik) }}"
               class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
      </div>

      <div>
        <label class="block text-gray-700 font-medium">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" required
               value="{{ old('nama_lengkap', $penduduk->nama_lengkap) }}"
               class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-gray-700 font-medium">Tempat Lahir</label>
          <input type="text" name="tempat_lahir" required
                 value="{{ old('tempat_lahir', $penduduk->tempat_lahir) }}"
                 class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
        </div>
        <div>
          <label class="block text-gray-700 font-medium">Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" required
                 value="{{ old('tanggal_lahir', $penduduk->tanggal_lahir) }}"
                 class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-gray-700 font-medium">Jenis Kelamin</label>
          <select name="jenis_kelamin" required
                  class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
            <option disabled>Pilih Jenis Kelamin</option>
            @foreach(['Laki-laki','Perempuan'] as $jk)
              <option value="{{ $jk }}" {{ old('jenis_kelamin', $penduduk->jenis_kelamin)==$jk?'selected':'' }}>
                {{ $jk }}
              </option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="block text-gray-700 font-medium">Agama</label>
          <select name="agama" required
                  class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
            <option disabled>Pilih Agama</option>
            @foreach(['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu'] as $agama)
              <option value="{{ $agama }}" {{ old('agama', $penduduk->agama)==$agama?'selected':'' }}>
                {{ $agama }}
              </option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-gray-700 font-medium">Status Perkawinan</label>
          <select name="status_perkawinan" required
                  class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
            <option disabled>Pilih Status</option>
            @foreach(['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati'] as $st)
              <option value="{{ $st }}" {{ old('status_perkawinan', $penduduk->status_perkawinan)==$st?'selected':'' }}>
                {{ $st }}
              </option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="block text-gray-700 font-medium">Golongan Darah</label>
          <select name="gol_darah"
                  class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
            <option disabled>Pilih Golongan Darah</option>
            @foreach(['A','B','AB','O'] as $gol)
              <option value="{{ $gol }}" {{ old('gol_darah', $penduduk->gol_darah)==$gol?'selected':'' }}>
                {{ $gol }}
              </option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
          <label class="block text-gray-700 font-medium">Pekerjaan</label>
          <input type="text" name="pekerjaan"
                 value="{{ old('pekerjaan', $penduduk->pekerjaan) }}"
                 class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
        </div>
        <div>
          <label class="block text-gray-700 font-medium">Pendidikan</label>
          <input type="text" name="pendidikan"
                 value="{{ old('pendidikan', $penduduk->pendidikan) }}"
                 class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
        </div>
        <div>
          <label class="block text-gray-700 font-medium">SHDK</label>
          <select name="shdk"
                  class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
            <option disabled>Pilih SHDK</option>
            @foreach(['Kepala Keluarga','Istri','Anak','Orang Tua','Lainnya'] as $sh)
              <option value="{{ $sh }}" {{ old('shdk', $penduduk->shdk)==$sh?'selected':'' }}>
                {{ $sh }}
              </option>
            @endforeach
          </select>
        </div>
      </div>

      <div>
        <label class="block text-gray-700 font-medium">No Kartu Keluarga</label>
        <select name="id_kk" id="id_kk" required
                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
          <option disabled>Pilih Kartu Keluarga</option>
          @foreach($kks as $kk)
            <option value="{{ $kk->id }}"
              {{ old('id_kk', $penduduk->id_kk)==$kk->id?'selected':'' }}>
              {{ $kk->no_kk }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-gray-700 font-medium">NIK Ayah</label>
          <select name="nik_ayah" id="nik_ayah"
                  class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
            <option disabled>Pilih Ayah</option>
          </select>
        </div>
        <div>
          <label class="block text-gray-700 font-medium">NIK Ibu</label>
          <select name="nik_ibu" id="nik_ibu"
                  class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
            <option disabled>Pilih Ibu</option>
          </select>
        </div>
      </div>

      <div>
        <label class="block text-gray-700 font-medium">No Telepon</label>
        <input type="text" name="no_telp"
               value="{{ old('no_telp', $penduduk->no_telp) }}"
               class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
      </div>

      <div class="text-center">
        <button type="submit"
                class="bg-green-600 hover:bg-green-500 text-white px-6 py-2 rounded-lg shadow transition">
          Perbarui Penduduk
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
      selAyah.innerHTML = '<option disabled>Pilih Ayah</option>';
      selIbu.innerHTML = '<option disabled>Pilih Ibu</option>';
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

    if (idKk.value) updateParents(kkResidentsMap[idKk.value] ?? []);
  });
</script>
@endsection