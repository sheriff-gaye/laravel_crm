<?php

use App\Http\Controllers\Admin\AdminUsers;
use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DasboardController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\RegisteredvotersController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Voting\VotingDashboardController;
use App\Http\Controllers\Voting\VotingLoginController;

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
    return view('auth.login');
});


Route::get('/logout', [LogoutController::class, 'logout'])->name('go_out');

Route::get('/dash', [DasboardController::class, 'index'])->name('home');

Route::resource('client',ClientController::class);

Route::resource('/project',ProjectController::class);

Route::resource('/task',TaskController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';