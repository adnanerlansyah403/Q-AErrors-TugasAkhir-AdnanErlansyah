<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use App\Models\UserCommentQuestion;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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
            ->where('slug', 'LIKE', '%' . $request->input('keywords') . '%')
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

        $question = Question::query()->create([
            "title" => ucfirst($request->input("title")),
            "slug" => Str::slug($request->input("title")),
            "description_editor" => $request->input("description"),
            "description_original" => strip_tags($request->input("description")),
            "category_id" => $request->input("category"),
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
            ->where('slug', 'LIKE', '%' . $request->input('keywords') . '%')
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

        return redirect()->back()->with('success', 'Your comment has been deleted!');
    }
}
