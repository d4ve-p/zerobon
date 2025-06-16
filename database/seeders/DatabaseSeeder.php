<?php

namespace Database\Seeders;

use App\Models\Challenge;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Voucher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Product::factory()->count(20)->create();
        $this->call(
            ArticleSeeder::class
        );

        $this->call(
            ActivitiesSeeder::class
        );

        $this->call(
            ChallengeSeeder::class
        );

        $this->call(
            ProductSeeder::class
        );
 
        $this->call(
            VoucherSeeder::class
        );
        //Challenge::factory()->count(10)->create();
        //Voucher::factory()->count(10)->create();
    }
}
