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
        $id = $request->route('game');

        $bearerToken = Http::post('https://id.twitch.tv/oauth2/token', [
            'client_id'         => 'w7byces6yyoi42i67jkyg5tds1n1s7',
            'client_secret'     => 'ftzvjaak1k6dkwz4436gc7y150o1aj',
            'grant_type'        => 'client_credentials',
        ])['access_token'];

        $gameResponse = Http::withBody('fields *; limit 1; where id = ' . $id . ';')
            ->withHeaders([
                'Client-ID'         => 'w7byces6yyoi42i67jkyg5tds1n1s7',
                'Authorization'     => 'Bearer ' . $bearerToken,
            ])
        ->post('https://api.igdb.com/v4/games');

        $game = $gameResponse->json()[0];

        return $game;
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
