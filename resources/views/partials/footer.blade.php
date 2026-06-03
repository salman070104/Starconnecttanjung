<footer class="relative bg-slate-950 text-white mt-20 overflow-hidden">
    <!-- Wave Separator -->
    <div class="absolute top-0 left-0 right-0 transform rotate-180">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 60L1440 60L1440 20C1200 60 960 0 720 20C480 40 240 0 0 20L0 60Z" fill="#f9fafb"/>
        </svg>
    </div>

    <!-- Glow Effects -->
    <div class="absolute bottom-0 left-1/4 w-96 h-96 bg-teal-500/5 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute top-1/4 right-1/4 w-64 h-64 bg-cyan-500/5 rounded-full blur-[80px] pointer-events-none"></div>

    <div class="container relative mx-auto px-6 py-16 sm:py-20 mt-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            
            <!-- Brand -->
            <div class="lg:col-span-1">
                <img src="{{ asset('logo.png') }}" alt="Star Connect" class="h-14 w-auto mb-6 brightness-125">
                <p class="text-slate-400 text-sm leading-relaxed mb-6">
                    Internet cepat, stabil, dan tanpa batas untuk mendukung semua aktivitas digital Anda dari rumah.
                </p>
                <div class="flex items-center gap-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-teal-500 hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-teal-500 hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Navigasi -->
            <div>
                <h3 class="text-white font-bold text-lg mb-6">Navigasi</h3>
                <ul class="space-y-3">
                    <li><a href="/" class="text-slate-400 hover:text-teal-400 hover:translate-x-1 inline-block transition-all duration-300">Beranda</a></li>
                    <li><a href="/paket" class="text-slate-400 hover:text-teal-400 hover:translate-x-1 inline-block transition-all duration-300">Paket Internet</a></li>
                    <li><a href="/login" class="text-slate-400 hover:text-teal-400 hover:translate-x-1 inline-block transition-all duration-300">Bayar Tagihan</a></li>
                    <li><a href="/pengaduan" class="text-slate-400 hover:text-teal-400 hover:translate-x-1 inline-block transition-all duration-300">Lapor Gangguan</a></li>
                </ul>
            </div>

            <!-- Kontak -->
            <div>
                <h3 class="text-white font-bold text-lg mb-6">Hubungi Kami</h3>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-teal-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span class="text-slate-400 text-sm leading-relaxed">Jl. Luwunggede-Mundu, Tanjung, Kab. Brebes</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        <span class="text-slate-400 text-sm">081262237932</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <span class="text-slate-400 text-sm">starconnecttanjung@gmail.com</span>
                    </li>
                </ul>
            </div>

            <!-- Pembayaran -->
            <div class="lg:col-span-1">
                <h3 class="text-white font-bold text-lg mb-6">Metode Pembayaran</h3>
                <div class="grid grid-cols-3 gap-3">
                    <div class="bg-white/10 border border-white/10 rounded-xl p-2 flex items-center justify-center hover:bg-white/20 transition-colors">
                        <img src="{{ asset('images/qris.png') }}" class="h-6 object-contain" alt="QRIS">
                    </div>
                    <div class="bg-white/10 border border-white/10 rounded-xl p-2 flex items-center justify-center hover:bg-white/20 transition-colors">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg" class="h-5 object-contain grayscale brightness-200">
                    </div>
                    <div class="bg-white/10 border border-white/10 rounded-xl p-2 flex items-center justify-center hover:bg-white/20 transition-colors">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/6/68/BANK_BRI_logo.svg" class="h-5 object-contain grayscale brightness-200">
                    </div>
                    <div class="bg-white/10 border border-white/10 rounded-xl p-2 flex items-center justify-center hover:bg-white/20 transition-colors">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/ad/Bank_Mandiri_logo_2016.svg" class="h-5 object-contain grayscale brightness-200">
                    </div>
                    <div class="bg-white/10 border border-white/10 rounded-xl p-2 flex items-center justify-center hover:bg-white/20 transition-colors">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/72/Logo_dana_blue.svg" class="h-5 object-contain grayscale brightness-200">
                    </div>
                    <div class="bg-white/10 border border-white/10 rounded-xl p-2 flex items-center justify-center hover:bg-white/20 transition-colors">
                        <img src="{{ asset('images/ovo.png') }}" class="h-5 object-contain grayscale brightness-200" alt="OVO">
                    </div>
                </div>
            </div>

        </div>

        <!-- Copyright -->
        <div class="mt-16 pt-8 border-t border-slate-800 text-center flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-slate-500 text-sm">
                © {{ date('Y') }} Star Connect. All Rights Reserved.
            </p>
            <div class="flex gap-4 text-sm text-slate-500">
                <a href="#" class="hover:text-teal-400 transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-teal-400 transition-colors">Terms of Service</a>
            </div>
        </div>

    </div>
</footer>