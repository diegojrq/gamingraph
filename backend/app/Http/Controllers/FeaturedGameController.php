<?php

namespace App\Http\Controllers;

use App\Http\Controllers\IGDBGameController;

use App\Models\FeaturedGame;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class FeaturedGameController extends Controller
{
    public function getRandom()
    {
        return FeaturedGame::inRandomOrder()->first();
    }

}
