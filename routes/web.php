<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ProfileController;

Route::view('/', 'landing.home');
Route::view('/paket', 'landing.paket');
Route::view('/Bayar Tagihan', 'landing.bayar tagihan');
Route::view('/kontak', 'landing.kontak');
Route::view('/login', 'auth.login');
Route::view('/pengaduan', 'landing.pengaduan');
Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/export-pdf', [AdminController::class, 'dashboardExportPdf'])->name('dashboard.exportPdf');

    // Pelanggan CRUD
    Route::get('/pelanggan', [AdminController::class, 'pelangganIndex'])->name('pelanggan.index');
    Route::get('/pelanggan/export-pdf', [AdminController::class, 'pelangganExportPdf'])->name('pelanggan.exportPdf');
    Route::get('/pelanggan/create', [AdminController::class, 'pelangganCreate'])->name('pelanggan.create');
    Route::post('/pelanggan', [AdminController::class, 'pelangganStore'])->name('pelanggan.store');
    Route::get('/pelanggan/{pelanggan}/edit', [AdminController::class, 'pelangganEdit'])->name('pelanggan.edit');
    Route::put('/pelanggan/{pelanggan}', [AdminController::class, 'pelangganUpdate'])->name('pelanggan.update');
    Route::delete('/pelanggan/{pelanggan}', [AdminController::class, 'pelangganDestroy'])->name('pelanggan.destroy');
    Route::patch('/pelanggan/{pelanggan}/status', [AdminController::class, 'pelangganUpdateStatus'])->name('pelanggan.updateStatus');
    Route::post('/pelanggan/bulk-status', [AdminController::class, 'pelangganBulkUpdateStatus'])->name('pelanggan.bulkUpdateStatus');
    Route::post('/pelanggan/bulk-delete', [AdminController::class, 'pelangganBulkDelete'])->name('pelanggan.bulkDelete');

    // Riwayat Pembayaran
    Route::get('/riwayat', [AdminController::class, 'riwayat'])->name('riwayat');

    // Laporan Gangguan
    Route::get('/laporan-gangguan', [AdminController::class, 'laporanGangguan'])->name('laporan-gangguan');
    Route::patch('/laporan-gangguan/{laporan}/status', [AdminController::class, 'updateStatusLaporan'])->name('laporan-gangguan.update-status');
    Route::delete('/laporan-gangguan/{laporan}', [AdminController::class, 'hapusLaporan'])->name('laporan-gangguan.hapus');

    // Invoice (Menggantikan Import)
    Route::get('/invoice', [AdminController::class, 'invoiceIndex'])->name('invoice.index');
    Route::get('/invoice/{pelanggan}/cetak', [AdminController::class, 'invoiceCetak'])->name('invoice.cetak');

    // WhatsApp API Settings (Wablas Integration)
    Route::get('/whatsapp', [AdminController::class, 'whatsappSettings'])->name('whatsapp');
    Route::post('/whatsapp', [AdminController::class, 'updateWhatsappSettings'])->name('whatsapp.update');

    // Account Management (Kelola Akun)
    Route::get('/accounts', [\App\Http\Controllers\AccountController::class, 'index'])->name('accounts.index');
    Route::post('/accounts', [\App\Http\Controllers\AccountController::class, 'store'])->name('accounts.store');
    Route::put('/accounts/{admin}', [\App\Http\Controllers\AccountController::class, 'update'])->name('accounts.update');
    Route::delete('/accounts/{admin}', [\App\Http\Controllers\AccountController::class, 'destroy'])->name('accounts.destroy');
});

// Customer Dashboard & Payment
Route::get('/dashboard', [PaymentController::class, 'dashboard'])->name('customer.dashboard');
Route::post('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');
Route::post('/payment/doku/callback', [PaymentController::class, 'dokuCallback'])->name('payment.doku.callback');
Route::post('/payment/tripay/create', [PaymentController::class, 'tripayCreate'])->name('payment.tripay.create');
Route::post('/payment/tripay/callback', [PaymentController::class, 'tripayCallback'])->name('payment.tripay.callback');
Route::get('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/payment/status', [PaymentController::class, 'checkStatus'])->name('payment.status');
Route::get('/payment/pending', [PaymentController::class, 'pending'])->name('payment.pending');

Route::post('/login', function (Request $request) {

    $username = $request->username;
    $password = $request->password;

    $isEmail = filter_var($username, FILTER_VALIDATE_EMAIL);

    // LOGIN ADMIN (Check DB first)
    if ($isEmail) {
        $admin = \App\Models\Admin::where('email', $username)->first();
    } else {
        $admin = \App\Models\Admin::where('username', $username)->first();
    }
    
    if ($admin && \Illuminate\Support\Facades\Hash::check($password, $admin->password)) {
        Session::put('login', true);
        Session::put('role', 'admin');
        Session::put('admin_id', $admin->id);
        Session::put('admin_name', $admin->name);

        return redirect('/admin');
    }

    // LOGIN ADMIN FALLBACK (Legacy hardcoded fallback)
    if (!$isEmail && $username == 'admin' && $password == 'admin123')
    {
        Session::put('login', true);
        Session::put('role', 'admin');
        $fallbackAdmin = \App\Models\Admin::where('username', 'admin')->first();
        Session::put('admin_id', $fallbackAdmin ? $fallbackAdmin->id : 1);
        Session::put('admin_name', $fallbackAdmin ? $fallbackAdmin->name : 'Admin StarConnect');

        return redirect('/admin');
    }

    // LOGIN PELANGGAN
    if ($isEmail) {
        $pelanggan = \App\Models\Pelanggan::where('email', $username)->first();
    } else {
        $pelanggan = \App\Models\Pelanggan::where('username', $username)->first();
        if (!$pelanggan) {
            $pelanggan = \App\Models\Pelanggan::where('nama', 'like', $username . '%')->first();
        }
    }

    if ($pelanggan) {
        // Cek password: gunakan password dari DB jika ada, fallback ke '123456'
        $dbPassword = $pelanggan->password;
        $validPassword = (!empty($dbPassword) && $password === $dbPassword) || (empty($dbPassword) && $password === '123456');

        if ($validPassword) {
            Session::put('login', true);
            Session::put('role', 'pelanggan');
            Session::put('pelanggan_id', $pelanggan->id);
            return redirect('/dashboard');
        }
    }

    return back()->with('error', 'Username atau Password Salah');

});

Route::get('/logout', function (Request $request) {
    Session::flush();
    return redirect('/')->with('success', 'Anda telah berhasil log out.');
})->name('logout');

// Invoice Verification (Public)
Route::get('/invoice/verify/{id}', [\App\Http\Controllers\InvoiceVerificationController::class, 'verify'])->name('invoice.verify');

// Profile & Email Binding
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('/profile/request-otp', [ProfileController::class, 'requestOtp'])->name('profile.requestOtp');
Route::post('/profile/verify-otp', [ProfileController::class, 'verifyOtp'])->name('profile.verifyOtp');
Route::post('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.updatePhoto');

// Google OAuth
Route::get('/auth/google', [\App\Http\Controllers\GoogleAuthController::class, 'redirect'])->name('auth.google');
Route::get('/auth/google/callback', [\App\Http\Controllers\GoogleAuthController::class, 'callback'])->name('auth.google.callback');

// Temporary route to run migrations on shared hosting
Route::get('/run-migrations', function () {
    \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
    return 'Database migrated successfully!';
});