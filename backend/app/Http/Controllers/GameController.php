<?php

namespace App\Http\Controllers;

use App\Jobs\IGDBUpdateGameDetailsJob;

use App\Models\Parameters;
use App\Models\IGDBGame;
use App\Models\IGDBGameDetails;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    public function index()
    {
        $apps = SteamApp::all();
        return $apps;
    }

    public function show(Request $request)
    {
        try {
            $id = $request->route('game');

            $game = IGDBGameDetails::find($id);

            // if the game is already in the database
            if ($game) {

                $timeToUpdateIGDBGame = Parameters::where('name', 'time_to_update_igdb_game')->firstOrFail()->value;

                // check if the game was updated recently
                // if not, dispatch a job to update it asynchronously (queue)
                if (time() - $game->updated_locally_at->timestamp > $timeToUpdateIGDBGame) {                    
                    dispatch((new IGDBUpdateGameDetailsJob($game))->delay(Carbon::now()->addSeconds(5)));
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
        
                $gameResponse = Http::withBody('fields *; limit 1; where id = ' . $id . ';')
                    ->withHeaders([
                        'Client-ID'         => $clientID,
                        'Authorization'     => 'Bearer ' . $bearerToken,
                    ])
                ->post('https://api.igdb.com/v4/games');

                $createJson = $gameResponse->json()[0];
                
                $time = time();
                $createJson['created_locally_at'] = $time;
                $createJson['updated_locally_at'] = $time;
                $game = IGDBGameDetails::create($createJson);
            }

            return $game;
            
        } catch (\Throwable $th) {
            \Log::error($th);
            throw $th;
        }

    }

    public function getCount()
    {
        return IGDBGame::count();
    }

    public function store(Request $request)
    {
        return SteamApp::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $book = SteamApp::findOrFail($id);
        $book->update($request->all());

        return $book;
    }

    public function delete(Request $request, $id)
    {
        $book = SteamApp::findOrFail($id);
        $book->delete();

        return 204;
    }
}
