<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FixQuestionController extends Controller
{

    public function index(Request $request)
    {
        $answers = Answer::query()
            ->latest()
            ->where('slug', 'LIKE', '%' . $request->input('keywords') . '%')
            ->where('status', 1)
            ->paginate(10);


        return view("pages.frontend.errors.fixerror.index", compact('answers'));
    }

    public function create()
    {
        $categories = Category::query()->get();

        return view("pages.frontend.errors.fixerror.create", compact("categories"));
    }

    public function show(Answer $answer)
    {
        return view("pages.frontend.errors.fixerror.show", compact("answer"));
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required|min:5|max:255',
            'category' => 'required|min:1',
            'description' => 'required'
        ], [
            'title.required' => 'Title is required',
            'category.required' => 'Category is required',
            'description.required' => 'Description is required',
            'title.min' => 'Title must be at least 6 characters',
            'category.min' => 'Category must be at least 1 character',
            'description.min' => 'Description must be at least 5 characters',
            'title.max' => 'Title cannot be longer than 255 characters',
        ]);

        $answer = Answer::query()->create([
            "title" => ucfirst($request->input("title")),
            "slug" => Str::slug($request->input("title")),
            "description_editor" => $request->input("description"),
            "description_original" => strip_tags($request->input("description")),
            "category_id" => $request->input("category"),
            "user_id" => auth()->id()
        ]);

        return redirect()->route('errors.fixerror.index')->with('success', 'Your answer has been created!');
    }
}
