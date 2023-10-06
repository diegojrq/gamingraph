<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IGDBGameCover extends Model
{
    use HasFactory;

    protected $table = 'igdb_games_covers';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id', 'game', 'alpha_channel', 'animated', 'checksum', 'height', 'image_id', 'url', 'width'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id'            => 'integer',
        'game'          => 'integer',
        'alpha_channel' => 'boolean',
        'animated'      => 'boolean',
        'checksum'      => 'string',
        'height'        => 'integer',
        'image_id'      => 'string',
        'url'           => 'string',
        'width'         => 'integer'
    ];
}
