<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => [
                    'ar' => 'أوراق المعاش',
                    'en' => 'Pension Documents',
                ],
                'description' => [
                    'ar' => 'خدمات استخراج وتجديد أوراق المعاش.',
                    'en' => 'Services for issuing and renewing pension documents.',
                ],
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => [
                    'ar' => 'استخراج شهادات',
                    'en' => 'Certificates Issuance',
                ],
                'description' => [
                    'ar' => 'خدمة استخراج الشهادات الرسمية.',
                    'en' => 'Official certificates issuance service.',
                ],
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => [
                    'ar' => 'الدعم الدراسي',
                    'en' => 'Educational Support',
                ],
                'description' => [
                    'ar' => 'خدمات متعلقة بالدعم الدراسي للطلاب.',
                    'en' => 'Services related to educational support for students.',
                ],
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => [
                    'ar' => 'اشتراكات وكارنيهات',
                    'en' => 'Memberships & IDs',
                ],
                'description' => [
                    'ar' => 'استخراج وتجديد الكارنيهات والاشتراكات.',
                    'en' => 'Issuing and renewing IDs and memberships.',
                ],
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => [
                    'ar' => 'أوراق المعاش',
                    'en' => 'Pension Papers',
                ],
                'description' => [
                    'ar' => 'خدمات مخصصة لأوراق ومستندات المعاش.',
                    'en' => 'Dedicated services for pension papers and documents.',
                ],
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => [
                    'ar' => 'تجديد الاشتراك',
                    'en' => 'Subscription Renewal',
                ],
                'description' => [
                    'ar' => 'تجديد جميع أنواع الاشتراكات.',
                    'en' => 'Renewal of various subscriptions.',
                ],
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => [
                    'ar' => 'دعم متوفين كورونا',
                    'en' => 'COVID-19 Deceased Support',
                ],
                'description' => [
                    'ar' => 'خدمة مخصصة لدعم أسر متوفين كورونا.',
                    'en' => 'Support services for families of COVID-19 victims.',
                ],
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => [
                    'ar' => 'أوراق الإعلانات',
                    'en' => 'Advertising Documents',
                ],
                'description' => [
                    'ar' => 'خدمات أوراق وتصاريح الإعلانات.',
                    'en' => 'Advertising paperwork and permit services.',
                ],
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => [
                    'ar' => 'قروض',
                    'en' => 'Loans',
                ],
                'description' => [
                    'ar' => 'خدمات التقديم للحصول على القروض.',
                    'en' => 'Loan application support services.',
                ],
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => [
                    'ar' => 'الرحلات',
                    'en' => 'Trips',
                ],
                'description' => [
                    'ar' => 'حجز وتنظيم الرحلات.',
                    'en' => 'Trips booking and organization.',
                ],
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => [
                    'ar' => 'مصايف',
                    'en' => 'Resorts',
                ],
                'description' => [
                    'ar' => 'حجز المصايف والمنتجعات.',
                    'en' => 'Booking summer resorts and vacation spots.',
                ],
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => [
                    'ar' => 'الاستراحات',
                    'en' => 'Rest Houses',
                ],
                'description' => [
                    'ar' => 'حجز الاستراحات والخدمات الفندقية.',
                    'en' => 'Booking rest houses and accommodation services.',
                ],
                'is_featured' => false,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            DB::table('services')->insert([
                'title' => json_encode($service['title'], JSON_UNESCAPED_UNICODE),
                'description' => json_encode($service['description'], JSON_UNESCAPED_UNICODE),
                'is_featured' => $service['is_featured'],
                'is_active' => $service['is_active'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
