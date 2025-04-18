{{-- Navbar Non-Sticky --}}
<nav id="mainNav" class="bg-green-700 animate__animated animate__fadeInDown z-50">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
        {{-- Logo dan Nama Desa --}}
        <div class="flex items-center">
            <img src="{{ asset('images/Logo_Kabupaten_kuningan.png') }}" alt="Logo Kabupaten Kuningan"
                class="w-10 h-10 object-cover rounded-full mr-3" />
            <span class="text-white text-xl font-bold">Kelurahan Sukamulya</span>
        </div>

        {{-- Menu Desktop --}}
        <div class="hidden md:flex space-x-6">
            <a href="{{route('home')}}#beranda" class="text-white hover:text-green-100 font-medium">Beranda</a>
            <a href="{{route('profil')}}#profil" class="text-white hover:text-green-100 font-medium">Profil Desa</a>
            <a href="{{route('berita')}}#berita" class="text-white hover:text-green-100 font-medium">Berita</a>
            <a href="{{route('galeri')}}#galeri" class="text-white hover:text-green-100 font-medium">Galeri</a>
            <a href="{{route('peta')}}#maps" class="text-white hover:text-green-100 font-medium">Peta</a>
            <a href="{{route('wartaWargi')}}#wargaWargi" class="text-white hover:text-green-100 font-medium">Warga Wargi</a>
        </div>

        {{-- Hamburger Button --}}
        <button class="md:hidden text-white focus:outline-none" onclick="toggleMenu()">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobileMenu" class="md:hidden hidden bg-green-800 px-4 py-2">
        <a href="{{route('home')}}#beranda" class="block text-white py-2 hover:text-green-100">Beranda</a>
        <a href="{{route('profil')}}#profil" class="block text-white py-2 hover:text-green-100">Profil Desa</a>
        <a href="{{route('berita')}}#berita" class="block text-white py-2 hover:text-green-100">Berita</a>
        <a href="{{route('galeri')}}#galeri" class="block text-white py-2 hover:text-green-100">Galeri</a>
        <a href="{{route('peta')}}#maps" class="block text-white py-2 hover:text-green-100">Peta</a>
        <a href="{{route('wartaWargi')}}#wargaWargi" class="block text-white py-2 hover:text-green-100">Warga Wargi</a>
    </div>
</nav>

{{-- Sticky Navbar Saat Scroll --}}
<nav id="stickyNav" class="sticky-nav bg-green-700 hidden animate__animated animate__fadeInDown z-50 fixed w-full top-0">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
        <div class="flex items-center">
            <img src="{{ asset('images/Logo_Kabupaten_kuningan.png') }}" alt="Logo Kabupaten Kuningan"
                class="w-10 h-10 object-cover rounded-full mr-3" />
            <span class="text-white text-xl font-bold">Kelurahan Sukamulya</span>
        </div>
        <div class="hidden md:flex space-x-6">
            <a href="{{route('home')}}#beranda" class="text-white hover:text-green-100 font-medium">Beranda</a>
            <a href="{{route('profil')}}#profil" class="text-white hover:text-green-100 font-medium">Profil Desa</a>
            <a href="{{route('berita')}}#berita" class="text-white hover:text-green-100 font-medium">Berita</a>
            <a href="{{route('galeri')}}#galeri" class="text-white hover:text-green-100 font-medium">Galeri</a>
            <a href="{{route('peta')}}#maps" class="text-white hover:text-green-100 font-medium">Peta</a>
            <a href="{{route('wartaWargi')}}#wargaWargi" class="text-white hover:text-green-100 font-medium">Warga Wargi</a>
        </div>
    </div>
</nav>

{{-- JS for Mobile Menu & Sticky Navbar --}}
<script>
    function toggleMenu() {
        const mobileMenu = document.getElementById('mobileMenu');
        mobileMenu.classList.toggle('hidden');
    }

    window.addEventListener('scroll', function () {
        const mainNav = document.getElementById('mainNav');
        const stickyNav = document.getElementById('stickyNav');
        if (window.scrollY > 150) {
            mainNav.classList.add('hidden');
            stickyNav.classList.remove('hidden');
        } else {
            mainNav.classList.remove('hidden');
            stickyNav.classList.add('hidden');
        }
    });
</script>