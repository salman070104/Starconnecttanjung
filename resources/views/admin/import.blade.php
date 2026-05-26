@extends('admin.layouts.app')

@section('title', 'Import Data Excel')
@section('page-title', 'Import Data Excel')
@section('page-subtitle', 'Upload file Excel untuk mengisi data pelanggan secara massal')

@section('content')

    {{-- Success Alert --}}
    @if(session('success'))
    <div id="alert-success" class="mb-6 flex items-start gap-3 bg-emerald-50 dark:bg-emerald-500/10 border border-emerald-200 dark:border-emerald-500/20 text-emerald-700 dark:text-emerald-400 px-5 py-4 rounded-2xl animate-fade-in transition-colors duration-300">
        <svg class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
        </svg>
        <div class="flex-1">
            <p class="text-sm font-semibold">{{ session('success') }}</p>
            @if(session('import_errors') && count(session('import_errors')) > 0)
            <ul class="mt-2 space-y-1">
                @foreach(session('import_errors') as $err)
                    <li class="text-xs text-emerald-600 dark:text-emerald-400 flex items-center gap-1">
                        <span class="w-1 h-1 rounded-full bg-emerald-400 flex-shrink-0"></span>{{ $err }}
                    </li>
                @endforeach
            </ul>
            @endif
        </div>
        <button onclick="document.getElementById('alert-success').remove()" class="text-emerald-500 hover:text-emerald-700 dark:text-emerald-400 dark:hover:text-emerald-300">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
    @endif

    {{-- Error Alert --}}
    @if(session('error'))
    <div class="mb-6 flex items-center gap-3 bg-red-50 dark:bg-red-500/10 border border-red-200 dark:border-red-500/20 text-red-700 dark:text-red-400 px-5 py-4 rounded-2xl transition-colors duration-300">
        <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
        </svg>
        <p class="text-sm font-medium">{{ session('error') }}</p>
    </div>
    @endif

    @if($errors->any())
    <div class="mb-6 flex items-start gap-3 bg-red-50 dark:bg-red-500/10 border border-red-200 dark:border-red-500/20 text-red-700 dark:text-red-400 px-5 py-4 rounded-2xl transition-colors duration-300">
        <svg class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
        </svg>
        <ul class="text-sm space-y-0.5">
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="grid lg:grid-cols-5 gap-6">

        {{-- Left: Upload Form --}}
        <div class="lg:col-span-3 space-y-6">

            {{-- Upload Card --}}
            <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm overflow-hidden transition-colors duration-300">
                <div class="px-6 py-5 border-b border-gray-100 dark:border-gray-700 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-teal-50 dark:bg-teal-500/10 flex items-center justify-center">
                        <svg class="w-5 h-5 text-teal-600 dark:text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-base font-bold text-gray-800 dark:text-white">Upload File Excel</h2>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Format: .xlsx atau .xls</p>
                    </div>
                </div>

                <form action="{{ route('admin.import') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-5" id="import-form">
                    @csrf

                    {{-- Drop Zone --}}
                    <div id="drop-zone"
                        class="relative border-2 border-dashed border-gray-200 dark:border-gray-700 rounded-2xl p-10 text-center cursor-pointer hover:border-teal-400 dark:hover:border-teal-500 hover:bg-teal-50/30 dark:hover:bg-teal-950/20 transition-all duration-200 group"
                        onclick="document.getElementById('file_excel').click()">
                        <input type="file" id="file_excel" name="file_excel" accept=".xlsx,.xls,.csv" class="hidden" onchange="handleFileSelect(this)">
                        <div id="drop-idle">
                            <div class="w-16 h-16 mx-auto rounded-2xl bg-gray-100 dark:bg-gray-900 group-hover:bg-teal-100 dark:group-hover:bg-teal-950/50 flex items-center justify-center mb-4 transition-colors">
                                <svg class="w-8 h-8 text-gray-300 dark:text-gray-600 group-hover:text-teal-500 dark:group-hover:text-teal-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <p class="text-sm font-semibold text-gray-500 dark:text-gray-400 group-hover:text-teal-600 dark:group-hover:text-teal-400">Klik atau seret file Excel ke sini</p>
                            <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">.xlsx, .xls, .csv — maks. 5 MB</p>
                        </div>
                        <div id="drop-selected" class="hidden">
                            <div class="w-16 h-16 mx-auto rounded-2xl bg-teal-100 dark:bg-teal-500/20 flex items-center justify-center mb-4">
                                <svg class="w-8 h-8 text-teal-600 dark:text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <p id="file-name" class="text-sm font-bold text-teal-700 dark:text-teal-400"></p>
                            <p id="file-size" class="text-xs text-gray-400 dark:text-gray-500 mt-1"></p>
                            <button type="button" onclick="clearFile(event)" class="mt-3 text-xs text-red-500 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 underline">Ganti file</button>
                        </div>
                    </div>

                    {{-- Mode duplikat --}}
                    <div class="bg-gray-50 dark:bg-gray-900/50 rounded-xl p-4 border border-transparent dark:border-gray-700/50">
                        <p class="text-xs font-semibold text-gray-600 dark:text-gray-400 mb-3">Jika nama pelanggan sudah ada di database:</p>
                        <div class="flex flex-col sm:flex-row gap-3">
                            <label class="flex items-center gap-2.5 cursor-pointer group flex-1">
                                <input type="radio" name="mode" value="skip" checked class="accent-teal-600 w-4 h-4">
                                <div>
                                    <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">Lewati</p>
                                    <p class="text-xs text-gray-400 dark:text-gray-500">Data lama tidak berubah</p>
                                </div>
                            </label>
                            <label class="flex items-center gap-2.5 cursor-pointer group flex-1">
                                <input type="radio" name="mode" value="update" class="accent-teal-600 w-4 h-4">
                                <div>
                                    <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">Perbarui</p>
                                    <p class="text-xs text-gray-400 dark:text-gray-500">Timpa paket & harga lama</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    {{-- Submit --}}
                    <button type="submit" id="submit-btn"
                        class="group w-full relative overflow-hidden bg-gradient-to-r from-teal-500 to-emerald-500 text-white py-3.5 rounded-xl font-bold text-sm shadow-lg shadow-teal-500/25 hover:shadow-teal-500/40 hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                        </svg>
                        Mulai Import Data
                        <div class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-700 bg-gradient-to-r from-transparent via-white/10 to-transparent skew-x-12"></div>
                    </button>

                </form>
            </div>

            {{-- Download Template --}}
            <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm p-6 flex items-center gap-4 transition-colors duration-300">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 dark:bg-emerald-500/10 flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-bold text-gray-800 dark:text-white">Download Template Excel</p>
                    <p class="text-xs text-gray-400 dark:text-gray-500 mt-0.5">Gunakan template ini agar format kolom sesuai</p>
                </div>
                <a href="{{ route('admin.import.template') }}"
                    class="flex-shrink-0 inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold px-4 py-2.5 rounded-xl transition">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                    Download
                </a>
            </div>

        </div>

        {{-- Right: Panduan & Info Kolom --}}
        <div class="lg:col-span-2 space-y-5">

            {{-- Panduan --}}
            <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm p-6 transition-colors duration-300">
                <h3 class="text-sm font-bold text-gray-800 dark:text-white mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Panduan Format Excel
                </h3>
                <div class="space-y-3">
                    @php
                        $steps = [
                            ['A', 'Username / Nama', 'Nama lengkap pelanggan, digunakan sebagai username login', 'bg-teal-100 dark:bg-teal-950/50 text-teal-700 dark:text-teal-400'],
                            ['B', 'Password', 'Password login pelanggan (misal: 123456)', 'bg-blue-100 dark:bg-blue-950/50 text-blue-700 dark:text-blue-400'],
                            ['C', 'Paket', 'Nama paket (misal: 10 Mbps, 15 Mbps)', 'bg-purple-100 dark:bg-purple-950/50 text-purple-700 dark:text-purple-400'],
                            ['D', 'Harga (Rp)', 'Harga paket. Kosongkan jika ingin otomatis', 'bg-amber-100 dark:bg-amber-950/50 text-amber-700 dark:text-amber-400'],
                        ];
                    @endphp
                    @foreach($steps as $s)
                    <div class="flex items-start gap-3">
                        <span class="flex-shrink-0 w-7 h-7 rounded-lg {{ $s[3] }} text-xs font-black flex items-center justify-center">{{ $s[0] }}</span>
                        <div>
                            <p class="text-xs font-semibold text-gray-700 dark:text-gray-200">{{ $s[1] }}</p>
                            <p class="text-xs text-gray-400 dark:text-gray-500 mt-0.5">{{ $s[2] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="mt-4 p-3 bg-amber-50 dark:bg-amber-500/10 border border-amber-200 dark:border-amber-500/20 rounded-xl">
                    <p class="text-xs text-amber-700 dark:text-amber-400 font-medium">⚠️ Baris pertama Excel harus berisi judul kolom (header), bukan data.</p>
                </div>
            </div>

            {{-- Harga Paket Otomatis --}}
            <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm p-6 transition-colors duration-300">
                <h3 class="text-sm font-bold text-gray-800 dark:text-white mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Harga Otomatis per Paket
                </h3>
                <p class="text-xs text-gray-400 dark:text-gray-500 mb-3">Jika kolom Harga kosong, sistem otomatis mengisi sesuai tabel ini:</p>
                <div class="space-y-2">
                    @php
                        $paketList = [
                            ['8 Mbps', 'Rp150.000'],
                            ['10 Mbps', 'Rp170.000'],
                            ['15 Mbps', 'Rp220.000'],
                            ['20 Mbps', 'Rp270.000'],
                            ['30 Mbps', 'Rp420.000'],
                        ];
                    @endphp
                    @foreach($paketList as $p)
                    <div class="flex items-center justify-between px-3 py-2 bg-gray-50 dark:bg-gray-900/50 rounded-xl border border-transparent dark:border-gray-700/50">
                        <span class="text-xs font-semibold text-gray-700 dark:text-gray-300">{{ $p[0] }}</span>
                        <span class="text-xs font-bold text-emerald-600 dark:text-emerald-400">{{ $p[1] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Login Info --}}
            <div class="bg-gradient-to-br from-teal-500 to-emerald-500 rounded-2xl p-5 text-white">
                <h3 class="text-sm font-bold mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                    </svg>
                    Info Login Pelanggan
                </h3>
                <p class="text-xs text-white/80 leading-relaxed">Setelah diimport, pelanggan bisa login menggunakan <strong class="text-white">Username</strong> dan <strong class="text-white">Password</strong> dari kolom Excel. Pastikan password sudah diisi di file Excel.</p>
            </div>

        </div>
    </div>

<script>
    function handleFileSelect(input) {
        const file = input.files[0];
        if (!file) return;
        document.getElementById('drop-idle').classList.add('hidden');
        document.getElementById('drop-selected').classList.remove('hidden');
        document.getElementById('file-name').textContent = file.name;
        const kb = (file.size / 1024).toFixed(1);
        const mb = (file.size / 1024 / 1024).toFixed(2);
        document.getElementById('file-size').textContent = mb > 1 ? mb + ' MB' : kb + ' KB';
    }

    function clearFile(event) {
        event.stopPropagation();
        document.getElementById('file_excel').value = '';
        document.getElementById('drop-idle').classList.remove('hidden');
        document.getElementById('drop-selected').classList.add('hidden');
    }

    // Drag and drop
    const zone = document.getElementById('drop-zone');
    zone.addEventListener('dragover', (e) => {
        e.preventDefault();
        zone.classList.add('border-teal-400', 'bg-teal-50/30');
    });
    zone.addEventListener('dragleave', () => {
        zone.classList.remove('border-teal-400', 'bg-teal-50/30');
    });
    zone.addEventListener('drop', (e) => {
        e.preventDefault();
        zone.classList.remove('border-teal-400', 'bg-teal-50/30');
        const file = e.dataTransfer.files[0];
        if (file) {
            const input = document.getElementById('file_excel');
            const dt = new DataTransfer();
            dt.items.add(file);
            input.files = dt.files;
            handleFileSelect(input);
        }
    });

    // Loading state on submit
    document.getElementById('import-form').addEventListener('submit', function() {
        const btn = document.getElementById('submit-btn');
        btn.disabled = true;
        btn.innerHTML = `
            <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
            </svg>
            Sedang Mengimpor...
        `;
    });
</script>

@endsection
