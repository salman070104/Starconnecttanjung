<!DOCTYPE html>
<html lang="id">
<script>
    // BLOCKING: Apply theme & language BEFORE any rendering to prevent FOUC
    (function() {
        var theme = localStorage.getItem('theme');
        var isDark = theme === 'dark' || (!theme && window.matchMedia('(prefers-color-scheme: dark)').matches);
        if (isDark) {
            document.documentElement.classList.add('dark');
        }
        var lang = localStorage.getItem('lang') || 'id';
        var hideLang = lang === 'en' ? 'id' : 'en';
        var showLang = lang;
        var style = document.createElement('style');
        style.id = 'fouc-lang-fix';
        var css = '[data-lang="' + hideLang + '"] { display: none !important; } [data-lang="' + showLang + '"] { display: inline !important; }';
        if (isDark) {
            css += ' #themeToggleCheckbox ~ div { background-color: rgb(59 130 246) !important; }';
            css += ' #themeToggleCheckbox ~ div::after { transform: translateX(100%) !important; border-color: white !important; }';
        }
        style.textContent = css;
        document.head.appendChild(style);
    })();
</script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') - StarConnect</title>

    <!-- PWA Meta Tags -->
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#0d9488">
    <link rel="apple-touch-icon" href="{{ asset('images/icons/icon-192x192.png') }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="StarConnect">

    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

        /* Sidebar link animation */
        .sidebar-link {
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .sidebar-link::before {
            content: '';
            position: absolute;
            left: 0; top: 0;
            width: 4px; height: 100%;
            background: white;
            border-radius: 0 4px 4px 0;
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }
        .sidebar-link.active::before,
        .sidebar-link:hover::before { transform: scaleY(1); }

        /* Card hover effect */
        .stat-card { transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
        .stat-card:hover { transform: translateY(-6px); box-shadow: 0 20px 40px -12px rgba(0,0,0,0.15); }

        /* Fade in animation */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fadeInUp 0.5s ease-out forwards; }
        .animate-fade-in-delay-1 { animation: fadeInUp 0.5s ease-out 0.1s forwards; opacity: 0; }
        .animate-fade-in-delay-2 { animation: fadeInUp 0.5s ease-out 0.2s forwards; opacity: 0; }
        .animate-fade-in-delay-3 { animation: fadeInUp 0.5s ease-out 0.3s forwards; opacity: 0; }

        /* Pulse dot animation */
        @keyframes pulse-dot {
            0%, 100% { transform: scale(1); opacity: 1; }
            50%       { transform: scale(1.5); opacity: 0.5; }
        }
        .pulse-dot { animation: pulse-dot 2s infinite; }

        /* Table row hover */
        .table-row { transition: all 0.2s ease; }
        .table-row:hover { background: #f8fafc; }
        .dark .table-row:hover { background: rgb(30 41 59 / 0.5); }

        /* Mobile sidebar transition */
        #sidebar {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        #sidebar-overlay {
            transition: opacity 0.3s ease;
        }

        /* Card view for mobile tables */
        @media (max-width: 767px) {
            .mobile-card-table thead { display: none; }
            .mobile-card-table tbody tr {
                display: block;
                background: #fff;
                border: 1px solid #f1f5f9;
                border-radius: 16px;
                margin-bottom: 12px;
                padding: 16px;
                box-shadow: 0 1px 4px rgba(0,0,0,0.06);
            }
            .mobile-card-table tbody td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 6px 0;
                border: none;
                font-size: 0.875rem;
            }
            .mobile-card-table tbody td::before {
                content: attr(data-label);
                font-weight: 600;
                color: #94a3b8;
                font-size: 0.7rem;
                text-transform: uppercase;
                letter-spacing: 0.05em;
                margin-right: 12px;
                min-width: 100px;
            }
            .mobile-card-table tbody td:first-child { display: none; }
        }
    </style>
</head>

<body class="bg-white dark:bg-gray-900 transition-colors duration-300">

    <!-- SIDEBAR OVERLAY (Mobile) -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden opacity-0" onclick="closeSidebar()"></div>

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside id="sidebar" class="w-[280px] bg-gray-800 dark:bg-gray-950 text-white flex flex-col fixed h-screen z-50
            -translate-x-full lg:translate-x-0 transition-all duration-300 border-r border-gray-700/50 dark:border-gray-800">

            <!-- Logo Area -->
            <div class="p-7 border-b border-gray-700/50 dark:border-gray-800/50">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-xl bg-white flex items-center justify-center shadow-md overflow-hidden shrink-0 p-1.5">
                        <img src="{{ asset('logo.png') }}" alt="StarConnect Logo" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h1 class="text-lg font-bold tracking-tight">StarConnect</h1>
                        <p class="text-[11px] text-gray-400 font-medium tracking-wider uppercase">
                            <span data-lang="id">Admin Panel</span>
                            <span data-lang="en" class="hidden">Admin Panel</span>
                        </p>
                    </div>
                    <!-- Close button for mobile -->
                    <button onclick="closeSidebar()" class="ml-auto lg:hidden text-gray-400 hover:text-white p-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-5 overflow-y-auto">

                {{-- Group: Overview --}}
                <p class="text-[11px] text-gray-500 font-semibold uppercase tracking-widest mb-3 px-4">
                    <span data-lang="id">Overview</span>
                    <span data-lang="en" class="hidden">Overview</span>
                </p>

                <div class="space-y-1 mb-2">
                    <a href="{{ route('admin.dashboard') }}" onclick="closeSidebar()"
                        class="sidebar-link flex items-center gap-3.5 px-4 py-3 rounded-xl text-sm font-medium
                        {{ request()->routeIs('admin.dashboard') ? 'active bg-gray-700/80 dark:bg-gray-800/80 text-white' : 'text-gray-400 hover:bg-gray-700/40 dark:hover:bg-gray-800/40 hover:text-white' }}">
                        <div class="w-9 h-9 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-blue-500/20' : 'bg-gray-700 dark:bg-gray-800' }} flex items-center justify-center">
                            <svg class="w-[18px] h-[18px] {{ request()->routeIs('admin.dashboard') ? 'text-blue-400' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                        </div>
                        <span>
                            <span data-lang="id">Dashboard</span>
                            <span data-lang="en" class="hidden">Dashboard</span>
                        </span>
                    </a>
                </div>

                {{-- Divider --}}
                <div class="my-4 mx-4 border-t border-gray-700/50 dark:border-gray-700/30"></div>

                {{-- Group: Data Pelanggan --}}
                <p class="text-[11px] text-gray-500 font-semibold uppercase tracking-widest mb-3 px-4">
                    <span data-lang="id">Data Pelanggan</span>
                    <span data-lang="en" class="hidden">Customer Data</span>
                </p>

                <div class="space-y-1 mb-2">
                    <a href="{{ route('admin.pelanggan.index') }}" onclick="closeSidebar()"
                        class="sidebar-link flex items-center gap-3.5 px-4 py-3 rounded-xl text-sm font-medium
                        {{ request()->routeIs('admin.pelanggan.*') ? 'active bg-gray-700/80 dark:bg-gray-800/80 text-white' : 'text-gray-400 hover:bg-gray-700/40 dark:hover:bg-gray-800/40 hover:text-white' }}">
                        <div class="w-9 h-9 rounded-lg {{ request()->routeIs('admin.pelanggan.*') ? 'bg-emerald-500/20' : 'bg-gray-700 dark:bg-gray-800' }} flex items-center justify-center">
                            <svg class="w-[18px] h-[18px] {{ request()->routeIs('admin.pelanggan.*') ? 'text-emerald-400' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <span>
                            <span data-lang="id">Database Pelanggan</span>
                            <span data-lang="en" class="hidden">Customer Database</span>
                        </span>
                    </a>

                    <a href="{{ route('admin.riwayat') }}" onclick="closeSidebar()"
                        class="sidebar-link flex items-center gap-3.5 px-4 py-3 rounded-xl text-sm font-medium
                        {{ request()->routeIs('admin.riwayat') ? 'active bg-gray-700/80 dark:bg-gray-800/80 text-white' : 'text-gray-400 hover:bg-gray-700/40 dark:hover:bg-gray-800/40 hover:text-white' }}">
                        <div class="w-9 h-9 rounded-lg {{ request()->routeIs('admin.riwayat') ? 'bg-purple-500/20' : 'bg-gray-700 dark:bg-gray-800' }} flex items-center justify-center">
                            <svg class="w-[18px] h-[18px] {{ request()->routeIs('admin.riwayat') ? 'text-purple-400' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                        </div>
                        <span>
                            <span data-lang="id">Riwayat Pembayaran</span>
                            <span data-lang="en" class="hidden">Payment History</span>
                        </span>
                    </a>

                    <a href="{{ route('admin.invoice.index') }}" onclick="closeSidebar()"
                        class="sidebar-link flex items-center gap-3.5 px-4 py-3 rounded-xl text-sm font-medium
                        {{ request()->routeIs('admin.invoice*') ? 'active bg-gray-700/80 dark:bg-gray-800/80 text-white' : 'text-gray-400 hover:bg-gray-700/40 dark:hover:bg-gray-800/40 hover:text-white' }}">
                        <div class="w-9 h-9 rounded-lg {{ request()->routeIs('admin.invoice*') ? 'bg-cyan-500/20' : 'bg-gray-700 dark:bg-gray-800' }} flex items-center justify-center">
                            <svg class="w-[18px] h-[18px] {{ request()->routeIs('admin.invoice*') ? 'text-cyan-400' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <span>
                            <span data-lang="id">Invoice</span>
                            <span data-lang="en" class="hidden">Invoice</span>
                        </span>
                    </a>
                </div>

                {{-- Divider --}}
                <div class="my-4 mx-4 border-t border-gray-700/50 dark:border-gray-700/30"></div>

                {{-- Group: Operasional --}}
                <p class="text-[11px] text-gray-500 font-semibold uppercase tracking-widest mb-3 px-4">
                    <span data-lang="id">Operasional</span>
                    <span data-lang="en" class="hidden">Operations</span>
                </p>

                <div class="space-y-1 mb-2">
                    <a href="{{ route('admin.laporan-gangguan') }}" onclick="closeSidebar()"
                        class="sidebar-link flex items-center gap-3.5 px-4 py-3 rounded-xl text-sm font-medium
                        {{ request()->routeIs('admin.laporan-gangguan') ? 'active bg-gray-700/80 dark:bg-gray-800/80 text-white' : 'text-gray-400 hover:bg-gray-700/40 dark:hover:bg-gray-800/40 hover:text-white' }}">
                        <div class="w-9 h-9 rounded-lg {{ request()->routeIs('admin.laporan-gangguan') ? 'bg-orange-500/20' : 'bg-gray-700 dark:bg-gray-800' }} flex items-center justify-center">
                            <svg class="w-[18px] h-[18px] {{ request()->routeIs('admin.laporan-gangguan') ? 'text-orange-400' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <span>
                            <span data-lang="id">Laporan Gangguan</span>
                            <span data-lang="en" class="hidden">Fault Reports</span>
                        </span>
                        @php $jumlahBaru = \App\Models\LaporanGangguan::where('status','baru')->count(); @endphp
                        @if($jumlahBaru > 0)
                            <span class="ml-auto bg-red-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">{{ $jumlahBaru }}</span>
                        @endif
                    </a>

                    <a href="{{ route('admin.whatsapp') }}" onclick="closeSidebar()"
                        class="sidebar-link flex items-center gap-3.5 px-4 py-3 rounded-xl text-sm font-medium
                        {{ request()->routeIs('admin.whatsapp') ? 'active bg-gray-700/80 dark:bg-gray-800/80 text-white' : 'text-gray-400 hover:bg-gray-700/40 dark:hover:bg-gray-800/40 hover:text-white' }}">
                        <div class="w-9 h-9 rounded-lg {{ request()->routeIs('admin.whatsapp') ? 'bg-green-500/20' : 'bg-gray-700 dark:bg-gray-800' }} flex items-center justify-center">
                            <svg class="w-[18px] h-[18px] {{ request()->routeIs('admin.whatsapp') ? 'text-green-400' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                        </div>
                        <span>
                            <span data-lang="id">WhatsApp API</span>
                            <span data-lang="en" class="hidden">WhatsApp API</span>
                        </span>
                        @php $pushNotifStatus = \App\Models\Setting::get('whatsapp_push_notification', '0'); @endphp
                        @if($pushNotifStatus === '1')
                            <span class="ml-auto flex h-2 w-2 relative">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                            </span>
                        @endif
                    </a>
                </div>

                {{-- Divider --}}
                <div class="my-4 mx-4 border-t border-gray-700/50 dark:border-gray-700/30"></div>

                {{-- Group: Pengaturan --}}
                <p class="text-[11px] text-gray-500 font-semibold uppercase tracking-widest mb-3 px-4">
                    <span data-lang="id">Pengaturan</span>
                    <span data-lang="en" class="hidden">Settings</span>
                </p>

                <div class="space-y-1">
                    <a href="{{ route('admin.accounts.index') }}" onclick="closeSidebar()"
                        class="sidebar-link flex items-center gap-3.5 px-4 py-3 rounded-xl text-sm font-medium
                        {{ request()->routeIs('admin.accounts.*') ? 'active bg-gray-700/80 dark:bg-gray-800/80 text-white' : 'text-gray-400 hover:bg-gray-700/40 dark:hover:bg-gray-800/40 hover:text-white' }}">
                        <div class="w-9 h-9 rounded-lg {{ request()->routeIs('admin.accounts.*') ? 'bg-blue-500/20' : 'bg-gray-700 dark:bg-gray-800' }} flex items-center justify-center">
                            <svg class="w-[18px] h-[18px] {{ request()->routeIs('admin.accounts.*') ? 'text-blue-400' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <span>
                            <span data-lang="id">Kelola Akun</span>
                            <span data-lang="en" class="hidden">Manage Accounts</span>
                        </span>
                    </a>
                </div>

            </nav>


            <!-- Bottom section -->
            <div class="p-5 border-t border-gray-700/50 dark:border-gray-800/50">
                <div class="flex items-center justify-between px-4 py-3">
                    <div class="flex items-center gap-3">
                        @php
                            $adminUser = \App\Models\Admin::find(Session::get('admin_id'));
                        @endphp
                        <div class="w-8 h-8 rounded-full bg-slate-200 dark:bg-slate-700 overflow-hidden flex items-center justify-center text-slate-400 dark:text-slate-500 p-1">
                            <svg class="w-full h-full" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" /></svg>
                        </div>
                        <div class="max-w-[120px] overflow-hidden">
                            <p class="text-sm font-semibold truncate text-white" title="{{ Session::get('admin_name', 'Admin') }}">
                                {{ Session::get('admin_name', 'Admin') }}
                            </p>
                            <div class="flex items-center gap-1.5">
                                <div class="w-2 h-2 rounded-full bg-emerald-400 pulse-dot"></div>
                                <p class="text-[11px] text-gray-400">Online</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <a href="{{ route('profile.index') }}" title="Pengaturan Akun" class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 hover:text-teal-400 hover:bg-gray-700/50 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </a>
                        <a href="{{ route('logout') }}" title="Log Out" class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 hover:text-red-400 hover:bg-gray-700/50 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </a>
                </div>
            </div>

        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1 lg:ml-[280px] min-h-screen bg-gray-50/50 dark:bg-gray-900 transition-colors duration-300">

            <!-- Top Bar -->
            <header class="sticky top-0 z-40 bg-white/80 dark:bg-gray-900/80 backdrop-blur-xl border-b border-gray-100 dark:border-gray-800 transition-colors duration-300">
                <div class="flex justify-between items-center px-4 sm:px-8 py-4">
                    <div class="flex items-center gap-3">
                        <!-- Hamburger for mobile -->
                        <button onclick="openSidebar()" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-400 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>
                        <div>
                            <h1 class="text-lg sm:text-xl font-bold text-gray-800 dark:text-white">@yield('page-title', 'Dashboard')</h1>
                            <p class="text-xs sm:text-sm text-gray-400 mt-0.5 hidden sm:block">@yield('page-subtitle', 'Monitoring pembayaran pelanggan')</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <!-- Translate Toggle -->
                        <button id="langToggle" class="text-gray-400 hover:text-gray-800 dark:hover:text-white transition-colors flex items-center justify-center text-xs font-bold border border-gray-200 dark:border-gray-700 rounded-full w-8 h-8">
                            <span data-lang="id">ID</span>
                            <span data-lang="en">EN</span>
                        </button>

                        <!-- Dark Mode Sliding Toggle -->
                        <label for="themeToggleCheckbox" class="relative inline-flex items-center cursor-pointer group">
                            <input type="checkbox" id="themeToggleCheckbox" class="sr-only peer">
                            <div class="w-14 h-7 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:bg-slate-700 peer-checked:bg-blue-500 shadow-inner flex items-center justify-between px-1.5">
                                <svg class="w-3.5 h-3.5 text-slate-400 dark:text-slate-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                                </svg>
                                <svg class="w-3.5 h-3.5 text-yellow-500 dark:text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                        </label>

                        <div class="text-right hidden sm:block">
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-300">{{ now()->translatedFormat('l, d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-4 sm:p-6 lg:p-8">
                @yield('content')
            </div>

        </main>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Theme Toggle — sync checkbox state with head script
            const themeToggleCheckbox = document.getElementById('themeToggleCheckbox');
            const html = document.documentElement;

            if (themeToggleCheckbox) {
                themeToggleCheckbox.checked = html.classList.contains('dark');
                themeToggleCheckbox.addEventListener('change', (e) => {
                    if (e.target.checked) {
                        html.classList.add('dark');
                        localStorage.setItem('theme', 'dark');
                    } else {
                        html.classList.remove('dark');
                        localStorage.setItem('theme', 'light');
                    }
                });
            }

            // Translation Toggle — wire click
            const langToggle = document.getElementById('langToggle');
            let currentLang = localStorage.getItem('lang') || 'id';

            // Remove the FOUC-prevention style tag now that DOM is ready
            const foucFix = document.getElementById('fouc-lang-fix');
            if (foucFix) foucFix.remove();

            function updateLanguage(lang) {
                document.querySelectorAll('[data-lang="id"]').forEach(el => {
                    lang === 'id' ? el.classList.remove('hidden') : el.classList.add('hidden');
                });
                document.querySelectorAll('[data-lang="en"]').forEach(el => {
                    lang === 'en' ? el.classList.remove('hidden') : el.classList.add('hidden');
                });
            }

            updateLanguage(currentLang);

            if (langToggle) {
                langToggle.addEventListener('click', () => {
                    currentLang = currentLang === 'id' ? 'en' : 'id';
                    localStorage.setItem('lang', currentLang);
                    updateLanguage(currentLang);
                });
            }
        });

        function openSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
            setTimeout(() => overlay.classList.remove('opacity-0'), 10);
        }
        function closeSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('opacity-0');
            setTimeout(() => overlay.classList.add('hidden'), 300);
        }
        function togglePasswordVisibility(inputId, button) {
            const input = document.getElementById(inputId);
            if (input.type === 'password') {
                input.type = 'text';
                button.innerHTML = `
                    <svg class="w-5 h-5 text-gray-400 dark:text-gray-500 hover:text-gray-600 dark:hover:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                    </svg>
                `;
            } else {
                input.type = 'password';
                button.innerHTML = `
                    <svg class="w-5 h-5 text-gray-400 dark:text-gray-500 hover:text-gray-600 dark:hover:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                `;
            }
        }
    </script>

    @yield('scripts')

    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js').then(registration => {
                    console.log('ServiceWorker registration successful');
                }).catch(err => {
                    console.log('ServiceWorker registration failed: ', err);
                });
            });
        }
    </script>
</body>

</html>
