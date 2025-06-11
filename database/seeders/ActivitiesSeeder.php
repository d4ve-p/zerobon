<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $activities = [
            [
                'title'=>'Car-Free Day in Jakarta',
                'organizer'=>'Dishub DKI Jakarta',
                'photo'=>'activities_img\pic1.jpeg',
                'location'=>'Jl. Jend. Sudirman - Jl. MH Thamrin',
                'date'=>'Sunday, 15 June 2025',
                'time'=>'06.00 - 11.00 WIB',
                'slots'=>'Unlimited',
                'fee'=>'Free',
                'registration'=>'Not required',
                'contact_person'=>'-',
                'barcode_photo'=>'barcode\not_available.png',
                'description'=> $faker->paragraphs(8, true)
            ],
            [
                'title'=>'Monthly Cleanup Day 2025',
                'organizer'=>'UN-Habitat',
                'photo'=>'activities_img\pic2.jpeg',
                'location'=>'Tebet Eco Park, South Jakarta',
                'date'=>'Saturday, 20 September 2025',
                'time'=>'08.00 - 11.00 WIB',
                'slots'=>'Unlimited',
                'fee'=>'Free',
                'registration'=>'Not required',
                'contact_person'=>'08117765256 (Adit)',
                'barcode_photo'=>'barcode\not_available.png',
                'description'=> $faker->paragraphs(8, true)
            ],
            [
                'title'=>'Community Clean-up',
                'organizer'=>'UCLG ASPAC',
                'photo'=>'activities_img\pic3.jpeg',
                'location'=>'Kalibaru, North Jakarta',
                'date'=>'Sunday, 14 September 2025',
                'time'=>'07.30 - 10.00 WIB',
                'slots'=>'Limited',
                'fee'=>'Free',
                'registration'=>'Required',
                'contact_person'=>'08117765233 (Jimmy)',
                'barcode_photo'=>'barcode\barcode.png',
                'description'=> $faker->paragraphs(10, true)
            ],
            [
                'title'=>'Jakarta Beach Cleanup',
                'organizer'=>'Jakarta Green Team',
                'photo'=>'activities_img\pic4.jpeg',
                'location'=>'Pantai Ancol, North Jakarta',
                'date'=>'Thursday, 19 June 2025',
                'time'=>'08.00 - 11.00 wib',
                'slots'=>'Limited',
                'fee'=>'Free',
                'registration'=>'Required',
                'contact_person'=>'08117665243 (Rini)',
                'barcode_photo'=>'barcode\barcode.png',
                'description'=>$faker->paragraphs(11, true)
            ],
            [
                'title'=>'Tree Planting Day',
                'organizer'=>'PemKot Bandung',
                'photo'=>'activities_img\pic5.jpeg',
                'location'=>'Bandung Botanical Garden',
                'date'=>'Saturday, 19 June 2025',
                'time'=>'09.00 - 14.00 WIB',
                'slots'=>'Limited',
                'fee'=>'Paid',
                'registration'=>'Required',
                'contact_person'=>'08117445242 (Didi)',
                'barcode_photo'=>'barcode\barcode.png',
                'description'=>$faker->paragraphs(9, true)
            ],
            [
                'title'=>'Sustainable Cooking Class',
                'organizer'=>'EcoKitchen',
                'photo'=>'activities_img\pic6.jpeg',
                'location'=>'EcoKitchen Studio, Bandung',
                'date'=>'Sunday, 8 June 2025',
                'time'=>'14.00 - 16.00 WIB',
                'slots'=>'Limited',
                'fee'=>'Paid',
                'registration'=>'Required',
                'contact_person'=>'08117433241 (Olive)',
                'barcode_photo'=>'barcode\barcode.png',
                'description'=>$faker->paragraphs(9, true)
            ],
            [
                'title' => 'Urban Farming Workshop',
                'organizer' => 'GreenHouse ID',
                'photo' => 'activities_img\pic7.jpeg',
                'location' => 'Ruang Publik Hijau, Jakarta Selatan',
                'date' => 'Saturday, 29 June 2025',
                'time' => '10.00 - 16.00 WIB',
                'slots' => 'Limited',
                'fee' => 'Paid',
                'registration' => 'Required',
                'contact_person' => '087712349876 (Bimo)',
                'barcode_photo' => 'barcode\barcode.png',
                'description'=>$faker->paragraphs(11, true)
            ],
            [
                'title' => 'Composting 101: Learn & Practice',
                'organizer' => 'Zero Waste Nusantara',
                'photo' => 'activities_img\pic8.jpeg',
                'location' => 'Taman Menteng, Jakarta Pusat',
                'date' => 'Saturday, 13 July 2025',
                'time' => '09.00 - 12.00 WIB',
                'slots' => 'Limited',
                'fee' => 'Paid',
                'registration' => 'Required',
                'contact_person' => '081234567890 (Tari)',
                'barcode_photo' => 'barcode\barcode.png',
                'description'=>$faker->paragraphs(11, true)
            ],
            [
                'title' => 'Mangrove Replanting Day',
                'organizer' => 'Save Our Coastline',
                'photo' => 'activities_img\pic9.jpeg',
                'location' => 'Kawasan Pesisir Marunda, Jakarta Utara',
                'date' => 'Sunday, 20 July 2025',
                'time' => '08.00 - 13.00 WIB',
                'slots' => 'Limited',
                'fee' => 'Free',
                'registration' => 'Required',
                'contact_person' => '089876543210 (Raka)',
                'barcode_photo' => 'barcode\barcode.png',
                'description'=>$faker->paragraphs(11, true)
            ],
            [
                'title' => 'Green Walk: Nature & Mindfulness',
                'organizer' => 'Nature & Wellness Club',
                'photo' => 'activities_img\pic10.jpeg',
                'location' => 'Hutan Kota GBK, Jakarta',
                'date' => 'Sunday, 3 August 2025',
                'time' => '06.30 - 09.30 WIB',
                'slots' => 'Limited',
                'fee' => 'Free',
                'registration' => 'Not Required',
                'contact_person' => '087812341234 (Yoga)',
                'barcode_photo' => 'barcode\not_available.png',
                'description'=>$faker->paragraphs(11, true)
            ]
        ];

        DB::table('activities')->insert($activities);
    }
}
