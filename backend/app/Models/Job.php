<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Http;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'class',
        'source',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id'             => 'integer',
        'name'           => 'string',
        'description'    => 'string',
        'class'          => 'string',
        'source'         => 'string',
    ];
}
