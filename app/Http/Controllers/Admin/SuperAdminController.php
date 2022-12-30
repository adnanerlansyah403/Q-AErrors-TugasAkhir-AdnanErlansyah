<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{

    public function index()
    {
        $admins = User::query()->where('role_id', 2)->paginate(10);

        return view("pages.backend.admin.list", compact("admins"));
    }

    public function create()
    {

        return view("pages.backend.admin.create");
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {

        $admin = User::where("id", $id)
            ->where("role_id", 2)
            ->first();;

        return view("pages.backend.admin.show", compact("admin"));
    }
}
