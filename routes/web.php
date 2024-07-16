<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;
use Illuminate\Support\Arr;
use App\Models\Job;



Route::get('/', function () {
    return view('home');
});


/* Route::get('/', function () {
    return view('home');
}); */

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->cursorPaginate(3);

    return view('jobs', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    // \illuminate\Support\Arr::first($jobs, function ($job) use($id){
    //     Return $job['id'] ==$id;
    $job = Job::find($id);

    return view('job',  ['job' => $job]);
});
Route::get('/contact', function () {
    return view('contact');
});
