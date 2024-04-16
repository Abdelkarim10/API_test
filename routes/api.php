<?php

use App\Http\Middleware\ApprovedUserMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddlware;


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



Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware(['auth:sanctum', ApprovedUserMiddleware::class])->group(function () {
    // Approved users 

    Route::get('/users', [UserController::class, 'index']);
    Route::post('/certificates', [UserController::class, 'addCertificate']);
    Route::delete('/certificates/{certificateId}', [UserController::class, 'removeCertificate']);
    Route::put('/users-update/{id}', [UserController::class, 'updateOwnProfile']);
});
   

Route::middleware(['auth:sanctum', AdminMiddlware::class])->group(function () {
    // Admin

    Route::get('/users', [UserController::class, 'index']);
    Route::put('/users/{user}', [UserController::class, 'updateUser']);
    Route::put('/users/{id}/approve', [AdminController::class, 'approveUser']);
    Route::get('/certifications', [AdminController::class, 'getCertifications']);
    Route::put('/update-certifications/{id}', [AdminController::class, 'updateCertification']);
    Route::post('/create-certifications', [AdminController::class, 'createCertification']);
    Route::delete('/certifications/{id}', [AdminController::class, 'deleteCertification']);
    Route::post('/approve-users/{id}', [AdminController::class, 'approveUser']);
    Route::get('/export-reports', [AdminController::class, 'exportReports']);
});





