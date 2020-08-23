<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(AbilitySeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(DriverOrderStatusSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(BranchSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(OrderStatusSeeder::class);
        $this->call(SubscriptionTypeSeeder::class);
        $this->call(SubscriptionSeeder::class);
    }
}
