<?php

use Illuminate\Database\Seeder;

class SubscriptionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t = [
            [
                'name' => 'بالقطعة',
            ],
            [
                'name' => 'تاريخ محدد',
            ],
            [
                'name' => 'بالمبلغ',
            ]
        ];

        \App\SubscriptionType::insert($t);
    }
}
