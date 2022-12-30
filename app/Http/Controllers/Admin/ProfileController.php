<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function index()
    {
        $admin = Auth::user();

        return view("pages.backend.admin.profile.index", compact("admin"));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        if ($request->hasFile('photo')) {
            Storage::disk('public')->exists($user->photo_path) ?
                Storage::disk('public')->delete($user->photo_path) : false;
            $photo_originalname = $this->photo->getClientOriginalName();
            $photo_path = '/' . $request->file('photo')->store('photos_user_profile', 'public');
            $photo_link = request()->getSchemeAndHttpHost() . '/' . $photo_path;
        }

        $user->update([
            "name" => $request->input('name') ? $request->input('name') : $user->name,
            "username" => $request->input('username') ? $request->input('username') : $user->username,
            "email" => $request->input('email') ? $request->input('email') : $user->email,
            "password" => $request->input('password') ? $request->input('password') : $user->password,
            "birthdate" => $request->input('birthdate') ? $request->input('birthdate') : $user->birthdate,
            "gender" => $request->input('gender') ? $request->input('gender') : $user->gender,
            "profession" => $request->input('profession') ? $request->input('profession') : $user->profession,
            "address" => $request->input('address') ? $request->input('address') : $user->address,
            "bio" => $request->input('bio') ? $request->input('bio') : $user->bio,
            "photo_originalname" => isset($photo_originalname) ? $photo_originalname : null,
            "photo_path" => isset($photo_path) ? $photo_path : null,
            "photo_link" => isset($photo_link) ? $photo_link : null
        ]);

        return redirect()->route('admin.profile.index')
            ->with("success", "Your profile has been updated");
    }
}
