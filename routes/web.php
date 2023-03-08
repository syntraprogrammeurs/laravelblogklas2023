<?php

use App\Http\Controllers\AdminUsersController;
use App\Models\Role;
use App\Models\User;
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
/* frontend */
Route::get("/", function () {
    return view("welcome");
});
Route::get('contactformulier',[\App\Http\Controllers\ContactController::class, 'create'])->name('contact.create');
Route::post('contactformulier',[\App\Http\Controllers\ContactController::class, 'store']);

/**backend**/
Route::group(["prefix" => "admin", "middleware" => ['auth','verified']], function () {
    Route::get("/", [
        App\Http\Controllers\HomeController::class,
        "index",
    ])->name("home");
    Route::resource('posts',\App\Http\Controllers\AdminPostsController::class);

    Route::group(["middleware" => 'admin'], function () {
        Route::resource("users", AdminUsersController::class);
        Route::get('restore/{user}',[AdminUsersController::class,'userRestore'])->name('admin.userrestore');
        Route::get('usersblade',[AdminUsersController::class,'index2'])->name('users.index2');
    });

});

Auth::routes(['verify'=>true]);//variabele met de naam verify
