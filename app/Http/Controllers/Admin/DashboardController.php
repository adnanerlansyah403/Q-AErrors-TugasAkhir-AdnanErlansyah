<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {

        $countQuestion = Question::query()->count();
        $countAnswer = Answer::query()->count();
        $countUser = User::query()->count();
        $countReview = Review::query()->count();

        return view("pages.backend.admin.layouts.partials.index", compact("countQuestion", "countAnswer", "countUser", "countReview"));
    }
}
