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
                'avatar' => 'https://i.ibb.co/BGw0WB7/Code-One-Min.jpg',
                'level' => 0,
                'description' => 'Admin',

                'company_name'=> 'FPT APTECH',
                'country'=> 'Viêt Nam',
                'street_address'=> '8A Tôn Thất Thuyết',
                'town_city'=> 'Hà Nội',
                'postcode_zip'=> '100000',
                'phone'=> '0999999999',
            ],
            [
                'id' => 2,
                'name' => 'Ngô Mạnh Sơn',
                'email' => 'ngomanhson2004txpt@gmail.com',
                'password' => Hash::make('23102004'),
                'avatar' => 'https://i.ibb.co/PW3ks7w/Ngo-Manh-Son.jpg',
                'level' => 2,
                'description' => null,

                'company_name'=> 'FPT APTECH',
                'country'=> 'Viêt Nam',
                'street_address'=> '8A Tôn Thất Thuyết',
                'town_city'=> 'Hà Nội',
                'postcode_zip'=> '100000',
                'phone'=> '0999999999',
            ],
            [
                'id' => 3,
                'name' => 'Hà Hữu Hoàng',
                'email' => 'hahuuhoang732004@gmail.com',
                'password' => Hash::make('07032004'),
                'avatar' => 'https://i.ibb.co/FgXdDTN/Ha-Huu-Hoang.jpg',
                'level' => 2,
                'description' => null,

                'company_name'=> 'FPT APTECH',
                'country'=> 'Viêt Nam',
                'street_address'=> '8A Tôn Thất Thuyết',
                'town_city'=> 'Hà Nội',
                'postcode_zip'=> '100000',
                'phone'=> '0999999999',
            ],
            [
                'id' => 4,
                'name' => 'Phùng Văn Vũ',
                'email' => 'phungvu2711@gmail.com',
                'password' => Hash::make('17042004'),
                'avatar' => 'https://i.ibb.co/1Kn6XFT/PhungVu.jpg',
                'level' => 2,
                'description' => null,

                'company_name'=> 'FPT APTECH',
                'country'=> 'Viêt Nam',
                'street_address'=> '8A Tôn Thất Thuyết',
                'town_city'=> 'Hà Nội',
                'postcode_zip'=> '100000',
                'phone'=> '0999999999',
            ],

        ]);

        DB::table('blogs')->insert([
            [
                'user_id' => 3,
                'title' => 'The Personality Trait That Makes People Happier',
                'subtitle' =>'hhh',
                'image' => 'blog-1.jpg',
                'category' => 'TRAVEL',
                'content' => '',
            ],
            [
                'user_id' => 3,
                'title' => 'This was one of our first days in Hawaii last week.',
                'subtitle' =>'hhh',
                'image' => 'blog-2.jpg',
                'category' => 'CodeLeanON',
                'content' => '',
            ],
            [
                'user_id' => 3,
                'title' => 'Last week I had my first work trip of the year to Sonoma Valley',
                'subtitle' =>'hhh',
                'image' => 'blog-3.jpg',
                'category' => 'TRAVEL',
                'content' => '',
            ],
            [
                'user_id' => 3,
                'title' => 'Happppppy New Year! I know I am a little late on this post',
                'subtitle' =>'hhh',
                'image' => 'blog-4.jpg',
                'category' => 'CodeLeanON',
                'content' => '',
            ],
            [
                'user_id' => 3,
                'title' => 'Absolue collection. The Lancome team has been one…',
                'subtitle' =>'hhh',
                'image' => 'blog-5.jpg',
                'category' => 'MODEL',
                'content' => '',
            ],
            [
                'user_id' => 3,
                'title' => 'Writing has always been kind of therapeutic for me',
                'subtitle' =>'hhh',
                'image' => 'blog-6.jpg',
                'category' => 'CodeLeanON',
                'content' => '',
            ],
        ]);

        DB::table('brands')->insert([
            [
                'name' => 'Calvin Klein',
            ],
            [
                'name' => 'Diesel',
            ],
            [
                'name' => 'Polo',
            ],
            [
                'name' => 'Tommy Hilfiger',
            ],
        ]);

        DB::table('product_categories')->insert([
            [
                'name' => 'Men',
            ],
            [
                'name' => 'Women',
            ],
            [
                'name' => 'Kids',
            ],
        ]);

        DB::table('products')->insert([
            [
                'id' => 1,
                'brand_id' => 1,
                'product_category_id' => 2,
                'name' => 'Adidas Kaptir',
                'slug' => Str::slug('Adidas Kaptir'),
                'description' => 'Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor sum dolor sit amet, consectetur adipisicing elit, sed do mod tempor',
                'content' => '',
                'price' => 59.00,
                'qty' => 20,
                'discount' => 62,
                'weight' => 1.3,
                'sku' => '00012',
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 2,
                'brand_id' => 2,
                'product_category_id' => 2,
                'name' => 'Adidas Unisex-Child',
                'slug' => Str::slug('Adidas Unisex-Child'),
                'description' => null,
                'content' => null,
                'price' => 35,
                'qty' => 20,
                'discount' => 40,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 3,
                'brand_id' => 3,
                'product_category_id' => 2,
                'name' => 'Nike Kids Backpack',
                'slug' => Str::slug('Nike Kids Backpack'),
                'description' => null,
                'content' => null,
                'price' => 12,
                'qty' => 20,
                'discount' => 15,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 4,
                'brand_id' => 4,
                'product_category_id' => 1,
                'name' => 'Adidas Ultraboost 22',
                'slug' => Str::slug('Adidas Ultraboost 22'),
                'description' => null,
                'content' => null,
                'price' => 64,
                'qty' => 20,
                'discount' => 69,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Accessories',
            ],
            [
                'id' => 5,
                'brand_id' => 1,
                'product_category_id' => 3,
                'name' => "Badge Of Sport Motion",
                'slug' => Str::slug('Badge Of Sport Motion'),
                'description' => null,
                'content' => null,
                'price' => 19,
                'qty' => 20,
                'discount' => 23,
                'weight' => null,
                'sku' => null,
                'featured' => false,
                'tag' => 'Accessories',
            ],
            [
                'id' => 6,
                'brand_id' => 1,
                'product_category_id' => 2,
                'name' => 'Adidas Unisex Accuracy',
                'slug' => Str::slug('Adidas Unisex Accuracy'),
                'description' => null,
                'content' => null,
                'price' => 35,
                'qty' => 20,
                'discount' => 39,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 7,
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => 'Pastel thermos bottle',
                'slug' => Str::slug('Pastel thermos bottle'),
                'description' => null,
                'content' => null,
                'price' => 7,
                'qty' => 20,
                'discount' => 9,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'HandBag',
            ],
            [
                'id' => 8,
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => 'Adidas Courtjam Control',
                'slug' => Str::slug('Adidas Courtjam Control'),
                'description' => null,
                'content' => null,
                'price' => 69,
                'qty' => 20,
                'discount' => 77,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 9,
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => 'Bag Power',
                'slug' => Str::slug('Bag Power'),
                'description' => null,
                'content' => null,
                'price' => 35,
                'qty' => 20,
                'discount' => 34,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Shoes',
            ],
        ]);

        DB::table('product_images')->insert([
            [
                'product_id' => 1,
                'path' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/0846e90b15144861b33dacf500e3cfd1_9366/Kaptir_2.0_Shoes_White_H00276_01_standard.jpg',
            ],
            [
                'product_id' => 1,
                'path' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/3ccc7c7e068a47889378acf500e3eb46_9366/Kaptir_2.0_Shoes_White_H00276_04_standard.jpg',
            ],
            [
                'product_id' => 1,
                'path' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/dbb4d73e94694515a547acf500e3f1f3_9366/Kaptir_2.0_Shoes_White_H00276_05_standard.jpg',
            ],
            [
                'product_id' => 1,
                'path' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/e17fcadb756b4823bd32acf500e3d617_9366/Kaptir_2.0_Shoes_White_H00276_06_standard.jpg',
            ],
            [
                'product_id' => 2,
                'path' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/183c827729cb446583cdad0a00b238f7_9366/X_Speedflow.3_Firm_Ground_Boots_Grey_FY3297_01_standard.jpg',
            ],
            [
                'product_id' => 2,
                'path' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/c0d41c2b4f9a4e7ca162ad0a00b25221_9366/X_Speedflow.3_Firm_Ground_Boots_Grey_FY3297_04_standard.jpg',
            ],
            [
                'product_id' => 2,
                'path' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/2b735cae81464966b4f0ad0a00b2584b_9366/X_Speedflow.3_Firm_Ground_Boots_Grey_FY3297_05_standard.jpg',
            ],
            [
                'product_id' => 2,
                'path' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/e454bd4a9e1542cc8681ad0a00b23f59_9366/X_Speedflow.3_Firm_Ground_Boots_Grey_FY3297_06_standard.jpg',
            ],
            [
                'product_id' => 3,
                'path' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/efa12034-edc3-4463-aedf-759f655df8a0/backpack-lKwr7b.png',
            ],
            [
                'product_id' => 3,
                'path' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/9710bebe-87d7-4941-8230-b16038878ad2/backpack-lKwr7b.png',
            ],[
                'product_id' => 3,
                'path' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/08f126a9-b3e3-44f9-b0df-57050ea15972/backpack-lKwr7b.png',
            ],[
                'product_id' => 3,
                'path' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/1929eba0-cefc-4679-81e9-e8634013f48c/backpack-lKwr7b.png',
            ],
            [
                'product_id' => 4,
                'path' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/f042b05ad1bf4d51b7dfaf1600054038_9366/Giay_Ultraboost_1.0_trang_HQ4202_01_standard.jpg',
            ],
            [
                'product_id' => 4,
                'path' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/4b5ec88318204e548d24af1600058a59_9366/Giay_Ultraboost_1.0_trang_HQ4202_05_standard.jpg',
            ],
            [
                'product_id' => 4,
                'path' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/aeab39b6e4af428abdb7af1600056580_9366/Giay_Ultraboost_1.0_trang_HQ4202_06_standard.jpg',
            ],
            [
                'product_id' => 4,
                'path' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/f4a83445e9de4bc58e82af16000742de_9366/Giay_Ultraboost_1.0_trang_HQ4202_04_standard.jpg',
            ],
            [
                'product_id' => 5,
                'path' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/b3684cd8d09741a9b5feae4d00f98db4_9366/Ba_Lo_Bage_of_Sport_Motion_DJen_HG0356_01_standard.jpg',
            ],
            [
                'product_id' => 5,
                'path' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/4d999079d6904338a1a8ae4d00f996a0_9366/Ba_Lo_Bage_of_Sport_Motion_DJen_HG0356_02_standard.jpg',
            ],
            [
                'product_id' => 5,
                'path' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/5d4613f97755449cb6c7ae4d00f9a1c5_9366/Ba_Lo_Bage_of_Sport_Motion_DJen_HG0356_04_standard.jpg',
            ],
            [
                'product_id' => 5,
                'path' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/fbec7d50635841a0ac8fae4d00f9adfe_9366/Ba_Lo_Bage_of_Sport_Motion_DJen_HG0356_05_hover_standard.jpg',
            ],
            [
                'product_id' => 6,
                'path' => 'https://assets.adidas.com/images/w_1880,f_auto,q_auto/8a31294dc0b7494e8f06af8c00f51857_9366/FZ6281_01_standard_hover.jpg',
            ],
            [
                'product_id' => 6,
                'path' => 'https://assets.adidas.com/images/w_1880,f_auto,q_auto/8a31294dc0b7494e8f06af8c00f51857_9366/FZ6281_01_standard_hover.jpg',
            ],
            [
                'product_id' => 6,
                'path' => 'https://assets.adidas.com/images/w_1880,f_auto,q_auto/f8e56f55a56a41eb80aaaf8c00f54385_9366/FZ6281_04_standard.jpg',
            ],
            [
                'product_id' => 6,
                'path' => 'https://assets.adidas.com/images/w_1880,f_auto,q_auto/f8e56f55a56a41eb80aaaf8c00f54385_9366/FZ6281_04_standard.jpg',
            ],
            [
                'product_id' => 7,
                'path' => 'https://lason.vn/wp-content/uploads/2023/05/nen-san-pham-1ff-min.jpg',
            ],
            [
                'product_id' => 7,
                'path' => 'https://lason.vn/wp-content/uploads/2023/05/nen-san-pham-qqqq1-min.jpg',
            ],
            [
                'product_id' => 7,
                'path' => 'https://lason.vn/wp-content/uploads/2023/05/nen-san-pham-1aa-min-768x768.jpg',
            ],
            [
                'product_id' => 7,
                'path' => 'https://lason.vn/wp-content/uploads/2023/05/nen-san-pham-1sa-min-768x768.jpg',
            ],
            [
                'product_id' => 8,
                'path' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/9bca5d1660284cee8395ceed10f91491_9366/CourtJam_Control_Tennis_Shoes_Black_ID1535_01_standard.jpg',
            ],
            [
                'product_id' => 8,
                'path' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/e667614a889b4b2eb5c9381526b23712_9366/CourtJam_Control_Tennis_Shoes_Black_ID1535_04_standard.jpg',
            ],
            [
                'product_id' => 8,
                'path' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/ae80b37b6835444899fa0c6a4f0d8558_9366/CourtJam_Control_Tennis_Shoes_Black_ID1535_05_standard.jpg',
            ],
            [
                'product_id' => 8,
                'path' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/eba81af0b85545038ac79b8263809393_9366/CourtJam_Control_Tennis_Shoes_Black_ID1535_06_standard.jpg',
            ],
            [
                'product_id' => 9,
                'path' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/b3684cd8d09741a9b5feae4d00f98db4_9366/Ba_Lo_Bage_of_Sport_Motion_DJen_HG0356_01_standard.jpg',
            ],
            [
                'product_id' => 9,
                'path' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/4d999079d6904338a1a8ae4d00f996a0_9366/Ba_Lo_Bage_of_Sport_Motion_DJen_HG0356_02_standard.jpg',
            ],
            [
                'product_id' => 9,
                'path' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/5d4613f97755449cb6c7ae4d00f9a1c5_9366/Ba_Lo_Bage_of_Sport_Motion_DJen_HG0356_04_standard.jpg',
            ],
            [
                'product_id' => 9,
                'path' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/fbec7d50635841a0ac8fae4d00f9adfe_9366/Ba_Lo_Bage_of_Sport_Motion_DJen_HG0356_05_hover_standard.jpg',
            ],
        ]);

        DB::table('product_details')->insert([
            [
                'product_id' => 1,
                'color' => 'blue',
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 1,
                'color' => 'blue',
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 1,
                'color' => 'blue',
                'size' => 'L',
                'qty' => 5,
            ],
            [
                'product_id' => 1,
                'color' => 'blue',
                'size' => 'XS',
                'qty' => 5,
            ],
            [
                'product_id' => 1,
                'color' => 'yellow',
                'size' => 'S',
                'qty' => 0,
            ],
            [
                'product_id' => 1,
                'color' => 'violet',
                'size' => 'S',
                'qty' => 0,
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
            ],
            [
                'product_id' => 1,
                'user_id' => 5,
                'email' => 'RoyBanks@gmail.com',
                'name' => 'Roy Banks',
                'messages' => 'Nice !',
                'rating' => 4,
            ],
        ]);
    }
}

