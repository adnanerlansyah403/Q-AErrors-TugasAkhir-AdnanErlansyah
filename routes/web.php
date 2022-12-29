<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewController;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Root route

Route::get('/', function () {

    $reviews = Review::query()->where('rating', '>=', 4)->orderBy('rating', 'desc')->latest()->limit(3)->get();

    // dd($reviews);

    return view('pages.frontend.index', [
        'reviews' => $reviews
    ]);
})->name('home');

Route::get("/reviews/create", function () {

    return view("pages.frontend.review.create");
})->middleware([
    'auth',
    'checkRole:user'
])->name('reviews.create');

Route::prefix("/reviews")
    ->name("reviews.")
    ->controller(ReviewController::class)
    ->middleware([
        'auth',
        'checkRole:user'
    ])->group(function () {

        Route::get("/create", "create")->name("create");
    });

// Errors Route

Route::prefix("/errors")
    ->name("errors.")
    ->group(function () {

        // Route::get("/searcherrors/notanswer", function () {
        //     dd("test");
        //     $answers = Answer::query()->latest()->paginate(9);
        //     // dd($answers);
        //     return view('pages.frontend.errors.searcherror.notanswer', compact('answers'));
        // })->name('searcherrors.notanswer.index');

        // Halaman Error List
        Route::prefix("/searcherror")
            ->name("searcherror.")
            ->group(function () {

                Route::get("/", function () {

                    // dd("test");
                    $questions = Question::query()->latest()->paginate(9);

                    return view('pages.frontend.errors.searcherror.index', compact('questions'));
                })->name('index');

                Route::get("/create", function () {
                    return view('pages.frontend.errors.searcherror.create');
                })->middleware("auth")->name("create");

                Route::get("/show/{question}", [QuestionController::class, "show"])->name("show");

                Route::get("/notanswer", function () {

                    $answers = Answer::query()->latest()->paginate(9);

                    return view('pages.frontend.errors.searcherror.notanswer', compact('answers'));
                })->name("notanswer.index");
            });



        // Halaman Jawaban Error List

        Route::get("/fixerror", function () {
            return view("pages.frontend.errors.fixerror.index");
        })->name("fixerror.index");

        Route::get("/fixerror/create", function () {
            return view("pages.frontend.errors.fixerror.create");
        })->middleware("auth")->name("fixerror.create");

        Route::get("/fixerror/show", function () {
            return view("pages.frontend.errors.fixerror.show");
        })->name("fixerror.show");
    });


// Halaman User Authenticate


Route::prefix("/user")
    ->middleware([
        'auth',
        'checkRole:user'
    ])
    ->name("users.")
    ->group(function () {

        // Halaman tampilan profile user
        Route::get("/profile", function () {
            return view("pages.frontend.user.profile");
        })->name("profile");

        // Halaman tampilan list pertanyaan user
        Route::get("/myquestion", function () {
            return view("pages.frontend.user.myquestion.index");
        })->name("myquestion.index");

        // Halaman tampilan edit pertanyaan user
        Route::get("/myquestion/edit", function () {
            return view("pages.frontend.user.myquestion.edit");
        })->name("myquestion.edit");


        // Halaman tampilan list pemecahan error user
        Route::get("/myanswer", function () {
            return view("pages.frontend.user.myquestion.index");
        })->name("myanswer.index");

        Route::get("/myanswer/edit", function () {
            return view("pages.frontend.user.myquestion.edit");
        })->name("myanswer.edit");
    });

Route::prefix("/admin")
    ->middleware([
        'auth',
        'checkRole:admin'
    ])
    ->name("admin.")
    ->group(function () {

        Route::get("/dashboard", function () {
            return view("pages.backend.admin.layouts.partials.index");
        })->name("dashboard");

        Route::prefix("/notification")
            ->name("notification.")
            ->group(function () {

                Route::get("/", function () {
                    return view("pages.backend.admin.notification.index");
                })->name("index");

                Route::prefix("/fixmasalah")
                    ->name("fixmasalah.")
                    ->group(function () {

                        Route::get("/show", function () {
                            return view("pages.backend.admin.notification.fixmasalah.show");
                        })->name("show");
                    });

                Route::prefix("/reviews")
                    ->name("reviews.")
                    ->group(function () {

                        Route::get("/show", function () {
                            return view("pages.backend.admin.notification.review.show");
                        })->name("show");
                    });
            });

        Route::prefix("/kategori/errors")
            ->name("kategori.errors.")
            ->group(function () {

                Route::get("/", function () {

                    return view("pages.backend.admin.kategori.errors.index");
                })->name("index");

                Route::get("/create", function () {

                    return view("pages.backend.admin.kategori.errors.create");
                })->name("create");

                Route::get("/edit", function () {

                    return view("pages.backend.admin.kategori.errors.edit");
                })->name("edit");
            });


        Route::get("/profile", function () {
            return view("pages.backend.admin.profile.index");
        })->name("profile.index");

        Route::get("/list", function () {
            return view("pages.backend.admin.list");
        })->name("list.index");
        Route::get("/list/create", function () {
            return view("pages.backend.admin.create");
        })->name("list.create");
        Route::get("/list/show", function () {
            return view("pages.backend.admin.show");
        })->name("list.show");
    });

// Route Authentication

Route::get("/login", function () {

    return view("pages.auth.login");
})
    ->middleware('guest')
    ->name("login");
Route::post("/auth/login", [LoginController::class, "authenticate"])
    ->middleware('guest')
    ->name("auth.login");

Route::get("/register", function () {
    return view("pages.auth.register");
})
    ->middleware('guest')
    ->name("register");
Route::post("/auth/register", [RegisterController::class, "register"])
    ->middleware('guest')
    ->name("auth.register");

Route::get("/auth/logout", function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('login')->with('success', 'Anda berhasil logout');
})->middleware("auth")->name("auth.logout");
