<?php

use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f = [
            ['name' => 'الحالة 1'],
            ['name' => 'الحالة 2'],
            ['name' => 'الحالة 3'],
            ['name' => 'الحالة 4'],
            ['name' => 'الحالة 5'],
        ];
        \App\OrderStatus::insert($f);
    }
}
