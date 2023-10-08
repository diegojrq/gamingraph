<?php

namespace App\Http\Controllers;

use App\Jobs\IGDBCreateOrUdpateGameJob;

use App\Models\IGDBGameCover;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IGDBCoverController extends Controller
{

    protected $cover;

    public function __construct($cover) {
        $this->cover = $cover;
    }

    public function createOrUpdateCover() {

        try {

            return IGDBGameCover::updateOrCreate(
                ['id' => $this->cover['id']],
                $this->cover
            );

        } catch (\Throwable $th) {
            \Log::error($th);
            throw $th;
        }

    }
        
}
