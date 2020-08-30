<?php

use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addresses = [
            [
                'name' => 'منزل 1',
                'client_id' => random_int(2, 3),
                'country_id' => '1',
                'city_id' => random_int(1, 6),
                'area_id' => random_int(1, 6),
                'details' => 'bl bla bla bla',
            ],
            [
                'name' => 'منزل 2',
                'client_id' => random_int(2, 3),
                'country_id' => '1',
                'city_id' => random_int(1, 6),
                'area_id' => random_int(1, 6),
                'details' => 'bl bla bla bla',
            ],
            [
                'name' => 'منزل31',
                'client_id' => random_int(2, 3),
                'country_id' => '1',
                'city_id' => random_int(1, 6),
                'area_id' => random_int(1, 6),
                'details' => 'bl bla bla bla',
            ],
            [
                'name' => 'منزل 4',
                'client_id' => random_int(2, 3),
                'country_id' => '1',
                'city_id' => random_int(1, 6),
                'area_id' => random_int(1, 6),
                'details' => 'bl bla bla bla',
            ],
            [
                'name' => 'منزل 5',
                'client_id' => random_int(2, 3),
                'country_id' => '1',
                'city_id' => random_int(1, 6),
                'area_id' => random_int(1, 6),
                'details' => 'bl bla bla bla',
            ],
            [
                'name' => 'منزل 6',
                'client_id' => random_int(2, 3),
                'country_id' => '1',
                'city_id' => random_int(1, 6),
                'area_id' => random_int(1, 6),
                'details' => 'bl bla bla bla',
            ],

        ];
        \App\Address::insert($addresses);
    }
}
