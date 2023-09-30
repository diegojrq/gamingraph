<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SteamAppPrice extends Model
{
    use HasFactory;

    protected $table = 'steam_apps_price_history';

    protected $primaryKey = 'steam_appid';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'steam_appid',
        'currency',
        'initial',
        'final',
        'discount_percent',
        'initial_formatted',
        'final_formatted',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'steam_appid'           => 'integer',
        'currency'              => 'string',
        'initial'               => 'integer',
        'final'                 => 'integer',
        'discount_percent'      => 'double',
        'initial_formatted'     => 'string',
        'final_formatted'       => 'string',        
    ];
}
