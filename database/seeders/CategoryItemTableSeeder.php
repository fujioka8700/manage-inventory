<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class CategoryItemTableSeeder extends Seeder
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
            $array = range(1, 4);
            shuffle($array);
            $array = array_slice($array, 0, rand(1, 4));

            Item::find($i)->categories()->attach($array);
        }
    }
}
