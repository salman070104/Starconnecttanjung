@extends('admin.layouts.app')

@section('title', 'Cetak Invoice')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Invoice Pelanggan</h1>
            <p class="text-gray-400 dark:text-gray-400 text-sm">Daftar pelanggan yang sudah membayar dan siap dicetak invoicenya.</p>
        </div>
        <div class="w-full sm:w-auto flex gap-3">
            <div class="relative flex-1 sm:w-64">
                <input type="text" id="searchInput"
                    class="w-full bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-gray-800 dark:text-white text-sm rounded-xl focus:ring-cyan-500 focus:border-cyan-500 block pl-10 p-2.5 placeholder-gray-400 transition-colors"
                    placeholder="Cari nama pelanggan..." 
                    value="{{ request('search') }}"
                    oninput="if(this.value === '') window.location.href = '{{ route('admin.invoice.index') }}'"
                    onkeypress="if(event.key === 'Enter') window.location.href = '{{ route('admin.invoice.index') }}?search=' + this.value">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Success Alert --}}
    @if(session('success'))
        <div class="bg-emerald-50 dark:bg-emerald-500/10 border border-emerald-200 dark:border-emerald-500/20 text-emerald-700 dark:text-emerald-400 px-4 py-3 rounded-xl flex items-center gap-3 animate-fade-in transition-colors duration-300">
            <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <p class="text-sm font-medium">{{ session('success') }}</p>
        </div>
    @endif
    
    {{-- Error Alert --}}
    @if(session('error'))
        <div class="bg-red-50 dark:bg-red-500/10 border border-red-200 dark:border-red-500/20 text-red-700 dark:text-red-400 px-4 py-3 rounded-xl flex items-center gap-3 animate-fade-in transition-colors duration-300">
            <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <p class="text-sm font-medium">{{ session('error') }}</p>
        </div>
    @endif

    <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm overflow-hidden transition-colors duration-300">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-400 dark:text-gray-400 uppercase bg-gray-50 dark:bg-gray-900/50">
                    <tr>
                        <th class="px-6 py-4 font-semibold">Nama Pelanggan</th>
                        <th class="px-6 py-4 font-semibold">Paket</th>
                        <th class="px-6 py-4 font-semibold">Tagihan</th>
                        <th class="px-6 py-4 font-semibold">Tanggal Pembayaran</th>
                        <th class="px-6 py-4 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 dark:divide-gray-700/50">
                    @forelse($pelanggans as $p)
                        <tr class="table-row hover:bg-gray-50/50 dark:hover:bg-gray-700/50 transition-colors">
                            <td class="px-6 py-4" data-label="Nama Pelanggan">
                                <div class="font-semibold text-gray-700 dark:text-white">{{ $p->nama }}</div>
                                <div class="text-xs text-gray-400 dark:text-gray-500 mt-0.5">{{ $p->no_hp ?? '-' }}</div>
                            </td>
                            <td class="px-6 py-4" data-label="Paket">
                                <span class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 text-xs font-medium px-2.5 py-1 rounded-md border border-transparent dark:border-gray-600">
                                    {{ $p->paket }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-200 font-semibold" data-label="Tagihan">
                                Rp {{ number_format($p->tagihan, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-gray-500 dark:text-gray-400" data-label="Tanggal Pembayaran">
                                @if($p->tanggal_bayar)
                                    <div class="flex items-center gap-2 text-emerald-600 dark:text-emerald-400 font-medium">
                                        <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        {{ \Carbon\Carbon::parse($p->tanggal_bayar)->translatedFormat('d F Y') }}
                                    </div>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right" data-label="Aksi">
                                <a href="{{ route('admin.invoice.cetak', $p->id) }}" target="_blank" 
                                   class="inline-flex items-center gap-2 bg-cyan-50 dark:bg-cyan-500/10 hover:bg-cyan-100 dark:hover:bg-cyan-500/20 text-cyan-600 dark:text-cyan-400 px-3 py-1.5 rounded-lg text-sm font-semibold transition-all border border-cyan-200 dark:border-cyan-500/20 hover:border-cyan-300 dark:hover:border-cyan-500/40">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                                    </svg>
                                    Cetak
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 rounded-full bg-gray-100 dark:bg-gray-700/50 flex items-center justify-center mb-4">
                                        <svg class="w-8 h-8 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <p class="text-gray-400 dark:text-gray-500 font-medium">Belum ada data pelanggan yang sudah membayar</p>
                                    <p class="text-sm text-gray-300 dark:text-gray-600 mt-1">Invoice siap dicetak setelah pelanggan menyelesaikan pembayaran</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
