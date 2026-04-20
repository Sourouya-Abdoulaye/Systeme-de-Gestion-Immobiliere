<?php

namespace Database\Seeders;

use Database\Factories\ProprietaireFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProprietaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ProprietaireFactory::factory(5)->create();

    }
}
