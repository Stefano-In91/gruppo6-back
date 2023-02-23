<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Message;
use Faker\Generator as Faker; 
use Illuminate\Support\Str;


class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Message::truncate();
        Schema::enableForeignKeyConstraints();
        for ($i=0; $i < 20; $i++) { //cicla sui 20 artisti
            for ($r=0; $r < 5; $r++){ //5 messaggi per artista
                $new_message = new Message();
                $new_message->artist_id = $i + 1;
                $new_message->title = $faker->sentence(3, false);
                $new_message->message_text = $faker->text(500);
                $new_message->sender_email = $faker->email();
                $new_message->date = $faker->date();
                $slug_matrix = "$new_message->title $new_message->date";
                $new_message->slug = Str::slug( $slug_matrix );
                $new_message->save();
            }
        }
    }
}
