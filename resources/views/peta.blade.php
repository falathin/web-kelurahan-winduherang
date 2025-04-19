{{-- resources/views/peta.blade.php --}}
@extends('layouts.app')

@section('title', 'Peta Petualangan - Winduherang')

@section('content')
@php
    $locations = [
        ['name' => 'Kantor Desa Winduherang', 'coords' => [-6.989075, 108.456295], 'cat' => 'office'],
        ['name' => 'Lapangan Bola Winduherang', 'coords' => [-6.986850, 108.457890], 'cat' => 'public'],
        ['name' => 'SD Negeri Winduherang II', 'coords' => [-6.989220, 108.457410], 'cat' => 'edu'],
    ];
@endphp

<div class="max-w-7xl mx-auto px-4 py-10">
    <div class="text-center mb-6">
        <h1 class="text-4xl font-bold text-green-700">Peta Petualangan Winduherang</h1>
        <p class="text-gray-600 mt-2">Eksplorasi titik penting di Desa Winduherang</p>
    </div>

    <div class="flex flex-col md:flex-row gap-6">
        {{-- Sidebar --}}
        <aside id="sidebar" class="w-full md:w-64 bg-green-50 rounded-xl p-4 shadow border border-green-100">
            <input id="locSearch" type="text" placeholder="Cari lokasi..."
                class="w-full px-3 py-2 mb-4 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" />

            <ul id="locList" class="space-y-2 max-h-[60vh] overflow-y-auto text-sm">
                @foreach($locations as $idx => $loc)
                    <li>
                        <button data-idx="{{ $idx }}"
                            class="location-btn w-full text-left px-3 py-2 rounded-lg hover:bg-green-100">
                            {{ $loc['name'] }}
                        </button>
                    </li>
                @endforeach
            </ul>

            <div class="mt-6 text-xs text-gray-500">
                Klik titik di peta atau nama lokasi untuk navigasi.
            </div>
        </aside>

        {{-- Map --}}
        <div class="flex-1 h-[70vh] rounded-xl overflow-hidden shadow border border-gray-200">
            <div id="map" class="w-full h-full"></div>
        </div>
    </div>
</div>

{{-- Leaflet & CSS --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

<script>
    const locations = @json($locations);

    const map = L.map('map', { zoomControl: false }).setView(locations[0].coords, 17);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    L.control.zoom({ position: 'bottomright' }).addTo(map);

    const icons = {
        office: L.icon({ iconUrl: 'https://cdn.jsdelivr.net/gh/pointhi/leaflet-color-markers@master/img/marker-icon-green.png', iconSize:[25,41], iconAnchor:[12,41] }),
        public: L.icon({ iconUrl: 'https://cdn.jsdelivr.net/gh/pointhi/leaflet-color-markers@master/img/marker-icon-yellow.png', iconSize:[25,41], iconAnchor:[12,41] }),
        edu:    L.icon({ iconUrl: 'https://cdn.jsdelivr.net/gh/pointhi/leaflet-color-markers@master/img/marker-icon-blue.png', iconSize:[25,41], iconAnchor:[12,41] }),
    };

    const layers = {
        office: L.layerGroup().addTo(map),
        public: L.layerGroup().addTo(map),
        edu:    L.layerGroup().addTo(map),
    };

    locations.forEach(loc => {
        L.marker(loc.coords, { icon: icons[loc.cat] })
            .bindPopup(`<strong>${loc.name}</strong>`)
            .addTo(layers[loc.cat]);
    });

    L.control.layers(null, {
        'Kantor Desa': layers.office,
        'Fasilitas Umum': layers.public,
        'Pendidikan': layers.edu
    }, { collapsed: false, position: 'topright' }).addTo(map);

    document.querySelectorAll('.location-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const idx = btn.dataset.idx;
            const loc = locations[idx];
            map.flyTo(loc.coords, 18, { duration: 1 });
            L.popup().setLatLng(loc.coords).setContent(`<strong>${loc.name}</strong>`).openOn(map);
            document.querySelectorAll('.location-btn').forEach(b => b.classList.remove('bg-green-100'));
            btn.classList.add('bg-green-100');
        });
    });

    document.getElementById('locSearch').addEventListener('input', e => {
        const q = e.target.value.toLowerCase();
        document.querySelectorAll('#locList li').forEach(li => {
            li.style.display = li.textContent.toLowerCase().includes(q) ? 'block' : 'none';
        });
    });
</script>
@endsection