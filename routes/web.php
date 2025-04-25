<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;

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
Route::get('/resume/list', [ResumeController::class, 'index'])->name('resume.index');
Route::get('/resume/upload', [ResumeController::class, 'create'])->name('resume.create');
Route::post('/resume/upload', [ResumeController::class, 'store'])->name('resume.upload');
Route::get('/resume/{id}/edit', [ResumeController::class, 'edit'])->name('resume.edit');
Route::put('/resume/{id}', [ResumeController::class, 'update'])->name('resume.update');