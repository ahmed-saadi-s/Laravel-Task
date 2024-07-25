<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResidenceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('residence_type')->insert([
            [
                'name' => 'شقة',
                'description' => 'شقة سكنية في مبنى متعدد الطوابق'
            ],
            [
                'name' => 'غرفة',
                'description' => 'غرفة مستقلة'
            ],
        ]);
    }
}
