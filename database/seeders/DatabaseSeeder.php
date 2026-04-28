<?php

namespace Database\Seeders;

use App\Models\Bien;
use App\Models\Proprietaire;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
       
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call([
        //     ProprietaireSeeder::class,
        //     BienSeeder::class,
        // ]);

        User::create([
        'name' => 'Admin Principal',
        'email' => 'admin@monsite.com',
        'phone' => '90000000',
        'gender' => 'M',
        'adresse' => 'Bureau Central',
        'role' => 'admin', 
        'password' => Hash::make('11111111'),
    ]);

    Proprietaire::create([
            'user_id'=>1
        ]);
   



        
       
    }
}
