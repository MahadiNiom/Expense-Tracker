<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CashInController;
use App\Http\Controllers\CashOutController;
use App\Http\Controllers\CashInTagController;
use App\Http\Controllers\CashOutTagController;
use App\Http\Controllers\SearchController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/filter', [HomeController::class, 'filter'])->name('home.filter');
Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/tags',function(){
    $cashintags = \App\Models\CashInTag::all();
    $cashouttags = \App\Models\CashOutTag::all();
    return view('tags', compact('cashintags', 'cashouttags'));
})->name('tags');

Route::get('/cashins', [CashInController::class, 'index'])->name('cashins.index');
Route::get('/cashins/create', [CashInController::class, 'create'])->name('cashins.create');
Route::get('/cashins/{id}/edit', [CashInController::class, 'edit'])->name('cashins.edit');
Route::put('/cashins/{id}', [CashInController::class, 'update'])->name('cashins.update');
Route::delete('/cashins/{id}', [CashInController::class, 'destroy'])->name('cashins.destroy');
Route::post('/cashins', [CashInController::class, 'store'])->name('cashins.store');
Route::get('/cashins/{id}', [CashInController::class, 'show'])->name('cashins.show');


Route::get('/cashouts', [CashOutController::class, 'index'])->name('cashouts.index');
Route::get('/cashouts/create', [CashOutController::class, 'create'])->name('cashouts.create');
Route::get('/cashouts/{id}/edit', [CashOutController::class, 'edit'])->name('cashouts.edit');
Route::put('/cashouts/{id}', [CashOutController::class, 'update'])->name('cashouts.update');
Route::delete('/cashouts/{id}', [CashOutController::class, 'destroy'])->name('cashouts.destroy');
Route::post('/cashouts', [CashOutController::class, 'store'])->name('cashouts.store');
Route::get('/cashouts/{id}', [CashOutController::class, 'show'])->name('cashouts.show');

Route::get('/cashintags/create', [CashInTagController::class, 'create'])->name('cashintags.create');
Route::post('/cashintags', [CashInTagController::class, 'store'])->name('cashintags.store');
Route::get('/cashintags/{id}/edit', [CashInTagController::class, 'edit'])->name('cashintags.edit');
Route::put('/cashintags/{id}', [CashInTagController::class, 'update'])->name('cashintags.update');
Route::delete('/cashintags/{id}', [CashInTagController::class, 'destroy'])->name('cashintags.destroy');
Route::get('/cashintags/{id}', [CashInTagController::class, 'show'])->name('cashintags.show');

Route::get('/cashouttags/create', [CashOutTagController::class, 'create'])->name('cashouttags.create');
Route::post('/cashouttags', [CashOutTagController::class, 'store'])->name('cashouttags.store');
Route::get('/cashouttags/{id}/edit', [CashOutTagController::class, 'edit'])->name('cashouttags.edit');
Route::put('/cashouttags/{id}', [CashOutTagController::class, 'update'])->name('cashouttags.update');
Route::delete('/cashouttags/{id}', [CashOutTagController::class, 'destroy'])->name('cashouttags.destroy');
Route::get('/cashouttags/{id}', [CashOutTagController::class, 'show'])->name('cashouttags.show');



