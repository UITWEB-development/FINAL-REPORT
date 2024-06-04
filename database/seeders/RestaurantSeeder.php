<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurant1 = User::create([
            'name' => "Pizza 4P's",
            'email' => 'pizza4pzs@gmail.com',
            'password' => '12345678',
            'role_id' => 1,
            'image_path' => '351548804_6298762480162532_6875065696845119419_n.jpg',
        ]);

        
    }
}
