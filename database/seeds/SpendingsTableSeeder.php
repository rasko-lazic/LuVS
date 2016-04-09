<?php

use Illuminate\Database\Seeder;
use App\Spending;


class SpendingsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Spending::class, 10)->create();
    }
}