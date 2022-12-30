<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class KategoriController extends Controller
{

    public function index()
    {

        $categories = Category::query()->paginate(10);

        return view("pages.backend.admin.kategori.errors.index", compact("categories"));
    }

    public function create()
    {

        return view("pages.backend.admin.kategori.errors.create");
    }

    public function edit(Category $category)
    {

        return view("pages.backend.admin.kategori.errors.edit", compact('category'));
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route("admin.kategori.errors.index")->with("success", "Kategori berhasil dihapus");
    }
}
