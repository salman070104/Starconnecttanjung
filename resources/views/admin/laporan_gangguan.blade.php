@extends('admin.layouts.app')

@section('title', 'Laporan Gangguan')
@section('page-title', 'Laporan Gangguan')
@section('page-subtitle', 'Daftar laporan gangguan yang masuk dari pelanggan')

@section('content')

    {{-- Success Alert --}}
    @if (session('success'))
        <div id="alert-success"
            class="mb-6 flex items-center gap-3 bg-emerald-50 dark:bg-emerald-500/10 border border-emerald-200 dark:border-emerald-500/20 text-emerald-700 dark:text-emerald-400 px-5 py-4 rounded-2xl animate-fade-in transition-colors duration-300">
            <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span class="text-sm font-medium">{{ session('success') }}</span>
            <button onclick="document.getElementById('alert-success').remove()" class="ml-auto">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif

    {{-- Stat Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-8">

        <div class="stat-card bg-red-500 dark:bg-red-600 rounded-2xl p-5 sm:p-6 shadow-sm animate-fade-in-delay-1 transition-colors duration-300 relative overflow-hidden text-white">
            <div class="absolute right-0 top-0 opacity-10 transform translate-x-2 -translate-y-2">
                <svg class="w-24 h-24 sm:w-32 sm:h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
            </div>
            <div class="flex items-center justify-between relative z-10">
                <div>
                    <p class="text-sm font-medium text-red-100 tracking-wide">Laporan Baru</p>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-2">{{ $laporan->where('status', 'baru')->count() }}</h2>
                    <p class="text-xs text-red-200 mt-2">Belum ditangani</p>
                </div>
                <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-white/20 flex items-center justify-center">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 h-1.5 bg-red-800/30 rounded-full overflow-hidden relative z-10">
                <div class="h-full bg-white rounded-full"
                    style="width: {{ $laporan->count() > 0 ? ($laporan->where('status','baru')->count() / $laporan->count()) * 100 : 0 }}%"></div>
            </div>
        </div>

        <div class="stat-card bg-blue-500 dark:bg-blue-600 rounded-2xl p-5 sm:p-6 shadow-sm animate-fade-in-delay-2 transition-colors duration-300 relative overflow-hidden text-white">
            <div class="absolute right-0 top-0 opacity-10 transform translate-x-2 -translate-y-2">
                <svg class="w-24 h-24 sm:w-32 sm:h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065zM15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
            </div>
            <div class="flex items-center justify-between relative z-10">
                <div>
                    <p class="text-sm font-medium text-blue-100 tracking-wide">Sedang Diproses</p>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-2">{{ $laporan->where('status', 'diproses')->count() }}</h2>
                    <p class="text-xs text-blue-200 mt-2">Dalam penanganan</p>
                </div>
                <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-white/20 flex items-center justify-center">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 h-1.5 bg-blue-800/30 rounded-full overflow-hidden relative z-10">
                <div class="h-full bg-white rounded-full"
                    style="width: {{ $laporan->count() > 0 ? ($laporan->where('status','diproses')->count() / $laporan->count()) * 100 : 0 }}%"></div>
            </div>
        </div>

        <div class="stat-card bg-emerald-500 dark:bg-emerald-600 rounded-2xl p-5 sm:p-6 shadow-sm animate-fade-in-delay-3 transition-colors duration-300 relative overflow-hidden text-white">
            <div class="absolute right-0 top-0 opacity-10 transform translate-x-2 -translate-y-2">
                <svg class="w-24 h-24 sm:w-32 sm:h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
            <div class="flex items-center justify-between relative z-10">
                <div>
                    <p class="text-sm font-medium text-emerald-100 tracking-wide">Selesai</p>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-2">{{ $laporan->where('status', 'selesai')->count() }}</h2>
                    <p class="text-xs text-emerald-200 mt-2">Sudah ditangani</p>
                </div>
                <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-white/20 flex items-center justify-center">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 h-1.5 bg-emerald-800/30 rounded-full overflow-hidden relative z-10">
                <div class="h-full bg-white rounded-full"
                    style="width: {{ $laporan->count() > 0 ? ($laporan->where('status','selesai')->count() / $laporan->count()) * 100 : 0 }}%"></div>
            </div>
        </div>

    </div>

    {{-- Laporan List --}}
    <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm animate-fade-in-delay-3 transition-colors duration-300">

        <div class="flex flex-col sm:flex-row sm:items-center justify-between px-4 sm:px-6 py-4 sm:py-5 border-b border-gray-100 dark:border-gray-700 gap-3">
            <div>
                <h2 class="text-lg font-bold text-gray-800 dark:text-white">Semua Laporan Gangguan</h2>
                <p class="text-sm text-gray-400 mt-0.5 hidden sm:block">Diurutkan dari laporan terbaru</p>
            </div>
            <span class="inline-flex items-center gap-1.5 bg-red-50 dark:bg-red-500/10 text-red-600 dark:text-red-400 text-xs font-semibold px-3 py-1.5 rounded-full border border-red-200 dark:border-red-500/20 self-start sm:self-center">
                <span class="w-1.5 h-1.5 rounded-full bg-red-500 pulse-dot"></span>
                {{ $laporan->where('status','baru')->count() }} Laporan Baru
            </span>
        </div>

        {{-- Desktop Table --}}
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-[11px] font-semibold text-gray-400 dark:text-gray-400 uppercase tracking-wider">
                        <th class="px-2 py-3">No</th>
                        <th class="px-3 py-3">Nama Pelapor</th>
                        <th class="px-3 py-3">No WA</th>
                        <th class="px-3 py-3">Gangguan</th>
                        <th class="px-3 py-3">Deskripsi</th>
                        <th class="px-3 py-3">Waktu</th>
                        <th class="px-3 py-3">Status</th>
                        <th class="px-3 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 dark:divide-gray-700/50">
                    @forelse($laporan as $index => $item)
                        <tr class="table-row">
                            <td class="px-2 py-3 text-sm text-gray-500 dark:text-gray-400">{{ $index + 1 }}</td>
                            <td class="px-3 py-3">
                                <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">{{ $item->nama }}</p>
                            </td>
                            <td class="px-3 py-3">
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $item->no_wa) }}" target="_blank"
                                    class="text-emerald-600 dark:text-emerald-400 hover:text-emerald-700 dark:hover:text-emerald-300 text-sm font-medium">
                                    {{ $item->no_wa }}
                                </a>
                            </td>
                            <td class="px-3 py-3">
                                <span class="inline-flex items-center gap-1 bg-orange-50 dark:bg-orange-500/10 text-orange-700 dark:text-orange-400 text-xs font-medium px-2 py-1 rounded-lg border border-orange-200 dark:border-orange-500/20 whitespace-nowrap">
                                    {{ $item->jenis_gangguan }}
                                </span>
                            </td>
                            <td class="px-3 py-3 max-w-[180px]">
                                <p class="text-[13px] text-gray-600 dark:text-gray-300 truncate" title="{{ $item->deskripsi }}">{{ $item->deskripsi }}</p>
                            </td>
                            <td class="px-3 py-3 text-xs text-gray-400 dark:text-gray-500 whitespace-nowrap">
                                {{ $item->created_at->diffForHumans() }}
                            </td>
                            <td class="px-3 py-3">
                                @if($item->status === 'baru')
                                    <span class="inline-flex items-center gap-1.5 bg-red-50 dark:bg-red-500/10 text-red-700 dark:text-red-400 text-[11px] font-semibold px-2 py-1 rounded-full border border-red-200 dark:border-red-500/20 whitespace-nowrap">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-500 pulse-dot"></span>Baru
                                    </span>
                                @elseif($item->status === 'diproses')
                                    <span class="inline-flex items-center gap-1.5 bg-blue-50 dark:bg-blue-500/10 text-blue-700 dark:text-blue-400 text-[11px] font-semibold px-2 py-1 rounded-full border border-blue-200 dark:border-blue-500/20 whitespace-nowrap">
                                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>Diproses
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 text-[11px] font-semibold px-2 py-1 rounded-full border border-emerald-200 dark:border-emerald-500/20 whitespace-nowrap">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Selesai
                                    </span>
                                @endif
                            </td>
                            <td class="px-3 py-3">
                                <div class="flex items-center gap-1.5">
                                    <form action="{{ route('admin.laporan-gangguan.update-status', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()"
                                            class="text-[11px] border border-gray-200 dark:border-gray-700 rounded-lg px-2 py-1.5 bg-gray-50 dark:bg-gray-900 text-gray-600 dark:text-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500/20 cursor-pointer">
                                            <option value="baru" {{ $item->status === 'baru' ? 'selected' : '' }} class="dark:bg-gray-900">Baru</option>
                                            <option value="diproses" {{ $item->status === 'diproses' ? 'selected' : '' }} class="dark:bg-gray-900">Proses</option>
                                            <option value="selesai" {{ $item->status === 'selesai' ? 'selected' : '' }} class="dark:bg-gray-900">Selesai</option>
                                        </select>
                                    </form>
                                    <form action="{{ route('admin.laporan-gangguan.hapus', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="w-7 h-7 rounded-lg bg-red-50 dark:bg-red-950/40 border border-red-200 dark:border-red-900/50 flex items-center justify-center text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-900/60 transition" title="Hapus">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center mb-4">
                                        <svg class="w-8 h-8 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                    </div>
                                    <p class="text-gray-400 dark:text-gray-500 font-medium">Belum ada laporan gangguan</p>
                                    <p class="text-sm text-gray-300 dark:text-gray-600 mt-1">Laporan dari pelanggan akan muncul di sini</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Mobile Cards --}}
        <div class="md:hidden divide-y divide-gray-50 dark:divide-gray-700/50">
            @forelse($laporan as $index => $item)
                <div class="p-4 space-y-3">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <p class="font-semibold text-gray-800 dark:text-gray-200 text-sm">{{ $item->nama }}</p>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $item->no_wa) }}" target="_blank"
                                class="text-xs text-emerald-600 dark:text-emerald-400 font-medium">{{ $item->no_wa }}</a>
                        </div>
                        @if($item->status === 'baru')
                            <span class="flex-shrink-0 inline-flex items-center gap-1 bg-red-50 dark:bg-red-500/10 text-red-700 dark:text-red-400 text-[10px] font-semibold px-2 py-1 rounded-full border border-red-200 dark:border-red-500/20">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>Baru
                            </span>
                        @elseif($item->status === 'diproses')
                            <span class="flex-shrink-0 inline-flex items-center gap-1 bg-blue-50 dark:bg-blue-500/10 text-blue-700 dark:text-blue-400 text-[10px] font-semibold px-2 py-1 rounded-full border border-blue-200 dark:border-blue-500/20">
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>Diproses
                            </span>
                        @else
                            <span class="flex-shrink-0 inline-flex items-center gap-1 bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 text-[10px] font-semibold px-2 py-1 rounded-full border border-emerald-200 dark:border-emerald-500/20">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Selesai
                            </span>
                        @endif
                    </div>

                    <div class="bg-orange-50 dark:bg-orange-500/10 rounded-xl px-3 py-2 flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 text-orange-500 dark:text-orange-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        <span class="text-xs font-medium text-orange-700 dark:text-orange-400">{{ $item->jenis_gangguan }}</span>
                    </div>

                    <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed">{{ $item->deskripsi }}</p>

                    <p class="text-[10px] text-gray-400 dark:text-gray-500">{{ $item->created_at->diffForHumans() }}</p>

                    <div class="flex items-center gap-2 pt-1">
                        <form action="{{ route('admin.laporan-gangguan.update-status', $item->id) }}" method="POST" class="flex-1">
                            @csrf
                            @method('PATCH')
                            <select name="status" onchange="this.form.submit()"
                                class="w-full text-xs border border-gray-200 dark:border-gray-700 rounded-lg px-3 py-2 bg-gray-50 dark:bg-gray-900 text-gray-600 dark:text-gray-300 focus:outline-none">
                                <option value="baru" {{ $item->status === 'baru' ? 'selected' : '' }} class="dark:bg-gray-900">Baru</option>
                                <option value="diproses" {{ $item->status === 'diproses' ? 'selected' : '' }} class="dark:bg-gray-900">Diproses</option>
                                <option value="selesai" {{ $item->status === 'selesai' ? 'selected' : '' }} class="dark:bg-gray-900">Selesai</option>
                            </select>
                        </form>
                        <form action="{{ route('admin.laporan-gangguan.hapus', $item->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="h-9 px-3 rounded-lg bg-red-50 dark:bg-red-950/40 border border-red-200 dark:border-red-900/50 flex items-center justify-center text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-900/60 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="px-6 py-16 text-center">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <p class="text-gray-400 dark:text-gray-500 font-medium">Belum ada laporan gangguan</p>
                    </div>
                </div>
            @endforelse
        </div>

    </div>

@endsection
