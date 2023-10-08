<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IGDBInvolvedCompany extends Model
{
    use HasFactory;

    protected $table = 'igdb_involved_companies';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'company',
        'developer',
        'game',
        'porting',
        'publisher',
        'supporting',
        'created_at',
        'updated_at',
        'created_locally_at',
        'updated_locally_at'        
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id'                    => 'integer',
        'company'               => 'integer',
        'developer'             => 'boolean',
        'game'                  => 'integer',
        'porting'               => 'boolean',
        'publisher'             => 'boolean',
        'supporting'            => 'boolean',
        'created_at'            => 'datetime',
        'updated_at'            => 'datetime',
        'created_locally_at'    => 'datetime',
        'updated_locally_at'    => 'datetime'
    ];

    public function company()
    {
        return $this->hasOne(IGDBCompany::class, 'id', 'company');
    }
}
