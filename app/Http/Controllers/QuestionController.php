<?php

namespace App\Http\Controllers;

use App\Models\Question;
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
            ->paginate(9);

        return view('pages.frontend.errors.searcherror.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.frontend.errors.searcherror.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            ->latest()->paginate(9);

        return view('pages.frontend.errors.searcherror.notanswer', compact('questions'));
    }

    public function showNotAnswer(Question $question)
    {
        return view('pages.frontend.errors.searcherror.notanswer', compact('question'));
    }
}
