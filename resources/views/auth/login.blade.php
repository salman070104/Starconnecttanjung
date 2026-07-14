<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login StarConnect</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}?v=2">

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body
    class="bg-gradient-to-br from-cyan-600 via-teal-600 to-emerald-600 min-h-screen flex items-center justify-center p-6">

    <div class="bg-white w-full max-w-6xl rounded-3xl shadow-2xl overflow-hidden grid lg:grid-cols-2">

        <!-- KIRI -->
        <div
            class="hidden lg:flex flex-col justify-center items-center bg-gradient-to-br from-teal-500 to-cyan-600 p-10 text-white relative overflow-hidden">

            <div
                class="absolute top-0 left-0 w-72 h-72 bg-white/10 rounded-full -translate-x-20 -translate-y-20">
            </div>

            <div
                class="absolute bottom-0 right-0 w-96 h-96 bg-white/10 rounded-full translate-x-24 translate-y-24">
            </div>

            <img src="{{ asset('logo.png') }}"
                alt="wifi"
                class="w-72 relative z-10 drop-shadow-2xl">

            <h1 class="text-4xl font-bold mt-10 relative z-10 text-center">
                STARCONNECT
            </h1>

            <p class="mt-4 text-lg text-center text-cyan-100 relative z-10 max-w-md leading-relaxed">

                Sistem pembayaran internet modern untuk pelanggan StarConnect
                dengan akses cepat, aman, dan mudah digunakan.

            </p>

        </div>

        <!-- KANAN -->
        <div class="p-8 lg:p-14 flex items-center">

            <div class="w-full">

                <!-- JUDUL -->
                <div class="mb-8">

                    <h2 class="text-4xl font-bold text-gray-800">
                        Form Login
                    </h2>

                    <p class="text-gray-500 mt-3 text-lg">
                        Masukkan kredensial Anda untuk masuk
                    </p>

                </div>

                <!-- ROLE TOGGLE -->
                <div class="flex bg-gray-100 p-1 rounded-2xl mb-8 relative">
                    <!-- The sliding background indicator -->
                    <div id="role-indicator" class="absolute top-1 left-1 bottom-1 w-[calc(50%-4px)] bg-teal-500 rounded-xl transition-all duration-300 ease-in-out shadow-md"></div>
                    
                    <button type="button" id="btn-pelanggan" onclick="selectRole('pelanggan')" class="flex-1 text-center py-3 rounded-xl font-bold text-sm relative z-10 transition-colors text-white">
                        Pelanggan
                    </button>
                    <button type="button" id="btn-admin" onclick="selectRole('admin')" class="flex-1 text-center py-3 rounded-xl font-bold text-sm relative z-10 transition-colors text-gray-500 hover:text-gray-700">
                        Admin
                    </button>
                </div>

                <!-- ERROR -->
                @if(session('error'))

                <div
                    class="bg-red-100 border border-red-300 text-red-600 px-5 py-4 rounded-2xl mb-6 text-sm">

                    {{ session('error') }}

                </div>

                @endif

                <!-- FORM -->
                <form method="POST" action="/login">
                    @csrf
                    <input type="hidden" name="role" id="login-role" value="pelanggan">

                    <!-- USERNAME / EMAIL -->
                    <div class="mb-6">

                        <label class="block text-gray-700 font-medium mb-3">
                            Username / Email
                        </label>

                        <input
                            type="text"
                            name="username"
                            placeholder="Masukkan username atau email terdaftar"
                            class="w-full border border-gray-300 rounded-2xl px-5 py-4 focus:outline-none focus:ring-4 focus:ring-cyan-300 transition" required>

                    </div>

                    <!-- PASSWORD -->
                    <div class="mb-6">

                        <label class="block text-gray-700 font-medium mb-3">
                            Password
                        </label>

                        <div class="relative w-full">
                            <input
                                type="password"
                                name="password"
                                id="login_password"
                                placeholder="Masukkan password"
                                class="w-full border border-gray-300 rounded-2xl pl-5 pr-14 py-4 focus:outline-none focus:ring-4 focus:ring-cyan-300 transition">
                            <button type="button" onclick="togglePasswordVisibility('login_password', this)" 
                                class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 focus:outline-none transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>

                    </div>

                    <!-- REMEMBER -->
                    <div class="flex items-center justify-between mb-8">

                        <label class="flex items-center gap-2 text-gray-600">

                            <input type="checkbox" class="rounded">

                            Remember me

                        </label>

                        <a href="https://wa.me/6281929442611?text=Halo%20Admin%20StarConnect,%20saya%20lupa%20password%20akun%20saya"
                            target="_blank"
                            class="text-cyan-600 hover:text-cyan-800 font-medium">

                            Lupa password?

                        </a>

                    </div>

                    <!-- BUTTON -->
                    <button
                        type="submit"
                        class="w-full bg-gradient-to-r from-cyan-500 to-teal-500 hover:from-cyan-600 hover:to-teal-600 text-white py-4 rounded-2xl font-semibold text-lg shadow-lg transition duration-300 mb-4">

                        Masuk

                    </button>

                    <!-- DIVIDER -->
                    <div class="relative flex py-2 items-center mb-4">
                        <div class="flex-grow border-t border-gray-300"></div>
                        <span class="flex-shrink-0 mx-4 text-gray-400 text-sm">Atau</span>
                        <div class="flex-grow border-t border-gray-300"></div>
                    </div>

                    <!-- GOOGLE LOGIN -->
                    <a href="{{ route('auth.google') }}"
                        class="w-full bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 py-4 rounded-2xl font-medium text-lg flex items-center justify-center gap-3 transition duration-300">
                        <svg class="w-6 h-6" viewBox="0 0 24 24">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                        Login dengan Google
                    </a>

                </form>

                <!-- COPYRIGHT -->
                <div class="mt-10 text-center text-gray-500 text-sm">

                    © 2026 STARCONNECT Payment System

                </div>

            </div>

        </div>

    </div>

    <script>
        function togglePasswordVisibility(inputId, button) {
            const input = document.getElementById(inputId);
            if (input.type === 'password') {
                input.type = 'text';
                button.innerHTML = `
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                    </svg>
                `;
            } else {
                input.type = 'password';
                button.innerHTML = `
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                `;
            }
        }

        function selectRole(role) {
            const indicator = document.getElementById('role-indicator');
            const btnPelanggan = document.getElementById('btn-pelanggan');
            const btnAdmin = document.getElementById('btn-admin');
            const inputRole = document.getElementById('login-role');
            
            // Set hidden input value
            inputRole.value = role;

            if (role === 'pelanggan') {
                // Move indicator to left
                indicator.style.transform = 'translateX(0)';
                
                // Style text
                btnPelanggan.classList.replace('text-gray-500', 'text-white');
                btnPelanggan.classList.remove('hover:text-gray-700');
                
                btnAdmin.classList.replace('text-white', 'text-gray-500');
                btnAdmin.classList.add('hover:text-gray-700');
            } else {
                // Move indicator to right
                // 100% of parent width, minus its own width. Since it's exactly 50% width, translateX(100%) works perfectly
                indicator.style.transform = 'translateX(100%)';
                
                // Style text
                btnAdmin.classList.replace('text-gray-500', 'text-white');
                btnAdmin.classList.remove('hover:text-gray-700');
                
                btnPelanggan.classList.replace('text-white', 'text-gray-500');
                btnPelanggan.classList.add('hover:text-gray-700');
            }
        }
    </script>
</body>

</html>