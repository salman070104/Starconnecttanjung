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

    {{-- Compact Dashboard Layout --}}
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-4 mb-4">

        {{-- 1. Overall Statistics (Spans 2 cols) --}}
        <div class="lg:col-span-2 stat-card bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden animate-fade-in transition-colors duration-300 flex flex-col">
            <div class="px-5 py-4 border-b border-gray-100 dark:border-gray-700">
                <h3 class="text-base font-bold text-gray-800 dark:text-white">
                    <span data-lang="id">Statistik Keseluruhan</span>
                </h3>
            </div>
            <div class="p-5 flex-1 flex items-center justify-center">
                <div class="grid grid-cols-3 gap-4 w-full">
                    {{-- Belum Bayar --}}
                    <div class="flex flex-col items-center">
                        <div class="relative w-20 h-20">
                            <svg class="w-full h-full transform -rotate-90" viewBox="0 0 120 120">
                                <circle cx="60" cy="60" r="50" stroke="#f1f5f9" stroke-width="12" fill="none" class="dark:stroke-gray-700"/>
                                <circle cx="60" cy="60" r="50" stroke="#f97316" stroke-width="12" fill="none"
                                    stroke-dasharray="{{ $belumBayar + $sudahBayar > 0 ? ($belumBayar / ($belumBayar + $sudahBayar)) * 314.16 : 0 }} 314.16"
                                    stroke-linecap="round" class="transition-all duration-1000"/>
                            </svg>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <span class="text-xl font-extrabold text-gray-800 dark:text-white">{{ $belumBayar }}</span>
                            </div>
                        </div>
                        <p class="text-xs font-semibold text-gray-600 dark:text-gray-300 mt-2">Belum Bayar</p>
                    </div>

                    {{-- Sudah Bayar --}}
                    <div class="flex flex-col items-center">
                        <div class="relative w-20 h-20">
                            <svg class="w-full h-full transform -rotate-90" viewBox="0 0 120 120">
                                <circle cx="60" cy="60" r="50" stroke="#f1f5f9" stroke-width="12" fill="none" class="dark:stroke-gray-700"/>
                                <circle cx="60" cy="60" r="50" stroke="#10B981" stroke-width="12" fill="none"
                                    stroke-dasharray="{{ $belumBayar + $sudahBayar > 0 ? ($sudahBayar / ($belumBayar + $sudahBayar)) * 314.16 : 0 }} 314.16"
                                    stroke-linecap="round" class="transition-all duration-1000"/>
                            </svg>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <span class="text-xl font-extrabold text-gray-800 dark:text-white">{{ $sudahBayar }}</span>
                            </div>
                        </div>
                        <p class="text-xs font-semibold text-gray-600 dark:text-gray-300 mt-2">Sudah Bayar</p>
                    </div>

                    {{-- Total --}}
                    <div class="flex flex-col items-center">
                        <div class="relative w-20 h-20">
                            <svg class="w-full h-full transform -rotate-90" viewBox="0 0 120 120">
                                <circle cx="60" cy="60" r="50" stroke="#f1f5f9" stroke-width="12" fill="none" class="dark:stroke-gray-700"/>
                                <circle cx="60" cy="60" r="50" stroke="#1572E8" stroke-width="12" fill="none"
                                    stroke-dasharray="314.16 314.16"
                                    stroke-linecap="round" class="transition-all duration-1000"/>
                            </svg>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <span class="text-xl font-extrabold text-gray-800 dark:text-white">{{ $belumBayar + $sudahBayar }}</span>
                            </div>
                        </div>
                        <p class="text-xs font-semibold text-gray-600 dark:text-gray-300 mt-2">Total Pelanggan</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- 2. Monthly Profit (Spans 1 col) --}}
        <div class="lg:col-span-1 stat-card rounded-xl shadow-sm overflow-hidden animate-fade-in-delay-1 transition-all duration-300">
            <div class="bg-gradient-to-br from-blue-500 via-blue-600 to-indigo-700 dark:from-blue-600 dark:via-blue-700 dark:to-indigo-800 p-5 h-full flex flex-col justify-between relative overflow-hidden">
                <div class="absolute -right-8 -top-8 w-24 h-24 bg-white/5 rounded-full"></div>
                <div class="absolute -left-6 -bottom-6 w-20 h-20 bg-white/5 rounded-full"></div>

                <div class="relative z-10">
                    <h3 class="text-sm font-bold text-white">Pendapatan Bulan Ini</h3>
                    <p class="text-xs text-blue-200 mt-0.5">{{ now()->translatedFormat('F Y') }}</p>
                </div>

                <div class="relative z-10 my-4">
                    <h2 class="text-2xl font-extrabold text-white tracking-tight">
                        Rp{{ number_format($totalPendapatan, 0, ',', '.') }}
                    </h2>
                </div>

                <div class="relative z-10 flex items-center gap-2">
                    <div class="flex items-center gap-1.5 bg-white/15 rounded-lg px-2.5 py-1">
                        <svg class="w-3 h-3 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                        <span class="text-xs font-bold text-white">
                            {{ $belumBayar + $sudahBayar > 0 ? round(($sudahBayar / ($belumBayar + $sudahBayar)) * 100) : 0 }}% Lunas
                        </span>
                    </div>
                </div>
            </div>
        </div>

        {{-- 3. Quick Actions (Spans 1 col, Stacked vertically) --}}
        <div class="lg:col-span-1 flex flex-col gap-4 animate-fade-in-delay-2">
            <a href="{{ route('admin.pelanggan.index') }}" class="group bg-red-500 dark:bg-red-600 rounded-xl p-4 shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3 flex-1 relative overflow-hidden text-white">
                <div class="absolute right-0 top-0 opacity-10 transform translate-x-2 -translate-y-2">
                    <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                </div>
                <div class="w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center group-hover:scale-110 transition-transform relative z-10">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div class="relative z-10">
                    <p class="text-sm font-bold text-white">Database</p>
                    <p class="text-[10px] text-red-100">Kelola pelanggan</p>
                </div>
            </a>
            <a href="{{ route('admin.pelanggan.create') }}" class="group bg-emerald-500 dark:bg-emerald-600 rounded-xl p-4 shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3 flex-1 relative overflow-hidden text-white">
                <div class="absolute right-0 top-0 opacity-10 transform translate-x-2 -translate-y-2">
                    <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" /></svg>
                </div>
                <div class="w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center group-hover:scale-110 transition-transform relative z-10">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <div class="relative z-10">
                    <p class="text-sm font-bold text-white">Tambah</p>
                    <p class="text-[10px] text-emerald-100">Pelanggan baru</p>
                </div>
            </a>
        </div>
    </div>

    {{-- Horizontal Bar Chart (Compact Height) --}}
    <div class="grid grid-cols-1 gap-4 mb-4">
        <div class="stat-card bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden animate-fade-in-delay-3 transition-colors duration-300">
            <div class="px-5 py-3 border-b border-gray-100 dark:border-gray-700 flex items-center justify-between">
                <h3 class="text-base font-bold text-gray-800 dark:text-white">
                    Status Pembayaran
                </h3>
                <a href="{{ route('admin.dashboard.exportPdf') }}" download class="inline-flex items-center gap-1.5 px-3 py-1.5 text-[11px] font-semibold text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-500/10 border border-blue-200 dark:border-blue-500/20 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-500/20 transition">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Export PDF
                </a>
            </div>
            <div class="p-4">
                <div class="relative w-full" style="height: 180px;">
                    <canvas id="paymentChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- Script Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('paymentChart').getContext('2d');

            const isDark = document.documentElement.classList.contains('dark');
            const legendColor = isDark ? '#9ca3af' : '#6b7280';
            const gridColor = isDark ? 'rgba(255,255,255,0.05)' : 'rgba(0,0,0,0.05)';

            const data = {
                labels: {!! json_encode($chartLabels) !!},
                datasets: [{
                    label: 'Pelanggan Membayar',
                    data: {!! json_encode($chartData) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Light Blue for area
                    borderColor: '#36A2EB',
                    borderWidth: 2,
                    pointBackgroundColor: '#36A2EB',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: '#36A2EB',
                    fill: true,
                    tension: 0.4 // Smooth curve
                }]
            };

            const config = {
                type: 'line',
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
                                title: function(context) {
                                    return 'Tanggal ' + context[0].label;
                                },
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
                                },
                                stepSize: 1 // Integer ticks
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