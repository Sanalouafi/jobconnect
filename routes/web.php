<?php

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Condidater\FormationController;
use App\Http\Controllers\Condidater\ExperienceController;
use App\Http\Controllers\Admin\UserController as AdminController;//allias
use App\Http\Controllers\Condidater\UserController as CondidateController;//allias
use App\Http\Controllers\Representative\UserController as RepresentativeController;//allias
use App\Http\Controllers\Representative\ExperienceController as RepresentativeExpController;//allias
use App\Http\Controllers\Representative\CompanyController as RepresentativeComController;//allias
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
Route::resource('experience', ExperienceController::class);
Route::resource('formation', FormationController::class);
Route::resource('condidate', CondidateController::class);


////////representative
Route::resource('representative', RepresentativeController::class);
Route::resource('representativeExperience', RepresentativeExpController::class);
Route::resource('representativeCompany', RepresentativeComController::class);

Route::put('/representative/{userId}/change-status', [RepresentativeController::class, 'changeStatus'])->name('representative.changeStatus');

<<<<<<< HEAD
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
=======





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
>>>>>>> 8df46af2428f41c5ebbd7aaa5d1a3b1a5dd77cf0

Route::middleware('auth')->group(function () {

});


require __DIR__ . '/auth.php';
