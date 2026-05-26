<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class InvoiceVerificationController extends Controller
{
    public function verify($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        
        // Return the actual invoice view as a digital invoice
        return view('admin.invoice.print', [
            'pelanggan' => $pelanggan,
            'isDigital' => true
        ]);
    }
}
