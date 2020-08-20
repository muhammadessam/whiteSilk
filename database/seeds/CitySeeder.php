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
            ['name' => 'المدينة 1', 'country_id' => 1, 'price'=>10],
            ['name' => 'المدينة 2', 'country_id' => 1, 'price'=>10],
            ['name' => 'المدينة 3', 'country_id' => 1, 'price'=>10],
            ['name' => 'المدينة 4', 'country_id' => 1, 'price'=>10],
            ['name' => 'المدينة 5', 'country_id' => 1, 'price'=>10],
            ['name' => 'المدينة 6', 'country_id' => 1, 'price'=>10],

        ];
        \App\City::insert($cities);
    }
}
