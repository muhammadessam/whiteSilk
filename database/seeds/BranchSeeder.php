<?php

use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branches = [
            [
                'name' => 'فرع 1',
                'bill_prefix' => '00A',
                'is_app' => 1,
                'country_id' => 1,
            ], [
                'name' => 'فرع 2',
                'bill_prefix' => '00B',
                'is_app' => 1,
                'country_id' => 1,
            ], [
                'name' => 'فرع 3',
                'bill_prefix' => '00C',
                'is_app' => 1,
                'country_id' => 1,
            ],
        ];
        \App\Branch::insert($branches);
    }
}
