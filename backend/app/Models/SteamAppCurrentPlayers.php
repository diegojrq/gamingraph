<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SteamAppCurrentPlayers extends Model
{
    use HasFactory;

    protected $table = 'steam_apps_current_players_history';

    protected $primaryKey = 'steam_appid';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'steam_appid',
        'player_count',
        'result',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'steam_appid'           => 'integer',
        'player_count'          => 'integer',
        'result'                => 'integer',
    ];
}
