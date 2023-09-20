<?php

namespace App\Jobs;

use App\Models\SteamApp;
use App\Models\SteamAppDetails;
use App\Models\SteamAppCurrentPlayers;
use App\Models\Watcher;

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
        $this->fetchSteamCurrentPlayers();
        //$this->fetchSteamApps();
        $this->fetchSteamAppsDetails();
    }
    
    function fetchSteamApps() {
        try {
            
            $lastAppId = "";
            $key = "7C1DB6DDF7B335B9A8DF8348F3CDCE57";
            $haveMoreResults = false;

            // isso é problema pro frontend
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
            
            // isso é problema pro frontend
            SteamAppDetails::truncate();

            $apps = Watcher::where('detail', true)->get();

            foreach ($apps as $key => $app) {                
                $response = Http::get('http://store.steampowered.com/api/appdetails?appids=' . $app->steam_appid . '&cc=BRA');
                $appDetails = $response[$app->steam_appid]['data'];
                SteamAppDetails::create($appDetails);
            }
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function fetchSteamCurrentPlayers() {
        
        try {
            
            $apps = Watcher::where('current_players', true)->get();

            foreach ($apps as $key => $app) {                
                $response = Http::get('https://api.steampowered.com/ISteamUserStats/GetNumberOfCurrentPlayers/v1/', [
                    'key'           => $key,
                    'appid'         => $app->steam_appid,
                ]);
                $currentPlayers = $response['response'];
                SteamAppCurrentPlayers::create($currentPlayers);
            }
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
