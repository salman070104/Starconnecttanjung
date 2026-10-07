@extends('layouts.app')

@section('title', 'Star Connect — Internet Cepat & Jasa Pembuatan Website')
@section('meta_description', 'Layanan internet cepat dan jasa pembuatan website profesional. Nikmati koneksi WiFi stabil unlimited serta pembuatan web modern untuk kebutuhan rumah dan bisnis Anda.')

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
                <span data-i18n="home.badge">Solusi WiFi & Jasa Website</span>
            </div>

            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white leading-[1.15] tracking-tight">
                <span data-i18n="home.hero.1">Koneksi WiFi</span>
                <span class="gradient-text" data-i18n="home.hero.2"> Cepat</span>
                <br><span data-i18n="home.hero.3">& Jasa Website</span>
                <br><span class="gradient-text" data-i18n="home.hero.4">Profesional</span>
            </h1>

            <p class="mt-8 text-lg sm:text-xl text-white/60 leading-relaxed max-w-lg" data-i18n="home.hero.desc">
                Layanan internet cepat dan jasa pembuatan website profesional. Nikmati koneksi WiFi stabil hingga <span class="text-teal-400 font-semibold">30 Mbps</span> serta pembuatan web modern untuk kebutuhan rumah dan bisnis Anda.
            </p>

            <div class="mt-10 flex gap-4 flex-wrap">
                <a href="/paket"
                    class="group relative overflow-hidden bg-gradient-to-r from-teal-500 to-cyan-500 text-white px-7 py-4 rounded-2xl font-bold shadow-xl shadow-teal-500/25 hover:shadow-2xl hover:shadow-teal-500/40 hover:-translate-y-1 transition-all duration-300">
                    <span class="relative z-10 flex items-center gap-2">
                        <svg class="w-5 h-5 text-teal-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"/></svg>
                        <span data-i18n="home.btn.paket">Paket WiFi</span>
                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </span>
                    <div class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-700 bg-gradient-to-r from-transparent via-white/20 to-transparent skew-x-12"></div>
                </a>

                <a href="/#jasa-website"
                    class="group relative overflow-hidden bg-white/10 backdrop-blur-md border border-white/20 text-white px-7 py-4 rounded-2xl font-bold hover:bg-white/20 hover:border-teal-400/50 hover:-translate-y-1 transition-all duration-300 flex items-center gap-2">
                    <svg class="w-5 h-5 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17H3a2 2 0 01-2-2V5a2 2 0 012-2h14a2 2 0 012 2v10a2 2 0 01-2 2h-2"/></svg>
                    <span data-i18n="home.btn.website">Jasa Website</span>
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
                        <span class="inline-flex items-center gap-1 whitespace-nowrap bg-gradient-to-r from-amber-400 to-orange-500 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg shadow-amber-500/30 animate-bounce-subtle">
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

                        <a href="https://wa.me/6287816548545?text=Halo%20Admin%20Star%20Connect,%20saya%20ingin%20berlangganan%20paket%20{{ $paket['speed'] }}%20Mbps"
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

<!-- JASA PEMBUATAN WEBSITE SECTION -->
<section id="jasa-website" class="relative bg-gradient-to-b from-slate-900 via-teal-950 to-slate-900 py-20 sm:py-32 overflow-hidden">

    <!-- Background Effects -->
    <div class="absolute inset-0">
        <div class="absolute top-0 left-0 w-[700px] h-[700px] bg-gradient-to-br from-teal-500/15 to-cyan-500/10 rounded-full blur-[150px]"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-gradient-to-br from-violet-500/15 to-blue-500/10 rounded-full blur-[120px]"></div>
        <div class="absolute inset-0 opacity-[0.04]" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 40px 40px;"></div>
    </div>

    <!-- Floating Decorations -->
    <div class="absolute top-16 left-8 w-16 h-16 border border-teal-400/20 rounded-2xl rotate-12 animate-float"></div>
    <div class="absolute top-32 right-12 w-10 h-10 border border-cyan-300/15 rounded-full animate-float-slow"></div>
    <div class="absolute bottom-20 left-1/4 w-8 h-8 bg-teal-400/10 rounded-lg rotate-45 animate-float" style="animation-delay: -3s;"></div>

    <div class="relative container mx-auto px-6 max-w-7xl">

        <!-- HEADER -->
        <div class="text-center mb-20 reveal">
            <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 text-teal-300 text-sm font-bold px-5 py-2.5 rounded-full mb-6 uppercase tracking-widest">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17H3a2 2 0 01-2-2V5a2 2 0 012-2h14a2 2 0 012 2v10a2 2 0 01-2 2h-2"/></svg>
                Layanan Tambahan
            </div>
            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white leading-tight">
                Jasa Pembuatan
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-300 via-cyan-300 to-blue-300">Website</span>
            </h2>
            <p class="mt-6 text-lg text-white/50 max-w-2xl mx-auto leading-relaxed">
                Tidak hanya internet cepat, kami juga hadir untuk mewujudkan website impian bisnis Anda. Profesional, modern, dan siap pakai.
            </p>
        </div>

        <!-- FITUR UNGGULAN -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-20">

            <div class="reveal reveal-delay-1 group">
                <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-3xl p-7 hover:bg-white/10 hover:border-teal-400/30 hover:-translate-y-2 transition-all duration-500 h-full">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-teal-400 to-teal-500 flex items-center justify-center mb-5 shadow-xl shadow-teal-500/25 group-hover:scale-110 group-hover:rotate-3 transition-all duration-500">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="text-white font-black text-lg mb-2">Responsive Design</h3>
                    <p class="text-white/50 text-sm leading-relaxed">Tampil sempurna di semua perangkat — HP, tablet, maupun komputer.</p>
                </div>
            </div>

            <div class="reveal reveal-delay-2 group">
                <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-3xl p-7 hover:bg-white/10 hover:border-cyan-400/30 hover:-translate-y-2 transition-all duration-500 h-full">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-cyan-400 to-blue-500 flex items-center justify-center mb-5 shadow-xl shadow-cyan-500/25 group-hover:scale-110 group-hover:-rotate-3 transition-all duration-500">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="text-white font-black text-lg mb-2">Loading Cepat</h3>
                    <p class="text-white/50 text-sm leading-relaxed">Website dioptimasi untuk kecepatan loading agar pengunjung tidak kabur.</p>
                </div>
            </div>

            <div class="reveal reveal-delay-3 group">
                <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-3xl p-7 hover:bg-white/10 hover:border-violet-400/30 hover:-translate-y-2 transition-all duration-500 h-full">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-violet-500 to-purple-600 flex items-center justify-center mb-5 shadow-xl shadow-violet-500/25 group-hover:scale-110 group-hover:rotate-3 transition-all duration-500">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <h3 class="text-white font-black text-lg mb-2">SEO Friendly</h3>
                    <p class="text-white/50 text-sm leading-relaxed">Dioptimasi untuk mesin pencari agar bisnis Anda mudah ditemukan di Google.</p>
                </div>
            </div>

            <div class="reveal reveal-delay-4 group">
                <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-3xl p-7 hover:bg-white/10 hover:border-emerald-400/30 hover:-translate-y-2 transition-all duration-500 h-full">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-emerald-400 to-green-500 flex items-center justify-center mb-5 shadow-xl shadow-emerald-500/25 group-hover:scale-110 group-hover:-rotate-3 transition-all duration-500">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </div>
                    <h3 class="text-white font-black text-lg mb-2">Support & Maintenance</h3>
                    <p class="text-white/50 text-sm leading-relaxed">Kami siap membantu pemeliharaan dan update website Anda kapanpun dibutuhkan.</p>
                </div>
            </div>

        </div>

        <!-- PAKET HARGA WEBSITE -->
        <div class="text-center mb-12 reveal">
            <p class="text-sm font-bold text-teal-400 uppercase tracking-widest mb-3">Pilih Paket Anda</p>
            <h3 class="text-3xl sm:text-4xl font-black text-white">Harga <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-300 to-cyan-300">Terjangkau</span>, Kualitas Premium</h3>
        </div>

        <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">

            <!-- Paket Landing Page -->
            <div class="reveal reveal-delay-1 group">
                <div class="relative bg-white/5 backdrop-blur-sm border border-white/10 rounded-3xl p-8 hover:bg-white/8 hover:border-teal-400/30 hover:-translate-y-2 transition-all duration-500 h-full flex flex-col">
                    <div class="mb-6">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-teal-400 to-teal-500 flex items-center justify-center mb-4 shadow-lg shadow-teal-500/25">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17H3a2 2 0 01-2-2V5a2 2 0 012-2h14a2 2 0 012 2v10a2 2 0 01-2 2h-2"/></svg>
                        </div>
                        <h4 class="text-white font-black text-xl mb-1">Landing Page</h4>
                        <p class="text-white/40 text-sm">Cocok untuk promosi produk atau event</p>
                    </div>
                    <div class="mb-6">
                        <span class="text-4xl font-black text-white">Rp500K</span>
                        <span class="text-white/40 text-sm"> /project</span>
                    </div>
                    <ul class="space-y-3 mb-8 flex-1">
                        @foreach(['1 Halaman Modern', 'Desain Responsive', 'Form Kontak WA', 'Revisi 2x', 'Selesai 3 Hari'] as $f)
                        <li class="flex items-center gap-3 text-white/60 text-sm">
                            <svg class="w-5 h-5 text-teal-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            {{ $f }}
                        </li>
                        @endforeach
                    </ul>
                    <a href="https://wa.me/6287816548545?text=Halo%20Admin%20Star%20Connect,%20saya%20ingin%20jasa%20pembuatan%20Landing%20Page"
                        target="_blank"
                        class="block w-full text-center bg-gradient-to-r from-teal-500 to-teal-400 text-white py-3.5 rounded-2xl font-bold text-sm shadow-lg shadow-teal-500/20 hover:shadow-xl hover:shadow-teal-500/30 hover:-translate-y-0.5 transition-all duration-300">
                        Pesan Sekarang
                    </a>
                </div>
            </div>

            <!-- Paket Company Profile - POPULER -->
            <div class="reveal reveal-delay-2 group">
                <div class="relative bg-gradient-to-b from-teal-500/20 to-cyan-500/10 backdrop-blur-sm border border-teal-400/40 rounded-3xl p-8 hover:-translate-y-2 transition-all duration-500 h-full flex flex-col ring-2 ring-teal-400/30 shadow-2xl shadow-teal-500/20">
                    <!-- Badge Popular -->
                    <div class="absolute -top-4 left-1/2 -translate-x-1/2 z-10">
                        <span class="inline-flex items-center gap-1.5 whitespace-nowrap bg-gradient-to-r from-teal-400 to-cyan-400 text-slate-900 text-xs font-black px-4 py-1.5 rounded-full shadow-lg shadow-teal-500/30">
                            ⭐ PALING DIMINATI
                        </span>
                    </div>
                    <div class="mb-6 mt-2">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-teal-400 to-cyan-400 flex items-center justify-center mb-4 shadow-lg shadow-cyan-500/25">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        </div>
                        <h4 class="text-white font-black text-xl mb-1">Company Profile</h4>
                        <p class="text-white/40 text-sm">Ideal untuk bisnis & usaha profesional</p>
                    </div>
                    <div class="mb-6">
                        <span class="text-4xl font-black text-white">Rp1.5Jt</span>
                        <span class="text-white/40 text-sm"> /project</span>
                    </div>
                    <ul class="space-y-3 mb-8 flex-1">
                        @foreach(['5–8 Halaman Lengkap', 'Desain Premium', 'Blog & Artikel', 'WhatsApp & Maps', 'Revisi 5x', 'Selesai 7 Hari', 'Free Domain .com 1 Tahun'] as $f)
                        <li class="flex items-center gap-3 text-white/70 text-sm">
                            <svg class="w-5 h-5 text-teal-300 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            {{ $f }}
                        </li>
                        @endforeach
                    </ul>
                    <a href="https://wa.me/6287816548545?text=Halo%20Admin%20Star%20Connect,%20saya%20ingin%20jasa%20pembuatan%20Company%20Profile"
                        target="_blank"
                        class="block w-full text-center bg-gradient-to-r from-teal-400 to-cyan-400 text-slate-900 py-3.5 rounded-2xl font-black text-sm shadow-lg shadow-teal-500/30 hover:shadow-xl hover:shadow-teal-500/40 hover:-translate-y-0.5 transition-all duration-300">
                        Pesan Sekarang
                    </a>
                </div>
            </div>

            <!-- Paket Toko Online -->
            <div class="reveal reveal-delay-3 group">
                <div class="relative bg-white/5 backdrop-blur-sm border border-white/10 rounded-3xl p-8 hover:bg-white/8 hover:border-violet-400/30 hover:-translate-y-2 transition-all duration-500 h-full flex flex-col">
                    <div class="mb-6">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-violet-500 to-purple-600 flex items-center justify-center mb-4 shadow-lg shadow-violet-500/25">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        </div>
                        <h4 class="text-white font-black text-xl mb-1">Toko Online</h4>
                        <p class="text-white/40 text-sm">Untuk jualan online yang lebih profesional</p>
                    </div>
                    <div class="mb-6">
                        <span class="text-4xl font-black text-white">Rp3Jt</span>
                        <span class="text-white/40 text-sm"> /project</span>
                    </div>
                    <ul class="space-y-3 mb-8 flex-1">
                        @foreach(['Katalog Produk Lengkap', 'Keranjang Belanja', 'Integrasi Payment', 'Dashboard Admin', 'Revisi Unlimited', 'Selesai 14 Hari', 'Free Hosting 1 Tahun'] as $f)
                        <li class="flex items-center gap-3 text-white/60 text-sm">
                            <svg class="w-5 h-5 text-violet-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            {{ $f }}
                        </li>
                        @endforeach
                    </ul>
                    <a href="https://wa.me/6287816548545?text=Halo%20Admin%20Star%20Connect,%20saya%20ingin%20jasa%20pembuatan%20Toko%20Online"
                        target="_blank"
                        class="block w-full text-center bg-gradient-to-r from-violet-500 to-purple-600 text-white py-3.5 rounded-2xl font-bold text-sm shadow-lg shadow-violet-500/20 hover:shadow-xl hover:shadow-violet-500/30 hover:-translate-y-0.5 transition-all duration-300">
                        Pesan Sekarang
                    </a>
                </div>
            </div>

        </div>

        <!-- CTA Konsultasi Gratis -->
        <div class="text-center mt-14 reveal">
            <p class="text-white/40 text-sm mb-4">Ada kebutuhan khusus? Hubungi kami untuk diskusi gratis!</p>
            <a href="https://wa.me/6287816548545?text=Halo%20Admin%20Star%20Connect,%20saya%20ingin%20konsultasi%20pembuatan%20website"
                target="_blank"
                class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/15 border border-white/20 hover:border-teal-400/40 text-white font-semibold px-7 py-3.5 rounded-2xl transition-all duration-300 backdrop-blur-sm">
                <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                Konsultasi Gratis via WhatsApp
            </a>
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

                    <a href="https://wa.me/6287816548545?text=Halo%20Admin%20Star%20Connect,%20saya%20ingin%20pasang%20internet"
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