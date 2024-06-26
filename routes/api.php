<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\DoctorScheduleController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\PatientScheduleController;
use App\Http\Controllers\Api\SatuSehatTokenController;
use App\Http\Controllers\Api\ServiceMedicinesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::apiResource('doctors', DoctorController::class)->middleware('auth:sanctum');
Route::apiResource('patients', PatientController::class)->middleware('auth:sanctum');
Route::apiResource('doctor-schedules', DoctorScheduleController::class)->middleware('auth:sanctum');
Route::apiResource('services', ServiceMedicinesController::class)->middleware('auth:sanctum');
Route::apiResource('patient-schedules', PatientScheduleController::class)->middleware('auth:sanctum');

Route::get('satusehat-token', [SatuSehatTokenController::class, 'token']);
