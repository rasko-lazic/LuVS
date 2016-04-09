<?php

use Illuminate\Database\Seeder;
use App\Spending;


class SpendingsTableSeeder extends Seeder
{
    public function run()
    {
        Spending::truncate();

        factory(App\Spending::class, 10)->create();
    }
}