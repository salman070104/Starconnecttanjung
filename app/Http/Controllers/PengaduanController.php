<?php

namespace App\Http\Controllers;

use App\Models\LaporanGangguan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PengaduanController extends Controller
{
    public function store(Request $request)
    {
        // Pastikan pelanggan sudah login
        if (!Session::get('login') || Session::get('role') !== 'pelanggan') {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu untuk melaporkan gangguan.');
        }

        $pelanggan = Pelanggan::find(Session::get('pelanggan_id'));
        if (!$pelanggan) {
            return redirect('/login')->with('error', 'Data pelanggan tidak ditemukan.');
        }

        $request->validate([
            'jenis_gangguan' => 'required|string|max:100',
            'deskripsi'      => 'required|string',
        ]);

        LaporanGangguan::create([
            'pelanggan_id'   => $pelanggan->id,
            'nama'           => $pelanggan->nama,
            'no_wa'          => $pelanggan->no_hp ?? '-',
            'jenis_gangguan' => $request->jenis_gangguan,
            'deskripsi'      => $request->deskripsi,
        ]);

        return back()->with('success', 'Laporan gangguan berhasil dikirim! Tim kami akan segera menindaklanjuti.');
    }
}
