<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class IGDBAgeRatingContentDescriptionEnumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment('local')) {
            
            DB::table('igdb_age_rating_content_description_category_enum')->insert([

                [
                    'id'	=> 1,
                    'name'	=> 'ESRB_alcohol_reference'
                ],
                [
                    'id'	=> 2,
                    'name'	=> 'ESRB_animated_blood'
                ],
                [
                    'id'	=> 3,
                    'name'	=> 'ESRB_blood'
                ],
                [
                    'id'	=> 	4,
                    'name'	=> 'ESRB_blood_and_gore'
                ],
                [
                    'id'	=> 5,
                    'name'	=> 'ESRB_cartoon_violence'
                ],
                [
                    'id'	=> 6,
                    'name'	=> 'ESRB_comic_mischief'
                ],
                [
                    'id'	=> 7,
                    'name'	=> 'ESRB_crude_humor'
                ],
                [
                    'id'	=> 8,
                    'name'	=> 'ESRB_drug_reference'
                ],
                [
                    'id'	=> 9,
                    'name'	=> 'ESRB_fantasy_violence'
                ],
                [
                    'id'	=> 10,
                    'name'	=> 'ESRB_intense_violence'
                ],
                [
                    'id'	=> 11,
                    'name'	=> 'ESRB_language'
                ],
                [
                    'id'	=> 12,
                    'name'	=> 'ESRB_lyrics'
                ],
                [
                    'id'	=> 13,
                    'name'	=> 'ESRB_mature_humor'
                ],
                [
                    'id'	=> 14,
                    'name'	=> 'ESRB_nudity'
                ],
                [
                    'id'	=> 15,
                    'name'	=> 'ESRB_partial_nudity'
                ],
                [
                    'id'	=> 16,
                    'name'	=> 'ESRB_real_gambling'
                ],
                [
                    'id'	=> 17,
                    'name'	=> 'ESRB_sexual_content'
                ],
                [
                    'id'	=> 18,
                    'name'	=> 'ESRB_sexual_themes'
                ],
                [
                    'id'	=> 19,
                    'name'	=> 'ESRB_sexual_violence'
                ],
                [
                    'id'	=> 20,
                    'name'	=> 'ESRB_simulated_gambling'
                ],
                [
                    'id'	=> 21,
                    'name'	=> 'ESRB_strong_language'
                ],
                [
                    'id'	=> 22,
                    'name'	=> 'ESRB_strong_lyrics'
                ],
                [
                    'id'	=> 	23,
                    'name'	=> 'ESRB_strong_sexual_content'
                ],
                [
                    'id'	=> 24,
                    'name'	=> 'ESRB_suggestive_themes'
                ],
                [
                    'id'	=> 25,
                    'name'	=> 'ESRB_tobacco_reference'
                ],
                [
                    'id'	=>  26,
                    'name'	=> 'ESRB_use_of_alcohol'
                ],
                [
                    'id'	=> 27,
                    'name'	=> 'ESRB_use_of_drugs'
                ],
                [
                    'id'	=> 28,
                    'name'	=> 'ESRB_use_of_tobacco'
                ],
                [
                    'id'	=> 29,
                    'name'	=> 'ESRB_violence'
                ],
                [
                    'id'	=> 30,
                    'name'	=> 'ESRB_violent_references'
                ],
                [
                    'id'	=> 31,
                    'name'	=> 'ESRB_animated_violence'
                ],
                [
                    'id'	=> 32,
                    'name'	=> 'ESRB_mild_language'
                ],
                [
                    'id'	=> 33,
                    'name'	=> 'ESRB_mild_violence'
                ],
                [
                    'id'	=> 34,
                    'name'	=> 'ESRB_use_of_drugs_and_alchool'
                ],
                [
                    'id'	=> 35,
                    'name'	=> 'ESRB_drug_and_alcohol_reference'
                ],
                [
                    'id'	=> 36,
                    'name'	=> 'ESRB_mild_suggestive_themes'
                ],
                [
                    'id'	=> 37,
                    'name'	=> 'ESRB_mild_cartoon_violence'
                ],
                [
                    'id'	=> 38,
                    'name'	=> 'ESRB_mild_blood'
                ],
                [
                    'id'	=> 39,
                    'name'	=> 'ESRB_realistic_blood_and_gore'
                ],
                [
                    'id'	=> 40,
                    'name'	=> 'ESRB_realistic_violence'
                ],
                [
                    'id'	=> 41,
                    'name'	=> 'ESRB_alcohol_and_tobacco_reference'
                ],
                [
                    'id'	=> 42,
                    'name'	=> 'ESRB_mature_sexual_themes'
                ],
                [
                    'id'	=> 43,
                    'name'	=> 'ESRB_mild_animated_violence'
                ],
                [
                    'id'	=> 44,
                    'name'	=> 'ESRB_mild_sexual_themes'
                ],
                [
                    'id'	=> 45,
                    'name'	=> 'ESRB_use_of_alcohol_and_tobacco'
                ],
                [
                    'id'	=> 46,
                    'name'	=> 'ESRB_animated_blood_and_gore'
                ],
                [
                    'id'	=> 47,
                    'name'	=> 'ESRB_mild_fantasy_violence'
                ],
                [
                    'id'	=> 48,
                    'name'	=> 'ESRB_mild_lyrics'
                ],
                [
                    'id'	=> 49,
                    'name'	=> 'ESRB_realistic_blood'
                ],
                [
                    'id'	=> 50,
                    'name'	=> 'PEGI_violence'
                ],
                [
                    'id'	=> 51,
                    'name'	=> 'PEGI_sex'
                ],
                [
                    'id'	=> 52,
                    'name'	=> 'PEGI_drugs'
                ],
                [
                    'id'	=> 53,
                    'name'	=> 'PEGI_fear'
                ],
                [
                    'id'	=> 54,
                    'name'	=> 'PEGI_discrimination'
                ],
                [
                    'id'	=> 55,
                    'name'	=> 'PEGI_bad_language'
                ],
                [
                    'id'	=> 56,
                    'name'	=> 'PEGI_gambling'
                ],
                [
                    'id'	=> 57,
                    'name'	=> 'PEGI_online_gameplay'
                ],
                [
                    'id'	=> 58,
                    'name'	=> 'PEGI_in_game_purchases'
                ],
                [
                    'id'	=> 59,
                    'name'	=> 'CERO_love'
                ],
                [
                    'id'	=> 60,
                    'name'	=> 'CERO_sexual_content'
                ],
                [
                    'id'	=> 61,
                    'name'	=> 'CERO_violence'
                ],
                [
                    'id'	=> 62,
                    'name'	=> 'CERO_horror'
                ],
                [
                    'id'	=> 63,
                    'name'	=> 'CERO_drinking_smoking'
                ],
                [
                    'id'	=> 64,
                    'name'	=> 'CERO_gambling'
                ],
                [
                    'id'	=> 65,
                    'name'	=> 'CERO_crime'
                ],
                [
                    'id'	=> 66,
                    'name'	=> 'CERO_controlled_substances'
                ],
                [
                    'id'	=> 67,
                    'name'	=> 'CERO_languages_and_others'
                ],
                [
                    'id'	=> 68,
                    'name'	=> 'GRAC_sexuality'
                ],
                [
                    'id'	=> 69,
                    'name'	=> 'GRAC_violence'
                ],
                [
                    'id'	=> 70,
                    'name'	=> 'GRAC_fear_horror_threatening'
                ],
                [
                    'id'	=> 71,
                    'name'	=> 'GRAC_language'
                ],
                [
                    'id'	=> 72,
                    'name'	=> 'GRAC_alcohol_tobacco_drug'
                ],
                [
                    'id'	=> 73,
                    'name'	=> 'GRAC_crime_anti_social'
                ],
                [
                    'id'	=> 74,
                    'name'	=> 'GRAC_gambling'
                ],
                [
                    'id'	=> 75,
                    'name'	=> 'CLASS_IND_violencia'
                ],
                [
                    'id'	=> 76,
                    'name'	=> 'CLASS_IND_violencia_extrema'
                ],
                [
                    'id'	=> 77,
                    'name'	=> 'CLASS_IND_conteudo_sexual'
                ],
                [
                    'id'	=> 78,
                    'name'	=> 'CLASS_IND_nudez'
                ],
                [
                    'id'	=> 79,
                    'name'	=> 'CLASS_IND_sexo'
                ],
                [
                    'id'	=> 80,
                    'name'	=> 'CLASS_IND_sexo_explicito'
                ],
                [
                    'id'	=> 81,
                    'name'	=> 'CLASS_IND_drogas'
                ],
                [
                    'id'	=> 82,
                    'name'	=> 'CLASS_IND_drogas_licitas'
                ],
                [
                    'id'	=> 83,
                    'name'	=> 'CLASS_IND_drogas_ilicitas'
                ],
                [
                    'id'	=> 84,
                    'name'	=> 'CLASS_IND_linguagem_impropria'
                ],
                [
                    'id'	=> 85,
                    'name'	=> 'CLASS_IND_atos_criminosos'
                ]
                
            ]);
        }
    }
}
