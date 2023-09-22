<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SteamApp extends Model
{
    use HasFactory;

    protected $table = 'steam_apps';

    protected $primaryKey = 'appid';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_modified',
        'price_change_number',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'name'                  => 'string',
        'last_modified'         => 'integer',
        'price_change_number'   => 'integer',
    ];

    public function details()
    {
        return $this->hasOne(SteamAppDetails::class);
    }
}
