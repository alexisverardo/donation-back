<?php

use Illuminate\Database\Seeder;
use App\Location;

class LocationsTableSeeder extends Seeder
{
    public function run()
    {
        $locations = Migrations::LOCATIONS;
        foreach ($locations as $location) {
            Location::query()->create($location);
        }
    }
}
