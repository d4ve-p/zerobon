<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $product =[
            [
                'name' => "Zerobon Totebag",
                'price' => "25000",
                'description' => $faker->text(200),
                'image_filename' => "product_img\pic1.jpeg" 
            ],
                        [
                'name' => "Zerobon Tumbler",
                'price' => "90000",
                'description' => $faker->text(200),
                'image_filename' => "product_img\pic2.jpeg"
            ],
                        [
                'name' => "Bio Pot",
                'price' => "4000",
                'description' => $faker->text(200),
                'image_filename' => "product_img\pic3.jpeg"
            ],
                        [
                'name' => "Organic Fertilizer",
                'price' => "20000",
                'description' => $faker->text(200),
                'image_filename' => "product_img\pic4.jpeg"
            ],
                        [
                'name' => "Plant Seeds",
                'price' => "15000",
                'description' => $faker->text(200),
                'image_filename' =>  "product_img\pic5.jpeg"
            ],
                        [
                'name' => "Bamboo Straw",
                'price' => "15000",
                'description' => $faker->text(200),
                'image_filename' =>  "product_img\pic6.jpeg"
            ]
        ];

         DB::table('products')->insert($product);
    }
}
