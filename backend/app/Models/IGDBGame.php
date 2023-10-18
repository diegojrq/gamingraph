<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Http;

class IGDBGame extends Model
{
    use HasFactory;

    protected $table = 'igdb_games';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'aggregated_rating',
        'aggregated_rating_count',
        'category',
        'checksum',
        'cover',
        'created_at',
        'first_release_date',
        'follows',
        'hypes',
        'name',
        'parent_game',
        'rating',
        'rating_count',
        'slug',
        'status',
        'storyline',
        'summary',
        'total_rating',
        'total_rating_count',
        'updated_at',
        'url',
        'version_parent',        
        'version_title',
        'created_locally_at',
        'updated_locally_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id'                        => 'integer',
        'aggregated_rating'         => 'double',
        'aggregated_rating_count'   => 'integer',
        'category'                  => 'integer',
        'checksum'                  => 'string',
        'cover'                     => 'integer',
        'created_at'                => 'datetime',
        'first_release_date'        => 'datetime',
        'follows'                   => 'integer',
        'hypes'                     => 'integer',
        'name'                      => 'string',
        'parent_game'               => 'integer',
        'rating'                    => 'double',
        'rating_count'              => 'integer',
        'slug'                      => 'string',
        'status'                    => 'integer',
        'storyline'                 => 'string',
        'summary'                   => 'string',
        'total_rating'              => 'double',
        'total_rating_count'        => 'integer',
        'updated_at'                => 'datetime',
        'url'                       => 'string',
        'version_parent'            => 'integer',
        'version_title'             => 'string',
        'created_locally_at'        => 'datetime',
        'updated_locally_at'        => 'datetime'
    ];

    public function cover()
    {
        return $this->hasOne(IGDBGameCover::class, 'id', 'cover');
    }

    public function involvedCompanies()
    {
        return $this->hasMany(IGDBInvolvedCompany::class, 'game', 'id');
    }

    public function category()
    {
        return $this->hasOne(IGDBGameCategoryEnum::class, 'id', 'category');
    }

    
}
