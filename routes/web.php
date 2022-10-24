<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JKontakController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'register_action'])->name('register.action');
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'login_action'])->name('login.action');
    // guest
    // Route::middleware(['auth', 'rolecheck:1'])->group(function(){
    // Route::resource('master_p', ProjectController::class);
//     Route::resource('', DashboardController::class);
//     Route::resource('master_s', SiswaController::class);
    // Route::get('/', function () {
    //     return view('home');
    // });
    // Route::get('/about', function () {
    //     return view('about');
    // });
    // Route::get('/projects', function () {
    //     return view('project');
    // });
    // Route::get('/contact', function () {
    //     return view('contact');
    // });
    
// });

// ----------------------------------------------------------------------------------------------------

// admin
Route::middleware(['auth', 'rolecheck:0,1'])->group(function(){
    Route::resource('', DashboardController::class);
    Route::resource('master_s', SiswaController::class);
    Route::get('master_s/{id_siswa}/hapus', [SiswaController::class, 'hapus'])->name('master_s.hapus');
    Route::resource('master_p', ProjectController::class);
    Route::get('master_p/create/{id_siswa}', [ProjectController::class, 'create'])->name('master_p.create');
    Route::get('master_p/{id_siswa}/hapus', [ProjectController::class, 'hapus'])->name('master_p.hapus');
    Route::resource('master_k', ContactController::class);
    Route::get('master_k/create/{id_siswa}', [ContactController::class, 'create'])->name('master_k.create');
    Route::get('master_k/{id_siswa}/hapus', [ContactController::class, 'hapus'])->name('master_k.hapus');
    Route::resource('jkontak', JKontakController::class);
    Route::get('jkontak/{id_siswa}/hapus', [JKontakController::class, 'hapus'])->name('jkontak.hapus');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});



// Route::get('/index', function () {
//     return view('template');
// });
