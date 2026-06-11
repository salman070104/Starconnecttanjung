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

        $gateway = config('payment.gateway', 'doku');

        // Configure Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized');
        \Midtrans\Config::$is3ds = config('midtrans.is_3ds');

        $snapToken = null;
        $paymentUrl = null;

        if ($pelanggan->status === 'belum_bayar') {
            $orderId = 'INV-' . $pelanggan->id . '-' . time();
            
            if ($gateway === 'doku') {
                $amount = $pelanggan->tagihan;
                $clientId = config('payment.doku.client_id');
                $secretKey = config('payment.doku.secret_key');
                $isProduction = config('payment.doku.is_production');
                
                $targetPath = '/checkout/v1/payment';
                $url = $isProduction ? 'https://api.doku.com' . $targetPath : 'https://api-sandbox.doku.com' . $targetPath;
                
                $requestId = (string) \Illuminate\Support\Str::uuid();
                $requestTimestamp = gmdate("Y-m-d\TH:i:s\Z");
                
                $requestBody = array(
                    'order' => array(
                        'amount' => $amount,
                        'invoice_number' => $orderId,
                        'callback_url' => route('customer.dashboard'),
                    ),
                    'customer' => array(
                        'name' => $pelanggan->nama,
                        'email' => strtolower(str_replace(' ', '', $pelanggan->nama)) . '@example.com',
                        'phone' => $pelanggan->no_hp ?? '081234567890',
                    )
                );
                
                $jsonBody = json_encode($requestBody);
                $digest = base64_encode(hash('sha256', $jsonBody, true));
                
                $signatureComponent = "Client-Id:" . $clientId . "\n" .
                    "Request-Id:" . $requestId . "\n" .
                    "Request-Timestamp:" . $requestTimestamp . "\n" .
                    "Request-Target:" . $targetPath . "\n" .
                    "Digest:" . $digest;
                    
                $signature = base64_encode(hash_hmac('sha256', $signatureComponent, $secretKey, true));
                
                try {
                    $response = \Illuminate\Support\Facades\Http::withHeaders([
                        'Client-Id' => $clientId,
                        'Request-Id' => $requestId,
                        'Request-Timestamp' => $requestTimestamp,
                        'Signature' => "HMACSHA256=" . $signature,
                    ])->post($url, $requestBody);
                    
                    $responseData = $response->json();
                    if (isset($responseData['response']['payment']['url'])) {
                        $paymentUrl = $responseData['response']['payment']['url'];
                    }
                } catch (\Exception $e) {
                    $paymentUrl = null;
                }

            } else {
                // Midtrans Generation
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
                    $snapToken = 'dummy-token-for-dev'; 
                }
            }
        }

        return view('dashboard', compact('pelanggan', 'snapToken', 'paymentUrl', 'gateway'));
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
                    if ($pelanggan && $pelanggan->status !== 'sudah_bayar') {
                        $pelanggan->update([
                            'status' => 'sudah_bayar',
                            'tanggal_bayar' => now()
                        ]);

                        // Kirim notifikasi WhatsApp
                        if ($pelanggan->no_hp && $pelanggan->is_wa_notif_enabled) {
                            \App\Services\WablasService::sendReceiptMessage(
                                $pelanggan->no_hp,
                                $pelanggan->nama,
                                $pelanggan->tagihan,
                                date('d M Y')
                            );
                        }
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

                    // Kirim notifikasi WhatsApp
                    if ($pelanggan->no_hp && $pelanggan->is_wa_notif_enabled) {
                        \App\Services\WablasService::sendReceiptMessage(
                            $pelanggan->no_hp,
                            $pelanggan->nama,
                            $pelanggan->tagihan,
                            date('d M Y')
                        );
                    }
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

    public function dokuCallback(Request $request)
    {
        $payload = $request->getContent();
        $data = json_decode($payload, true);
        
        if (isset($data['order']['invoice_number'])) {
            $invoiceNumber = $data['order']['invoice_number'];
            $parts = explode('-', $invoiceNumber);
            
            if (isset($parts[1])) {
                $pelangganId = $parts[1];
                $pelanggan = Pelanggan::find($pelangganId);
                
                if ($pelanggan && $pelanggan->status !== 'sudah_bayar' && isset($data['transaction']['status']) && $data['transaction']['status'] === 'SUCCESS') {
                    $pelanggan->update([
                        'status' => 'sudah_bayar',
                        'tanggal_bayar' => now()
                    ]);

                    if ($pelanggan->no_hp && $pelanggan->is_wa_notif_enabled) {
                        \App\Services\WablasService::sendReceiptMessage(
                            $pelanggan->no_hp,
                            $pelanggan->nama,
                            $pelanggan->tagihan,
                            date('d M Y')
                        );
                    }
                }
            }
        }
        
        return response()->json(['status' => 'OK']);
    }
}
