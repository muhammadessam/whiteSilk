<?php

use Illuminate\Database\Seeder;

class DriverOrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            ['name' => 'وصل'],
            ['name' => 'تم الاستلام'],
        ];
        \App\DriverOrderStatus::insert($status);
    }
}
