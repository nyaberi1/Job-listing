<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;
use Illuminate\Support\Arr;
use App\Models\Job;
use Symfony\Contracts\Service\Attribute\Required;

Route::get('/', function () {
    return view('home');
});




Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->cursorPaginate(3);

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

//create

Route::get('/jobs/create', function () {
    return view('jobs.create');
});


//show 

Route::get('/jobs/{job}', function (Job $job) {
    return view('jobs.show',  ['job' => $job]);
});


//store

Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],

    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1

    ]);
    return redirect('/jobs');
});

//edit

Route::get('/job/{$id}/edit', function ($id) {
    $job = Job::find($id);
    return view('jobs.edit', ['job' => $job]);
});

//update


Route::patch('/jobs/{job}', function (Job $job) {
    request()->validate([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);


    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);
    return redirect('/job', $job->id);
});



//destroy
Route::delete('/jobs/{job}', function(Job $job){
    //authorize (on hold ...)
    $job->delete();
    return view('/jobs');
});


Route::get('/contact', function () {
    return view('contact');
});
