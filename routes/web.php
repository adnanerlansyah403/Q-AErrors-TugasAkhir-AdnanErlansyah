<?php

use App\Http\Controllers\Admin\ContactController;
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
use App\Models\User;
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

    $reviews = Review::select()
        ->distinct()
        ->where('rating', '>=', 4)
        ->where('status', 1)
        ->orderBy('rating', 'desc')
        ->latest()->limit(3)->get();

    return view('pages.frontend.index', [
        'reviews' => $reviews
    ]);
})->name('home');

Route::prefix("/reviews")
    ->name("reviews.")
    ->controller(ReviewController::class)
    ->middleware([
        'auth',
        'checkRole:user',
        'checkAlreadyReview'
    ])->group(function () {

        Route::get("/create", "create")->name("create");

        // Route::get("/edit/{review}", "edit")->name("edit");
    });

// Errors Route

Route::prefix("/errors")
    ->name("errors.")
    ->group(function () {

        // Halaman Error List
        Route::prefix("/searcherror")
            ->name("searcherror.")
            ->group(function () {

                Route::get("/", [QuestionController::class, "index"])->name('index');

                Route::get("/create", [QuestionController::class, "create"])
                    ->middleware(["auth", "checkRole:user,admin"])->name("create");

                Route::post("/store", [QuestionController::class, "store"])
                    ->middleware(["auth", "checkRole:user,admin"])
                    ->name("store");

                Route::get("/show/{question}", [QuestionController::class, "show"])
                    ->middleware(["auth", "checkRole:user,admin"])->name("show");

                Route::get("/edit/{question}", [QuestionController::class, "edit"])
                    ->middleware(["auth", "checkRole:user,admin"])->name("edit");

                Route::put("/update/{question}", [QuestionController::class, "update"])
                    ->middleware(["auth", "checkRole:user,admin"])
                    ->name("update");

                Route::get("/notanswer", [QuestionController::class, 'indexNotAnswer'])->name("notanswer.index");

                // Comment Routes
                Route::get("/destroy/{question}/{comment}/comment", [QuestionController::class, 'destroyComment'])
                    ->name("comment.destroy")
                    ->middleware(["checkCommentUser"]);
            });



        // Halaman Jawaban Error List

        Route::get("/fixerror", [FixQuestionController::class, 'index'])->name("fixerror.index");

        Route::get("/fixerror/create", [FixQuestionController::class, "create"])->middleware(["auth", "checkRole:user,admin"])->name("fixerror.create");

        Route::get("/fixerror/show/{answer}", [FixQuestionController::class, 'show'])
            ->name("fixerror.show");


        Route::get("/fixerror/edit/{answer}", [FixQuestionController::class, 'edit'])
            ->middleware(["auth", "checkRole:user,admin"])
            ->name("fixerror.edit");

        Route::post("/store", [FixQuestionController::class, "store"])
            ->middleware(["auth", "checkRole:user,admin"])
            ->name("fixerror.store");
    });


// Halaman User Authenticate


Route::prefix("/user")
    ->middleware([
        'auth',
        'checkRole:user',
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
        Route::get("/myquestion/delete/{question}", [MyQuestionController::class, "destroy"])->name("myquestion.destroy")->middleware("checkMyQuestion");


        // Halaman tampilan list pemecahan error user
        Route::get("/myanswer", [MyAnswerControler::class, "index"])->name("myanswer.index");

        Route::get("/myanswer/edit/{answer}", [MyAnswerControler::class, "edit"])
            ->name("myanswer.edit")
            ->middleware("checkMyAnswer");

        Route::post("/myanswer/update/{answer}", [MyAnswerControler::class, "update"])->name("myanswer.update")->middleware("checkMyAnswer");

        Route::get("/myanswer/delete/{answer}", [MyAnswerControler::class, "destroy"])->name("myanswer.destroy")->middleware("checkMyAnswer");

        // Halaman tampilan list review user
        Route::get("/myreview", function () {

            $myReview = Review::query()->where('user_id', Auth::user()->id)->first();

            return view("pages.frontend.user.myreview.index", compact('myReview'));
        })->name("myreview.index");

        Route::get("/myreview/{review}/{username}", function (Review $review, $username) {

            // dd($review);
            return view("pages.frontend.user.myreview.edit", compact('review'));
        })
            ->name("myreview.edit")
            ->middleware("checkCurrentReviewUser");
    });

Route::prefix("/admin")
    ->middleware([
        'auth',
        'checkRole:admin,superadmin',
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

                        Route::get("/update/{review}", "update")->name("update");

                        Route::get("/delete/{review}", "destroy")->name("destroy");
                    });

                Route::prefix("/contacts")
                    ->name("contacts.")
                    ->controller(ContactController::class)
                    ->group(function () {

                        Route::get("/show/{contact}", "show")->name("show");
                        Route::get("/delete/{contact}", "destroy")->name("destroy");
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
            ->controller(SuperAdminController::class)
            ->name("list.")
            ->middleware("checkRole:superadmin")
            ->group(function () {

                Route::get("/", "index")->name("index");
                Route::get("/list/create", "create")->name("create");
                Route::get("/list/delete/{id}", "destroy")->name("destroy");
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
    ->middleware([
        'guest',
        // 'throttle:3,1'
    ])
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
