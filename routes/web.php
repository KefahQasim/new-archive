<?php

use App\Http\Controllers\Archivecontroller;
use App\Http\Controllers\UserAuthController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::view('index', 'parent');



Route::prefix('cms/admins/')->group(function()
{
    Route::view('' , 'parent');
    Route::resource('archives', Archivecontroller::class);
    Route::post('archives_update/{id}',[Archivecontroller::class,'update'])->name('archives_update');

});

Route::prefix('cms/')->middleware('guest:web')->group(function(){
    Route::get('{guard}/login' , [UserAuthController::class , 'showLogin'])->name('view.login');
    Route::post('{guard}/login' , [UserAuthController::class , 'login']);

});

Route::prefix('cms/admins')->middleware('auth:web')->group(function () {
    Route::get('logout' , [UserAuthController::class , 'logout'])->name('view.logout');
});
