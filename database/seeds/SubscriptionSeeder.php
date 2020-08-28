<?php

use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s = [
            [
                'id' => 1,
                'name' => 'مبلغ',
                'description' => 'bla bla bla',
                'img' => '',
                'is_active' => true,
                'price' => 20,
                'type' => 'مبلغ',
                'added_credit' => 30.00,
                'pieces' => null,
                'days' => null,
            ],
            [
                'id' => 2,
                'name' => 'قطعة',
                'description' => 'bla bla bla',
                'img' => '',
                'is_active' => true,
                'price' => 20,
                'type' => 'قطعة',
                'added_credit' => null,
                'pieces' => 100,
                'days' => null,
            ],
            [
                'id' => 3,
                'name' => 'تاريخ  قطع',
                'description' => 'bla bla bla',
                'img' => '',
                'is_active' => true,
                'price' => 30,
                'type' => 'تاريخ',
                'added_credit' => null,
                'pieces' => 100,
                'days' => 30,
            ],
            [
                'id' => 4,
                'name' => 'تاريخ من غير قطه',
                'description' => 'bla bla bla',
                'img' => '',
                'is_active' => true,
                'price' => 10,
                'type' => 'تاريخ',
                'added_credit' => null,
                'pieces' => 0,
                'days' => 30,
            ],

        ];
        \App\Subscription::insert($s);
    }
}
