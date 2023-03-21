<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\RuangController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\ProfileController;
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
//guest route
Route::get('/', function () {
    return redirect()->route('guest.index');
});

Route::get('/index', [GuestController::class, 'index'])->name('guest.index');

//user route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//admin route
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::namespace('Auth')->middleware('guest:admin')->group(function(){
        //login route
        Route::get('login',[AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login',[AuthenticatedSessionController::class, 'store'])->name('adminlogin');
    });

    Route::middleware('admin')->group(function(){
        Route::get('dashboard',[HomeController::class, 'index'])->name('dashboard');

        Route::get('jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
        Route::post('jadwal', [JadwalController::class, 'store'])->name('jadwal.store');
        Route::put('jadwal/{jadwal}', [JadwalController::class, 'update'])->name('jadwal.update');
        Route::delete('jadwal/{jadwal}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');

        Route::get('ruang', [RuangController::class, 'index'])->name('ruang.index');
        Route::get('ruang/create', [RuangController::class, 'create'])->name('ruang.create');
        Route::post('ruang', [RuangController::class, 'store'])->name('ruang.store');
        Route::get('ruang/{ruang}/edit', [RuangController::class, 'edit'])->name('ruang.edit');
        Route::put('ruang/{ruang}', [RuangController::class, 'update'])->name('ruang.update');
        Route::delete('ruang/{ruang}', [RuangController::class, 'destroy'])->name('ruang.destroy');
    });

    Route::get('profile', [AuthenticatedSessionController::class, 'edit'])->name('profile.edit');
    Route::post('logout',[AuthenticatedSessionController::class, 'destroy'])->name('logout');

});