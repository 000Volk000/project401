<?php

use App\Http\Controllers\DestinosController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolicitudController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\AsignaturaController;
use \App\Http\Middleware\CheckAdminRole;
use \App\Http\Middleware\CheckProfesorRole;
use App\Http\Middleware\CheckStudentRole;


    Route::get('/', [DestinosController::class, "index"])->name('destinos.admin')->middleware(CheckAdminRole::class);
    Route::get('/show/{id}', [DestinosController::class, "show"]);
    Route::get('/create', [DestinosController::class, "create"]);
    Route::post('/store', [DestinosController::class, "store"]);
    Route::get('/edit/{id}', [DestinosController::class, "edit"]);
    Route::get('/delete/{id}', [DestinosController::class, "delete"]);
    Route::get('/profesor', [ProfesorController::class, "index"])->name('profesor')->middleware(CheckProfesorRole::class);
    Route::get('/estudiante', [EstudianteController::class, "index"])->name('estudiante')->middleware(CheckStudentRole::class);

    //Route::resource('asignaturas', AsignaturaController::class);

    Route::get('/asignaturas', [AsignaturaController::class, "index"])->name('asignaturas.index');
    Route::get('/asignaturas/create', [AsignaturaController::class, "create"])->name('asignaturas.create');
    Route::post('/asignaturas/store', [AsignaturaController::class, "store"])->name('asignaturas.store');
    Route::get('/asignaturas/{id}', [AsignaturaController::class, "searchByCity"])->name('asignatura');
    Route::get('/asignaturas/{id}/edit', [AsignaturaController::class, "edit"])->name('asignaturas.edit');
    Route::patch('/asignaturas/{id}', [AsignaturaController::class, "update"])->name('asignaturas.update');
    Route::delete('/asignaturas/{id}', [AsignaturaController::class, "destroy"])->name('asignaturas.destroy');
    //Route::get('/asignaturas/create', [AsignaturaController::class, "create"])->name('asignaturas.create');

    Route::get('/solicitudes', [SolicitudController::class, "index"])->name('solicitud');
    Route::get('/solicitudesAprobadas', [SolicitudController::class, "solicitudesAprobadas"])->name('solicitudAprobadas');
    Route::get('/solicitud/{idDestino}', [SolicitudController::class, "store"])->name('solicitud.store');
    Route::post('/cancelarSolicitud/{destinoId}', [SolicitudController::class, 'cancelarSolicitud'])->name('solicitudes.cancelar');
    Route::post('/solicitudes/renovar/{destinoId}', [SolicitudController::class, 'renovarSolicitud'])->name('solicitudes.renovar');
    Route::post('/solicitudes/aprobar/{id}', [SolicitudController::class, 'aprobar'])->name('solicitudes.aprobar');

    Route::get('/createDest',[DestinosController::class, "create"]);
    Route::post('/storeDest',[DestinosController::class, "store"]);
    Route::get('/ModDest/{id}',[DestinosController::class, "edit"]);
    Route::put('/ModDest/{id}',[DestinosController::class, "update"]);


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
