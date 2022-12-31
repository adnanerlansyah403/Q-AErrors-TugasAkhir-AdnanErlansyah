<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Review;
use App\Models\Role;
use App\Models\Todolist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {

        $countQuestion = Question::query()->count();
        $countAnswer = Answer::query()->count();
        $countUser = User::query()->count();
        $countReview = Review::query()->count();
        $typesTodolist = Role::query()->get();

        // dd($typesTodolist);


        // $countTypeTodolist = $countTypeTodolist->count;

        // Data
        $todolists = Todolist::query()->get();

        // $data = [
        //     'todolists' => $todolists
        // ];

        return view("pages.backend.admin.layouts.partials.index", compact("countQuestion", "countAnswer", "countUser", "countReview", "typesTodolist", "todolists"));
    }
}
