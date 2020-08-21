<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Смартфоны', 'code' => 'Смартфоны', 'description' => 'Крутое описание'],
            ['name' => 'Ноутбуки', 'code' => 'Ноутбуки', 'description' => 'Крутое описание'],
            ['name' => 'Камеры', 'code' => 'Камеры', 'description' => 'Крутое описание'],
            ['name' => 'Аксессуары', 'code' => 'Аксессуары', 'description' => 'Крутое описание'],
        ]);
    }
}