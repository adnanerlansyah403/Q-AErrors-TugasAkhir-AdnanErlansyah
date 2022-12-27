<?php

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
    return view('pages.frontend.index');
})->name('index');

Route::get("/reviews/create", function () {

    return view("pages.frontend.review.create");
});

// Errors Route

Route::prefix("/errors")
    ->name("errors.")
    ->group(function () {

        // Halaman Error List
        Route::prefix("/searcherror")
            ->name("searcherror.")
            ->group(function () {

                Route::get("/", function () {
                    return view('pages.frontend.errors.searcherror.index');
                })->name('index');

                Route::get("/create", function () {
                    return view('pages.frontend.errors.searcherror.create');
                });

                Route::get("/show", function () {
                    return view('pages.frontend.errors.searcherror.show');
                });

                Route::get("/notanswer", function () {
                    return view('pages.frontend.errors.searcherror.notanswer');
                });
            });

        Route::get("/fixerror", function () {
            return view("pages.frontend.errors.fixerror.index");
        })->name("fixerror.index");

        Route::get("/fixerror/create", function () {
            return view("pages.frontend.errors.fixerror.create");
        });

        Route::get("/fixerror/show", function () {
            return view("pages.frontend.errors.fixerror.show");
        });
    });


// Halaman User Authenticate


Route::prefix("/user")
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
    ->name("admin.")
    ->group(function () {

        Route::get("/dashboard", function () {
            return view("pages.backend.admin.layouts.partials.index");
        })->name("dashboard");

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
})->name("login");

Route::get("/register", function () {
    return view("pages.auth.register");
})->name("register");
