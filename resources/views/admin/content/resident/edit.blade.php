<h1>Edit Penduduk</h1>

<form action="{{ route('penduduk.update', $penduduk->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="nik">NIK</label>
        <input type="text" name="nik" id="nik" class="form-control" required maxlength="16" minlength="16" value="{{ old('nik', $penduduk->nik) }}">
    </div>

    <div class="form-group">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required value="{{ old('nama_lengkap', $penduduk->nama_lengkap) }}">
    </div>

    <div class="form-group">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required value="{{ old('tempat_lahir', $penduduk->tempat_lahir) }}">
    </div>

    <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required value="{{ old('tanggal_lahir', $penduduk->tanggal_lahir) }}">
    </div>

    <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
            <option disabled>Pilih Jenis Kelamin</option>
            <option value="Laki-laki" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>

    <div class="form-group">
        <label for="agama">Agama</label>
        <select name="agama" id="agama" class="form-control" required>
            <option disabled>Pilih Agama</option>
            @foreach (['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'] as $agama)
                <option value="{{ $agama }}" {{ old('agama', $penduduk->agama) == $agama ? 'selected' : '' }}>{{ $agama }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="status_perkawinan">Status Perkawinan</label>
        <select name="status_perkawinan" id="status_perkawinan" class="form-control" required>
            <option disabled>Pilih Status</option>
            @foreach (['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'] as $status)
                <option value="{{ $status }}" {{ old('status_perkawinan', $penduduk->status_perkawinan) == $status ? 'selected' : '' }}>{{ $status }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="pekerjaan">Pekerjaan</label>
        <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" value="{{ old('pekerjaan', $penduduk->pekerjaan) }}">
    </div>

    <div class="form-group">
        <label for="pendidikan">Pendidikan</label>
        <input type="text" name="pendidikan" id="pendidikan" class="form-control" value="{{ old('pendidikan', $penduduk->pendidikan) }}">
    </div>

    <div class="form-group">
        <label for="gol_darah">Golongan Darah</label>
        <select name="gol_darah" id="gol_darah" class="form-control">
            <option disabled>Pilih Golongan Darah</option>
            @foreach (['A', 'B', 'AB', 'O'] as $gol)
                <option value="{{ $gol }}" {{ old('gol_darah', $penduduk->gol_darah) == $gol ? 'selected' : '' }}>{{ $gol }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="shdk">Status Hubungan dalam Keluarga (SHDK)</label>
        <select name="shdk" id="shdk" class="form-control">
            <option disabled>Pilih SHDK</option>
            @foreach (['Kepala Keluarga', 'Istri', 'Anak', 'Orang Tua', 'Lainnya'] as $shdk)
                <option value="{{ $shdk }}" {{ old('shdk', $penduduk->shdk) == $shdk ? 'selected' : '' }}>{{ $shdk }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="id_kk">No Kartu Keluarga</label>
        <select name="id_kk" id="id_kk" class="form-control" required>
            <option disabled>Pilih Kartu Keluarga</option>
            @foreach ($kks as $kk)
                <option value="{{ $kk->id }}" {{ old('id_kk', $penduduk->id_kk) == $kk->id ? 'selected' : '' }}>{{ $kk->no_kk }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="nik_ayah">NIK Ayah</label>
        <select name="nik_ayah" id="nik_ayah" class="form-control">
            <option disabled>Pilih Ayah</option>
        </select>
    </div>

    <div class="form-group">
        <label for="nik_ibu">NIK Ibu</label>
        <select name="nik_ibu" id="nik_ibu" class="form-control">
            <option disabled>Pilih Ibu</option>
        </select>
    </div>

    <div class="form-group">
        <label for="no_telp">No Telepon</label>
        <input type="text" name="no_telp" id="no_telp" class="form-control" value="{{ old('no_telp', $penduduk->no_telp) }}">
    </div>

    <button type="submit" class="btn btn-primary">Update Data Penduduk</button>
    <a href="{{ route('penduduk.index') }}" class="btn btn-secondary">Kembali</a>
</form>

{{-- Feedback area --}}
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<script>
    const kkResidentsMap = @json($kks->mapWithKeys(fn($kk) => [
        $kk->id => $kk->residents->map(fn($res) => [
            'nik' => $res->nik,
            'nama_lengkap' => $res->nama_lengkap,
            'jenis_kelamin' => $res->jenis_kelamin
        ])
    ]));
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const idKkSelect = document.getElementById("id_kk");
        const nikAyahSelect = document.getElementById("nik_ayah");
        const nikIbuSelect = document.getElementById("nik_ibu");

        function updateParentsOptions(residents) {
    nikAyahSelect.innerHTML = '<option disabled>Pilih Ayah</option>';
    nikIbuSelect.innerHTML = '<option disabled>Pilih Ibu</option>';

    const selectedNikAyah = "{{ old('nik_ayah', $penduduk->nik_ayah) }}";
    const selectedNikIbu = "{{ old('nik_ibu', $penduduk->nik_ibu) }}";

    residents.forEach(res => {
        const option = document.createElement("option");
        option.value = res.nik;
        option.textContent = `${res.nama_lengkap} (${res.nik})`;

        if (res.jenis_kelamin === "Laki-laki") {
            if (res.nik === selectedNikAyah) option.selected = true;
            nikAyahSelect.appendChild(option);
        } else if (res.jenis_kelamin === "Perempuan") {
            if (res.nik === selectedNikIbu) option.selected = true;
            nikIbuSelect.appendChild(option);
        }
    });
}


        idKkSelect.addEventListener("change", function () {
            const selectedId = this.value;
            const residents = kkResidentsMap[selectedId] || [];
            updateParentsOptions(residents);
        });

        // Trigger auto-load options for current value
        if (idKkSelect.value) {
            const residents = kkResidentsMap[idKkSelect.value] || [];
            updateParentsOptions(residents);
        }
    });
</script>