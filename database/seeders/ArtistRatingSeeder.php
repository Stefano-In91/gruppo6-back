<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Schema;
use App\Models\Artist;
use Illuminate\Support\Carbon;

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

        // cicla sugli artisti 
        $artists = Artist::all();
        foreach ($artists as $artist) {
            // aggiunge 10 rating random per artista
            for ($r=0; $r < 10; $r++) { 
                $date = $faker->dateTimeBetween('-3 months', 'now');
                DB::table('artist_rating')->insert([
                    'artist_id' => $artist->id,
                    'rating_id' => rand(1, 5),
                    'rating_date' => Carbon::parse($date),
                ]); 
            }    
        }
    }
}
