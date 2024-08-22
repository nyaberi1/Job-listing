<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    //index
    public function index()
    {
        $jobs = Job::with('employer')->latest()->cursorPaginate(3);

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    //create
    public function create()
    {
        return view('jobs.create');
    }

    //show
    public function Show(Job $job)
    {
        return view('jobs.show',  ['job' => $job]);
    }

    //store
    public function store()
    {
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
    }

    //edit
    public function edit(Job $job)
    {

        Gate::authorize('edit-job', $job);


        return view('jobs.edit', ['job' => $job]);
    }

    //update
    public function update(Job $job)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);
        // authorize


        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);
        // Redirect to the job page
        return redirect('/jobs/' . $job->id);
    }


    //destroy

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect('/jobs');
    }
}
