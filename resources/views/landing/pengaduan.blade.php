@extends('layouts.app')

@section('content')

{{-- Hero Section --}}
<section class="relative overflow-hidden bg-gradient-to-br from-teal-500 via-cyan-500 to-emerald-500 text-white py-20 sm:py-28">

    {{-- Animated background blobs --}}
    <div class="absolute top-0 left-0 w-72 h-72 bg-teal-300/30 rounded-full blur-3xl -translate-x-20 -translate-y-20 animate-pulse"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-emerald-300/20 rounded-full blur-3xl translate-x-20 translate-y-20 animate-pulse" style="animation-delay: 1s;"></div>
    <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-cyan-300/15 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>

    <div class="relative container mx-auto px-6 text-center">

        {{-- Badge --}}
        <div class="inline-flex items-center gap-2 bg-white/15 backdrop-blur-sm border border-white/25 text-white/95 text-sm font-medium px-4 py-2 rounded-full mb-6">
            <span class="w-2 h-2 rounded-full bg-white animate-ping inline-block"></span>
            Pusat Bantuan Pelanggan
        </div>

        <h1 class="text-4xl sm:text-5xl md:text-6xl font-black leading-tight tracking-tight">
            Laporan <span class="text-transparent bg-clip-text bg-gradient-to-r from-white to-teal-100">Gangguan</span>
        </h1>

        <p class="mt-5 text-lg sm:text-xl text-white/75 max-w-xl mx-auto leading-relaxed">
            Sampaikan kendala internet Anda. Tim teknisi kami siap merespons dalam waktu singkat.
        </p>

        {{-- Stats --}}
        <div class="mt-10 flex justify-center gap-6 sm:gap-10 flex-wrap">
            <div class="text-center">
                <p class="text-2xl sm:text-3xl font-black text-white">24/7</p>
                <p class="text-xs text-white/60 mt-0.5 uppercase tracking-wider">Support</p>
            </div>
            <div class="w-px h-10 bg-white/25 self-center hidden sm:block"></div>
            <div class="text-center">
                <p class="text-2xl sm:text-3xl font-black text-white">&lt;2 Jam</p>
                <p class="text-xs text-white/60 mt-0.5 uppercase tracking-wider">Respon</p>
            </div>
            <div class="w-px h-10 bg-white/25 self-center hidden sm:block"></div>
            <div class="text-center">
                <p class="text-2xl sm:text-3xl font-black text-white">100%</p>
                <p class="text-xs text-white/60 mt-0.5 uppercase tracking-wider">Gratis</p>
            </div>
        </div>

    </div>

    {{-- Wave bottom --}}
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 60L1440 60L1440 20C1200 60 960 0 720 20C480 40 240 0 0 20L0 60Z" fill="#f9fafb"/>
        </svg>
    </div>

</section>

{{-- Main Form Section --}}
<section class="bg-gray-50 pb-20 sm:pb-28 -mt-1">
    <div class="container mx-auto px-4 sm:px-6">
        <div class="max-w-5xl mx-auto">

            {{-- Success Toast --}}
            @if(session('success'))
            <div id="toast-success" class="mb-8 flex items-start gap-4 bg-gradient-to-r from-teal-500 to-emerald-500 text-white px-5 py-4 rounded-2xl shadow-lg shadow-teal-500/25 animate-slide-in">
                <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="font-bold text-sm">Laporan Berhasil Dikirim!</p>
                    <p class="text-teal-100 text-sm mt-0.5">{{ session('success') }}</p>
                </div>
                <button onclick="document.getElementById('toast-success').remove()" class="text-white/70 hover:text-white mt-0.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            @endif

            {{-- Error Alert --}}
            @if($errors->any())
            <div class="mb-8 flex items-start gap-4 bg-teal-50 border border-teal-200 text-teal-800 px-5 py-4 rounded-2xl">
                <div class="w-9 h-9 rounded-xl bg-teal-100 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-semibold text-sm mb-1">Harap perbaiki kesalahan berikut:</p>
                    <ul class="text-sm space-y-0.5">
                        @foreach($errors->all() as $error)
                            <li class="flex items-center gap-1.5">
                                <span class="w-1 h-1 rounded-full bg-teal-400 flex-shrink-0"></span>{{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            {{-- Main Card --}}
            <div class="grid lg:grid-cols-5 gap-0 bg-white rounded-3xl shadow-xl shadow-gray-200/80 overflow-hidden border border-gray-100">

                {{-- Left Panel --}}
                <div class="lg:col-span-2 bg-gradient-to-br from-teal-500 via-cyan-500 to-emerald-500 p-8 sm:p-10 relative overflow-hidden flex flex-col">

                    {{-- Decorative circles --}}
                    <div class="absolute top-0 right-0 w-48 h-48 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                    <div class="absolute bottom-0 left-0 w-64 h-64 bg-white/10 rounded-full translate-y-1/3 -translate-x-1/3"></div>

                    <div class="relative z-10 flex-1">

                        {{-- Icon --}}
                        <div class="w-14 h-14 rounded-2xl bg-white/20 backdrop-blur-sm flex items-center justify-center shadow-lg mb-8">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>

                        <h2 class="text-2xl sm:text-3xl font-black text-white leading-tight">
                            Laporkan<br>Masalah Anda
                        </h2>
                        <p class="mt-3 text-white/75 text-sm leading-relaxed">
                            Ceritakan kendala jaringan internet Anda secara detail agar tim kami dapat membantu lebih cepat.
                        </p>

                        {{-- Info list --}}
                        <div class="mt-8 space-y-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-white/20 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-white text-sm font-semibold">Respon Cepat</p>
                                    <p class="text-white/60 text-xs">Direspons dalam &lt;2 jam</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-white/20 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-white text-sm font-semibold">Teknisi Profesional</p>
                                    <p class="text-white/60 text-xs">Berpengalaman & tersertifikasi</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-white/20 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-white text-sm font-semibold">Dihubungi via WA</p>
                                    <p class="text-white/60 text-xs">Update status langsung di WA</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Bottom Divider --}}
                    <div class="relative z-10 mt-10 pt-6 border-t border-white/20">
                        <p class="text-white/50 text-xs text-center">Layanan pengaduan tersedia 24 jam sehari, 7 hari seminggu</p>
                    </div>

                </div>

                {{-- Right Panel - Form --}}
                <div class="lg:col-span-3 p-6 sm:p-8 lg:p-10">

                    {{-- Form Header --}}
                    <div class="mb-8">
                        <p class="text-xs font-bold text-teal-600 uppercase tracking-widest mb-2">Form Pengaduan</p>
                        <h3 class="text-2xl sm:text-3xl font-black text-gray-900">Isi Detail Laporan</h3>
                        <p class="text-gray-400 text-sm mt-2">Semua field bertanda <span class="text-teal-500">*</span> wajib diisi</p>
                    </div>

                    <form action="{{ route('pengaduan.store') }}" method="POST" class="space-y-5" id="form-pengaduan">
                        @csrf

                        {{-- Nama --}}
                        <div class="form-group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Nama Lengkap <span class="text-teal-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg style="width:18px;height:18px" class="text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <input type="text" name="nama" value="{{ old('nama') }}"
                                    class="w-full pl-11 pr-4 py-3.5 bg-gray-50 border {{ $errors->has('nama') ? 'border-teal-400 bg-teal-50' : 'border-gray-200' }} rounded-2xl text-gray-800 placeholder-gray-400 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-400 focus:bg-white transition-all duration-200"
                                    placeholder="Masukkan nama lengkap Anda">
                            </div>
                            @error('nama')
                                <p class="mt-1.5 text-xs text-teal-600 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- No WA --}}
                        <div class="form-group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Nomor WhatsApp <span class="text-teal-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                    <svg class="text-gray-400" style="width:18px;height:18px" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                    </svg>
                                </div>
                                <input type="text" name="no_wa" value="{{ old('no_wa') }}"
                                    class="w-full pl-11 pr-4 py-3.5 bg-gray-50 border {{ $errors->has('no_wa') ? 'border-teal-400 bg-teal-50' : 'border-gray-200' }} rounded-2xl text-gray-800 placeholder-gray-400 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-400 focus:bg-white transition-all duration-200"
                                    placeholder="08xxxxxxxxxx">
                            </div>
                            @error('no_wa')
                                <p class="mt-1.5 text-xs text-teal-600 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Jenis Gangguan - Visual Cards --}}
                        <div class="form-group">
                            <label class="block text-sm font-semibold text-gray-700 mb-3">
                                Jenis Gangguan <span class="text-teal-500">*</span>
                            </label>
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3" id="jenis-grid">
                                @php
                                    $gangguanList = [
                                        ['value' => 'Internet Lambat',   'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',                                                                                                 'color' => 'text-teal-500',    'bg' => 'bg-teal-50'],
                                        ['value' => 'Tidak Ada Koneksi', 'icon' => 'M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z', 'color' => 'text-cyan-500',    'bg' => 'bg-cyan-50'],
                                        ['value' => 'Router Rusak',      'icon' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',               'color' => 'text-emerald-500', 'bg' => 'bg-emerald-50'],
                                        ['value' => 'Kabel Putus',       'icon' => 'M7 16V4m0 0L3 8m4-4l4 4M17 8v12m0 0l4-4m-4 4l-4-4',                                                                         'color' => 'text-teal-600',    'bg' => 'bg-teal-50'],
                                        ['value' => 'Lainnya',           'icon' => 'M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'color' => 'text-gray-400',   'bg' => 'bg-gray-50'],
                                    ];
                                    $selectedJenis = old('jenis_gangguan', '');
                                @endphp
                                @foreach($gangguanList as $g)
                                <label class="gangguan-card relative cursor-pointer group">
                                    <input type="radio" name="jenis_gangguan" value="{{ $g['value'] }}"
                                        class="sr-only peer" {{ $selectedJenis === $g['value'] ? 'checked' : '' }}>
                                    <div class="flex flex-col items-center gap-2 p-3 sm:p-4 rounded-2xl border-2 border-gray-100 bg-gray-50
                                        peer-checked:border-teal-400 peer-checked:bg-teal-50 peer-checked:shadow-md peer-checked:shadow-teal-100
                                        group-hover:border-gray-300 group-hover:bg-white
                                        transition-all duration-200 text-center select-none">
                                        <div class="w-10 h-10 rounded-xl {{ $g['bg'] }} flex items-center justify-center transition-transform duration-200">
                                            <svg class="w-5 h-5 {{ $g['color'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $g['icon'] }}"/>
                                            </svg>
                                        </div>
                                        <span class="text-xs font-semibold text-gray-600 peer-checked:text-teal-700 leading-tight">{{ $g['value'] }}</span>
                                        {{-- Checkmark --}}
                                        <div class="absolute top-2 right-2 w-4 h-4 rounded-full bg-teal-500 hidden peer-checked:flex items-center justify-center">
                                            <svg class="w-2.5 h-2.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                            </svg>
                                        </div>
                                    </div>
                                </label>
                                @endforeach
                            </div>
                            @error('jenis_gangguan')
                                <p class="mt-2 text-xs text-teal-600 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Deskripsi --}}
                        <div class="form-group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Deskripsi Masalah <span class="text-teal-500">*</span>
                            </label>
                            <div class="relative">
                                <textarea name="deskripsi" id="deskripsi" rows="4"
                                    class="w-full px-4 py-3.5 bg-gray-50 border {{ $errors->has('deskripsi') ? 'border-teal-400 bg-teal-50' : 'border-gray-200' }} rounded-2xl text-gray-800 placeholder-gray-400 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-400 focus:bg-white transition-all duration-200 resize-none"
                                    placeholder="Jelaskan kendala internet Anda secara detail. Misalnya: sejak kapan, berapa lama, sudah dicoba apa saja, dll.">{{ old('deskripsi') }}</textarea>
                                <div class="absolute bottom-3 right-4 text-xs text-gray-300" id="char-count">0 / 500</div>
                            </div>
                            @error('deskripsi')
                                <p class="mt-1.5 text-xs text-teal-600 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Submit Button --}}
                        <div class="pt-2">
                            <button type="submit" id="submit-btn"
                                class="group w-full relative overflow-hidden bg-gradient-to-r from-teal-500 via-cyan-500 to-emerald-500 text-white py-4 rounded-2xl font-bold text-base shadow-lg shadow-teal-500/30 hover:shadow-teal-500/50 hover:shadow-xl transition-all duration-300 hover:-translate-y-0.5 flex items-center justify-center gap-3">
                                <svg class="w-5 h-5 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                </svg>
                                <span>Kirim Laporan Gangguan</span>
                                {{-- Shine effect --}}
                                <div class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-700 bg-gradient-to-r from-transparent via-white/15 to-transparent skew-x-12"></div>
                            </button>
                            <p class="text-center text-xs text-gray-400 mt-3 flex items-center justify-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                                Data Anda aman dan hanya digunakan untuk keperluan perbaikan
                            </p>
                        </div>

                    </form>
                </div>

            </div>

            {{-- Process Steps --}}
            <div class="mt-12 sm:mt-16">
                <p class="text-center text-xs font-bold text-gray-400 uppercase tracking-widest mb-8">Proses Penanganan Laporan</p>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6">
                    @php
                        $steps = [
                            ['num' => '01', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',    'title' => 'Laporan Masuk', 'desc' => 'Form terkirim & tercatat di sistem kami',    'color' => 'from-teal-500 to-cyan-500',    'shadow' => 'shadow-teal-200'],
                            ['num' => '02', 'icon' => 'M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9', 'title' => 'Notifikasi Tim', 'desc' => 'Tim teknisi mendapat notifikasi laporan',  'color' => 'from-cyan-500 to-emerald-500', 'shadow' => 'shadow-cyan-200'],
                            ['num' => '03', 'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z', 'title' => 'Penanganan',    'desc' => 'Teknisi menangani & menghubungi via WA', 'color' => 'from-emerald-500 to-teal-600', 'shadow' => 'shadow-emerald-200'],
                            ['num' => '04', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',                                                                               'title' => 'Selesai',       'desc' => 'Masalah terselesaikan, koneksi pulih',   'color' => 'from-teal-400 to-cyan-400',    'shadow' => 'shadow-teal-200'],
                        ];
                    @endphp
                    @foreach($steps as $i => $step)
                    <div class="relative flex flex-col items-center text-center group">
                        @if($i < count($steps) - 1)
                        <div class="absolute top-6 left-[calc(50%+24px)] right-0 h-0.5 bg-gradient-to-r from-teal-200 to-transparent hidden md:block"></div>
                        @endif
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br {{ $step['color'] }} flex items-center justify-center shadow-lg {{ $step['shadow'] }} mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $step['icon'] }}"/>
                            </svg>
                        </div>
                        <span class="text-xs font-black text-gray-300 mb-1">{{ $step['num'] }}</span>
                        <p class="text-sm font-bold text-gray-800">{{ $step['title'] }}</p>
                        <p class="text-xs text-gray-400 mt-1 leading-relaxed">{{ $step['desc'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    @keyframes slideIn {
        from { opacity: 0; transform: translateY(-12px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .animate-slide-in { animation: slideIn 0.4s ease-out forwards; }

    .gangguan-card input:checked ~ div .hidden {
        display: flex;
    }
    .gangguan-card input:checked ~ div > div:first-child {
        transform: scale(1.1);
    }
</style>

<script>
    // Character counter
    const textarea = document.getElementById('deskripsi');
    const counter = document.getElementById('char-count');
    if (textarea && counter) {
        const update = () => {
            const len = textarea.value.length;
            counter.textContent = len + ' / 500';
            counter.className = 'absolute bottom-3 right-4 text-xs ' + (len > 450 ? 'text-teal-500' : 'text-gray-300');
        };
        textarea.addEventListener('input', update);
        update();
    }

    // Submit loading state
    const form = document.getElementById('form-pengaduan');
    const btn = document.getElementById('submit-btn');
    if (form && btn) {
        form.addEventListener('submit', () => {
            btn.disabled = true;
            btn.innerHTML = `
                <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>
                <span>Mengirim Laporan...</span>
            `;
            btn.classList.add('opacity-80');
        });
    }

    // Auto dismiss toast
    const toast = document.getElementById('toast-success');
    if (toast) {
        setTimeout(() => {
            toast.style.transition = 'opacity 0.5s ease';
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 500);
        }, 5000);
    }
</script>

@endsection