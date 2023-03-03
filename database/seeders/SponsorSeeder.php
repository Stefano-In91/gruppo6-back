<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Sponsor;
use Illuminate\Support\Str;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Sponsor::truncate();
        Schema::enableForeignKeyConstraints();
        $sponsors = ['1 Settimana', '1 Mese', '1 Anno'];
        $prices = ['9.99', '29.99', '199.99'];
        $durations = ['week', 'month', 'year'];
        
        for ($i=0; $i < 3; $i++) { 
            $new_sponsor = new Sponsor();
            $new_sponsor->name = $sponsors[$i];
            $new_sponsor->price = $prices[$i];
            $new_sponsor->duration = $durations[$i];
            $new_sponsor->slug = Str::slug("premium $new_sponsor->name");
            $new_sponsor->save();
        }
    }
}
