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
});

// Errors Route

Route::prefix("/errors")
    ->name("errors.")
    ->group(function () {

        // Halaman Error List
        Route::prefix("/searcherror")
            ->group(function () {

                Route::get("/", function () {
                    return view('pages.frontend.errors.searcherror.index');
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
        });
    });


// Halaman User Authenticate

Route::prefix("/users")
    ->name("users.")
    ->group(function () {

        // Halaman tampilan profile user
        Route::get("/", function () {
            return view("pages.frontend.user.profile");
        });

        // Halaman tampilan list pertanyaan user
        Route::get("/myquestion", function () {
            return view("pages.frontend.user.myquestion.index");
        });
        Route::get("/myquestion/edit", function () {
            return view("pages.frontend.user.myquestion.edit");
        });

        // Halaman tampilan list pemecahan error user
        Route::get("/myanswer", function () {
            return view("pages.frontend.user.myquestion.index");
        });
        Route::get("/myanswer/edit", function () {
            return view("pages.frontend.user.myquestion.edit");
        });
    });


// Route Authentication

Route::get("/login", function () {

    return view("pages.auth.login");
});

Route::get("/register", function () {
    return view("pages.auth.register");
});
