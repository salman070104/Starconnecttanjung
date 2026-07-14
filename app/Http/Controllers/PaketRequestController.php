<?php

namespace App\Http\Controllers;

use App\Models\PaketRequest;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaketRequestController extends Controller
{
    /**
     * Daftar paket yang tersedia beserta harganya
     */
    public static function availablePackages(): array
    {
        return [
            '8 Mbps'  => 150000,
            '10 Mbps' => 170000,
            '15 Mbps' => 220000,
            '20 Mbps' => 270000,
            '30 Mbps' => 420000,
        ];
    }

    /**
     * Pelanggan submit permintaan ubah paket
     */
    public function store(Request $request)
    {
        if (!Session::get('login') || Session::get('role') !== 'pelanggan') {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $pelanggan = Pelanggan::find(Session::get('pelanggan_id'));
        if (!$pelanggan) {
            return redirect('/login')->with('error', 'Data pelanggan tidak ditemukan.');
        }

        // Cek apakah sudah ada request pending
        $pendingRequest = PaketRequest::where('pelanggan_id', $pelanggan->id)
            ->where('status', 'pending')
            ->first();

        if ($pendingRequest) {
            return back()->with('error', 'Anda masih memiliki permintaan ubah paket yang menunggu persetujuan.');
        }

        $packages = self::availablePackages();

        $request->validate([
            'paket_baru' => 'required|string|in:' . implode(',', array_keys($packages)),
        ]);

        $paketBaru = $request->paket_baru;

        // Jangan izinkan request ke paket yang sama
        if ($pelanggan->paket === $paketBaru) {
            return back()->with('error', 'Anda sudah menggunakan paket ini.');
        }

        PaketRequest::create([
            'pelanggan_id' => $pelanggan->id,
            'paket_lama'   => $pelanggan->paket,
            'tagihan_lama' => $pelanggan->tagihan,
            'paket_baru'   => $paketBaru,
            'tagihan_baru' => $packages[$paketBaru],
            'status'       => 'pending',
        ]);

        return back()->with('success', 'Permintaan ubah paket berhasil dikirim! Menunggu persetujuan admin.');
    }

    /**
     * Admin melihat daftar permintaan ubah paket
     */
    public function adminIndex()
    {
        $requests = PaketRequest::with('pelanggan')->latest()->get();
        $pendingCount = PaketRequest::where('status', 'pending')->count();

        return view('admin.paket_requests', compact('requests', 'pendingCount'));
    }

    /**
     * Admin approve permintaan — otomatis update database pelanggan
     */
    public function approve(PaketRequest $paketRequest)
    {
        if ($paketRequest->status !== 'pending') {
            return back()->with('error', 'Permintaan ini sudah diproses sebelumnya.');
        }

        // Update paket request status
        $paketRequest->update([
            'status'      => 'approved',
            'approved_at' => now(),
        ]);

        // Update data pelanggan di database
        $pelanggan = $paketRequest->pelanggan;
        if ($pelanggan) {
            $pelanggan->update([
                'paket'   => $paketRequest->paket_baru,
                'tagihan' => $paketRequest->tagihan_baru,
            ]);
        }

        return back()->with('success', 'Permintaan ubah paket pelanggan "' . ($pelanggan->nama ?? 'Unknown') . '" berhasil disetujui! Paket dan tagihan sudah diperbarui.');
    }

    /**
     * Admin reject permintaan
     */
    public function reject(Request $request, PaketRequest $paketRequest)
    {
        if ($paketRequest->status !== 'pending') {
            return back()->with('error', 'Permintaan ini sudah diproses sebelumnya.');
        }

        $request->validate([
            'admin_note' => 'nullable|string|max:500',
        ]);

        $paketRequest->update([
            'status'     => 'rejected',
            'admin_note' => $request->admin_note ?? 'Ditolak oleh admin.',
        ]);

        return back()->with('success', 'Permintaan ubah paket pelanggan "' . ($paketRequest->pelanggan->nama ?? 'Unknown') . '" berhasil ditolak.');
    }
}
