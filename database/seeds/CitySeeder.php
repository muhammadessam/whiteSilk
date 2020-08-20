<?php

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            ['name' => 'المنيا', 'country_id' => 1, 'price'=>10],
            ['name' => 'جيزة', 'country_id' => 1, 'price'=>10],
            ['name' => 'قاهرة', 'country_id' => 1, 'price'=>10],
            ['name' => 'اسكندرية', 'country_id' => 1, 'price'=>10],
            ['name' => 'اسوان', 'country_id' => 1, 'price'=>10],
            ['name' => 'سودان', 'country_id' => 1, 'price'=>10],

        ];
        \App\City::insert($cities);
    }
}
