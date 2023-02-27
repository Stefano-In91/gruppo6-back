<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Faker\Generator as Faker;
use App\Models\Sponsor;
use App\Models\Artist;
use Illuminate\Support\Facades\Schema;

class ArtistSponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // Localizzazione tabella
    protected $table = "artist_sponsor";
    public function run(Faker $faker)
    {
        // cancella dati precedenti in tabella
        Schema::disableForeignKeyConstraints();
        DB::table('artist_sponsor')->truncate();
        Schema::enableForeignKeyConstraints();
        // cicla sugli artisti 
        $artists = Artist::all();
        foreach ($artists as $artist) {
            // localizza 1 sponsor random da aggiungere per artista
            $sponsor = Sponsor::firstWhere('id', rand(1, 3));
            // data di inizio
            $date = $faker->dateTimeBetween('-1 month', 'now');
            // data di fine (data di inizio + durata dello sponsor)
            $end_date = Carbon::parse($date)->add($sponsor->duration, 1);
            // aggiunge sponsor casualmente col 60% di probabilità positiva
            $casual = rand(1, 5);
            if($casual < 4) {
                DB::table('artist_sponsor')->insert([
                    'artist_id' => $artist->id,
                    'sponsor_id' => $sponsor->id,
                    'start_date' => $date,
                    'end_date' => $end_date,
                ]);
            }
        }
    }
}
