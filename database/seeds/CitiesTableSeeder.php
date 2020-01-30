<?php

use Illuminate\Database\Seeder;

use App\Citie;

class CitiesTableSeeder extends Seeder
{

    public function run()
    {
        Citie::truncate();
        
        Citie::create([
            'name' => 'Rabat'
        ]);

        Citie::create([
            'name' => 'Casa'
        ]);

        Citie::create([
            'name' => 'Tangier'
        ]);

    }
}
