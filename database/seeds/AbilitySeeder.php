<?php

use Illuminate\Database\Seeder;

class AbilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (app('roleHelper')->getModels() as $model => $name)
            foreach (app('roleHelper')->getCruds() as $crud => $crudName)
                \Silber\Bouncer\Database\Ability::create([
                    'name' => $crud,
                    'entity_type' => $model,
                    'title' => $crudName . ' ' . $name,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
    }
}
