<?php

namespace App\Jobs;

use App\Models\SteamApp;
use App\Models\SteamAppDetails;

use Illuminate\Support\Facades\Http;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SteamProcess implements ShouldQueue
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
        $this->fetchSteamApps();
        $this->fetchSteamAppsDetails();
    }
    
    function fetchSteamApps() {
        try {
            
            $lastAppId = "";
            $key = "7C1DB6DDF7B335B9A8DF8348F3CDCE57";
            $haveMoreResults = false;

            SteamApp::truncate();
            
            do {
                $response = Http::get('https://api.steampowered.com/IStoreService/GetAppList/v1/', [
                    'key'           => $key,
                    'last_appid'    => $lastAppId,
                ]);
                
                SteamApp::insert($response['response']['apps']);
                
                if (array_key_exists('last_appid', $response['response'])) {
                    $lastAppId = $response['response']['last_appid'];
                } else {
                    $lastAppId = "";
                }
                
                if (array_key_exists('have_more_results', $response['response'])) {
                    if ($response['response']['have_more_results']) {
                        $haveMoreResults = true;
                    }
                } else {
                    $haveMoreResults = false;
                }
                
            } while ($haveMoreResults);
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function fetchSteamAppsDetails() {
        
        try {
            
            $apps = SteamApp::all()->take(10);

            foreach ($apps as $key => $app) {                
                $response = Http::get('http://store.steampowered.com/api/appdetails?appids=' . $app->appid . '&cc=BRA');
                $appDetails = $response[$app->appid]['data'];
                SteamAppDetails::create($appDetails);
            }
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
