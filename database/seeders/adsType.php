<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class adsType extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ads_type')->insert([
            [
                'name' => 'البحث عن شقة',
                'description' => 'البحث عن شقة للإيجار'
            ],
            [
                'name' => 'البحث عن شريك',
                'description' => 'البحث عن شريك للسكن'
            ],
        ]);
    }
}
