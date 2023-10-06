<?php

namespace App\Jobs;

use App\Models\IGDBGame;
use App\Models\IGDBGameCover;
use App\Models\JobTracker;

use Illuminate\Support\Facades\Http;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class IGDBUpdateGameJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $game;

    /**
     * Create a new job instance.
     */
    public function __construct(IGDBGame $game)
    {
        $this->game = $game;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->updateIGDBGame($this->game->id);
    }

    function updateIGDBGame($gameID) {
        
        // log the job
        $job = JobTracker::init('updateIGDBGame');

        try {

            $clientID       = 'hrnc6jbxh7wit61oupsz4sj1jrw2f1';
            $clientSecret   = 'v1zbtu3eaj31xush9vpu63ha7wuvmg';
            
            $bearerToken = Http::post('https://id.twitch.tv/oauth2/token', [
                'client_id'         => $clientID,
                'client_secret'     => $clientSecret,
                'grant_type'        => 'client_credentials',
            ])['access_token'];
            
            $gameResponse = Http::withBody('fields *, cover.*; where id = ' . $gameID .';')
                ->withHeaders([
                    'Client-ID'         => $clientID,
                    'Authorization'     => 'Bearer ' . $bearerToken,
                ])
            ->post('https://api.igdb.com/v4/games');

            $updateJson = $gameResponse->json()[0];
            
            $updateJson['updated_locally_at'] = time();            

            // the cover is a nested object, so we need to create it separately
            $coverJson = $updateJson['cover'];
            $updateJson['cover'] = $coverJson['id'];

            $game = IGDBGame::find($gameID);

            DB::beginTransaction();

                $game->cover()->update($coverJson);
                $game->update($updateJson);

            DB::commit();

            JobTracker::finish($job, true);

        } catch (\Throwable $th) {            
            JobTracker::finish($job, false, $th->getMessage());
            \Log::error($th);
        }
    }
    
}
