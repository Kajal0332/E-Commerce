<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->truncate();
        //
        $product = DB::table('products')->insert([
            [
                
                'product_name' => 'LG TV',
                'price' => '34500',
                'image' => 'https://pisces.bbystatic.com/image2/BestBuy_US/images/products/5679/5679628ld.jpg',
                'category' => 'TV', // If using string category, or use 'category_id'
                'description' => 'A smart TV With great Freatures',
            ],
            [
                'product_name' => 'Oppo 5g',
                'price' => '35500',
                'image' => 'https://www.oppo.com/content/dam/oppo/common/mkt/v2-2/reno13-series/navigation/reno13-f-5g/purple-440-440.png',
                'category' => 'Mobile', // If using string category, or use 'category_id'
                'description' => 'A smart Phone With great Freatures, Oppo 10 pro 5g',
            ],
            [
                'product_name' => 'yillto A-Line Dress',
                'price' => '1500',
                'image' => 'https://i5.walmartimages.com/seo/yillto-A-Line-Dress-for-Women-Midi-V-Neck-Short-Sleeve-Dress-Fashion-Elegant-Solid-Color-Dresses_64e7a955-005b-4786-81c9-28fb9e239ff1.4a8172c6e988f3fbe2335901b6f0cce7.jpeg',
                'category' => 'Women wear', // If using string category, or use 'category_id'
                'description' => 'yillto A-Line Dress for Women Midi V Neck Short Sleeve Dress Fashion Elegant Solid Color Dresses',
            ],
            [
                'product_name' => 'Men Stylish cort',
                'price' => '5000',
                'image' => 'https://i.pinimg.com/originals/23/76/fe/2376fe6449d5f07dab0261380f97ac69.png',
                'category' => 'Men wear', // If using string category, or use 'category_id'
                'description' => 'Men cort for every indian guy whatever shades he has',
            ],
            [
                'product_name' => 'Pink Frok',
                'price' => '500',
                'image' => 'https://i.pinimg.com/1200x/7b/a1/c7/7ba1c74c22d500bb7928f9fa6f604408.jpg',
                'category' => 'Child wear', // If using string category, or use 'category_id'
                'description' => 'Beautiful ppink child wear frok',
            ]
        ]);

    }
}
