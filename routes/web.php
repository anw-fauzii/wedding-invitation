<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UndanganController;
use App\Http\Controllers\WelcomeController;
use App\Models\Undangan;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');
Route::get('/u/{id}', [WelcomeController::class, 'kode'])->name('kode.tamu');
Route::post('/update/komentar/{id}', [WelcomeController::class, 'update'])->name('welcome.update');

Route::get('/dashboard', function () {
    $undangan = Undangan::all();
    return view('dashboard', compact('undangan'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/undangan', UndanganController::class);
    Route::post('import-undangan', [UndanganController::class, 'import'])->name('import.undangan');
});
//Optimize
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Clear Config cleared</h1>';
});
require __DIR__.'/auth.php';
