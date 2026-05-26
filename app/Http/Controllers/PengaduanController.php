<?php

namespace App\Http\Controllers;

use App\Models\LaporanGangguan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama'           => 'required|string|max:255',
            'no_wa'          => 'required|string|max:20',
            'jenis_gangguan' => 'required|string|max:100',
            'deskripsi'      => 'required|string',
        ]);

        LaporanGangguan::create($request->only('nama', 'no_wa', 'jenis_gangguan', 'deskripsi'));

        return back()->with('success', 'Laporan gangguan Anda berhasil dikirim! Tim kami akan segera menindaklanjuti.');
    }
}
