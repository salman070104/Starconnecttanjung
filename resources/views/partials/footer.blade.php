<footer class="bg-gray-950 text-white mt-20">

    <div class="container mx-auto px-6 py-12 sm:py-16">

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 sm:gap-12">

            <div class="col-span-2 md:col-span-1">

                <img src="{{ asset('logo.png') }}" alt="Star Connect" class="h-16 w-auto">

                <p class="mt-4 text-gray-300">
                    Internet cepat dan stabil untuk rumah Anda.
                </p>

            </div>

            <!-- Menu -->
            <div>

                <h3 class="text-xl font-semibold mb-5">
                    Menu
                </h3>

                <ul class="space-y-3 text-gray-400">

                    <li>
                        <a href="/" class="hover:text-cyan-400 transition">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="/paket" class="hover:text-cyan-400 transition">
                            Paket Internet
                        </a>
                    </li>

                    <li>
                        <a href="/pengaduan" class="hover:text-cyan-400 transition">
                            Pengaduan
                        </a>
                    </li>

                    <li>
                        <a href="/login" class="hover:text-cyan-400 transition">
                            Bayar Tagihan
                        </a>
                    </li>

                </ul>

            </div>

            <!-- Kontak -->
            <div>

                <h3 class="text-xl font-semibold mb-5">
                    Kontak
                </h3>

                <div class="space-y-4 text-gray-400">

                    <p class="flex items-start gap-3">
                        <span class="text-lg">📱</span>
                        <span>WhatsApp: 081262237932</span>
                    </p>

                    <p class="flex items-start gap-3">
                        <span class="text-lg">📧</span>
                        <span class="text-sm md:text-base mt-0.5">starconnecttanjung@gmail.com</span>
                    </p>

                    <p class="flex items-start gap-3">
                        <span class="text-lg">📍</span>
                        <span>Jl. Luwunggede-Mundu</span>
                    </p>

                </div>

            </div>

            <!-- Pembayaran -->
            <div>

                <h3 class="text-xl font-semibold mb-5">
                    Support Pembayaran
                </h3>

                <div class="grid grid-cols-3 gap-4">

                    <!-- QRIS -->
                    <div class="bg-white rounded-2xl p-3 flex items-center justify-center h-20">
                        <img src="{{ asset('images/qris.png') }}" class="max-h-10" alt="QRIS">
                    </div>

                    <!-- BCA -->
                    <div class="bg-white rounded-2xl p-3 flex items-center justify-center h-20">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg"
                            class="max-h-10">
                    </div>

                    <!-- BRI -->
                    <div class="bg-white rounded-2xl p-3 flex items-center justify-center h-20">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/6/68/BANK_BRI_logo.svg"
                            class="max-h-10">
                    </div>

                    <!-- Mandiri -->
                    <div class="bg-white rounded-2xl p-3 flex items-center justify-center h-20">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/ad/Bank_Mandiri_logo_2016.svg"
                            class="max-h-10">
                    </div>

                    <!-- Dana -->
                    <div class="bg-white rounded-2xl p-3 flex items-center justify-center h-20">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/72/Logo_dana_blue.svg"
                            class="max-h-10">
                    </div>

                    <!-- OVO -->
                    <div class="bg-white rounded-2xl p-3 flex items-center justify-center h-20">
                        <img src="{{ asset('images/ovo.png') }}" class="max-h-10" alt="OVO">
                    </div>

                </div>

            </div>

        </div>

        <!-- Bottom -->
        <div class="border-t border-gray-800 mt-14 pt-8 text-center text-gray-500">

            © 2026 STARCONECT — All Rights Reserved

        </div>

    </div>

</footer>