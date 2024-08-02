<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;
use Illuminate\Support\Arr;
use App\Models\Job;
use Symfony\Contracts\Service\Attribute\Required;

Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::resource('jobs', JobController::class);


 