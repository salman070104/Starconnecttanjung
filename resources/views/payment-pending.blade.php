<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menunggu Pembayaran - StarConnect</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-4">

    <div class="bg-white rounded-3xl shadow-xl w-full max-w-md overflow-hidden relative">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-amber-400 to-orange-500 animate-pulse"></div>
        
        <div class="p-8 text-center">
            <div class="w-20 h-20 bg-amber-50 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-amber-500 animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="animation: spin 3s linear infinite;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            
            <h2 class="text-2xl font-bold text-slate-800 mb-2">Menunggu Pembayaran</h2>
            <p class="text-slate-500 text-sm mb-6">
                Silakan selesaikan pembayaran sesuai instruksi di aplikasi e-Wallet atau m-Banking Anda.
            </p>

            <div class="bg-slate-50 rounded-2xl p-4 mb-6 border border-slate-100">
                <p class="text-xs text-slate-400 uppercase tracking-wider font-semibold mb-1">Total Tagihan</p>
                <p class="text-3xl font-extrabold text-slate-800">Rp{{ number_format($pelanggan->tagihan, 0, ',', '.') }}</p>
            </div>

            <p class="text-xs text-amber-600 font-medium mb-8 bg-amber-50 py-2 px-3 rounded-lg inline-block">
                Halaman ini akan otomatis beralih saat pembayaran berhasil.
            </p>

            <a href="{{ route('customer.dashboard') }}" class="block w-full text-center text-slate-500 hover:text-slate-700 font-semibold text-sm transition-colors">
                Kembali ke Dashboard
            </a>
        </div>
    </div>

    <script>
        // Logika Status Checking secara otomatis
        const checkStatusUrl = "{{ route('payment.status') }}";
        
        setInterval(function() {
            fetch(checkStatusUrl)
                .then(res => res.json())
                .then(data => {
                    // Jika di latar belakang status berubah menjadi lunas, redirect ke dashboard (yang sekarang akan menampilkan lunas)
                    if (data.status === 'sudah_bayar') {
                        window.location.href = "{{ route('customer.dashboard') }}";
                    }
                })
                .catch(err => console.error('Polling error', err));
        }, 3000); // Polling lebih cepat (3 detik) karena sedang berada di halaman tunggu
    </script>
</body>
</html>
