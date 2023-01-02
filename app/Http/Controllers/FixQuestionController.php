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
            ->where('status', true)
            ->where('slug', 'LIKE', '%' . $request->input('keywords') . '%')
            ->paginate(10);

        // dd($answers);


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
            'description' => 'required',
            'thumbnail' => 'nullable|max:1024'
        ], [
            'title.required' => 'Title is required',
            'category.required' => 'Category is required',
            'description.required' => 'Description is required',
            'title.min' => 'Title must be at least 6 characters',
            'category.min' => 'Category must be at least 1 character',
            'description.min' => 'Description must be at least 5 characters',
            'title.max' => 'Title cannot be longer than 255 characters',
            'thumbnail.required' => 'Thumbnail is required',
            'thumbnail.mimes' => 'Thumbnail must be an image',
            'thumbnail.max' => 'Size Thumbnail cannot be longer than 1024 characters'
        ]);

        if ($request->hasFile('thumbnail')) {
            $thumbnail_originalname = $request->file('thumbnail')->getClientOriginalName();
            $thumbnail_path = '/' . $request->file('thumbnail')->store('thumbnails_answer', 'public');
            $thumbnail_link = request()->getSchemeAndHttpHost() . '/' . $thumbnail_path;
        }

        $answer = Answer::query()->create([
            "title" => ucfirst($request->input("title")),
            "slug" => Str::slug($request->input("title")),
            "description_editor" => $request->input("description"),
            "description_original" => strip_tags($request->input("description")),
            "category_id" => $request->input("category"),
            "thumbnail_originalname" => isset($thumbnail_originalname) ? $thumbnail_originalname : null,
            "thumbnail_path" => isset($thumbnail_path) ? $thumbnail_path : null,
            "thumbnail_link" => isset($thumbnail_link) ? $thumbnail_link : null,
            "user_id" => auth()->id()
        ]);

        return redirect()->route('errors.fixerror.index')->with('success', 'Your answer has been created!');
    }
}
