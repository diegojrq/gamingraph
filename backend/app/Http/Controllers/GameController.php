<?php

namespace App\Http\Controllers;

use App\Http\Controllers\IGDBGameController;

use App\Models\Parameters;
use App\Models\IGDBGame;
use App\Models\IGDBGameCover;
use App\Models\IGDBGameStage;
use App\Models\IGDBCompany;
use App\Models\IGDBInvolvedCompany;

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

            return (new IGDBGameController($request->route('game')))->getIGDBGame();

        } catch (\Throwable $th) {
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
