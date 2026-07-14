<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — StarConnect</title>
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
    class="bg-gradient-to-br from-slate-800 via-blue-900 to-indigo-900 min-h-screen flex items-center justify-center p-6">

    <div class="bg-white w-full max-w-6xl rounded-3xl shadow-2xl overflow-hidden grid lg:grid-cols-2">

        <!-- KIRI -->
        <div
            class="hidden lg:flex flex-col justify-center items-center bg-gradient-to-br from-blue-600 to-indigo-700 p-10 text-white relative overflow-hidden">

            <div
                class="absolute top-0 left-0 w-72 h-72 bg-white/10 rounded-full -translate-x-20 -translate-y-20">
            </div>

            <div
                class="absolute bottom-0 right-0 w-96 h-96 bg-white/10 rounded-full translate-x-24 translate-y-24">
            </div>

            <img src="{{ asset('logo.png') }}"
                alt="StarConnect Logo"
                class="w-72 relative z-10 drop-shadow-2xl">

            <h1 class="text-4xl font-bold mt-10 relative z-10 text-center">
                STARCONNECT
            </h1>

            <p class="mt-4 text-lg text-center text-blue-200 relative z-10 max-w-md leading-relaxed">
                Panel Admin — Kelola pelanggan, pembayaran, dan laporan gangguan dengan mudah.
            </p>

        </div>

        <!-- KANAN -->
        <div class="p-8 lg:p-14 flex items-center">

            <div class="w-full">

                <!-- JUDUL -->
                <div class="mb-10">

                    <div class="inline-flex items-center gap-2 bg-blue-50 text-blue-600 text-sm font-semibold px-4 py-2 rounded-full mb-4">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                        Administrator
                    </div>

                    <h2 class="text-4xl font-bold text-gray-800">
                        Login Admin
                    </h2>

                    <p class="text-gray-500 mt-3 text-lg">
                        Masukkan kredensial administrator Anda
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
                <form method="POST" action="{{ route('admin.login.post') }}">

                    @csrf

                    <!-- USERNAME / EMAIL -->
                    <div class="mb-6">

                        <label class="block text-gray-700 font-medium mb-3">
                            Username / Email
                        </label>

                        <input
                            type="text"
                            name="username"
                            placeholder="Masukkan username atau email admin"
                            class="w-full border border-gray-300 rounded-2xl px-5 py-4 focus:outline-none focus:ring-4 focus:ring-blue-300 transition" required>

                    </div>

                    <!-- PASSWORD -->
                    <div class="mb-8">

                        <label class="block text-gray-700 font-medium mb-3">
                            Password
                        </label>

                        <div class="relative w-full">
                            <input
                                type="password"
                                name="password"
                                id="admin_password"
                                placeholder="Masukkan password"
                                class="w-full border border-gray-300 rounded-2xl pl-5 pr-14 py-4 focus:outline-none focus:ring-4 focus:ring-blue-300 transition" required>
                            <button type="button" onclick="togglePasswordVisibility('admin_password', this)" 
                                class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 focus:outline-none transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>

                    </div>

                    <!-- BUTTON -->
                    <button
                        type="submit"
                        class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white py-4 rounded-2xl font-semibold text-lg shadow-lg transition duration-300">

                        Masuk sebagai Admin

                    </button>

                </form>

                <!-- BACK TO HOME -->
                <div class="mt-6 text-center">
                    <a href="/" class="text-gray-500 hover:text-blue-600 text-sm font-medium transition">
                        ← Kembali ke Beranda
                    </a>
                </div>

                <!-- COPYRIGHT -->
                <div class="mt-8 text-center text-gray-500 text-sm">

                    © 2026 STARCONNECT Admin Panel

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
