<?php

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\UserController as AdminController;//allias
use App\Http\Controllers\Condidater\UserController as CondidateController;//allias
use App\Http\Controllers\Representative\UserController as RepresentativeController;//allias
use App\Http\Controllers\Representative\ExperienceController as RepresentativeExpController;//allias


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

// Route::get('Dashadmin',['Admin\UserController@index'])->name('Dashadmin');

Route::get('/', function () {
    return view('welcome');
});

Route::resource('admin', AdminController::class);
Route::resource('adminCompany', CompanyController::class);

Route::resource('condidate', CondidateController::class);
Route::resource('representative', RepresentativeController::class);
Route::resource('representativeExperience', RepresentativeExpController::class);

Route::put('/representative/{userId}/change-status', [RepresentativeController::class, 'changeStatus'])
    ->name('representative.changeStatus');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
