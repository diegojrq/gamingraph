<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IGDBGame extends Model
{
    use HasFactory;

    protected $table = 'igdb_games';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'integer'];

    /*
    public function details()
    {
        return $this->hasOne(SteamAppDetails::class);
    }
    */
}
