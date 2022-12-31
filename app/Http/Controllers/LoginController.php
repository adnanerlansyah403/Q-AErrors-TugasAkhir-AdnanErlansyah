<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email wajib di isi.',
            'email.email' => 'Email harus valid',
            'password.required' => 'Password wajib di isi.',
        ]);

        try {

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                $user = Auth::user();

                if ($user->role_id == 1) {
                    return redirect()->route('home')->with('success', "Halo $user->name, selamat datang!");
                }

                $checkName = strcmp("Admin", $user->name) ? $user->name : "Admin";
                return redirect()->route('admin.dashboard')->with('success', "Halo $checkName , selamat datang!");
            }

            return back()->withErrors([
                'email' => 'Kredensial yang anda kirim tidak sesuai, mohon masukkan kredensial yang sesuai.',
            ])->onlyInput('email');
        } catch (ThrottleRequestsException $e) {
            return redirect()->route('login')->withErrors(['email' => 'You are being rate limited. Please try again later.']);
        }
    }
}
