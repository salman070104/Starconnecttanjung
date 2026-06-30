@extends('admin.layouts.app')

@section('page-title') <span data-lang="id">Dashboard</span><span data-lang="en" class="hidden">Dashboard</span> @endsection
@section('page-subtitle') <span data-lang="id">Monitoring pembayaran pelanggan internet</span><span data-lang="en" class="hidden">Internet customer payment monitoring</span> @endsection

@section('content')

    {{-- Success Alert --}}
    @if (session('success'))
        <div id="alert-success"
            class="mb-6 flex items-center gap-3 bg-emerald-50 dark:bg-emerald-500/10 border border-emerald-200 dark:border-emerald-500/20 text-emerald-700 dark:text-emerald-400 px-5 py-4 rounded-xl animate-fade-in transition-colors duration-300">
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

    {{-- Overall Statistics Card --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6 mb-6">

        {{-- Overall statistics --}}
        <div class="lg:col-span-2 stat-card bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden animate-fade-in transition-colors duration-300">
            <div class="px-6 py-5 border-b border-gray-100 dark:border-gray-700">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                    <span data-lang="id">Statistik Keseluruhan</span>
                    <span data-lang="en" class="hidden">Overall Statistics</span>
                </h3>
                <p class="text-xs text-gray-400 mt-1">
                    <span data-lang="id">Informasi harian tentang statistik pelanggan</span>
                    <span data-lang="en" class="hidden">Daily information about customer statistics</span>
                </p>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    {{-- Belum Bayar - Circle --}}
                    <div class="flex flex-col items-center">
                        <div class="relative w-28 h-28">
                            <svg class="w-full h-full transform -rotate-90" viewBox="0 0 120 120">
                                <circle cx="60" cy="60" r="50" stroke="#f1f5f9" stroke-width="10" fill="none" class="dark:stroke-gray-700"/>
                                <circle cx="60" cy="60" r="50" stroke="#f97316" stroke-width="10" fill="none"
                                    stroke-dasharray="{{ $belumBayar + $sudahBayar > 0 ? ($belumBayar / ($belumBayar + $sudahBayar)) * 314.16 : 0 }} 314.16"
                                    stroke-linecap="round" class="transition-all duration-1000"/>
                            </svg>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <span class="text-2xl font-extrabold text-gray-800 dark:text-white">{{ $belumBayar }}</span>
                            </div>
                        </div>
                        <p class="text-sm font-semibold text-gray-600 dark:text-gray-300 mt-3">
                            <span data-lang="id">Belum Bayar</span>
                            <span data-lang="en" class="hidden">Unpaid</span>
                        </p>
                    </div>

                    {{-- Sudah Bayar - Circle --}}
                    <div class="flex flex-col items-center">
                        <div class="relative w-28 h-28">
                            <svg class="w-full h-full transform -rotate-90" viewBox="0 0 120 120">
                                <circle cx="60" cy="60" r="50" stroke="#f1f5f9" stroke-width="10" fill="none" class="dark:stroke-gray-700"/>
                                <circle cx="60" cy="60" r="50" stroke="#10B981" stroke-width="10" fill="none"
                                    stroke-dasharray="{{ $belumBayar + $sudahBayar > 0 ? ($sudahBayar / ($belumBayar + $sudahBayar)) * 314.16 : 0 }} 314.16"
                                    stroke-linecap="round" class="transition-all duration-1000"/>
                            </svg>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <span class="text-2xl font-extrabold text-gray-800 dark:text-white">{{ $sudahBayar }}</span>
                            </div>
                        </div>
                        <p class="text-sm font-semibold text-gray-600 dark:text-gray-300 mt-3">
                            <span data-lang="id">Sudah Bayar</span>
                            <span data-lang="en" class="hidden">Paid</span>
                        </p>
                    </div>

                    {{-- Total Pelanggan - Circle --}}
                    <div class="flex flex-col items-center">
                        <div class="relative w-28 h-28">
                            <svg class="w-full h-full transform -rotate-90" viewBox="0 0 120 120">
                                <circle cx="60" cy="60" r="50" stroke="#f1f5f9" stroke-width="10" fill="none" class="dark:stroke-gray-700"/>
                                <circle cx="60" cy="60" r="50" stroke="#1572E8" stroke-width="10" fill="none"
                                    stroke-dasharray="314.16 314.16"
                                    stroke-linecap="round" class="transition-all duration-1000"/>
                            </svg>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <span class="text-2xl font-extrabold text-gray-800 dark:text-white">{{ $belumBayar + $sudahBayar }}</span>
                            </div>
                        </div>
                        <p class="text-sm font-semibold text-gray-600 dark:text-gray-300 mt-3">
                            <span data-lang="id">Total Pelanggan</span>
                            <span data-lang="en" class="hidden">Subscribers</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Income & Spend --}}
        <div class="stat-card bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden animate-fade-in-delay-1 transition-colors duration-300">
            <div class="px-6 py-5 border-b border-gray-100 dark:border-gray-700">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                    <span data-lang="id">Pendapatan Bulanan</span>
                    <span data-lang="en" class="hidden">Monthly Income</span>
                </h3>
            </div>
            <div class="p-6 flex flex-col justify-between h-[calc(100%-65px)]">
                <div>
                    <p class="text-xs font-bold text-emerald-500 uppercase tracking-wider mb-1">
                        <span data-lang="id">Total Pendapatan</span>
                        <span data-lang="en" class="hidden">Total Income</span>
                    </p>
                    <h2 class="text-2xl font-extrabold text-gray-800 dark:text-white">
                        Rp{{ number_format($totalPendapatan, 0, ',', '.') }}
                    </h2>
                </div>

                <div class="mt-6">
                    <p class="text-xs font-bold text-blue-500 uppercase tracking-wider mb-1">
                        <span data-lang="id">Rasio Pembayaran</span>
                        <span data-lang="en" class="hidden">Payment Ratio</span>
                    </p>
                    <p class="text-lg font-bold text-gray-800 dark:text-white">
                        {{ $belumBayar + $sudahBayar > 0 ? round(($sudahBayar / ($belumBayar + $sudahBayar)) * 100) : 0 }}%
                    </p>
                </div>

                {{-- Mini bar chart visual --}}
                <div class="mt-6 flex items-end gap-1.5 h-16">
                    @for($i = 0; $i < 7; $i++)
                        <div class="flex-1 bg-gradient-to-t from-blue-500 to-blue-400 rounded-t-sm transition-all duration-500"
                             style="height: {{ rand(30, 100) }}%; opacity: {{ 0.5 + ($i * 0.07) }}"></div>
                    @endfor
                </div>
                <div class="flex justify-between mt-2">
                    @php $days = ['S','M','T','W','T','F','S']; @endphp
                    @foreach($days as $d)
                        <span class="text-[10px] text-gray-400 flex-1 text-center">{{ $d }}</span>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

    {{-- Payment Chart & Monthly Profit --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6 mb-6">

        {{-- Payment Chart --}}
        <div class="lg:col-span-2 stat-card bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden animate-fade-in-delay-2 transition-colors duration-300">
            <div class="px-6 py-5 border-b border-gray-100 dark:border-gray-700 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                        <span data-lang="id">Statistik Pelanggan</span>
                        <span data-lang="en" class="hidden">User Statistics</span>
                    </h3>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('admin.dashboard.exportPdf') }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-500/10 border border-blue-200 dark:border-blue-500/20 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-500/20 transition">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Export PDF
                    </a>
                </div>
            </div>
            <div class="p-6">
                <div class="relative w-full" style="height: 280px;">
                    <canvas id="paymentChart"></canvas>
                </div>
            </div>
        </div>

        {{-- Monthly Profit Card (Blue gradient like Daily Sales) --}}
        <div class="stat-card rounded-xl shadow-lg overflow-hidden animate-fade-in-delay-3 transition-all duration-300">
            <div class="bg-gradient-to-br from-blue-500 via-blue-600 to-indigo-700 dark:from-blue-600 dark:via-blue-700 dark:to-indigo-800 p-6 h-full flex flex-col justify-between relative overflow-hidden">
                {{-- Decorative circles --}}
                <div class="absolute -right-8 -top-8 w-32 h-32 bg-white/5 rounded-full"></div>
                <div class="absolute -right-4 top-8 w-24 h-24 bg-white/5 rounded-full"></div>
                <div class="absolute -left-6 -bottom-6 w-24 h-24 bg-white/5 rounded-full"></div>

                <div class="relative z-10">
                    <h3 class="text-lg font-bold text-white">Monthly Profit</h3>
                    <p class="text-sm text-blue-200 mt-1">{{ now()->translatedFormat('F Y') }}</p>
                </div>

                <div class="relative z-10 mt-6">
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                        Rp{{ number_format($totalPendapatan, 0, ',', '.') }}
                    </h2>
                    <p class="text-sm text-blue-200 mt-2">
                        <span data-lang="id">Dari {{ $sudahBayar }} pelanggan lunas</span>
                        <span data-lang="en" class="hidden">From {{ $sudahBayar }} paid customers</span>
                    </p>
                </div>

                <div class="relative z-10 mt-6">
                    {{-- Mini sparkline visual --}}
                    <div class="flex items-end gap-1 h-12">
                        @for($i = 0; $i < 12; $i++)
                            <div class="flex-1 bg-white/20 rounded-t-sm" style="height: {{ rand(20, 100) }}%"></div>
                        @endfor
                    </div>
                </div>

                <div class="relative z-10 mt-4 flex items-center gap-2">
                    <div class="flex items-center gap-1.5 bg-white/15 rounded-lg px-3 py-1.5">
                        <svg class="w-3.5 h-3.5 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                        <span class="text-xs font-bold text-white">
                            {{ $belumBayar + $sudahBayar > 0 ? round(($sudahBayar / ($belumBayar + $sudahBayar)) * 100) : 0 }}%
                            <span data-lang="id">lunas</span>
                            <span data-lang="en" class="hidden">paid</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Quick Actions --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 animate-fade-in-delay-3">
        <a href="{{ route('admin.pelanggan.index') }}" class="group bg-white dark:bg-gray-800 rounded-xl p-5 sm:p-6 border border-gray-200 dark:border-gray-700 shadow-sm hover:shadow-lg hover:border-blue-300 dark:hover:border-blue-500/30 transition-all duration-300 flex items-center gap-4">
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

        <a href="{{ route('admin.pelanggan.create') }}" class="group bg-white dark:bg-gray-800 rounded-xl p-5 sm:p-6 border border-gray-200 dark:border-gray-700 shadow-sm hover:shadow-lg hover:border-emerald-300 dark:hover:border-emerald-500/30 transition-all duration-300 flex items-center gap-4">
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
            const gridColor = isDark ? 'rgba(255,255,255,0.05)' : 'rgba(0,0,0,0.05)';

            // Bar chart like Atlantis style
            const data = {
                labels: ['Sudah Bayar', 'Belum Bayar'],
                datasets: [{
                    label: 'Pelanggan',
                    data: [{{ $sudahBayar }}, {{ $belumBayar }}],
                    backgroundColor: [
                        'rgba(21, 114, 232, 0.85)',
                        'rgba(249, 115, 22, 0.85)'
                    ],
                    borderColor: [
                        '#1572E8',
                        '#f97316'
                    ],
                    borderWidth: 2,
                    borderRadius: 8,
                    barPercentage: 0.5,
                    categoryPercentage: 0.6,
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        },
                        tooltip: {
                            backgroundColor: isDark ? '#1f2937' : '#ffffff',
                            titleColor: isDark ? '#f9fafb' : '#1f2937',
                            bodyColor: isDark ? '#d1d5db' : '#6b7280',
                            borderColor: isDark ? '#374151' : '#e5e7eb',
                            borderWidth: 1,
                            cornerRadius: 8,
                            padding: 12,
                            callbacks: {
                                label: function(context) {
                                    return context.parsed.y + ' Pelanggan';
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: gridColor,
                            },
                            ticks: {
                                color: legendColor,
                                font: {
                                    size: 11,
                                    family: "'Inter', sans-serif"
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false,
                            },
                            ticks: {
                                color: legendColor,
                                font: {
                                    size: 11,
                                    family: "'Inter', sans-serif"
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