<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        $this->call(CountriesTableSeeder::class);
        $this->call(MetricsTableSeeder::class);
        $this->call(ComplainsTableSeeder::class);
        $this->call(PetitionsTableSeeder::class);
    }
}
