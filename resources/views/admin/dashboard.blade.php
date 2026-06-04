@extends('admin.layouts.app')

@section('page-title') <span data-lang="id">Dashboard</span><span data-lang="en" class="hidden">Dashboard</span> @endsection
@section('page-subtitle') <span data-lang="id">Monitoring pembayaran pelanggan internet</span><span data-lang="en" class="hidden">Internet customer payment monitoring</span> @endsection

@section('content')

    {{-- Success Alert --}}
    @if (session('success'))
        <div id="alert-success"
            class="mb-6 flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-700 px-5 py-4 rounded-2xl animate-fade-in">
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

    {{-- Stat Cards Layout --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-8 items-stretch">

        {{-- Kolom Kiri: Stats & Profit --}}
        <div class="lg:col-span-2 flex flex-col gap-4 sm:gap-6">
            
            {{-- Row Atas: Belum Bayar & Sudah Bayar --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                {{-- Belum Bayar --}}
                <div class="stat-card bg-white dark:bg-gray-800 rounded-2xl p-5 sm:p-6 border border-gray-100 dark:border-gray-700 shadow-sm animate-fade-in-delay-1 flex flex-col justify-between transition-colors duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-400 tracking-wide">
                                <span data-lang="id">Belum Bayar</span>
                                <span data-lang="en" class="hidden">Unpaid</span>
                            </p>
                            <h2 class="text-3xl sm:text-4xl font-extrabold text-blue-600 dark:text-blue-400 mt-2">{{ $belumBayar }}</h2>
                            <p class="text-xs text-gray-400 mt-2">
                                <span data-lang="id">Pelanggan menunggak</span>
                                <span data-lang="en" class="hidden">Customers in arrears</span>
                            </p>
                        </div>
                        <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center shadow-lg shadow-blue-500/30 shrink-0">
                            <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 h-1.5 bg-blue-100 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-blue-500 to-blue-600 rounded-full"
                            style="width: {{ $belumBayar + $sudahBayar > 0 ? ($belumBayar / ($belumBayar + $sudahBayar)) * 100 : 0 }}%"></div>
                    </div>
                </div>

                {{-- Sudah Bayar --}}
                <div class="stat-card bg-white dark:bg-gray-800 rounded-2xl p-5 sm:p-6 border border-gray-100 dark:border-gray-700 shadow-sm animate-fade-in-delay-2 flex flex-col justify-between transition-colors duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-400 tracking-wide">
                                <span data-lang="id">Sudah Bayar</span>
                                <span data-lang="en" class="hidden">Paid</span>
                            </p>
                            <h2 class="text-3xl sm:text-4xl font-extrabold text-emerald-600 dark:text-emerald-400 mt-2">{{ $sudahBayar }}</h2>
                            <p class="text-xs text-gray-400 mt-2">
                                <span data-lang="id">Pelanggan lunas</span>
                                <span data-lang="en" class="hidden">Paid customers</span>
                            </p>
                        </div>
                        <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-gradient-to-br from-emerald-500 to-emerald-600 flex items-center justify-center shadow-lg shadow-emerald-500/30 shrink-0">
                            <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 h-1.5 bg-emerald-100 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-full"
                            style="width: {{ $belumBayar + $sudahBayar > 0 ? ($sudahBayar / ($belumBayar + $sudahBayar)) * 100 : 0 }}%"></div>
                    </div>
                </div>
            </div>

            {{-- Row Bawah: Monthly Profit (Memanjang) --}}
            <div class="stat-card bg-white dark:bg-gray-800 rounded-2xl p-5 sm:p-6 border border-gray-100 dark:border-gray-700 shadow-sm animate-fade-in-delay-3 flex-1 flex flex-col justify-center transition-colors duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-400 tracking-wide">Monthly Profit</p>
                        <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-teal-600 dark:text-teal-400 mt-2">
                            Rp{{ number_format($totalPendapatan, 0, ',', '.') }}
                        </h2>
                        <p class="text-xs text-gray-400 mt-2">
                            <span data-lang="id">Total pendapatan dari pelanggan yang sudah lunas bulan ini</span>
                            <span data-lang="en" class="hidden">Total revenue from paid customers this month</span>
                        </p>
                    </div>
                    <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-gradient-to-br from-teal-500 to-emerald-500 flex items-center justify-center shadow-lg shadow-teal-500/30 shrink-0">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 h-1.5 bg-teal-100 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-teal-500 to-emerald-500 rounded-full" style="width: 100%"></div>
                </div>
            </div>

        </div>

        {{-- Kolom Kanan: Grafik Pembayaran (Sejajar dengan kotak-kotak di kiri) --}}
        <div class="stat-card bg-white dark:bg-gray-800 rounded-2xl p-5 sm:p-6 border border-gray-100 dark:border-gray-700 shadow-sm animate-fade-in-delay-3 lg:col-span-1 flex flex-col h-full transition-colors duration-300">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm font-medium text-gray-400 tracking-wide">
                        <span data-lang="id">Grafik Pembayaran</span>
                        <span data-lang="en" class="hidden">Payment Chart</span>
                    </p>
                    <p class="text-xs text-gray-400 mt-1">
                        <span data-lang="id">Lunas vs Belum Lunas</span>
                        <span data-lang="en" class="hidden">Paid vs Unpaid</span>
                    </p>
                </div>
            </div>
            <div class="relative w-full flex-1 flex justify-center items-center" style="min-height: 200px;">
                <canvas id="paymentChart"></canvas>
            </div>
        </div>

    </div>

    {{-- Quick Actions --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 animate-fade-in-delay-3">
        <a href="{{ route('admin.pelanggan.index') }}" class="group bg-white dark:bg-gray-800 rounded-2xl p-5 sm:p-6 border border-gray-100 dark:border-gray-700 shadow-sm hover:shadow-lg hover:border-blue-200 dark:hover:border-blue-500/30 transition-all duration-300 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-blue-50 dark:bg-blue-500/10 flex items-center justify-center group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-bold text-gray-800 dark:text-white">
                    <span data-lang="id">Database Pelanggan</span>
                    <span data-lang="en" class="hidden">Customer Database</span>
                </p>
                <p class="text-xs text-gray-400 mt-0.5">
                    <span data-lang="id">Kelola semua data pelanggan</span>
                    <span data-lang="en" class="hidden">Manage all customer data</span>
                </p>
            </div>
            <svg class="w-5 h-5 text-gray-300 dark:text-gray-600 ml-auto group-hover:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>

        <a href="{{ route('admin.pelanggan.create') }}" class="group bg-white dark:bg-gray-800 rounded-2xl p-5 sm:p-6 border border-gray-100 dark:border-gray-700 shadow-sm hover:shadow-lg hover:border-emerald-200 dark:hover:border-emerald-500/30 transition-all duration-300 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-emerald-50 dark:bg-emerald-500/10 flex items-center justify-center group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-bold text-gray-800 dark:text-white">
                    <span data-lang="id">Tambah Pelanggan</span>
                    <span data-lang="en" class="hidden">Add Customer</span>
                </p>
                <p class="text-xs text-gray-400 mt-0.5">
                    <span data-lang="id">Daftarkan pelanggan baru</span>
                    <span data-lang="en" class="hidden">Register a new customer</span>
                </p>
            </div>
            <svg class="w-5 h-5 text-gray-300 dark:text-gray-600 ml-auto group-hover:text-emerald-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>
    </div>

    {{-- Script Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('paymentChart').getContext('2d');

            // Detect dark mode
            const isDark = document.documentElement.classList.contains('dark');
            const legendColor = isDark ? '#9ca3af' : '#6b7280';

            const data = {
                labels: ['Sudah Bayar', 'Belum Bayar'],
                datasets: [{
                    data: [{{ $sudahBayar }}, {{ $belumBayar }}],
                    backgroundColor: [
                        '#10B981', // Emerald 500
                        '#3B82F6'  // Blue 500
                    ],
                    borderWidth: 0,
                    hoverOffset: 4
                }]
            };

            const config = {
                type: 'doughnut',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%',
                    plugins: {
                        legend: {
                            display: true,
                            position: 'right',
                            labels: {
                                boxWidth: 12,
                                padding: 15,
                                color: legendColor,
                                font: {
                                    size: 11,
                                    family: "'Inter', sans-serif"
                                }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed !== null) {
                                        label += context.parsed + ' Pelanggan';
                                    }
                                    return label;
                                }
                            }
                        }
                    }
                }
            };

            new Chart(ctx, config);
        });
    </script>
@endsection