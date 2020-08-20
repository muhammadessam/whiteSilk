<?php

use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = [
            [
                'name' => 'الدفع عند الاستلام '
            ],
            [
                'name' => 'بالفيزا'
            ],
            [
                'name' => 'KNet'
            ],
        ];
        \App\PaymentMethod::insert($c);
    }
}
