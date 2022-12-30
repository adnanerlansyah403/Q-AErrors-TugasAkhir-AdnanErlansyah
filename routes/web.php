<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\KategoriController as AdminKategoriController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\SuperAdminController;
use App\Http\Controllers\FixQuestionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyAnswerControler;
use App\Http\Controllers\MyQuestionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewController;
use App\Models\Answer;
use App\Models\Contact;
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

                Route::get("/", [QuestionController::class, "index"])->name('index');

                Route::get("/create", [QuestionController::class, "create"])->middleware("auth")->name("create");

                Route::post("/store", [QuestionController::class, "store"])->name("store");

                Route::get("/show/{question}", [QuestionController::class, "show"])->name("show");

                Route::get("/notanswer", [QuestionController::class, 'indexNotAnswer'])->name("notanswer.index");

                // Comment Routes
                Route::get("/show/{question}/{comment}/comment", [QuestionController::class, 'destroyComment'])
                    ->name("comment.destroy")
                    ->middleware("checkCommentUser");
            });



        // Halaman Jawaban Error List

        Route::get("/fixerror", [FixQuestionController::class, 'index'])->name("fixerror.index");

        Route::get("/fixerror/create", [FixQuestionController::class, "create"])->middleware("auth")->name("fixerror.create");

        Route::get("/fixerror/show/{answer}", [FixQuestionController::class, 'show'])
            ->name("fixerror.show");


        Route::get("/fixerror/edit/{answer}", [FixQuestionController::class, 'edit'])
            ->name("fixerror.edit");

        Route::post("/store", [FixQuestionController::class, "store"])->name("fixerror.store");
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
        Route::get("/profile", function (Request $request) {
            return view("pages.frontend.user.profile", compact('request'));
        })->name("profile");

        // Halaman tampilan list pertanyaan user
        Route::get("/myquestion", [MyQuestionController::class, "index"])->name("myquestion.index");

        // Halaman tampilan edit pertanyaan user
        Route::get("/myquestion/edit/{question}", [MyQuestionController::class, "edit"])->name("myquestion.edit")->middleware('checkMyQuestion');

        Route::post("/myquestion/update/{question}", [MyQuestionController::class, "update"])->name("myquestion.update")->middleware("checkMyQuestion");


        // Halaman tampilan list pemecahan error user
        Route::get("/myanswer", [MyAnswerControler::class, "index"])->name("myanswer.index");

        Route::get("/myanswer/edit/{answer}", [MyAnswerControler::class, "edit"])
            ->name("myanswer.edit")
            ->middleware("checkMyAnswer");

        Route::post("/myanswer/update/{answer}", [MyAnswerControler::class, "update"])->name("myanswer.update")->middleware("checkMyAnswer");

        Route::get("/myanswer/delete/{answer}", [MyAnswerControler::class, "destroy"])->name("myanswer.destroy")->middleware("checkMyAnswer");
    });

Route::prefix("/admin")
    ->middleware([
        'auth',
        'checkRole:admin'
    ])
    ->name("admin.")
    ->group(function () {

        Route::get("/dashboard", [AdminDashboardController::class, "index"])->name("dashboard");

        Route::prefix("/notification")
            ->name("notification.")
            ->group(function () {

                Route::get("/", function () {

                    $answers = Answer::query()->get();
                    $reviews = Review::query()->get();
                    $contacts = Contact::query()->get();

                    return view("pages.backend.admin.notification.index", compact("answers", "reviews", "contacts"));
                })->name("index");

                Route::prefix("/fixmasalah")
                    ->name("fixmasalah.")
                    ->group(function () {

                        Route::get("/show/{answer}", function (Answer $answer) {
                            return view("pages.backend.admin.notification.fixmasalah.show", compact("answer"));
                        })->name("show");

                        Route::get("/delete/{answer}", function (Answer $answer) {
                            // dd($answer);
                            $answer->delete();

                            return redirect()->route("admin.notification.index")->with('success', 'The review has been deleted.');
                        })->name("destroy");

                        Route::get("/update/{answer}", function (Answer $answer) {

                            $answer->update([
                                'status' => 1
                            ]);

                            return redirect()->route("admin.notification.index")->with('success', 'The answer has been accepted');
                        })->name("update");
                    });

                Route::prefix("/reviews")
                    ->name("reviews.")
                    ->controller(AdminReviewController::class)
                    ->group(function () {

                        Route::get("/show/{review}", "show")->name("show");

                        Route::get("/delete/{review}", "destroy")->name("destroy");
                    });
            });


        Route::prefix("/kategori/errors")
            ->name("kategori.errors.")
            ->controller(AdminKategoriController::class)
            ->group(function () {

                Route::get("/", "index")->name("index");

                Route::get("/create", "create")->name("create");

                // Route::post("/store", "store")->name("store");

                Route::get("/edit/{category}", "edit")->name("edit");

                Route::get("/delete/{category}", "destroy")->name("destroy");
            });


        Route::get("/profile", [AdminProfileController::class, "index"])->name("profile.index");

        Route::post("/profile/update", [AdminProfileController::class, "update"])->name("profile.update");

        Route::prefix("/list")
            ->name("list.")
            ->controller(SuperAdminController::class)
            ->group(function () {

                Route::get("/", "index")->name("index");
                Route::get("/list/create", "create")->name("create");
                Route::post("/list/store", "store")->name("store");
                Route::get("/list/show/{id}", "show")->name("show");
            });
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
