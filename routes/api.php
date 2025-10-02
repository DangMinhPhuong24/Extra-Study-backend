<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\ChatController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\GoogleController;
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
Route::get('/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::group(['middleware' => 'api'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/login', [AuthController::class, 'login']);
        Route::get('/google', [GoogleController::class, 'redirectToGoogle']);


        Route::post('/forgot_password', [AuthController::class, 'forgotPassword']);
        Route::post('/reset_password', [AuthController::class, 'resetPassword']);

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

            Route::post('upload_avatar', [UserController::class, 'uploadAvatar']);
            Route::get('user_all_except_myself',[UserController::class, 'userAllExceptMyself']);
        });

        Route::group([], function () {
            Route::get('role_all',[RoleController::class, 'roleAll']);
            Route::get('register_all',[RegisterController::class, 'registerAll']); 
            Route::get('teacher_all',[UserController::class, 'teacherAll']);
            Route::get('subject_all',[SubjectController::class, 'subjectAll']);
            Route::get('study_time_all',[StudyTimeController::class, 'studyTimeAll']);

            // Danh sách tất cả các register để đăng ký
            Route::get('registers',[RegisterController::class, 'index'])->middleware(
                'check:module_registers.register_user_management.all'
            ); 
        });

        Route::group([], function () {
            // Những register mà 1 học sinh đã đăng ký
            Route::get('register_users', [RegisterUserController::class, 'index'])->middleware(
                'check:module_registers.register_user_management.index'
            ); 

            Route::post('create_register_user', [RegisterUserController::class, 'store'])->middleware(
                'check:module_registers.register_user_management.store'
            );

            // Danh sách học sinh đã đăng ký
            Route::get('detail_register_user', [RegisterUserController::class, 'show'])->middleware(
                'check:module_registers.register_user_management.show'
            ); 

            Route::put('update_register_user', [RegisterUserController::class, 'update'])->middleware(
                'check:module_registers.register_user_management.update'
            );

            Route::delete('delete_register_user',[RegisterUserController::class, 'destroy']);
        });

        Route::group([], function () {
            Route::post('send_message', [ChatController::class, 'store']);
            Route::get('chat_all', [ChatController::class, 'chatAll']);
        });
    });
});
