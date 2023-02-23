<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rating;
use Illuminate\Support\Facades\Schema;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Rating::truncate();
        Schema::enableForeignKeyConstraints();

        $ratings = [1, 2, 3, 4, 5];

        foreach ($ratings as $rating) {

            $new_rating = new Rating();
            $new_rating->rating = $rating;
            $new_rating->save();
        }
    }
}
