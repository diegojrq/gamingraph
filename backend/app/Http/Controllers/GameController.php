<?php

namespace App\Http\Controllers;

use App\Models\IGDBGame;

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
    
            $game = $gameResponse->json()[0];
            
        } catch (\Throwable $th) {
            \Log::error($th);
            throw $th;
        }

        return $game;
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
