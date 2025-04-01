<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\SubjectController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\StudyTimeController;
use App\Http\Controllers\API\RegisterUserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware' => 'api'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/login', [AuthController::class, 'login']);

        Route::group(['middleware' => 'jwt_auth'], function () {
            Route::post('/logout', [AuthController::class, 'logout']);
            Route::get('/profile', [AuthController::class, 'profile']);
            Route::put('/update_profile', [AuthController::class, 'updateProfile']);
        });
    });

    Route::group(['middleware' => 'jwt_auth'], function () {
        Route::group([], function () {
            Route::get('users', [UserController::class, 'index']);
            Route::post('create_user', [UserController::class, 'store']);
            Route::get('detail_user/{id}', [UserController::class, 'show']);
            Route::put('update_user', [UserController::class, 'update']);
            Route::delete('delete_user',[UserController::class, 'destroy']);
            Route::get('user_all',[UserController::class, 'userAll']);
        });

        Route::group([], function () {
            Route::get('role_all',[RoleController::class, 'roleAll']);
            Route::get('register_all',[RegisterController::class, 'registerAll']);
            Route::get('teacher_all',[UserController::class, 'teacherAll']);
            Route::get('subject_all',[SubjectController::class, 'subjectAll']);
            Route::get('study_time_all',[StudyTimeController::class, 'studyTimeAll']);
        });

        Route::group([], function () {
            Route::get('register_users', [RegisterUserController::class, 'index']);
            Route::post('create_register_user', [RegisterUserController::class, 'store']);
            Route::get('detail_register_user', [RegisterUserController::class, 'show']);
            Route::put('update_register_user', [RegisterUserController::class, 'update']);
            Route::delete('delete_register_user',[RegisterUserController::class, 'destroy']);
        });
    });
});