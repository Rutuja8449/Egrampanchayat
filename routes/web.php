<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/', [AuthController::class, 'loginIndex']);
Route::get('/login', [AuthController::class, 'loginIndex']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'registerIndex']);
Route::post('/register', [AuthController::class, 'register']);


Route::prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboardIndex']);
    Route::get('/services', [AdminController::class, 'serviceMasterIndex']);
    Route::post('/service/create', [AdminController::class, 'createService']);
    Route::get('/service/delete/{id}', [AdminController::class, 'deleteService']);
    Route::get('/service/updateIndex/{id}', [AdminController::class, 'serviceUpdateIndex']);
    Route::post('/service/update', [AdminController::class, 'updateService']);
    Route::get('/application/all', [AdminController::class, 'allApplications']);
    Route::get('/application/update/{id}', [AdminController::class, 'updateApplicationIndex']);
    Route::post('/application/updateP', [AdminController::class, 'updateApplication']);
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::get('/user-details/{id}', [AuthController::class, 'findUser']);

});

Route::prefix('/user')->group(function () {
    Route::get('/', [UserController::class, 'serviceMasterIndex']);
    Route::get('/services', [UserController::class, 'serviceMasterIndex']);
    Route::get('/application/apply/{id}', [UserController::class, 'applyService']);
    Route::get('/applications', [UserController::class, 'myApplications']);
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::get('/certificate/{id}', [UserController::class, 'viewCertificate']);

});

Route::prefix('/staff')->group(function () {
    Route::get('/', [StaffController::class, 'serviceMasterIndex']);
    Route::get('/services', [StaffController::class, 'serviceMasterIndex']);
    Route::get('/application/apply/{id}', [StaffController::class, 'applyService']);
    Route::get('/application/all', [StaffController::class, 'allApplications']);
    Route::get('/application/update/{id}', [StaffController::class, 'updateApplicationIndex']);
    Route::post('/application/updateP', [StaffController::class, 'updateApplication']);
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::get('/user-details/{id}', [AuthController::class, 'findUserStaff']);
});