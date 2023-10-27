<?php

namespace App\Http\Controllers;

use App\Http\Controllers\IGDBGameController;

use App\Models\Parameters;
use App\Models\IGDBGame;
use App\Models\IGDBGameCover;
use App\Models\IGDBCompany;
use App\Models\IGDBInvolvedCompany;

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

            return (new IGDBGameController($request->route('game')))->getIGDBGame();

        } catch (\Throwable $th) {
            \Log::error($th);
            throw $th;
        }

    }

    public function getCount()
    {
        return IGDBGame::count();
    }

    public function getBestRated()
    {
        return IGDBGame::where('total_rating_count', '>', '5')
            ->where('total_rating', '>', '90')->get()->sortByDesc('total_rating_count')->take(5);
    }

    public function getGenreCount()
    {
        return DB::table('igdb_genres')
            ->join('igdb_games_genres', 'igdb_genres.id', '=', 'igdb_games_genres.genre')
            ->select('igdb_genres.id', 'igdb_genres.name', DB::raw("count(igdb_genres.id) as count"))
            ->groupBy('igdb_genres.id', 'igdb_genres.name')
            ->orderBy('count', 'desc') 
        ->get();
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
