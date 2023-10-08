<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTracker extends Model
{
    use HasFactory;

    protected $table = 'job_tracker';

    protected $primaryKey = 'id';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['job_name', 'job_status', 'job_start', 'job_outcome', 'job_end'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'job_name'      => 'string',
        'job_status'    => 'string',
        'job_outcome'   => 'string',
        'job_start'     => 'datetime',
        'job_end'       => 'datetime',
    ];

    public static function init($jobName)
    {
        return JobTracker::create([
            'job_name'      => $jobName,
            'job_status'    => 'running',
            'job_start'     => now(),
        ]);
    }

    public static function finish($job, $outcome, string $message = null)
    {
        $job->update([
            'job_status'    => $outcome ? 'success' : 'failed',
            'job_outcome'   => $outcome ? 'success' : $message,
            'job_end'       => now(),
        ]);

        return $job;
    }
}
