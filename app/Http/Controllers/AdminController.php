<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\LaporanGangguan;
use App\Models\Setting;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    // Dashboard
    public function dashboard()
    {
        $belumBayar = Pelanggan::where('status', 'belum_bayar')->count();
        $sudahBayar = Pelanggan::where('status', 'sudah_bayar')->count();
        $totalPendapatan = Pelanggan::where('status', 'sudah_bayar')->sum('tagihan');

        return view('admin.dashboard', compact('belumBayar', 'sudahBayar', 'totalPendapatan'));
    }

    public function dashboardExportPdf()
    {
        $belumBayar = Pelanggan::where('status', 'belum_bayar')->count();
        $sudahBayar = Pelanggan::where('status', 'sudah_bayar')->count();
        $totalPendapatan = Pelanggan::where('status', 'sudah_bayar')->sum('tagihan');
        $riwayatPembayaran = Pelanggan::where('status', 'sudah_bayar')
            ->whereNotNull('tanggal_bayar')
            ->orderBy('tanggal_bayar', 'desc')
            ->take(20)
            ->get();

        $pdf = Pdf::loadView('admin.dashboard.pdf', compact('belumBayar', 'sudahBayar', 'totalPendapatan', 'riwayatPembayaran'));
        return $pdf->download('statistik_pelanggan_starconnect.pdf');
    }

    // Database Pelanggan
    public function pelangganIndex()
    {
        $query = Pelanggan::latest();

        if (request('search')) {
            $search = request('search');
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('no_hp', 'like', '%' . $search . '%');
            });
        }

        $pelanggans = $query->get();
        return view('admin.pelanggan.index', compact('pelanggans'));
    }

    public function pelangganExportPdf(Request $request)
    {
        $query = Pelanggan::latest();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('no_hp', 'like', '%' . $search . '%');
            });
        }

        $pelanggans = $query->get();
        $pdf = Pdf::loadView('admin.pelanggan.pdf', compact('pelanggans'));
        return $pdf->download('database_pelanggan_starconnect.pdf');
    }

    public function pelangganCreate()
    {
        return view('admin.pelanggan.create');
    }

    public function pelangganStore(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'username' => 'nullable|string|max:255|unique:pelanggans,username',
            'password' => 'nullable|string|min:4|max:255',
            'paket' => 'required|string|max:100',
            'tagihan' => 'required|integer|min:0',
            'status' => 'required|in:sudah_bayar,belum_bayar',
        ]);

        $data = $request->all();
        $data['is_wa_notif_enabled'] = $request->has('is_wa_notif_enabled');

        if ($data['status'] === 'sudah_bayar') {
            $data['tanggal_bayar'] = now();
        }

        Pelanggan::create($data);

        return redirect()->route('admin.pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan!');
    }

    public function pelangganEdit(Pelanggan $pelanggan)
    {
        return view('admin.pelanggan.edit', compact('pelanggan'));
    }

    public function pelangganUpdate(Request $request, Pelanggan $pelanggan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'username' => 'nullable|string|max:255|unique:pelanggans,username,' . $pelanggan->id,
            'password' => 'nullable|string|min:4|max:255',
            'paket' => 'required|string|max:100',
            'tagihan' => 'required|integer|min:0',
            'status' => 'required|in:sudah_bayar,belum_bayar',
        ]);

        $data = $request->all();
        $data['is_wa_notif_enabled'] = $request->has('is_wa_notif_enabled');

        if (empty($data['password'])) {
            unset($data['password']);
        }

        if ($data['status'] === 'sudah_bayar' && $pelanggan->status === 'belum_bayar') {
            $data['tanggal_bayar'] = now();
        } elseif ($data['status'] === 'belum_bayar') {
            $data['tanggal_bayar'] = null;
        }

        $pelanggan->update($data);

        return redirect()->route('admin.pelanggan.index')->with('success', 'Data pelanggan berhasil diperbarui!');
    }

    public function pelangganDestroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect()->route('admin.pelanggan.index')->with('success', 'Pelanggan berhasil dihapus!');
    }

    public function pelangganUpdateStatus(Request $request, Pelanggan $pelanggan)
    {
        $request->validate([
            'status' => 'required|in:sudah_bayar,belum_bayar',
        ]);

        $data = ['status' => $request->status];

        if ($request->status === 'sudah_bayar' && $pelanggan->status === 'belum_bayar') {
            $data['tanggal_bayar'] = now();
        } elseif ($request->status === 'belum_bayar') {
            $data['tanggal_bayar'] = null;
        }

        $pelanggan->update($data);

        return back()->with('success', 'Status pelanggan "' . $pelanggan->nama . '" berhasil diubah!');
    }

    public function pelangganBulkUpdateStatus(Request $request)
    {
        $request->validate([
            'pelanggan_ids' => 'required|array',
            'pelanggan_ids.*' => 'exists:pelanggans,id',
            'status' => 'required|in:sudah_bayar,belum_bayar',
        ]);

        $status = $request->status;
        $updateData = ['status' => $status];

        if ($status === 'sudah_bayar') {
            $updateData['tanggal_bayar'] = now();
            $messageSuffix = 'Lunas!';
        } else {
            $updateData['tanggal_bayar'] = null;
            $messageSuffix = 'Belum Bayar!';
        }

        Pelanggan::whereIn('id', $request->pelanggan_ids)->update($updateData);

        return redirect()->route('admin.pelanggan.index')->with('success', count($request->pelanggan_ids) . ' pelanggan berhasil diubah statusnya menjadi ' . $messageSuffix);
    }

    public function pelangganBulkDelete(Request $request)
    {
        $request->validate([
            'pelanggan_ids' => 'required|array',
            'pelanggan_ids.*' => 'exists:pelanggans,id',
        ]);

        Pelanggan::whereIn('id', $request->pelanggan_ids)->delete();

        return redirect()->route('admin.pelanggan.index')->with('success', count($request->pelanggan_ids) . ' pelanggan berhasil dihapus!');
    }

    // Riwayat Pembayaran
    public function riwayat()
    {
        $riwayat = Pelanggan::where('status', 'sudah_bayar')
            ->whereNotNull('tanggal_bayar')
            ->orderBy('tanggal_bayar', 'desc')
            ->get();

        return view('admin.riwayat', compact('riwayat'));
    }

    // Laporan Gangguan
    public function laporanGangguan()
    {
        $laporan = LaporanGangguan::latest()->get();
        return view('admin.laporan_gangguan', compact('laporan'));
    }

    public function updateStatusLaporan(Request $request, LaporanGangguan $laporan)
    {
        $request->validate([
            'status' => 'required|in:baru,diproses,selesai',
        ]);

        $laporan->update(['status' => $request->status]);

        return back()->with('success', 'Status laporan berhasil diperbarui!');
    }

    public function hapusLaporan(LaporanGangguan $laporan)
    {
        $laporan->delete();
        return back()->with('success', 'Laporan berhasil dihapus!');
    }

    // Invoice
    public function invoiceIndex()
    {
        $query = Pelanggan::where('status', 'sudah_bayar')->latest('tanggal_bayar');
        
        if (request('search')) {
            $search = request('search');
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('no_hp', 'like', '%' . $search . '%')
                  ->orWhere('alamat', 'like', '%' . $search . '%');
            });
        }
        
        $pelanggans = $query->get();
        return view('admin.invoice.index', compact('pelanggans'));
    }

    public function invoiceCetak(Pelanggan $pelanggan)
    {
        if ($pelanggan->status !== 'sudah_bayar') {
            return back()->with('error', 'Pelanggan ini belum melakukan pembayaran!');
        }
        return view('admin.invoice.print', compact('pelanggan'));
    }

    // WhatsApp Settings (Wablas Integration)
    public function whatsappSettings()
    {
        $pushNotification = Setting::get('whatsapp_push_notification', '0');
        $wablasToken = Setting::get('wablas_api_token', '');
        $wablasDomain = Setting::get('wablas_domain', 'https://api.wablas.com');

        return view('admin.whatsapp', compact('pushNotification', 'wablasToken', 'wablasDomain'));
    }

    public function updateWhatsappSettings(Request $request)
    {
        $request->validate([
            'wablas_api_token' => 'nullable|string|max:255',
            'wablas_domain' => 'nullable|string|max:255',
        ]);

        $pushNotification = $request->has('whatsapp_push_notification') ? '1' : '0';
        Setting::set('whatsapp_push_notification', $pushNotification);
        Setting::set('wablas_api_token', $request->wablas_api_token ?? '');
        Setting::set('wablas_domain', $request->wablas_domain ?? 'https://api.wablas.com');

        return redirect()->route('admin.whatsapp')->with('success', 'Pengaturan WhatsApp API berhasil diperbarui!');
    }
}
