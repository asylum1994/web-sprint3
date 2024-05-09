<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CrearJuegoController;
use App\Http\Controllers\InvitacionFallidaController;
use App\Http\Controllers\HomeController;



Route::get('/',function(){
    return view('welcome');
});

Route::get('/HomeP', [CrearJuegoController::class, 'getDataJuego']); // Redirecciona a /home o cualquier ruta deseada


Route::get('/crearJuego/invitacionFallida', [InvitacionFallidaController::class, 'getDataFallido']);

Route::get('/crearJuego/index', [CrearJuegoController::class, 'index'])->name('crearJuego.index');

Route::get('crearJuego/pendiente{id}',[CrearJuegoController::class,'getPendiente'])->name('crearJuego.pendiente');


Route::post('/crearJuego/index', [CrearJuegoController::class, 'store'])->name('crear_juego');
Route::put('/crearJuego/pendiente{id}', [CrearJuegoController::class, 'editFechaInicioJuego'])->name('empezar');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
