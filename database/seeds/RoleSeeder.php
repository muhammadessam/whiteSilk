<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bouncer::role()->firstOrCreate([
            'name' => 'الادمن',
            'title' => 'Administrator',
        ]);
        Bouncer::role()->firstOrCreate([
            'name' => 'المشرف',
            'title' => 'supervisor',
        ]);
        Bouncer::role()->firstOrCreate([
            'name' => 'السائق',
            'title' => 'Driver',
        ]);
        Bouncer::role()->firstOrCreate([
            'name' => 'عميل',
            'title' => 'Client',
        ]);
        \App\User::find(1)->roles()->Sync([1]);
    }
}
