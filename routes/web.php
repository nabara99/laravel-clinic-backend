<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorScheduleController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ServiceMedicinesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('pages.auth.login');
});

Route::middleware(['auth'])->group(function() {
    Route::get('home', function() {
        return view('dashboard');
    })->name('home');
    Route::resource('user', UserController::class)->middleware('userAccess:admin');
    Route::resource('doctor', DoctorController::class);
    Route::resource('schedule', DoctorScheduleController::class);
    Route::resource('patient', PatientController::class);
    Route::resource('service-medicines', ServiceMedicinesController::class);
});
