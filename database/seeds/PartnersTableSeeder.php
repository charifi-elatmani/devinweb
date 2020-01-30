<?php

use Illuminate\Database\Seeder;

use APP\Partener;

class PartnersTableSeeder extends Seeder
{

    public function run()
    {
        Partener::truncate();

        Partener::create([
            'name' => 'Mohamed',
            'citie_id' => 1
        ]);

        Partener::create([
            'name' => 'Hassan',
            'citie_id' => 2
        ]);

        Partener::create([
            'name' => 'Nada',
            'citie_id' => 3
        ]);
        
    }
}
