<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IGDBCompany extends Model
{
    use HasFactory;

    protected $table = 'igdb_companies';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'change_date_category',
        'checksum',
        'created_at',
        'name',
        'slug',
        'start_date_category',
        'updated_at',
        'url',
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
        'change_date_category'  => 'integer',
        'checksum'              => 'string',
        'created_at'            => 'datetime',
        'name'                  => 'string',
        'slug'                  => 'string',
        'start_date_category'   => 'integer',
        'updated_at'            => 'datetime',
        'url'                   => 'string',
        'created_locally_at'    => 'datetime',
        'updated_locally_at'    => 'datetime'        
    ];
}
