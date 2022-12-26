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
    return view('main');
});

// Errors Route

Route::prefix("/errors")
    ->name("errors.")
    ->group(function () {

        // Halaman Error List
        Route::get("/searcherror", function () {
            return view('pages.frontend.errors.fixerror.index');
        });

        Route::get("/fixerror", function () {
            return view("pages.frontend.errors.fixerror.index");
        });
    });


// Halaman User Authenticate

Route::prefix("/users")
    ->name("users.")
    ->group(function () {

        // Halaman tampilan list pertanyaan user
        Route::get("/", function () {
            return view("pages.frontend.user.profile");
        });
        Route::get("/myquestion", function () {
            return view("pages.frontend.user.myquestion.index");
        });

        // Halaman tampilan list jawaban user
        Route::get("/myanswer", function () {
            return view("pages.frontend.user.myquestion.edit");
        });
    });
