<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class GamesFeaturedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment('local')) {
            
            DB::table('games_featured')->insert([

                [
                    'id_igdb_game'  => 148241,
                    'featured'      => true,
                ],
                [
                    'id_igdb_game'  => 242408,
                    'featured'      => true,
                ],
                [
                    'id_igdb_game'  => 119177,
                    'featured'      => true,
                ],
                [
                    'id_igdb_game'  => 95340,
                    'featured'      => true,
                ],
                [
                    'id_igdb_game'  => 103302,
                    'featured'      => true,
                ],
                [
                    'id_igdb_game'  => 118871,
                    'featured'      => true,
                ],
                [
                    'id_igdb_game'  => 116667,
                    'featured'      => true,
                ],
                [
                    'id_igdb_game'  => 114285,
                    'featured'      => true,
                ],
                [
                    'id_igdb_game'  => 107218,
                    'featured'      => true,
                ],
                [
                    'id_igdb_game'  => 112754,
                    'featured'      => true,
                ],
                [
                    'id_igdb_game'  => 36346,
                    'featured'      => true,
                ]

            ]);
        }
    }
}
