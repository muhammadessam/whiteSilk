<?php

use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade;

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

    }
}
