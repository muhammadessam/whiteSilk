<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [

            [
                'name'       => 'كويت',
                'code' => 'kw',
            ]
        ];
        \App\Country::insert($countries);
    }
}
