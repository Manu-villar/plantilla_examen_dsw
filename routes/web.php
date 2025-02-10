<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/items', [ItemController::class, 'listado'])->name('items.listado');

    Route::get('/item/{id}'            , [ItemController::class, 'mostrar'])->name('items.mostrar');
    Route::get('/item/actualizar/{id}' , [ItemController::class, 'actualizar'])->name('items.actualizar');
    Route::get('/item/eliminar/{id}'   , [ItemController::class, 'eliminar'])->name('items.eliminar');


    Route::get('/item', [ItemController::class, 'alta'])->name('items.alta');
    Route::post('/item', [ItemController::class, 'almacenar'])->name('item.almacenar');

});

require __DIR__.'/auth.php';
