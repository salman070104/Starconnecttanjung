<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelanggan</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Midtrans Snap.js -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-slate-50 dark:bg-slate-900 transition-colors duration-300">

    <!-- HEADER -->
    <section class="bg-gradient-to-r from-slate-700 to-slate-800 dark:from-slate-900 dark:to-black text-white shadow-xl transition-colors duration-300">
        <div class="container mx-auto max-w-5xl px-4 sm:px-6 py-5 sm:py-8">
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
                <div>
                    <h1 class="text-2xl sm:text-3xl font-bold">
                        <span data-lang="id">Halo</span><span data-lang="en" class="hidden">Hello</span>, {{ $pelanggan->nama }} 👋
                    </h1>
                    <p class="mt-1 sm:mt-2 text-slate-300 text-sm sm:text-base">
                        <span data-lang="id">Selamat datang di Dashboard StarConnect</span>
                        <span data-lang="en" class="hidden">Welcome to StarConnect Dashboard</span>
                    </p>
                </div>
                <div class="flex items-center gap-4">
                    <!-- Translate Toggle -->
                    <button id="langToggle" class="text-slate-300 hover:text-white transition-colors flex items-center justify-center text-xs font-bold border border-slate-500 rounded-full w-8 h-8">
                        <span id="langText">EN</span>
                    </button>

                    <!-- Dark Mode Sliding Toggle -->
                    <label for="themeToggleCheckbox" class="relative inline-flex items-center cursor-pointer group">
                        <input type="checkbox" id="themeToggleCheckbox" class="sr-only peer">
                        <div class="w-14 h-7 bg-slate-400 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:bg-slate-600 peer-checked:bg-blue-500 shadow-inner flex items-center justify-between px-1.5">
                            <svg class="w-3.5 h-3.5 text-slate-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                            </svg>
                            <svg class="w-3.5 h-3.5 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                    </label>

                    <a href="{{ route('profile.index') }}" title="Pengaturan Akun" class="text-slate-300 hover:text-teal-400 transition-colors flex items-center gap-2 text-sm font-medium ml-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span data-lang="id">Profil</span>
                        <span data-lang="en" class="hidden">Profile</span>
                    </a>

                    <a href="{{ route('logout') }}" title="Log Out" class="text-slate-300 hover:text-red-400 transition-colors flex items-center gap-2 text-sm font-medium ml-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span data-lang="id">Keluar</span>
                        <span data-lang="en" class="hidden">Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTENT -->
    <section class="container mx-auto max-w-5xl px-4 sm:px-6 py-6 sm:py-10 space-y-5 sm:space-y-8">

        @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-r shadow-md" role="alert">
            <p class="font-bold">Sukses!</p>
            <p class="text-sm">{{ session('success') }}</p>
        </div>
        @endif

        @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-r shadow-md" role="alert">
            <p class="font-bold">Error!</p>
            <p class="text-sm">{{ session('error') }}</p>
        </div>
        @endif

        <!-- TOP SECTION: Profile & Data -->
        <div class="bg-white dark:bg-slate-800 rounded-3xl p-5 sm:p-8 shadow-lg transition-colors duration-300 border border-slate-100 dark:border-slate-700">
            <div class="flex flex-col sm:flex-row items-center gap-6 sm:gap-10">
                <!-- Avatar -->
                <div class="shrink-0 relative">
                    <div class="w-24 h-24 sm:w-40 sm:h-40 rounded-full bg-slate-100 dark:bg-slate-700 overflow-hidden border-4 border-slate-50 dark:border-slate-800 flex items-center justify-center shadow-inner transition-colors duration-300">
                        @if($pelanggan->foto)
                            <img src="{{ asset('storage/' . $pelanggan->foto) }}" alt="Foto Profil" class="w-full h-full object-cover">
                        @else
                            <img src="{{ asset('images/avatar_gray.png') }}" alt="User Avatar" class="w-full h-full object-cover">
                        @endif
                    </div>
                    <div class="absolute bottom-1 right-1 sm:bottom-2 sm:right-2 w-5 h-5 sm:w-6 sm:h-6 rounded-full border-4 border-white dark:border-slate-800
                        {{ $pelanggan->status === 'sudah_bayar' ? 'bg-green-500' : 'bg-red-500' }}"></div>
                </div>

                <!-- Data Pelanggan -->
                <div class="flex-1 w-full grid grid-cols-2 gap-4 sm:gap-6 text-center sm:text-left">
                    <div class="col-span-2 sm:col-span-1">
                        <p class="text-xs text-slate-400 font-medium tracking-wide uppercase">
                            <span data-lang="id">Nama Pelanggan</span>
                            <span data-lang="en" class="hidden">Customer Name</span>
                        </p>
                        <p class="text-lg sm:text-2xl font-bold text-slate-800 dark:text-white mt-1 transition-colors duration-300">{{ $pelanggan->nama }}</p>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <p class="text-xs text-slate-400 font-medium tracking-wide uppercase">
                            <span data-lang="id">Paket Internet</span>
                            <span data-lang="en" class="hidden">Internet Package</span>
                        </p>
                        <div class="inline-flex mt-1 items-center gap-2 bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 px-3 py-1 rounded-lg font-semibold border border-blue-100 dark:border-blue-800/50 text-sm transition-colors duration-300">
                            ⚡ {{ $pelanggan->paket }}
                        </div>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 font-medium tracking-wide uppercase">
                            <span data-lang="id">No Handphone</span>
                            <span data-lang="en" class="hidden">Phone Number</span>
                        </p>
                        <p class="text-base sm:text-lg font-medium text-slate-700 dark:text-slate-300 mt-1 transition-colors duration-300">{{ $pelanggan->no_hp ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 font-medium tracking-wide uppercase">
                            <span data-lang="id">Status Layanan</span>
                            <span data-lang="en" class="hidden">Service Status</span>
                        </p>
                        @if($pelanggan->status === 'sudah_bayar')
                            <p class="text-base sm:text-lg font-bold text-green-600 dark:text-green-400 mt-1">
                                <span data-lang="id">Lunas / Aktif</span>
                                <span data-lang="en" class="hidden">Paid / Active</span>
                            </p>
                        @else
                            <p class="text-base sm:text-lg font-bold text-red-600 dark:text-red-400 mt-1">
                                <span data-lang="id">Belum Dibayar</span>
                                <span data-lang="en" class="hidden">Unpaid</span>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- MIDDLE SECTION: Billing Info -->
        <div class="bg-gradient-to-br from-white to-slate-50 dark:from-slate-800 dark:to-slate-900 rounded-3xl p-5 sm:p-8 shadow-lg border border-slate-100 dark:border-slate-700 transition-colors duration-300">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-5 sm:gap-6">
                <div class="text-center sm:text-left">
                    <p class="text-slate-500 dark:text-slate-400 font-medium text-sm">
                        <span data-lang="id">Tagihan Bulan Ini</span>
                        <span data-lang="en" class="hidden">This Month's Bill</span>
                    </p>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-800 dark:text-white mt-2 transition-colors duration-300">
                        Rp{{ number_format($pelanggan->tagihan, 0, ',', '.') }}
                    </h2>
                </div>

                <div class="hidden sm:block w-px h-16 bg-slate-200 dark:bg-slate-700"></div>
                <div class="block sm:hidden w-full h-px bg-slate-200 dark:bg-slate-700"></div>

                <div class="text-center sm:text-right">
                    @if($pelanggan->status === 'sudah_bayar')
                        <p class="text-slate-500 dark:text-slate-400 font-medium text-sm">
                            <span data-lang="id">Tanggal Pembayaran Terakhir</span>
                            <span data-lang="en" class="hidden">Last Payment Date</span>
                        </p>
                        <h3 class="text-xl sm:text-2xl font-bold text-emerald-600 dark:text-emerald-400 mt-2 transition-colors duration-300">
                            {{ $pelanggan->tanggal_bayar ? $pelanggan->tanggal_bayar->translatedFormat('d F Y') : '-' }}
                        </h3>
                    @else
                        <p class="text-slate-500 dark:text-slate-400 font-medium text-sm">
                            <span data-lang="id">Batas Waktu Pembayaran</span>
                            <span data-lang="en" class="hidden">Payment Due Date</span>
                        </p>
                        <h3 class="text-xl sm:text-2xl font-bold text-rose-600 dark:text-rose-400 mt-2 transition-colors duration-300">
                            20 {{ now()->translatedFormat('F Y') }}
                        </h3>
                    @endif
                </div>
            </div>
        </div>

        <!-- BOTTOM SECTION: Payment -->
        @if($pelanggan->status === 'belum_bayar')
        <div class="bg-white dark:bg-slate-800 rounded-[2rem] p-1 shadow-xl overflow-hidden relative transition-colors duration-300">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-600 opacity-10"></div>
            <div class="relative bg-white dark:bg-slate-800 rounded-[1.8rem] p-5 sm:p-8 lg:p-12 transition-colors duration-300">
                <div class="text-center max-w-2xl mx-auto">
                    <h2 class="text-2xl sm:text-3xl font-bold text-slate-800 dark:text-white transition-colors duration-300">
                        <span data-lang="id">Selesaikan Pembayaran Anda</span>
                        <span data-lang="en" class="hidden">Complete Your Payment</span>
                    </h2>
                    <p class="text-slate-500 dark:text-slate-400 mt-3 sm:mt-4 leading-relaxed text-sm sm:text-base">
                        <span data-lang="id">Nikmati kemudahan membayar tagihan internet dengan berbagai metode pembayaran aman dan otomatis dari Midtrans (QRIS, E-Wallet, Transfer Bank, dll).</span>
                        <span data-lang="en" class="hidden">Enjoy the convenience of paying your internet bill with various secure and automatic payment methods from Midtrans (QRIS, E-Wallet, Bank Transfer, etc).</span>
                    </p>

                    <div class="mt-6 sm:mt-8 flex flex-col sm:flex-row justify-center items-center gap-3 sm:gap-4">
                        <button id="pay-button" class="w-full sm:w-auto inline-flex justify-center items-center gap-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-8 sm:px-10 py-4 rounded-2xl text-base sm:text-lg font-bold shadow-lg shadow-blue-500/30 transition-all hover:-translate-y-1 hover:shadow-blue-500/50">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span data-lang="id">Bayar Menggunakan Midtrans</span>
                            <span data-lang="en" class="hidden">Pay via Midtrans</span>
                        </button>
                        
                        <button id="check-status-button" class="w-full sm:w-auto inline-flex justify-center items-center gap-2 bg-slate-100 hover:bg-slate-200 dark:bg-slate-700 dark:hover:bg-slate-600 text-slate-700 dark:text-slate-200 px-6 sm:px-8 py-4 rounded-2xl text-base font-bold transition-all shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            <span data-lang="id">Cek Status</span>
                            <span data-lang="en" class="hidden">Check Status</span>
                        </button>
                    </div>

                    <p class="text-xs text-slate-400 mt-4">
                        <span data-lang="id">*Pembayaran diverifikasi secara otomatis. Klik "Cek Status" jika sudah bayar.</span>
                        <span data-lang="en" class="hidden">*Payment is verified automatically. Click "Check Status" if you have paid.</span>
                    </p>

                    <div class="mt-8 flex justify-center items-center gap-4 sm:gap-6 flex-wrap opacity-60 dark:opacity-40">
                        <img src="{{ asset('images/qris.png') }}" class="h-6 sm:h-8 object-contain mix-blend-multiply dark:mix-blend-normal dark:brightness-200" alt="QRIS">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/72/Logo_dana_blue.svg" class="h-6 sm:h-8 object-contain dark:brightness-200" alt="DANA">
                        <img src="{{ asset('images/ovo.png') }}" class="h-6 sm:h-8 object-contain dark:brightness-200" alt="OVO">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/86/Gopay_logo.svg" class="h-6 sm:h-8 object-contain dark:brightness-200" alt="GoPay">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg" class="h-6 sm:h-8 object-contain dark:brightness-200" alt="BCA">
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="bg-gradient-to-r from-emerald-500 to-green-600 rounded-3xl p-6 sm:p-8 text-white text-center shadow-lg">
            <div class="w-16 h-16 sm:w-20 sm:h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 backdrop-blur-sm">
                <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h2 class="text-xl sm:text-2xl font-bold">
                <span data-lang="id">Terima Kasih!</span>
                <span data-lang="en" class="hidden">Thank You!</span>
            </h2>
            <p class="mt-2 text-emerald-100 text-sm sm:text-base">
                <span data-lang="id">Tagihan internet Anda untuk bulan ini sudah lunas. Nikmati layanan internet tanpa gangguan dari StarConnect.</span>
                <span data-lang="en" class="hidden">Your internet bill for this month is paid. Enjoy uninterrupted internet service from StarConnect.</span>
            </p>
        </div>
        @endif

        <!-- Riwayat Pembayaran Section -->
        <div class="bg-white dark:bg-slate-800 rounded-3xl p-5 sm:p-8 shadow-lg transition-colors duration-300 border border-slate-100 dark:border-slate-700">
            <h3 class="text-xl font-bold text-slate-800 dark:text-white mb-6">
                <span data-lang="id">Riwayat Pembayaran</span>
                <span data-lang="en" class="hidden">Payment History</span>
            </h3>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-200 dark:border-slate-700">
                            <th class="py-3 px-4 text-sm font-semibold text-slate-500 dark:text-slate-400">
                                <span data-lang="id">Keterangan</span>
                                <span data-lang="en" class="hidden">Description</span>
                            </th>
                            <th class="py-3 px-4 text-sm font-semibold text-slate-500 dark:text-slate-400">
                                <span data-lang="id">Tanggal Bayar</span>
                                <span data-lang="en" class="hidden">Payment Date</span>
                            </th>
                            <th class="py-3 px-4 text-sm font-semibold text-slate-500 dark:text-slate-400">
                                <span data-lang="id">Bulan Tagihan</span>
                                <span data-lang="en" class="hidden">Billing Month</span>
                            </th>
                            <th class="py-3 px-4 text-sm font-semibold text-slate-500 dark:text-slate-400">
                                <span data-lang="id">Jumlah</span>
                                <span data-lang="en" class="hidden">Amount</span>
                            </th>
                            <th class="py-3 px-4 text-sm font-semibold text-slate-500 dark:text-slate-400">
                                <span data-lang="id">Status</span>
                                <span data-lang="en" class="hidden">Status</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                        @if($pelanggan->tanggal_bayar)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/30 transition-colors">
                            <td class="py-4 px-4 text-sm text-slate-700 dark:text-slate-300 font-medium">
                                <span data-lang="id">Pembayaran Tagihan Internet ({{ $pelanggan->paket }})</span>
                                <span data-lang="en" class="hidden">Internet Bill Payment ({{ $pelanggan->paket }})</span>
                            </td>
                            <td class="py-4 px-4 text-sm text-slate-600 dark:text-slate-400">
                                {{ \Carbon\Carbon::parse($pelanggan->tanggal_bayar)->translatedFormat('d F Y H:i') }}
                            </td>
                            <td class="py-4 px-4 text-sm text-slate-600 dark:text-slate-400">
                                {{ \Carbon\Carbon::parse($pelanggan->tanggal_bayar)->translatedFormat('F Y') }}
                            </td>
                            <td class="py-4 px-4 text-sm font-bold text-slate-700 dark:text-slate-200">
                                Rp{{ number_format($pelanggan->tagihan, 0, ',', '.') }}
                            </td>
                            <td class="py-4 px-4 text-sm">
                                <span class="inline-flex items-center gap-1.5 bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 text-xs font-semibold px-2.5 py-1 rounded-full border border-emerald-200 dark:border-emerald-500/20">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    <span data-lang="id">Berhasil</span>
                                    <span data-lang="en" class="hidden">Success</span>
                                </span>
                            </td>
                        </tr>
                        @else
                        <tr>
                            <td colspan="5" class="py-8 text-center text-slate-500 dark:text-slate-400 text-sm">
                                <span data-lang="id">Belum ada riwayat pembayaran yang tercatat.</span>
                                <span data-lang="en" class="hidden">No payment history recorded yet.</span>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </section>

    <!-- FOOTER -->
    @include('partials.footer')

    <!-- Theme & Lang Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Theme Toggle
            const themeToggleCheckbox = document.getElementById('themeToggleCheckbox');
            const html = document.documentElement;
            
            // Check LocalStorage
            if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                html.classList.add('dark');
                themeToggleCheckbox.checked = true;
            } else {
                html.classList.remove('dark');
                themeToggleCheckbox.checked = false;
            }

            themeToggleCheckbox.addEventListener('change', (e) => {
                if (e.target.checked) {
                    html.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                } else {
                    html.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                }
            });

            // Lang Toggle
            const langToggle = document.getElementById('langToggle');
            const langText = document.getElementById('langText');
            const idElements = document.querySelectorAll('[data-lang="id"]');
            const enElements = document.querySelectorAll('[data-lang="en"]');
            
            let currentLang = localStorage.getItem('lang') || 'id';

            function updateLang() {
                if(currentLang === 'en') {
                    idElements.forEach(el => el.classList.add('hidden'));
                    enElements.forEach(el => el.classList.remove('hidden'));
                    langText.textContent = 'ID'; // Button says ID to switch back
                } else {
                    idElements.forEach(el => el.classList.remove('hidden'));
                    enElements.forEach(el => el.classList.add('hidden'));
                    langText.textContent = 'EN'; // Button says EN to switch
                }
            }
            
            updateLang();

            langToggle.addEventListener('click', () => {
                currentLang = currentLang === 'id' ? 'en' : 'id';
                localStorage.setItem('lang', currentLang);
                updateLang();
            });
        });
    </script>

    @if($pelanggan->status === 'belum_bayar' && isset($snapToken))
    <script type="text/javascript">
        // Inisialisasi tombol bayar Midtrans
        document.getElementById('pay-button').onclick = function () {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){
                    window.location.href = "{{ route('payment.success') }}?order_id=" + result.order_id;
                },
                onPending: function(result){
                    // User selected a payment method and we wait for them to pay
                    window.location.href = "{{ route('payment.pending') }}";
                },
                onError: function(result){
                    alert(localStorage.getItem('lang') === 'en' ? "Payment failed!" : "Pembayaran gagal!");
                },
                onClose: function(){
                    // User closed the popup. Check if order is pending
                    // Because we cannot know directly if they clicked QRIS before closing, 
                    // we redirect them to pending page just in case. If they haven't chosen, 
                    // the pending page will just act as a waiting room anyway.
                    // Or we can just let them stay on dashboard and they can click "Cek Status" manually.
                    // Based on requirements, redirect to pending.
                    window.location.href = "{{ route('payment.pending') }}";
                }
            });
        };

        // Logika Status Checking
        const checkStatusUrl = "{{ route('payment.status') }}";
        
        // Manual check ketika tombol diklik
        document.getElementById('check-status-button').onclick = function() {
            const btn = this;
            const originalText = btn.innerHTML;
            btn.innerHTML = '<span class="animate-pulse px-4 py-1 text-sm">Mengecek...</span>';
            btn.disabled = true;

            fetch(checkStatusUrl)
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'sudah_bayar') {
                        alert(localStorage.getItem('lang') === 'en' ? "Payment Successful! Your bill is paid." : "Pembayaran Berhasil! Tagihan sudah lunas.");
                        window.location.reload();
                    } else {
                        alert(localStorage.getItem('lang') === 'en' ? "Payment not yet successful or still pending." : "Pembayaran belum berhasil atau masih menunggu konfirmasi.");
                        btn.innerHTML = originalText;
                        btn.disabled = false;
                    }
                })
                .catch(err => {
                    console.error('Error fetching status', err);
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                });
        };

        // Auto polling (auto-update) setiap 5 detik
        setInterval(function() {
            fetch(checkStatusUrl)
                .then(res => res.json())
                .then(data => {
                    // Jika di latar belakang status berubah menjadi lunas, otomatis refresh
                    if (data.status === 'sudah_bayar') {
                        window.location.reload();
                    }
                })
                .catch(err => console.error('Polling error', err));
        }, 5000);
    </script>
    @endif
</body>

</html>