<?php

use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterdUserController;
use Symfony\Contracts\Service\Attribute\Required;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

Route::view('/', 'home');
Route::view('/contact', 'contact');

// Route::resource('jobs', JobController::class)->only(['index','show'])->middleware('auth');
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show']);

Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
->middleware('auth')
->can('edit, job');

Route::patch('/jobs/{job}', [JobController::class, 'update'])->middleware('auth');
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->middleware('auth');



// Auth
Route::get('/register', [RegisterdUserController:: class, 'create']);
Route::post('/register', [RegisterdUserController:: class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);


 