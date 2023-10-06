<?php

namespace App\Http\Controllers;

use App\Jobs\IGDBUpdateGameJob;

use App\Models\Parameters;
use App\Models\IGDBGame;
use App\Models\IGDBGameCover;
use App\Models\IGDBGameStage;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

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

            $game = IGDBGame::find($id);

            // if the game is already in the local database
            if ($game) {

                $game->load('cover');

                $timeToUpdateIGDBGame = Parameters::where('name', 'time_to_update_igdb_game')->firstOrFail()->value;

                // check if the game was updated recently
                // if not, dispatch a job to update it asynchronously (queue)
                if (time() - $game->updated_locally_at->timestamp > $timeToUpdateIGDBGame) {                    
                    dispatch((new IGDBUpdateGameJob($game)));
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
        
                $gameResponse = Http::withBody('fields *, cover.*; limit 1; where id = ' . $id . ';')
                    ->withHeaders([
                        'Client-ID'         => $clientID,
                        'Authorization'     => 'Bearer ' . $bearerToken,
                    ])
                ->post('https://api.igdb.com/v4/games');

                $createJson = $gameResponse->json()[0];
                
                // add the local timestamps
                $time = time();
                $createJson['created_locally_at'] = $time;
                $createJson['updated_locally_at'] = $time;

                // the cover is a nested object, so we need to create it separately
                $coverJson = $createJson['cover'];
                $createJson['cover'] = $coverJson['id'];

                DB::beginTransaction();

                    $cover = IGDBGameCover::create($coverJson);
                    $game = IGDBGame::create($createJson);

                DB::commit();

                $game->load('cover');
            }

            return $game;
            
        } catch (\Throwable $th) {
            DB::rollBack();
            \Log::error($th);
            throw $th;
        }

    }

    public function getCount()
    {
        return IGDBGameStage::count();
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
