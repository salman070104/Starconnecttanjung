@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="relative py-28 bg-cover bg-center bg-no-repeat text-white"
    style="background-image: url('{{ asset('images/bg-alam.jpg') }}');">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative container mx-auto px-6 text-center">

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

    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-3xl p-12 text-center text-white shadow-2xl">

        <h2 class="text-4xl font-bold">
            Ayo Pasang Sekarang Juga
        </h2>

        <p class="mt-5 text-lg text-blue-100">
            Pasang sekarang cukup 150K, Daftar Hari ini Pasang Hari ini juga
        </p>

        <a href="https://wa.me/6281262237932?text=Halo%20Admin%20Star%20Connect,%20saya%20ingin%20pasang%20internet"
            target="_blank"
            class="inline-block mt-8 bg-white text-blue-700 px-10 py-4 rounded-2xl font-semibold shadow-lg hover:scale-105 transition">

            DAFTAR SEKARANG JUGA

        </a>

    </div>

</section>

@endsection