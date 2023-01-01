<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MyAnswerControler extends Controller
{

    public function index(Request $request)
    {
        $answers = Answer::query()
            ->where('user_id', Auth::user()->id)
            ->where('slug', 'LIKE', '%' . $request->input('keywords') . '%')
            ->orWhere('title', 'LIKE', '%' . $request->input('keywords') . '%')
            ->latest()
            ->paginate(10);

        return view("pages.frontend.user.myanswer.index", compact("answers"));
    }

    public function edit(Answer $answer)
    {
        $categories = Category::query()->get();
        return view("pages.frontend.user.myanswer.edit", compact("answer", "categories"));
    }

    public function update(Request $request, Answer $answer)
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
            'thumbnail.required' => 'Thumbnail is required',
            'thumbnail.mimes' => 'Thumbnail must be an image',
            'thumbnail.max' => 'Size Thumbnail cannot be longer than 1024 characters'
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($answer->thumbnail_path != null) {
                Storage::disk('public')->exists($answer->thumbnail_path) ?
                    Storage::disk('public')->delete($answer->thumbnail_path) : false;
            }
            $thumbnail_originalname = $request->file('thumbnail')->getClientOriginalName();
            $thumbnail_path = '/' . $request->file('thumbnail')->store('thumbnails_answer', 'public');
            $thumbnail_link = request()->getSchemeAndHttpHost() . '/' . $thumbnail_path;
        }


        $answer->update([
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

        return redirect()->route('users.myanswer.index')->with("success", "Your answer has been updated");
    }

    public function destroy(Answer $answer)
    {
        if ($answer->thumbnail_path != null) {
            Storage::disk("public")->exists($answer->thumbnail_path) ? Storage::disk("public")->delete($answer->thumbnail_path) : false;
        }

        $answer->delete();

        return redirect()->route('users.myanswer.index')->with("success", "Your answer has been deleted");
    }
}
