@extends('admin.layouts.app')

@section('title', 'Permintaan Ubah Paket')

@section('content')
<div class="p-4 sm:p-6">

    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-extrabold text-gray-800 dark:text-white">
                <span data-lang="id">Permintaan Ubah Paket</span>
                <span data-lang="en" class="hidden">Package Change Requests</span>
            </h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                <span data-lang="id">Kelola permintaan perubahan paket internet dari pelanggan</span>
                <span data-lang="en" class="hidden">Manage internet package change requests from customers</span>
            </p>
        </div>
        @if($pendingCount > 0)
        <div class="bg-amber-50 dark:bg-amber-500/10 border border-amber-200 dark:border-amber-500/20 text-amber-700 dark:text-amber-300 px-4 py-2 rounded-xl text-sm font-bold">
            {{ $pendingCount }} <span data-lang="id">permintaan menunggu</span><span data-lang="en" class="hidden">pending requests</span>
        </div>
        @endif
    </div>

    {{-- Success/Error Messages --}}
    @if(session('success'))
    <div class="mb-6 flex items-center gap-3 bg-emerald-50 dark:bg-emerald-500/10 border border-emerald-200 dark:border-emerald-500/20 text-emerald-700 dark:text-emerald-300 px-5 py-4 rounded-2xl text-sm font-medium">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="mb-6 flex items-center gap-3 bg-red-50 dark:bg-red-500/10 border border-red-200 dark:border-red-500/20 text-red-700 dark:text-red-300 px-5 py-4 rounded-2xl text-sm font-medium">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        {{ session('error') }}
    </div>
    @endif

    {{-- Requests Table --}}
    <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 dark:bg-slate-800 border-b border-gray-200 dark:border-slate-700">
                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">No</th>
                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            <span data-lang="id">Pelanggan</span><span data-lang="en" class="hidden">Customer</span>
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            <span data-lang="id">Paket Lama</span><span data-lang="en" class="hidden">Old Plan</span>
                        </th>
                        <th class="px-4 py-3 text-center text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider"></th>
                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            <span data-lang="id">Paket Baru</span><span data-lang="en" class="hidden">New Plan</span>
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            <span data-lang="id">Tanggal</span><span data-lang="en" class="hidden">Date</span>
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-center text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            <span data-lang="id">Aksi</span><span data-lang="en" class="hidden">Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-slate-800">
                    @forelse($requests as $i => $req)
                    <tr class="hover:bg-gray-50 dark:hover:bg-slate-800/50 transition-colors">
                        <td class="px-4 py-3 text-gray-500 dark:text-gray-400">{{ $i + 1 }}</td>
                        <td class="px-4 py-3">
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">{{ $req->pelanggan->nama ?? '-' }}</p>
                                <p class="text-xs text-gray-400 dark:text-slate-500">ID: {{ $req->pelanggan_id }}</p>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <div>
                                <p class="font-medium text-gray-700 dark:text-gray-300">{{ $req->paket_lama }}</p>
                                <p class="text-xs text-gray-400">Rp{{ number_format($req->tagihan_lama, 0, ',', '.') }}/bln</p>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <svg class="w-4 h-4 text-gray-400 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        </td>
                        <td class="px-4 py-3">
                            <div>
                                <p class="font-bold text-blue-600 dark:text-blue-400">{{ $req->paket_baru }}</p>
                                <p class="text-xs text-blue-400 dark:text-blue-500">Rp{{ number_format($req->tagihan_baru, 0, ',', '.') }}/bln</p>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-gray-500 dark:text-gray-400 text-xs">
                            {{ $req->created_at->translatedFormat('d M Y H:i') }}
                        </td>
                        <td class="px-4 py-3">
                            @if($req->status === 'pending')
                                <span class="inline-flex items-center gap-1 text-xs font-bold px-2.5 py-1 rounded-full bg-amber-50 dark:bg-amber-500/10 text-amber-600 dark:text-amber-400">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                    Pending
                                </span>
                            @elseif($req->status === 'approved')
                                <span class="inline-flex items-center gap-1 text-xs font-bold px-2.5 py-1 rounded-full bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    <span data-lang="id">Disetujui</span><span data-lang="en" class="hidden">Approved</span>
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 text-xs font-bold px-2.5 py-1 rounded-full bg-red-50 dark:bg-red-500/10 text-red-600 dark:text-red-400">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                    <span data-lang="id">Ditolak</span><span data-lang="en" class="hidden">Rejected</span>
                                </span>
                                @if($req->admin_note)
                                    <p class="text-[10px] text-red-400 mt-0.5">{{ $req->admin_note }}</p>
                                @endif
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center">
                            @if($req->status === 'pending')
                            <div class="flex items-center justify-center gap-2">
                                {{-- Approve --}}
                                <form method="POST" action="{{ route('admin.paket-requests.approve', $req->id) }}" onsubmit="return confirm('Setujui permintaan ubah paket ini? Paket dan tagihan pelanggan akan otomatis diperbarui.')">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="inline-flex items-center gap-1.5 bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-bold px-3 py-2 rounded-lg shadow-sm transition">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        <span data-lang="id">Setujui</span><span data-lang="en" class="hidden">Approve</span>
                                    </button>
                                </form>

                                {{-- Reject --}}
                                <button type="button" onclick="openRejectModal({{ $req->id }})"
                                    class="inline-flex items-center gap-1.5 bg-red-500 hover:bg-red-600 text-white text-xs font-bold px-3 py-2 rounded-lg shadow-sm transition">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                    <span data-lang="id">Tolak</span><span data-lang="en" class="hidden">Reject</span>
                                </button>
                            </div>
                            @elseif($req->status === 'approved')
                                <span class="text-xs text-gray-400">{{ $req->approved_at ? $req->approved_at->translatedFormat('d M Y H:i') : '-' }}</span>
                            @else
                                <span class="text-xs text-gray-400">-</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-4 py-12 text-center">
                            <svg class="w-12 h-12 text-gray-300 dark:text-slate-600 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                            <p class="text-gray-400 dark:text-slate-500 font-medium">
                                <span data-lang="id">Belum ada permintaan ubah paket</span>
                                <span data-lang="en" class="hidden">No package change requests yet</span>
                            </p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

{{-- Reject Modal --}}
<div id="rejectModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm">
    <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 w-full max-w-md mx-4 shadow-2xl border border-gray-200 dark:border-slate-700">
        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">
            <span data-lang="id">Tolak Permintaan</span>
            <span data-lang="en" class="hidden">Reject Request</span>
        </h3>
        <form id="rejectForm" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-600 dark:text-gray-400 mb-2">
                    <span data-lang="id">Catatan / Alasan Penolakan (opsional)</span>
                    <span data-lang="en" class="hidden">Rejection Note (optional)</span>
                </label>
                <textarea name="admin_note" rows="3" placeholder="Masukkan alasan penolakan..."
                    class="w-full border border-gray-300 dark:border-slate-600 bg-gray-50 dark:bg-slate-800 rounded-xl px-4 py-3 text-sm text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-red-500 transition resize-none"></textarea>
            </div>
            <div class="flex gap-3">
                <button type="button" onclick="closeRejectModal()"
                    class="flex-1 bg-gray-100 dark:bg-slate-800 text-gray-700 dark:text-gray-300 py-2.5 rounded-xl font-semibold text-sm hover:bg-gray-200 dark:hover:bg-slate-700 transition">
                    <span data-lang="id">Batal</span><span data-lang="en" class="hidden">Cancel</span>
                </button>
                <button type="submit"
                    class="flex-1 bg-red-500 hover:bg-red-600 text-white py-2.5 rounded-xl font-bold text-sm shadow-sm transition">
                    <span data-lang="id">Konfirmasi Tolak</span><span data-lang="en" class="hidden">Confirm Reject</span>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openRejectModal(id) {
    const modal = document.getElementById('rejectModal');
    const form = document.getElementById('rejectForm');
    form.action = '/admin/paket-requests/' + id + '/reject';
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeRejectModal() {
    const modal = document.getElementById('rejectModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

// Close modal on backdrop click
document.getElementById('rejectModal').addEventListener('click', function(e) {
    if (e.target === this) closeRejectModal();
});
</script>
@endsection
