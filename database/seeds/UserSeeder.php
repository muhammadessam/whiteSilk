<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'type' => 'ادمن',
                'phone'=>'01116555444'
            ],
            [
                'name' => 'Muhammad Essam',
                'email' => 'm@m.com',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'type' => 'عميل',
                'phone'=>'01116555444'
            ],
             [
                'name' => 'Ahmed',
                'email' => 'k@m.com',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'type' => 'عميل',
                 'phone'=>'01116555444'
            ],
             [
                'name' => 'محمود',
                'email' => 'l@m.com',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'type' => 'سائق',
                 'phone'=>'01116555444'
            ],
             [
                'name' => 'حسين',
                'email' => 'i@m.com',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'type' => 'سائق',
                 'phone'=>'01116555444'
            ],
             [
                'name' => 'رحيم',
                'email' => 'o@m.com',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'type' => 'مشرف',
                 'phone'=>'01116555444'
            ],
             [
                'name' => 'عظيم',
                'email' => 'p@m.com',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'type' => 'مشرف',
                 'phone'=>'01116555444'
            ],

        ];

        \App\User::insert($admin);
    }
}
