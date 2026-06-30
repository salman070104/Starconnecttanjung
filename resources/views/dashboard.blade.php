<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Dashboard Pelanggan - StarConnect</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}?v=2">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    @if(isset($gateway) && $gateway === 'midtrans')
    <!-- Midtrans Snap.js -->
    <script type="text/javascript" src="{{ config('midtrans.is_production') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('midtrans.client_key') }}"></script>
    @endif

    <style>
        * { font-family: 'Inter', sans-serif; -webkit-tap-highlight-color: transparent; }
        
        /* Smooth page animations */
        @keyframes fadeUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes pulse-soft { 0%, 100% { opacity: 1; } 50% { opacity: 0.7; } }
        @keyframes bounce-gentle { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-4px); } }
        
        .animate-fade-up { animation: fadeUp 0.5s ease-out forwards; }
        .animate-fade-up-1 { animation: fadeUp 0.5s ease-out 0.1s forwards; opacity: 0; }
        .animate-fade-up-2 { animation: fadeUp 0.5s ease-out 0.2s forwards; opacity: 0; }
        .animate-fade-up-3 { animation: fadeUp 0.5s ease-out 0.3s forwards; opacity: 0; }
        .animate-fade-up-4 { animation: fadeUp 0.5s ease-out 0.4s forwards; opacity: 0; }
        .animate-fade-up-5 { animation: fadeUp 0.5s ease-out 0.5s forwards; opacity: 0; }
        .animate-pulse-soft { animation: pulse-soft 2s ease-in-out infinite; }
        .animate-bounce-gentle { animation: bounce-gentle 2s ease-in-out infinite; }

        /* Glass effect */
        .glass { background: rgba(255,255,255,0.8); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); }
        .dark .glass { background: rgba(15,23,42,0.85); }

        /* Bottom nav safe area */
        .pb-safe { padding-bottom: calc(4.5rem + env(safe-area-inset-bottom, 0px)); }

        /* Active nav animation */
        .nav-active { position: relative; }
        .nav-active::after { content: ''; position: absolute; bottom: -4px; left: 50%; transform: translateX(-50%); width: 20px; height: 3px; border-radius: 999px; background: linear-gradient(to right, #3b82f6, #6366f1); }

        /* Scrollbar hidden */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

        /* Touch feedback */
        .touch-scale { transition: transform 0.15s ease; }
        .touch-scale:active { transform: scale(0.96); }
    </style>
</head>

<body class="min-h-screen flex flex-col bg-gray-50 dark:bg-slate-950 transition-colors duration-300 pb-safe lg:pb-0">

    <!-- TOP BAR -->
    <header class="sticky top-0 z-50 glass border-b border-gray-100 dark:border-slate-800/50 transition-colors duration-300">
        <div class="max-w-lg lg:max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <!-- Avatar -->
                <a href="{{ route('profile.index') }}" class="touch-scale">
                    <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-blue-500/30 shadow-sm {{ $pelanggan->foto ? '' : 'bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center' }}">
                        @if($pelanggan->foto)
                            <img src="{{ asset('uploads/profiles/' . $pelanggan->foto) }}" class="w-full h-full object-cover" alt="Profile">
                        @else
                            <span class="text-white font-bold text-sm">{{ strtoupper(substr($pelanggan->nama, 0, 1)) }}</span>
                        @endif
                    </div>
                </a>
                <div>
                    <p class="text-[11px] text-gray-400 dark:text-slate-500 font-medium" id="greeting-text">Selamat Datang</p>
                    <h1 class="text-sm font-bold text-gray-900 dark:text-white leading-tight">{{ $pelanggan->nama }}</h1>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <!-- Lang Toggle -->
                <button id="langToggle" class="touch-scale w-8 h-8 rounded-full bg-gray-100 dark:bg-slate-800 flex items-center justify-center text-[10px] font-bold text-gray-500 dark:text-slate-400 border border-gray-200 dark:border-slate-700 transition-colors">
                    <span id="langText">EN</span>
                </button>
                <!-- Dark Mode -->
                <button id="themeToggleBtn" class="touch-scale w-8 h-8 rounded-full bg-gray-100 dark:bg-slate-800 flex items-center justify-center border border-gray-200 dark:border-slate-700 transition-colors">
                    <svg id="sunIcon" class="w-4 h-4 text-amber-500 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    <svg id="moonIcon" class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                </button>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="w-full flex-grow max-w-lg lg:max-w-7xl mx-auto px-4 py-5 lg:py-8">

        <!-- Alerts -->
        @if(session('success'))
        <div class="animate-fade-up flex items-center gap-3 bg-emerald-50 dark:bg-emerald-500/10 border border-emerald-200 dark:border-emerald-500/20 text-emerald-700 dark:text-emerald-400 px-4 py-3 rounded-2xl text-sm font-medium mb-4" id="alert-success">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
            <span class="flex-1">{{ session('success') }}</span>
            <button onclick="document.getElementById('alert-success').remove()" class="text-emerald-500"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg></button>
        </div>
        @endif
        @if(session('error'))
        <div class="animate-fade-up flex items-center gap-3 bg-red-50 dark:bg-red-500/10 border border-red-200 dark:border-red-500/20 text-red-700 dark:text-red-400 px-4 py-3 rounded-2xl text-sm font-medium mb-4" id="alert-error">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span class="flex-1">{{ session('error') }}</span>
            <button onclick="document.getElementById('alert-error').remove()" class="text-red-500"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg></button>
        </div>
        @endif

        <!-- DESKTOP: 2-column layout / MOBILE: single column -->
        <div class="lg:flex lg:gap-6 space-y-4 lg:space-y-0">

            <!-- === LEFT COLUMN === -->
            <div class="lg:flex-1 space-y-4 lg:space-y-4">

                <!-- STATUS CARD -->
                @if($pelanggan->status === 'sudah_bayar')
                <div class="animate-fade-up-1 relative overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-500 via-emerald-600 to-teal-700 p-5 text-white shadow-xl shadow-emerald-500/20">
                    <div class="absolute -right-6 -top-6 w-28 h-28 bg-white/10 rounded-full"></div>
                    <div class="absolute -right-2 top-10 w-16 h-16 bg-white/5 rounded-full"></div>
                    <div class="absolute -left-4 -bottom-4 w-20 h-20 bg-white/5 rounded-full"></div>
                    <div class="relative z-10 flex items-center gap-4">
                        <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <div>
                            <p class="text-emerald-100 text-xs font-medium uppercase tracking-wider">
                                <span data-lang="id">Status Layanan</span><span data-lang="en" class="hidden">Service Status</span>
                            </p>
                            <h2 class="text-lg font-extrabold mt-0.5">
                                <span data-lang="id">Tagihan Lunas ✓</span><span data-lang="en" class="hidden">Bill Paid ✓</span>
                            </h2>
                        </div>
                    </div>
                    <p class="relative z-10 text-emerald-100/80 text-xs mt-3">
                        <span data-lang="id">Terima kasih! Nikmati layanan internet tanpa gangguan dari StarConnect.</span>
                        <span data-lang="en" class="hidden">Thank you! Enjoy uninterrupted internet service from StarConnect.</span>
                    </p>
                </div>
                @else
                <div class="animate-fade-up-1 relative overflow-hidden rounded-3xl bg-gradient-to-br from-rose-500 via-red-500 to-orange-600 p-5 text-white shadow-xl shadow-red-500/20">
                    <div class="absolute -right-6 -top-6 w-28 h-28 bg-white/10 rounded-full"></div>
                    <div class="absolute -right-2 top-10 w-16 h-16 bg-white/5 rounded-full"></div>
                    <div class="absolute -left-4 -bottom-4 w-20 h-20 bg-white/5 rounded-full"></div>
                    <div class="relative z-10 flex items-center gap-4">
                        <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm animate-pulse-soft">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-red-100 text-xs font-medium uppercase tracking-wider">
                                <span data-lang="id">Status Layanan</span><span data-lang="en" class="hidden">Service Status</span>
                            </p>
                            <h2 class="text-lg font-extrabold mt-0.5">
                                <span data-lang="id">Belum Dibayar</span><span data-lang="en" class="hidden">Unpaid</span>
                            </h2>
                        </div>
                    </div>
                    <p class="relative z-10 text-red-100/80 text-xs mt-3">
                        <span data-lang="id">Segera selesaikan pembayaran sebelum tanggal jatuh tempo.</span>
                        <span data-lang="en" class="hidden">Please complete payment before the due date.</span>
                    </p>
                </div>
                @endif

                <!-- INFO CARDS -->
                <div class="animate-fade-up-2 grid grid-cols-3 gap-3">
                    <!-- Paket -->
                    <div class="bg-white dark:bg-slate-900 rounded-2xl p-3 border border-gray-100 dark:border-slate-800 shadow-sm transition-colors">
                        <div class="w-8 h-8 rounded-lg bg-blue-50 dark:bg-blue-500/10 flex items-center justify-center mb-2">
                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <p class="text-[10px] text-gray-400 dark:text-slate-500 font-medium uppercase tracking-wider">
                            <span data-lang="id">Paket</span><span data-lang="en" class="hidden">Package</span>
                        </p>
                        <p class="text-sm font-bold text-gray-900 dark:text-white mt-0.5 truncate">{{ $pelanggan->paket }}</p>
                    </div>
                    <!-- Tagihan -->
                    <div class="bg-white dark:bg-slate-900 rounded-2xl p-3 border border-gray-100 dark:border-slate-800 shadow-sm transition-colors">
                        <div class="w-8 h-8 rounded-lg bg-amber-50 dark:bg-amber-500/10 flex items-center justify-center mb-2">
                            <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <p class="text-[10px] text-gray-400 dark:text-slate-500 font-medium uppercase tracking-wider">
                            <span data-lang="id">Tagihan</span><span data-lang="en" class="hidden">Bill</span>
                        </p>
                        <p class="text-sm font-bold text-gray-900 dark:text-white mt-0.5">Rp{{ number_format($pelanggan->tagihan, 0, ',', '.') }}</p>
                    </div>
                    <!-- Tanggal -->
                    <div class="bg-white dark:bg-slate-900 rounded-2xl p-3 border border-gray-100 dark:border-slate-800 shadow-sm transition-colors">
                        <div class="w-8 h-8 rounded-lg bg-violet-50 dark:bg-violet-500/10 flex items-center justify-center mb-2">
                            <svg class="w-4 h-4 text-violet-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <p class="text-[10px] text-gray-400 dark:text-slate-500 font-medium uppercase tracking-wider">
                            @if($pelanggan->status === 'sudah_bayar')
                                <span data-lang="id">Tgl Bayar</span><span data-lang="en" class="hidden">Paid On</span>
                            @else
                                <span data-lang="id">Jatuh Tempo</span><span data-lang="en" class="hidden">Due Date</span>
                            @endif
                        </p>
                        <p class="text-sm font-bold text-gray-900 dark:text-white mt-0.5">
                            @if($pelanggan->status === 'sudah_bayar' && $pelanggan->tanggal_bayar)
                                {{ $pelanggan->tanggal_bayar->format('d M') }}
                            @else
                                20 {{ now()->translatedFormat('M') }}
                            @endif
                        </p>
                    </div>
                </div>

                <!-- QUICK ACTIONS -->
                <div class="animate-fade-up-4">
                    <h3 class="text-sm font-bold text-gray-900 dark:text-white mb-3">
                        <span data-lang="id">Menu Cepat</span><span data-lang="en" class="hidden">Quick Actions</span>
                    </h3>
                    <div class="grid grid-cols-5 gap-2.5">
                        <a href="{{ route('profile.index') }}" class="touch-scale bg-white dark:bg-slate-900 rounded-2xl p-3 border border-gray-100 dark:border-slate-800 flex flex-col items-center gap-2 shadow-sm transition-colors">
                            <div class="w-10 h-10 rounded-xl bg-teal-50 dark:bg-teal-500/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                            </div>
                            <span class="text-[10px] font-semibold text-gray-600 dark:text-slate-400">
                                <span data-lang="id">Profil</span><span data-lang="en" class="hidden">Profile</span>
                            </span>
                        </a>
                        <a href="/pengaduan" class="touch-scale bg-white dark:bg-slate-900 rounded-2xl p-3 border border-gray-100 dark:border-slate-800 flex flex-col items-center gap-2 shadow-sm transition-colors">
                            <div class="w-10 h-10 rounded-xl bg-rose-50 dark:bg-rose-500/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4.5c-.77-.833-2.694-.833-3.464 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z" /></svg>
                            </div>
                            <span class="text-[10px] font-semibold text-gray-600 dark:text-slate-400">
                                <span data-lang="id">Lapor</span><span data-lang="en" class="hidden">Report</span>
                            </span>
                        </a>
                        <a href="/kontak" class="touch-scale bg-white dark:bg-slate-900 rounded-2xl p-3 border border-gray-100 dark:border-slate-800 flex flex-col items-center gap-2 shadow-sm transition-colors">
                            <div class="w-10 h-10 rounded-xl bg-blue-50 dark:bg-blue-500/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                            </div>
                            <span class="text-[10px] font-semibold text-gray-600 dark:text-slate-400">
                                <span data-lang="id">Kontak</span><span data-lang="en" class="hidden">Contact</span>
                            </span>
                        </a>
                        <a href="/paket" class="touch-scale bg-white dark:bg-slate-900 rounded-2xl p-3 border border-gray-100 dark:border-slate-800 flex flex-col items-center gap-2 shadow-sm transition-colors">
                            <div class="w-10 h-10 rounded-xl bg-indigo-50 dark:bg-indigo-500/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                            </div>
                            <span class="text-[10px] font-semibold text-gray-600 dark:text-slate-400">
                                <span data-lang="id">Paket</span><span data-lang="en" class="hidden">Plan</span>
                            </span>
                        </a>
                        <a href="{{ route('logout') }}" class="touch-scale bg-white dark:bg-slate-900 rounded-2xl p-3 border border-gray-100 dark:border-slate-800 flex flex-col items-center gap-2 shadow-sm transition-colors">
                            <div class="w-10 h-10 rounded-xl bg-red-50 dark:bg-red-500/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                            </div>
                            <span class="text-[10px] font-semibold text-red-500 dark:text-red-400">
                                <span data-lang="id">Keluar</span><span data-lang="en" class="hidden">Logout</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- === RIGHT COLUMN === -->
            <div class="lg:w-[380px] space-y-4">

                <!-- PAYMENT SECTION (if unpaid) -->
                @if($pelanggan->status === 'belum_bayar')
                <div class="animate-fade-up-3 bg-white dark:bg-slate-900 rounded-3xl p-5 border border-gray-100 dark:border-slate-800 shadow-sm transition-colors">
                    <h3 class="text-base font-bold text-gray-900 dark:text-white mb-1">
                        <span data-lang="id">Pembayaran</span><span data-lang="en" class="hidden">Payment</span>
                    </h3>
                    <p class="text-xs text-gray-400 dark:text-slate-500 mb-4">
                        <span data-lang="id">Pilih metode dan bayar dengan aman</span>
                        <span data-lang="en" class="hidden">Choose a method and pay securely</span>
                    </p>

                    @if(isset($gateway) && $gateway === 'tripay')
                    <form action="{{ route('payment.tripay.create') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-3 gap-2 mb-4 max-h-48 overflow-y-auto no-scrollbar p-0.5">
                            @forelse($paymentChannels as $channel)
                                <label class="cursor-pointer touch-scale">
                                    <input type="radio" name="method" value="{{ $channel['code'] }}" class="peer sr-only" required>
                                    <div class="rounded-xl border-2 border-gray-100 dark:border-slate-700 bg-white dark:bg-slate-800 p-2.5 peer-checked:border-blue-500 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-500/10 peer-checked:shadow-md transition-all flex flex-col items-center gap-1.5 min-h-[72px] justify-center">
                                        @if(isset($channel['icon_url']))
                                            <img src="{{ $channel['icon_url'] }}" alt="{{ $channel['name'] }}" class="h-6 object-contain">
                                        @endif
                                        <span class="text-[10px] font-medium text-gray-500 dark:text-slate-400 text-center leading-tight">{{ $channel['name'] }}</span>
                                    </div>
                                </label>
                            @empty
                                <div class="col-span-3 text-center text-xs text-gray-400 p-6 border-2 border-dashed border-gray-200 dark:border-slate-700 rounded-xl">
                                    <span data-lang="id">Metode pembayaran belum tersedia</span>
                                    <span data-lang="en" class="hidden">Payment methods unavailable</span>
                                </div>
                            @endforelse
                        </div>
                        <div class="flex gap-2">
                            <button type="submit" class="touch-scale flex-1 bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-3.5 rounded-2xl font-bold text-sm shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 transition-all active:scale-[0.97]">
                                <span data-lang="id">Bayar Sekarang</span><span data-lang="en" class="hidden">Pay Now</span>
                            </button>
                            <button type="button" id="check-status-button" class="touch-scale w-14 bg-gray-100 dark:bg-slate-800 rounded-2xl flex items-center justify-center border border-gray-200 dark:border-slate-700 transition-colors">
                                <svg class="w-5 h-5 text-gray-500 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                            </button>
                        </div>
                    </form>
                    @else
                    <div class="flex gap-2">
                        <button id="pay-button" class="touch-scale flex-1 bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-3.5 rounded-2xl font-bold text-sm shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 transition-all flex items-center justify-center gap-2 active:scale-[0.97]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            <span data-lang="id">Bayar via {{ isset($gateway) && $gateway === 'doku' ? 'Doku' : 'Midtrans' }}</span>
                            <span data-lang="en" class="hidden">Pay via {{ isset($gateway) && $gateway === 'doku' ? 'Doku' : 'Midtrans' }}</span>
                        </button>
                        <button id="check-status-button" class="touch-scale w-14 bg-gray-100 dark:bg-slate-800 rounded-2xl flex items-center justify-center border border-gray-200 dark:border-slate-700 transition-colors">
                            <svg class="w-5 h-5 text-gray-500 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        </button>
                    </div>
                    @endif

                    <!-- Payment logos -->
                    <div class="mt-4 flex justify-center items-center gap-4 flex-wrap opacity-40 dark:opacity-30">
                        <img src="{{ asset('images/qris.png') }}" class="h-5 object-contain mix-blend-multiply dark:mix-blend-normal dark:brightness-200" alt="QRIS">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/72/Logo_dana_blue.svg" class="h-5 object-contain dark:brightness-200" alt="DANA">
                        <img src="{{ asset('images/ovo.png') }}" class="h-5 object-contain dark:brightness-200" alt="OVO">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/86/Gopay_logo.svg" class="h-5 object-contain dark:brightness-200" alt="GoPay">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg" class="h-5 object-contain dark:brightness-200" alt="BCA">
                    </div>

                    <p class="text-[10px] text-gray-400 text-center mt-3">
                        <span data-lang="id">*Pembayaran diverifikasi otomatis. Tekan 🔄 jika sudah bayar.</span>
                        <span data-lang="en" class="hidden">*Payment is verified automatically. Tap 🔄 if you have paid.</span>
                    </p>
                </div>
                @endif

                <!-- PAYMENT HISTORY (Card-based) -->
                <div class="animate-fade-up-5">
                    <h3 class="text-sm font-bold text-gray-900 dark:text-white mb-3">
                        <span data-lang="id">Riwayat Pembayaran</span><span data-lang="en" class="hidden">Payment History</span>
                    </h3>

                    @if($pelanggan->tanggal_bayar)
                    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-gray-100 dark:border-slate-800 shadow-sm overflow-hidden transition-colors">
                        <div class="p-4 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-emerald-50 dark:bg-emerald-500/10 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-gray-900 dark:text-white truncate">
                                    <span data-lang="id">Tagihan Internet ({{ $pelanggan->paket }})</span>
                                    <span data-lang="en" class="hidden">Internet Bill ({{ $pelanggan->paket }})</span>
                                </p>
                                <p class="text-xs text-gray-400 dark:text-slate-500 mt-0.5">
                                    {{ \Carbon\Carbon::parse($pelanggan->tanggal_bayar)->translatedFormat('d F Y') }}
                                </p>
                            </div>
                            <div class="text-right flex-shrink-0">
                                <p class="text-sm font-bold text-gray-900 dark:text-white">Rp{{ number_format($pelanggan->tagihan, 0, ',', '.') }}</p>
                                <span class="inline-flex items-center gap-1 bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 text-[10px] font-bold px-2 py-0.5 rounded-full mt-0.5">
                                    <span class="w-1 h-1 rounded-full bg-emerald-500"></span>
                                    <span data-lang="id">Lunas</span><span data-lang="en" class="hidden">Paid</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-gray-100 dark:border-slate-800 shadow-sm p-8 text-center transition-colors">
                        <div class="w-14 h-14 rounded-full bg-gray-100 dark:bg-slate-800 flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-gray-300 dark:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" /></svg>
                        </div>
                        <p class="text-sm text-gray-400 dark:text-slate-500 font-medium">
                            <span data-lang="id">Belum ada riwayat pembayaran</span>
                            <span data-lang="en" class="hidden">No payment history yet</span>
                        </p>
                    </div>
                    @endif
                </div>
            </div>

        </div>

        <!-- Spacer for bottom nav -->
        <div class="h-4 lg:hidden"></div>
    </main>

    <!-- FOOTER (Desktop Only) -->
    <div class="hidden lg:block mt-auto">
        @include('partials.footer')
    </div>

    <!-- BOTTOM NAVIGATION BAR (Mobile only) -->
    <nav class="fixed bottom-0 left-0 right-0 z-50 glass border-t border-gray-200/50 dark:border-slate-800/50 transition-colors lg:hidden" style="padding-bottom: env(safe-area-inset-bottom, 0px);">
        <div class="max-w-lg mx-auto flex items-center justify-around px-2 py-2">
            <a href="{{ route('customer.dashboard') }}" class="touch-scale flex flex-col items-center gap-1 px-3 py-1.5 nav-active">
                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                <span class="text-[10px] font-semibold text-blue-600 dark:text-blue-400">
                    <span data-lang="id">Beranda</span>
                    <span data-lang="en" class="hidden">Home</span>
                </span>
            </a>
            @if($pelanggan->status === 'belum_bayar')
            <button id="nav-pay-button" class="touch-scale -mt-5 w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl shadow-lg shadow-blue-500/30 flex items-center justify-center animate-bounce-gentle">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </button>
            @else
            <a href="/" class="touch-scale flex flex-col items-center gap-1 px-3 py-1.5">
                <svg class="w-5 h-5 text-gray-400 dark:text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" /></svg>
                <span class="text-[10px] font-medium text-gray-400 dark:text-slate-500">Web</span>
            </a>
            @endif
            <a href="/pengaduan" class="touch-scale flex flex-col items-center gap-1 px-3 py-1.5">
                <svg class="w-5 h-5 text-gray-400 dark:text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" /></svg>
                <span class="text-[10px] font-medium text-gray-400 dark:text-slate-500">
                    <span data-lang="id">Lapor</span>
                    <span data-lang="en" class="hidden">Report</span>
                </span>
            </a>
            <a href="{{ route('profile.index') }}" class="touch-scale flex flex-col items-center gap-1 px-3 py-1.5">
                <svg class="w-5 h-5 text-gray-400 dark:text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                <span class="text-[10px] font-medium text-gray-400 dark:text-slate-500">
                    <span data-lang="id">Profil</span>
                    <span data-lang="en" class="hidden">Profile</span>
                </span>
            </a>
            <a href="{{ route('logout') }}" class="touch-scale flex flex-col items-center gap-1 px-3 py-1.5">
                <svg class="w-5 h-5 text-red-400 dark:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                <span class="text-[10px] font-medium text-red-400 dark:text-red-500">
                    <span data-lang="id">Keluar</span>
                    <span data-lang="en" class="hidden">Logout</span>
                </span>
            </a>
        </div>
    </nav>

    <!-- SCRIPTS -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const html = document.documentElement;

            // ===== GREETING =====
            const hour = new Date().getHours();
            const greetEl = document.getElementById('greeting-text');
            const lang = localStorage.getItem('lang') || 'id';
            if (lang === 'en') {
                if (hour < 12) greetEl.textContent = 'Good Morning';
                else if (hour < 15) greetEl.textContent = 'Good Afternoon';
                else if (hour < 18) greetEl.textContent = 'Good Evening';
                else greetEl.textContent = 'Good Night';
            } else {
                if (hour < 12) greetEl.textContent = 'Selamat Pagi 🌅';
                else if (hour < 15) greetEl.textContent = 'Selamat Siang ☀️';
                else if (hour < 18) greetEl.textContent = 'Selamat Sore 🌇';
                else greetEl.textContent = 'Selamat Malam 🌙';
            }

            // ===== DARK MODE =====
            const themeBtn = document.getElementById('themeToggleBtn');
            const sunIcon = document.getElementById('sunIcon');
            const moonIcon = document.getElementById('moonIcon');

            function updateThemeIcons() {
                if (html.classList.contains('dark')) {
                    sunIcon.classList.remove('hidden');
                    moonIcon.classList.add('hidden');
                } else {
                    sunIcon.classList.add('hidden');
                    moonIcon.classList.remove('hidden');
                }
            }

            if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                html.classList.add('dark');
            }
            updateThemeIcons();

            themeBtn.addEventListener('click', () => {
                html.classList.toggle('dark');
                localStorage.setItem('theme', html.classList.contains('dark') ? 'dark' : 'light');
                updateThemeIcons();
            });

            // ===== LANGUAGE =====
            const langToggle = document.getElementById('langToggle');
            const langText = document.getElementById('langText');
            const idElements = document.querySelectorAll('[data-lang="id"]');
            const enElements = document.querySelectorAll('[data-lang="en"]');

            let currentLang = localStorage.getItem('lang') || 'id';

            function updateLang() {
                if(currentLang === 'en') {
                    idElements.forEach(el => el.classList.add('hidden'));
                    enElements.forEach(el => el.classList.remove('hidden'));
                    langText.textContent = 'ID';
                } else {
                    idElements.forEach(el => el.classList.remove('hidden'));
                    enElements.forEach(el => el.classList.add('hidden'));
                    langText.textContent = 'EN';
                }
            }

            updateLang();

            langToggle.addEventListener('click', () => {
                currentLang = currentLang === 'id' ? 'en' : 'id';
                localStorage.setItem('lang', currentLang);
                updateLang();
                // Update greeting on lang change
                const h = new Date().getHours();
                if (currentLang === 'en') {
                    if (h < 12) greetEl.textContent = 'Good Morning';
                    else if (h < 15) greetEl.textContent = 'Good Afternoon';
                    else if (h < 18) greetEl.textContent = 'Good Evening';
                    else greetEl.textContent = 'Good Night';
                } else {
                    if (h < 12) greetEl.textContent = 'Selamat Pagi 🌅';
                    else if (h < 15) greetEl.textContent = 'Selamat Siang ☀️';
                    else if (h < 18) greetEl.textContent = 'Selamat Sore 🌇';
                    else greetEl.textContent = 'Selamat Malam 🌙';
                }
            });

            // ===== NAV PAY BUTTON =====
            const navPayBtn = document.getElementById('nav-pay-button');
            if (navPayBtn) {
                navPayBtn.addEventListener('click', () => {
                    const paySection = document.getElementById('pay-button');
                    const tripayForm = document.querySelector('form[action*="tripay"]');
                    if (paySection) {
                        paySection.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        paySection.click();
                    } else if (tripayForm) {
                        tripayForm.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                });
            }
        });
    </script>

    @if($pelanggan->status === 'belum_bayar')
    <script type="text/javascript">
        @if(isset($gateway) && $gateway === 'doku' && isset($paymentUrl))
        document.getElementById('pay-button').onclick = function () {
            window.location.href = "{!! $paymentUrl !!}";
        };
        @elseif(isset($gateway) && $gateway === 'midtrans' && isset($snapToken))
        document.getElementById('pay-button').onclick = function () {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){
                    window.location.href = "{{ route('payment.success') }}?order_id=" + result.order_id;
                },
                onPending: function(result){
                    window.location.href = "{{ route('payment.pending') }}";
                },
                onError: function(result){
                    alert(localStorage.getItem('lang') === 'en' ? "Payment failed!" : "Pembayaran gagal!");
                },
                onClose: function(){
                    window.location.href = "{{ route('payment.pending') }}";
                }
            });
        };
        @endif

        // Status checking
        const checkStatusUrl = "{{ route('payment.status') }}";

        document.getElementById('check-status-button').onclick = function() {
            const btn = this;
            const originalHTML = btn.innerHTML;
            btn.innerHTML = '<svg class="w-5 h-5 animate-spin text-blue-500" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>';
            btn.disabled = true;

            fetch(checkStatusUrl)
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'sudah_bayar') {
                        alert(localStorage.getItem('lang') === 'en' ? "Payment Successful! Your bill is paid." : "Pembayaran Berhasil! Tagihan sudah lunas.");
                        window.location.reload();
                    } else {
                        alert(localStorage.getItem('lang') === 'en' ? "Payment not yet successful or still pending." : "Pembayaran belum berhasil atau masih menunggu konfirmasi.");
                        btn.innerHTML = originalHTML;
                        btn.disabled = false;
                    }
                })
                .catch(err => {
                    console.error('Error fetching status', err);
                    btn.innerHTML = originalHTML;
                    btn.disabled = false;
                });
        };

        // Auto polling every 5 seconds
        setInterval(function() {
            fetch(checkStatusUrl)
                .then(res => res.json())
                .then(data => {
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