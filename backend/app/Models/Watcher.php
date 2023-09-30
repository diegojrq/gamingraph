<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watcher extends Model
{
    use HasFactory;

    protected $table = 'steam_watcher';

    protected $primaryKey = 'steam_appid';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'steam_appid',
        'detail',
        'price',
        'current_players'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'steam_appid'           => 'integer',
        'detail'                => 'boolean',
        'price'                 => 'boolean',
        'current_players'       => 'boolean'
    ];
}
