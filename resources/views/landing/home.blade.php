@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="bg-gradient-to-r from-teal-500 via-cyan-500 to-emerald-500 text-white relative overflow-hidden">

    <div class="container mx-auto px-6 py-24 grid md:grid-cols-2 gap-10 items-center">

        <!-- KIRI -->
        <div>

            <h1 class="text-5xl md:text-6xl font-bold leading-[1.4]">
                Internet Cepat Untuk <br>
                Rumah Anda
            </h1>

            <p class="mt-8 text-xl text-teal-100 leading-relaxed">
                Nikmati koneksi stabil untuk gaming, streaming, dan bekerja.
            </p>

            <div class="mt-10 flex gap-5 flex-wrap">

                <a href="/paket"
                    class="bg-white text-teal-700 px-8 py-4 rounded-2xl font-semibold shadow-xl hover:scale-105 transition duration-300">

                    Lihat Paket

                </a>

                <a href="/login"
                    class="bg-white/10 border border-white/30 backdrop-blur-md px-8 py-4 rounded-2xl font-semibold hover:bg-white/20 transition duration-300">

                    Login Pelanggan

                </a>

            </div>

        </div>

        <!-- KANAN -->
        <div class="flex justify-center">

            <img src="{{ asset('images/orang.png') }}"
                class="w-[550px] drop-shadow-2xl hover:scale-105 transition duration-500">

        </div>

    </div>

</section>

<!-- FITUR / KEUNGGULAN -->
<section class="relative -mt-20 z-20 px-6 pb-20">
    <div class="container mx-auto max-w-6xl">
        <div class="grid md:grid-cols-3 gap-8">
            
            <!-- STABIL -->
            <div class="bg-white/90 backdrop-blur-xl rounded-[2rem] p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white hover:-translate-y-2 hover:shadow-[0_20px_40px_rgb(20,184,166,0.15)] transition-all duration-300 group">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-teal-400 to-emerald-500 flex items-center justify-center mb-6 shadow-lg shadow-teal-500/30 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3">Sangat Stabil</h3>
                <p class="text-gray-500 leading-relaxed font-medium">
                    Koneksi stabil 24 jam tanpa putus. Nikmati pengalaman online tanpa hambatan apapun cuacanya.
                </p>
            </div>

            <!-- CEPAT -->
            <div class="bg-white/90 backdrop-blur-xl rounded-[2rem] p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white hover:-translate-y-2 hover:shadow-[0_20px_40px_rgb(6,182,212,0.15)] transition-all duration-300 group">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-cyan-400 to-blue-500 flex items-center justify-center mb-6 shadow-lg shadow-cyan-500/30 group-hover:scale-110 group-hover:-rotate-3 transition-all duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3">Super Cepat</h3>
                <p class="text-gray-500 leading-relaxed font-medium">
                    Kecepatan tinggi untuk semua aktivitas. Download, upload, dan streaming lancar tanpa buffering.
                </p>
            </div>

            <!-- MURAH -->
            <div class="bg-white/90 backdrop-blur-xl rounded-[2rem] p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white hover:-translate-y-2 hover:shadow-[0_20px_40px_rgb(59,130,246,0.15)] transition-all duration-300 group">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center mb-6 shadow-lg shadow-blue-500/30 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3">Harga Terjangkau</h3>
                <p class="text-gray-500 leading-relaxed font-medium">
                    Harga jujur dengan kualitas premium. Pas di kantong untuk keluarga dan semua kalangan.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- ROUTER SECTION -->
<section class="container mx-auto px-6 py-10">

    <div class="flex flex-col md:flex-row items-center justify-center gap-8 md:gap-10">

        <!-- GAMBAR ROUTER -->
        <div class="flex justify-center">
            <img src="{{ asset('images/Router.png') }}" alt="Router Wifi"
                class="w-48 sm:w-64 md:w-[320px] object-contain drop-shadow-xl">
        </div>

        <!-- TEXT -->
        <div class="max-w-md text-center md:text-left text-black text-sm leading-relaxed">
            <p class="mb-1">
                Nikmati koneksi internet cepat dan stabil untuk kebutuhan rumah setiap hari.
                Cocok untuk streaming, gaming, meeting online, dan aktivitas digital tanpa hambatan.
                Didukung teknisi profesional Star Connect dengan layanan support yang siap membantu kapan saja.
            </p>
        </div>

    </div>

</section>

<!-- HERO -->
<section class="relative py-28 bg-cover bg-center bg-no-repeat text-white"
    style="background-image: url('{{ asset('images/bg-alam.jpg') }}');">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/50"></div>


    <div class="container mx-auto px-6 text-center">

        <h1 class="text-5xl md:text-6xl font-bold leading-tight">
            Paket Internet Starconect
        </h1>

        <p class="mt-6 text-xl text-cyan-100 max-w-3xl mx-auto">
            Nikmati koneksi internet cepat, stabil, dan tanpa batas untuk kebutuhan rumah, gaming, streaming, dan
            bisnis.
        </p>

    </div>

</section>

<!-- PAKET -->
<section class="container mx-auto px-6 py-20">

    <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-8">

        <!-- Paket 8 Mbps -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden hover:-translate-y-3 transition duration-300">

            <div class="bg-gradient-to-r from-cyan-500 to-teal-500 text-white text-center py-6">
                <h2 class="text-2xl font-bold">
                    8 Mbps
                </h2>
            </div>

            <div class="p-8 text-center">

                <p class="text-gray-500 mb-3">
                    Cocok untuk penggunaan ringan
                </p>

                <h3 class="text-4xl font-bold text-cyan-600">
                    Rp150K
                </h3>

                <ul class="mt-8 space-y-4 text-gray-600">
                    <li>✔ Unlimited Internet</li>
                    <li>✔ Streaming HD</li>
                    <li>✔ Support 24 Jam</li>
                    <li>✔ Stabil Untuk Rumah</li>
                </ul>

                <a href="https://wa.me/6281262237932?text=Halo%20Admin%20Star%20Connect,%20saya%20ingin%20berlangganan%20paket%208%20Mbps"
                    target="_blank"
                    class="block mt-10 bg-cyan-600 hover:bg-cyan-700 text-white py-4 rounded-2xl font-semibold shadow-lg transition">

                    Berlangganan Sekarang

                </a>

            </div>

        </div>

        <!-- Paket 10 Mbps -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden hover:-translate-y-3 transition duration-300">

            <div class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white text-center py-6">
                <h2 class="text-2xl font-bold">
                    10 Mbps
                </h2>
            </div>

            <div class="p-8 text-center">

                <p class="text-gray-500 mb-3">
                    Cocok untuk keluarga kecil
                </p>

                <h3 class="text-4xl font-bold text-blue-600">
                    Rp170K
                </h3>

                <ul class="mt-8 space-y-4 text-gray-600">
                    <li>✔ Unlimited Internet</li>
                    <li>✔ Streaming Full HD</li>
                    <li>✔ Gaming Stabil</li>
                    <li>✔ Support 24 Jam</li>
                </ul>

                <a href="https://wa.me/6281262237932?text=Halo%20Admin%20Star%20Connect,%20saya%20ingin%20berlangganan%20paket%2010%20Mbps"
                    target="_blank"
                    class="block mt-10 bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-2xl font-semibold shadow-lg transition">

                    Berlangganan Sekarang

                </a>

            </div>

        </div>

        <!-- Paket 15 Mbps -->
        <div
            class="bg-white rounded-3xl shadow-2xl overflow-hidden hover:-translate-y-3 transition duration-300 border-4 border-yellow-400">

            <div class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white text-center py-6 relative">

                <span class="absolute top-3 right-3 bg-white text-orange-500 px-3 py-1 rounded-full text-sm font-bold">
                    POPULER
                </span>

                <h2 class="text-2xl font-bold">
                    15 Mbps
                </h2>

            </div>

            <div class="p-8 text-center">

                <p class="text-gray-500 mb-3">
                    Paket paling favorit pelanggan
                </p>

                <h3 class="text-4xl font-bold text-orange-500">
                    Rp220K
                </h3>

                <ul class="mt-8 space-y-4 text-gray-600">
                    <li>✔ Unlimited Internet</li>
                    <li>✔ Gaming Lancar</li>
                    <li>✔ Streaming 4K</li>
                    <li>✔ Banyak Device</li>
                </ul>

                <a href="https://wa.me/6281262237932?text=Halo%20Admin%20Star%20Connect,%20saya%20ingin%20berlangganan%20paket%2015%20Mbps"
                    target="_blank"
                    class="block mt-10 bg-orange-500 hover:bg-orange-600 text-white py-4 rounded-2xl font-semibold shadow-lg transition">

                    Berlangganan Sekarang

                </a>

            </div>

        </div>

        <!-- Paket 20 Mbps -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden hover:-translate-y-3 transition duration-300">

            <div class="bg-gradient-to-r from-purple-500 to-pink-500 text-white text-center py-6">
                <h2 class="text-2xl font-bold">
                    20 Mbps
                </h2>
            </div>

            <div class="p-8 text-center">

                <p class="text-gray-500 mb-3">
                    Cocok untuk gaming & kerja
                </p>

                <h3 class="text-4xl font-bold text-purple-600">
                    Rp270K
                </h3>

                <ul class="mt-8 space-y-4 text-gray-600">
                    <li>✔ Unlimited Internet</li>
                    <li>✔ Gaming Anti Lag</li>
                    <li>✔ Streaming Ultra HD</li>
                    <li>✔ Prioritas Support</li>
                </ul>

                <a href="https://wa.me/6281262237932?text=Halo%20Admin%20Star%20Connect,%20saya%20ingin%20berlangganan%20paket%2020%20Mbps"
                    target="_blank"
                    class="block mt-10 bg-purple-600 hover:bg-purple-700 text-white py-4 rounded-2xl font-semibold shadow-lg transition">

                    Berlangganan Sekarang

                </a>

            </div>

        </div>

        <!-- Paket 30 Mbps -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden hover:-translate-y-3 transition duration-300">

            <div class="bg-gradient-to-r from-red-500 to-rose-500 text-white text-center py-6">
                <h2 class="text-2xl font-bold">
                    30 Mbps
                </h2>
            </div>

            <div class="p-8 text-center">

                <p class="text-gray-500 mb-3">
                    Paket premium super cepat
                </p>

                <h3 class="text-4xl font-bold text-red-500">
                    Rp420K
                </h3>

                <ul class="mt-8 space-y-4 text-gray-600">
                    <li>✔ Unlimited Internet</li>
                    <li>✔ Super Fast Speed</li>
                    <li>✔ Cocok Untuk Kantor</li>
                    <li>✔ Prioritas VIP</li>
                </ul>

                <a href="https://wa.me/6281262237932?text=Halo%20Admin%20Star%20Connect,%20saya%20ingin%20berlangganan%20paket%2030%20Mbps"
                    target="_blank"
                    class="block mt-10 bg-red-500 hover:bg-red-600 text-white py-4 rounded-2xl font-semibold shadow-lg transition">

                    Berlangganan Sekarang

                </a>

            </div>

        </div>

    </div>

</section>

<!-- CTA -->
<section class="container mx-auto px-6 pb-24">

    <div class="rounded-3xl p-12 text-center text-white shadow-2xl bg-cover bg-center relative overflow-hidden"
    style="background-image: url('{{ asset('images/bg-alam.jpg') }}');">

    <!-- overlay gelap -->
    <div class="absolute inset-0 bg-black/50"></div>

    <!-- content -->
    <div class="relative z-10">

        <h2 class="text-4xl font-bold">
            Ayo Pasang Sekarang Juga
        </h2>

        <p class="mt-5 text-lg text-white/90">
            Pasang sekarang cukup 150K, daftar hari ini langsung aktif hari ini juga.
        </p>

        <a href="https://wa.me/628162237932?text=Halo%20Admin%20Star%20Connect,%20saya%20ingin%20pasang%20internet"
            target="_blank"
            class="inline-block mt-8 bg-white text-teal-700 px-10 py-4 rounded-2xl font-semibold shadow-lg hover:scale-105 transition">

            DAFTAR SEKARANG

        </a>

    </div>

</div>
</section>
@endsection