<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\V1\EstimateController;

use App\Models\Project;


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



// Route::get('/users', [UserController::class,'index']);
// Route::post('/users', [UserController::class, 'store']);

// Route::post('/users', [UserController::class, 'show']);



// Route::get('/projects', function () {
//     return ProjectResource::collection(Project::all());
// });

// Route::post('/projects', function () {
//     return ProjectResource::collection(Project::all());
// });

Route::middleware('auth:sanctum')->prefix('v1')->group(function () {

    Route::apiResources([
        'users' => UserController::class,
        'estimates' => EstimateController::class,
    ]);
});
