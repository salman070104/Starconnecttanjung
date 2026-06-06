<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\Pelanggan;

class GoogleAuthController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     */
    public function redirect()
    {
        return Socialite::driver('google')->with(['prompt' => 'select_account'])->redirect();
    }

    /**
     * Obtain the user information from Google.
     */
    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $email = $googleUser->getEmail();

            // 1. Cek apakah email ada di tabel Pelanggan
            $pelanggan = Pelanggan::where('email', $email)->first();
            if ($pelanggan) {
                // Login sebagai Pelanggan
                Session::put('login', true);
                Session::put('role', 'pelanggan');
                Session::put('pelanggan_id', $pelanggan->id);
                
                return redirect()->route('customer.dashboard')->with('success', 'Berhasil login dengan Google!');
            }

            // 2. Cek apakah email ada di tabel Admin
            $admin = Admin::where('email', $email)->first();
            if ($admin) {
                // Login sebagai Admin
                Session::put('login', true);
                Session::put('role', 'admin');
                Session::put('admin_id', $admin->id);
                Session::put('admin_name', $admin->name);
                
                return redirect()->route('admin.dashboard')->with('success', 'Berhasil login dengan Google!');
            }

            // Jika email tidak ditemukan di manapun
            return redirect('/login')->with('error', 'Email ' . $email . ' belum terdaftar. Silakan login dengan username dan tautkan email Anda di menu Profil terlebih dahulu.');

        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Gagal login dengan Google. Pesan error: ' . $e->getMessage());
        }
    }
}
