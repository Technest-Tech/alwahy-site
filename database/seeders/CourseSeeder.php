<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            [
                'name_en' => 'Quran Recitation',
                'name_ar' => 'تلاوة القرآن الكريم',
                'description_en' => 'Learn the proper way to recite the Holy Quran with correct pronunciation and rhythm.',
                'description_ar' => 'تعلم الطريقة الصحيحة لتلاوة القرآن الكريم مع النطق والإيقاع الصحيحين.',
            ],
            [
                'name_en' => 'Tajweed',
                'name_ar' => 'علم التجويد',
                'description_en' => 'Master the rules of Tajweed to perfect your Quranic recitation and pronunciation.',
                'description_ar' => 'أتقن قواعد التجويد لإتقان تلاوة القرآن الكريم ونطقه.',
            ],
            [
                'name_en' => 'Hifz (Memorization)',
                'name_ar' => 'حفظ القرآن الكريم',
                'description_en' => 'Memorize the Holy Quran with structured programs and personalized guidance.',
                'description_ar' => 'احفظ القرآن الكريم ببرامج منظمة وإرشاد شخصي.',
            ],
            [
                'name_en' => 'Arabic Language',
                'name_ar' => 'اللغة العربية',
                'description_en' => 'Learn Arabic language to better understand the Quran and Islamic texts.',
                'description_ar' => 'تعلم اللغة العربية لفهم أفضل للقرآن والنصوص الإسلامية.',
            ],
            [
                'name_en' => 'Islamic Studies',
                'name_ar' => 'الدراسات الإسلامية',
                'description_en' => 'Comprehensive Islamic education covering faith, history, and jurisprudence.',
                'description_ar' => 'تعليم إسلامي شامل يغطي الإيمان والتاريخ والفقه.',
            ],
            [
                'name_en' => 'Tafsir',
                'name_ar' => 'التفسير',
                'description_en' => 'Deep dive into the interpretation and meaning of the Holy Quran verses.',
                'description_ar' => 'تعمق في تفسير ومعاني آيات القرآن الكريم.',
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}

