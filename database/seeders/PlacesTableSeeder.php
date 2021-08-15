<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $places = ['シンク下', '床下収納', '納戸', '玄関',
                '階段下', 'リビング', 'キッチン', 'サニタリー'];

        foreach ($places as $place) {
            DB::table('places')->insert([
                'name' => $place,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
