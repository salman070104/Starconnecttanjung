@extends('admin.layouts.app')

@section('title', 'Edit Pelanggan')
@section('page-title', 'Edit Pelanggan')
@section('page-subtitle', 'Perbarui data pelanggan')

@section('content')

    <div class="max-w-4xl">

        <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm transition-colors duration-300">

            <div class="px-6 py-5 border-b border-gray-100 dark:border-gray-700">
                <h2 class="text-lg font-bold text-gray-800 dark:text-white">Edit Data - {{ $pelanggan->nama }}</h2>
                <p class="text-sm text-gray-400 mt-0.5">Perbarui informasi pelanggan</p>
            </div>

            <form action="{{ route('admin.pelanggan.update', $pelanggan->id) }}" method="POST" class="p-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-5">

                {{-- Nama --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Nama Pelanggan <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="nama" value="{{ old('nama', $pelanggan->nama) }}" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:focus:ring-blue-500/20 outline-none transition text-sm"
                        placeholder="Masukkan nama pelanggan">
                    @error('nama')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Alamat --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Alamat</label>
                    <input type="text" name="alamat" value="{{ old('alamat', $pelanggan->alamat) }}"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:focus:ring-blue-500/20 outline-none transition text-sm"
                        placeholder="Masukkan alamat">
                    @error('alamat')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- No HP --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">No HP</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp', $pelanggan->no_hp) }}"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:focus:ring-blue-500/20 outline-none transition text-sm"
                        placeholder="08xxxxxxxxxx">
                    @error('no_hp')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Username --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Username Login</label>
                    <input type="text" name="username" value="{{ old('username', $pelanggan->username) }}"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:focus:ring-blue-500/20 outline-none transition text-sm"
                        placeholder="Masukkan username login (opsional, default: nama depan)">
                    @error('username')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Password Login</label>
                    <div class="relative w-full">
                        <input type="password" name="password" id="pelanggan_password" value=""
                            class="w-full pl-4 pr-12 py-3 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:focus:ring-blue-500/20 outline-none transition text-sm"
                            placeholder="Masukkan password baru (kosongkan jika tidak ingin mengubah)">
                        <button type="button" onclick="togglePasswordVisibility('pelanggan_password', this)"
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 focus:outline-none transition">
                            <svg class="w-5 h-5 text-gray-400 dark:text-gray-500 hover:text-gray-600 dark:hover:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Paket --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Paket Internet <span
                            class="text-red-500">*</span></label>
                    <select name="paket" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:focus:ring-blue-500/20 outline-none transition text-sm">
                        <option value="" class="dark:bg-gray-900">Pilih Paket</option>
                        <option value="10 Mbps"
                            {{ old('paket', $pelanggan->paket) == '10 Mbps' ? 'selected' : '' }} class="dark:bg-gray-900">10 Mbps - Rp150.000
                        </option>
                        <option value="15 Mbps"
                            {{ old('paket', $pelanggan->paket) == '15 Mbps' ? 'selected' : '' }} class="dark:bg-gray-900">15 Mbps - Rp220.000
                        </option>
                        <option value="20 Mbps"
                            {{ old('paket', $pelanggan->paket) == '20 Mbps' ? 'selected' : '' }} class="dark:bg-gray-900">20 Mbps - Rp280.000
                        </option>
                        <option value="30 Mbps"
                            {{ old('paket', $pelanggan->paket) == '30 Mbps' ? 'selected' : '' }} class="dark:bg-gray-900">30 Mbps - Rp350.000
                        </option>
                        <option value="50 Mbps"
                            {{ old('paket', $pelanggan->paket) == '50 Mbps' ? 'selected' : '' }} class="dark:bg-gray-900">50 Mbps - Rp500.000
                        </option>
                    </select>
                    @error('paket')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tagihan --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Tagihan (Rp) <span
                            class="text-red-500">*</span></label>
                    <input type="number" name="tagihan" value="{{ old('tagihan', $pelanggan->tagihan) }}" required
                        min="0"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:focus:ring-blue-500/20 outline-none transition text-sm"
                        placeholder="Contoh: 220000">
                    @error('tagihan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Status --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Status Pembayaran <span
                            class="text-red-500">*</span></label>
                    <div class="flex gap-4">
                        <label
                            class="flex items-center gap-3 px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900/50 cursor-pointer hover:border-emerald-300 dark:hover:border-emerald-500/50 transition flex-1">
                            <input type="radio" name="status" value="sudah_bayar"
                                {{ old('status', $pelanggan->status) == 'sudah_bayar' ? 'checked' : '' }}
                                class="w-4 h-4 text-emerald-600 accent-emerald-500 dark:bg-gray-900 dark:border-gray-700">
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Sudah Bayar</span>
                        </label>
                        <label
                            class="flex items-center gap-3 px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900/50 cursor-pointer hover:border-red-300 dark:hover:border-red-500/50 transition flex-1">
                            <input type="radio" name="status" value="belum_bayar"
                                {{ old('status', $pelanggan->status) == 'belum_bayar' ? 'checked' : '' }}
                                class="w-4 h-4 text-red-600 accent-red-500 dark:bg-gray-900 dark:border-gray-700">
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Belum Bayar</span>
                        </label>
                    </div>
                    @error('status')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                </div>

                {{-- WA Notif Toggle --}}
                <div class="mt-6 bg-gray-50/50 dark:bg-gray-900/30 p-5 rounded-2xl border border-gray-100 dark:border-gray-700/60 flex flex-col sm:flex-row sm:items-center justify-between gap-4 transition-all">
                    <div>
                        <h4 class="font-bold text-gray-800 dark:text-gray-100 text-sm">
                            Kirim Notifikasi WhatsApp
                        </h4>
                        <p class="text-xs text-gray-400 mt-1 max-w-md">
                            Kirim pesan tagihan dan kwitansi ke pelanggan ini jika fitur WhatsApp aktif.
                        </p>
                    </div>
                    
                    <label for="waNotifToggle" class="relative inline-flex items-center cursor-pointer select-none group">
                        <input type="checkbox" name="is_wa_notif_enabled" id="waNotifToggle" class="sr-only peer" {{ old('is_wa_notif_enabled', $pelanggan->is_wa_notif_enabled) ? 'checked' : '' }}>
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

                {{-- Buttons --}}
                <div class="flex items-center gap-3 mt-6 pt-4 border-t border-gray-100 dark:border-gray-700">
                    <button type="submit"
                        class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-semibold px-6 py-3 rounded-xl shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 transition-all duration-300 hover:-translate-y-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.pelanggan.index') }}"
                        class="inline-flex items-center gap-2 bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 text-sm font-semibold px-6 py-3 rounded-xl hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                        Batal
                    </a>
                </div>

            </form>

        </div>

    </div>

@endsection
