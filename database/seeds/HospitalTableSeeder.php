<?php

use App\Hospital;
use Illuminate\Database\Seeder;
use App\Location;

class HospitalTableSeeder extends Seeder
{
    public function run()
    {
        $hospitals = Migrations::HOSPITALS;
        foreach ($hospitals as $hospital) {
            Hospital::query()->create($hospital);
        }
    }
}
