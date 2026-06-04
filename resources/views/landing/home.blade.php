@extends('layouts.app')

@section('content')

<!-- HERO SECTION -->
<section class="relative min-h-screen flex items-center overflow-hidden bg-gradient-to-br from-slate-900 via-teal-900 to-cyan-900">

    <!-- Aurora / Mesh Gradient Background -->
    <div class="absolute inset-0">
        <div class="absolute top-0 left-0 w-[600px] h-[600px] bg-gradient-to-br from-teal-400/30 to-cyan-400/20 rounded-full blur-[120px] animate-aurora"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-gradient-to-br from-emerald-400/25 to-blue-400/15 rounded-full blur-[100px] animate-aurora" style="animation-delay: -7s;"></div>
        <div class="absolute top-1/2 left-1/2 w-[400px] h-[400px] bg-gradient-to-br from-cyan-300/20 to-teal-300/10 rounded-full blur-[80px] -translate-x-1/2 -translate-y-1/2 animate-aurora" style="animation-delay: -14s;"></div>
    </div>

    <!-- Grid Pattern Overlay -->
    <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 40px 40px;"></div>

    <!-- Floating Shapes -->
    <div class="absolute top-20 left-10 w-20 h-20 border border-white/10 rounded-2xl rotate-12 animate-float"></div>
    <div class="absolute top-40 right-20 w-16 h-16 border border-teal-400/20 rounded-full animate-float-slow"></div>
    <div class="absolute bottom-32 left-1/4 w-12 h-12 bg-gradient-to-br from-teal-400/10 to-cyan-400/10 rounded-xl rotate-45 animate-float" style="animation-delay: -3s;"></div>
    <div class="absolute bottom-48 right-1/3 w-8 h-8 border border-cyan-300/15 rounded-lg rotate-12 animate-float-slow" style="animation-delay: -2s;"></div>

    <div class="relative container mx-auto px-6 pt-28 pb-20 grid lg:grid-cols-2 gap-12 items-center">

        <!-- KIRI -->
        <div class="animate-fadeInUp">

            <!-- Badge -->
            <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 text-white/90 text-sm font-medium px-5 py-2 rounded-full mb-8">
                <span class="relative flex h-2.5 w-2.5">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-teal-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-teal-400"></span>
                </span>
                <span data-i18n="home.badge">Internet Provider Terpercaya</span>
            </div>

            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black text-white leading-[1.1] tracking-tight">
                <span data-i18n="home.hero.1">Internet</span>
                <span class="gradient-text" data-i18n="home.hero.2"> Cepat</span>
                <br><span data-i18n="home.hero.3">Untuk Rumah</span>
                <br><span data-i18n="home.hero.4">Anda</span>
            </h1>

            <p class="mt-8 text-lg sm:text-xl text-white/60 leading-relaxed max-w-lg" data-i18n="home.hero.desc">
                Nikmati koneksi stabil hingga <span class="text-teal-400 font-semibold">30 Mbps</span> untuk gaming, streaming, dan bekerja dari rumah tanpa hambatan.
            </p>

            <div class="mt-10 flex gap-4 flex-wrap">
                <a href="/paket"
                    class="group relative overflow-hidden bg-gradient-to-r from-teal-500 to-cyan-500 text-white px-8 py-4 rounded-2xl font-bold shadow-xl shadow-teal-500/25 hover:shadow-2xl hover:shadow-teal-500/40 hover:-translate-y-1 transition-all duration-300">
                    <span class="relative z-10 flex items-center gap-2">
                        <span data-i18n="home.btn.paket">Lihat Paket</span>
                        <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </span>
                    <div class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-700 bg-gradient-to-r from-transparent via-white/20 to-transparent skew-x-12"></div>
                </a>

                <a href="/login"
                    class="group glass text-white px-8 py-4 rounded-2xl font-bold hover:bg-white/15 transition-all duration-300 flex items-center gap-2">
                    <svg class="w-5 h-5 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                    <span data-i18n="home.btn.login">Login Pelanggan</span>
                </a>
            </div>

            <!-- Trust indicators -->
            <div class="mt-12 flex items-center gap-6 text-white/40 text-sm">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-teal-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    <span data-i18n="home.trust.1">Tanpa Kontrak</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-teal-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    <span data-i18n="home.trust.2">Support 24/7</span>
                </div>
            </div>
        </div>

        <!-- KANAN -->
        <div class="flex justify-center animate-fadeInUp" style="animation-delay: 0.3s;">
            <div class="relative">
                <!-- Glow behind image -->
                <div class="absolute inset-0 bg-gradient-to-br from-teal-400/30 to-cyan-400/20 rounded-full blur-[60px] scale-75"></div>
                <img src="{{ asset('images/orang.png') }}"
                    class="relative w-[450px] lg:w-[550px] drop-shadow-2xl animate-float-slow">
            </div>
        </div>

    </div>

    <!-- Wave Bottom -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 100L1440 100L1440 40C1200 80 960 10 720 40C480 70 240 10 0 40L0 100Z" fill="#f9fafb"/>
        </svg>
    </div>

</section>

<!-- STATS SECTION -->
<section class="relative -mt-1 bg-gray-50 pb-10">
    <div class="container mx-auto px-6">
        <div class="max-w-5xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-6 reveal">

            <div class="bg-white rounded-2xl p-6 text-center shadow-lg shadow-gray-100/80 border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 mx-auto rounded-xl bg-gradient-to-br from-teal-400 to-teal-500 flex items-center justify-center mb-3 shadow-lg shadow-teal-500/25">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
                <p class="text-3xl font-black text-gray-800" data-count="500" data-suffix="+">0+</p>
                <p class="text-sm text-gray-400 font-medium mt-1" data-i18n="home.stat.pelanggan">Pelanggan Aktif</p>
            </div>

            <div class="bg-white rounded-2xl p-6 text-center shadow-lg shadow-gray-100/80 border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 mx-auto rounded-xl bg-gradient-to-br from-cyan-400 to-blue-500 flex items-center justify-center mb-3 shadow-lg shadow-cyan-500/25">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <p class="text-3xl font-black text-gray-800" data-count="99" data-suffix=".9%">0%</p>
                <p class="text-sm text-gray-400 font-medium mt-1" data-i18n="home.stat.uptime">Uptime Jaringan</p>
            </div>

            <div class="bg-white rounded-2xl p-6 text-center shadow-lg shadow-gray-100/80 border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 mx-auto rounded-xl bg-gradient-to-br from-emerald-400 to-green-500 flex items-center justify-center mb-3 shadow-lg shadow-emerald-500/25">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <p class="text-3xl font-black text-gray-800" data-count="24" data-suffix="/7">0</p>
                <p class="text-sm text-gray-400 font-medium mt-1" data-i18n="home.stat.support">Support Online</p>
            </div>

            <div class="bg-white rounded-2xl p-6 text-center shadow-lg shadow-gray-100/80 border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 mx-auto rounded-xl bg-gradient-to-br from-violet-400 to-purple-500 flex items-center justify-center mb-3 shadow-lg shadow-violet-500/25">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <p class="text-3xl font-black text-gray-800" data-count="30" data-suffix=" Mbps">0</p>
                <p class="text-sm text-gray-400 font-medium mt-1" data-i18n="home.stat.speed">Kecepatan Max</p>
            </div>

        </div>
    </div>
</section>

<!-- KENAPA PILIH KAMI / KEUNGGULAN -->
<section class="bg-gray-50 py-20 sm:py-28">
    <div class="container mx-auto px-6 max-w-6xl">

        <div class="text-center mb-16 reveal">
            <p class="text-sm font-bold text-teal-600 uppercase tracking-widest mb-3" data-i18n="home.why.label">Keunggulan Kami</p>
            <h2 class="text-4xl sm:text-5xl font-black text-gray-900 leading-tight" data-i18n="home.why.title">
                Kenapa Pilih <span class="gradient-text">Star Connect</span>?
            </h2>
            <p class="mt-5 text-gray-400 text-lg max-w-2xl mx-auto" data-i18n="home.why.desc">
                Kami memberikan layanan internet terbaik dengan harga terjangkau dan dukungan teknisi profesional.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">

            <!-- STABIL -->
            <div class="reveal reveal-delay-1 group">
                <div class="bg-white rounded-3xl p-8 shadow-lg shadow-gray-100/80 border border-gray-100 hover:shadow-2xl hover:shadow-teal-500/10 hover:-translate-y-2 transition-all duration-500 h-full">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-teal-400 to-emerald-500 flex items-center justify-center mb-6 shadow-xl shadow-teal-500/25 group-hover:scale-110 group-hover:rotate-3 transition-all duration-500">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-black text-gray-800 mb-3" data-i18n="home.why.stabil.title">Sangat Stabil</h3>
                    <p class="text-gray-500 leading-relaxed" data-i18n="home.why.stabil.desc">
                        Koneksi stabil 24 jam tanpa putus. Nikmati pengalaman online tanpa hambatan apapun cuacanya.
                    </p>
                    <div class="mt-6 flex items-center gap-2 text-teal-600 font-semibold text-sm group-hover:gap-3 transition-all duration-300">
                        <span data-i18n="home.why.more">Pelajari Lebih</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </div>
                </div>
            </div>

            <!-- CEPAT -->
            <div class="reveal reveal-delay-2 group">
                <div class="bg-white rounded-3xl p-8 shadow-lg shadow-gray-100/80 border border-gray-100 hover:shadow-2xl hover:shadow-cyan-500/10 hover:-translate-y-2 transition-all duration-500 h-full">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-cyan-400 to-blue-500 flex items-center justify-center mb-6 shadow-xl shadow-cyan-500/25 group-hover:scale-110 group-hover:-rotate-3 transition-all duration-500">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-black text-gray-800 mb-3" data-i18n="home.why.cepat.title">Super Cepat</h3>
                    <p class="text-gray-500 leading-relaxed" data-i18n="home.why.cepat.desc">
                        Kecepatan tinggi untuk semua aktivitas. Download, upload, dan streaming lancar tanpa buffering.
                    </p>
                    <div class="mt-6 flex items-center gap-2 text-cyan-600 font-semibold text-sm group-hover:gap-3 transition-all duration-300">
                        <span data-i18n="home.why.more">Pelajari Lebih</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </div>
                </div>
            </div>

            <!-- MURAH -->
            <div class="reveal reveal-delay-3 group">
                <div class="bg-white rounded-3xl p-8 shadow-lg shadow-gray-100/80 border border-gray-100 hover:shadow-2xl hover:shadow-blue-500/10 hover:-translate-y-2 transition-all duration-500 h-full">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center mb-6 shadow-xl shadow-blue-500/25 group-hover:scale-110 group-hover:rotate-3 transition-all duration-500">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-black text-gray-800 mb-3" data-i18n="home.why.murah.title">Harga Terjangkau</h3>
                    <p class="text-gray-500 leading-relaxed" data-i18n="home.why.murah.desc">
                        Harga jujur dengan kualitas premium. Pas di kantong untuk keluarga dan semua kalangan.
                    </p>
                    <div class="mt-6 flex items-center gap-2 text-blue-600 font-semibold text-sm group-hover:gap-3 transition-all duration-300">
                        <span data-i18n="home.why.more">Pelajari Lebih</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ROUTER SECTION -->
<section class="relative bg-white py-20 sm:py-28 overflow-hidden">
    <div class="absolute inset-0 opacity-[0.02]" style="background-image: radial-gradient(circle, #14b8a6 1px, transparent 1px); background-size: 30px 30px;"></div>

    <div class="container mx-auto px-6 max-w-6xl">
        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <!-- GAMBAR ROUTER -->
            <div class="flex justify-center reveal">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-teal-200/40 to-cyan-200/40 rounded-[3rem] blur-[40px] scale-90"></div>
                    <div class="relative bg-gradient-to-br from-gray-50 to-teal-50/50 rounded-[3rem] p-10 border border-gray-100">
                        <img src="{{ asset('images/Router.png') }}" alt="Router Wifi"
                            class="w-64 sm:w-80 object-contain drop-shadow-xl mx-auto animate-float-slow">
                    </div>
                </div>
            </div>

            <!-- TEXT -->
            <div class="reveal reveal-delay-2">
                <p class="text-sm font-bold text-teal-600 uppercase tracking-widest mb-4" data-i18n="home.router.label">Perangkat Berkualitas</p>
                <h2 class="text-4xl sm:text-5xl font-black text-gray-900 leading-tight mb-6" data-i18n="home.router.title">
                    Router <span class="gradient-text">Premium</span> Untuk Koneksi Maksimal
                </h2>
                <p class="text-gray-500 leading-relaxed text-lg mb-8" data-i18n="home.router.desc">
                    Nikmati koneksi internet cepat dan stabil untuk kebutuhan rumah setiap hari.
                    Cocok untuk streaming, gaming, meeting online, dan aktivitas digital tanpa hambatan.
                </p>

                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-xl bg-teal-50 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-teal-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        </div>
                        <p class="text-gray-600 font-medium" data-i18n="home.router.f1">Didukung teknisi profesional Star Connect</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-xl bg-cyan-50 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-cyan-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        </div>
                        <p class="text-gray-600 font-medium" data-i18n="home.router.f2">Layanan support siap membantu kapan saja</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        </div>
                        <p class="text-gray-600 font-medium" data-i18n="home.router.f3">Gratis instalasi dan setting router</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- PAKET INTERNET -->
<section class="relative bg-gradient-to-b from-gray-50 to-white py-20 sm:py-28 overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-br from-teal-100/30 to-cyan-100/30 rounded-full blur-[100px] translate-x-1/2 -translate-y-1/2"></div>

    <div class="container mx-auto px-6">

        <div class="text-center mb-16 reveal">
            <p class="text-sm font-bold text-teal-600 uppercase tracking-widest mb-3" data-i18n="home.paket.label">Pilihan Paket</p>
            <h2 class="text-4xl sm:text-5xl font-black text-gray-900 leading-tight" data-i18n="home.paket.title">
                Paket Internet <span class="gradient-text">Starconect</span>
            </h2>
            <p class="mt-5 text-gray-400 text-lg max-w-2xl mx-auto" data-i18n="home.paket.desc">
                Pilih paket yang sesuai kebutuhan Anda. Semua paket sudah termasuk unlimited internet.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-6 max-w-7xl mx-auto">

            @php
                $pakets = [
                    ['speed' => '8', 'price' => '150K', 'desc' => 'Cocok untuk penggunaan ringan', 'features' => ['Unlimited Internet', 'Streaming HD', 'Support 24 Jam', 'Stabil Untuk Rumah'], 'gradient' => 'from-teal-400 to-teal-500', 'color' => 'teal', 'popular' => false],
                    ['speed' => '10', 'price' => '170K', 'desc' => 'Cocok untuk keluarga kecil', 'features' => ['Unlimited Internet', 'Streaming Full HD', 'Gaming Stabil', 'Support 24 Jam'], 'gradient' => 'from-cyan-400 to-blue-500', 'color' => 'blue', 'popular' => false],
                    ['speed' => '15', 'price' => '220K', 'desc' => 'Paket paling favorit pelanggan', 'features' => ['Unlimited Internet', 'Gaming Lancar', 'Streaming 4K', 'Banyak Device'], 'gradient' => 'from-amber-400 to-orange-500', 'color' => 'orange', 'popular' => true],
                    ['speed' => '20', 'price' => '270K', 'desc' => 'Cocok untuk gaming & kerja', 'features' => ['Unlimited Internet', 'Gaming Anti Lag', 'Streaming Ultra HD', 'Prioritas Support'], 'gradient' => 'from-violet-500 to-purple-600', 'color' => 'purple', 'popular' => false],
                    ['speed' => '30', 'price' => '420K', 'desc' => 'Paket premium super cepat', 'features' => ['Unlimited Internet', 'Super Fast Speed', 'Cocok Untuk Kantor', 'Prioritas VIP'], 'gradient' => 'from-rose-500 to-red-500', 'color' => 'red', 'popular' => false],
                ];
            @endphp

            @foreach($pakets as $i => $paket)
            <div class="reveal reveal-delay-{{ ($i % 5) + 1 }} group">
                <div class="relative bg-white rounded-3xl shadow-lg shadow-gray-100/80 border {{ $paket['popular'] ? 'border-amber-300 ring-2 ring-amber-400/30' : 'border-gray-100' }} overflow-hidden hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 h-full flex flex-col">

                    @if($paket['popular'])
                    <div class="absolute top-4 right-4 z-10">
                        <span class="bg-gradient-to-r from-amber-400 to-orange-500 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg shadow-amber-500/30 animate-bounce-subtle">
                            ⭐ POPULER
                        </span>
                    </div>
                    @endif

                    <div class="bg-gradient-to-br {{ $paket['gradient'] }} text-white text-center py-8 relative overflow-hidden">
                        <div class="absolute inset-0 bg-white/5" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 20px 20px;"></div>
                        <div class="relative">
                            <h2 class="text-3xl font-black">{{ $paket['speed'] }} Mbps</h2>
                        </div>
                    </div>

                    <div class="p-6 text-center flex-1 flex flex-col">
                        <p class="text-gray-400 text-sm mb-3">{{ $paket['desc'] }}</p>
                        <h3 class="text-4xl font-black text-gray-800 mb-1">Rp{{ $paket['price'] }}</h3>
                        <p class="text-gray-400 text-xs mb-6" data-i18n="home.paket.perbulan">per bulan</p>

                        <ul class="space-y-3 text-gray-600 text-sm mb-8 flex-1">
                            @foreach($paket['features'] as $feature)
                            <li class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-{{ $paket['color'] }}-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                {{ $feature }}
                            </li>
                            @endforeach
                        </ul>

                        <a href="https://wa.me/6281262237932?text=Halo%20Admin%20Star%20Connect,%20saya%20ingin%20berlangganan%20paket%20{{ $paket['speed'] }}%20Mbps"
                            target="_blank"
                            class="block w-full bg-gradient-to-r {{ $paket['gradient'] }} text-white py-3.5 rounded-2xl font-bold text-sm shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300">
                            <span data-i18n="home.paket.btn">Berlangganan Sekarang</span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

<!-- TESTIMONIAL SECTION -->
<section class="bg-white py-20 sm:py-28">
    <div class="container mx-auto px-6 max-w-6xl">

        <div class="text-center mb-16 reveal">
            <p class="text-sm font-bold text-teal-600 uppercase tracking-widest mb-3" data-i18n="home.testi.label">Testimoni</p>
            <h2 class="text-4xl sm:text-5xl font-black text-gray-900 leading-tight" data-i18n="home.testi.title">
                Apa Kata <span class="gradient-text">Pelanggan</span> Kami?
            </h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="reveal reveal-delay-1">
                <div class="bg-gray-50 rounded-3xl p-8 border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 h-full">
                    <div class="flex items-center gap-1 mb-4">
                        @for($s = 0; $s < 5; $s++)
                        <svg class="w-5 h-5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                    </div>
                    <p class="text-gray-600 leading-relaxed mb-6" data-i18n="home.testi.1">"Internet nya mantap, stabil banget buat kerja dari rumah. Streaming juga lancar, gak pernah buffering. Recommended!"</p>
                    <div class="flex items-center gap-3">
                        <div class="w-11 h-11 rounded-full bg-gradient-to-br from-teal-400 to-teal-500 flex items-center justify-center text-white font-bold text-sm">A</div>
                        <div>
                            <p class="font-bold text-gray-800 text-sm">Ahmad Surya</p>
                            <p class="text-gray-400 text-xs">Pelanggan Paket 15 Mbps</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="reveal reveal-delay-2">
                <div class="bg-gray-50 rounded-3xl p-8 border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 h-full">
                    <div class="flex items-center gap-1 mb-4">
                        @for($s = 0; $s < 5; $s++)
                        <svg class="w-5 h-5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                    </div>
                    <p class="text-gray-600 leading-relaxed mb-6" data-i18n="home.testi.2">"Harga terjangkau tapi kualitas top. Anak-anak bisa belajar online, saya juga bisa meeting video call tanpa masalah."</p>
                    <div class="flex items-center gap-3">
                        <div class="w-11 h-11 rounded-full bg-gradient-to-br from-cyan-400 to-blue-500 flex items-center justify-center text-white font-bold text-sm">S</div>
                        <div>
                            <p class="font-bold text-gray-800 text-sm">Siti Nurhaliza</p>
                            <p class="text-gray-400 text-xs">Pelanggan Paket 10 Mbps</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="reveal reveal-delay-3">
                <div class="bg-gray-50 rounded-3xl p-8 border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 h-full">
                    <div class="flex items-center gap-1 mb-4">
                        @for($s = 0; $s < 5; $s++)
                        <svg class="w-5 h-5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                    </div>
                    <p class="text-gray-600 leading-relaxed mb-6" data-i18n="home.testi.3">"Gaming pake Star Connect anti lag. Main Mobile Legend, PUBG, Free Fire lancar jaya. Support nya juga fast response banget!"</p>
                    <div class="flex items-center gap-3">
                        <div class="w-11 h-11 rounded-full bg-gradient-to-br from-violet-400 to-purple-500 flex items-center justify-center text-white font-bold text-sm">R</div>
                        <div>
                            <p class="font-bold text-gray-800 text-sm">Rizky Pratama</p>
                            <p class="text-gray-400 text-xs">Pelanggan Paket 20 Mbps</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section class="relative py-20 sm:py-28 overflow-hidden">
    <div class="container mx-auto px-6">
        <div class="reveal">
            <div class="relative rounded-[2.5rem] overflow-hidden max-w-5xl mx-auto">

                <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-teal-900 to-cyan-900"></div>
                <div class="absolute top-0 right-0 w-96 h-96 bg-teal-400/20 rounded-full blur-[80px]"></div>
                <div class="absolute bottom-0 left-0 w-72 h-72 bg-cyan-400/15 rounded-full blur-[60px]"></div>
                <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 30px 30px;"></div>

                <div class="relative p-10 sm:p-16 text-center">
                    <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 text-white/90 text-sm font-medium px-4 py-2 rounded-full mb-6">
                        <span data-i18n="home.cta.badge">🚀 Promo Spesial</span>
                    </div>

                    <h2 class="text-4xl sm:text-5xl font-black text-white leading-tight" data-i18n="home.cta.title">
                        Ayo Pasang <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-300 to-cyan-300">Sekarang Juga</span>
                    </h2>

                    <p class="mt-6 text-lg text-white/60 max-w-xl mx-auto" data-i18n="home.cta.desc">
                        Pasang sekarang cukup 150K, daftar hari ini langsung aktif hari ini juga. Gratis instalasi!
                    </p>

                    <a href="https://wa.me/6281262237932?text=Halo%20Admin%20Star%20Connect,%20saya%20ingin%20pasang%20internet"
                        target="_blank"
                        class="group inline-flex items-center gap-3 mt-10 bg-white text-teal-700 px-10 py-4 rounded-2xl font-bold shadow-xl shadow-black/20 hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                        <span data-i18n="home.cta.btn">DAFTAR SEKARANG</span>
                        <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection