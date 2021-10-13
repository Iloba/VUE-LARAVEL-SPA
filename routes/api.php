<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

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

//check if user is authenticated before allowing them to access dashboard
Route::middleware('auth:sanctum')->get('/authenticated', function () {
    return true;
});


Route::post('/register', [RegisterController::class, 'register'])->name('register.user');
Route::post('/login', [RegisterController::class, 'login'])->name('login.user');
Route::post('/logout', [RegisterController::class, 'logout'])->name('logout.user');