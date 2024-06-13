<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\RestaurantDescription;
use App\Models\User;
use Carbon\Carbon;
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
            'created_at' => Carbon::create(2022, 1, 1, 1, 1),
            'updated_at' => Carbon::create(2022, 1, 1, 1, 1),
        ]);
        $restaurant2 = User::create([
            'name' => 'Cơm Niêu Sài Gòn',
            'email' => 'comnieusaigon@gmail.com',
            'password' => '12345678',
            'role_id' => 1,
            'image_path' => '367027759_624153716523924_4191213647365491649_n.jpg',
        ]);

        $restaurant3 = User::create([
            'name' => 'The Refinery Saigon',
            'email' => 'refinery@gmail.com',
            'password' => '12345678',
            'role_id' => 1,
            'image_path' => '329041673_673542817884242_2500629958121397007_n.jpg',
        ]);
        $restaurant4 = User::create([
            'name' => 'SushiWay',
            'email' => 'sushiway@gmail.com',
            'password' => '12345678',
            'role_id' => 1,
            'image_path' => '445369245_998578048280198_5013509838463136817_n.jpg',
        ]);
        $restaurant5 = User::create([
            'name' => 'ĐẬU Homemade',
            'email' => 'dauhomemade@gmail.com',
            'password' => '12345678',
            'role_id' => 1,
            'image_path' => '353851970_580269180944198_4479610203829883785_n.png',
        ]);
        $restaurant6 = User::create([
            'name' => 'Lẩu Gà Ớt Hiểm 109 ',
            'email' => 'laugaothiem109@gmail.com ',
            'password' => '12345678',
            'role_id' => 1,
            'image_path' => '375459581_608098211494384_8693940532940652935_n.jpg',
        ]);
        $restaurant7 = User::create([
            'name' => 'Trong Com Vietnamese Casual Food ',
            'email' => 'trongcom@gmail.com ',
            'password' => '12345678',
            'role_id' => 1,
            'image_path' => '407708238_763212375823993_6658175459126077109_n.jpg',
        ]);
        $restaurant8 = User::create([
            'name' => 'Hàng Dương Quán',
            'email' => 'hangduong@gmail.com',
            'password' => '12345678',
            'role_id' => 1,
            'image_path' => '318949576_6064262903604816_4575805603178220557_n.jpg',
        ]);
        $restaurant9 = User::create([
            'name' => "Dan's Kitchen ",
            'email' => 'dankitchen@gmail.com',
            'password' => '12345678',
            'role_id' => 1,
            'image_path' => '285357932_104390625631037_2496711201965751305_n.jpg',
        ]);
        $restaurant10 = User::create([
            'name' => 'Nàng Tấm  ',
            'email' => 'nangtam@gmail.com',
            'password' => '12345678',
            'role_id' => 1,
            'image_path' => '444486135_299243943239012_3748511315571219063_n.jpg',
        ]);

        /* Products */
        /* Restaurant 1 Products */
        $restaurant1_product1 = Product::create([
            'price' => 98000,
            'name' => 'Gà rán gia vị phương Đông với xốt ớt Jalapeño nhà làm (2 miếng)',
            'description' => 'Thịt gà giòn tan tẩm ướp gia vị đậm đà theo phong cách phương Đông, ăn kèm với xốt ớt Jalapeño cay nồng nhà làm, kích thích vị giác. Món ăn hoàn hảo cho những ai yêu thích hương vị cay nồng và đậm đà',
            'image_path' => '937e52dc-e79b-4297-bbd8-5781ba55c398.png',
            'is_available' => true,
            'user_id' => $restaurant1->id,
            'category_id' => 0,
        ]);

        $restaurant1_product2 = Product::create([
            'price' => 254000,
            'name' => 'Mì Ý xốt kem với cua và xốt cà chua',
            'description' => 'Sợi mì Ý dai ngon quyện trong xốt kem béo ngậy, kết hợp cùng thịt cua tươi ngon và xốt cà chua đậm đà, mang đến hương vị hài hòa và tinh tế. Phù hợp cho những ai yêu thích món Ý với sự kết hợp giữa kem và hải sản.',
            'image_path' => '95614e68-2490-4f80-878a-c0b6a861e272.png',
            'is_available' => true,
            'user_id' => $restaurant1->id,
            'category_id' => 0,
        ]);

        
        $restaurant1_product3 = Product::create([
            'price' => 94000,
            'name' => 'Phô mai Camembert kẹp Mascarpone dầu nấm Truffle (2 miếng)',
            'description' => 'Lớp phô mai Camembert béo ngậy quyện cùng Mascarpone mềm mịn, được nâng tầm bởi hương vị nấm Truffle tinh tế. Món ăn sang trọng và tinh tế, thích hợp cho những dịp đặc biệt.',
            'image_path' => '252dd405-aee0-4978-882e-4948ab44d340.png',
            'is_available' => false,
            'user_id' => $restaurant1->id,
            'category_id' => 0,
        ]);

        $restaurant1_product4 = Product::create([
            'price' => 334000,
            'name' => 'Set thịt nguội và phô mai nhà làm (lớn)',
            'description' => 'Thưởng thức trọn vẹn hương vị của các loại thịt nguội và phô mai do chính nhà hàng chế biến, đảm bảo chất lượng và độ tươi ngon.Phù hợp cho những buổi tụ tập bạn bè hoặc gia đình.',
            'image_path' => 'e3b058b0-b812-4255-87ec-b12224052440.png',
            'is_available' => true,
            'user_id' => $restaurant1->id,
            'category_id' => 0,
        ]);

        $restaurant1_product5 = Product::create([
            'price' => 82000,
            'name' => 'Súp cà chua thịt viên Ý với phô mai Mascarpone',
            'description' => 'Súp cà chua thanh ngọt nấu cùng thịt viên đậm đà, quyện cùng vị béo ngậy của phô mai Mascarpone, mang đến món ăn ấm áp và bổ dưỡng. Lựa chọn hoàn hảo cho những ngày se lạnh.',
            'image_path' => '49c56768-722a-4ca8-a9f5-de3c496ce117.png',
            'is_available' => true,
            'user_id' => $restaurant1->id,
            'category_id' => 0,
        ]);

        $restaurant1_product6 = Product::create([
            'price' => 115000,
            'name' => 'Tôm Bơ Salad',
            'description' => 'Tôm tươi ngon được tẩm ướp gia vị đậm đà và xào chín, sau đó trộn cùng salad rau củ giòn giòn, tạo nên món ăn thanh mát và đầy đủ dinh dưỡng. Phù hợp cho những ai yêu thích món salad nhẹ nhàng và thanh tao.',
            'image_path' => '294dd9d3-c3f8-4f6f-82f5-ba717b3120d7.png',
            'is_available' => true,
            'user_id' => $restaurant1->id,
            'category_id' => 0,
        ]);

        $restaurant1_product7 = Product::create([
            'price' => 165000,
            'name' => 'Cơm Ý Risotto mực với cà chua sấy khô và xốt Aioli nhà làm',
            'description' => 'Hạt gạo Risotto nấu chín tới hạt, quyện cùng vị ngọt thanh của mực, cà chua sấy khô và xốt Aioli béo ngậy, tạo nên món ăn đầy hấp dẫn. Mang đến trải nghiệm ẩm thực Ý độc đáo và tinh tế.',
            'image_path' => '73465a32-d485-4a32-a160-cdb581c18156.png',
            'is_available' => true,
            'user_id' => $restaurant1->id,
            'category_id' => 0,
        ]);

        $restaurant1_product8 = Product::create([
            'price' => 65000,
            'name' => 'Nước ép thải độc rau rocket tự nhiên',
            'description' => 'Nước ép',
            'image_path' => '9941e2f8-3cdd-484e-987e-b394246dfce2.png',
            'is_available' => true,
            'user_id' => $restaurant1->id,
            'category_id' => 1,
        ]);

        $restaurant1_product9 = Product::create([
            'price' => 39000,
            'name' => 'Coca Cola',
            'description' => 'Coca Cola',
            'image_path' => 'cb687bb6-5963-40aa-bd88-0bf926548248.png',
            'is_available' => true,
            'user_id' => $restaurant1->id,
            'category_id' => 1,
        ]);

        $restaurant1_product10 = Product::create([
            'price' => 165000,
            'name' => 'Cơm Ý Risotto mực với cà chua sấy khô và xốt Aioli nhà làm',
            'description' => 'Hạt gạo Risotto nấu chín tới hạt, quyện cùng vị ngọt thanh của mực, cà chua sấy khô và xốt Aioli béo ngậy, tạo nên món ăn đầy hấp dẫn. Mang đến trải nghiệm ẩm thực Ý độc đáo và tinh tế.',
            'image_path' => '73465a32-d485-4a32-a160-cdb581c18156.png',
            'is_available' => true,
            'user_id' => $restaurant1->id,
            'category_id' => 1,
        ]);
        /* Restaurant 2 Products */
        Product::create([
            'price' => 82000,
            'name' => 'Bánh ướt chả',
            'description' => 'Bánh ướt mềm mịn, dai dai được làm từ bột gạo, ăn kèm với chả lụa, nem chua, rau sống, nước mắm pha chua ngọt. Món ăn đặc sản của Huế, mang hương vị thanh tao, tinh tế.',
            'image_path' => 'f1336ff4-03ba-4384-badf-814cfaec1fd0.png',
            'is_available' => true,
            'user_id' => $restaurant2->id,
            'category_id' => 0,
        ]);

        Product::create([
            'price' => 103000,
            'name' => 'Bún gạo Tom Yum',
            'description' => 'Nước dùng chua cay đặc trưng của Tom Yum kết hợp cùng sợi bún gạo dai ngon, tôm, mực, nấm, rau thơm. Món ăn mang hương vị Thái Lan hấp dẫn, kích thích vị giác.',
            'image_path' => '24d97774-f473-4422-951d-4981f663f6a7.png',
            'is_available' => true,
            'user_id' => $restaurant2->id,
            'category_id' => 0,
        ]);

        Product::create([
            'price' => 103000,
            'name' => 'Phở bò đặc biệt',
            'description' => 'Nước dùng ngọt thanh từ xương hầm, bánh phở mềm dai, thịt bò tái, nạm, gầu, hành lá, rau thơm. Món ăn quốc hồn quốc túy của Việt Nam, được yêu thích bởi hương vị đậm đà, tinh tế.',
            'image_path' => '9d8ea3a1-8ba3-4512-ac4c-e3bf098f99d8.png',
            'is_available' => false,
            'user_id' => $restaurant2->id,
            'category_id' => 0,
        ]);

        Product::create([
            'price' => 86000,
            'name' => 'Cơm tấm sườn bì chả',
            'description' => 'Cơm tấm dẻo thơm, sườn nướng vàng ươm, bì heo giòn bì, chả trứng béo ngậy, ăn kèm với nước mắm chua ngọt, dưa leo, cà chua. Món ăn quen thuộc của người Sài Gòn, mang hương vị bình dị nhưng đầy hấp dẫn.',
            'image_path' => '71ceb00c-a860-4a5f-b793-bf64b59da794.png',
            'is_available' => true,
            'user_id' => $restaurant2->id,
            'category_id' => 0,
        ]);

        Product::create([
            'price' => 82000,
            'name' => 'Bún ốc',
            'description' => 'Nước dùng chua thanh từ dấm bỗng, ốc giòn dai, cà chua, dọc mùng, rau thơm. Món ăn đặc sản của Hà Nội, mang hương vị thanh tao, dân dã.',
            'image_path' => 'a8ba486a-340e-41fb-9aad-2828c570d95e.png',
            'is_available' => true,
            'user_id' => $restaurant2->id,
            'category_id' => 0,
        ]);

        Product::create([
            'price' => 158000,
            'name' => 'Bánh xèo',
            'description' => 'Bánh tráng mỏng được tráng vàng giòn, nhân tôm, thịt, giá đỗ, ăn kèm với rau sống, nước mắm chua ngọt. Món ăn đặc sản miền Nam, mang hương vị thơm ngon, hấp dẫn.',
            'image_path' => '4a1a8b6c-4c1b-451f-bb2a-858465bf8518.png',
            'is_available' => true,
            'user_id' => $restaurant2->id,
            'category_id' => 0,
        ]);

        Product::create([
            'price' => 98000,
            'name' => 'Xíu mại bánh mì',
            'description' => 'Xíu mại mềm mịn, béo ngậy, pate thơm ngon, dưa chua giòn giòn, rau thơm, ớt, ăn kèm với bánh mì giòn tan. Món ăn đường phố phổ biến ở Việt Nam, mang hương vị đậm đà, kích thích vị giác.',
            'image_path' => '1c9c8fc4-926e-40dc-afda-3e5324f03bfc.png',
            'is_available' => true,
            'user_id' => $restaurant2->id,
            'category_id' => 0,
        ]);


        /* ----- */
        for ($i = 0; $i < 7; $i++) {
            Product::create([
                'price' => 82000,
                'name' => 'Chicken fettuccine',
                'description' => 'Chicken chicken',
                'image_path' => '0baf6ade-d782-405f-89f5-fdb77c03dd29.jpg',
                'is_available' => true,
                'user_id' => $restaurant3->id,
                'category_id' => 0,
            ]);
        }

        for ($i = 0; $i < 7; $i++) {
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

        for ($i = 0; $i < 7; $i++) {
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

        for ($i = 0; $i < 7; $i++) {
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

        for ($i = 0; $i < 7; $i++) {
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

        for ($i = 0; $i < 7; $i++) {
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

        for ($i = 0; $i < 7; $i++) {
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

        for ($i = 0; $i < 7; $i++) {
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
            'restaurant_name' => 'Cơm Niêu Sài Gòn',
            'user_id' => $restaurant2->id,
            'address' => '27 Tú Xương, Phường Võ Thị Sáu, Quận 3, Ho Chi Minh City, Vietnam',
            'phone_number' => '0826336888',
            'opening_time' => '06:00:00',
            'closing_time' => '23:00:00',
            'longitude' => '106.6879718',
            'latitude' => '10.781975',
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
            'restaurant_name' => 'Nàng Tấm',
            'user_id' => $restaurant10->id,
            'address' => '99 Đ. Nguyễn Huệ, Bến Nghé, Quận 1, Ho Chi Minh City, Vietnam',
            'phone_number' => '0938556666',
            'opening_time' => '10:00:00',
            'closing_time' => '21:30:00',
            'longitude' => '106.7031359',
            'latitude' => '10.7619617',
        ]);

        $user = User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => '12345678',
            'role_id' => 2,
        ]);

        /* Order1 */
        $restaurant1_order1 = Order::create([
            'user_id' => $user->id,
            'restaurant_id' => $restaurant1->id,
            'order_date' => now(),
            'status' => 'Pending',
            'payment_method' => 'cod',
            'total' => $restaurant1_product1->price + $restaurant1_product2->price + 30000,
            'code' => 300,
        ]);

        $order1_address = OrderAddress::create([
            'order_id' => $restaurant1_order1->id,
            'ward_id' => 10984,
            'address' => 'KTX KHU A',
            'phone_number' => '0939192021',
        ]);

        OrderDetail::create([
            'order_id' => $restaurant1_order1->id,
            'product_id' => $restaurant1_product1->id,
            'price' => $restaurant1_product1->price,
            'qty' => '1',
        ]);

        OrderDetail::create([
            'order_id' => $restaurant1_order1->id,
            'product_id' => $restaurant1_product2->id,
            'price' => $restaurant1_product2->price,
            'qty' => '1',
        ]);

        /* Order2 */
        $restaurant1_order2 = Order::create([
            'user_id' => $user->id,
            'restaurant_id' => $restaurant1->id,
            'order_date' => Carbon::create(2022, 1, 1, 1, 1),
            'status' => 'Completed',
            'payment_method' => 'cod',
            'total' => $restaurant1_product1->price + $restaurant1_product2->price + 30000,
            'code' => 301,
            'created_at' => Carbon::create(2022, 1, 1, 1, 1),
            'updated_at' => Carbon::create(2022, 1, 1, 1, 1),
        ]);

        $order2_address = OrderAddress::create([
            'order_id' => $restaurant1_order2->id,
            'ward_id' => 10984,
            'address' => 'KTX KHU B',
            'phone_number' => '0939192025',
            'created_at' => Carbon::create(2022, 1, 1, 1, 1),
            'updated_at' => Carbon::create(2022, 1, 1, 1, 1),
        ]);

        OrderDetail::create([
            'order_id' => $restaurant1_order2->id,
            'product_id' => $restaurant1_product1->id,
            'price' => $restaurant1_product1->price,
            'qty' => '1',
            'created_at' => Carbon::create(2022, 1, 1, 1, 1),
            'updated_at' => Carbon::create(2022, 1, 1, 1, 1),
        ]);

        OrderDetail::create([
            'order_id' => $restaurant1_order2->id,
            'product_id' => $restaurant1_product2->id,
            'price' => $restaurant1_product2->price,
            'qty' => '1',
            'created_at' => Carbon::create(2022, 1, 1, 1, 1),
            'updated_at' => Carbon::create(2022, 1, 1, 1, 1),
        ]);

        /* Order3 */
        $restaurant1_order3 = Order::create([
            'user_id' => $user->id,
            'restaurant_id' => $restaurant1->id,
            'order_date' => Carbon::create(2023, 3, 1, 1, 1),
            'status' => 'Completed',
            'payment_method' => 'cod',
            'total' => $restaurant1_product1->price + $restaurant1_product2->price + 30000,
            'code' => 303,
            'created_at' => Carbon::create(2023, 3, 1, 1, 1),
            'updated_at' => Carbon::create(2023, 3, 1, 1, 1),
        ]);

        OrderAddress::create([
            'order_id' => $restaurant1_order3->id,
            'ward_id' => 10984,
            'address' => 'KTX KHU B',
            'phone_number' => '0939192025',
            'created_at' => Carbon::create(2023, 3, 1, 1, 1),
            'updated_at' => Carbon::create(2023, 3, 1, 1, 1),
        ]);

        OrderDetail::create([
            'order_id' => $restaurant1_order3->id,
            'product_id' => $restaurant1_product1->id,
            'price' => $restaurant1_product1->price,
            'qty' => '1',
            'created_at' => Carbon::create(2023, 3, 1, 1, 1),
            'updated_at' => Carbon::create(2023, 3, 1, 1, 1),
        ]);

        OrderDetail::create([
            'order_id' => $restaurant1_order3->id,
            'product_id' => $restaurant1_product2->id,
            'price' => $restaurant1_product2->price,
            'qty' => '1',
            'created_at' => Carbon::create(2023, 3, 1, 1, 1),
            'updated_at' => Carbon::create(2023, 3, 1, 1, 1),
        ]);

        /* Order4 */
        $restaurant1_order4 = Order::create([
            'user_id' => $user->id,
            'restaurant_id' => $restaurant1->id,
            'order_date' => Carbon::create(2023, 7, 1, 1, 1),
            'status' => 'Completed',
            'payment_method' => 'cod',
            'total' => $restaurant1_product1->price + $restaurant1_product2->price + 30000,
            'code' => 304,
            'created_at' => Carbon::create(2023, 7, 1, 1, 1),
            'updated_at' => Carbon::create(2023, 7, 1, 1, 1),
        ]);

        OrderAddress::create([
            'order_id' => $restaurant1_order4->id,
            'ward_id' => 10984,
            'address' => 'KTX KHU B',
            'phone_number' => '0939192025',
            'created_at' => Carbon::create(2023, 7, 1, 1, 1),
            'updated_at' => Carbon::create(2023, 7, 1, 1, 1),
        ]);

        OrderDetail::create([
            'order_id' => $restaurant1_order4->id,
            'product_id' => $restaurant1_product1->id,
            'price' => $restaurant1_product1->price,
            'qty' => '1',
            'created_at' => Carbon::create(2023, 7, 1, 1, 1),
            'updated_at' => Carbon::create(2023, 7, 1, 1, 1),
        ]);

        OrderDetail::create([
            'order_id' => $restaurant1_order4->id,
            'product_id' => $restaurant1_product2->id,
            'price' => $restaurant1_product2->price,
            'qty' => '1',
            'created_at' => Carbon::create(2023, 7, 1, 1, 1),
            'updated_at' => Carbon::create(2023, 7, 1, 1, 1),
        ]);

        /* Order5 */
        $restaurant1_order5 = Order::create([
            'user_id' => $user->id,
            'restaurant_id' => $restaurant1->id,
            'order_date' => Carbon::create(2024, 3, 1, 1, 1),
            'status' => 'Completed',
            'payment_method' => 'cod',
            'total' => $restaurant1_product1->price + $restaurant1_product2->price + 30000,
            'code' => 305,
            'created_at' => Carbon::create(2024, 3, 1, 1, 1),
            'updated_at' => Carbon::create(2024, 3, 1, 1, 1),
        ]);

        OrderAddress::create([
            'order_id' => $restaurant1_order5->id,
            'ward_id' => 10984,
            'address' => 'KTX KHU B',
            'phone_number' => '0939192025',
            'created_at' => Carbon::create(2024, 3, 1, 1, 1),
            'updated_at' => Carbon::create(2024, 3, 1, 1, 1),
        ]);

        OrderDetail::create([
            'order_id' => $restaurant1_order5->id,
            'product_id' => $restaurant1_product1->id,
            'price' => $restaurant1_product1->price,
            'qty' => '1',
            'created_at' => Carbon::create(2024, 3, 1, 1, 1),
            'updated_at' => Carbon::create(2024, 3, 1, 1, 1),
        ]);

        OrderDetail::create([
            'order_id' => $restaurant1_order5->id,
            'product_id' => $restaurant1_product2->id,
            'price' => $restaurant1_product2->price,
            'qty' => '1',
            'created_at' => Carbon::create(2024, 3, 1, 1, 1),
            'updated_at' => Carbon::create(2024, 3, 1, 1, 1),
        ]);
    }
}
