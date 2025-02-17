<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Membership;
use App\Models\User;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(MembershipSeeder::class);
        $this->call(Client_MembershipSeeder::class);
    }
}
