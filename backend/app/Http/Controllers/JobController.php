<?php

namespace App\Http\Controllers;

use App\Models\Job;

use App\Jobs\IGDBFetchAllGamesJob;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JobController extends Controller
{

    public function index()
    {
        return Job::all();
    }

    public function executeJob($job)
    {
        try {
            $jobClass = Job::find($job)->class;
            dispatch(new $jobClass);
            return Job::all();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
}
