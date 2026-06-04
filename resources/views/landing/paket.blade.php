@extends('layouts.app')

@section('content')

<!-- HERO SECTION -->
<section class="relative pt-32 pb-20 overflow-hidden bg-gradient-to-br from-slate-900 via-teal-900 to-cyan-900">
    <div class="absolute inset-0">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-gradient-to-br from-teal-400/20 to-cyan-400/10 rounded-full blur-[100px] animate-aurora"></div>
        <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-gradient-to-br from-emerald-400/15 to-blue-400/10 rounded-full blur-[80px] animate-aurora" style="animation-delay: -5s;"></div>
    </div>
    <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 30px 30px;"></div>

    <div class="relative container mx-auto px-6 text-center animate-fadeInUp">
        <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 text-white/90 text-sm font-medium px-4 py-2 rounded-full mb-6">
            <span data-i18n="paket.badge">✨ Pilihan Paket</span>
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white leading-tight" data-i18n="paket.title">
            Paket Internet <span class="gradient-text">Starconect</span>
        </h1>
        <p class="mt-6 text-lg text-white/70 max-w-2xl mx-auto" data-i18n="paket.desc">
            Nikmati koneksi internet cepat, stabil, dan tanpa batas untuk kebutuhan rumah, gaming, streaming, dan bisnis.
        </p>
    </div>
</section>

<!-- PAKET -->
<section class="relative bg-gray-50 py-20 -mt-1">
    <div class="container mx-auto px-6">
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
                        <p class="text-gray-400 text-xs mb-6" data-i18n="paket.perbulan">per bulan</p>

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
                            <span data-i18n="paket.btn">Berlangganan Sekarang</span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- FAQ SECTION -->
<section class="bg-white py-20">
    <div class="container mx-auto px-6 max-w-4xl reveal">
        <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl font-black text-gray-900 mb-4" data-i18n="paket.faq.title">Pertanyaan Seputar <span class="gradient-text">Paket</span></h2>
            <p class="text-gray-500" data-i18n="paket.faq.desc">Temukan jawaban untuk pertanyaan yang sering ditanyakan pelanggan kami.</p>
        </div>

        <div class="space-y-4">
            <div class="border border-gray-100 rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
                <h3 class="text-lg font-bold text-gray-800 mb-2" data-i18n="paket.faq.q1">Apakah ada biaya pemasangan?</h3>
                <p class="text-gray-600 text-sm leading-relaxed" data-i18n="paket.faq.a1">Gratis biaya instalasi dan peminjaman perangkat router selama berlangganan.</p>
            </div>
            <div class="border border-gray-100 rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
                <h3 class="text-lg font-bold text-gray-800 mb-2" data-i18n="paket.faq.q2">Apakah ada batasan kuota (FUP)?</h3>
                <p class="text-gray-600 text-sm leading-relaxed" data-i18n="paket.faq.a2">Semua paket kami adalah Unlimited tanpa FUP. Anda bebas menggunakan internet tanpa khawatir kecepatan turun atau kuota habis.</p>
            </div>
            <div class="border border-gray-100 rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
                <h3 class="text-lg font-bold text-gray-800 mb-2" data-i18n="paket.faq.q3">Berapa lama proses pemasangan?</h3>
                <p class="text-gray-600 text-sm leading-relaxed" data-i18n="paket.faq.a3">Proses pemasangan bisa dilakukan pada hari yang sama atau maksimal H+1 setelah pendaftaran dan survei lokasi disetujui.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section class="relative py-20 bg-gray-50 overflow-hidden">
    <div class="container mx-auto px-6">
        <div class="reveal">
            <div class="relative rounded-[2.5rem] overflow-hidden max-w-5xl mx-auto shadow-2xl">
                <div class="absolute inset-0 bg-gradient-to-r from-teal-500 to-cyan-500"></div>
                <div class="absolute inset-0 opacity-[0.1]" style="background-image: radial-gradient(circle, white 2px, transparent 2px); background-size: 30px 30px;"></div>
                <div class="relative p-10 sm:p-16 text-center">
                    <h2 class="text-4xl sm:text-5xl font-black text-white leading-tight mb-4" data-i18n="paket.cta.title">
                        Tentukan Pilihanmu Sekarang
                    </h2>
                    <p class="text-lg text-teal-50 mb-10 max-w-2xl mx-auto" data-i18n="paket.cta.desc">Dapatkan promo menarik khusus pemasangan bulan ini. Segera hubungi admin kami.</p>
                    <a href="https://wa.me/6281262237932?text=Halo%20Admin%20Star%20Connect,%20saya%20ingin%20pasang%20internet"
                        target="_blank"
                        class="inline-block bg-white text-teal-600 px-10 py-4 rounded-2xl font-bold shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-300">
                        <span data-i18n="paket.cta.btn">HUBUNGI ADMIN</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection