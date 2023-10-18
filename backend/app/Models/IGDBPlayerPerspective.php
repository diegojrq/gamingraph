<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IGDBPlayerPerspective extends Model
{
    use HasFactory;

    protected $table = 'igdb_player_perspectives';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'created_at',
        'updated_at',
        'name',
        'slug',
        'url',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id'                    => 'integer',
        'created_at'            => 'datetime',
        'updated_at'            => 'datetime',
        'name'                  => 'string',
        'slug'                  => 'string',
        'url'                   => 'string',                
    ];
}
