<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\RegisterController;

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
    return view('index');
});

Route::get('/register', function () {
    return view('/register');
});

Route::get('/dashboard', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('welcome');
})->name('welcome');

Route::post('registration', [RegisterController::class, 'register'])->name('registration');

Route::post('login', [RegisterController::class, 'login'])->name('login');

