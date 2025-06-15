<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $challenge =[
          [
            "name" => "Go to TreeFund and Donate Tree",
            "description" => $faker->text(),
            "point_reward" => $faker->numberBetween(10, 50),
            "start_date" => $faker->dateTimeBetween("now", "+1days"),
            "end_date" => $faker->dateTimeBetween("+10days", "+30days")
          ],  
                    [
            "name" => "Join the #ReduceCarbonChallenge on IG Story",
            "description" => $faker->text(),
            "point_reward" => $faker->numberBetween(10, 50),
            "start_date" => $faker->dateTimeBetween("now", "+2days"),
            "end_date" => $faker->dateTimeBetween("+10days", "+30days")
          ],  
          [
            "name" => "Using Public Transportation ",
            "description" => $faker->text(),
            "point_reward" => $faker->numberBetween(10, 50),
            "start_date" => $faker->dateTimeBetween("now", "+1days"),
            "end_date" => $faker->dateTimeBetween("+10days", "+30days")
          ],  
          [
            "name" => "Go to TreeFund and Donate Tree",
            "description" => $faker->text(),
            "point_reward" => $faker->numberBetween(10, 50),
            "start_date" => $faker->dateTimeBetween("now", "+2days"),
            "end_date" => $faker->dateTimeBetween("+10days", "+30days")
          ],  
          [
            "name" => "Join Car-Free Day",
            "description" => $faker->text(),
            "point_reward" => $faker->numberBetween(10, 50),
            "start_date" => $faker->dateTimeBetween("now", "+2days"),
            "end_date" => $faker->dateTimeBetween("+10days", "+30days")
          ],
          [
            "name" => "Use a Reusable Water Bottle",
            "description" => $faker->text(),
            "point_reward" => $faker->numberBetween(10, 50),
            "start_date" => $faker->dateTimeBetween("now", "+1days"),
            "end_date" => $faker->dateTimeBetween("+10days", "+30days")
          ]
        ];

         DB::table('challenges')->insert($challenge);
    }
}
