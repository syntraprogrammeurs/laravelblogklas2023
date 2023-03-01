<?php

use App\Http\Controllers\AdminUsersController;
use App\Models\Role;
use App\Models\User;
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

Route::group(["prefix" => "admin", "middleware" => 'auth'], function () {
    Route::group(["middleware" => 'admin'], function () {
        Route::resource("users", AdminUsersController::class);
        Route::get('restore/{user}',[AdminUsersController::class,'userRestore'])->name('admin.userrestore');
        Route::get('usersblade',[AdminUsersController::class,'index2'])->name('users.index2');
    });
});

Auth::routes();
