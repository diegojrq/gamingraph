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
                    'name'	        => 'IGDBFetchAllGamesIDJob',
                    'description'   => 'Job that fetches all games from IGDB (id only)',
                    'class'         => 'App\Jobs\IGDBFetchAllGamesIDJob',
                    'source'        => 'IGDB',
                    'created_at'    => now(),
                    'updated_at'    => now()
                ],
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
                ]
            ]);
        }
    }
}
