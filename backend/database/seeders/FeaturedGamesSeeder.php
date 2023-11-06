<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class FeaturedGamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment('local')) {
            
            DB::table('featured_games')->insert([

                [
                    'game'  => 148241,
                    'featured'      => true,
                ],
                [
                    'game'  => 1942,
                    'featured'      => true,
                ],
                [
                    'game'  => 72,
                    'featured'      => true,
                ],
                [
                    'game'  => 472,
                    'featured'      => true,
                ],
                [
                    'game'  => 732,
                    'featured'      => true,
                ],
                [
                    'game'  => 1009,
                    'featured'      => true,
                ],
                [
                    'game'  => 233,
                    'featured'      => true,
                ],
                [
                    'game'  => 733,
                    'featured'      => true,
                ],
                [
                    'game'  => 74,
                    'featured'      => true,
                ],
                [
                    'game'  => 19560,
                    'featured'      => true,                    
                ],
                [
                    'game'  => 7346,
                    'featured'      => true,
                ],
                [
                    'game'  => 25076,
                    'featured'      => true,
                ],
                [
                    'game'  => 7331,
                    'featured'      => true,
                ],
                [
                    'game'  => 434,
                    'featured'      => true,
                ],
                [
                    'game'  => 565,
                    'featured'      => true,
                ],
                [
                    'game'  => 1029,
                    'featured'      => true,
                ],
                [
                    'game'  => 1070,
                    'featured'      => true,
                ],
                [
                    'game'  => 12517,
                    'featured'      => true,
                ],
                [
                    'game'  => 1026,
                    'featured'      => true,
                ],
                [
                    'game'  => 26758,
                    'featured'      => true,
                ],
                [
                    'game'  => 7334,
                    'featured'      => true,
                ]
            ]);
        }
    }
}
