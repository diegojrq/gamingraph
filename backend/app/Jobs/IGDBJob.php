<?php

namespace App\Jobs;

use App\Models\IGDBGame;

use Illuminate\Support\Facades\Http;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class IGDBJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->fetchIGDBApps();
    }
    
    function fetchIGDBApps() {
        try {            
    
            // isso é problema pro frontend
            IGDBGame::truncate();
            
            $bearerToken = Http::post('https://id.twitch.tv/oauth2/token', [
                'client_id'         => 'w7byces6yyoi42i67jkyg5tds1n1s7',
                'client_secret'     => 'ftzvjaak1k6dkwz4436gc7y150o1aj',
                'grant_type'        => 'client_credentials',
            ])['access_token'];

            $offset = 0;

            do {

                $gamesResponse = Http::withBody('fields
                    id,
                    aggregated_rating,
                    aggregated_rating_count,
                    category,
                    checksum,
                    cover,
                    created_at,
                    first_release_date,
                    follows,
                    hypes,
                    name,
                    parent_game,
                    rating,
                    rating_count,
                    slug,
                    status,
                    storyline,
                    summary,
                    total_rating,
                    total_rating_count,
                    updated_at,
                    url,
                    version_parent,
                    version_title;
                    
                    limit 500; offset ' . $offset . ';')
                    ->withHeaders([
                        'Client-ID'         => 'w7byces6yyoi42i67jkyg5tds1n1s7',
                        'Authorization'     => 'Bearer ' . $bearerToken,
                    ])
                ->post('https://api.igdb.com/v4/games');

                $xCount = $gamesResponse->headers()['X-Count'][0];
    
                /* creates únicos para cada registro | demora demais */

                $jsonDecoded = json_decode((string) $gamesResponse->getBody(), true);

                foreach ($jsonDecoded as $key => $value) {

                    IGDBGame::create([
                        'id'                            => $value['id'],
                        'aggregated_rating'             => $value['aggregated_rating'] ?? null,
                        'aggregated_rating_count'       => $value['aggregated_rating_count'] ?? null,
                        'category'                      => $value['category'] ?? null,
                        'checksum'                      => $value['checksum'] ?? null,
                        'cover'                         => $value['cover'] ?? null,
                        'created_at'                    => $value['created_at'] ?? null,
                        'first_release_date'            => $value['first_release_date'] ?? null,
                        'follows'                       => $value['follows'] ?? null,
                        'hypes'                         => $value['hypes'] ?? null,
                        'name'                          => $value['name'] ?? null,
                        'parent_game'                   => $value['parent_game'] ?? null,
                        'rating'                        => $value['rating'] ?? null,
                        'rating_count'                  => $value['rating_count'] ?? null,
                        'slug'                          => $value['slug'] ?? null,
                        'status'                        => $value['status'] ?? null,
                        'storyline'                     => $value['storyline'] ?? null,
                        'summary'                       => $value['summary'] ?? null,
                        'total_rating'                  => $value['total_rating'] ?? null,
                        'total_rating_count'            => $value['total_rating_count'] ?? null,
                        'updated_at'                    => $value['updated_at'] ?? null,
                        'url'                           => $value['url'] ?? null,
                        'version_parent'                => $value['version_parent'] ?? null,
                        'version_title'                 => $value['version_title'] ?? null,               
                    ]);                            
                }
                //*/                

                $offset += 500;

            } while ($offset <= $xCount);
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
}
