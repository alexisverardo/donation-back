<?php

use Illuminate\Database\Seeder;
use App\Province;

class ProvincesTableSeeder extends Seeder
{
    public function run()
    {
        $provinces = Migrations::PROVINCES;
        foreach ($provinces as $province) {
            Province::query()->create($province);
        }
    }
}
