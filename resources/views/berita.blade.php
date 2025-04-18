{{-- resources/views/berita.blade.php --}}
@extends('layouts.app')

@section('title', 'Berita Desa - Kelurahan Sukamulya')

@section('content')
    @php
        // Dummy categories
        $categories = [
            (object) ['id' => 1, 'name' => 'Umum'],
            (object) ['id' => 2, 'name' => 'Kegiatan'],
            (object) ['id' => 3, 'name' => 'Pengumuman'],
        ];

        // Dummy news items with multiple images
        $newsItems = [
            (object) [
                'id' => 1,
                'title' => 'Panen Raya Padi di Sawah Desa',
                'excerpt' => 'Warga desa bersuka cita merayakan panen padi perdana dengan tumpeng tradisional.',
                'images' => [
                    'https://picsum.photos/seed/1a/800/500',
                    'https://picsum.photos/seed/1b/800/500',
                    'https://picsum.photos/seed/1c/800/500',
                ],
                'created_at' => \Carbon\Carbon::now()->subDays(1),
                'category' => $categories[1],
            ],
            (object) [
                'id' => 2,
                'title' => 'Posyandu Lansia Dibuka Setiap Rabu',
                'excerpt' =>
                    'Layanan posyandu lansia buka setiap Rabu: cek tekanan darah, konseling gizi, dan senam ringan.',
                'images' => ['https://picsum.photos/seed/2a/800/500', 'https://picsum.photos/seed/2b/800/500'],
                'created_at' => \Carbon\Carbon::now()->subDays(3),
                'category' => $categories[2],
            ],
            (object) [
                'id' => 3,
                'title' => 'Festival Kuliner Tradisional',
                'excerpt' => 'Festival kuliner menampilkan sate maranggi, peuyeum, dan gulai ikan lele khas desa.',
                'images' => [
                    'https://picsum.photos/seed/3a/800/500',
                    'https://picsum.photos/seed/3b/800/500',
                    'https://picsum.photos/seed/3c/800/500',
                ],
                'created_at' => \Carbon\Carbon::now()->subDays(5),
                'category' => $categories[0],
            ],
        ];
        // Extract image arrays for JS
        $galleries = collect($newsItems)->pluck('images')->toArray();
    @endphp

    <section class="bg-green-50 py-16">
        <div class="max-w-6xl mx-auto px-4">
            <h1 class="text-5xl font-extrabold text-center text-green-800 mb-12">Berita Desa</h1>

            {{-- Search & Filter --}}
            <div class="flex flex-col md:flex-row items-center justify-between mb-12 gap-4">
                {{-- Input Search --}}
                <div class="relative w-full md:w-1/2">
                    <input type="text" placeholder="Cari berita..."
                        class="w-full py-3 pl-12 pr-4 rounded-lg border border-green-300 focus:outline-none focus:ring-2 focus:ring-green-200 transition" />
                    <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>

                {{-- Filter Kategori --}}
                <div class="relative w-full md:w-1/4">
                    <select
                        class="appearance-none w-full py-3 pl-4 pr-10 rounded-lg border border-green-300 focus:outline-none focus:ring-2 focus:ring-green-200 transition text-gray-700">
                        <option value="">Semua Kategori</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>

                    {{-- Icon dropdown --}}
                    <div class="pointer-events-none absolute inset-y-0 right-4 flex items-center">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>


                {{-- Tombol Filter --}}
                <div class="w-full md:w-auto">
                    <button
                        class="w-full md:w-auto flex items-center justify-center gap-2 bg-green-600 hover:bg-green-500 text-white py-3 px-6 rounded-lg transition">
                        Filter
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L14 13.414V19a1 1 0 01-1.447.894l-4-2A1 1 0 018 17v-3.586L3.293 6.707A1 1 0 013 6V4z" />
                        </svg>
                    </button>
                </div>
            </div>


            {{-- News Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($newsItems as $idx => $item)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition">
                        <div class="relative overflow-hidden">
                            <img src="{{ $item->images[0] }}" alt="{{ $item->title }}"
                                class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-500" />
                            <span
                                class="absolute top-4 left-4 bg-green-600 text-white px-3 py-1 rounded-full text-xs uppercase">{{ $item->category->name }}</span>
                            <span
                                class="absolute top-4 right-4 bg-white bg-opacity-80 text-gray-800 px-3 py-1 rounded-full text-xs">{{ $item->created_at->format('d M Y') }}</span>
                        </div>
                        <div class="p-6 flex flex-col h-48 justify-between">
                            <h2 class="text-lg font-semibold text-gray-800 line-clamp-2">{{ $item->title }}</h2>
                            <p class="text-gray-600 line-clamp-3">{{ $item->excerpt }}</p>
                            <button onclick="openSlider({{ $idx }})"
                                class="mt-4 text-green-700 font-semibold hover:underline">Lihat Galeri &rarr;</button>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination Placeholder --}}
            <nav class="mt-12 flex justify-center space-x-2">
                <button
                    class="px-4 py-1 bg-white border border-green-300 text-green-600 rounded-lg hover:bg-green-50 transition">&laquo;</button>
                <button class="px-4 py-1 bg-green-600 text-white rounded-lg">1</button>
                <button
                    class="px-4 py-1 bg-white border border-green-300 text-green-600 rounded-lg hover:bg-green-50 transition">2</button>
                <button
                    class="px-4 py-1 bg-white border border-green-300 text-green-600 rounded-lg hover:bg-green-50 transition">&raquo;</button>
            </nav>
        </div>
    </section>

    {{-- Slider Modal --}}
    <div id="sliderModal"
        class="fixed inset-0 bg-black bg-opacity-70 backdrop-blur-sm flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300 z-50">
        <div class="relative w-full max-w-xl mx-4">
            <button id="sliderClose"
                class="absolute top-4 right-4 bg-white rounded-full p-2 shadow hover:bg-gray-100 transition focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-700" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="relative overflow-hidden rounded-lg bg-white">
                <img id="sliderImage" src="" class="w-full object-contain max-h-[80vh]" />
                <button onclick="prevSlide()"
                    class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-white bg-opacity-80 rounded-full p-2 hover:bg-opacity-100 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-700" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button onclick="nextSlide()"
                    class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-white bg-opacity-80 rounded-full p-2 hover:bg-opacity-100 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-700" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <script>
        const newsGallery = @json($galleries);
        let currentArticle = 0;
        let currentSlide = 0;
        const modal = document.getElementById('sliderModal');

        function openSlider(idx) {
            currentArticle = idx;
            currentSlide = 0;
            updateSlider();
            modal.classList.remove('opacity-0', 'pointer-events-none');
        }

        function closeSlider() {
            modal.classList.add('opacity-0', 'pointer-events-none');
        }

        function updateSlider() {
            document.getElementById('sliderImage').src = newsGallery[currentArticle][currentSlide];
        }

        function nextSlide() {
            const arr = newsGallery[currentArticle];
            currentSlide = (currentSlide + 1) % arr.length;
            updateSlider();
        }

        function prevSlide() {
            const arr = newsGallery[currentArticle];
            currentSlide = (currentSlide - 1 + arr.length) % arr.length;
            updateSlider();
        }
        document.getElementById('sliderClose').addEventListener('click', closeSlider);
        modal.addEventListener('click', e => {
            if (e.target === modal) closeSlider();
        });
    </script>
@endsection
