<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});
Route::get('/categorias', function () {
    return view('categorias');
})->middleware(['auth', 'verified'])->name('categorias');

Route::get('/marcas', function () {
    return view('marcas');
})->middleware(['auth', 'verified'])->name('marcas');

Route::get('/produtos', function () {
    return view('produtos');
})->middleware(['auth', 'verified'])->name('produtos');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/usuarios', function () {
    return view('user');
})->middleware(['auth', 'verified'])->name('usuarios');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('ajax-crud-datatable', [CategoriasController::class, 'index']);
    Route::post('add', [CategoriasController::class, 'add']);
    Route::post('edit', [CategoriasController::class, 'edit']);
    Route::post('delete', [CategoriasController::class, 'destroy']);
    Route::get('ajax-crud-datatable2', [MarcasController::class, 'index']);
    Route::post('add', [MarcasController::class, 'add']);
    Route::post('edit', [MarcasController::class, 'edit']);
    Route::post('delete', [MarcasController::class, 'destroy']);
    Route::get('ajax-crud-datatable3', [ProdutosController::class, 'index']);
    Route::post('add', [ProdutosController::class, 'add']);
    Route::post('edit', [ProdutosController::class, 'edit']);
    Route::post('delete', [ProdutosController::class, 'destroy']);
    Route::get('ajax-crud-datatable4', [UserController::class, 'index']);
    Route::post('add', [UserController::class, 'add']);
    Route::post('edit', [UserController::class, 'edit']);
    Route::post('delete', [UserController::class, 'destroy']);
});

require __DIR__.'/auth.php';
