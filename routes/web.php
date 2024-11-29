<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinosController;

Route::get('/', [DestinosController::class, "index"]);
