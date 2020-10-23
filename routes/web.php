<?php

use App\Http\Controllers\{CompanyController, LoginController, DashboardController, TimeSheetController};
use App\Models\TimeSheet;
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

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'doLogin'])->name('login.do');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/', function () {
    if(Auth::check())
        return redirect()->route('dashboard.home');

    return redirect()->route('auth.login');
});

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class , 'index'])->name('home');

    Route::resource('/company', CompanyController::class);


    Route::resource('/timeSheet', TimeSheetController::class);
});


