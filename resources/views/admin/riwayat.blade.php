@extends('admin.layouts.app')

@section('title', 'Riwayat Pembayaran')
@section('page-title', 'Riwayat Pembayaran')
@section('page-subtitle', 'Daftar pelanggan yang sudah membayar')

@section('content')

    {{-- Stats --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-5 mb-6 sm:mb-8">
        <div class="bg-emerald-500 dark:bg-emerald-600 rounded-2xl p-4 sm:p-5 shadow-sm flex items-center gap-4 transition-colors duration-300 relative overflow-hidden text-white">
            <div class="absolute right-0 top-0 opacity-10 transform translate-x-2 -translate-y-2">
                <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
            <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center flex-shrink-0 relative z-10">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="relative z-10">
                <p class="text-sm font-medium text-emerald-100">Total Pembayaran</p>
                <p class="text-2xl font-bold text-white">{{ $riwayat->count() }}</p>
            </div>
        </div>
        <div class="bg-blue-500 dark:bg-blue-600 rounded-2xl p-4 sm:p-5 shadow-sm flex items-center gap-4 transition-colors duration-300 relative overflow-hidden text-white">
            <div class="absolute right-0 top-0 opacity-10 transform translate-x-2 -translate-y-2">
                <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
            <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center flex-shrink-0 relative z-10">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="relative z-10">
                <p class="text-sm font-medium text-blue-100">Total Pendapatan</p>
                <p class="text-xl sm:text-2xl font-bold text-white">Rp{{ number_format($riwayat->sum('tagihan'), 0, ',', '.') }}</p>
            </div>
        </div>
        <div class="bg-purple-500 dark:bg-purple-600 rounded-2xl p-4 sm:p-5 shadow-sm flex items-center gap-4 transition-colors duration-300 relative overflow-hidden text-white">
            <div class="absolute right-0 top-0 opacity-10 transform translate-x-2 -translate-y-2">
                <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
            </div>
            <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center flex-shrink-0 relative z-10">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <div class="relative z-10">
                <p class="text-sm font-medium text-purple-100">Rata-rata Tagihan</p>
                <p class="text-xl sm:text-2xl font-bold text-white">
                    Rp{{ $riwayat->count() > 0 ? number_format($riwayat->avg('tagihan'), 0, ',', '.') : '0' }}
                </p>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm transition-colors duration-300">

        <div class="px-4 sm:px-6 py-4 sm:py-5 border-b border-gray-100 dark:border-gray-700">
            <h2 class="text-lg font-bold text-gray-800 dark:text-white">Riwayat Pembayaran</h2>
            <p class="text-sm text-gray-400 mt-0.5 hidden sm:block">Pelanggan yang telah menyelesaikan pembayaran</p>
        </div>

        {{-- Desktop Table --}}
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-xs font-semibold text-gray-400 dark:text-gray-400 uppercase tracking-wider">
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Nama</th>
                        <th class="px-6 py-4">Paket</th>
                        <th class="px-6 py-4">Jumlah Bayar</th>
                        <th class="px-6 py-4">Tanggal Bayar</th>
                        <th class="px-6 py-4">Waktu</th>
                        <th class="px-6 py-4">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 dark:divide-gray-700/50">
                    @forelse($riwayat as $index => $r)
                        <tr class="table-row">
                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center text-white text-xs font-bold overflow-hidden shrink-0 shadow-sm border border-emerald-100">
                                        @if($r->foto)
                                            <img src="{{ asset('uploads/profiles/' . $r->foto) }}" class="w-full h-full object-cover" alt="Profile">
                                        @else
                                            {{ strtoupper(substr($r->nama, 0, 1)) }}
                                        @endif
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">{{ $r->nama }}</p>
                                        <p class="text-xs text-gray-400 dark:text-gray-500">{{ $r->no_hp ?? '-' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1 bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 text-xs font-medium px-3 py-1.5 rounded-lg border border-transparent dark:border-gray-700">
                                    {{ $r->paket }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm font-semibold text-gray-700 dark:text-gray-200">
                                Rp{{ number_format($r->tagihan, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                {{ $r->tanggal_bayar ? $r->tanggal_bayar->format('d M Y') : '-' }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 font-medium">
                                {{ $r->tanggal_bayar ? $r->tanggal_bayar->format('H:i') . ' WIB' : '-' }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 text-xs font-semibold px-3 py-1.5 rounded-full border border-emerald-200 dark:border-emerald-500/20">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Lunas
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center mb-4">
                                        <svg class="w-8 h-8 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                    </div>
                                    <p class="text-gray-400 dark:text-gray-500 font-medium">Belum ada riwayat pembayaran</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Mobile Cards --}}
        <div class="md:hidden divide-y divide-gray-50 dark:divide-gray-700/50">
            @forelse($riwayat as $index => $r)
                <div class="p-4 space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center text-white text-sm font-bold overflow-hidden shrink-0 shadow-sm border border-emerald-100">
                                @if($r->foto)
                                    <img src="{{ asset('uploads/profiles/' . $r->foto) }}" class="w-full h-full object-cover" alt="Profile">
                                @else
                                    {{ strtoupper(substr($r->nama, 0, 1)) }}
                                @endif
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800 dark:text-gray-200 text-sm">{{ $r->nama }}</p>
                                <p class="text-xs text-gray-400 dark:text-gray-500">{{ $r->no_hp ?? '-' }}</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center gap-1 bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 text-[10px] font-semibold px-2 py-1 rounded-full border border-emerald-200 dark:border-emerald-500/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Lunas
                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="inline-flex items-center gap-1 bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 text-xs font-medium px-3 py-1.5 rounded-lg border border-transparent dark:border-gray-600">{{ $r->paket }}</span>
                        <span class="font-bold text-gray-800 dark:text-gray-200 text-sm">Rp{{ number_format($r->tagihan, 0, ',', '.') }}</span>
                    </div>
                    <p class="text-xs text-gray-400 dark:text-gray-500">{{ $r->tanggal_bayar ? $r->tanggal_bayar->format('d M Y • H:i') . ' WIB' : '-' }}</p>
                </div>
            @empty
                <div class="px-6 py-16 text-center">
                    <p class="text-gray-400 dark:text-gray-500 font-medium">Belum ada riwayat pembayaran</p>
                </div>
            @endforelse
        </div>

    </div>

@endsection
