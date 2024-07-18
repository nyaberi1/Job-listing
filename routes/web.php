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
    $jobs = Job::with('employer')->latest()->cursorPaginate(3);

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});


Route::get('/jobs/{id}', function ($id) {
    // \illuminate\Support\Arr::first($jobs, function ($job) use($id){
    //     Return $job['id'] ==$id;
    $job = Job::find($id);

    return view('jobs.show',  ['job' => $job]);
});


Route::post('/jobs', function () {
    $request()->validate([

    ]);

    Job::create([
        'title'=>request('title'),
        'salary'=>request('salary'),
        'employer_id'=>1

    ]);
    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});
