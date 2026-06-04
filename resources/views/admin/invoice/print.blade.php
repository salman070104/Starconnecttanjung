<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - {{ $pelanggan->nama }}</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }
        @page {
            size: A4;
            margin: 2cm; /* Margin normal seperti di Word (sekitar 2cm) */
        }
        @media print {
            body {
                background-color: #ffffff;
            }
            .no-print {
                display: none !important;
            }
            .invoice-container {
                box-shadow: none !important;
                margin: 0 !important;
                width: 100% !important;
                max-width: 100% !important;
                /* Remove extra 2cm padding to ensure it fits on 1 page */
                padding: 0 !important; 
                /* Force page break inside avoid if needed, though mostly we just want to avoid overflow */
                page-break-inside: avoid;
            }
            
            /* Remove the py-10 padding from body when printing */
            body.print-py-0 {
                padding-top: 0 !important;
                padding-bottom: 0 !important;
            }
        }
    </style>
</head>
<body class="py-10 print-py-0">

    <!-- Tombol Print untuk mode layar (disembunyikan saat print) -->
    @if(!isset($isDigital) || !$isDigital)
    <div class="max-w-4xl mx-auto mb-6 text-right no-print px-4">
        <button onclick="window.print()" class="bg-cyan-600 hover:bg-cyan-700 text-white font-medium py-2 px-6 rounded-lg shadow-lg flex items-center gap-2 inline-flex transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
            </svg>
            Cetak Invoice
        </button>
        <button onclick="window.close()" class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-6 rounded-lg shadow-lg flex items-center gap-2 inline-flex transition-colors ml-2">
            Tutup
        </button>
    </div>
    @endif

    <!-- Container Utama -->
    <div class="invoice-container max-w-4xl mx-auto bg-white rounded-2xl shadow-2xl overflow-hidden print:shadow-none">
        
        <!-- Header -->
        <div class="bg-slate-900 text-white px-10 py-12 flex justify-between items-center relative overflow-hidden">
            <!-- Pola background dekoratif -->
            <div class="absolute inset-0 opacity-10">
                <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                            <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/>
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#grid)" />
                </svg>
            </div>
            <div class="absolute -right-20 -top-20 w-64 h-64 bg-cyan-500 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>
            
            <div class="relative z-10 flex items-center gap-4">
                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center p-2 shadow-lg">
                    <img src="{{ asset('logo.png') }}" alt="Logo" class="w-full h-full object-contain">
                </div>
                <div>
                    <h1 class="text-3xl font-bold tracking-tight">Starconnect</h1>
                    <p class="text-cyan-400 font-medium mt-1">Layanan Internet Cepat & Stabil</p>
                </div>
            </div>
            
            <div class="relative z-10 text-right">
                <h2 class="text-4xl font-bold text-white mb-2 uppercase tracking-widest">INVOICE</h2>
                <p class="text-gray-300 font-medium">#INV-{{ date('Ymd', strtotime($pelanggan->tanggal_bayar)) }}-{{ sprintf('%04d', $pelanggan->id) }}</p>
            </div>
        </div>

        <!-- Body -->
        <div class="px-10 py-6">
            <!-- Info Bar -->
            <div class="flex justify-between items-start border-b border-gray-100 pb-6 mb-6">
                <div class="w-1/2">
                    <p class="text-sm text-gray-500 uppercase font-semibold tracking-wider mb-2">Ditagihkan Kepada:</p>
                    <h3 class="text-xl font-bold text-slate-800 mb-1">{{ $pelanggan->nama }}</h3>
                    <p class="text-gray-600 leading-relaxed mb-1">{{ $pelanggan->alamat ?? 'Alamat tidak tersedia' }}</p>
                    <p class="text-gray-600">Telp: {{ $pelanggan->no_hp ?? '-' }}</p>
                </div>
                
                <div class="w-1/3 space-y-4">
                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-100">
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-500 text-sm font-medium">Tanggal Pembayaran:</span>
                            <span class="text-slate-800 font-bold text-sm">{{ \Carbon\Carbon::parse($pelanggan->tanggal_bayar)->translatedFormat('d F Y') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500 text-sm font-medium">Status Pembayaran:</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800">
                                LUNAS
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel Item -->
            <div class="mb-6 rounded-xl overflow-hidden border border-slate-200">
                <table class="w-full text-left">
                    <thead class="bg-slate-50 text-slate-600 border-b border-slate-200">
                        <tr>
                            <th class="py-4 px-6 font-semibold">Deskripsi Layanan</th>
                            <th class="py-4 px-6 font-semibold text-center w-32">Bulan</th>
                            <th class="py-4 px-6 font-semibold text-right w-48">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <tr>
                            <td class="py-5 px-6">
                                <p class="font-bold text-slate-800 text-lg">Paket Internet {{ $pelanggan->paket }}</p>
                                <p class="text-sm text-gray-500 mt-1">Biaya berlangganan bulanan</p>
                            </td>
                            <td class="py-5 px-6 text-center text-slate-700 font-medium">
                                {{ \Carbon\Carbon::parse($pelanggan->tanggal_bayar)->translatedFormat('F Y') }}
                            </td>
                            <td class="py-5 px-6 text-right font-bold text-slate-800">
                                Rp {{ number_format($pelanggan->tagihan, 0, ',', '.') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Summary -->
            <div class="flex justify-end border-t-2 border-slate-900 pt-6 mt-6">
                <div class="w-1/2">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-slate-500 font-medium">Subtotal</span>
                        <span class="text-slate-700 font-medium">Rp {{ number_format($pelanggan->tagihan, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between items-center mb-4 pb-4 border-b border-slate-200">
                        <span class="text-slate-500 font-medium">Pajak (0%)</span>
                        <span class="text-slate-700 font-medium">Rp 0</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-slate-900">Total Dibayar</span>
                        <span class="text-3xl font-black text-cyan-600 tracking-tight">Rp {{ number_format($pelanggan->tagihan, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

        </div>

        <!-- Footer -->
        <div class="bg-slate-50 px-10 py-6 flex justify-between items-center border-t border-slate-200">
            <div class="text-left">
                <p class="text-slate-600 font-medium mb-1">Terima kasih atas kepercayaan Anda.</p>
                <p class="text-sm text-slate-400">Pertanyaan mengenai invoice? Hubungi 081929442611.</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="text-right">
                    <p class="text-xs font-bold text-slate-700">Invoice Digital</p>
                    <p class="text-[10px] text-slate-500">Scan QR Code ini</p>
                </div>
                <div class="bg-white p-1.5 rounded border border-slate-200 shadow-sm">
                    {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(50)->generate(route('invoice.verify', $pelanggan->id)) !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Auto Print Script -->
    @if(!isset($isDigital) || !$isDigital)
    <script>
        // Opsional: Otomatis memunculkan dialog print saat halaman dimuat
        window.onload = function() {
            setTimeout(function() {
                window.print();
            }, 500);
        }
    </script>
    @endif
</body>
</html>
