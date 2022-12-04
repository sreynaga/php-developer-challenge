<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name'       => 'Sik Sik Wat',
                'category'   => 1,
                'sku'        => 'DISH999ABCD',
                'price'      => 13.49,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name'     => 'Huo Guo',
                'category' => 2,
                'sku'      => 'DISH234ZFDR',
                'price'    => 11.99,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name'     => 'Cau-Cau',
                'category' => 3,
                'sku'      => 'DISH775TGHY',
                'price'    => 15.29,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
        ];
        
        DB::table('products')->insert($products);
    }
}
