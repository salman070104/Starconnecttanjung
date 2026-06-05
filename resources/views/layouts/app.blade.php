<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Star Connect — Internet cepat, stabil, dan terjangkau untuk rumah Anda di Tanjung, Brebes.">
    <title>STARCONECT TANJUNG</title>

    <!-- PWA Meta Tags -->
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#0d9488">
    <link rel="apple-touch-icon" href="{{ asset('images/icons/icon-192x192.png') }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="StarConnect">

    <!-- Favicon / Logo Web -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        * { font-family: 'Inter', sans-serif; }

        /* ===== SCROLL ANIMATIONS ===== */
        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }
        .reveal-delay-1 { transition-delay: 0.1s; }
        .reveal-delay-2 { transition-delay: 0.2s; }
        .reveal-delay-3 { transition-delay: 0.3s; }
        .reveal-delay-4 { transition-delay: 0.4s; }
        .reveal-delay-5 { transition-delay: 0.5s; }

        /* ===== KEYFRAME ANIMATIONS ===== */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50%      { transform: translateY(-20px); }
        }
        @keyframes float-slow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50%      { transform: translateY(-15px) rotate(3deg); }
        }
        @keyframes glow-pulse {
            0%, 100% { box-shadow: 0 0 20px rgba(20, 184, 166, 0.3); }
            50%      { box-shadow: 0 0 40px rgba(20, 184, 166, 0.6); }
        }
        @keyframes gradient-shift {
            0%   { background-position: 0% 50%; }
            50%  { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        @keyframes aurora {
            0%   { transform: rotate(0deg) scale(1); opacity: 0.3; }
            33%  { transform: rotate(120deg) scale(1.1); opacity: 0.5; }
            66%  { transform: rotate(240deg) scale(0.9); opacity: 0.3; }
            100% { transform: rotate(360deg) scale(1); opacity: 0.3; }
        }
        @keyframes shimmer {
            0%   { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
        @keyframes pulse-ring {
            0%   { transform: scale(0.8); opacity: 1; }
            100% { transform: scale(2); opacity: 0; }
        }
        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-40px); }
            to   { opacity: 1; transform: translateX(0); }
        }
        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(40px); }
            to   { opacity: 1; transform: translateX(0); }
        }
        @keyframes bounce-subtle {
            0%, 100% { transform: translateY(0); }
            50%      { transform: translateY(-5px); }
        }
        @keyframes spin-slow {
            from { transform: rotate(0deg); }
            to   { transform: rotate(360deg); }
        }
        @keyframes counter-up {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .animate-fadeInUp   { animation: fadeInUp 0.8s ease-out forwards; }
        .animate-float      { animation: float 6s ease-in-out infinite; }
        .animate-float-slow { animation: float-slow 8s ease-in-out infinite; }
        .animate-glow-pulse { animation: glow-pulse 3s ease-in-out infinite; }
        .animate-gradient   { background-size: 200% 200%; animation: gradient-shift 4s ease infinite; }
        .animate-aurora     { animation: aurora 20s linear infinite; }
        .animate-shimmer    { animation: shimmer 2s ease-in-out infinite; }
        .animate-slideInLeft  { animation: slideInLeft 0.8s ease-out forwards; }
        .animate-slideInRight { animation: slideInRight 0.8s ease-out forwards; }
        .animate-bounce-subtle { animation: bounce-subtle 2s ease-in-out infinite; }
        .animate-spin-slow  { animation: spin-slow 30s linear infinite; }

        /* ===== GLASSMORPHISM ===== */
        .glass {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }
        .glass-dark {
            background: rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.8);
        }

        /* ===== GRADIENT TEXT ===== */
        .gradient-text {
            background: linear-gradient(135deg, #14b8a6, #06b6d4, #0ea5e9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ===== CUSTOM SCROLLBAR ===== */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: linear-gradient(to bottom, #14b8a6, #06b6d4); border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: linear-gradient(to bottom, #0d9488, #0891b2); }

        /* ===== CARD HOVER GLOW ===== */
        .card-glow {
            position: relative;
            overflow: hidden;
        }
        .card-glow::before {
            content: '';
            position: absolute;
            top: -2px; left: -2px; right: -2px; bottom: -2px;
            background: linear-gradient(45deg, #14b8a6, #06b6d4, #8b5cf6, #14b8a6);
            background-size: 400% 400%;
            z-index: -1;
            border-radius: inherit;
            animation: gradient-shift 4s ease infinite;
            opacity: 0;
            transition: opacity 0.5s ease;
        }
        .card-glow:hover::before { opacity: 1; }
    </style>
</head>

<body class="bg-gray-50 antialiased">

    @include('partials.navbar')

    @yield('content')

    @include('partials.footer')

    <!-- i18n Translation System -->
    <script>
        const translations = {
            // ===== NAVBAR =====
            'nav.home': { id: 'Home', en: 'Home' },
            'nav.paket': { id: 'Paket Internet', en: 'Internet Plans' },
            'nav.bayar': { id: 'Bayar Tagihan', en: 'Pay Bills' },
            'nav.kontak': { id: 'Kontak', en: 'Contact' },
            'nav.pengaduan': { id: 'Pengaduan', en: 'Report Issue' },

            // ===== HOME =====
            'home.badge': { id: 'Internet Provider Terpercaya', en: 'Trusted Internet Provider' },
            'home.hero.1': { id: 'Internet', en: 'Fast' },
            'home.hero.2': { id: ' Cepat', en: ' Internet' },
            'home.hero.3': { id: 'Untuk Rumah', en: 'For Your' },
            'home.hero.4': { id: 'Anda', en: 'Home' },
            'home.hero.desc': { id: 'Nikmati koneksi stabil hingga <span class="text-teal-400 font-semibold">30 Mbps</span> untuk gaming, streaming, dan bekerja dari rumah tanpa hambatan.', en: 'Enjoy stable connection up to <span class="text-teal-400 font-semibold">30 Mbps</span> for gaming, streaming, and work from home without interruption.' },
            'home.btn.paket': { id: 'Lihat Paket', en: 'View Plans' },
            'home.btn.login': { id: 'Login Pelanggan', en: 'Customer Login' },
            'home.trust.1': { id: 'Tanpa Kontrak', en: 'No Contract' },
            'home.trust.2': { id: 'Support 24/7', en: '24/7 Support' },

            // Stats
            'home.stat.pelanggan': { id: 'Pelanggan Aktif', en: 'Active Customers' },
            'home.stat.uptime': { id: 'Uptime Jaringan', en: 'Network Uptime' },
            'home.stat.support': { id: 'Support Online', en: 'Online Support' },
            'home.stat.speed': { id: 'Kecepatan Max', en: 'Max Speed' },

            // Keunggulan
            'home.why.label': { id: 'Keunggulan Kami', en: 'Our Advantages' },
            'home.why.title': { id: 'Kenapa Pilih <span class="gradient-text">Star Connect</span>?', en: 'Why Choose <span class="gradient-text">Star Connect</span>?' },
            'home.why.desc': { id: 'Kami memberikan layanan internet terbaik dengan harga terjangkau dan dukungan teknisi profesional.', en: 'We provide the best internet service with affordable prices and professional technician support.' },
            'home.why.stabil.title': { id: 'Sangat Stabil', en: 'Very Stable' },
            'home.why.stabil.desc': { id: 'Koneksi stabil 24 jam tanpa putus. Nikmati pengalaman online tanpa hambatan apapun cuacanya.', en: 'Stable 24-hour connection without interruption. Enjoy seamless online experience in any weather.' },
            'home.why.cepat.title': { id: 'Super Cepat', en: 'Super Fast' },
            'home.why.cepat.desc': { id: 'Kecepatan tinggi untuk semua aktivitas. Download, upload, dan streaming lancar tanpa buffering.', en: 'High speed for all activities. Download, upload, and stream smoothly without buffering.' },
            'home.why.murah.title': { id: 'Harga Terjangkau', en: 'Affordable Price' },
            'home.why.murah.desc': { id: 'Harga jujur dengan kualitas premium. Pas di kantong untuk keluarga dan semua kalangan.', en: 'Honest pricing with premium quality. Budget-friendly for families and everyone.' },
            'home.why.more': { id: 'Pelajari Lebih', en: 'Learn More' },

            // Router
            'home.router.label': { id: 'Perangkat Berkualitas', en: 'Quality Devices' },
            'home.router.title': { id: 'Router <span class="gradient-text">Premium</span> Untuk Koneksi Maksimal', en: '<span class="gradient-text">Premium</span> Router For Maximum Connection' },
            'home.router.desc': { id: 'Nikmati koneksi internet cepat dan stabil untuk kebutuhan rumah setiap hari. Cocok untuk streaming, gaming, meeting online, dan aktivitas digital tanpa hambatan.', en: 'Enjoy fast and stable internet for your daily home needs. Perfect for streaming, gaming, online meetings, and digital activities without interruption.' },
            'home.router.f1': { id: 'Didukung teknisi profesional Star Connect', en: 'Supported by professional Star Connect technicians' },
            'home.router.f2': { id: 'Layanan support siap membantu kapan saja', en: 'Support service ready to help anytime' },
            'home.router.f3': { id: 'Gratis instalasi dan setting router', en: 'Free installation and router setup' },

            // Paket Section (Home)
            'home.paket.label': { id: 'Pilihan Paket', en: 'Plan Options' },
            'home.paket.title': { id: 'Paket Internet <span class="gradient-text">Starconect</span>', en: 'Starconect <span class="gradient-text">Internet Plans</span>' },
            'home.paket.desc': { id: 'Pilih paket yang sesuai kebutuhan Anda. Semua paket sudah termasuk unlimited internet.', en: 'Choose the plan that suits your needs. All plans include unlimited internet.' },
            'home.paket.btn': { id: 'Berlangganan Sekarang', en: 'Subscribe Now' },
            'home.paket.perbulan': { id: 'per bulan', en: 'per month' },

            // Testimonial
            'home.testi.label': { id: 'Testimoni', en: 'Testimonials' },
            'home.testi.title': { id: 'Apa Kata <span class="gradient-text">Pelanggan</span> Kami?', en: 'What Our <span class="gradient-text">Customers</span> Say?' },
            'home.testi.1': { id: '"Internet nya mantap, stabil banget buat kerja dari rumah. Streaming juga lancar, gak pernah buffering. Recommended!"', en: '"The internet is great, very stable for working from home. Streaming is also smooth, never buffering. Recommended!"' },
            'home.testi.2': { id: '"Harga terjangkau tapi kualitas top. Anak-anak bisa belajar online, saya juga bisa meeting video call tanpa masalah."', en: '"Affordable price but top quality. Kids can study online, I can also do video call meetings without problems."' },
            'home.testi.3': { id: '"Gaming pake Star Connect anti lag. Main Mobile Legend, PUBG, Free Fire lancar jaya. Support nya juga fast response banget!"', en: '"Gaming with Star Connect is lag-free. Playing Mobile Legend, PUBG, Free Fire runs perfectly. Support is also super responsive!"' },

            // CTA
            'home.cta.badge': { id: '🚀 Promo Spesial', en: '🚀 Special Promo' },
            'home.cta.title': { id: 'Ayo Pasang <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-300 to-cyan-300">Sekarang Juga</span>', en: 'Install <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-300 to-cyan-300">Right Now</span>' },
            'home.cta.desc': { id: 'Pasang sekarang cukup 150K, daftar hari ini langsung aktif hari ini juga. Gratis instalasi!', en: 'Install now for only 150K, register today and get activated today. Free installation!' },
            'home.cta.btn': { id: 'DAFTAR SEKARANG', en: 'REGISTER NOW' },

            // ===== PAKET PAGE =====
            'paket.badge': { id: '✨ Pilihan Paket', en: '✨ Plan Options' },
            'paket.title': { id: 'Paket Internet <span class="gradient-text">Starconect</span>', en: 'Starconect <span class="gradient-text">Internet Plans</span>' },
            'paket.desc': { id: 'Nikmati koneksi internet cepat, stabil, dan tanpa batas untuk kebutuhan rumah, gaming, streaming, dan bisnis.', en: 'Enjoy fast, stable, and unlimited internet for home, gaming, streaming, and business needs.' },
            'paket.btn': { id: 'Berlangganan Sekarang', en: 'Subscribe Now' },
            'paket.perbulan': { id: 'per bulan', en: 'per month' },
            'paket.faq.title': { id: 'Pertanyaan Seputar <span class="gradient-text">Paket</span>', en: 'Questions About <span class="gradient-text">Plans</span>' },
            'paket.faq.desc': { id: 'Temukan jawaban untuk pertanyaan yang sering ditanyakan pelanggan kami.', en: 'Find answers to frequently asked questions from our customers.' },
            'paket.faq.q1': { id: 'Apakah ada biaya pemasangan?', en: 'Is there an installation fee?' },
            'paket.faq.a1': { id: 'Gratis biaya instalasi dan peminjaman perangkat router selama berlangganan.', en: 'Free installation and router device lending during subscription.' },
            'paket.faq.q2': { id: 'Apakah ada batasan kuota (FUP)?', en: 'Is there a data cap (FUP)?' },
            'paket.faq.a2': { id: 'Semua paket kami adalah Unlimited tanpa FUP. Anda bebas menggunakan internet tanpa khawatir kecepatan turun atau kuota habis.', en: 'All our plans are Unlimited without FUP. You are free to use the internet without worrying about speed reduction or data running out.' },
            'paket.faq.q3': { id: 'Berapa lama proses pemasangan?', en: 'How long is the installation process?' },
            'paket.faq.a3': { id: 'Proses pemasangan bisa dilakukan pada hari yang sama atau maksimal H+1 setelah pendaftaran dan survei lokasi disetujui.', en: 'Installation can be done on the same day or maximum D+1 after registration and location survey is approved.' },
            'paket.cta.title': { id: 'Tentukan Pilihanmu Sekarang', en: 'Choose Your Plan Now' },
            'paket.cta.desc': { id: 'Dapatkan promo menarik khusus pemasangan bulan ini. Segera hubungi admin kami.', en: 'Get special installation promo this month. Contact our admin now.' },
            'paket.cta.btn': { id: 'HUBUNGI ADMIN', en: 'CONTACT ADMIN' },

            // ===== KONTAK PAGE =====
            'kontak.title': { id: 'Hubungi <span class="gradient-text">Kami</span>', en: 'Contact <span class="gradient-text">Us</span>' },
            'kontak.desc': { id: 'Tim Star Connect siap membantu pemasangan internet, konsultasi paket, dan penanganan gangguan jaringan dengan cepat.', en: 'Star Connect team is ready to help with internet installation, plan consultation, and quick network troubleshooting.' },
            'kontak.info.title': { id: 'Informasi Kontak', en: 'Contact Information' },
            'kontak.info.role': { id: 'Admin Starconnect', en: 'Starconnect Admin' },
            'kontak.info.wa.label': { id: 'WhatsApp / Telepon', en: 'WhatsApp / Phone' },
            'kontak.info.alamat.label': { id: 'Alamat', en: 'Address' },
            'kontak.info.alamat.value': { id: 'Tanjung, Kab. Brebes, Jawa Tengah', en: 'Tanjung, Brebes Regency, Central Java' },
            'kontak.info.btn': { id: 'Hubungi via WhatsApp', en: 'Contact via WhatsApp' },
            'kontak.lokasi.title': { id: 'Lokasi Kami', en: 'Our Location' },

            // ===== PENGADUAN PAGE =====
            'pengaduan.badge': { id: 'Pusat Bantuan Pelanggan', en: 'Customer Support Center' },
            'pengaduan.title': { id: 'Laporan <span class="text-transparent bg-clip-text bg-gradient-to-r from-white to-teal-100">Gangguan</span>', en: 'Issue <span class="text-transparent bg-clip-text bg-gradient-to-r from-white to-teal-100">Report</span>' },
            'pengaduan.desc': { id: 'Sampaikan kendala internet Anda. Tim teknisi kami siap merespons dalam waktu singkat.', en: 'Submit your internet issue. Our technician team is ready to respond quickly.' },
            'pengaduan.stat.support': { id: 'Support', en: 'Support' },
            'pengaduan.stat.respon': { id: 'Respon', en: 'Response' },
            'pengaduan.stat.gratis': { id: 'Gratis', en: 'Free' },
            'pengaduan.left.title': { id: 'Laporkan<br>Masalah Anda', en: 'Report<br>Your Issue' },
            'pengaduan.left.desc': { id: 'Ceritakan kendala jaringan internet Anda secara detail agar tim kami dapat membantu lebih cepat.', en: 'Describe your internet issue in detail so our team can help faster.' },
            'pengaduan.left.f1.title': { id: 'Respon Cepat', en: 'Fast Response' },
            'pengaduan.left.f1.desc': { id: 'Direspons dalam <2 jam', en: 'Responded within <2 hours' },
            'pengaduan.left.f2.title': { id: 'Teknisi Profesional', en: 'Professional Technicians' },
            'pengaduan.left.f2.desc': { id: 'Berpengalaman & tersertifikasi', en: 'Experienced & certified' },
            'pengaduan.left.f3.title': { id: 'Dihubungi via WA', en: 'Contacted via WA' },
            'pengaduan.left.f3.desc': { id: 'Update status langsung di WA', en: 'Status updates directly on WA' },
            'pengaduan.left.bottom': { id: 'Layanan pengaduan tersedia 24 jam sehari, 7 hari seminggu', en: 'Support service available 24 hours a day, 7 days a week' },
            'pengaduan.form.label': { id: 'Form Pengaduan', en: 'Report Form' },
            'pengaduan.form.title': { id: 'Isi Detail Laporan', en: 'Fill Report Details' },
            'pengaduan.form.required': { id: 'Semua field bertanda <span class="text-teal-500">*</span> wajib diisi', en: 'All fields marked <span class="text-teal-500">*</span> are required' },
            'pengaduan.form.nama': { id: 'Nama Lengkap', en: 'Full Name' },
            'pengaduan.form.nama.ph': { id: 'Masukkan nama lengkap Anda', en: 'Enter your full name' },
            'pengaduan.form.wa': { id: 'Nomor WhatsApp', en: 'WhatsApp Number' },
            'pengaduan.form.jenis': { id: 'Jenis Gangguan', en: 'Issue Type' },
            'pengaduan.form.deskripsi': { id: 'Deskripsi Masalah', en: 'Issue Description' },
            'pengaduan.form.deskripsi.ph': { id: 'Jelaskan kendala internet Anda secara detail...', en: 'Describe your internet issue in detail...' },
            'pengaduan.form.btn': { id: 'Kirim Laporan Gangguan', en: 'Submit Issue Report' },
            'pengaduan.form.privacy': { id: 'Data Anda aman dan hanya digunakan untuk keperluan perbaikan', en: 'Your data is safe and only used for repair purposes' },
            'pengaduan.steps.label': { id: 'Proses Penanganan Laporan', en: 'Report Handling Process' },

            // ===== FOOTER =====
            'footer.desc': { id: 'Internet cepat, stabil, dan tanpa batas untuk mendukung semua aktivitas digital Anda dari rumah.', en: 'Fast, stable, and unlimited internet to support all your digital activities from home.' },
            'footer.nav.title': { id: 'Navigasi', en: 'Navigation' },
            'footer.nav.home': { id: 'Beranda', en: 'Home' },
            'footer.nav.paket': { id: 'Paket Internet', en: 'Internet Plans' },
            'footer.nav.bayar': { id: 'Bayar Tagihan', en: 'Pay Bills' },
            'footer.nav.pengaduan': { id: 'Lapor Gangguan', en: 'Report Issue' },
            'footer.kontak.title': { id: 'Hubungi Kami', en: 'Contact Us' },
            'footer.kontak.alamat': { id: 'Jl. Luwunggede-Mundu, Tanjung, Kab. Brebes', en: 'Luwunggede-Mundu St., Tanjung, Brebes Regency' },
            'footer.payment.title': { id: 'Metode Pembayaran', en: 'Payment Methods' },
            'footer.copyright': { id: '© ' + new Date().getFullYear() + ' Star Connect. All Rights Reserved.', en: '© ' + new Date().getFullYear() + ' Star Connect. All Rights Reserved.' },
        };

        let currentLang = localStorage.getItem('starconnect_lang') || 'id';

        function applyTranslations() {
            document.querySelectorAll('[data-i18n]').forEach(el => {
                const key = el.getAttribute('data-i18n');
                if (translations[key] && translations[key][currentLang]) {
                    el.innerHTML = translations[key][currentLang];
                }
            });
            // Update placeholder translations
            document.querySelectorAll('[data-i18n-ph]').forEach(el => {
                const key = el.getAttribute('data-i18n-ph');
                if (translations[key] && translations[key][currentLang]) {
                    el.placeholder = translations[key][currentLang];
                }
            });
            // Update button labels
            updateLangButtons();
        }

        function updateLangButtons() {
            const flag = currentLang === 'id' ? '🇮🇩' : '🇬🇧';
            const label = currentLang === 'id' ? 'ID' : 'EN';
            // Desktop
            const df = document.getElementById('lang-flag');
            const dl = document.getElementById('lang-label');
            if (df) df.textContent = flag;
            if (dl) dl.textContent = label;
            // Mobile
            const mf = document.getElementById('lang-flag-mobile');
            const ml = document.getElementById('lang-label-mobile');
            if (mf) mf.textContent = flag;
            if (ml) ml.textContent = label;
        }

        function toggleLanguage() {
            currentLang = currentLang === 'id' ? 'en' : 'id';
            localStorage.setItem('starconnect_lang', currentLang);
            applyTranslations();
        }

        // Apply on load
        document.addEventListener('DOMContentLoaded', () => {
            applyTranslations();
        });
    </script>

    <!-- Scroll Reveal Observer -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                    }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

            document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

            // Counter animation
            document.querySelectorAll('[data-count]').forEach(el => {
                const countObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const target = parseInt(el.getAttribute('data-count'));
                            const suffix = el.getAttribute('data-suffix') || '';
                            const prefix = el.getAttribute('data-prefix') || '';
                            let current = 0;
                            const increment = target / 60;
                            const timer = setInterval(() => {
                                current += increment;
                                if (current >= target) {
                                    current = target;
                                    clearInterval(timer);
                                }
                                el.textContent = prefix + Math.floor(current) + suffix;
                            }, 25);
                            countObserver.unobserve(el);
                        }
                    });
                }, { threshold: 0.5 });
                countObserver.observe(el);
            });
        });
    </script>

    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js').then(registration => {
                    console.log('ServiceWorker registration successful');
                }).catch(err => {
                    console.log('ServiceWorker registration failed: ', err);
                });
            });
        }
    </script>
</body>

</html>