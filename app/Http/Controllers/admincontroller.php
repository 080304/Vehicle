<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

$hashedPassword = Hash::make('your_password');

class admincontroller extends Controller
{
    public function signup()
    {
        return view('admin.signup');
    }

    public function signupreq(Request $req)
    {
        $validatedData = $req->validate([
            'Inputemail' => 'required|email|unique:admincreds,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $a = new admincred;
        $a->email = $req->Inputemail;
        $a->password = Hash::make($req->password);
        $a->password_confirmation = Hash::make($req->password_confirmation);
        $a->save();

        return redirect()->back()->with('status', 'Successfully Registered');
    }

    public function signin()
    {
        // Check if the user is already authenticated
        if (Auth::guard('custom_web')->check()) {
            return redirect()->route('dashboard'); // Redirect to the dashboard or any other page
        }
        return view('admin.signin');
    }

    public function signinreq(Request $req)
    {
        // Validasi input email dan password
        $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Ambil data user berdasarkan email
        $user = User::where('email', $req->email)->first();

        // Cek apakah user ada dan password cocok
        if ($user && Hash::check($req->password, $user->password)) {
            // Jika password cocok, cek apakah perlu di-hash ulang
            if (!Hash::needsRehash($user->password)) {
                $user->password = Hash::make($req->password);
                $user->save();
            }

            // Login user dan arahkan ke dashboard
            Auth::login($user);
            return redirect()->route('dashboard')->with('status', 'Login successful!'); // Login berhasil
        }

        // Jika login gagal, kembali ke halaman sebelumnya dengan pesan error
        return redirect()->back()->withInput($req->only('email'))->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    public function signout()
    {
        Auth::guard('custom_web')->logout();
        return redirect()->route('signin');
    }

    public function dashboard()
    {
        // Implementasi fungsi dashboard
    }

    // Tambahkan fungsi lain sesuai kebutuhan...
}
