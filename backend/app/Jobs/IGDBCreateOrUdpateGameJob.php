<?php

namespace App\Jobs;

use App\Models\IGDBGame;
use App\Models\IGDBGameCover;
use App\Models\JobTracker;

use App\Http\Controllers\IGDBCoverController;
use App\Http\Controllers\IGDBInvolvedCompaniesController;

use Illuminate\Support\Facades\Http;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class IGDBCreateOrUdpateGameJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $game;

    /**
     * Create a new job instance.
     */
    public function __construct($game)
    {
        $this->game = $game;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ($this->game instanceof IGDBGame) {
            $this->updateIGDBGame($this->game->id);
        } else {
            $this->createIGDBGame($this->game);
        }
    }

    function createIGDBGame($game) {
        
        // log the job
        $job = JobTracker::init('IGDBCreateGameJob');

        try {

            // fixed timestamps
            $time = time();

            // the cover is a nested object, so we need to create it separately
            if (array_key_exists('cover', $game)) {

                $coverJson = $game['cover'];
                $game['cover'] = $coverJson['id'];
                
                $cover = (new IGDBCoverController($coverJson))->createOrUpdateCover();
            }
            
            $game['created_locally_at'] = $time;
            $game['updated_locally_at'] = $time;

            IGDBGame::create($game);

            if (array_key_exists('involved_companies', $game)) {
                $involvedCompaniesArray = $game['involved_companies'];
                $involvedCompanies = (new IGDBInvolvedCompaniesController($involvedCompaniesArray))->createOrUpdateInvolvedCompanies();
            }

            JobTracker::finish($job, true);

        } catch (\Throwable $th) {            
            JobTracker::finish($job, false, $th->getMessage());
            \Log::error($th);
        }
    }

    function updateIGDBGame($gameID) {
        
        // log the job
        $job = JobTracker::init('IGDBUdpateGameJob');

        try {

            $clientID       = 'hrnc6jbxh7wit61oupsz4sj1jrw2f1';
            $clientSecret   = 'v1zbtu3eaj31xush9vpu63ha7wuvmg';
            
            $bearerToken = Http::post('https://id.twitch.tv/oauth2/token', [
                'client_id'         => $clientID,
                'client_secret'     => $clientSecret,
                'grant_type'        => 'client_credentials',
            ])['access_token'];
            
            $gameResponse = Http::withBody('
                    fields *,
                    cover.*,
                    involved_companies.*,
                    involved_companies.company.*;
                    where id = ' . $gameID .';'
                )
                ->withHeaders([
                    'Client-ID'         => $clientID,
                    'Authorization'     => 'Bearer ' . $bearerToken,
                ])
            ->post('https://api.igdb.com/v4/games');

            $updateJson = $gameResponse->json()[0];
            
            $updateJson['updated_locally_at'] = time();            

            $game = IGDBGame::find($gameID);

            // the cover is a nested object, so we need to create it separately
            if (array_key_exists('cover', $updateJson)) {
                $coverJson = $updateJson['cover'];
                $updateJson['cover'] = $coverJson['id'];
                //$game->cover()->update($coverJson);
                $cover = (new IGDBCoverController($coverJson))->createOrUpdateCover();
            }

            if (array_key_exists('involved_companies', $updateJson)) {
                $involvedCompaniesArray = $updateJson['involved_companies'];
                $involvedCompanies = (new IGDBInvolvedCompaniesController($involvedCompaniesArray))->createOrUpdateInvolvedCompanies();
            }

            $game->update($updateJson);

            JobTracker::finish($job, true);

        } catch (\Throwable $th) {            
            JobTracker::finish($job, false, $th->getMessage());
            \Log::error($th);
        }
    }
    
}
