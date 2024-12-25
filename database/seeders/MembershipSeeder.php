<?php

namespace Database\Seeders;

use App\Models\Membership;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Membership::create([
            'name' => 'Quincenal',
            'duration' => 15,
            'price' => 7,
            'description' => 'Membresia para 15 dias, sin cardio',
        ]);

        Membership::create([
            'name' => 'Quincenal PRO',
            'duration' => 15,
            'price' => 8.50,
            'description' => 'Membresia para 15 dias, con cardio',
        ]);

        Membership::create([
            'name' => 'Mensual ',
            'duration' => 30,
            'price' => 14,
            'description' => 'Membresia para 30 dias, sin cardio',
        ]);

        Membership::create([
            'name' => 'Mensual PRO',
            'duration' =>30,
            'price' => 17,
            'description' => 'Membresia para 30 dias, con cardio',
        ]);
    }
}
