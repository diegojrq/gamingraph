<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SteamAppDetails extends Model
{
    use HasFactory;

    protected $table = 'steam_apps_details';

    protected $primaryKey = 'steam_appid';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'steam_appid',
        'type',        
        'name',
        'required_age',
        'is_free',
        'detailed_description',
        'short_description',
        'supported_languages',
        'header_image',
        'capsule_image',
        'capsule_imagev5',
        'website',
        'background',
        'background_raw',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'steam_appid'           => 'integer',
        'type'                  => 'string',
        'name'                  => 'string',
        'required_age'          => 'string',
        'is_free'               => 'boolean',
        'detailed_description'  => 'string',
        'short_description'     => 'string',
        'supported_languages'   => 'string',
        'header_image'          => 'string',
        'capsule_image'         => 'string',
        'capsule_imagev5'       => 'string',
        'website'               => 'string',
        'background'            => 'string',
        'background_raw'        => 'string',
    ];
}
