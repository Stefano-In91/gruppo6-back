<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker; 
use Illuminate\Support\Facades\Schema;
use App\Models\Review;
use App\Models\Artist;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Review::truncate();
        Schema::enableForeignKeyConstraints();
        
        $artists = Artist::all();
        foreach ($artists as $artist) { //cicla sugli artisti
            for ($r=0; $r < 5; $r++){ //5 review per artista
                $new_review = new Review();
                $new_review->artist_id = $artist->id;
                $new_review->title = $faker->sentence(3, false);
                $new_review->review_text = $faker->text(300);
                $date = $faker->dateTimeBetween('-3 month', 'now');
                $new_review->date = Carbon::parse($date);
                $slug_matrix = "$new_review->title $new_review->date";
                $new_review->slug = Str::slug( $slug_matrix );
                $new_review->save();
            }
        }
    }
}
