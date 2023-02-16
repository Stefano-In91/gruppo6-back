<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technique;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Unique;

class TechniqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20 ; $i++) { 
            $new_technique = new Technique();
            $new_technique->name = $faker->name(30);
            $new_technique->description = $faker->text(1000);
            $new_technique->slug = Str::slug($new_technique -> name);
            $new_technique->save();
        }
    }
}
