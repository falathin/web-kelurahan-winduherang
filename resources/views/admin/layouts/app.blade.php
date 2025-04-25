<!doctype html>
<html lang="en" x-data="{ sidebarOpen: false }" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Desa Winduherang Admin Dashboard</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                fontFamily: {
                    sans: ['Inter', 'sans-serif'],
                },
                extend: {
                    colors: {
                        'desa-hijau': '#14532d',
                        'desa-coklat': '#78350f',
                        'desa-krem': '#fefce8',
                        'desa-emas': '#d97706',
                    },
                },
            },
        };
    </script>
    {{-- Favicon (logo kecil di tab) --}}
    <link rel="icon" href="{{ asset('images/Logo_Kabupaten_kuningan.png') }}" type="image/png">

    <!-- Google Font (Inter) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>

<body class="bg-desa-krem text-gray-800 font-sans">

    <!-- Mobile Sidebar Overlay -->
    <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden"
        @click="sidebarOpen = false">
    </div>

    @php $cnt = \App\Models\Contact::count(); @endphp

    <!-- Sidebar Mobile -->
    <aside x-show="sidebarOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="fixed inset-y-0 left-0 w-64 bg-gradient-to-b from-[#14532d] to-[#22c55e] text-white z-50 transform md:hidden shadow-2xl rounded-r-xl overflow-y-auto">

        <div class="flex items-center justify-between px-6 py-4 border-b border-white/10">
            <h1 class="text-xl font-bold">Desa Winduherang</h1>
            <button @click="sidebarOpen = false" class="text-2xl leading-none hover:text-yellow-400">&times;</button>
        </div>

        <nav class="p-6 space-y-2">
            <a href="{{ route('admin.dashboard') }}"
                class="block py-2 px-4 rounded transition-all duration-200
                {{ request()->routeIs('admin.dashboard') ? 'bg-[#facc15] text-black font-semibold' : 'hover:bg-[#facc15] hover:text-black' }}">
                Dashboard
            </a>
            <a href="{{ route('admin.article.index') }}"
                class="block py-2 px-4 rounded transition-all duration-200
                {{ request()->routeIs('admin.article.*') ? 'bg-[#facc15] text-black font-semibold' : 'hover:bg-[#facc15] hover:text-black' }}">
                Artikel
            </a>
            <a href="{{ route('admin.gallery.index') }}"
                class="block py-2 px-4 rounded transition-all duration-200
                {{ request()->routeIs('admin.gallery.*') ? 'bg-[#facc15] text-black font-semibold' : 'hover:bg-[#facc15] hover:text-black' }}">
                Galeri
            </a>
            @auth
                <a href="{{ route('admin.pengaduan.index') }}"
                    class="relative block py-2 px-4 rounded transition-all duration-200
                {{ request()->routeIs('admin.pengaduan.*') ? 'bg-[#facc15] text-black font-semibold' : 'hover:bg-[#facc15] hover:text-black' }}">
                    Pengaduan
                    @if ($cnt)
                        <span
                            class="absolute top-1 right-3 bg-red-500 text-xs text-white rounded-full px-1">{{ $cnt }}</span>
                    @endif
                </a>
            @endauth
            <a href="{{ route('home') }}"
                class="block py-2 px-4 rounded transition-all duration-200
                {{ request()->routeIs('home') ? 'bg-[#facc15] text-black font-semibold' : 'hover:bg-[#facc15] hover:text-black' }}">
                Guest Page
            </a>

            <form method="POST" action="{{ route('logout') }}" id="logoutFormMobile">
                @csrf
                <button type="submit" onclick="return confirmLogout(event)"
                    class="w-full mt-4 py-2 px-4 text-left bg-red-500 hover:bg-red-600 rounded">
                    Log Out
                </button>
            </form>
        </nav>
    </aside>

    <!-- Sidebar Desktop -->
    <aside
        class="hidden md:fixed md:inset-y-0 md:w-64 md:flex md:flex-col bg-gradient-to-b from-[#14532d] to-[#22c55e] text-white shadow-2xl rounded-r-xl overflow-y-auto">
        <div class="px-6 py-6 border-b border-white/10">
            <h1 class="text-2xl font-bold">Desa Winduherang</h1>
            <p class="text-sm text-gray-300">Admin Dashboard</p>
        </div>

        <nav class="flex-1 p-6 space-y-2">
            <a href="{{ route('admin.dashboard') }}"
                class="block py-2 px-4 rounded transition-all duration-200
                {{ request()->routeIs('admin.dashboard') ? 'bg-[#facc15] text-black font-semibold' : 'hover:bg-[#facc15] hover:text-black' }}">
                Dashboard
            </a>
            <a href="{{ route('admin.article.index') }}"
                class="block py-2 px-4 rounded transition-all duration-200
                {{ request()->routeIs('admin.article.*') ? 'bg-[#facc15] text-black font-semibold' : 'hover:bg-[#facc15] hover:text-black' }}">
                Artikel
            </a>
            <a href="{{ route('admin.gallery.index') }}"
                class="block py-2 px-4 rounded transition-all duration-200
                {{ request()->routeIs('admin.gallery.*') ? 'bg-[#facc15] text-black font-semibold' : 'hover:bg-[#facc15] hover:text-black' }}">
                Galeri
            </a>
            <a href="{{ route('admin.pengaduan.index') }}"
                class="relative block py-2 px-4 rounded transition-all duration-200
                {{ request()->routeIs('admin.pengaduan.*') ? 'bg-[#facc15] text-black font-semibold' : 'hover:bg-[#facc15] hover:text-black' }}">
                Pengaduan
                @if ($cnt)
                    <span
                        class="absolute top-1 right-3 bg-red-500 text-xs text-white rounded-full px-1">{{ $cnt }}</span>
                @endif
            </a>

            <a href="{{ route('penduduk.index') }}"
                class="relative block py-2 px-4 rounded transition-all duration-200
                {{ request()->routeIs('admin.pengaduan.*') ? 'bg-[#facc15] text-black font-semibold' : 'hover:bg-[#facc15] hover:text-black' }}">
                Penduduk
                @if ($cnt)
                    <span
                        class="absolute top-1 right-3 bg-red-500 text-xs text-white rounded-full px-1">{{ $cnt }}</span>
                @endif
            </a>

            <a href="{{ route('kk.index') }}"
                class="relative block py-2 px-4 rounded transition-all duration-200
                {{ request()->routeIs('admin.pengaduan.*') ? 'bg-[#facc15] text-black font-semibold' : 'hover:bg-[#facc15] hover:text-black' }}">
                Kartu Keluarga
                @if ($cnt)
                    <span
                        class="absolute top-1 right-3 bg-red-500 text-xs text-white rounded-full px-1">{{ $cnt }}</span>
                @endif
            </a>

            <a href="{{ route('dusun.index') }}"
                class="relative block py-2 px-4 rounded transition-all duration-200
                {{ request()->routeIs('admin.pengaduan.*') ? 'bg-[#facc15] text-black font-semibold' : 'hover:bg-[#facc15] hover:text-black' }}">
                Dusun
                @if ($cnt)
                    <span
                        class="absolute top-1 right-3 bg-red-500 text-xs text-white rounded-full px-1">{{ $cnt }}</span>
                @endif
            </a>

            <a href="{{ route('rw.index') }}"
                class="relative block py-2 px-4 rounded transition-all duration-200
                {{ request()->routeIs('admin.pengaduan.*') ? 'bg-[#facc15] text-black font-semibold' : 'hover:bg-[#facc15] hover:text-black' }}">
                RW
                @if ($cnt)
                    <span
                        class="absolute top-1 right-3 bg-red-500 text-xs text-white rounded-full px-1">{{ $cnt }}</span>
                @endif
            </a>

            <a href="{{ route('rt.index') }}"
                class="relative block py-2 px-4 rounded transition-all duration-200
                {{ request()->routeIs('admin.pengaduan.*') ? 'bg-[#facc15] text-black font-semibold' : 'hover:bg-[#facc15] hover:text-black' }}">
                RT
                @if ($cnt)
                    <span
                        class="absolute top-1 right-3 bg-red-500 text-xs text-white rounded-full px-1">{{ $cnt }}</span>
                @endif
            </a>
            
            <a href="{{ route('home') }}"
                class="block py-2 px-4 rounded transition-all duration-200
                {{ request()->routeIs('home') ? 'bg-[#facc15] text-black font-semibold' : 'hover:bg-[#facc15] hover:text-black' }}">
                Guest Page
            </a>

            <form method="POST" action="{{ route('logout') }}" id="logoutFormDesktop">
                @csrf
                <button type="submit" onclick="return confirmLogout(event)"
                    class="w-full mt-6 py-2 px-4 text-left bg-red-500 hover:bg-red-600 rounded">
                    Log Out
                </button>
            </form>
        </nav>
    </aside>


    <script>
        function confirmLogout(e) {
            e.preventDefault();
            if (confirm('Apakah kamu yakin ingin logout?')) {
                e.target.closest('form').submit();
            }
        }
    </script>


    <!-- JavaScript Alert Confirmation -->
    <script>
        function confirmLogout(event) {
            event.preventDefault();
            if (confirm('Apakah kamu yakin ingin logout?')) {
                event.target.closest('form').submit();
            }
        }
    </script>

    <!-- Main Content -->
    <div class="md:pl-64 min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow p-4 flex justify-between items-center sticky top-0 z-10">
            <div class="flex items-center gap-3">
                <button @click="sidebarOpen = true" class="md:hidden text-desa-coklat">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <h2 class="text-xl font-bold">Dashboard</h2>
            </div>
            <span class="text-sm hidden md:inline-block">Selamat datang, {{ Auth::user()->name }}</span>
        </header>

        <!-- Main Content -->
        <main class="p-6 overflow-auto flex-grow">
            @yield('content')
        </main>

        <!-- Sticky Footer -->
        <footer class="bg-white shadow p-4 text-center text-sm text-gray-500 mt-auto" data-aos="fade-up">
            &copy; 2025 Desa Winduherang. Semua hak dilindungi.
        </footer>
    </div>

    <!-- Alpine.js & AOS -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 700,
            once: true
        });
    </script>
</body>

</html>
