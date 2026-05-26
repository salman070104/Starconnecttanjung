<nav class="bg-white/95 backdrop-blur-md shadow-md sticky top-0 z-50 border-b border-teal-100">

    <div class="container mx-auto px-4 sm:px-8 py-2 flex justify-between items-center">

        <!-- LOGO -->
        <a href="/" class="flex items-center">
            <img src="{{ asset('logo.png') }}" alt="Star Connect" class="h-12 sm:h-14 w-auto object-contain">
        </a>

        <!-- DESKTOP MENU -->
        <div class="hidden md:flex items-center gap-8">
            <ul class="flex gap-6 text-black items-center text-[15px] lg:text-[17px] font-medium">
                <li><a href="/" class="hover:text-teal-600 transition duration-300">Home</a></li>
                <li><a href="/paket" class="hover:text-teal-600 transition duration-300">Paket Internet</a></li>
                <li><a href="/login" class="hover:text-teal-600 transition duration-300">Bayar Tagihan</a></li>
                <li><a href="/kontak" class="hover:text-teal-600 transition duration-300">Kontak</a></li>
                <li><a href="/pengaduan" class="hover:text-teal-600 transition duration-300">Pengaduan</a></li>
            </ul>
            <a href="/login"
                class="bg-gradient-to-r from-teal-500 to-cyan-500 hover:scale-105 text-white px-6 py-2 rounded-xl shadow-md transition duration-300">
                Login
            </a>
        </div>

        <!-- MOBILE HAMBURGER -->
        <button id="nav-toggle" class="md:hidden flex flex-col gap-1.5 p-2 rounded-lg hover:bg-gray-100 transition" aria-label="Menu">
            <span class="w-6 h-0.5 bg-gray-700 transition-all duration-300" id="bar1"></span>
            <span class="w-6 h-0.5 bg-gray-700 transition-all duration-300" id="bar2"></span>
            <span class="w-6 h-0.5 bg-gray-700 transition-all duration-300" id="bar3"></span>
        </button>

    </div>

    <!-- MOBILE DROPDOWN MENU -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 px-4 pb-5">
        <ul class="flex flex-col gap-1 mt-3 text-gray-700">
            <li><a href="/" class="block py-3 px-4 rounded-xl hover:bg-teal-50 hover:text-teal-600 font-medium transition">Home</a></li>
            <li><a href="/paket" class="block py-3 px-4 rounded-xl hover:bg-teal-50 hover:text-teal-600 font-medium transition">Paket Internet</a></li>
            <li><a href="/login" class="block py-3 px-4 rounded-xl hover:bg-teal-50 hover:text-teal-600 font-medium transition">Bayar Tagihan</a></li>
            <li><a href="/kontak" class="block py-3 px-4 rounded-xl hover:bg-teal-50 hover:text-teal-600 font-medium transition">Kontak</a></li>
            <li><a href="/pengaduan" class="block py-3 px-4 rounded-xl hover:bg-teal-50 hover:text-teal-600 font-medium transition">Pengaduan</a></li>
        </ul>
        <a href="/login"
            class="mt-4 block text-center bg-gradient-to-r from-teal-500 to-cyan-500 text-white px-6 py-3 rounded-xl shadow-md transition font-semibold">
            Login
        </a>
    </div>

</nav>

<script>
    const toggle = document.getElementById('nav-toggle');
    const menu = document.getElementById('mobile-menu');
    const bar1 = document.getElementById('bar1');
    const bar2 = document.getElementById('bar2');
    const bar3 = document.getElementById('bar3');

    toggle.addEventListener('click', () => {
        menu.classList.toggle('hidden');
        // Animate hamburger to X
        if (!menu.classList.contains('hidden')) {
            bar1.style.transform = 'rotate(45deg) translateY(8px)';
            bar2.style.opacity = '0';
            bar3.style.transform = 'rotate(-45deg) translateY(-8px)';
        } else {
            bar1.style.transform = '';
            bar2.style.opacity = '';
            bar3.style.transform = '';
        }
    });
</script>