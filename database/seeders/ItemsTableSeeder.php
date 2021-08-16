<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Faker\Provider\DateTime;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = ['トイレットペーパー', 'ティッシュペーパー', 'ゴミ袋', 'ヌメリ取り', '洗濯洗剤'];

        foreach($items as $item) {
            DB::table('items')->insert([
                'title' => $item,
                'quantity' => rand(0, 20),
                'created_at' => Carbon::parse('2000-01-01 00:00:00'),
                'updated_at' => DateTime::dateTimeThisDecade(),
            ]);
        }
    }
}
