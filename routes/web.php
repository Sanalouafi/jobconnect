<?php

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\UserController as AdminController;//allias
use App\Http\Controllers\Condidater\FormationController;
use App\Http\Controllers\Condidater\ExperienceController;
use App\Http\Controllers\Condidater\UserController as CondidateController;//allias
use App\Http\Controllers\Home\PublicationController as HomeController;
use App\Http\Controllers\Representative\UserController as RepresentativeController;//allias
use App\Http\Controllers\Representative\ExperienceController as RepresentativeExpController;//allias
use App\Http\Controllers\Representative\CompanyController as RepresentativeComController;//allias
use App\Http\Controllers\Representative\PublicationController as RepresentativePub;//allias
use App\Http\Controllers\Entrepreneur\UserController as EntrepreneurController;//allias
use App\Http\Controllers\Entrepreneur\OfferController as EntrepreneurOff;//allias

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

Route::resource('/', HomeController::class);
Route::resource('admin', AdminController::class);
Route::resource('adminCompany', CompanyController::class);
Route::resource('experience', ExperienceController::class);
Route::resource('formation', FormationController::class);
Route::resource('condidate', CondidateController::class);





Route::middleware('auth')->group(function () {

    Route::middleware('representative')->group(function () {
        ////////representative
        Route::resource('representative', RepresentativeController::class);
        Route::resource('representativeExperience', RepresentativeExpController::class);
        Route::resource('representativeCompany', RepresentativeComController::class);
        Route::resource('representativePub', RepresentativePub::class);
        Route::put('/representative/{userId}/change-status', [RepresentativeController::class, 'changeStatus'])->name('representative.changeStatus');
        Route::POST('representativePub/search', [RepresentativePub::class, 'search'])->name('representativePub.search');
    });
    Route::middleware('entrepreneur')->group(function () {
        ////////entrepreneur
        Route::resource('entrepreneur', EntrepreneurController::class);
        Route::resource('entrepreneurOff', EntrepreneurOff::class);

    });

});


require __DIR__ . '/auth.php';
