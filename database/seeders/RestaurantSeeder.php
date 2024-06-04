<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\RestaurantDescription;
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
            'image_path' => '367027759_624153716523924_4191213647365491649_n.jpg',
        ]);
        $restaurant3 = User::create([
            'name' => "The Refinery Saigon",
            'email' => 'refinery@gmail.com',
            'password' =>'12345678',
            'role_id' => 1,
            'image_path' => '329041673_673542817884242_2500629958121397007_n.jpg',
        ]);
        $restaurant4 = User::create([
            'name' => "SushiWay",
            'email' => 'sushiway@gmail.com',
            'password' =>'12345678',
            'role_id' => 1,
            'image_path' => '445369245_998578048280198_5013509838463136817_n.jpg',
        ]);
        $restaurant5 = User::create([
            'name' => "ĐẬU Homemade",
            'email' => 'dauhomemade@gmail.com',
            'password' =>'12345678',
            'role_id' => 1,
            'image_path' => '353851970_580269180944198_4479610203829883785_n.png',
        ]);
        $restaurant6 = User::create([
            'name' => "Lẩu Gà Ớt Hiểm 109 ",
            'email' => 'laugaothiem109@gmail.com ',
            'password' =>'12345678',
            'role_id' => 1,
            'image_path' => '375459581_608098211494384_8693940532940652935_n.jpg',
        ]);
        $restaurant7 = User::create([
            'name' => "Trong Com Vietnamese Casual Food ",
            'email' => 'trongcom@gmail.com ',
            'password' =>'12345678',
            'role_id' => 1,
            'image_path' => '407708238_763212375823993_6658175459126077109_n.jpg',
        ]);
        $restaurant8 = User::create([
            'name' => "Hàng Dương Quán",
            'email' => 'hangduong@gmail.com',
            'password' =>'12345678',
            'role_id' => 1,
            'image_path' => '318949576_6064262903604816_4575805603178220557_n.jpg',
        ]);
        $restaurant9 = User::create([
            'name' => "Dan's Kitchen ",
            'email' => 'dankitchen@gmail.com',
            'password' =>'12345678',
            'role_id' => 1,
            'image_path' => '285357932_104390625631037_2496711201965751305_n.jpg',
        ]);
        $restaurant10 = User::create([
            'name' => "Nàng Tấm  ",
            'email' => 'nangtam@gmail.com',
            'password' =>'12345678',
            'role_id' => 1,
            'image_path' => '444486135_299243943239012_3748511315571219063_n.jpg',
        ]);

        /* Products */

        $restaurant3_product1 = Product::create([
            'price' => 295000,
            'name' => 'Chicken fettuccine',
            'description' => 'Chicken chicken',
            'image_path' => '0baf6ade-d782-405f-89f5-fdb77c03dd29.jpg',
            'is_available' => true,
            'user_id' => $restaurant3->id,
            'category_id' => 0,
        ]);

        $restaurant3_product2 = Product::create([
            'price' => 360000,
            'name' => 'Phan Thiet Swordfish with green salsa',
            'description' => 'Swordfish',
            'image_path' => '0b13f658-85e1-4894-8d90-ebabd0635f1f.jpg',
            'is_available' => true,
            'user_id' => $restaurant3->id,
            'category_id' => 0,
        ]);

        $restaurant3_product3 = Product::create([
            'price' => 235000,
            'name' => 'Lentil & goat cheese salad',
            'description' => 'Lentil & goat cheese salad',
            'image_path' => '0baf6ade-d782-405f-89f5-fdb77c03dd29.jpg',
            'is_available' => true,
            'user_id' => $restaurant3->id,
            'category_id' => 0,
        ]);

        $restaurant4_product7 = Product::create([
            'price' => 24000,
            'name' => 'Mirinda Soda Kem',
            'description' => 'Lentil & goat cheese salad',
            'image_path' => 'ssw-mirinda-soda-kem.jpg',
            'is_available' => true,
            'user_id' => $restaurant4->id,
            'category_id' => 1,
        ]);

        $restaurant4_product8 = Product::create([
            'price' => 24000,
            'name' => 'Aquafina',
            'description' => 'Lentil & goat cheese salad',
            'image_path' => 'ssw-aquafina.jpg',
            'is_available' => true,
            'user_id' => $restaurant4->id,
            'category_id' => 1,
        ]);


        /* Descriptions */
        $restaurant3_description = RestaurantDescription::create([
            'restaurant_name' => 'The Refinery Saigon',
            'user_id' => $restaurant3->id,
            'address' => '74 Hai Ba Trung, District 1, Ho Chi Minh City, Vietnam',
            'phone_number' => '02838230509',
            'opening_time' => '11:00:00',
            'closing_time' => '21:00:00',
            'longitude' => '106.7036239',
            'latitude' => '10.7782445',
        ]);

        $restaurant4_description = RestaurantDescription::create([
            'restaurant_name' => 'SushiWay',
            'user_id' => $restaurant4->id,
            'address' => 'Số 160 Hoàng Diệu, Phường 9, Quận 4, Ho Chi Minh City, Vietnam',
            'phone_number' => '0899094779',
            'opening_time' => '24:00:00',
            'closing_time' => '24:00:00',
            'longitude' => '106.7031359',
            'latitude' => '10.7619617',
        ]);


    }
}
