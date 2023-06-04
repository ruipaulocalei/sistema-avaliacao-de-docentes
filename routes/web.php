<?php

use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TemaController;
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

Route::group(["middleware" => ["auth"]], function () {
    Route::get("/dashboard", [DashboardController::class, "index"])->name('dashboard');
    Route::get("/avaliar/{id}", [AvaliacaoController::class, "index"])->name('avaliar.index');
    Route::post("/avaliar/{id}", [AvaliacaoController::class, "avaliar"])->name('avaliar.post');
    Route::resource("/tema", TemaController::class);
    Route::resource("/orders", OrderController::class);
    Route::get("/admin/docentes", [DocenteController::class, 'index'])->name('docentes.index');
    Route::get("/admin/docentes/create", [DocenteController::class, 'create'])->name('docentes.create');
    Route::get("/admin/docentes/{id}/edit", [DocenteController::class, 'edit'])->name('docentes.edit');
    Route::get("/orders/{order}/aceito", [OrderController::class, "aceito"]);
    Route::get('/downloadPDF/{id}', [OrderController::class, "downloadPDF"]);
    // Route::get('/gerarpdf', [OrderController::class, "gerarpdf"]);
});
/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); */

require __DIR__ . '/auth.php';
