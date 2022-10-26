<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\KontakController;
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


Route::get('/', function () {
    return view('iankun');
});

Route::get('/dashboard', function () {
   return view('/dashboard');
});

//admin
Route::middleware('auth')->group(function () {
    Route::get('/iankun', [DashboardController::class, 'index']);
    Route::post('/logout',[LoginController::class, 'logout'])->name('logout');
    Route::get('mastersiswa(id_siswa)/hapus', [SiswaController::class, 'hapus'])->name('mastersiswa.hapus');
    Route::resource('mastersiswa', SiswaController::class);
    Route::resource('masterproject', ProjectController::class);
    Route::resource('masterkontak', KontakController::class);
});


//guest
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login',[LoginController::class, 'authenticate'])->name('login.auth');
    Route::get('/', function () { return view('home'); });
    Route::get('/about', function () { return view('about'); });
    Route::get('/project', function () { return view('project'); });
    Route::get('/contact', function () { return view('contact'); });
});
Route::get('/mastersiswa', function () {
   return view('/mastersiswa');
});

// Route::get('iankun', [SiswaController::class, 'index'])->middleware('guest');
// Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::post('login', [LoginController::class, 'authenticate'])->name('login.auth');
// Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
// Route::get('mastersiswa/{id_siswa}/hapus', [SiswaController::class, 'hapus'])->name('mastersiswa.hapus');
// Route::resource('mastersiswa', SiswaController::class)->middleware('auth');
// Route::resource('masterproject', ProjectController::class)->middleware('auth');
// Route::resource('masterkontak', KontakController::class)->middleware('auth');



Route::get('/masterproject', function () {
   return view('masterproject');
});

Route::get('/masterkontak', function () {
   return view('masterkontak');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/project', function () {
    return view('project');
});

Route::get('/contact', function () {
    return view('contact');
});
