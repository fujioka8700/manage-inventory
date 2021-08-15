<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['title' => 'トイレットペーパー', 'quantity'=> 2],
            ['title' => 'ティシュペーパー', 'quantity'=> 4],
            ['title' => 'ゴミ袋', 'quantity'=> 1],
            ['title' => 'ヌメリ取り', 'quantity'=> 8],
            ['title' => '洗濯洗剤', 'quantity'=> 3]
        ];

        foreach($items as $item) {
            DB::table('items')->insert([
                'title' => $item['title'],
                'quantity' => $item['quantity'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
