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
            $added_tech = 0;
            $count = 0;
            // cicla sulle tecniche esistenti e le aggiunge random (20% successo)
            foreach ($techniques as $technique) {
                $forse_aggiungo = rand(1, 5);
                if($forse_aggiungo === 1){
                    DB::table('artist_technique')->insert([
                        'artist_id' => $i + 1,
                        'technique_id' => $technique->id,
                    ]);
                    $added_tech++;
                }
                $count++;
            }
            // se un artista non ha neanche una tecnica ne aggiunge una random
            if ($added_tech === 0) {
                DB::table('artist_technique')->insert([
                    'artist_id' => $i + 1,
                    'technique_id' => rand(1, $count),
                ]);
            }
        }
    }
}
