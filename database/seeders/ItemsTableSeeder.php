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
            ['name' => 'スポンジ', 'quantity'=> 7],
            ['name' => 'ゴミ袋', 'quantity'=> 4]
        ];

        foreach($items as $item) {
            DB::table('items')->insert([
                'name' => $item['name'],
                'quantity' => $item['quantity'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
