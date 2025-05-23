<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => '12345678',
            'role_id' => 0,
            'email_verified_at' => null
        ]);

        User::factory()->create([
            'name' => 'Seller',
            'email' => 'seller@example.com',
            'password' => '12345678',
            'role_id' => 1,
        ]);

    }
}
