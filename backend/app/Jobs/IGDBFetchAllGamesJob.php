<?php

namespace App\Jobs;

use App\Models\IGDBGameStage;
use App\Models\JobTracker;

use App\Jobs\IGDBCreateOrUdpateGameJob;

use Illuminate\Support\Facades\Http;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class IGDBFetchAllGamesJob implements ShouldQueue
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
        $this->fetchAllIGDBGames();
    }
    
    function fetchAllIGDBGames() {
        
        try {    

            // log the job
            $job = JobTracker::init('IGDBFetchAllGamesJob');
            
            // this must be fixed
            IGDBGameStage::truncate();

            $clientID       = 'hrnc6jbxh7wit61oupsz4sj1jrw2f1';
            $clientSecret   = 'v1zbtu3eaj31xush9vpu63ha7wuvmg';
            
            $bearerToken = Http::post('https://id.twitch.tv/oauth2/token', [
                'client_id'         => $clientID,
                'client_secret'     => $clientSecret,
                'grant_type'        => 'client_credentials',
            ])['access_token'];

            $offset = 0;

            // fetch 500 games at a time, ultil the X-Count header is reached
            do {

                $gamesResponse = Http::withBody('
                        fields *,
                        cover.*,
                        involved_companies.*,
                        involved_companies.company.*;
                        limit 500; offset ' . $offset . ';'
                    )
                    ->withHeaders([
                        'Client-ID'         => $clientID,
                        'Authorization'     => 'Bearer ' . $bearerToken,
                    ])
                ->post('https://api.igdb.com/v4/games');

                $xCount = $gamesResponse->headers()['X-Count'][0];

                $games = $gamesResponse->json();
                
                foreach ($games as $key => $game) {
                    // create or update single game via job                
                    dispatch((new IGDBCreateOrUdpateGameJob($game)));
                }
                
                $offset += 500;

            } while ($offset <= $xCount);

            JobTracker::finish($job, true);
            
        } catch (\Throwable $th) {
            JobTracker::finish($job, false, $th->getMessage());
            \Log::error($th);
            throw $th;
        }
    }
}
