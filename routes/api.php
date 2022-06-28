<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\V1\EstimateController;
use App\Http\Controllers\Api\V1\ProjectController;
use App\Http\Controllers\Api\V1\StainController;
use App\Http\Controllers\Api\V1\ModuleController;
use App\Http\Controllers\Api\V1\InvoiceController;;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function () {
    Route::post("/login", [AuthController::class, 'login'])->name('api.login');
    Route::post("/register", [AuthController::class, 'register'])->name('api.register');
});


Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    Route::get('/modules/project', [ModuleController::class, 'getModuleByProject']);
    Route::apiResources([
        'users' => UserController::class,
        'estimates' => EstimateController::class,
        'invoices' => InvoiceController::class,
        'modules' => ModuleController::class,
        'stains' => StainController::class,
        'projects' => ProjectController::class,
    ]);
});
