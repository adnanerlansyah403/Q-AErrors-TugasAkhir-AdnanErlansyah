<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyQuestionController extends Controller
{

    public function index(Request $request)
    {
        $questions = Question::query()
            ->where('user_id', Auth::user()->id)
            ->where('slug', 'LIKE', '%' . $request->input('keywords') . '%')
            ->latest()
            ->paginate(10);

        return view("pages.frontend.user.myquestion.index", compact("questions"));
    }

    public function edit(Question $question)
    {
        $categories = Category::query()->get();

        return view("pages.frontend.user.myquestion.edit", compact("question", "categories"));
    }

    public function update(Request $request, Question $question)
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


        $question->update([
            "title" => ucfirst($request->input("title")),
            "slug" => Str::slug($request->input("title")),
            "description_editor" => $request->input("description"),
            "description_original" => strip_tags($request->input("description")),
            "category_id" => $request->input("category"),
            "user_id" => auth()->id()
        ]);

        return redirect()->route('errors.searcherror.index')->with('success', 'Your question has been updated!');
    }
}
