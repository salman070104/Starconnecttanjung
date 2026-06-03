<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Star Connect — Internet cepat, stabil, dan terjangkau untuk rumah Anda di Tanjung, Brebes.">
    <title>STARCONECT TANJUNG</title>

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

</body>

</html>