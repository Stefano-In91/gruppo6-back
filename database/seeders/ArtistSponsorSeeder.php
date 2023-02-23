<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Faker\Generator as Faker;
use App\Models\Sponsor;

class ArtistSponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // cancella dati precedenti in tabella
        DB::table('artist_sponsor')->delete();
        // cicla sui 20 artisti 
        for ($i=0; $i < 20; $i++) {
            // localizza 1 sponsor random da aggiungere per artista
            $sponsor = Sponsor::firstWhere('id', rand(1, 3));
            // data di inizio
            $date = $faker->dateTimeBetween('-1 month', 'now');
            // data di fine (data di inizio + durata dello sponsor)
            $end_date = Carbon::parse($date)->add($sponsor->duration, 1);

            DB::table('artist_sponsor')->insert([
                'artist_id' => $i + 1,
                'sponsor_id' => $sponsor->id,
                'start_date' => $date,
                'end_date' => $end_date,
            ]);
        }
    }
}