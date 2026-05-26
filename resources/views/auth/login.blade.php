<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login StarConnect</title>

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
                <div class="mb-10">

                    <h2 class="text-4xl font-bold text-gray-800">
                        Login Pelanggan
                    </h2>

                    <p class="text-gray-500 mt-3 text-lg">
                        Masukkan username dan password Anda
                    </p>

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

                    <!-- USERNAME -->
                    <div class="mb-6">

                        <label class="block text-gray-700 font-medium mb-3">
                            Username
                        </label>

                        <input
                            type="text"
                            name="username"
                            placeholder="Masukkan username"
                            class="w-full border border-gray-300 rounded-2xl px-5 py-4 focus:outline-none focus:ring-4 focus:ring-cyan-300 transition">

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
                        class="w-full bg-gradient-to-r from-cyan-500 to-teal-500 hover:from-cyan-600 hover:to-teal-600 text-white py-4 rounded-2xl font-semibold text-lg shadow-lg transition duration-300">

                        Masuk

                    </button>

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
    </script>
</body>

</html>