<?php

use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\ChefeDepartamentoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EstudanteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\QuestoesController;
use App\Http\Controllers\TemaController;
use App\Models\Departamento;
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
    Route::get("/admin/docente/{id}", [DashboardController::class, "ver"])->name('dashboard.ver');
    Route::get("/admin/avaliar/{id}", [AvaliacaoController::class, "index"])->name('avaliar.index');
    Route::post("/admin/avaliar/{id}", [AvaliacaoController::class, "avaliar"])->name('avaliar.post');
    Route::resource("/admin/departamentos", DepartamentoController::class);
    Route::resource("/admin/chefe_departamentos", ChefeDepartamentoController::class);
    Route::get("/admin/docentes", [DocenteController::class, 'index'])->name('docentes.index');
    Route::get("/admin/docentes/create", [DocenteController::class, 'create'])->name('docentes.create');
    Route::get("/admin/docentes/{user}/edit", [DocenteController::class, 'edit'])->name('docentes.edit');
    Route::get("/admin/estudantes", [EstudanteController::class, 'index'])->name('estudantes.index');
    Route::get(
        "/admin/estudantes/{user}/edit",
        [EstudanteController::class, 'edit']
    )->name('estudantes.edit');
    Route::get("/admin/questoes", [QuestoesController::class, 'index'])->name('questoes.index');
    Route::get("/admin/questoes/{avaliacao}/edit", [QuestoesController::class, 'edit'])->name('questoes.edit');
    Route::get("/admin/questoes/create", [QuestoesController::class, 'create'])->name('questoes.create');
    // Route::get('/gerarpdf', [OrderController::class, "gerarpdf"]);
});
/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); */

require __DIR__ . '/auth.php';
