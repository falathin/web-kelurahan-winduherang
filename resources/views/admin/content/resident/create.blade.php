<h1>Tambah Penduduk</h1>

<form action="{{ route('penduduk.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="nik">NIK</label>
        <input type="text" name="nik" id="nik" class="form-control" required maxlength="16" minlength="16">
    </div>

    <div class="form-group">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
            <option disabled selected>Pilih Jenis Kelamin</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>

    <div class="form-group">
        <label for="agama">Agama</label>
        <select name="agama" id="agama" class="form-control" required>
            <option disabled selected>Pilih Agama</option>
            <option value="Islam">Islam</option>
            <option value="Kristen">Kristen</option>
            <option value="Katolik">Katolik</option>
            <option value="Hindu">Hindu</option>
            <option value="Buddha">Buddha</option>
            <option value="Konghucu">Konghucu</option>
        </select>
    </div>

    <div class="form-group">
        <label for="status_perkawinan">Status Perkawinan</label>
        <select name="status_perkawinan" id="status_perkawinan" class="form-control" required>
            <option disabled selected>Pilih Status</option>
            <option value="Belum Kawin">Belum Kawin</option>
            <option value="Kawin">Kawin</option>
            <option value="Cerai Hidup">Cerai Hidup</option>
            <option value="Cerai Mati">Cerai Mati</option>
        </select>
    </div>

    <div class="form-group">
        <label for="pekerjaan">Pekerjaan</label>
        <input type="text" name="pekerjaan" id="pekerjaan" class="form-control">
    </div>

    <div class="form-group">
        <label for="pendidikan">Pendidikan</label>
        <input type="text" name="pendidikan" id="pendidikan" class="form-control">
    </div>

    <div class="form-group">
        <label for="gol_darah">Golongan Darah</label>
        <select name="gol_darah" id="gol_darah" class="form-control">
            <option disabled selected>Pilih Golongan Darah</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="AB">AB</option>
            <option value="O">O</option>
        </select>
    </div>

    <div class="form-group">
        <label for="shdk">Status Hubungan dalam Keluarga (SHDK)</label>
        <select name="shdk" id="shdk" class="form-control">
            <option disabled selected>Pilih SHDK</option>
            <option value="Kepala Keluarga">Kepala Keluarga</option>
            <option value="Istri">Istri</option>
            <option value="Anak">Anak</option>
            <option value="Orang Tua">Orang Tua</option>
            <option value="Lainnya">Lainnya</option>
        </select>
    </div>

    <div class="form-group">
        <label for="id_kk">No Kartu Keluarga</label>
        <select name="id_kk" id="id_kk" class="form-control" required>
            <option disabled selected>Pilih Kartu Keluarga</option>
            @foreach ($kks as $kk)
                <option value="{{ $kk->id ?? '' }}">{{ $kk->no_kk ?? '' }}</option>
            @endforeach
        </select>
    </div>


    <div class="form-group">
        <label for="nik_ayah">NIK Ayah</label>
        <select name="nik_ayah" id="nik_ayah" class="form-control">
            <option disabled selected>Pilih Ayah</option>
        </select>
    </div>

    <div class="form-group">
        <label for="nik_ibu">NIK Ibu</label>
        <select name="nik_ibu" id="nik_ibu" class="form-control">
            <option disabled selected>Pilih Ibu</option>
        </select>
    </div>

    <div class="form-group">
        <label for="no_telp">No Telepon</label>
        <input type="text" name="no_telp" id="no_telp" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Simpan Data Penduduk</button>
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
            nikAyahSelect.innerHTML = '<option disabled selected>Pilih Ayah</option>';
            nikIbuSelect.innerHTML = '<option disabled selected>Pilih Ibu</option>';
    
            residents.forEach(res => {
                const option = document.createElement("option");
                option.value = res.nik;
                option.textContent = `${res.nama_lengkap} (${res.nik})`;
    
                if (res.jenis_kelamin === "Laki-laki") {
                    nikAyahSelect.appendChild(option);
                } else if (res.jenis_kelamin === "Perempuan") {
                    nikIbuSelect.appendChild(option);
                }
            });
        }
    
        idKkSelect.addEventListener("change", function () {
            const selectedId = this.value;
            const residents = kkResidentsMap[selectedId] || [];
            updateParentsOptions(residents);
        });
    });
    </script>
    