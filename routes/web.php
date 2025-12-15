<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\MensagemController;
use App\Http\Controllers\CarrinhoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('compras', CompraController::class);
    Route::resource('fale-conosco', MensagemController::class)->only('store');

    // Permite que qualquer usuário logado (incluindo clientes) realize a compra imediata.
    Route::get('comprar/{produto}', [CarrinhoController::class, 'comprarAgora'])
        ->name('compra.agora');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin'])->group(function() {
    Route::resource('categorias', CategoriaController::class);
    Route::resource('produtos', ProdutoController::class)->except('index', 'show');
    Route::resource('clientes', ClienteController::class)->only('index', 'show', 'destroy');
    Route::resource('fale-conosco', MensagemController::class)->only('index', 'destroy');
});
Route::resource('produtos', ProdutoController::class)->only('index', 'show');
Route::resource('fale-conosco', MensagemController::class)->only('create');

Route::get('sobre-nos', function(){
    return view('sobre-nos.index');
})->name('sobre-nos');
Route::view('/', 'boas_vindas')->name('home');
Route::view('/login', 'auth.login')->name('login');