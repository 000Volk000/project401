<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinosController;

Route::get('/', [DestinosController::class, "index"]);
Route::get('/show/{id}', [DestinosController::class, "show"]);
Route::get('/create', [DestinosController::class, "create"]);
Route::post('/store', [DestinosController::class, "store"]);
Route::get('/edit/{id}', [DestinosController::class, "edit"]);
Route::get('/delete/{id}', [DestinosController::class, "delete"]);
