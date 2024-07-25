<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $cities = [
            ['name' => 'دبي', 'country_id' => 1],
            ['name' => 'أبوظبي', 'country_id' => 1],
            ['name' => 'الشارقة', 'country_id' => 1],
            ['name' => 'العين', 'country_id' => 1],
            ['name' => 'عجمان', 'country_id' => 1],
            ['name' => 'رأس الخيمة', 'country_id' => 1],
            ['name' => 'الفجيرة', 'country_id' => 1],
            ['name' => 'أم القيوين', 'country_id' => 1],
            ['name' => 'دبا الفجيرة', 'country_id' => 1],
            ['name' => 'خورفكان', 'country_id' => 1],
            ['name' => 'كلباء', 'country_id' => 1],
            ['name' => 'جبل علي', 'country_id' => 1],
            ['name' => 'مدينة زايد', 'country_id' => 1],
            ['name' => 'الرويس', 'country_id' => 1],
            ['name' => 'ليوا', 'country_id' => 1],
            ['name' => 'الذيد', 'country_id' => 1],
            ['name' => 'غياثي', 'country_id' => 1],
            ['name' => 'الرمس', 'country_id' => 1],
            ['name' => 'دبا الحصن', 'country_id' => 1],
            ['name' => 'حتا', 'country_id' => 1],
            ['name' => 'المدام', 'country_id' => 1],
        ];

        // إضافة بيانات المحافظات إلى جدول cities
        DB::table('cities')->insert($cities);
    }
}
