<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuperAdminController extends Controller
{

    public function index()
    {
        $admins = User::query()
            ->where('role_id', 2)
            ->where('role_id', '!=', 3)
            ->paginate(10);

        return view("pages.backend.admin.list", compact("admins"));
    }

    public function create()
    {

        return view("pages.backend.admin.create");
    }

    public function store(Request $request)
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


        if ($request->hasFile("photo")) {
            $photo_originalname = $request->file('photo')->getClientOriginalName();
            $photo_path = '/' . $request->file('photo')->store('photos_user_profile', 'public');
            $photo_link = request()->getSchemeAndHttpHost() . '/' . $photo_path;
        }

        $user = User::query()->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'birthdate' => $request->date('birthdate'),
            'gender' => $request->input('gender'),
            'profession' => $request->input('profession'),
            'address' => $request->input('address'),
            'bio' => $request->input('bio'),
            "photo_originalname" => isset($photo_originalname) ? $photo_originalname : null,
            "photo_path" => isset($photo_path) ? $photo_path : null,
            "photo_link" => isset($photo_link) ? $photo_link : null,
            'role_id' => 2,
        ]);

        return redirect()->route("admin.list.index")->with('success', 'User has been created');
    }

    public function show($id)
    {

        $admin = User::where("id", $id)
            ->where("role_id", 2)
            ->first();;

        return view("pages.backend.admin.show", compact("admin"));
    }

    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        // Storage::disk('public')->exists($admin->photo_path) ?
        //     Storage::disk('public')->delete($admin->photo_path) : false;

        $admin->delete();

        return redirect()->route("admin.list.index")->with('success', 'User has been deleted');
    }
}
