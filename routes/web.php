<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['middleware'=>'guest'],function (){
    Route::get('/login',[AuthController::class,'login'])->name('login');
    Route::post('/loginpost',[AuthController::class, 'loginpost'])->name('loginpost');

});
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::get('/home', function () {
        return view('layout/home');
    });
    
    Route::resource('customer',CustomerController::class);
});
