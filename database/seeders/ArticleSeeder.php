<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $articles =[
            [
                'title'=>'Jakarta Celebrates Earth Day: 1 Hour Without Lights Reduces 297 Tons of CO₂ Emissions',
                'photo'=>'articles_img\pic1.png',
                'author'=> 'Author 1',
                'publish_date'=>'2025-05-04',
                'description'=> $faker->paragraphs(5, true)
            ],
            [
                'title'=>'Small Steps, Big Impact: How Daily Habits Help the Planet',
                'photo'=>'articles_img\pic2.png',
                'author'=> 'Author 2',
                'publish_date'=>'2025-03-01',
                'description'=> $faker->paragraphs(5, true)
            ],
            [
                'title'=>'The Power of Mindful Eating: A Healthier You and a Greener Earth',
                'photo'=>'articles_img\pic3.png',
                'author'=> 'Author 3',
                'publish_date'=>'2025-12-14',
                'description'=> $faker->paragraphs(6, true)
            ],
            [
                'title'=>'Green Homes: Creating an Eco-Friendly Living Space',
                'photo'=>'articles_img\pic4.png',
                'author'=> 'Author 4',
                'publish_date'=>'2024-12-24',
                'description'=> $faker->paragraphs(5, true)
            ],
            [
                'title'=>'Reconnect with Nature: The Benefits of Outdoor Activities',
                'photo'=>'articles_img\pic5.png',
                'author'=> 'Author 5',
                'publish_date'=>'2025-04-05',
                'description'=> $faker->paragraphs(7, true)
            ],
            [
                'title'=>'Bali Bans Production of Single-Use Plastic Bottled Water Under 1 Liter',
                'photo'=>'articles_img\pic6.png',
                'author'=> 'Author 2',
                'publish_date'=>'2025-03-01',
                'description'=> $faker->paragraphs(6, true)
            ],
            [
                'title'=>'Indonesia to Launch Forest-Based Carbon Offset Trading',
                'photo'=>'articles_img\pic7.png',
                'author'=> 'Author 2',
                'publish_date'=>'2025-03-02',
                'description'=> $faker->paragraphs(5, true)
            ],
            [
                'title'=>'MEGABUILD Indonesia 2025 Promotes Sustainable Housing Innovation',
                'photo'=>'articles_img\pic8.png',
                'author'=> 'Author 3',
                'publish_date'=>'2025-03-05',
                'description'=> $faker->paragraphs(8, true)
            ],
            [
                'title'=>'Upper Cisokan Hydropower Plant to Boost Indonesia’s Renewable Energy Capacity',
                'photo'=>'articles_img\pic9.png',
                'author'=> 'Author 2',
                'publish_date'=>'2025-03-10',
                'description'=> $faker->paragraphs(7, true)
            ],
            [
                'title'=>'Go Green Festival: Tzu Chi Palembang and Palembang Indah Mall Collaborate',
                'photo'=>'articles_img\pic10.png',
                'author'=> 'Author 1',
                'publish_date'=>'2025-03-11',
                'description'=> $faker->paragraphs(7, true)
            ]
        ];

        DB::table('articles')->insert($articles);
    }
}
