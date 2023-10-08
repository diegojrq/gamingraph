<?php

namespace App\Http\Controllers;

use App\Jobs\IGDBCreateOrUdpateGameJob;

use App\Models\Parameters;
use App\Models\IGDBGame;
use App\Models\IGDBGameCover;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IGDBGameController extends Controller
{
    protected $gameId;

    public function __construct($gameId) {
        $this->gameId = $gameId;
    }

    public function getIGDBGame() {

        try {

            $game = IGDBGame::find($this->gameId);

            // if the game is already in the local database
            if ($game) {

                $game
                    ->load('cover')
                    ->load('involvedCompanies')
                    ->load('involvedCompanies.company');
    
                $timeToUpdateIGDBGame = Parameters::where('name', 'time_to_update_igdb_game')->firstOrFail()->value;
    
                // check if the game was updated recently
                // if not, dispatch a job to update it asynchronously (queue)
                if (time() - $game->updated_locally_at->timestamp > $timeToUpdateIGDBGame) {                    
                    dispatch((new IGDBCreateOrUdpateGameJob($game)));
                }
    
            } else {
    
                // if the game is not in the database, get it from IGDB and store it
                $clientID       = 'hrnc6jbxh7wit61oupsz4sj1jrw2f1';
                $clientSecret   = 'v1zbtu3eaj31xush9vpu63ha7wuvmg';
    
                $bearerToken = Http::post('https://id.twitch.tv/oauth2/token', [
                    'client_id'         => $clientID,
                    'client_secret'     => $clientSecret,
                    'grant_type'        => 'client_credentials',
                ])['access_token'];
    
                $game = Http::withBody(
                        'fields *,
                        cover.*,
                        involved_companies.*,
                        involved_companies.company.*;
                        limit 1;
                        where id = ' . $this->gameId . ';'
                    )
                    ->withHeaders([
                        'Client-ID'         => $clientID,
                        'Authorization'     => 'Bearer ' . $bearerToken,
                    ])
                    ->post('https://api.igdb.com/v4/games')
                ->json()[0];
    
                // create game via job                
                dispatch((new IGDBCreateOrUdpateGameJob($game)));    
            }
    
            return $game;
            
        } catch (\Throwable $th) {
            \Log::error($th);
            throw $th;
        }

    }    
}
