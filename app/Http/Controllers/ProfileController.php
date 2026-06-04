<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin;
use App\Models\Pelanggan;
use App\Mail\OtpMail;

class ProfileController extends Controller
{
    /**
     * Get current logged in user (Admin or Pelanggan)
     */
    private function getCurrentUser()
    {
        $role = Session::get('role');
        if ($role === 'admin') {
            return Admin::find(Session::get('admin_id'));
        } elseif ($role === 'pelanggan') {
            return Pelanggan::find(Session::get('pelanggan_id'));
        }
        return null;
    }

    /**
     * Display profile page
     */
    public function index()
    {
        $user = $this->getCurrentUser();
        $role = Session::get('role');

        if (!$user) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return view('profile.index', compact('user', 'role'));
    }

    /**
     * Request OTP for email binding
     */
    public function requestOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = $this->getCurrentUser();
        $role = Session::get('role');

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $email = $request->email;

        // Check if email already used by another user of the same role
        if ($role === 'admin') {
            $exists = Admin::where('email', $email)->where('id', '!=', $user->id)->exists();
        } else {
            $exists = Pelanggan::where('email', $email)->where('id', '!=', $user->id)->exists();
        }

        if ($exists) {
            return response()->json(['success' => false, 'message' => 'Email ini sudah digunakan oleh akun lain.']);
        }

        // Generate 6-digit OTP
        $otp = sprintf("%06d", mt_rand(1, 999999));

        // Store OTP in cache for 5 minutes (using unique cache key per user and role)
        $cacheKey = "otp_{$role}_{$user->id}";
        Cache::put($cacheKey, [
            'otp' => $otp,
            'email' => $email
        ], now()->addMinutes(5));

        // Send Email
        try {
            Mail::to($email)->send(new OtpMail($otp));
            return response()->json([
                'success' => true, 
                'message' => 'Kode OTP telah dikirim ke email Anda. Silakan cek kotak masuk atau folder spam.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 
                'message' => 'Gagal mengirim email OTP. Pastikan konfigurasi SMTP benar. Pesan error: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Verify OTP and save email
     */
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|string|size:6'
        ]);

        $user = $this->getCurrentUser();
        $role = Session::get('role');

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $cacheKey = "otp_{$role}_{$user->id}";
        $cachedData = Cache::get($cacheKey);

        if (!$cachedData) {
            return response()->json(['success' => false, 'message' => 'Kode OTP sudah kedaluwarsa. Silakan request ulang.']);
        }

        if ($cachedData['otp'] !== $request->otp) {
            return response()->json(['success' => false, 'message' => 'Kode OTP salah.']);
        }

        // Success, update email
        $user->email = $cachedData['email'];
        $user->save();

        // Clear cache
        Cache::forget($cacheKey);

        return response()->json([
            'success' => true, 
            'message' => 'Berhasil! Email Anda telah ditautkan ke akun ini.'
        ]);
    }

    /**
     * Upload Profile Photo
     */
    public function uploadFoto(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = $this->getCurrentUser();
        if (!$user) {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9_\.]/', '', $file->getClientOriginalName());
            // Store in storage/app/public/profile
            $path = $file->storeAs('profile', $filename, 'public');
            
            // Delete old photo if exists
            if ($user->foto && \Illuminate\Support\Facades\Storage::disk('public')->exists($user->foto)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($user->foto);
            }

            $user->foto = $path;
            $user->save();

            return redirect()->back()->with('success', 'Foto profil berhasil diperbarui.');
        }

        return redirect()->back()->with('error', 'Gagal mengunggah foto.');
    }
}
