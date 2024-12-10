<?php

use App\Http\Controllers\DestinosController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\AsignaturaController;


    Route::get('/', [DestinosController::class, "index"])->name('destinos.admin');//>middleware(\App\Http\Middleware\CheckAdminRole::class);
    Route::get('/show/{id}', [DestinosController::class, "show"]);
    Route::get('/create', [DestinosController::class, "create"]);
    Route::post('/store', [DestinosController::class, "store"]);
    Route::get('/edit/{id}', [DestinosController::class, "edit"]);
    Route::get('/delete/{id}', [DestinosController::class, "delete"]);
    Route::get('/profesor', [ProfesorController::class, "index"])->name('profesor');
    Route::get('/estudiante', [EstudianteController::class, "index"])->name('estudiante');
    Route::get('/asignaturas/{id}', [AsignaturaController::class, "index"])->name('asignatura');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

require __DIR__.'/auth.php';
