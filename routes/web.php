<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/register',function(){
    return view('register');
});

Route::get('/login', function(){
    return view('login');
});

Route::post('/register', [LoginController::class, 'store']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::group(['prefix' => 'developer', 'middleware' => 'CheckDeveloper'], function(){
    Route::get('/', [UserController::class, 'developerIndex']);

    // Route::get('/add-game', [GameController::class, 'create']);
    Route::get('/add-game/{locale?}', [GameController::class, 'create']);

    Route::post('/add-game', [GameController::class, 'store']);
    Route::get('/edit-game/{game_id}', [GameController::class, 'edit']);
    Route::put('/update-game', [GameController::class, 'update']);
});




Route::group(['prefix' => 'buyer', 'middleware' => 'CheckBuyer'], function(){
    Route::get('/', [UserController::class, 'buyerIndex']);
    Route::put('/top-up', [UserController::class, 'topup']);
    Route::get('/buy-game', [GameController::class, 'show']);
    Route::post('/buy-game', [TransactionController::class, 'store']);
});
