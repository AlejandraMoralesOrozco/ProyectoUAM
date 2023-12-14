<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\InstructorController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/prospects', [HomeController::class, 'showProspects'])->name('prospects');
Route::post('/prospects/{id}/process', [HomeController::class, 'process'])->name('prospect.process');

Route::get('/instructors', [InstructorController::class, 'showInstructors'])->name('instructors');