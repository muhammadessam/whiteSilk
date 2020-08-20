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
                'type' => 'ادمن'
            ],
            [
                'name' => 'Muhammad Essam',
                'email' => 'm@m.com',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'type' => 'عميل'
            ],
             [
                'name' => 'Ahmed',
                'email' => 'k@m.com',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'type' => 'عميل'
            ],
             [
                'name' => 'محمود',
                'email' => 'l@m.com',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'type' => 'سائق'
            ],
             [
                'name' => 'حسين',
                'email' => 'i@m.com',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'type' => 'سائق'
            ],
             [
                'name' => 'رحيم',
                'email' => 'o@m.com',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'type' => 'مشرف'
            ],
             [
                'name' => 'عظيم',
                'email' => 'p@m.com',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'type' => 'مشرف'
            ],

        ];

        \App\User::insert($admin);
    }
}
