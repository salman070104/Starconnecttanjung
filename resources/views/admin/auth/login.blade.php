<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Admin | STARCONNECT</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}?v=2">

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .mesh-bg {
            background-color: #0f172a;
            background-image: 
                radial-gradient(at 0% 0%, rgba(13, 148, 136, 0.25) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(6, 182, 212, 0.2) 0px, transparent 50%),
                radial-gradient(at 50% 50%, rgba(15, 23, 42, 0.8) 0px, transparent 100%);
        }
    </style>
</head>

<body class="mesh-bg min-h-screen flex items-center justify-center p-4 sm:p-6 text-slate-100 selection:bg-teal-500 selection:text-white">

    <div class="w-full max-w-md">
        
        <!-- Header / Logo -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center p-3 bg-slate-800/80 border border-slate-700/60 rounded-2xl shadow-xl shadow-teal-500/5 backdrop-blur-xl mb-4">
                <img src="{{ asset('logo.png') }}" alt="StarConnect Logo" class="h-10 w-auto object-contain">
            </div>
            
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-teal-500/10 border border-teal-500/30 text-teal-400 text-xs font-semibold tracking-wide uppercase mb-3">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                Area Terbatas Admin
            </div>

            <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                Portal Administrator
            </h1>
            <p class="text-sm text-slate-400 mt-1">
                Silakan autentikasi kredensial untuk mengelola sistem
            </p>
        </div>

        <!-- Card Form -->
        <div class="bg-slate-900/90 border border-slate-800/80 rounded-3xl p-6 sm:p-8 shadow-2xl backdrop-blur-2xl relative overflow-hidden">
            <!-- Glow Accent -->
            <div class="absolute -top-24 -right-24 w-48 h-48 bg-teal-500/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-24 -left-24 w-48 h-48 bg-cyan-500/10 rounded-full blur-3xl pointer-events-none"></div>

            <!-- Alerts -->
            @if(session('error'))
            <div class="flex items-start gap-3 bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3.5 rounded-2xl mb-6 text-sm">
                <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('error') }}</span>
            </div>
            @endif

            @if(session('success'))
            <div class="flex items-start gap-3 bg-teal-500/10 border border-teal-500/30 text-teal-300 px-4 py-3.5 rounded-2xl mb-6 text-sm">
                <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-5">
                @csrf

                <!-- Username or Email -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
                        Username / Email Admin
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <input 
                            type="text" 
                            name="username" 
                            value="{{ old('username') }}" 
                            required 
                            autofocus
                            placeholder="admin / email admin" 
                            class="w-full bg-slate-950/60 border border-slate-800 text-white placeholder-slate-500 text-sm rounded-2xl pl-11 pr-4 py-3.5 focus:outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 transition-all">
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">
                            Kata Sandi
                        </label>
                    </div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </span>
                        <input 
                            type="password" 
                            name="password" 
                            id="admin_password"
                            required 
                            placeholder="••••••••" 
                            class="w-full bg-slate-950/60 border border-slate-800 text-white placeholder-slate-500 text-sm rounded-2xl pl-11 pr-12 py-3.5 focus:outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 transition-all">
                        <button 
                            type="button" 
                            onclick="toggleAdminPassword()"
                            class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-500 hover:text-slate-300 transition-colors">
                            <svg id="eye-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button 
                        type="submit" 
                        class="w-full bg-gradient-to-r from-teal-500 to-cyan-500 hover:from-teal-600 hover:to-cyan-600 active:scale-[0.99] text-white font-semibold py-3.5 px-4 rounded-2xl shadow-lg shadow-teal-500/20 transition-all flex items-center justify-center gap-2">
                        <span>Masuk ke Dashboard</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </div>
            </form>

            <!-- Back to website link -->
            <div class="mt-6 pt-6 border-t border-slate-800/80 text-center">
                <a href="/" class="text-xs text-slate-400 hover:text-teal-400 transition-colors inline-flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Halaman Utama
                </a>
            </div>
        </div>

        <!-- Footer Note -->
        <p class="text-center text-xs text-slate-500 mt-6">
            &copy; 2026 STARCONNECT. Sistem Administrasi & Manajemen Jaringan.
        </p>
    </div>

    <script>
        function toggleAdminPassword() {
            const input = document.getElementById('admin_password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (input.type === 'password') {
                input.type = 'text';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                `;
            } else {
                input.type = 'password';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                `;
            }
        }
    </script>
</body>

</html>
