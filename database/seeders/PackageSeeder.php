<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [
            // Starter Package (Trial)
            [
                'name_en' => 'Starter Package (Trial)',
                'name_ar' => 'باقة البداية المُبشرة (للمبتدئين تماماً)',
                'icon' => '🌱',
                'badge' => null,
                'package_type' => 'regular',
                'description_en' => 'Perfect for beginners',
                'description_ar' => 'من الصفر إلى قراءة أول آية',
                'sessions_count' => 2,
                'sessions_per_week' => 2,
                'original_price' => 12.00,
                'price' => 10.00,
                'discount_percentage' => 17,
            ],
            // Basic Package
            [
                'name_en' => 'Basic Package',
                'name_ar' => 'باقة الطريق إلى الفصاحة',
                'icon' => '📘',
                'badge' => null,
                'package_type' => 'regular',
                'description_en' => 'For steady learning',
                'description_ar' => 'تحول كبير في 10 ساعات فقط',
                'sessions_count' => 8,
                'sessions_per_week' => 2,
                'original_price' => 48.00,
                'price' => 45.00,
                'discount_percentage' => 6,
            ],
            // Standard Package - Most Popular
            [
                'name_en' => 'Standard Package',
                'name_ar' => 'باقة التميز في التلاوة',
                'icon' => '⭐',
                'badge' => 'Most Popular',
                'package_type' => 'regular',
                'description_en' => 'Best value for progress',
                'description_ar' => 'أفضل قيمة للتقدم',
                'sessions_count' => 12,
                'sessions_per_week' => 3,
                'original_price' => 72.00,
                'price' => 65.00,
                'discount_percentage' => 10,
            ],
            // Premium Package
            [
                'name_en' => 'Premium Package',
                'name_ar' => 'باقة حفظ وتجويد',
                'icon' => '🚀',
                'badge' => null,
                'package_type' => 'regular',
                'description_en' => 'Fast and effective progress',
                'description_ar' => 'تقدم سريع وفعال',
                'sessions_count' => 20,
                'sessions_per_week' => 5,
                'original_price' => 120.00,
                'price' => 105.00,
                'discount_percentage' => 13,
            ],
            // Family Package
            [
                'name_en' => 'Family Package',
                'name_ar' => 'باقة العائلة',
                'icon' => '👨‍👩‍👧',
                'badge' => null,
                'package_type' => 'regular',
                'description_en' => 'For siblings - 2 students, 16 sessions per month',
                'description_ar' => 'للأشقاء - طالبان، 16 جلسة شهرياً',
                'sessions_count' => 16,
                'sessions_per_week' => 4,
                'original_price' => 96.00,
                'price' => 85.00,
                'discount_percentage' => 12,
            ],
            // Intensive One-to-One - 10 sessions
            [
                'name_en' => 'Intensive One-to-One',
                'name_ar' => 'مكثف فردي',
                'icon' => '🎯',
                'badge' => null,
                'package_type' => 'intensive',
                'description_en' => 'Fully personalized - 10 sessions',
                'description_ar' => 'شخصي بالكامل - 10 جلسات',
                'sessions_count' => 10,
                'sessions_per_week' => null,
                'original_price' => 60.00,
                'price' => 55.00,
                'discount_percentage' => 8,
            ],
            // Intensive One-to-One - 20 sessions
            [
                'name_en' => 'Intensive One-to-One',
                'name_ar' => 'مكثف فردي',
                'icon' => '🎯',
                'badge' => null,
                'package_type' => 'intensive',
                'description_en' => 'Fully personalized - 20 sessions',
                'description_ar' => 'شخصي بالكامل - 20 جلسة',
                'sessions_count' => 20,
                'sessions_per_week' => null,
                'original_price' => 120.00,
                'price' => 105.00,
                'discount_percentage' => 12,
            ],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}

