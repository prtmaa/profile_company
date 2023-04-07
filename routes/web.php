<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FiturController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\SliderController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/', [HomeController::class, 'index'])->name('login');

Route::get('login/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('login/', [LoginController::class, 'authenticate']);
Route::post('logout/', [LoginController::class, 'logout']);


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/slider/data', [SliderController::class, 'data'])->name('slider.data');
    Route::resource('/slider', SliderController::class);

    Route::get('/fitur/data', [FiturController::class, 'data'])->name('fitur.data');
    Route::resource('/fitur', FiturController::class);

    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::get('/about/first', [AboutController::class, 'show'])->name('about.show');
    Route::post('/about', [AboutController::class, 'update'])->name('about.update');

    Route::get('/pesan', [PesanController::class, 'index'])->name('pesan.index');
    Route::get('/pesan/data', [PesanController::class, 'data'])->name('pesan.data');
});

Route::post('/pesan', [PesanController::class, 'store'])->name('pesan.store')->middleware('guest');
