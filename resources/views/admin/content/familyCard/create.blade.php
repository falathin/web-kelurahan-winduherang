<h1>Tambah Kartu Keluarga</h1>
<!-- Form tambah kartu keluarga -->
<form action="{{ route('kk.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="no_kk">No Kartu Keluarga</label>
        <input type="text" name="no_kk" id="no_kk" class="form-control" required placeholder="Masukkan No Kartu Keluarga" 
        value="{{ old('no_kk') }}" maxlength="16">
    </div>

    <div class="form-group">
        <label for="id_dusun">Nama Dusun</label>

        {{-- Dusun Dropdown --}}
        <select name="id_dusun" id="id_dusun" class="form-control" required>
            <option disabled selected>Pilih Dusun</option>
            @foreach ($dusuns as $dusun)
                <option value="{{ $dusun->id }}">{{ $dusun->nama_dusun }}</option>
            @endforeach
        </select>

        {{-- RW Dropdown --}}
        <select name="id_rw" id="id_rw" class="form-control" required>
            <option disabled selected>Pilih RW</option>
            @foreach ($dusuns as $dusun)
                @foreach ($dusun->rws as $rw)
                    <option value="{{ $rw->id }}" data-dusun="{{ $dusun->id }}">
                        RW {{ $rw->nomor_rw }}
                    </option>
                @endforeach
            @endforeach
        </select>
    </div>

    {{-- RT Dropdown --}}
    <select name="id_rt" id="id_rt" class="form-control" required>
        <option disabled selected>Pilih RT</option>
        @foreach ($dusuns as $dusun)
            @foreach ($dusun->rws as $rw)
                @foreach ($rw->rts as $rt)
                    <option value="{{ $rt->id }}" data-rw="{{ $rw->id }}">
                        RT {{ $rt->nomor_rt }}
                    </option>
                @endforeach
            @endforeach
        @endforeach
    </select>

    <button type="submit" class="btn btn-primary">Simpan Kartu Keluarga</button>
    <a href="{{ route('kk.index') }}" class="btn btn-secondary">Kembali</a>
</form>
{{-- Menampilkan pesan sukses jika ada --}}
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
{{-- Menampilkan pesan error jika ada --}}
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
    document.addEventListener('DOMContentLoaded', function () {
        const rwSelect = document.getElementById('id_rw');
        const rtSelect = document.getElementById('id_rt');
        const dusunSelect = document.getElementById('id_dusun');

        function filterOptions(selectEl, attr, value) {
            Array.from(selectEl.options).forEach(opt => {
                if (!opt.hasAttribute(attr) || opt.getAttribute(attr) === value) {
                    opt.hidden = false;
                } else {
                    opt.hidden = true;
                }
            });
        }

        dusunSelect.addEventListener('change', function () {
            filterOptions(rwSelect, 'data-dusun', this.value);
            rwSelect.value = "";
            rtSelect.value = "";
            filterOptions(rtSelect, 'data-rw', ""); // hide all
        });

        rwSelect.addEventListener('change', function () {
            filterOptions(rtSelect, 'data-rw', this.value);
            rtSelect.value = "";
        });

        // Trigger initial filtering if needed
        filterOptions(rwSelect, 'data-dusun', dusunSelect.value);
        filterOptions(rtSelect, 'data-rw', rwSelect.value);
    });
</script>
