<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->truncate();
        $users = factory(User::class, 3)->make()->toArray();
        $users[0]['email'] = 'jonatan@gmail.com';
        $users[1]['email'] = 'alexis@gmail.com';
        $users[2]['email'] = 'gaston@gmail.com';
        foreach ($users as $user) {
            $user['password'] = 'secret';
            User::query()->create($user);
        }
    }
}
