{{-- resources/views/peta.blade.php --}}
@extends('layouts.app')

@section('title', 'Peta Petualangan Desa - Sukamulya')

@section('content')
@php
    // Daftar lokasi penting
    $locations = [
        ['name' => 'Kantor Desa Sukamulya',    'coords' => [-6.974394, 107.753007], 'cat' => 'office'],
        ['name' => 'Puskesmas Sukamulya',      'coords' => [-6.978000, 107.755000], 'cat' => 'health'],
        ['name' => 'SDN Sukamulya',            'coords' => [-6.972000, 107.750000], 'cat' => 'edu'],
        ['name' => 'SMPN Sukamulya',           'coords' => [-6.970000, 107.752000], 'cat' => 'edu'],
        ['name' => 'Pasar Desa Sukamulya',     'coords' => [-6.975000, 107.758000], 'cat' => 'market'],
    ];
@endphp

<div class="max-w-7xl mx-auto px-4 py-12">
  <div class="text-center mb-8">
    <h1 class="text-4xl font-extrabold text-green-800 mb-2">Peta Petualangan Desa</h1>
    <p class="text-gray-600">Temukan dan jelajahi lokasi-lokasi penting di Sukamulya</p>
  </div>

  <div class="flex h-[80vh] bg-white rounded-lg shadow overflow-hidden">
    {{-- Sidebar --}}
    <aside id="sidebar" class="hidden md:flex flex-col w-60 bg-green-50 p-6 border-r border-green-100">
      {{-- Search --}}
      <div class="mb-4">
        <input id="locSearch"
               type="text"
               placeholder="Cari lokasi..."
               class="w-full px-3 py-2 rounded-lg border border-green-300 focus:ring-green-200 focus:outline-none" />
      </div>
      {{-- Daftar Lokasi --}}
      <ul id="locList" class="flex-1 overflow-y-auto space-y-2">
        @foreach($locations as $idx => $loc)
          <li>
            <button data-idx="{{ $idx }}"
                    class="location-btn block w-full text-left px-3 py-2 rounded-lg hover:bg-green-100 transition-colors">
              {{ $loc['name'] }}
            </button>
          </li>
        @endforeach
      </ul>
      {{-- Layer Control Info --}}
      <div class="mt-4 text-sm text-gray-600">
        <p><strong>Tip:</strong> Klik ikon di pojok peta untuk sembunyikan/lihat kategori marker.</p>
      </div>
    </aside>

    {{-- Kontrol Sidebar Mobile --}}
    <div class="md:hidden absolute top-4 left-4 z-10">
      <button id="toggleSidebar"
              class="bg-green-600 text-white p-2 rounded-lg shadow-lg focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>

    {{-- Map Container --}}
    <div id="map" class="flex-1"></div>
  </div>
</div>
@endsection

@push('styles')
<link
  rel="stylesheet"
  href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
/>
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<script>
  const locations = @json($locations);

  // Inisialisasi map
  const map = L.map('map', { zoomControl: false }).setView(locations[0].coords, 15);

  // Tile layer
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
  }).addTo(map);

  // Zoom control di kanan bawah
  L.control.zoom({ position: 'bottomright' }).addTo(map);

  // Ikon kategori
  const icons = {
    office: L.icon({ iconUrl: 'https://cdn.jsdelivr.net/gh/pointhi/leaflet-color-markers@master/img/marker-icon-green.png', iconSize:[25,41], iconAnchor:[12,41] }),
    health: L.icon({ iconUrl: 'https://cdn.jsdelivr.net/gh/pointhi/leaflet-color-markers@master/img/marker-icon-red.png',   iconSize:[25,41], iconAnchor:[12,41] }),
    edu:    L.icon({ iconUrl: 'https://cdn.jsdelivr.net/gh/pointhi/leaflet-color-markers@master/img/marker-icon-blue.png',  iconSize:[25,41], iconAnchor:[12,41] }),
    market: L.icon({ iconUrl: 'https://cdn.jsdelivr.net/gh/pointhi/leaflet-color-markers@master/img/marker-icon-orange.png',iconSize:[25,41], iconAnchor:[12,41] }),
  };

  // Layer groups
  const layers = {
    office: L.layerGroup().addTo(map),
    health: L.layerGroup().addTo(map),
    edu:    L.layerGroup().addTo(map),
    market: L.layerGroup().addTo(map),
  };

  // Tambah markers
  locations.forEach(loc => {
    L.marker(loc.coords, { icon: icons[loc.cat] })
      .bindPopup(`<strong>${loc.name}</strong>`)
      .addTo(layers[loc.cat]);
  });

  // Layer control GUI
  L.control.layers(null, {
    'Kantor Desa': layers.office,
    'Puskesmas'   : layers.health,
    'Pendidikan'  : layers.edu,
    'Pasar Desa'  : layers.market
  }, { collapsed: false, position: 'topright' }).addTo(map);

  // Sidebar toggle mobile
  document.getElementById('toggleSidebar').onclick = () => {
    const sb = document.getElementById('sidebar');
    sb.classList.toggle('hidden');
  };

  // Fly to lokasi from sidebar
  document.querySelectorAll('.location-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const idx = btn.dataset.idx;
      const loc = locations[idx];
      map.flyTo(loc.coords, 17, { duration: 1 });
      L.popup().setLatLng(loc.coords).setContent(`<strong>${loc.name}</strong>`).openOn(map);
      document.querySelectorAll('.location-btn').forEach(b => b.classList.remove('bg-green-100'));
      btn.classList.add('bg-green-100');
      // hide sidebar on mobile
      if (window.innerWidth < 768) document.getElementById('sidebar').classList.add('hidden');
    });
  });

  // Filter sidebar list
  document.getElementById('locSearch').addEventListener('input', e => {
    const q = e.target.value.toLowerCase();
    document.querySelectorAll('#locList li').forEach(li => {
      li.style.display = li.textContent.toLowerCase().includes(q) ? 'block' : 'none';
    });
  });
</script>
@endpush