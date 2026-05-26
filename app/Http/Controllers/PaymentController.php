<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function dashboard()
    {
        // Get logged in customer from session
        $pelangganId = Session::get('pelanggan_id');
        $pelanggan = Pelanggan::find($pelangganId);

        if (!$pelanggan) {
            return redirect('/')->with('error', 'Data pelanggan tidak ditemukan.');
        }

        // Configure Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized');
        \Midtrans\Config::$is3ds = config('midtrans.is_3ds');

        $snapToken = null;

        // Only generate snap token if customer hasn't paid
        if ($pelanggan->status === 'belum_bayar') {
            $orderId = 'INV-' . $pelanggan->id . '-' . time();
            
            $params = array(
                'transaction_details' => array(
                    'order_id' => $orderId,
                    'gross_amount' => $pelanggan->tagihan,
                ),
                'customer_details' => array(
                    'first_name' => $pelanggan->nama,
                    'email' => strtolower(str_replace(' ', '', $pelanggan->nama)) . '@example.com',
                    'phone' => $pelanggan->no_hp ?? '081234567890',
                ),
                'item_details' => array(
                    [
                        'id' => 'PKT-' . $pelanggan->id,
                        'price' => $pelanggan->tagihan,
                        'quantity' => 1,
                        'name' => 'Pembayaran ' . $pelanggan->paket,
                    ]
                )
            );

            try {
                $snapToken = \Midtrans\Snap::getSnapToken($params);
            } catch (\Exception $e) {
                // Ignore exception in sandbox if keys are invalid, but in real case handle it
                $snapToken = 'dummy-token-for-dev'; 
            }
        }

        return view('dashboard', compact('pelanggan', 'snapToken'));
    }

    public function callback(Request $request)
    {
        // This is a simplified webhook handler for Midtrans
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                // Extract customer ID from order_id (Format: INV-ID-TIMESTAMP)
                $parts = explode('-', $request->order_id);
                if (isset($parts[1])) {
                    $pelangganId = $parts[1];
                    $pelanggan = Pelanggan::find($pelangganId);
                    if ($pelanggan) {
                        $pelanggan->update([
                            'status' => 'sudah_bayar',
                            'tanggal_bayar' => now()
                        ]);
                    }
                }
            }
        }
        
        return response()->json(['status' => 'success']);
    }

    public function paymentSuccess(Request $request)
    {
        $orderId = $request->order_id;
        if ($orderId) {
            $parts = explode('-', $orderId);
            if (isset($parts[1])) {
                $pelangganId = $parts[1];
                $pelanggan = Pelanggan::find($pelangganId);
                if ($pelanggan && $pelanggan->status === 'belum_bayar') {
                    $pelanggan->update([
                        'status' => 'sudah_bayar',
                        'tanggal_bayar' => now()
                    ]);
                }
            }
        }
        return redirect('/dashboard')->with('success', 'Pembayaran Berhasil! Tagihan Anda telah lunas.');
    }
    public function checkStatus()
    {
        $pelangganId = Session::get('pelanggan_id');
        $pelanggan = Pelanggan::find($pelangganId);

        if ($pelanggan) {
            return response()->json(['status' => $pelanggan->status]);
        }

        return response()->json(['status' => 'error'], 404);
    }

    public function pending()
    {
        $pelangganId = Session::get('pelanggan_id');
        $pelanggan = Pelanggan::find($pelangganId);

        if (!$pelanggan) {
            return redirect('/')->with('error', 'Data pelanggan tidak ditemukan.');
        }

        // Jika sudah bayar, kembalikan ke dashboard
        if ($pelanggan->status === 'sudah_bayar') {
            return redirect('/dashboard')->with('success', 'Pembayaran telah berhasil diverifikasi.');
        }

        return view('payment-pending', compact('pelanggan'));
    }
}
