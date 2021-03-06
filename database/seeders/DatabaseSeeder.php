<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 各テーブルへのデータの流し込みを呼び出す
        $this->call(ItemsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PlacesTableSeeder::class);
        $this->call(ItemPlaceTableSeeder::class);
        $this->call(CategoryItemTableSeeder::class);
    }
}
