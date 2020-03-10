<?php

use App\Donor;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class DonorsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('donors')->truncate();
        $donors = factory(Donor::class, 3)->make()->toArray();

        $index = 1;
        foreach ($donors as $donor) {
            $donor['user_id'] = $index;
            Donor::query()->create($donor);
            $index++;
        }
    }
}
