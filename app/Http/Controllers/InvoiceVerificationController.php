<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class InvoiceVerificationController extends Controller
{
    public function verify($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.invoice.pdf', [
            'pelanggan' => $pelanggan,
            'isDigital' => true
        ])->setPaper('a4', 'portrait');

        return $pdf->stream('Invoice-' . $pelanggan->nama . '.pdf');
    }
}
