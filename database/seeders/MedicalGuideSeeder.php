<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicalGuideSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => [
                    'ar' => 'المستشفى الجوي التخصصي',
                    'en' => 'Specialized Air Hospital'
                ],
                'description' => [
                  'ar' => 'مستشفى تخصصى',
                  'en' => 'Specialized  Hospital'
                ],
                'type' => 'hospital',
                'address' => [
                    'ar' => 'شارع التسعين الجنوبي، التجمع الخامس، القاهرة',
                    'en' => 'شارع التسعين الجنوبي، التجمع الخامس، القاهرة',
                ],
                'lat' => 30.009398,
                'lng' => 31.434605,
                'is_active' => true,
            ],
            [
                'title' => [
                    'ar' => 'المستشفى الجوي التخصصي2',
                    'en' => 'Specialized Air Hospital'
                ],
                'description' => [
                    'ar' => 'مستشفى تخصصى',
                    'en' => 'Specialized  Hospital'
                ],
                'type' => 'hospital',
                'address' => [
                    'ar' => 'شارع التسعين الجنوبي، التجمع الخامس، القاهرة',
                    'en' => 'شارع التسعين الجنوبي، التجمع الخامس، القاهرة',
                ],
                'lat' => 30.009398,
                'lng' => 31.434605,
                'is_active' => true,
            ],
            [
                'title' => [
                    'ar' => 'دكتور احمد محمد',
                    'en' => 'doctor ahmed mohamed'
                ],
                'description' => [
                    'ar' => "Dermatology and Cosmetic Consultant",
                    'en' => 'Specialized  Hospital'
                ],
                'type' => 'doctor',
                'address' => [
                    'ar' => 'شارع التسعين الجنوبي، التجمع الخامس، القاهرة',
                    'en' => 'شارع التسعين الجنوبي، التجمع الخامس، القاهرة',
                ],
                'lat' => 30.009398,
                'lng' => 31.434605,
                'is_active' => true,
            ],
            [
                'title' => [
                    'ar' => 'دكتور احمد محمد2',
                    'en' => 'doctor ahmed mohamed'
                ],
                'description' => [
                    'ar' => "Dermatology and Cosmetic Consultant",
                    'en' => 'Specialized  Hospital'
                ],
                'type' => 'doctor',
                'address' => [
                    'ar' => 'شارع التسعين الجنوبي، التجمع الخامس، القاهرة',
                    'en' => 'شارع التسعين الجنوبي، التجمع الخامس، القاهرة',
                ],
                'lat' => 30.009398,
                'lng' => 31.434605,
                'is_active' => true,
            ],

        ];

        foreach ($items as $item) {
            \DB::table('medical_guides')->insert([
                'title'       => json_encode($item['title']),
                'description'       => json_encode($item['description']),
                'type'       => $item['type'],
                'address'    => json_encode($item['address']),
                'lat'        => $item['lat'],
                'lng'        => $item['lng'],
                'is_active'  => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
