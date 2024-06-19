<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\SearchAddressController;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/contact/register', [ContactController::class,'create']);
    Route::post('/search-address', [SearchAddressController::class,'find']);


    Route::post('/password/reset', [ResetPasswordController::class,'reset'])->name('password.reset');
});
Route::post('/password/email', [ForgotPasswordController::class,'sendResetLinkEmail']);

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/health-check', function () {
    return response()->json([
        'message' => 'Api acessada com sucesso'
    ], Response::HTTP_OK);
});

