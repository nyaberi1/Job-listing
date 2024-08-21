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

Route::resource('jobs', JobController::class);


// Auth
Route::get('/register', [RegisterdUserController:: class, 'create']);
Route::post('/register', [RegisterdUserController:: class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);


 