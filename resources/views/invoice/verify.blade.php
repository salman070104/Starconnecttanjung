<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Invoice - Starconnect</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen p-4">

    <div class="max-w-md w-full bg-white rounded-3xl shadow-xl overflow-hidden">
        <!-- Header -->
        <div class="bg-slate-900 px-6 py-8 text-center relative overflow-hidden">
            <div class="absolute inset-0 opacity-10">
                <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="grid" width="20" height="20" patternUnits="userSpaceOnUse">
                            <path d="M 20 0 L 0 0 0 20" fill="none" stroke="white" stroke-width="1"/>
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#grid)" />
                </svg>
            </div>
            
            <div class="relative z-10">
                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center p-2 shadow-lg mx-auto mb-4">
                    <img src="{{ asset('logo.png') }}" alt="Logo" class="w-full h-full object-contain">
                </div>
                <h1 class="text-2xl font-bold tracking-tight text-white">Starconnect</h1>
                <p class="text-cyan-400 font-medium text-sm mt-1">Verifikasi Invoice Resmi</p>
            </div>
        </div>

        <!-- Content -->
        <div class="p-6">
            @if($pelanggan->status === 'sudah_bayar')
                <div class="flex flex-col items-center mb-6">
                    <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mb-3">
                        <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-slate-800">Invoice Valid</h2>
                    <p class="text-sm text-gray-500 text-center mt-1">Dokumen ini adalah bukti pembayaran resmi yang sah dari sistem Starconnect.</p>
                </div>
            @else
                <div class="flex flex-col items-center mb-6">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-3">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-slate-800">Belum Lunas</h2>
                    <p class="text-sm text-gray-500 text-center mt-1">Invoice ini belum dibayar atau status pembayarannya belum diperbarui.</p>
                </div>
            @endif

            <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100 space-y-4">
                <div>
                    <p class="text-xs text-gray-500 font-semibold uppercase tracking-wider mb-1">Nomor Invoice</p>
                    <p class="font-bold text-slate-800">
                        #INV-{{ $pelanggan->tanggal_bayar ? date('Ymd', strtotime($pelanggan->tanggal_bayar)) : date('Ymd') }}-{{ sprintf('%04d', $pelanggan->id) }}
                    </p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-semibold uppercase tracking-wider mb-1">Nama Pelanggan</p>
                    <p class="font-bold text-slate-800">{{ $pelanggan->nama }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-semibold uppercase tracking-wider mb-1">Layanan / Paket</p>
                    <p class="font-bold text-slate-800">Internet {{ $pelanggan->paket }}</p>
                </div>
                @if($pelanggan->status === 'sudah_bayar')
                <div>
                    <p class="text-xs text-gray-500 font-semibold uppercase tracking-wider mb-1">Tanggal Bayar</p>
                    <p class="font-bold text-slate-800">{{ \Carbon\Carbon::parse($pelanggan->tanggal_bayar)->translatedFormat('d F Y H:i') }}</p>
                </div>
                @endif
                <div class="pt-2 border-t border-slate-200">
                    <p class="text-xs text-gray-500 font-semibold uppercase tracking-wider mb-1">Total Nominal</p>
                    <p class="text-xl font-black text-cyan-600">Rp {{ number_format($pelanggan->tagihan, 0, ',', '.') }}</p>
                </div>
            </div>
            
            <div class="mt-8 text-center">
                <a href="/" class="text-cyan-600 hover:text-cyan-700 font-medium text-sm transition-colors">
                    Kunjungi Website Starconnect &rarr;
                </a>
            </div>
        </div>
    </div>

</body>
</html>
