<?php

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Condidater\FormationController;
use App\Http\Controllers\Condidater\ExperienceController;
use App\Http\Controllers\Admin\UserController as AdminController;//allias
use App\Http\Controllers\Condidater\UserController as CondidateController;//allias
use App\Http\Controllers\Representative\UserController as RepresentativeController;//allias
use App\Http\Controllers\Representative\ExperienceController as RepresentativeExpController;//allias
use App\Http\Controllers\Representative\CompanyController as RepresentativeComController;//allias
use App\Http\Controllers\Representative\PublicationController as RepresentativePub;//allias
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
Route::resource('representativePub', RepresentativePub::class);

Route::put('/representative/{userId}/change-status', [RepresentativeController::class, 'changeStatus'])->name('representative.changeStatus');

<<<<<<< HEAD
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
=======
Route::get('representativePub/search', [RepresentativePub::class, 'search'])->name('representativePub.search');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
>>>>>>> 346fe16abed8bad0f1888d21d7d10618e1d632cc

Route::middleware('auth')->group(function () {

});


require __DIR__ . '/auth.php';
