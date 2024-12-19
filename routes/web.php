<?php

use App\Http\Controllers\DestinosController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\UndefineController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Middleware\CheckAdminRole;
use App\Http\Middleware\CheckProfesorRole;
use App\Http\Middleware\CheckStudentRole;


    Route::get('/', [DestinosController::class, "index"])->name('destinos.admin')->middleware(CheckAdminRole::class);
    Route::get('/show/{id}', [DestinosController::class, "show"]);
    Route::get('/create', [DestinosController::class, "create"])->middleware(CheckAdminRole::class);;
    Route::post('/store', [DestinosController::class, "store"])->middleware(CheckAdminRole::class);;
    Route::get('/edit/{id}', [DestinosController::class, "edit"]);
    Route::get('/delete/{id}', [DestinosController::class, "delete"]);
    Route::get('/estudiante', [EstudianteController::class, "index"])->name('estudiante')->middleware(CheckStudentRole::class);
    Route::get('/profesor', [ProfesorController::class, "index"])->name('profesor')->middleware(CheckProfesorRole::class);

    //Route::resource('asignaturas', AsignaturaController::class);

    Route::get('/asignaturas', [AsignaturaController::class, "index"])->name('asignaturas.index')->middleware(CheckAdminRole::class);;
    Route::get('/asignaturas/create', [AsignaturaController::class, "create"])->name('asignaturas.create')->middleware(CheckAdminRole::class);
    Route::post('/asignaturas/store', [AsignaturaController::class, "store"])->name('asignaturas.store')->middleware(CheckAdminRole::class);
    Route::get('/asignaturas/{id}', [AsignaturaController::class, "searchByCity"])->name('asignatura');
    Route::get('/asignaturas/{id}/edit', [AsignaturaController::class, "edit"])->name('asignaturas.edit')->middleware(CheckAdminRole::class);
    Route::patch('/asignaturas/{id}', [AsignaturaController::class, "update"])->name('asignaturas.update')->middleware(CheckAdminRole::class);
    Route::delete('/asignaturas/{id}', [AsignaturaController::class, "destroy"])->name('asignaturas.destroy')->middleware(CheckAdminRole::class);
    //Route::get('/asignaturas/create', [AsignaturaController::class, "create"])->name('asignaturas.create');

    Route::get('/solicitudes', [SolicitudController::class, "index"])->name('solicitud')->middleware(CheckAdminRole::class);
    Route::get('/solicitudesAprobadas', [SolicitudController::class, "solicitudesAprobadas"])->name('solicitudAprobadas')->middleware(CheckAdminRole::class);
    Route::get('/solicitud/{idDestino}', [SolicitudController::class, "store"])->name('solicitud.store');
    Route::post('/cancelarSolicitud/{destinoId}', [SolicitudController::class, 'cancelarSolicitud'])->name('solicitudes.cancelar');
    Route::post('/solicitudes/renovar/{destinoId}', [SolicitudController::class, 'renovarSolicitud'])->name('solicitudes.renovar');
    Route::post('/solicitudes/aprobar/{id}', [SolicitudController::class, 'aprobar'])->name('solicitudes.aprobar')->middleware(CheckAdminRole::class);

    Route::get('/createDest',[DestinosController::class, "create"])->middleware(CheckAdminRole::class);
    Route::post('/storeDest',[DestinosController::class, "store"])->middleware(CheckAdminRole::class);
    Route::get('/ModDest/{id}',[DestinosController::class, "edit"])->middleware(CheckAdminRole::class);
    Route::put('/ModDest/{id}',[DestinosController::class, "update"])->middleware(CheckAdminRole::class);






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

    Route::get('/rick', function () {
        return redirect('https://www.youtube.com/watch?v=dQw4w9WgXcQ');
    });
    Route::get('/{id}',[UndefineController::class, 'index']);

require __DIR__.'/auth.php';
