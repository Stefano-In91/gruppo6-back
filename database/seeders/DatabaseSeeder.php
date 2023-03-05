<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // utilizza tutti i seeder creati resettando le tabelle e ripopolandole
        // funzione php artisan db:seed
        $this->call([
            UserSeeder::class,
            ArtistSeeder::class,
            MessageSeeder::class,
            RatingSeeder::class,
            ArtistRatingSeeder::class,
            ReviewSeeder::class,
            SponsorSeeder::class,
            ArtistSponsorSeeder::class,
            TechniqueSeeder::class,
            ArtistTechniqueSeeder::class,
        ]);
    }
}
