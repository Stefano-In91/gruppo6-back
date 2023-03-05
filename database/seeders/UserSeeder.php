<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();
        // creazione 40 user fittizi
        for ($i=0; $i < 40 ; $i++) { 
            $new_user = new User();
            $new_user->name = $faker->firstName(20);
            $new_user->surname = $faker->lastName(20);
            $new_user->email = $faker->email();
            $new_user->password = $faker->password();
            $new_user->save();
        }
    }
}
