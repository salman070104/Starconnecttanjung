@extends('admin.layouts.app')

@section('page-title') 
    <span data-lang="id">Pengaturan WhatsApp API</span>
    <span data-lang="en" class="hidden">WhatsApp API Settings</span> 
@endsection

@section('page-subtitle') 
    <span data-lang="id">Konfigurasi Gateway WhatsApp Pihak Ketiga (Wablas)</span>
    <span data-lang="en" class="hidden">Configure Third-Party WhatsApp Gateway (Wablas)</span> 
@endsection

@section('content')

    {{-- Success Alert --}}
    @if (session('success'))
        <div id="alert-success"
            class="mb-6 flex items-center gap-3 bg-emerald-50 border border-emerald-200 dark:bg-emerald-500/10 dark:border-emerald-500/20 text-emerald-700 dark:text-emerald-400 px-5 py-4 rounded-2xl animate-fade-in transition-colors duration-300">
            <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span class="text-sm font-medium">{{ session('success') }}</span>
            <button onclick="document.getElementById('alert-success').remove()" class="ml-auto text-emerald-600 hover:text-emerald-800 dark:text-emerald-400 dark:hover:text-emerald-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 sm:gap-8 items-start">
        
        {{-- Left Column: Brand & Status Summary --}}
        <div class="lg:col-span-1 flex flex-col gap-6">
            
            {{-- Brand Card --}}
            <div class="bg-gradient-to-br from-gray-800 to-slate-900 text-white rounded-3xl p-6 sm:p-8 shadow-xl border border-gray-700/50 relative overflow-hidden group">
                <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-blue-500/10 rounded-full blur-3xl group-hover:bg-blue-500/20 transition-colors duration-500"></div>
                <div class="absolute -left-10 -top-10 w-40 h-40 bg-indigo-500/10 rounded-full blur-3xl group-hover:bg-indigo-500/20 transition-colors duration-500"></div>
                
                <div class="flex flex-col items-center text-center relative z-10">
                    {{-- StarConnect Premium Logo representation --}}
                    <div class="w-16 h-16 rounded-2xl bg-white flex items-center justify-center shadow-lg shadow-blue-500/10 mb-4 overflow-hidden transition-transform duration-300 group-hover:scale-105 p-2">
                        <img src="{{ asset('logo.png') }}" alt="StarConnect Logo" class="w-full h-full object-contain">
                    </div>
                    
                    <h2 class="text-xl font-bold tracking-tight">StarConnect</h2>
                    <p class="text-xs text-blue-300 font-semibold tracking-widest uppercase mt-1">WhatsApp Integration</p>
                    
                    <hr class="w-full border-gray-700/60 my-5">
                    
                    <div class="flex flex-col gap-4 w-full text-left">
                        <div class="flex justify-between items-center bg-gray-900/40 p-3 rounded-xl border border-gray-700/30">
                            <span class="text-xs text-gray-400 font-medium">
                                <span data-lang="id">Status Push Notification</span>
                                <span data-lang="en" class="hidden">Push Notification Status</span>
                            </span>
                            @if($pushNotification === '1')
                                <span class="inline-flex items-center gap-1 bg-green-500/10 text-green-400 text-[10px] font-bold px-2.5 py-1 rounded-full border border-green-500/20 shadow-inner">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-ping"></span>
                                    <span data-lang="id">AKTIF</span>
                                    <span data-lang="en" class="hidden">ACTIVE</span>
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 bg-red-500/10 text-red-400 text-[10px] font-bold px-2.5 py-1 rounded-full border border-red-500/20">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-400"></span>
                                    <span data-lang="id">NONAKTIF</span>
                                    <span data-lang="en" class="hidden">INACTIVE</span>
                                </span>
                            @endif
                        </div>
                        
                        <div class="flex justify-between items-center bg-gray-900/40 p-3 rounded-xl border border-gray-700/30">
                            <span class="text-xs text-gray-400 font-medium">Provider API</span>
                            <span class="text-xs text-indigo-300 font-bold bg-indigo-500/15 px-2.5 py-1 rounded-lg border border-indigo-500/25">Wablas Gateway</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Info Card --}}
            <div class="bg-white dark:bg-gray-800 rounded-3xl p-6 border border-gray-100 dark:border-gray-700 shadow-sm transition-colors duration-300">
                <h3 class="font-bold text-gray-800 dark:text-white flex items-center gap-2 mb-3">
                    <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span data-lang="id">Panduan Integrasi</span>
                    <span data-lang="en" class="hidden">Integration Guide</span>
                </h3>
                <p class="text-xs text-gray-400 leading-relaxed">
                    <span data-lang="id">Gunakan akun dari <strong>Wablas</strong> untuk mengisi kolom API Token dan Domain di sebelah kanan. Pastikan status WhatsApp Anda di Dashboard Wablas dalam kondisi "Connected" agar pesan tagihan dapat terkirim secara otomatis kepada semua pelanggan StarConnect.</span>
                    <span data-lang="en" class="hidden">Use credentials from your <strong>Wablas</strong> account to fill the API Token and Domain fields on the right. Make sure your WhatsApp status in the Wablas Dashboard is "Connected" so invoice statements can be dispatched automatically to all StarConnect customers.</span>
                </p>
            </div>
            
        </div>

        {{-- Right Column: Configurations Form --}}
        <div class="lg:col-span-2">
            <form action="{{ route('admin.whatsapp.update') }}" method="POST" class="bg-white dark:bg-gray-800 rounded-3xl border border-gray-100 dark:border-gray-700 shadow-sm p-6 sm:p-8 transition-colors duration-300">
                @csrf
                
                <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-6 flex items-center gap-2.5 pb-4 border-b border-gray-100 dark:border-gray-700">
                    <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span data-lang="id">Konfigurasi Gateway</span>
                    <span data-lang="en" class="hidden">Gateway Configurations</span>
                </h3>
                
                {{-- Toggle Push Notification --}}
                <div class="bg-gray-50/50 dark:bg-gray-900/30 p-5 rounded-2xl border border-gray-100 dark:border-gray-700/60 mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 transition-all">
                    <div>
                        <h4 class="font-bold text-gray-800 dark:text-gray-100 text-sm">
                            <span data-lang="id">Push Notification Tagihan</span>
                            <span data-lang="en" class="hidden">Billing Push Notification</span>
                        </h4>
                        <p class="text-xs text-gray-400 mt-1 max-w-md">
                            <span data-lang="id">Kirim pesan WhatsApp penagihan invoice secara otomatis ke semua nomor HP pelanggan setiap bulan.</span>
                            <span data-lang="en" class="hidden">Send automated billing invoices notifications to all customers' mobile numbers monthly.</span>
                        </p>
                    </div>
                    
                    {{-- Switch component --}}
                    <label for="pushNotifToggle" class="relative inline-flex items-center cursor-pointer select-none group">
                        <input type="checkbox" name="whatsapp_push_notification" id="pushNotifToggle" class="sr-only peer" {{ $pushNotification === '1' ? 'checked' : '' }}>
                        <div class="w-14 h-7 bg-gray-200 dark:bg-gray-700 rounded-full peer peer-checked:bg-green-500 transition-all after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 dark:after:border-gray-600 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:after:translate-x-full shadow-inner flex items-center justify-between px-1.5">
                            <svg class="w-3.5 h-3.5 text-gray-400 dark:text-gray-500 peer-checked:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            <svg class="w-3.5 h-3.5 text-green-500 dark:text-green-300 peer-checked:text-green-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                    </label>
                </div>
                
                {{-- Input: Wablas API Token --}}
                <div class="mb-5">
                    <label class="block text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest mb-2">
                        <span data-lang="id">Wablas API Token</span>
                        <span data-lang="en" class="hidden">Wablas API Token</span>
                    </label>
                    <div class="relative">
                        <input type="text" name="wablas_api_token" value="{{ $wablasToken }}" placeholder="e.g. k5H9jFLks8sh29sLskd82hs9sS..."
                            class="w-full pl-11 pr-4 py-3 bg-gray-50 dark:bg-gray-700/40 border border-gray-200 dark:border-gray-600 rounded-2xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-gray-800 dark:text-gray-200 transition-all font-mono">
                        <div class="absolute left-4 top-3.5 text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-[11px] text-gray-400 mt-2">
                        <span data-lang="id">Token otentikasi unik yang disediakan di halaman Dashboard Wablas Anda.</span>
                        <span data-lang="en" class="hidden">Unique authentication token provided on your Wablas Dashboard.</span>
                    </p>
                </div>
                
                {{-- Input: Wablas Server Domain --}}
                <div class="mb-8">
                    <label class="block text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest mb-2">
                        <span data-lang="id">Wablas Server Domain</span>
                        <span data-lang="en" class="hidden">Wablas Server Domain</span>
                    </label>
                    <div class="relative">
                        <input type="text" name="wablas_domain" value="{{ $wablasDomain }}" placeholder="https://api.wablas.com"
                            class="w-full pl-11 pr-4 py-3 bg-gray-50 dark:bg-gray-700/40 border border-gray-200 dark:border-gray-600 rounded-2xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-gray-800 dark:text-gray-200 transition-all font-mono">
                        <div class="absolute left-4 top-3.5 text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-[11px] text-gray-400 mt-2">
                        <span data-lang="id">Gunakan default <code>https://api.wablas.com</code> atau isi domain khusus jika akun Anda di-host di server server-spesifik Wablas (misal: <code>https://jakarta.wablas.com</code>).</span>
                        <span data-lang="en" class="hidden">Use default <code>https://api.wablas.com</code> or enter custom domain if your account is hosted on a specific server (e.g. <code>https://jakarta.wablas.com</code>).</span>
                    </p>
                </div>
                
                {{-- Action buttons --}}
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100 dark:border-gray-700">
                    <button type="submit"
                        class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-semibold px-6 py-3 rounded-2xl shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 transition-all duration-300 hover:-translate-y-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                        </svg>
                        <span data-lang="id">Simpan Pengaturan</span>
                        <span data-lang="en" class="hidden">Save Settings</span>
                    </button>
                </div>
                
            </form>
        </div>
        
    </div>

@endsection
