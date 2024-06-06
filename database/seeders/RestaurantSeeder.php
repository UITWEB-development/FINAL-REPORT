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
        for ($i=0; $i <7 ; $i++) { 
            $restaurant1_product1 = Product::create([
                'price' => 295000,
                'name' => 'Chicken fettuccine',
                'description' => 'Chicken chicken',
                'image_path' => '0baf6ade-d782-405f-89f5-fdb77c03dd29.jpg',
                'is_available' => true,
                'user_id' => $restaurant1->id,
                'category_id' => 0,
            ]);
        }

        for ($i=0; $i <7 ; $i++) { 
            Product::create([
                'price' => 295000,
                'name' => 'Chicken fettuccine',
                'description' => 'Chicken chicken',
                'image_path' => '0baf6ade-d782-405f-89f5-fdb77c03dd29.jpg',
                'is_available' => true,
                'user_id' => $restaurant2->id,
                'category_id' => 0,
            ]);
        }


        for ($i=0; $i <7 ; $i++) { 
            Product::create([
                'price' => 295000,
                'name' => 'Chicken fettuccine',
                'description' => 'Chicken chicken',
                'image_path' => '0baf6ade-d782-405f-89f5-fdb77c03dd29.jpg',
                'is_available' => true,
                'user_id' => $restaurant3->id,
                'category_id' => 0,
            ]);
        }

        for ($i=0; $i <7 ; $i++) { 
            Product::create([
                'price' => 24000,
                'name' => 'Mirinda Soda Kem',
                'description' => 'Lentil & goat cheese salad',
                'image_path' => 'ssw-mirinda-soda-kem.jpg',
                'is_available' => true,
                'user_id' => $restaurant4->id,
                'category_id' => 1,
            ]);
        }

        for ($i=0; $i <7 ; $i++) { 
            Product::create([
                'price' => 24000,
                'name' => 'Mirinda Soda Kem',
                'description' => 'Lentil & goat cheese salad',
                'image_path' => 'ssw-mirinda-soda-kem.jpg',
                'is_available' => true,
                'user_id' => $restaurant5->id,
                'category_id' => 1,
            ]);
        }

        for ($i=0; $i <7 ; $i++) { 
            Product::create([
                'price' => 24000,
                'name' => 'Mirinda Soda Kem',
                'description' => 'Lentil & goat cheese salad',
                'image_path' => 'ssw-mirinda-soda-kem.jpg',
                'is_available' => true,
                'user_id' => $restaurant6->id,
                'category_id' => 1,
            ]);
        }

        for ($i=0; $i <7 ; $i++) { 
            Product::create([
                'price' => 24000,
                'name' => 'Mirinda Soda Kem',
                'description' => 'Lentil & goat cheese salad',
                'image_path' => 'ssw-mirinda-soda-kem.jpg',
                'is_available' => true,
                'user_id' => $restaurant7->id,
                'category_id' => 1,
            ]);
        }

        for ($i=0; $i <7 ; $i++) { 
            Product::create([
                'price' => 24000,
                'name' => 'Mirinda Soda Kem',
                'description' => 'Lentil & goat cheese salad',
                'image_path' => 'ssw-mirinda-soda-kem.jpg',
                'is_available' => true,
                'user_id' => $restaurant8->id,
                'category_id' => 1,
            ]);
        }

        for ($i=0; $i <7 ; $i++) { 
            Product::create([
                'price' => 24000,
                'name' => 'Mirinda Soda Kem',
                'description' => 'Lentil & goat cheese salad',
                'image_path' => 'ssw-mirinda-soda-kem.jpg',
                'is_available' => true,
                'user_id' => $restaurant9->id,
                'category_id' => 1,
            ]);
        }

        for ($i=0; $i <7 ; $i++) { 
            Product::create([
                'price' => 24000,
                'name' => 'Mirinda Soda Kem',
                'description' => 'Lentil & goat cheese salad',
                'image_path' => 'ssw-mirinda-soda-kem.jpg',
                'is_available' => true,
                'user_id' => $restaurant10->id,
                'category_id' => 1,
            ]);
        }





        /* Descriptions */

        $restaurant1_description = RestaurantDescription::create([
            'restaurant_name' => "Pizza 4P's",
            'user_id' => $restaurant1->id,
            'address' => '151B Hai Ba Trung, Ward 6, District 3, Ho Chi Minh City, Vietnam',
            'phone_number' => '02838230508',
            'opening_time' => '11:00:00',
            'closing_time' => '21:00:00',
            'longitude' => '106.7036239',
            'latitude' => '10.7782445',
        ]);

        $restaurant2_description = RestaurantDescription::create([
            'restaurant_name' => "Cơm Niêu Sài Gòn",
            'user_id' => $restaurant2->id,
            'address' => '27 Tú Xương, Phường Võ Thị Sáu, Quận 3, Ho Chi Minh City, Vietnam',
            'phone_number' => '0826336888',
            'opening_time' => '06:00:00',
            'closing_time' => '23:00:00',
            'longitude' => '106.7036239',
            'latitude' => '10.7782445',
        ]);
        
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

        $restaurant5_description = RestaurantDescription::create([
            'restaurant_name' => 'ĐẬU Homemade',
            'user_id' => $restaurant5->id,
            'address' => '241 Đồng Đen, P.11, Q.Tân Bình, TP. HCM',
            'phone_number' => '0899094779',
            'opening_time' => '10:00:00',
            'closing_time' => '21:30:00',
            'longitude' => '106.7031359',
            'latitude' => '10.7619617',
        ]);

        $restaurant6_description = RestaurantDescription::create([
            'restaurant_name' => 'Lẩu Gà Ớt Hiểm 109',
            'user_id' => $restaurant6->id,
            'address' => '190 Hoàng Diệu 2, P. Linh Chiểu, TP. Thủ Đức',
            'phone_number' => '0899094779',
            'opening_time' => '10:00:00',
            'closing_time' => '21:30:00',
            'longitude' => '106.7031359',
            'latitude' => '10.7619617',
        ]);

        $restaurant7_description = RestaurantDescription::create([
            'restaurant_name' => 'Lẩu Gà Ớt Hiểm 109',
            'user_id' => $restaurant7->id,
            'address' => 'Tầng 02, Estella Place, 88 Song Hành, P. An Phú, Q.2',
            'phone_number' => '0899094779',
            'opening_time' => '10:00:00',
            'closing_time' => '21:30:00',
            'longitude' => '106.7031359',
            'latitude' => '10.7619617',
        ]);

        $restaurant8_description = RestaurantDescription::create([
            'restaurant_name' => 'Hàng Dương Quán',
            'user_id' => $restaurant8->id,
            'address' => '32-34 Ngô Đức Kế, P.Bến Nghé, Quận 1, Ho Chi Minh City, Vietnam',
            'phone_number' => '0899094779',
            'opening_time' => '10:00:00',
            'closing_time' => '21:30:00',
            'longitude' => '106.7031359',
            'latitude' => '10.7619617',
        ]);

        $restaurant9_description = RestaurantDescription::create([
            'restaurant_name' => "Dan's Kitchen",
            'user_id' => $restaurant9->id,
            'address' => '334 Nguyễn Tất Thành, Phường 13, Quận 4, Ho Chi Minh City, Vietnam',
            'phone_number' => '0899094779',
            'opening_time' => '10:00:00',
            'closing_time' => '21:30:00',
            'longitude' => '106.7031359',
            'latitude' => '10.7619617',
        ]);

        $restaurant10_description = RestaurantDescription::create([
            'restaurant_name' => "Nàng Tấm",
            'user_id' => $restaurant10->id,
            'address' => '99 Đ. Nguyễn Huệ, Bến Nghé, Quận 1, Ho Chi Minh City, Vietnam',
            'phone_number' => '0938556666',
            'opening_time' => '10:00:00',
            'closing_time' => '21:30:00',
            'longitude' => '106.7031359',
            'latitude' => '10.7619617',
        ]);
    }
}
