@extends('admin.layouts.app')

@section('title','Tambah Kartu Keluarga')

@section('content')
<div class="container mx-auto p-6">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-green-800">Tambah Kartu Keluarga</h1>
    <a href="{{ route('kk.index') }}" class="text-green-600 hover:underline">&larr; Kembali</a>
  </div>

  @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
      {{ session('success') }}
    </div>
  @endif

  @if($errors->any())
    <div class="mb-6 p-4 bg-red-100 text-red-800 rounded-lg">
      <ul class="list-disc list-inside">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="bg-white shadow-lg rounded-lg p-6">
    <form action="{{ route('kk.store') }}" method="POST" class="space-y-4">
      @csrf
      <div>
        <label class="block font-medium text-gray-700">No Kartu Keluarga</label>
        <input type="text" name="no_kk" maxlength="16" placeholder="Masukkan No Kartu Keluarga" required
               value="{{ old('no_kk') }}"
               class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
          <label class="block font-medium text-gray-700">Dusun</label>
          <select name="id_dusun" id="id_dusun" required
                  class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
            <option disabled selected>Pilih Dusun</option>
            @foreach($dusuns as $dusun)
              <option value="{{ $dusun->id }}">{{ $dusun->nama_dusun }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="block font-medium text-gray-700">RW</label>
          <select name="id_rw" id="id_rw" required
                  class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
            <option disabled selected>Pilih RW</option>
            @foreach($dusuns as $dusun)
              @foreach($dusun->rws as $rw)
                <option value="{{ $rw->id }}" data-dusun="{{ $dusun->id }}">RW {{ $rw->nomor_rw }}</option>
              @endforeach
            @endforeach
          </select>
        </div>
        <div>
          <label class="block font-medium text-gray-700">RT</label>
          <select name="id_rt" id="id_rt" required
                  class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-200">
            <option disabled selected>Pilih RT</option>
            @foreach($dusuns as $dusun)
              @foreach($dusun->rws as $rw)
                @foreach($rw->rts as $rt)
                  <option value="{{ $rt->id }}" data-rw="{{ $rw->id }}">RT {{ $rt->nomor_rt }}</option>
                @endforeach
              @endforeach
            @endforeach
          </select>
        </div>
      </div>

      <div class="text-right">
        <button type="submit"
                class="bg-green-600 hover:bg-green-500 text-white px-6 py-2 rounded-lg shadow">
          Simpan Kartu Keluarga
        </button>
      </div>
    </form>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const dusun = document.getElementById('id_dusun');
  const rw = document.getElementById('id_rw');
  const rt = document.getElementById('id_rt');

  function filter(sel, attr, val) {
    Array.from(sel.options).forEach(o => {
      o.hidden = o.hasAttribute(attr) && o.getAttribute(attr) !== val;
    });
  }

  dusun.addEventListener('change', function () {
    filter(rw, 'data-dusun', this.value);
    rw.value = '';
    filter(rt, 'data-rw', '');
    rt.value = '';
  });

  rw.addEventListener('change', function () {
    filter(rt, 'data-rw', this.value);
    rt.value = '';
  });

  filter(rw, 'data-dusun', dusun.value);
  filter(rt, 'data-rw', rw.value);
});
</script>
@endsection