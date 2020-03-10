<?php

use Illuminate\Database\Seeder;
use App\BloodType;

class BloodTypesTableSeeder extends Seeder
{
    public function run()
    {
        $blood_types = Migrations::BLOOD_TYPES;
        foreach ($blood_types as $blood_type) {
            BloodType::query()->create($blood_type);
        }
    }
}
