<?php

use App\Http\Controllers\AdminUsersController;
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

Route::get("/", function () {
    return view("welcome");
});
Route::get("/admin", [
    App\Http\Controllers\HomeController::class,
    "index",
])->name("home");

/**backend**/

Route::group(["prefix" => "admin", "middleware" => "auth"], function () {
    Route::resource("users", AdminUsersController::class);
});

Auth::routes();
