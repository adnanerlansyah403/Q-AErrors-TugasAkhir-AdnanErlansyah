<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use App\Models\UserCommentQuestion;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $questions = Question::query()
            ->latest()
            ->orWhere('slug', 'LIKE', '%' . $request->input('keywords') . '%')
            ->orWhere('title', 'LIKE', '%' . $request->input('keywords') . '%')
            ->paginate(10);

        return view('pages.frontend.errors.searcherror.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::query()->get();

        return view('pages.frontend.errors.searcherror.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required|min:5|max:255',
            'category' => 'required|min:1',
            'description' => 'required',
            'thumbnail' => 'required|max:1024'
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
            $thumbnail_path = '/' . $request->file('thumbnail')->store('thumbnails_question', 'public');
            $thumbnail_link = request()->getSchemeAndHttpHost() . '/' . $thumbnail_path;
        }

        $question = Question::query()->create([
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

        return redirect()->route('errors.searcherror.index')->with('success', 'Your question has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('pages.frontend.errors.searcherror.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    // Not Answer
    public function indexNotAnswer(Request $request)
    {

        $questions = Question::query()
            ->where('status', 0)
            ->orWhere('slug', 'LIKE', '%' . $request->input('keywords') . '%')
            ->orWhere('title', 'LIKE', '%' . $request->input('keywords') . '%')
            ->latest()->paginate(10);

        return view('pages.frontend.errors.searcherror.notanswer', compact('questions'));
    }

    public function showNotAnswer(Question $question)
    {
        return view('pages.frontend.errors.searcherror.notanswer', compact('question'));
    }


    // Comment Methods

    public function destroyComment(Question $question, UserCommentQuestion $comment)
    {
        $comment->delete();

        return redirect()->route("errors.searcherror.show", $question)->with('success', 'Your comment has been deleted!');
    }
}
