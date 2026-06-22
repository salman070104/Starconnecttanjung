@extends('admin.layouts.app')

@section('title', 'Tambah Pelanggan')
@section('page-title', 'Tambah Pelanggan')
@section('page-subtitle', 'Tambahkan pelanggan baru ke database')

@section('content')

    <div class="max-w-4xl">

        <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm transition-colors duration-300">

            <div class="px-6 py-5 border-b border-gray-100 dark:border-gray-700">
                <h2 class="text-lg font-bold text-gray-800 dark:text-white">Form Pelanggan Baru</h2>
                <p class="text-sm text-gray-400 mt-0.5">Isi data pelanggan dengan lengkap</p>
            </div>

            <form action="{{ route('admin.pelanggan.store') }}" method="POST" class="p-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- Nama --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">Nama <span class="text-red-500">*</span></label>
                        <input type="text" name="nama" value="{{ old('nama') }}" required
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:focus:ring-blue-500/20 outline-none transition text-sm"
                            placeholder="Nama pelanggan">
                        @error('nama')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- No HP --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">No HP</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:focus:ring-blue-500/20 outline-none transition text-sm"
                            placeholder="08xxxxxxxxxx">
                        @error('no_hp')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Username --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">Username Login</label>
                        <input type="text" name="username" value="{{ old('username') }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:focus:ring-blue-500/20 outline-none transition text-sm"
                            placeholder="(opsional, default: nama depan)">
                        @error('username')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">Password Login</label>
                        <div class="relative w-full">
                            <input type="password" name="password" id="pelanggan_password" value="{{ old('password') }}"
                                class="w-full pl-4 pr-12 py-2.5 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:focus:ring-blue-500/20 outline-none transition text-sm"
                                placeholder="(opsional, default: 123456)">
                            <button type="button" onclick="togglePasswordVisibility('pelanggan_password', this)"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 focus:outline-none transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Alamat --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">Alamat Lengkap</label>
                        <input type="text" name="alamat" value="{{ old('alamat') }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:focus:ring-blue-500/20 outline-none transition text-sm"
                            placeholder="Alamat pelanggan">
                        @error('alamat')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Paket --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">Paket Internet <span class="text-red-500">*</span></label>
                        <select name="paket" required
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:focus:ring-blue-500/20 outline-none transition text-sm">
                            <option value="" class="dark:bg-gray-900">Pilih Paket</option>
                            <option value="10 Mbps" {{ old('paket') == '10 Mbps' ? 'selected' : '' }} class="dark:bg-gray-900">10 Mbps - Rp150.000</option>
                            <option value="15 Mbps" {{ old('paket') == '15 Mbps' ? 'selected' : '' }} class="dark:bg-gray-900">15 Mbps - Rp220.000</option>
                            <option value="20 Mbps" {{ old('paket') == '20 Mbps' ? 'selected' : '' }} class="dark:bg-gray-900">20 Mbps - Rp280.000</option>
                            <option value="30 Mbps" {{ old('paket') == '30 Mbps' ? 'selected' : '' }} class="dark:bg-gray-900">30 Mbps - Rp350.000</option>
                            <option value="50 Mbps" {{ old('paket') == '50 Mbps' ? 'selected' : '' }} class="dark:bg-gray-900">50 Mbps - Rp500.000</option>
                        </select>
                        @error('paket')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tagihan --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">Tagihan (Rp) <span class="text-red-500">*</span></label>
                        <input type="number" name="tagihan" value="{{ old('tagihan') }}" required min="0"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:focus:ring-blue-500/20 outline-none transition text-sm"
                            placeholder="Contoh: 220000">
                        @error('tagihan')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">Status Pembayaran <span class="text-red-500">*</span></label>
                        <div class="flex gap-3">
                            <label class="flex items-center gap-2 px-3 py-2.5 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900/50 cursor-pointer hover:border-emerald-300 dark:hover:border-emerald-500/50 transition flex-1">
                                <input type="radio" name="status" value="sudah_bayar" {{ old('status') == 'sudah_bayar' ? 'checked' : '' }}
                                    class="w-3.5 h-3.5 text-emerald-600 accent-emerald-500">
                                <span class="text-xs font-medium text-gray-600 dark:text-gray-300">Lunas</span>
                            </label>
                            <label class="flex items-center gap-2 px-3 py-2.5 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900/50 cursor-pointer hover:border-red-300 dark:hover:border-red-500/50 transition flex-1">
                                <input type="radio" name="status" value="belum_bayar" {{ old('status', 'belum_bayar') == 'belum_bayar' ? 'checked' : '' }}
                                    class="w-3.5 h-3.5 text-red-600 accent-red-500">
                                <span class="text-xs font-medium text-gray-600 dark:text-gray-300">Belum</span>
                            </label>
                        </div>
                        @error('status')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- WA Notif Toggle --}}
                    <div class="bg-gray-50/50 dark:bg-gray-900/30 px-4 py-2.5 rounded-xl border border-gray-100 dark:border-gray-700/60 flex items-center justify-between gap-3 h-full">
                        <div>
                            <h4 class="font-bold text-gray-800 dark:text-gray-100 text-[13px]">Kirim Notifikasi WA</h4>
                            <p class="text-[10px] text-gray-400 mt-0.5 leading-tight">Pesan tagihan otomatis</p>
                        </div>
                        
                        <label for="waNotifToggle" class="relative inline-flex items-center cursor-pointer select-none">
                            <input type="checkbox" name="is_wa_notif_enabled" id="waNotifToggle" class="sr-only peer" {{ old('is_wa_notif_enabled') ? 'checked' : '' }}>
                            <div class="w-10 h-5 bg-gray-200 dark:bg-gray-700 rounded-full peer peer-checked:bg-green-500 transition-all after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 dark:after:border-gray-600 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full shadow-inner"></div>
                        </label>
                    </div>
                </div>

                {{-- Buttons --}}
                <div class="flex items-center gap-3 mt-6 pt-5 border-t border-gray-100 dark:border-gray-700">
                    <button type="submit"
                        class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-semibold px-6 py-2.5 rounded-xl shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 transition-all duration-300 hover:-translate-y-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan
                    </button>
                    <a href="{{ route('admin.pelanggan.index') }}"
                        class="inline-flex items-center gap-2 bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 text-sm font-semibold px-6 py-2.5 rounded-xl hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                        Batal
                    </a>
                </div>

            </form>

        </div>

    </div>

@endsection
