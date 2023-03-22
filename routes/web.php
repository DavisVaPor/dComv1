<?php

use App\Http\Controllers\CommissionController;
use App\Http\Controllers\EstationController;
use App\Http\Controllers\InventaryController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\MantenimientController;
use App\Http\Controllers\MedicionesController;
use App\Http\Controllers\PromotionController;
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


Route::middleware(['auth:sanctum', 'verified'])->get('/informe',[ReportController::class , 'index'] )->name('informe.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/informe/{informe}',[ReportController::class , 'show'] )->name('informe.show');

//Route::middleware(['auth:sanctum', 'verified'])->get('/informe/report/{informe}',[ReportController::class , 'report'] )->name('informepdf');


Route::middleware(['auth:sanctum', 'verified'])->get('/estacion',[EstationController::class , 'index'] )->name('estacion.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/estacion/{estation}',[EstationController::class , 'show'] )->name('estacion.show');

Route::middleware(['auth:sanctum', 'verified'])->get('/estacion/PDF/{estation}', [EstationControllerPDF::class,'report'])->name('estationpdf');

Route::middleware(['auth:sanctum', 'verified'])->get('/inventario',[InventaryController::class , 'index'] )->name('inventory.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/inventario/{article}',[InventaryController::class , 'show'] )->name('article.show');

Route::middleware(['auth:sanctum', 'verified'])->get('/mantenimiento',[MantenimientController::class , 'index'] )->name('mantenimient.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/medicion',[MedicionesController::class , 'index'] )->name('mediciones.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/promocion',[PromotionController::class , 'index'] )->name('promotion.index');

