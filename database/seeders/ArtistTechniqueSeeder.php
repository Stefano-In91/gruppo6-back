<?php

namespace Database\Seeders;

use App\Models\Technique;
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
    // Localizzazione tabella
    protected $table = "artist_technique";
    public function run()
    {
        // cancella dati precedenti in tabella
        Schema::disableForeignKeyConstraints();
        DB::table('artist_technique')->truncate();
        Schema::enableForeignKeyConstraints();

        $techniques = Technique::all();
        // cicla sui 20 artisti 
        for ($i=0; $i < 20; $i++) {
            // cicla sulle tecniche esistenti e le aggiunge random (33% successo)
            foreach ($techniques as $technique) {
                $forse_aggiungo = rand(0, 2);
                if($forse_aggiungo > 1){
                    DB::table('artist_technique')->insert([
                        'artist_id' => $i + 1,
                        'technique_id' => $technique->id,
                    ]);
                }
            }
        }
    }
}
