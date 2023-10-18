<?php

namespace App\Jobs;

use App\Models\JobTracker;
use App\Models\IGDBPlayerPerspective;


use Illuminate\Support\Facades\Http;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class IGDBFetchPlayerPerspectivesJob implements ShouldQueue
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
        $this->PlayerPerspectives();
    }
    
    function PlayerPerspectives() {
        
        try {    

            // log the job
            $job = JobTracker::init('IGDBFetchPlayerPerspectivesJob');
            
            $clientID       = 'hrnc6jbxh7wit61oupsz4sj1jrw2f1';
            $clientSecret   = 'v1zbtu3eaj31xush9vpu63ha7wuvmg';
            
            $bearerToken = Http::post('https://id.twitch.tv/oauth2/token', [
                'client_id'         => $clientID,
                'client_secret'     => $clientSecret,
                'grant_type'        => 'client_credentials',
            ])['access_token'];

            $offset = 0;

            // fetch 500 genres at a time, ultil the X-Count header is reached
            do {

                $gamesResponse = Http::withBody('
                        fields *;
                        limit 500;
                        offset ' . $offset . ';'
                    )
                    ->withHeaders([
                        'Client-ID'         => $clientID,
                        'Authorization'     => 'Bearer ' . $bearerToken,
                    ])
                ->post('https://api.igdb.com/v4/player_perspectives');

                $xCount = $gamesResponse->headers()['X-Count'][0];

                foreach ($gamesResponse->json() as $genre) {
                    IGDBPlayerPerspective::updateOrCreate(
                        ['id' => $genre['id']],
                        $genre
                    );    
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
