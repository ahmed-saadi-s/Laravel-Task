<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class accountType extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('account_types')->insert([
            ['name'=>'باحث عن سكن',
            'description' => 'شخص يبحث عن وحدة سكنية للإيجار أو الشراء'
        ],
            ['name'=>'باحث عن شريك للسكن',
            'description' => 'شخص يبحث عن شريك لتقاسم تكاليف السكن في وحدة مشتركة'
            ]
        ]);
        
    }
}
