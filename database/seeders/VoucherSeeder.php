<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker =  Faker::create();
        $voucher =[
            [
                "name" => "I-Voucher Indomaret Worth Rp100.000",
                "amount" => "0",
                "point_price" => "8500",
                "image_path" => "voucher_img\pic1.jpeg"
            ],
            [
                "name" => "I-Voucher Indomaret Worth Rp50.000",
                "amount" => "0",
                "point_price" => "6500",
                "image_path" => "voucher_img\pic1.jpeg"
            ],
            [
                "name" => "Rp30.000 JakLingko Top-Up (Only at Indomaret)",
                "amount" => "0",
                "point_price" => "5000",
                "image_path" => "voucher_img\pic2.jpeg"
            ],
            [
                "name" => "Get Free Delivery at EcoMarket",
                "amount" => "100",
                "point_price" => "3750",
                "image_path" => "voucher_img\pic3.jpeg"
            ],
            [
                "name" => "25% Discount at EcoMarket",
                "amount" => "25",
                "point_price" => "2250",
                "image_path" => "voucher_img\pic4.jpeg"
            ],
            [
                "name" => "10% Discount at EcoMarket",
                "amount" => "10",
                "point_price" => "1500",
                "image_path" => "voucher_img\pic4.jpeg"
            ]
        ];
        
        DB::table('vouchers')->insert($voucher);
    }
}
