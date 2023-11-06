<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedGame extends Model
{
    use HasFactory;

    protected $table = 'featured_games';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'featured',
        'game',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id'                    => 'integer',
        'featured'              => 'boolean',
        'game'                  => 'integer',
    ];
}
