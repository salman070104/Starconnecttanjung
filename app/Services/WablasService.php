<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WablasService
{
    /**
     * Mengirim pesan tagihan (tenggat) ke pelanggan
     *
     * @param string $no_hp Nomor HP pelanggan
     * @param string $nama Nama pelanggan
     * @param int $nominal Nominal tagihan
     * @return bool
     */
    public static function sendBillingMessage($no_hp, $nama, $nominal)
    {
        $domain = env('WABLAS_DOMAIN');
        $token = env('WABLAS_TOKEN');

        if (!$domain || !$token) {
            Log::warning('Wablas domain or token is missing in .env');
            return false;
        }

        // Format angka menjadi Rp
        $nominalRp = 'Rp ' . number_format($nominal, 0, ',', '.');
        $bulanIni = date('F Y');

        $message = "Halo *{$nama}*,\n\n" .
            "Ini adalah pengingat tagihan internet *Star Connect* Anda untuk bulan *{$bulanIni}*.\n\n" .
            "Tagihan yang harus dibayar: *{$nominalRp}*\n\n" .
            "Harap segera melakukan pembayaran agar layanan internet tetap aktif dan lancar.\n" .
            "Silakan login ke https://starconnecttanjung.com/login untuk membayar via Midtrans.\n\n" .
            "Terima kasih,\n*Admin Star Connect*";

        return self::sendMessage($domain, $token, $no_hp, $message);
    }

    /**
     * Mengirim pesan kwitansi (pembayaran sukses) ke pelanggan
     *
     * @param string $no_hp Nomor HP pelanggan
     * @param string $nama Nama pelanggan
     * @param int $nominal Nominal tagihan yang dibayar
     * @param string $tanggal Tanggal pembayaran
     * @return bool
     */
    public static function sendReceiptMessage($no_hp, $nama, $nominal, $tanggal)
    {
        $domain = env('WABLAS_DOMAIN');
        $token = env('WABLAS_TOKEN');

        if (!$domain || !$token) {
            Log::warning('Wablas domain or token is missing in .env');
            return false;
        }

        $nominalRp = 'Rp ' . number_format($nominal, 0, ',', '.');

        $message = "Halo *{$nama}*,\n\n" .
            "Terima kasih! Pembayaran internet *Star Connect* Anda telah kami terima.\n\n" .
            "Rincian Pembayaran:\n" .
            "Nominal: *{$nominalRp}*\n" .
            "Tanggal: *{$tanggal}*\n" .
            "Status: *LUNAS*\n\n" .
            "Terima kasih telah mempercayakan koneksi internet Anda kepada kami.\n\n" .
            "Salam hangat,\n*Admin Star Connect*";

        return self::sendMessage($domain, $token, $no_hp, $message);
    }

    /**
     * Mengirim HTTP POST request ke Wablas API
     */
    private static function sendMessage($domain, $token, $phone, $message)
    {
        try {
            // Pastikan URL domain tidak memiliki slash di akhir
            $domain = rtrim($domain, '/');
            
            // Format phone ke format standar jika diperlukan (contoh wablas bisa baca 08xx atau 628xx)
            
            $response = Http::withHeaders([
                'Authorization' => $token
            ])->post("{$domain}/api/send-message", [
                'phone' => $phone,
                'message' => $message,
            ]);

            if ($response->successful()) {
                Log::info("Wablas success sending to {$phone}");
                return true;
            } else {
                Log::error("Wablas error: " . $response->body());
                return false;
            }
        } catch (\Exception $e) {
            Log::error("Wablas exception: " . $e->getMessage());
            return false;
        }
    }
}
