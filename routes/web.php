<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::resource('users', UserController::class);

Route::get('/', [ContatoController::class, 'index']);
Route::get('/contatos/create', [ContatoController::class, 'create']);
Route::post('/contatos', [ContatoController::class, 'store']);
Route::delete('/contatos/{id}', [ContatoController::class, 'destroy'])->middleware('auth');
Route::get('/contatos/{key}', [ContatoController::class, 'show']);
Route::put('/contatos/update/{id}', [ContatoController::class, 'update'])->middleware('auth');

Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/register', [LoginController::class, 'create'])->name('login.create');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');


Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');
