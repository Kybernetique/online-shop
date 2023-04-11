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
            ['name' => 'ПК и ноутбуки', 'image' => '/img/categories/computers.png', 'created_at' => now(), 'updated_at' => now()]
        ]);
        DB::table('categories')->insert([
            ['name' => 'Мобильные телефоны', 'image' => '/img/categories/phones.png', 'created_at' => now(), 'updated_at' => now()]
        ]);
        DB::table('categories')->insert([
            ['name' => 'Программное обеспечение', 'image' => '/img/categories/programs.png', 'created_at' => now(), 'updated_at' => now()]
        ]);
        DB::table('categories')->insert([
            ['name' => 'Комплектующие', 'image' => '/img/categories/components.png', 'created_at' => now(), 'updated_at' => now()]
        ]);
        DB::table('categories')->insert([
            ['name' => 'Сетевое оборудование', 'image' => '/img/categories/telecommunications.png', 'created_at' => now(), 'updated_at' => now()]
        ]);
        DB::table('categories')->insert([
            ['name' => 'Портативные устройства', 'image' => '/img/categories/portables.png', 'created_at' => now(), 'updated_at' => now()]
        ]);
        DB::table('categories')->insert([
            ['name' => 'Бытовая техника', 'image' => '/img/categories/appliances.png', 'created_at' => now(), 'updated_at'=>now()]
        ]);
        DB::table('categories')->insert([
            ['name' => 'Все товары', 'image' => '/img/categories/cart.png', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
