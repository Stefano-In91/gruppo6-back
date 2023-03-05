<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technique;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
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
        Schema::disableForeignKeyConstraints();
        Technique::truncate();
        Schema::enableForeignKeyConstraints();

        $techniques = ['Musicista', 'Pittore', 'Attore', 'Scultore', 'Fotografo', 'Regista', 'VideoMaker'];
        // creazione tecniche base senza relazione artista
        foreach ($techniques as $technique) {
            $new_technique = new Technique();
            $new_technique->name = $technique;
            $new_technique->description = $faker->text(500);
            $new_technique->slug = Str::slug($new_technique->name);
            $new_technique->save();
        }
    }
}
