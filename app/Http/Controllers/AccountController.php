<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    /**
     * Display a listing of admin accounts.
     */
    public function index()
    {
        // Enforce admin role check (middleware should handle this, but for extra safety)
        if (Session::get('role') !== 'admin') {
            return redirect('/login')->with('error', 'Akses ditolak.');
        }

        $admins = Admin::orderBy('id', 'asc')->get();
        return view('admin.accounts.index', compact('admins'));
    }

    /**
     * Store a newly created admin account.
     */
    public function store(Request $request)
    {
        if (Session::get('role') !== 'admin') {
            return redirect('/login')->with('error', 'Akses ditolak.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:admins,username',
            'password' => 'required|string|min:6',
        ]);

        Admin::create([
            'name' => $request->name,
            'username' => strtolower($request->username),
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Admin baru berhasil ditambahkan.');
    }

    /**
     * Update the specified admin account.
     */
    public function update(Request $request, Admin $admin)
    {
        if (Session::get('role') !== 'admin') {
            return redirect('/login')->with('error', 'Akses ditolak.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:admins,username,' . $admin->id,
            'password' => 'nullable|string|min:6',
        ]);

        $admin->name = $request->name;
        $admin->username = strtolower($request->username);

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        // Update current session if the logged-in admin updated their own profile
        if (Session::get('admin_id') == $admin->id) {
            Session::put('admin_name', $admin->name);
        }

        return back()->with('success', 'Data admin berhasil diperbarui.');
    }

    /**
     * Remove the specified admin account.
     */
    public function destroy(Admin $admin)
    {
        if (Session::get('role') !== 'admin') {
            return redirect('/login')->with('error', 'Akses ditolak.');
        }

        // Prevent self-deletion
        if (Session::get('admin_id') == $admin->id) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        // Prevent deleting the last remaining admin
        if (Admin::count() <= 1) {
            return back()->with('error', 'Tidak dapat menghapus satu-satunya admin yang tersisa.');
        }

        $admin->delete();

        return back()->with('success', 'Akun admin berhasil dihapus.');
    }
}
