<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Schema;

class ArtistRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // Localizzazione tabella
    protected $table = "artist_rating";
    public function run(Faker $faker)
    {
        // cancella dati precedenti in tabella
        Schema::disableForeignKeyConstraints();
        DB::table('artist_rating')->truncate();
        Schema::enableForeignKeyConstraints();

        // cicla sui 20 artisti 
        for ($i=0; $i < 20; $i++) {
            // aggiunge 10 rating random per artista
            for ($r=0; $r < 10; $r++) { 
                DB::table('artist_rating')->insert([
                    'artist_id' => $i + 1,
                    'rating_id' => rand(1, 5),
                    'rating_date' => $faker->dateTimeBetween('-1 year', 'now'),
                ]); 
            }    
        }
    }
}
