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
    <input type="text" name="nama_lengkap"
    value="{{ old('nama_lengkap', $penduduk->nama_lengkap) }}" …>

<select name="jenis_kelamin" …>
<option disabled>Pilih Jenis Kelamin</option>
@foreach(['Laki-laki','Perempuan'] as $jk)
 <option value="{{ $jk }}"
   {{ old('jenis_kelamin', $penduduk->jenis_kelamin)==$jk ? 'selected' : '' }}>
   {{ $jk }}
 </option>
@endforeach
</select>

<!-- dst. untuk semua field lainnya … -->

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