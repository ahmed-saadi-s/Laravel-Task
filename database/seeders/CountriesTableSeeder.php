<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
   
    public function run(): void
    {
        DB::table('countries')->insert([
            ['name' => 'الإمارات العربية المتحدة'],
            // إضافة بلدان أخرى إذا لزم الأمر
        ]);
}
}
