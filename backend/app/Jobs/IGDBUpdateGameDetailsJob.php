<?php

namespace App\Jobs;

use App\Models\IGDBGameDetails;
use App\Models\JobTracker;

use Illuminate\Support\Facades\Http;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class IGDBUpdateGameDetailsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $game;

    /**
     * Create a new job instance.
     */
    public function __construct(IGDBGameDetails $game)
    {
        $this->game = $game;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->updateIGDBGameDetails($this->game->id);
    }

    function updateIGDBGameDetails($gameID) {
        
        $job = JobTracker::init('updateIGDBGameDetails');

        try {

            $clientID       = 'hrnc6jbxh7wit61oupsz4sj1jrw2f1';
            $clientSecret   = 'v1zbtu3eaj31xush9vpu63ha7wuvmg';
            
            $bearerToken = Http::post('https://id.twitch.tv/oauth2/token', [
                'client_id'         => $clientID,
                'client_secret'     => $clientSecret,
                'grant_type'        => 'client_credentials',
            ])['access_token'];
            
            $gameResponse = Http::withBody('fields *; where id = ' . $gameID .';')
                ->withHeaders([
                    'Client-ID'         => $clientID,
                    'Authorization'     => 'Bearer ' . $bearerToken,
                ])
            ->post('https://api.igdb.com/v4/games');

            $updateJson = $gameResponse->json()[0];
            date_default_timezone_set('America/Maceio');            
            $updateJson['updated_locally_at'] = time();            

            IGDBGameDetails::find($gameID)->update($updateJson);

            JobTracker::finish($job, true);

        } catch (\Throwable $th) {            
            JobTracker::finish($job, false, $th->getMessage());
            \Log::error($th);
        }
    }
    
}
