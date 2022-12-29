<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {

        $validation = $request->validate([
            "name" => "required|max:255",
            "email" => "required|email|unique:users",
            "username" => "required|unique:users",
            "password" => "required",
            "birthdate" => "required|date",
            "gender" => "required|in:l,p",
            "address" => "required",
            "profession" => "nullable"
        ], [
            "name.required" => "Nama wajib di isi.",
            "email.required" => "Email wajib di isi.",
            "email.unique" => "Email yang anda gunakan tidak valid, coba gunakan email yg lain.",
            "username.unique" => "Username yang anda gunakan tidak valid, coba gunakan username yg lain.",
            "username.required" => "Username wajib di isi.",
            "password.required" => "Password wajib di isi.",
            "birthdate.required" => "Tanggal Lahir wajib di isi.",
            "gender.required" => "Gender wajib di isi.",
            "gender.in" => "Gender harus berupa L atau P",
            "address.required" => "Alamat wajib di isi.",
        ]);

        $user = User::query()->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'birthdate' => $request->date('birthdate'),
            'gender' => $request->input('gender'),
            'profession' => $request->input('profession'),
            'address' => $request->input('address'),
            'role_id' => 1,
        ]);

        return redirect()->route('login')->with('success', 'Berhasil melakukan pendaftaran, silahkan melakukan login.');
    }
}
