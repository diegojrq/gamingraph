<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class ParametersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment('local')) {
            
            DB::table('parameters')->insert([

                [
                    'name'	        => 'time_to_update_igdb_game',
                    'description'   => 'Time to update IGDB games in seconds',
                    'value'         => '1',
                    'created_at'    => now(),
                    'updated_at'    => now()
                ]                                
            ]);
        }
    }
}
