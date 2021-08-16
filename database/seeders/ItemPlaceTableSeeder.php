<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemPlaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items_count = Item::all()->count();

        for ($i=1; $i <= $items_count; $i++) {
            Item::find($i)->places()->attach(rand(1, 8));
        }
    }
}
