<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Code One Min',
                'email' => 'codeonemin@gmail.com',
                'password' => Hash::make('codeonemin2023'),

                'level' => 0,
                'description' => 'Admin',

                'company_name'=> 'FPT APTECH',
                'country'=> 'Viêt Nam',
                'street_address'=> '8A Tôn Thất Thuyết',
                'town_city'=> 'Hà Nội',
                'postcode_zip'=> '100000',
                'phone'=> '0999919999',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Ngô Mạnh Sơn',
                'email' => 'ngomanhson2004txpt@gmail.com',
                'password' => Hash::make('23102004'),

                'level' => 1,
                'description' => null,

                'company_name'=> 'FPT APTECH',
                'country'=> 'Viêt Nam',
                'street_address'=> '8A Tôn Thất Thuyết',
                'town_city'=> 'Hà Nội',
                'postcode_zip'=> '100000',
                'phone'=> '0929999999',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Hà Hữu Hoàng',
                'email' => 'hahuuhoang732004@gmail.com',
                'password' => Hash::make('07032004'),

                'level' => 2,
                'description' => null,

                'company_name'=> 'FPT APTECH',
                'country'=> 'Viêt Nam',
                'street_address'=> '8A Tôn Thất Thuyết',
                'town_city'=> 'Hà Nội',
                'postcode_zip'=> '100000',
                'phone'=> '0999999959',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Phùng Văn Vũ',
                'email' => 'phungvu2711@gmail.com',
                'password' => Hash::make('17042004'),

                'level' => 2,
                'description' => null,

                'company_name'=> 'FPT APTECH',
                'country'=> 'Viêt Nam',
                'street_address'=> '8A Tôn Thất Thuyết',
                'town_city'=> 'Hà Nội',
                'postcode_zip'=> '100000',
                'phone'=> '0999999979',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        DB::table('blogs')->insert([
            [
                'user_id' => 3,
                'title' => 'Hello everyone. My name is Phung Vu!',
                'slug' => Str::slug('Hello everyone. My name is Phung Vu!'),
                'subtitle' =>'hhh',
                'image' => 'front/img/blog/PhungVu-Blog.jpg',
                'category' => 'TRAVEL',
                'content' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'title' => 'This was one of our first days in Hawaii last week.',
                'slug' => Str::slug('This was one of our first days in Hawaii last week'),
                'subtitle' =>'hhh',
                'image' => 'front/img/blog/blog-2.jpg',
                'category' => 'CodeOneMin',
                'content' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'title' => 'Last week I had my first work trip of the year to Sonoma Valley.',
                'slug' => Str::slug('Last week I had my first work trip of the year to Sonoma Valley'),
                'subtitle' =>'hhh',
                'image' => 'front/img/blog/blog-3.jpg',
                'category' => 'TRAVEL',
                'content' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'title' => 'Happy New Year! I know I am a little late on this post.',
                'slug' => Str::slug('Happy New Year! I know I am a little late on this post'),
                'subtitle' =>'hhh',
                'image' => 'front/img/blog/blog-4.jpg',
                'category' => 'CodeOneMin',
                'content' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'title' => 'Absolue collection. The Lancome team has been one…',
                'slug' => Str::slug('Absolue collection. The Lancome team has been one'),
                'subtitle' =>'hhh',
                'image' => 'front/img/blog/blog-5.jpg',
                'category' => 'MODEL',
                'content' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'title' => 'Writing has always been kind of therapeutic for me.',
                'slug' => Str::slug('Writing has always been kind of therapeutic for me'),
                'subtitle' =>'hhh',
                'image' => 'front/img/blog/blog-6.jpg',
                'category' => 'CodeOneMin',
                'content' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('product_comments')->insert([
            [
                'product_id' => 1,
                'user_id' => 4,
                'email' => 'ngomanhson2004txpt@gmail.com',
                'name' => 'Ngô Mạnh Sơn',
                'messages' => 'Nice !',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 1,
                'user_id' => 5,
                'email' => 'RoyBanks@gmail.com',
                'name' => 'Roy Banks',
                'messages' => 'Nice !',
                'rating' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('brands')->insert([
            [
                'name' => 'Adidas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nike',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Puma',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kappa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Li-Ning',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mizuno',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('product_categories')->insert([
            [
                'name' => 'Men',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Women',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('products')->insert([
            [
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => 'Hat Running Rain-RDY',
                'slug' => Str::slug('Hat Running Rain-RDY'),
                'description' => 'It feels great to run in the rain. This adidas RAIN.RDY cap uses advanced technology to keep rainwater out of your head, allowing you to stay focused in wet conditions. The hat features a baseball-style six-pack and a curved brim, with reflective details that stand out in low light.',
                'content' => '',
                'price' => 20,
                'qty' => 30,
                'discount' => 35,
                'weight' => null,
                'sku' =>  Str::random(8),
                'featured' => true,
                'tag' => 'Hats',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => 'Hat Aerorready',
                'slug' => Str::slug('Hat Aerorready'),
                'description' => 'This adidas half-cap is perfect for tennis courts, training courts and running tracks.AEROREADY technology wicks away moisture to keep you dry and comfortable, while a curved cap protects your eyes from the sun.Silicone logo Embossed with sporty accents.',
                'content' => null,
                'price' => 18,
                'qty' => 25,
                'discount' => 21,
                'weight' => null,
                'sku' => Str::random(8),
                'featured' => true,
                'tag' => 'Hats',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => ' Adidas Ultraboost 22',
                'slug' => Str::slug(' Adidas Ultraboost 22'),
                'description' => 'These womens adidas Ultraboost shoes for running have a breathable open knit upper that provides extra ventilation in key sweat zones. Responsive Boost cushioning returns energy with every step. A Continental Rubber outsole gives all the traction you need.',
                'content' => null,
                'price' => 179,
                'qty' => 5,
                'discount' => 219,
                'weight' => null,
                'sku' => Str::random(8),
                'featured' => true,
                'tag' => 'Shoes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_id' => 2,
                'product_category_id' => 2,
                'name' => ' Nike Air Monarch IV',
                'slug' => Str::slug(' Nike Air Monarch IV'),
                'description' => 'Mens Nike Air Monarch IV  Training Shoe sets you up for comfortable training with durable leather on top for support. A lightweight foam midsole with a full-length encapsultaed Air-Sole unit cushions every stride in the mens sneaker.',
                'content' => null,
                'price' => 159,
                'qty' => 5,
                'discount' => 179,
                'weight' => null,
                'sku' => Str::random(8),
                'featured' => true,
                'tag' => 'Shoes',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        DB::table('product_images')->insert([
            [
                'product_id' => 1,
                'path' => 'product-1.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 1,
                'path' => 'product-1.2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 1,
                'path' => 'product-1.3.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 1,
                'path' => 'product-1.4.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'path' => 'product-4.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'path' => 'product-4.2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'path' => 'product-4.3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'path' => 'product-4.4.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'path' => 'product-2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'path' => 'product-2.2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'product_id' => 2,
                'path' => 'product-2.3.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'path' => 'product-2.4.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 4,
                'path' => 'product-5.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'product_id' => 4,
                'path' => 'product-5.2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'product_id' => 4,
                'path' => 'product-5.3.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'product_id' => 4,
                'path' => 'product-5.4.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        DB::table('product_details')->insert([
            [
                'product_id' => 3,
                'size' => '39',
                'qty' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'size' => '40',
                'qty' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'size' => '41',
                'qty' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'size' => '42',
                'qty' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 4,
                'size' => '39',
                'qty' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 4,
                'size' => '40',
                'qty' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 4,
                'size' => '41',
                'qty' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 4,
                'size' => '42',
                'qty' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);


    }
}

