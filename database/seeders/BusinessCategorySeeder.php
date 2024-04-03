<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('business_categories')->insert([
            ['name' => 'Construction'],
            ['name' => 'Printing'],
            ['name' => 'Manufacturing'],
            ['name' => 'Logistics/Transport'],
            ['name' => 'Jewellery'],
            ['name' => 'Garments/Textiles'],
            ['name' => 'Hotel'],
            ['name' => 'Super Market']
        ]);
    }
}
