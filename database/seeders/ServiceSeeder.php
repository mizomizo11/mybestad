<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title_en' => 'Medical Examinations',
                'title_ar' => 'الفحوصات الطبية',
                'description_en' => 'Comprehensive examinations with the latest medical equipment',
                'description_ar' => 'فحوصات شاملة مع أحدث الأجهزة الطبية',
                'icon_class' => 'fas fa-stethoscope',
                'sort_order' => 0,
                'is_active' => true,
            ],
            [
                'title_en' => 'Medical Consultations',
                'title_ar' => 'الاستشارات الطبية',
                'description_en' => 'Consultations with the best specialized doctors',
                'description_ar' => 'استشارات مع أفضل الأطباء المتخصصين',
                'icon_class' => 'fas fa-user-md',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title_en' => 'Emergency Services',
                'title_ar' => 'الطوارئ',
                'description_en' => 'Emergency service available 24/7',
                'description_ar' => 'خدمة طوارئ متوفرة على مدار الساعة',
                'icon_class' => 'fas fa-ambulance',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title_en' => 'Home Care',
                'title_ar' => 'الرعاية المنزلية',
                'description_en' => 'Professional home healthcare services',
                'description_ar' => 'خدمات رعاية صحية منزلية احترافية',
                'icon_class' => 'fas fa-home',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title_en' => 'Laboratory Tests',
                'title_ar' => 'الفحوصات المخبرية',
                'description_en' => 'Accurate and fast laboratory tests',
                'description_ar' => 'فحوصات مخبرية دقيقة وسريعة',
                'icon_class' => 'fas fa-flask',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'title_en' => 'Pharmacy Services',
                'title_ar' => 'خدمات الصيدلية',
                'description_en' => 'Medication delivery and pharmaceutical consultation',
                'description_ar' => 'توصيل الأدوية والاستشارات الصيدلانية',
                'icon_class' => 'fas fa-pills',
                'sort_order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
