<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\Consultation;
use App\Models\Review;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create sample doctors
        $doctors = [
            ['name' => 'د. أحمد محمد', 'specialization' => 'طب القلب'],
            ['name' => 'د. فاطمة علي', 'specialization' => 'طب الأطفال'],
            ['name' => 'د. محمود حسن', 'specialization' => 'طب العظام'],
            ['name' => 'د. سارة خالد', 'specialization' => 'طب النساء والولادة'],
        ];

        foreach ($doctors as $doctorData) {
            $doctor = Doctor::create($doctorData);

            // Create consultations for each doctor (varying by month)
            // Current month
            for ($i = 0; $i < rand(5, 10); $i++) {
                Consultation::create([
                    'doctor_id' => $doctor->id,
                    'patient_name' => 'مريض ' . ($i + 1),
                    'notes' => 'ملاحظات الاستشارة',
                    'created_at' => Carbon::now()->subDays(rand(1, 25)),
                ]);
            }

            // Last month
            for ($i = 0; $i < rand(3, 8); $i++) {
                Consultation::create([
                    'doctor_id' => $doctor->id,
                    'patient_name' => 'مريض ' . ($i + 1),
                    'notes' => 'ملاحظات الاستشارة',
                    'created_at' => Carbon::now()->subMonth()->addDays(rand(1, 25)),
                ]);
            }

            // Previous months (for chart)
            for ($month = 2; $month <= 11; $month++) {
                for ($i = 0; $i < rand(2, 6); $i++) {
                    Consultation::create([
                        'doctor_id' => $doctor->id,
                        'patient_name' => 'مريض ' . ($i + 1),
                        'notes' => 'ملاحظات الاستشارة',
                        'created_at' => Carbon::now()->subMonths($month)->addDays(rand(1, 25)),
                    ]);
                }
            }
        }

        // Create sample reviews
        $reviews = [
            [
                'name' => 'محمد أحمد',
                'rating' => 5,
                'comment' => 'خدمة ممتازة وطاقم طبي محترف. أنصح الجميع بهذه المنصة',
                'approved' => true,
            ],
            [
                'name' => 'فاطمة علي',
                'rating' => 5,
                'comment' => 'تجربة رائعة والأطباء على مستوى عالي من الخبرة',
                'approved' => true,
            ],
            [
                'name' => 'أحمد حسن',
                'rating' => 4,
                'comment' => 'منصة جيدة والخدمة سريعة',
                'approved' => true,
            ],
            [
                'name' => 'نورا خالد',
                'rating' => 5,
                'comment' => 'شكراً للفريق الطبي على الاهتمام والرعاية الممتازة',
                'approved' => false,
            ],
        ];

        foreach ($reviews as $reviewData) {
            Review::create($reviewData);
        }
    }
}
