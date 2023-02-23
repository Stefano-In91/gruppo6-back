<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ArtistTechniqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $table = "artist_technique";
    public function run()
    {
        // cancella dati precedenti in tabella
        Schema::disableForeignKeyConstraints();
        DB::table('artist_technique')->delete();
        Schema::enableForeignKeyConstraints();
        // cicla sui 20 artisti 
        for ($i=0; $i < 20; $i++) {
            // aggiunge da 1 a 7 techniche random per artista
            for ($t=0; $t < 7; $t++) {
                $forse_aggiungo = rand(0, 1);
                if($forse_aggiungo > 0){
                    DB::table('artist_technique')->insert([
                        'artist_id' => $i + 1,
                        'technique_id' => $t + 1,
                    ]);
                }
            }    
        }
    }
}
