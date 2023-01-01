<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    public function create()
    {

        return view("pages.frontend.review.create");
        return view('pages.frontend.review.create');
    }

    public function edit(Review $review)
    {
    }
}
