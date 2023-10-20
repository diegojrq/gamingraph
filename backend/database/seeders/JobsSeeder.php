<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment('local')) {
            
            DB::table('jobs')->insert([

                [
                    'name'	        => 'IGDBFetchAllGamesJob',
                    'description'   => 'Job that fetches all games from IGDB (all data)',
                    'class'         => 'App\Jobs\IGDBFetchAllGamesJob',
                    'source'        => 'IGDB',
                    'created_at'    => now(),
                    'updated_at'    => now()
                ],
                [
                    'name'	        => 'IGDBUdpateGameJob',
                    'description'   => 'Job that updates a game from IGDB',
                    'class'         => 'App\Jobs\IGDBCreateOrUdpateGameJob',
                    'source'        => 'IGDB',
                    'created_at'    => now(),
                    'updated_at'    => now()
                ],
                [
                    'name'	        => 'IGDBCreateGameJob',
                    'description'   => 'Job that creates a game from IGDB',
                    'class'         => 'App\Jobs\IGDBCreateOrUdpateGameJob',
                    'source'        => 'IGDB',
                    'created_at'    => now(),
                    'updated_at'    => now()
                ],
                [
                    'name'	        => 'IGDBFetchGenresJob',
                    'description'   => 'Job that fetchs all genres from IGDB',
                    'class'         => 'App\Jobs\IGDBFetchGenresJob',
                    'source'        => 'IGDB',
                    'created_at'    => now(),
                    'updated_at'    => now()
                ],
                [
                    'name'	        => 'IGDBFetchGameModesJob',
                    'description'   => 'Job that fetchs all game modes from IGDB',
                    'class'         => 'App\Jobs\IGDBFetchGameModesJob',
                    'source'        => 'IGDB',
                    'created_at'    => now(),
                    'updated_at'    => now()
                ],
                [
                    'name'	        => 'IGDBFetchPlayerPerspectivesJob',
                    'description'   => 'Job that fetchs all player perspectives from IGDB',
                    'class'         => 'App\Jobs\IGDBFetchPlayerPerspectivesJob',
                    'source'        => 'IGDB',
                    'created_at'    => now(),
                    'updated_at'    => now()
                ],
                [
                    'name'	        => 'IGDBFetchThemesJob',
                    'description'   => 'Job that fetchs all themes from IGDB',
                    'class'         => 'App\Jobs\IGDBFetchThemesJob',
                    'source'        => 'IGDB',
                    'created_at'    => now(),
                    'updated_at'    => now()
                ],
                
            ]);
        }
    }
}
