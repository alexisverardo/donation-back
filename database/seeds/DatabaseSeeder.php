<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(LocationsTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(BloodTypesTableSeeder::class);
        $this->call(HospitalTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(DonorsTableSeeder::class);
    }
}
