<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Ethiopia, Meat, Beef, Chili pepper'],
            ['name' => 'China, Meat, Beef, Fish, Tofu, Sichuan pepper'],
            ['name' => 'Peru, Potato, Yellow Chili pepper'],
        ];
        
        DB::table('categories')->insert($categories);
    }
}
