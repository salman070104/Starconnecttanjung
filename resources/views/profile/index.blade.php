<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Akun - StarConnect</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8fafc; }
        .gradient-text { background-clip: text; -webkit-background-clip: text; color: transparent; background-image: linear-gradient(to right, #0d9488, #06b6d4); }
    </style>
</head>
<body class="antialiased min-h-screen flex flex-col">

    <!-- Topbar -->
    <nav class="bg-white shadow-sm border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-4">
                    <a href="{{ $role === 'admin' ? '/admin' : '/dashboard' }}" class="w-10 h-10 bg-gray-50 rounded-full flex items-center justify-center text-gray-500 hover:bg-teal-50 hover:text-teal-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    </a>
                    <h1 class="text-xl font-bold text-gray-800">Pengaturan <span class="gradient-text">Akun</span></h1>
                </div>
                <div class="text-sm font-medium text-gray-500 bg-gray-100 px-3 py-1 rounded-full uppercase tracking-wider">
                    Role: {{ $role }}
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1 max-w-4xl w-full mx-auto px-4 py-8 sm:px-6 lg:px-8">
        
        <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden">
            <form id="foto-form" action="{{ route('profile.uploadFoto') }}" method="POST" enctype="multipart/form-data" class="hidden">
                @csrf
                <input type="file" id="foto-upload" name="foto" accept="image/*" onchange="document.getElementById('foto-form').submit()">
            </form>
            
            <!-- Header -->
            <div class="bg-gradient-to-br from-teal-500 to-cyan-500 p-8 sm:p-10 relative overflow-hidden">
                <div class="absolute inset-0 bg-white/10" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 20px 20px;"></div>
                <div class="relative z-10 flex items-center gap-6">
                    <div class="w-20 h-20 rounded-2xl bg-white shadow-lg flex items-center justify-center text-3xl font-black text-teal-600 overflow-hidden relative group">
                        @if($user->foto)
                            <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto Profil" class="w-full h-full object-cover">
                        @else
                            {{ strtoupper(substr($user->name ?? $user->nama, 0, 1)) }}
                        @endif
                        <label for="foto-upload" class="absolute inset-0 bg-black/50 text-white flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 cursor-pointer transition-opacity" title="Ubah Foto">
                            <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span class="text-[10px] font-medium">Ubah</span>
                        </label>
                    </div>
                    <div class="text-white">
                        <h2 class="text-2xl font-bold">{{ $user->name ?? $user->nama }}</h2>
                        <p class="text-teal-50 mt-1 opacity-90">{{ $user->username }}</p>
                    </div>
                </div>
            </div>

            <!-- Email Section -->
            <div class="p-8 sm:p-10">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Alamat Email</h3>
                        <p class="text-sm text-gray-500">Gunakan email untuk pemulihan akun atau menerima notifikasi.</p>
                    </div>
                    @if($user->email)
                        <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 px-3 py-1 rounded-full text-xs font-bold border border-emerald-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Tertaut
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-bold border border-gray-200">
                            Belum Tertaut
                        </span>
                    @endif
                </div>

                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                    <form id="email-form" onsubmit="requestOtp(event)">
                        @csrf
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email Saat Ini</label>
                        <div class="flex gap-4 items-start">
                            <div class="relative flex-1">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <input type="email" id="email" required value="{{ $user->email }}" placeholder="Masukkan email aktif..." 
                                    class="w-full pl-11 pr-4 py-3 bg-white border border-gray-200 rounded-xl text-gray-800 focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 transition-colors">
                                <p id="email-msg" class="text-xs text-red-500 mt-2 hidden"></p>
                            </div>
                            <button type="submit" id="btn-request-otp" class="bg-gray-900 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:bg-gray-800 transition-colors flex items-center gap-2">
                                <span>Perbarui</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal OTP -->
    <div id="otp-modal" class="fixed inset-0 z-[100] hidden">
        <div class="absolute inset-0 bg-gray-900/60 backdrop-blur-sm" onclick="closeOtpModal()"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-sm px-4">
            <div class="bg-white rounded-3xl shadow-2xl p-8 text-center relative overflow-hidden animate-bounce-in">
                <div class="w-16 h-16 bg-teal-50 text-teal-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-inner">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Verifikasi Email</h3>
                <p class="text-sm text-gray-500 mb-6">Kami telah mengirimkan 6 digit kode OTP ke email Anda.</p>
                
                <form id="otp-form" onsubmit="verifyOtp(event)">
                    <input type="text" id="otp-code" maxlength="6" required autocomplete="off" placeholder="------" 
                        class="w-full text-center text-3xl tracking-[0.5em] font-black text-gray-800 bg-gray-50 border border-gray-200 rounded-xl py-4 focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 transition-colors mb-4">
                    <p id="otp-msg" class="text-xs text-red-500 mb-4 hidden"></p>
                    
                    <button type="submit" id="btn-verify-otp" class="w-full bg-gradient-to-r from-teal-500 to-cyan-500 text-white font-bold py-3.5 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all">
                        Verifikasi
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Alert Toast -->
    <div id="toast" class="fixed top-5 right-5 z-[200] transform translate-x-full transition-transform duration-300 flex items-center gap-3 bg-gray-900 text-white px-5 py-4 rounded-xl shadow-2xl">
        <svg id="toast-icon-success" class="w-5 h-5 text-emerald-400 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        <svg id="toast-icon-error" class="w-5 h-5 text-red-400 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        <span id="toast-msg" class="text-sm font-medium"></span>
    </div>

    <script>
        function showToast(message, type = 'success') {
            const toast = document.getElementById('toast');
            document.getElementById('toast-msg').innerText = message;
            document.getElementById('toast-icon-success').classList.toggle('hidden', type !== 'success');
            document.getElementById('toast-icon-error').classList.toggle('hidden', type !== 'error');
            toast.classList.remove('translate-x-full');
            setTimeout(() => toast.classList.add('translate-x-full'), 3000);
        }

        function openOtpModal() {
            document.getElementById('otp-modal').classList.remove('hidden');
            document.getElementById('otp-code').value = '';
            document.getElementById('otp-code').focus();
        }

        function closeOtpModal() {
            document.getElementById('otp-modal').classList.add('hidden');
        }

        // Show flash messages if exists
        @if(session('success'))
            showToast("{{ session('success') }}", 'success');
        @endif

        @if(session('error'))
            showToast("{{ session('error') }}", 'error');
        @endif

        @if($errors->any())
            showToast("{{ $errors->first() }}", 'error');
        @endif

        async function requestOtp(e) {
            e.preventDefault();
            const btn = document.getElementById('btn-request-otp');
            const email = document.getElementById('email').value;
            const msg = document.getElementById('email-msg');
            
            msg.classList.add('hidden');
            btn.disabled = true;
            btn.innerHTML = `<svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>`;

            try {
                const res = await fetch('/profile/request-otp', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ email })
                });
                const data = await res.json();
                
                if (data.success) {
                    showToast(data.message, 'success');
                    openOtpModal();
                } else {
                    msg.innerText = data.message;
                    msg.classList.remove('hidden');
                }
            } catch (err) {
                msg.innerText = 'Terjadi kesalahan jaringan.';
                msg.classList.remove('hidden');
            }

            btn.disabled = false;
            btn.innerHTML = `<span>Perbarui</span>`;
        }

        async function verifyOtp(e) {
            e.preventDefault();
            const btn = document.getElementById('btn-verify-otp');
            const otp = document.getElementById('otp-code').value;
            const msg = document.getElementById('otp-msg');
            
            msg.classList.add('hidden');
            btn.disabled = true;
            btn.innerText = 'Memverifikasi...';

            try {
                const res = await fetch('/profile/verify-otp', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ otp })
                });
                const data = await res.json();
                
                if (data.success) {
                    closeOtpModal();
                    showToast(data.message, 'success');
                    setTimeout(() => window.location.reload(), 1500);
                } else {
                    msg.innerText = data.message;
                    msg.classList.remove('hidden');
                }
            } catch (err) {
                msg.innerText = 'Terjadi kesalahan jaringan.';
                msg.classList.remove('hidden');
            }

            btn.disabled = false;
            btn.innerText = 'Verifikasi';
        }
    </script>
</body>
</html>
