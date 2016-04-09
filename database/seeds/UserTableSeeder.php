<?php

use Illuminate\Database\Seeder;
use App\User;


class UserTableSeeder extends Seeder
{
    public function run()
    {
        //User::truncate();

        factory(User::class, 1)->create();
    }
}