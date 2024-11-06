<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TariffController;
use App\Http\Controllers\BuildingController;

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
    return redirect()->route('buildings.index');
    return view('welcome');
});

Route::get('reports', [BuildingController::class, 'report'])->name('report');
Route::resource('buildings', BuildingController::class);

Route::get('tariffs', [TariffController::class, 'index'])->name('tariffs.index');
Route::get('tariffs/{tariff}/edit', [TariffController::class, 'edit'])->name('tariffs.edit');
Route::put('tariffs/{tariff}', [TariffController::class, 'update'])->name('tariffs.update');
