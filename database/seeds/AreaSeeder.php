<?php

use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            [
                'name' => 'منطقة 1',
                'city_id' => random_int(1, 5),
                'price' => 10
            ],
            [
                'name' => 'منطقة 2',
                'city_id' => random_int(1, 5),
                'price' => 10
            ],
            [
                'name' => 'منطقة 3',
                'city_id' => random_int(1, 5),
                'price' => 10
            ],
            [
                'name' => 'منطقة 4',
                'city_id' => random_int(1, 5),
                'price' => 10
            ],
            [
                'name' => 'منطقة 5',
                'city_id' => random_int(1, 5),
                'price' => 10
            ],
            [
                'name' => 'منطقة 6',
                'city_id' => random_int(1, 5),
                'price' => 10
            ],

        ];
        \App\Area::insert($areas);
    }
}
