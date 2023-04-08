<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('categories')->insert([
            ['name' => 'ПК и ноутбуки', 'image' => '/img/categories/computers.png']
        ]);
        DB::table('categories')->insert([
            ['name' => 'Мобильные телефоны', 'image' => '/img/categories/phones.png']
        ]);
        DB::table('categories')->insert([
            ['name' => 'Программное обеспечение', 'image' => '/img/categories/programs.png']
        ]);
        DB::table('categories')->insert([
            ['name' => 'Комплектующие', 'image' => '/img/categories/components.png']
        ]);
        DB::table('categories')->insert([
            ['name' => 'Сетевое оборудование', 'image' => '/img/categories/telecommunications.png']
        ]);
        DB::table('categories')->insert([
            ['name' => 'Портативные устройства', 'image' => '/img/categories/portables.png']
        ]);
        DB::table('categories')->insert([
            ['name' => 'Бытовая техника', 'image' => '/img/categories/appliances.png']
        ]);
        DB::table('categories')->insert([
            ['name' => 'Все товары', 'image' => '/img/categories/cart.png']
        ]);
    }
}
