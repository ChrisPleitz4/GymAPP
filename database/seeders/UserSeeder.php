<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Christian Pleitez',
            'email' => 'ararmando89@gmail.com',
            'password' => bcrypt('987654321'),
            'role_id' => 1,]);

            User::create([
                'name' => 'Oscar Pleitez',
                'email' => 'AlePlei@gmail.com',
                'password' => bcrypt('987654321'),
                'role_id' => 2,]);
    }
}
