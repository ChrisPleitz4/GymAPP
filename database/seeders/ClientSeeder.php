<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        Client::create([
            'name' => 'Rebeca Machon',
            'PhoneNumber' => '12345678',
        ]);

        Client::create([
            'name' => 'Maribel Pleitez',
            'PhoneNumber' => '12345678',
        ]);
    }
}
