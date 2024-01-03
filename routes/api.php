<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/get-post-data', [PostController::class, 'GetPostData']);
Route::post('/store-post-data', [PostController::class, 'StorePostData']);
Route::post('/update-post-data', [PostController::class, 'UpdatePostData']);
Route::post('/delete-post-data', [PostController::class, 'DeletePostData']);
Route::post('/generate-post-data/{number}', [PostController::class, 'AutoGeneratePost']);
Route::post('/show-post-data', [PostController::class, 'ShowDataPost']);






