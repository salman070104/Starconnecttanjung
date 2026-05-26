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

        <div class="stat-card bg-white dark:bg-gray-800 rounded-2xl p-5 sm:p-6 border border-gray-100 dark:border-gray-700 shadow-sm animate-fade-in-delay-1 transition-colors duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-400 dark:text-gray-400 tracking-wide">Laporan Baru</p>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-red-600 dark:text-red-400 mt-2">{{ $laporan->where('status', 'baru')->count() }}</h2>
                    <p class="text-xs text-gray-400 dark:text-gray-500 mt-2">Belum ditangani</p>
                </div>
                <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-gradient-to-br from-red-500 to-orange-500 flex items-center justify-center shadow-lg shadow-red-500/30">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 h-1.5 bg-red-100 dark:bg-red-950/40 rounded-full overflow-hidden">
                <div class="h-full bg-gradient-to-r from-red-500 to-orange-500 rounded-full"
                    style="width: {{ $laporan->count() > 0 ? ($laporan->where('status','baru')->count() / $laporan->count()) * 100 : 0 }}%"></div>
            </div>
        </div>

        <div class="stat-card bg-white dark:bg-gray-800 rounded-2xl p-5 sm:p-6 border border-gray-100 dark:border-gray-700 shadow-sm animate-fade-in-delay-2 transition-colors duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-400 dark:text-gray-400 tracking-wide">Sedang Diproses</p>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-blue-600 dark:text-blue-400 mt-2">{{ $laporan->where('status', 'diproses')->count() }}</h2>
                    <p class="text-xs text-gray-400 dark:text-gray-500 mt-2">Dalam penanganan</p>
                </div>
                <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center shadow-lg shadow-blue-500/30">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 h-1.5 bg-blue-100 dark:bg-blue-950/40 rounded-full overflow-hidden">
                <div class="h-full bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full"
                    style="width: {{ $laporan->count() > 0 ? ($laporan->where('status','diproses')->count() / $laporan->count()) * 100 : 0 }}%"></div>
            </div>
        </div>

        <div class="stat-card bg-white dark:bg-gray-800 rounded-2xl p-5 sm:p-6 border border-gray-100 dark:border-gray-700 shadow-sm animate-fade-in-delay-3 transition-colors duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-400 dark:text-gray-400 tracking-wide">Selesai</p>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-emerald-600 dark:text-emerald-400 mt-2">{{ $laporan->where('status', 'selesai')->count() }}</h2>
                    <p class="text-xs text-gray-400 dark:text-gray-500 mt-2">Sudah ditangani</p>
                </div>
                <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-gradient-to-br from-emerald-500 to-emerald-600 flex items-center justify-center shadow-lg shadow-emerald-500/30">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 h-1.5 bg-emerald-100 dark:bg-emerald-950/40 rounded-full overflow-hidden">
                <div class="h-full bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-full"
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
                    <tr class="text-left text-xs font-semibold text-gray-400 dark:text-gray-400 uppercase tracking-wider">
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Nama Pelapor</th>
                        <th class="px-6 py-4">No WhatsApp</th>
                        <th class="px-6 py-4">Jenis Gangguan</th>
                        <th class="px-6 py-4">Deskripsi</th>
                        <th class="px-6 py-4">Waktu</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 dark:divide-gray-700/50">
                    @forelse($laporan as $index => $item)
                        <tr class="table-row">
                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-orange-400 to-red-500 flex items-center justify-center text-white text-xs font-bold">
                                        {{ strtoupper(substr($item->nama, 0, 1)) }}
                                    </div>
                                    <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">{{ $item->nama }}</p>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $item->no_wa) }}" target="_blank"
                                    class="inline-flex items-center gap-1.5 text-emerald-600 dark:text-emerald-400 hover:text-emerald-700 dark:hover:text-emerald-300 text-sm font-medium">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                    </svg>
                                    {{ $item->no_wa }}
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1 bg-orange-50 dark:bg-orange-500/10 text-orange-700 dark:text-orange-400 text-xs font-medium px-3 py-1.5 rounded-lg border border-orange-200 dark:border-orange-500/20">
                                    {{ $item->jenis_gangguan }}
                                </span>
                            </td>
                            <td class="px-6 py-4 max-w-xs">
                                <p class="text-sm text-gray-600 dark:text-gray-300 truncate" title="{{ $item->deskripsi }}">{{ $item->deskripsi }}</p>
                            </td>
                            <td class="px-6 py-4 text-xs text-gray-400 dark:text-gray-500 whitespace-nowrap">
                                {{ $item->created_at->diffForHumans() }}
                            </td>
                            <td class="px-6 py-4">
                                @if($item->status === 'baru')
                                    <span class="inline-flex items-center gap-1.5 bg-red-50 dark:bg-red-500/10 text-red-700 dark:text-red-400 text-xs font-semibold px-3 py-1.5 rounded-full border border-red-200 dark:border-red-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-500 pulse-dot"></span>Baru
                                    </span>
                                @elseif($item->status === 'diproses')
                                    <span class="inline-flex items-center gap-1.5 bg-blue-50 dark:bg-blue-500/10 text-blue-700 dark:text-blue-400 text-xs font-semibold px-3 py-1.5 rounded-full border border-blue-200 dark:border-blue-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>Diproses
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 text-xs font-semibold px-3 py-1.5 rounded-full border border-emerald-200 dark:border-emerald-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Selesai
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <form action="{{ route('admin.laporan-gangguan.update-status', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()"
                                            class="text-xs border border-gray-200 dark:border-gray-700 rounded-lg px-2 py-1.5 bg-gray-50 dark:bg-gray-900 text-gray-600 dark:text-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500/20 cursor-pointer">
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
                                            class="w-8 h-8 rounded-lg bg-red-50 dark:bg-red-950/40 border border-red-200 dark:border-red-900/50 flex items-center justify-center text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-900/60 transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-orange-400 to-red-500 flex items-center justify-center text-white text-sm font-bold flex-shrink-0">
                                {{ strtoupper(substr($item->nama, 0, 1)) }}
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800 dark:text-gray-200 text-sm">{{ $item->nama }}</p>
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $item->no_wa) }}" target="_blank"
                                    class="text-xs text-emerald-600 dark:text-emerald-400 font-medium">{{ $item->no_wa }}</a>
                            </div>
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
