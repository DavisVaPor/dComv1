<?php

use App\Http\Controllers\CommissionController;
use App\Http\Controllers\LandingPageController;
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

Route::get('/', function () {return view('frontend.landing');})->name('home');
/* Rutas para el frontend */
Route::group([],function () {
    Route::get('/estaciones', function () {return view('frontend.services.estaciones');})->name('serv-estations');
    Route::get('/comisiones', function () {return view('frontend.services.commissions');})->name('serv-commissions');
    Route::get('/capacitaciones', function () {return view('frontend.services.capacitations');})->name('serv-capacitations');
    Route::get('/mediciones', function () {return view('frontend.services.mediciones');})->name('serv-mediciones');
    Route::get('/notices', function () {return view('frontend.notice.index');})->name('notices');
    //Route::get('/notice/{notice}', function () {return view('frontend.notice.show');})->name('notice');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',[LandingPageController::class,'index'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/comision',[CommissionController::class , 'index'] )->name('comision.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/comision/{commission}', [CommissionController::class , 'show'])->name('commision.show');

Route::middleware(['auth:sanctum', 'verified'])->get('/comision/report/{commission}', [CommissionController::class,'report'])->name('commisionpdf');
