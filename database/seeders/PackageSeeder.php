<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        // $5 per hour, assuming 1 hour per session
        $hourlyRate = 5;
        
        $packages = [
            [
                'name_en' => 'Basic Package',
                'name_ar' => 'الباقة الأساسية',
                'description_en' => 'Perfect for beginners with 1-2 sessions per week. Ideal for those starting their Quranic journey.',
                'description_ar' => 'مثالية للمبتدئين مع 1-2 جلسة في الأسبوع. مثالية لمن يبدأ رحلته القرآنية.',
                'price' => 2 * $hourlyRate, // 2 sessions = 2 hours = $10/week
                'sessions_per_week' => 2,
            ],
            [
                'name_en' => 'Standard Package',
                'name_ar' => 'الباقة القياسية',
                'description_en' => 'Comprehensive learning with 3-4 sessions per week. Best for regular students seeking steady progress.',
                'description_ar' => 'تعلم شامل مع 3-4 جلسات في الأسبوع. الأفضل للطلاب المنتظمين الذين يسعون للتقدم المستمر.',
                'price' => 4 * $hourlyRate, // 4 sessions = 4 hours = $20/week
                'sessions_per_week' => 4,
            ],
            [
                'name_en' => 'Premium Package',
                'name_ar' => 'الباقة المميزة',
                'description_en' => 'Intensive program with 5+ sessions per week. Personalized attention and accelerated learning.',
                'description_ar' => 'برنامج مكثف مع 5+ جلسات في الأسبوع. اهتمام شخصي وتعلم متسارع.',
                'price' => 5 * $hourlyRate, // 5 sessions = 5 hours = $25/week
                'sessions_per_week' => 5,
            ],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}

