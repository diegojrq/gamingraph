<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class IGDBGameCategoriesEnumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment('local')) {
            
            DB::table('igdb_game_categories_enum')->insert([

                [
                    'id'    => 0,
                    'value' => 'main_game'
                ],
                [
                    'id'    => 1,
                    'value' => 'dlc_addon'
                ],
                [
                    'id'    => 2,
                    'value' => 'expansion'
                ],
                [
                    'id'    => 3,
                    'value' => 'bundle'
                ],
                [
                    'id'    => 4,
                    'value' => 'standalone_expansion'
                ],
                [
                    'id'    => 5,
                    'value' => 'mod'
                ],
                [
                    'id'    => 6,
                    'value' => 'episode'
                ],
                [
                    'id'    => 7,
                    'value' => 'season'
                ],
                [
                    'id'    => 8,
                    'value' => 'remake'
                ],
                [
                    'id'    => 9,
                    'value' => 'remaster'
                ],
                [
                    'id'    => 10,
                    'value' => 'expanded_game'
                ],
                [
                    'id'    => 11,
                    'value' => 'port'
                ],
                [
                    'id'    => 12,
                    'value' => 'fork'
                ],
                [
                    'id'    => 13,
                    'value' => 'full_game'
                ],
                [
                    'id'    => 14,
                    'value' => 'update'
                ],
                
            ]);
        }
    }
}
