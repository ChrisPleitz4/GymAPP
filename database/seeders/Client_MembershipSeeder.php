<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Client_MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = Client::find(1);
        $user->memberships()->attach(1, [
            'start_date' => now(),  // o la fecha que desees
            'end_date' => now()->addDays(15)  // o la fecha que desees
        ]);
        
    }
}
