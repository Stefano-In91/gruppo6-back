<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artist;
use Faker\Generator as Faker; 
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Artist::truncate();
        Schema::enableForeignKeyConstraints();
        for ($i=0; $i < 20; $i++) { 
            $new_artist = new Artist();
            $new_artist->user_id = $i + 1;
            $new_artist->artist_nickname = $faker->name(30);
            $new_artist->introduction_text = $faker->text(100);
            $new_artist->address = $faker->address();
            $new_artist->phone_number = $faker->phoneNumber();
            $new_artist->slug = Str::slug($new_artist->artist_nickname);
            $new_artist->save();
        }
    }
}
