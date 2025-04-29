<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
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



Route::get('/', [ClienteController::class, 'index']);

Route::middleware(['cliente'])->group(function () {
    Route::get('/cliente', [ClienteController::class, 'index']);
    Route::get('/cliente/{nombre}', [ClienteController::class, 'show']);
    Route::post('/cliente', [ClienteController::class, 'create']);
    Route::put('/cliente/{ciudad}', [ClienteController::class, 'update']);
    Route::delete('/cliente/{ciudad}', [ClienteController::class, 'delete']);
    Route::get('/exportar', [ClienteController::class, 'exportarClientes'])->name('clientes.exportar');
    Route::get('/exportargan', [ClienteController::class, 'exportarClientesGanador'])->name('clientes.exportargan');

});

