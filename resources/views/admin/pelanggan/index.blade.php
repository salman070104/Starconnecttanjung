@extends('admin.layouts.app')

@section('title', 'Database Pelanggan')
@section('page-title', 'Database Pelanggan')
@section('page-subtitle', 'Kelola data pelanggan internet')

@section('content')

    {{-- Success Alert --}}
    @if (session('success'))
        <div id="alert-success"
            class="mb-6 flex items-center gap-3 bg-emerald-50 dark:bg-emerald-500/10 border border-emerald-200 dark:border-emerald-500/20 text-emerald-700 dark:text-emerald-400 px-5 py-4 rounded-2xl animate-fade-in transition-colors duration-300">
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

    {{-- Stats --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-2xl p-5 border border-gray-100 dark:border-gray-700 shadow-sm flex items-center gap-4 transition-colors duration-300">
            <div class="w-12 h-12 rounded-xl bg-blue-50 dark:bg-blue-500/10 flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-400">Total Pelanggan</p>
                <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $pelanggans->count() }}</p>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-2xl p-5 border border-gray-100 dark:border-gray-700 shadow-sm flex items-center gap-4 transition-colors duration-300">
            <div class="w-12 h-12 rounded-xl bg-emerald-50 dark:bg-emerald-500/10 flex items-center justify-center">
                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-400">Sudah Bayar</p>
                <p class="text-2xl font-bold text-emerald-600 dark:text-emerald-400">
                    {{ $pelanggans->where('status', 'sudah_bayar')->count() }}</p>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm transition-colors duration-300">

        <div class="flex items-center justify-between px-6 py-5 border-b border-gray-100 dark:border-gray-700">
            <div>
                <h2 class="text-lg font-bold text-gray-800 dark:text-white">Daftar Pelanggan</h2>
                <p class="text-sm text-gray-400 mt-0.5">Kelola semua data pelanggan</p>
            </div>
            <div class="flex items-center gap-3">
                <form action="{{ route('admin.pelanggan.index') }}" method="GET" class="relative flex items-center gap-2">
                    <select name="alamat" onchange="this.form.submit()" class="py-2.5 px-3 bg-gray-50 dark:bg-gray-700/50 border border-gray-200 dark:border-gray-600 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-gray-800 dark:text-gray-200 transition-all max-w-[150px] md:max-w-[200px]">
                        <option value="">Semua Wilayah</option>
                        @foreach($alamats as $alamat)
                            <option value="{{ $alamat }}" {{ request('alamat') == $alamat ? 'selected' : '' }}>{{ $alamat }}</option>
                        @endforeach
                    </select>

                    <div class="relative">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau no HP..." 
                            oninput="if(this.value === '') this.form.submit();"
                            class="pl-10 pr-4 py-2.5 bg-gray-50 dark:bg-gray-700/50 border border-gray-200 dark:border-gray-600 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-gray-800 dark:text-gray-200 placeholder-gray-400 w-48 md:w-64 transition-all">
                        <svg class="w-4 h-4 text-gray-400 absolute left-3.5 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </form>

                <a href="{{ route('admin.pelanggan.exportPdf', request()->query()) }}" download
                    class="inline-flex items-center gap-2 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 text-sm font-semibold px-4 py-2.5 rounded-xl border border-gray-200 dark:border-gray-600 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-300">
                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Export PDF
                </a>

                <a href="{{ route('admin.pelanggan.create') }}"
                    class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 transition-all duration-300 hover:-translate-y-0.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Pelanggan
                </a>
            </div>
        </div>

        <div id="bulkActions" class="hidden px-6 py-3 bg-blue-50/50 dark:bg-blue-950/20 border-b border-gray-100 dark:border-gray-700 flex items-center justify-between">
            <span class="text-sm text-blue-700 dark:text-blue-400 font-medium"><span id="selectedCount">0</span> pelanggan dipilih</span>
            <div class="flex items-center gap-2">
                <button type="button" id="btnHapusTerpilih" class="bg-red-50 dark:bg-red-950/20 hover:bg-red-100 dark:hover:bg-red-900/30 text-red-600 dark:text-red-400 border border-red-200 dark:border-red-900/30 text-sm font-medium px-4 py-2 rounded-lg shadow-sm transition-colors flex items-center gap-2" title="Hapus Pelanggan Terpilih">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Hapus
                </button>
                <div class="relative inline-block text-left" id="bulkStatusDropdown">
                    <button type="button" id="btnBulkStatusToggle" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-lg shadow-sm transition-colors flex items-center gap-1.5">
                        <span>Ubah Status</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="bulkStatusMenu" class="hidden absolute right-0 top-full mt-1.5 w-48 bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-100 dark:border-gray-700 z-50 py-1.5 animate-fade-in">
                        <button type="button" id="btnTandaiSudahBayar" class="w-full text-left px-4 py-2.5 text-sm text-emerald-600 dark:text-emerald-400 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 flex items-center gap-2.5 transition-colors font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Tandai Sudah Bayar
                        </button>
                        <button type="button" id="btnTandaiBelumBayar" class="w-full text-left px-4 py-2.5 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-500/10 flex items-center gap-2.5 transition-colors font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Tandai Belum Bayar
                        </button>
                    </div>
                </div>
            </div>
        </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-left text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase tracking-wider">
                            <th class="pl-5 pr-2 py-4 w-10">
                                <input type="checkbox" id="selectAll" class="w-4 h-4 text-blue-600 rounded border-gray-300 dark:border-gray-600 focus:ring-blue-500 cursor-pointer">
                            </th>
                            <th class="px-2 py-4 w-10">No</th>
                            <th class="px-3 py-4 whitespace-nowrap">Nama</th>
                        <th class="px-3 py-4">Email</th>
                        <th class="px-3 py-4">Alamat</th>
                        <th class="px-3 py-4 whitespace-nowrap">No HP</th>
                        <th class="px-3 py-4">Paket</th>
                        <th class="px-3 py-4">Tagihan</th>
                        <th class="px-3 py-4">Status</th>
                        <th class="px-3 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 dark:divide-gray-700/50">
                    @forelse($pelanggans as $index => $p)
                        <tr class="table-row hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                            <td class="pl-5 pr-2 py-3">
                                <input type="checkbox" name="pelanggan_ids[]" value="{{ $p->id }}" class="row-checkbox w-4 h-4 text-blue-600 rounded border-gray-300 dark:border-gray-600 focus:ring-blue-500 cursor-pointer">
                            </td>
                            <td class="px-2 py-3 text-sm text-gray-500 dark:text-gray-400 text-center">{{ $index + 1 }}</td>
                            <td class="px-3 py-3 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white text-[11px] font-bold overflow-hidden shrink-0 shadow-sm border border-blue-100">
                                        @if($p->foto)
                                            <img src="{{ asset('uploads/profiles/' . $p->foto) }}" class="w-full h-full object-cover" alt="Profile">
                                        @else
                                            {{ strtoupper(substr($p->nama, 0, 1)) }}
                                        @endif
                                    </div>
                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-200">{{ $p->nama }}</span>
                                </div>
                            </td>
                            <td class="px-3 py-3 text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">{{ $p->email ?? '-' }}</td>
                            <td class="px-3 py-3 text-sm text-gray-500 dark:text-gray-400 min-w-[120px]">{{ $p->alamat ?? '-' }}</td>
                            <td class="px-3 py-3 text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">{{ $p->no_hp ?? '-' }}</td>
                            <td class="px-3 py-3 whitespace-nowrap">
                                <span class="inline-flex items-center gap-1 bg-gray-100 dark:bg-gray-700/50 text-gray-600 dark:text-gray-300 text-xs font-medium px-2 py-1 rounded-lg">
                                    {{ $p->paket }}
                                </span>
                            </td>
                            <td class="px-3 py-3 text-sm font-semibold text-gray-700 dark:text-gray-200 whitespace-nowrap">
                                Rp{{ number_format($p->tagihan, 0, ',', '.') }}
                            </td>
                            <td class="px-3 py-3 whitespace-nowrap">
                                @if ($p->status === 'sudah_bayar')
                                    <span
                                        class="inline-flex items-center gap-1.5 bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 text-[11px] font-semibold px-2.5 py-1 rounded-full border border-emerald-200 dark:border-emerald-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Lunas
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center gap-1.5 bg-red-50 dark:bg-red-500/10 text-red-700 dark:text-red-400 text-[11px] font-semibold px-2.5 py-1 rounded-full border border-red-200 dark:border-red-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                        Belum
                                    </span>
                                @endif
                            </td>
                            <td class="px-3 py-3">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.pelanggan.edit', $p->id) }}"
                                        class="w-8 h-8 rounded-lg bg-amber-50 dark:bg-amber-500/10 border border-amber-200 dark:border-amber-500/20 flex items-center justify-center text-amber-600 dark:text-amber-400 hover:bg-amber-100 dark:hover:bg-amber-500/20 transition-all duration-200"
                                        title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.pelanggan.destroy', $p->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus pelanggan {{ $p->nama }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="w-8 h-8 rounded-lg bg-red-50 dark:bg-red-500/10 border border-red-200 dark:border-red-500/20 flex items-center justify-center text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-500/20 transition-all duration-200"
                                            title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 rounded-full bg-gray-100 dark:bg-gray-700/50 flex items-center justify-center mb-4">
                                        <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <p class="text-gray-400 font-medium">Belum ada data pelanggan</p>
                                    <a href="{{ route('admin.pelanggan.create') }}"
                                        class="mt-3 text-sm text-blue-600 dark:text-blue-400 hover:underline font-medium">+ Tambah pelanggan pertama</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <form id="hiddenBulkForm" action="{{ route('admin.pelanggan.bulkUpdateStatus') }}" method="POST" class="hidden">
            @csrf
            <div id="hiddenInputsContainer"></div>
        </form>

        <form id="hiddenBulkDeleteForm" action="{{ route('admin.pelanggan.bulkDelete') }}" method="POST" class="hidden">
            @csrf
            <div id="hiddenDeleteInputsContainer"></div>
        </form>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAll = document.getElementById('selectAll');
            const checkboxes = document.querySelectorAll('.row-checkbox');
            const bulkActions = document.getElementById('bulkActions');
            const selectedCount = document.getElementById('selectedCount');

            function updateBulkActions() {
                const checkedCount = document.querySelectorAll('.row-checkbox:checked').length;
                selectedCount.textContent = checkedCount;
                
                if (checkedCount > 0) {
                    bulkActions.classList.remove('hidden');
                } else {
                    bulkActions.classList.add('hidden');
                    selectAll.checked = false;
                }
            }

            selectAll.addEventListener('change', function() {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = selectAll.checked;
                });
                updateBulkActions();
            });

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const allChecked = Array.from(checkboxes).every(cb => cb.checked);
                    selectAll.checked = allChecked;
                    updateBulkActions();
                });
            });

            // Bulk Status Dropdown Toggle
            const bulkStatusToggle = document.getElementById('btnBulkStatusToggle');
            const bulkStatusMenu = document.getElementById('bulkStatusMenu');

            if (bulkStatusToggle) {
                bulkStatusToggle.addEventListener('click', function(e) {
                    e.stopPropagation();
                    bulkStatusMenu.classList.toggle('hidden');
                });
            }

            // Function to submit bulk status update
            function submitBulkStatus(status) {
                const container = document.getElementById('hiddenInputsContainer');
                container.innerHTML = '';
                
                // Add status parameter
                const statusInput = document.createElement('input');
                statusInput.type = 'hidden';
                statusInput.name = 'status';
                statusInput.value = status;
                container.appendChild(statusInput);
                
                // Add selected customer IDs
                document.querySelectorAll('.row-checkbox:checked').forEach(cb => {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'pelanggan_ids[]';
                    input.value = cb.value;
                    container.appendChild(input);
                });

                document.getElementById('hiddenBulkForm').submit();
            }

            if (document.getElementById('btnTandaiSudahBayar')) {
                document.getElementById('btnTandaiSudahBayar').addEventListener('click', function() {
                    submitBulkStatus('sudah_bayar');
                });
            }

            if (document.getElementById('btnTandaiBelumBayar')) {
                document.getElementById('btnTandaiBelumBayar').addEventListener('click', function() {
                    submitBulkStatus('belum_bayar');
                });
            }

            // Close dropdowns when clicking outside
            document.addEventListener('click', function(e) {
                if (bulkStatusMenu && !bulkStatusMenu.classList.contains('hidden') && !e.target.closest('#bulkStatusDropdown')) {
                    bulkStatusMenu.classList.add('hidden');
                }
            });

            document.getElementById('btnHapusTerpilih').addEventListener('click', function() {
                const checkedCount = document.querySelectorAll('.row-checkbox:checked').length;
                if (confirm(`Yakin ingin menghapus ${checkedCount} pelanggan yang dipilih? Tindakan ini tidak dapat dibatalkan.`)) {
                    const container = document.getElementById('hiddenDeleteInputsContainer');
                    container.innerHTML = '';
                    
                    document.querySelectorAll('.row-checkbox:checked').forEach(cb => {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'pelanggan_ids[]';
                        input.value = cb.value;
                        container.appendChild(input);
                    });

                    document.getElementById('hiddenBulkDeleteForm').submit();
                }
            });
        });
    </script>

@endsection
