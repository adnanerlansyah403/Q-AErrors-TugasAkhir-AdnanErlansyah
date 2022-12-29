<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function create()
    {
        return view('pages.frontend.review.create');
    }
}
