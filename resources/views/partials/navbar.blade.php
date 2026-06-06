@php
    $currentPath = request()->path();
@endphp

<nav id="mainNav" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 bg-transparent">

    <div class="container mx-auto px-4 sm:px-8 py-3 flex justify-between items-center">

        <!-- LOGO -->
        <a href="/" class="flex items-center group">
            <img src="{{ asset('logo.png') }}" alt="Star Connect" class="h-11 sm:h-13 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
        </a>

        <!-- DESKTOP MENU -->
        <div class="hidden md:flex items-center gap-2">
            <ul class="flex items-center gap-1 bg-white/10 backdrop-blur-md rounded-2xl px-2 py-1.5 border border-white/20" id="navPills">
                <li>
                    <a href="/" class="nav-link relative px-5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-300 {{ $currentPath === '/' ? 'bg-white text-teal-700 shadow-lg shadow-teal-500/20' : 'text-white/90 hover:text-white hover:bg-white/15' }}">
                        <span data-i18n="nav.home">Home</span>
                    </a>
                </li>
                <li>
                    <a href="/paket" class="nav-link relative px-5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-300 {{ $currentPath === 'paket' ? 'bg-white text-teal-700 shadow-lg shadow-teal-500/20' : 'text-white/90 hover:text-white hover:bg-white/15' }}">
                        <span data-i18n="nav.paket">Paket Internet</span>
                    </a>
                </li>
                <li>
                    <a href="/login" class="nav-link relative px-5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-300 {{ $currentPath === 'login' ? 'bg-white text-teal-700 shadow-lg shadow-teal-500/20' : 'text-white/90 hover:text-white hover:bg-white/15' }}">
                        <span data-i18n="nav.bayar">Bayar Tagihan</span>
                    </a>
                </li>
                <li>
                    <a href="/kontak" class="nav-link relative px-5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-300 {{ $currentPath === 'kontak' ? 'bg-white text-teal-700 shadow-lg shadow-teal-500/20' : 'text-white/90 hover:text-white hover:bg-white/15' }}">
                        <span data-i18n="nav.kontak">Kontak</span>
                    </a>
                </li>
                <li>
                    <a href="/pengaduan" class="nav-link relative px-5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-300 {{ $currentPath === 'pengaduan' ? 'bg-white text-teal-700 shadow-lg shadow-teal-500/20' : 'text-white/90 hover:text-white hover:bg-white/15' }}">
                        <span data-i18n="nav.pengaduan">Pengaduan</span>
                    </a>
                </li>
            </ul>

            <!-- Language Toggle -->
            <button id="lang-toggle" onclick="toggleLanguage()" class="ml-2 flex items-center gap-1.5 px-3 py-2 rounded-xl text-sm font-bold bg-white/10 backdrop-blur-md border border-white/20 text-white hover:bg-white/20 transition-all duration-300 cursor-pointer" title="Switch Language">
                <span id="lang-flag">🇮🇩</span>
                <span id="lang-label" class="text-xs font-bold">ID</span>
            </button>

            <a href="/login"
                class="ml-2 relative overflow-hidden bg-white text-teal-700 px-6 py-2.5 rounded-xl font-bold text-sm shadow-lg shadow-white/20 hover:shadow-xl hover:shadow-white/30 hover:scale-105 transition-all duration-300 group">
                <span class="relative z-10">Login</span>
                <div class="absolute inset-0 bg-gradient-to-r from-teal-50 to-cyan-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </a>

            <!-- Install App Button Desktop -->
            <button id="installAppBtn" class="ml-2 flex items-center gap-1.5 px-4 py-2.5 rounded-xl text-sm font-bold bg-gradient-to-r from-teal-500 to-cyan-500 text-white shadow-lg shadow-teal-500/25 hover:shadow-teal-500/40 hover:scale-105 transition-all duration-300 cursor-pointer" title="Install App">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                <span data-i18n="nav.install">Install App</span>
            </button>
        </div>

        <!-- MOBILE: Lang + Hamburger -->
        <div class="flex md:hidden items-center gap-2">
            <!-- Language Toggle Mobile -->
            <button onclick="toggleLanguage()" class="flex items-center gap-1 px-2.5 py-2 rounded-xl text-sm font-bold bg-white/10 backdrop-blur-md border border-white/20 text-white hover:bg-white/20 transition-all duration-300 cursor-pointer" title="Switch Language">
                <span id="lang-flag-mobile">🇮🇩</span>
                <span id="lang-label-mobile" class="text-xs font-bold">ID</span>
            </button>

            <!-- MOBILE HAMBURGER -->
            <button id="nav-toggle" class="flex flex-col gap-1.5 p-2.5 rounded-xl bg-white/10 backdrop-blur-md border border-white/20 hover:bg-white/20 transition-all duration-300" aria-label="Menu">
                <span class="w-5 h-0.5 bg-white rounded-full transition-all duration-300 origin-center" id="bar1"></span>
                <span class="w-5 h-0.5 bg-white rounded-full transition-all duration-300" id="bar2"></span>
                <span class="w-3 h-0.5 bg-white rounded-full transition-all duration-300 origin-center ml-auto" id="bar3"></span>
            </button>
        </div>

    </div>

    <!-- MOBILE DROPDOWN MENU -->
    <div id="mobile-menu" class="hidden md:hidden mx-4 mb-4 bg-white/95 backdrop-blur-xl rounded-2xl shadow-2xl shadow-black/10 border border-white/50 overflow-hidden">
        <ul class="flex flex-col p-3 text-gray-700">
            <li><a href="/" class="flex items-center gap-3 py-3.5 px-4 rounded-xl {{ $currentPath === '/' ? 'bg-teal-50 text-teal-700 font-bold' : 'hover:bg-gray-50' }} font-medium transition-all duration-200">
                <svg class="w-5 h-5 {{ $currentPath === '/' ? 'text-teal-500' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span data-i18n="nav.home">Home</span>
            </a></li>
            <li><a href="/paket" class="flex items-center gap-3 py-3.5 px-4 rounded-xl {{ $currentPath === 'paket' ? 'bg-teal-50 text-teal-700 font-bold' : 'hover:bg-gray-50' }} font-medium transition-all duration-200">
                <svg class="w-5 h-5 {{ $currentPath === 'paket' ? 'text-teal-500' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                <span data-i18n="nav.paket">Paket Internet</span>
            </a></li>
            <li><a href="/login" class="flex items-center gap-3 py-3.5 px-4 rounded-xl hover:bg-gray-50 font-medium transition-all duration-200">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                <span data-i18n="nav.bayar">Bayar Tagihan</span>
            </a></li>
            <li><a href="/kontak" class="flex items-center gap-3 py-3.5 px-4 rounded-xl {{ $currentPath === 'kontak' ? 'bg-teal-50 text-teal-700 font-bold' : 'hover:bg-gray-50' }} font-medium transition-all duration-200">
                <svg class="w-5 h-5 {{ $currentPath === 'kontak' ? 'text-teal-500' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                <span data-i18n="nav.kontak">Kontak</span>
            </a></li>
            <li><a href="/pengaduan" class="flex items-center gap-3 py-3.5 px-4 rounded-xl {{ $currentPath === 'pengaduan' ? 'bg-teal-50 text-teal-700 font-bold' : 'hover:bg-gray-50' }} font-medium transition-all duration-200">
                <svg class="w-5 h-5 {{ $currentPath === 'pengaduan' ? 'text-teal-500' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                <span data-i18n="nav.pengaduan">Pengaduan</span>
            </a></li>
            <li id="installAppBtnMobile">
                <button class="w-full flex items-center gap-3 py-3.5 px-4 rounded-xl hover:bg-gray-50 font-medium transition-all duration-200 text-left">
                    <svg class="w-5 h-5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    <span data-i18n="nav.install">Install App</span>
                </button>
            </li>
        </ul>
        <div class="px-3 pb-3">
            <a href="/login"
                class="block text-center bg-gradient-to-r from-teal-500 to-cyan-500 text-white px-6 py-3.5 rounded-xl shadow-lg shadow-teal-500/25 transition-all font-bold text-sm">
                Login
            </a>
        </div>
    </div>

</nav>

<script>
    // Mobile menu toggle
    const toggle = document.getElementById('nav-toggle');
    const menu = document.getElementById('mobile-menu');
    const bar1 = document.getElementById('bar1');
    const bar2 = document.getElementById('bar2');
    const bar3 = document.getElementById('bar3');
    let menuOpen = false;

    toggle.addEventListener('click', () => {
        menuOpen = !menuOpen;
        menu.classList.toggle('hidden');
        if (menuOpen) {
            bar1.style.transform = 'rotate(45deg) translateY(6px) translateX(4px)';
            bar2.style.opacity = '0';
            bar3.style.transform = 'rotate(-45deg) translateY(-6px) translateX(2px)';
            bar3.style.width = '1.25rem';
        } else {
            bar1.style.transform = '';
            bar2.style.opacity = '';
            bar3.style.transform = '';
            bar3.style.width = '';
        }
    });

    // Navbar scroll effect
    const nav = document.getElementById('mainNav');
    const navPills = document.getElementById('navPills');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            nav.classList.add('bg-white/90', 'backdrop-blur-xl', 'shadow-lg', 'shadow-black/5');
            nav.classList.remove('bg-transparent');
            if (navPills) {
                navPills.classList.remove('bg-white/10', 'border-white/20');
                navPills.classList.add('bg-gray-100/80', 'border-gray-200/50');
            }
            document.querySelectorAll('.nav-link').forEach(link => {
                if (!link.classList.contains('bg-white')) {
                    link.classList.remove('text-white/90', 'hover:text-white', 'hover:bg-white/15');
                    link.classList.add('text-gray-600', 'hover:text-teal-700', 'hover:bg-gray-100');
                }
            });
            document.querySelectorAll('#bar1, #bar2, #bar3').forEach(b => {
                b.classList.remove('bg-white');
                b.classList.add('bg-gray-700');
            });
            toggle.classList.remove('bg-white/10', 'border-white/20', 'hover:bg-white/20');
            toggle.classList.add('bg-gray-100', 'border-gray-200', 'hover:bg-gray-200');
            // Update lang toggle on scroll
            const langToggle = document.getElementById('lang-toggle');
            if (langToggle) {
                langToggle.classList.remove('bg-white/10', 'border-white/20', 'text-white', 'hover:bg-white/20');
                langToggle.classList.add('bg-gray-100', 'border-gray-200', 'text-gray-700', 'hover:bg-gray-200');
            }
            const loginBtn = nav.querySelector('a[href="/login"].bg-white');
            if (loginBtn) {
                loginBtn.classList.remove('shadow-white/20', 'hover:shadow-white/30');
                loginBtn.classList.add('shadow-teal-500/20', 'hover:shadow-teal-500/30');
            }
        } else {
            nav.classList.remove('bg-white/90', 'backdrop-blur-xl', 'shadow-lg', 'shadow-black/5');
            nav.classList.add('bg-transparent');
            if (navPills) {
                navPills.classList.add('bg-white/10', 'border-white/20');
                navPills.classList.remove('bg-gray-100/80', 'border-gray-200/50');
            }
            document.querySelectorAll('.nav-link').forEach(link => {
                if (!link.classList.contains('bg-white')) {
                    link.classList.add('text-white/90', 'hover:text-white', 'hover:bg-white/15');
                    link.classList.remove('text-gray-600', 'hover:text-teal-700', 'hover:bg-gray-100');
                }
            });
            document.querySelectorAll('#bar1, #bar2, #bar3').forEach(b => {
                b.classList.add('bg-white');
                b.classList.remove('bg-gray-700');
            });
            toggle.classList.add('bg-white/10', 'border-white/20', 'hover:bg-white/20');
            toggle.classList.remove('bg-gray-100', 'border-gray-200', 'hover:bg-gray-200');
            // Reset lang toggle
            const langToggle = document.getElementById('lang-toggle');
            if (langToggle) {
                langToggle.classList.add('bg-white/10', 'border-white/20', 'text-white', 'hover:bg-white/20');
                langToggle.classList.remove('bg-gray-100', 'border-gray-200', 'text-gray-700', 'hover:bg-gray-200');
            }
            const loginBtn = nav.querySelector('a[href="/login"].bg-white');
            if (loginBtn) {
                loginBtn.classList.add('shadow-white/20', 'hover:shadow-white/30');
                loginBtn.classList.remove('shadow-teal-500/20', 'hover:shadow-teal-500/30');
            }
        }
    });

    // Trigger scroll check on load
    window.dispatchEvent(new Event('scroll'));
</script>