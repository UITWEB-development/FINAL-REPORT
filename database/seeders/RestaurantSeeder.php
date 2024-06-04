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
        $restaurant2 = User::create([
            'name' => "Cơm Niêu Sài Gòn",
            'email' => 'comnieusaigon@gmail.com',
            'password' =>'12345678',
            'role_id' => 1,
            'image_path' => '',
        ]);
        $restaurant3 = User::create([
            'name' => "The Refinery Saigon",
            'email' => 'refinery@gmail.com',
            'password' =>'12345678',
            'role_id' => 1,
            'image_path' => '',
        ]);
        $restaurant4 = User::create([
            'name' => "SushiWay",
            'email' => 'sushiway@gmail.com',
            'password' =>'12345678',
            'role_id' => 1,
            'image_path' => '',
        ]);
        $restaurant5 = User::create([
            'name' => "ĐẬU Homemade",
            'email' => 'dauhomemade@gmail.com',
            'password' =>'12345678',
            'role_id' => 1,
            'image_path' => '',
        ]);
        $restaurant6 = User::create([
            'name' => "Lẩu Gà Ớt Hiểm 109 ",
            'email' => 'laugaothiem109@gmail.com ',
            'password' =>'12345678',
            'role_id' => 1,
            'image_path' => '',
        ]);
        $restaurant7 = User::create([
            'name' => "Trong Com Vietnamese Casual Food ",
            'email' => 'trongcom@gmail.com ',
            'password' =>'12345678',
            'role_id' => 1,
            'image_path' => '',
        ]);
        $restaurant8 = User::create([
            'name' => "Hàng Dương Quán",
            'email' => 'hangduong@gmail.com',
            'password' =>'12345678',
            'role_id' => 1,
            'image_path' => '',
        ]);
        $restaurant9 = User::create([
            'name' => "Dan's Kitchen ",
            'email' => 'dankitchen@gmail.com',
            'password' =>'12345678',
            'role_id' => 1,
            'image_path' => '',
        ]);
        $restaurant10 = User::create([
            'name' => "Nàng Tấm  ",
            'email' => 'nangtam@gmail.com',
            'password' =>'12345678',
            'role_id' => 1,
            'image_path' => '',
        ]);
    }
}
