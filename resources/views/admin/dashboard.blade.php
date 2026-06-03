@extends('admin.layouts.app')

@section('page-title') <span data-lang="id">Dashboard</span><span data-lang="en" class="hidden">Dashboard</span> @endsection
@section('page-subtitle') <span data-lang="id">Monitoring pembayaran pelanggan internet</span><span data-lang="en" class="hidden">Internet customer payment monitoring</span> @endsection

@section('content')

    {{-- Success Alert --}}
    @if (session('success'))
        <div id="alert-success"
            class="mb-6 flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-700 px-5 py-4 rounded-2xl animate-fade-in">
            <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span class="text-sm font-medium">{{ session('success') }}</span>
            <button onclick="document.getElementById('alert-success').remove()" class="ml-auto text-emerald-600 hover:text-emerald-800 dark:text-emerald-400 dark:hover:text-emerald-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif

    {{-- Stat Cards Layout --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-8 items-stretch">

        {{-- Kolom Kiri: Stats & Profit --}}
        <div class="lg:col-span-2 flex flex-col gap-4 sm:gap-6">
            
            {{-- Row Atas: Belum Bayar & Sudah Bayar --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                {{-- Belum Bayar --}}
                <div class="stat-card bg-white dark:bg-gray-800 rounded-2xl p-5 sm:p-6 border border-gray-100 dark:border-gray-700 shadow-sm animate-fade-in-delay-1 flex flex-col justify-between transition-colors duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-400 tracking-wide">
                                <span data-lang="id">Belum Bayar</span>
                                <span data-lang="en" class="hidden">Unpaid</span>
                            </p>
                            <h2 class="text-3xl sm:text-4xl font-extrabold text-blue-600 dark:text-blue-400 mt-2">{{ $belumBayar }}</h2>
                            <p class="text-xs text-gray-400 mt-2">
                                <span data-lang="id">Pelanggan menunggak</span>
                                <span data-lang="en" class="hidden">Customers in arrears</span>
                            </p>
                        </div>
                        <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center shadow-lg shadow-blue-500/30 shrink-0">
                            <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 h-1.5 bg-blue-100 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-blue-500 to-blue-600 rounded-full"
                            style="width: {{ $belumBayar + $sudahBayar > 0 ? ($belumBayar / ($belumBayar + $sudahBayar)) * 100 : 0 }}%"></div>
                    </div>
                </div>

                {{-- Sudah Bayar --}}
                <div class="stat-card bg-white dark:bg-gray-800 rounded-2xl p-5 sm:p-6 border border-gray-100 dark:border-gray-700 shadow-sm animate-fade-in-delay-2 flex flex-col justify-between transition-colors duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-400 tracking-wide">
                                <span data-lang="id">Sudah Bayar</span>
                                <span data-lang="en" class="hidden">Paid</span>
                            </p>
                            <h2 class="text-3xl sm:text-4xl font-extrabold text-emerald-600 dark:text-emerald-400 mt-2">{{ $sudahBayar }}</h2>
                            <p class="text-xs text-gray-400 mt-2">
                                <span data-lang="id">Pelanggan lunas</span>
                                <span data-lang="en" class="hidden">Paid customers</span>
                            </p>
                        </div>
                        <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-gradient-to-br from-emerald-500 to-emerald-600 flex items-center justify-center shadow-lg shadow-emerald-500/30 shrink-0">
                            <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 h-1.5 bg-emerald-100 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-full"
                            style="width: {{ $belumBayar + $sudahBayar > 0 ? ($sudahBayar / ($belumBayar + $sudahBayar)) * 100 : 0 }}%"></div>
                    </div>
                </div>
            </div>

            {{-- Row Bawah: Monthly Profit (Memanjang) --}}
            <div class="stat-card bg-white dark:bg-gray-800 rounded-2xl p-5 sm:p-6 border border-gray-100 dark:border-gray-700 shadow-sm animate-fade-in-delay-3 flex-1 flex flex-col justify-center transition-colors duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-400 tracking-wide">Monthly Profit</p>
                        <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-teal-600 dark:text-teal-400 mt-2">
                            Rp{{ number_format($totalPendapatan, 0, ',', '.') }}
                        </h2>
                        <p class="text-xs text-gray-400 mt-2">
                            <span data-lang="id">Total pendapatan dari pelanggan yang sudah lunas bulan ini</span>
                            <span data-lang="en" class="hidden">Total revenue from paid customers this month</span>
                        </p>
                    </div>
                    <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-gradient-to-br from-teal-500 to-emerald-500 flex items-center justify-center shadow-lg shadow-teal-500/30 shrink-0">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 h-1.5 bg-teal-100 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-teal-500 to-emerald-500 rounded-full" style="width: 100%"></div>
                </div>
            </div>

        </div>

        {{-- Kolom Kanan: Grafik Pembayaran (Sejajar dengan kotak-kotak di kiri) --}}
        <div class="stat-card bg-white dark:bg-gray-800 rounded-2xl p-5 sm:p-6 border border-gray-100 dark:border-gray-700 shadow-sm animate-fade-in-delay-3 lg:col-span-1 flex flex-col h-full transition-colors duration-300">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm font-medium text-gray-400 tracking-wide">
                        <span data-lang="id">Grafik Pembayaran</span>
                        <span data-lang="en" class="hidden">Payment Chart</span>
                    </p>
                    <p class="text-xs text-gray-400 mt-1">
                        <span data-lang="id">Lunas vs Belum Lunas</span>
                        <span data-lang="en" class="hidden">Paid vs Unpaid</span>
                    </p>
                </div>
            </div>
            <div class="relative w-full flex-1 flex justify-center items-center" style="min-height: 200px;">
                <canvas id="paymentChart"></canvas>
            </div>
        </div>

    </div>

    {{-- Data Table --}}
    <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm animate-fade-in-delay-3 transition-colors duration-300">

        {{-- Table Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between px-4 sm:px-6 py-4 sm:py-5 border-b border-gray-100 dark:border-gray-700 gap-4">
            <div>
                <h2 class="text-lg font-bold text-gray-800 dark:text-white">
                    <span data-lang="id">Semua Pelanggan</span>
                    <span data-lang="en" class="hidden">All Customers</span>
                </h2>
                <p class="text-sm text-gray-400 mt-0.5 hidden sm:block">
                    <span data-lang="id">Diurutkan berdasarkan status pembayaran</span>
                    <span data-lang="en" class="hidden">Sorted by payment status</span>
                </p>
            </div>
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                <form action="{{ route('admin.dashboard') }}" method="GET" class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau no HP..."
                        oninput="if(this.value === '') this.form.submit();"
                        class="w-full sm:w-56 md:w-64 pl-10 pr-4 py-2.5 bg-gray-50 dark:bg-gray-700/50 border border-gray-200 dark:border-gray-600 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-gray-800 dark:text-gray-200 placeholder-gray-400 transition-all">
                    <svg class="w-4 h-4 text-gray-400 absolute left-3.5 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </form>
                <a href="{{ route('admin.pelanggan.create') }}"
                    class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 transition-all duration-300 hover:-translate-y-0.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span data-lang="id">Tambah Pelanggan</span>
                    <span data-lang="en" class="hidden">Add Customer</span>
                </a>
            </div>
        </div>

        {{-- Table (Desktop) / Cards (Mobile) --}}
        <div class="overflow-x-auto">
            <table class="w-full mobile-card-table">
                <thead class="bg-gray-50 dark:bg-gray-700/50 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider hidden md:table-header-group">
                    <tr>
                        <th class="px-6 py-4">
                            <span data-lang="id">No</span>
                            <span data-lang="en" class="hidden">No</span>
                        </th>
                        <th class="px-6 py-4">
                            <span data-lang="id">Nama</span>
                            <span data-lang="en" class="hidden">Name</span>
                        </th>
                        <th class="px-6 py-4">
                            <span data-lang="id">Paket</span>
                            <span data-lang="en" class="hidden">Plan</span>
                        </th>
                        <th class="px-6 py-4">
                            <span data-lang="id">Tagihan</span>
                            <span data-lang="en" class="hidden">Bill</span>
                        </th>
                        <th class="px-6 py-4">
                            <span data-lang="id">Status</span>
                            <span data-lang="en" class="hidden">Status</span>
                        </th>
                        <th class="px-6 py-4">
                            <span data-lang="id">Aksi</span>
                            <span data-lang="en" class="hidden">Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 dark:divide-gray-700/50">
                    @forelse($pelanggans as $index => $p)
                        <tr class="table-row dark:hover:bg-gray-700/30">
                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400" data-label="No">{{ $index + 1 }}</td>
                            <td class="px-6 py-4" data-label="Nama">
                                <div>
                                    <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">{{ $p->nama }}</p>
                                    <p class="text-xs text-gray-400">{{ $p->no_hp ?? '-' }}</p>
                                </div>
                            </td>
                            <td class="px-6 py-4" data-label="Paket">
                                <span class="inline-flex items-center gap-1 bg-gray-100 dark:bg-gray-700/50 text-gray-600 dark:text-gray-300 text-xs font-medium px-3 py-1.5 rounded-lg">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                    {{ $p->paket }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm font-semibold text-gray-700 dark:text-gray-200" data-label="Tagihan">
                                Rp{{ number_format($p->tagihan, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4" data-label="Status">
                                @if ($p->status === 'sudah_bayar')
                                    <span class="inline-flex items-center gap-1.5 bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 text-xs font-semibold px-3 py-1.5 rounded-full border border-emerald-200 dark:border-emerald-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        <span data-lang="id">Sudah Bayar</span>
                                        <span data-lang="en" class="hidden">Paid</span>
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 bg-red-50 dark:bg-red-500/10 text-red-700 dark:text-red-400 text-xs font-semibold px-3 py-1.5 rounded-full border border-red-200 dark:border-red-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                        <span data-lang="id">Belum Bayar</span>
                                        <span data-lang="en" class="hidden">Unpaid</span>
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4" data-label="Aksi">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.pelanggan.edit', $p->id) }}"
                                        class="w-8 h-8 rounded-lg bg-amber-50 dark:bg-amber-500/10 border border-amber-200 dark:border-amber-500/20 flex items-center justify-center text-amber-600 dark:text-amber-400 hover:bg-amber-100 dark:hover:bg-amber-500/20 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.pelanggan.destroy', $p->id) }}" method="POST"
                                        onsubmit="const msg = localStorage.getItem('lang') === 'en' ? 'Are you sure you want to delete this customer?' : 'Yakin ingin menghapus pelanggan ini?'; return confirm(msg)">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="w-8 h-8 rounded-lg bg-red-50 dark:bg-red-500/10 border border-red-200 dark:border-red-500/20 flex items-center justify-center text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-500/20 transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $p->no_hp) }}?text=Halo%20{{ urlencode($p->nama) }},%20tagihan%20internet%20Anda%20sebesar%20Rp{{ number_format($p->tagihan, 0, ',', '.') }}%20belum%20dibayar." target="_blank"
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-green-50 dark:bg-green-500/10 text-green-600 dark:text-green-400 hover:bg-green-100 dark:hover:bg-green-500/20 rounded-lg text-xs font-semibold transition-colors border border-green-200 dark:border-green-500/20">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                        </svg>
                                        <span data-lang="id">Tagih</span>
                                        <span data-lang="en" class="hidden">Bill</span>
                                    </a>

                                    {{-- More Options Dropdown --}}
                                    <div class="relative" id="dropdown-{{ $p->id }}">
                                        <button onclick="toggleDropdown({{ $p->id }})" type="button"
                                            class="w-8 h-8 rounded-lg bg-gray-50 dark:bg-gray-700/50 border border-gray-200 dark:border-gray-600 flex items-center justify-center text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-600/50 transition">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                <circle cx="12" cy="5" r="2"/>
                                                <circle cx="12" cy="12" r="2"/>
                                                <circle cx="12" cy="19" r="2"/>
                                            </svg>
                                        </button>
                                        <div id="dropdown-menu-{{ $p->id }}" class="hidden absolute right-0 top-full mt-1 w-48 bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-100 dark:border-gray-700 z-50 py-1.5 animate-fade-in">
                                            @if ($p->status === 'sudah_bayar')
                                                <form action="{{ route('admin.pelanggan.updateStatus', $p->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="belum_bayar">
                                                    <button type="submit" class="w-full text-left px-4 py-2.5 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-500/10 flex items-center gap-2.5 transition-colors">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                        </svg>
                                                        <span data-lang="id">Set Belum Bayar</span>
                                                        <span data-lang="en" class="hidden">Set Unpaid</span>
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.pelanggan.updateStatus', $p->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="sudah_bayar">
                                                    <button type="submit" class="w-full text-left px-4 py-2.5 text-sm text-emerald-600 dark:text-emerald-400 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 flex items-center gap-2.5 transition-colors">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                        </svg>
                                                        <span data-lang="id">Set Sudah Bayar</span>
                                                        <span data-lang="en" class="hidden">Set Paid</span>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center mb-4">
                                        <svg class="w-8 h-8 text-gray-300 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <p class="text-gray-400 font-medium">
                                        <span data-lang="id">Belum ada data pelanggan</span>
                                        <span data-lang="en" class="hidden">No customer data yet</span>
                                    </p>
                                    <a href="{{ route('admin.pelanggan.create') }}" class="mt-3 text-sm text-blue-600 dark:text-blue-400 hover:underline font-medium">
                                        <span data-lang="id">+ Tambah pelanggan pertama</span>
                                        <span data-lang="en" class="hidden">+ Add first customer</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    {{-- Script Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('paymentChart').getContext('2d');
            const data = {
                labels: ['Sudah Bayar', 'Belum Bayar'],
                datasets: [{
                    data: [{{ $sudahBayar }}, {{ $belumBayar }}],
                    backgroundColor: [
                        '#10B981', // Emerald 500
                        '#3B82F6'  // Blue 500
                    ],
                    borderWidth: 0,
                    hoverOffset: 4
                }]
            };

            const config = {
                type: 'doughnut',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%',
                    plugins: {
                        legend: {
                            display: true,
                            position: 'right',
                            labels: {
                                boxWidth: 12,
                                padding: 15,
                                font: {
                                    size: 11,
                                    family: "'Inter', sans-serif"
                                }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed !== null) {
                                        label += context.parsed + ' Pelanggan';
                                    }
                                    return label;
                                }
                            }
                        }
                    }
                }
            };

            new Chart(ctx, config);
        });

        // Dropdown toggle for "more options" menu
        function toggleDropdown(id) {
            // Close all other dropdowns first
            document.querySelectorAll('[id^="dropdown-menu-"]').forEach(menu => {
                if (menu.id !== 'dropdown-menu-' + id) {
                    menu.classList.add('hidden');
                }
            });
            const menu = document.getElementById('dropdown-menu-' + id);
            menu.classList.toggle('hidden');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            const isDropdownButton = e.target.closest('[onclick^="toggleDropdown"]');
            if (!isDropdownButton) {
                document.querySelectorAll('[id^="dropdown-menu-"]').forEach(menu => {
                    menu.classList.add('hidden');
                });
            }
        });
    </script>
@endsection