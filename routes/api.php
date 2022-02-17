<?php

use App\Http\Controllers\Auth\LoginAuthController;
use App\Http\Controllers\Product\CreateProductController;
use App\Http\Controllers\Product\DeleteProductController;
use App\Http\Controllers\Product\ListProductController;
use App\Http\Controllers\Product\UpdateProductController;
use App\Http\Controllers\User\CreateUserController;
use App\Http\Controllers\User\ListUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [LoginAuthController::class, '__invoke']);
});

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::prefix('user')->group(function () {
        Route::get('', [ListUserController::class, '__invoke']);
        Route::post('', [CreateUserController::class, '__invoke']);
    });

    Route::prefix('product')->group(function () {
        Route::get('', [ListProductController::class, '__invoke']);
        Route::post('', [CreateProductController::class, '__invoke']);
        Route::post('{id}', [UpdateProductController::class, '__invoke']);
        Route::delete('{id}', [DeleteProductController::class, '__invoke']);
    });

});

Route::fallback(function () {
    return response()->json(['error' => 'URL not found'], 404);
});

Route::get('unauthenticated', function () {
    return response()->json(['error' => 'Unauthenticated'], 404);
})->name('unauthenticated');



