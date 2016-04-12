<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::statement("TRUNCATE TABLE spendings");
        DB::statement("TRUNCATE TABLE users RESTART IDENTITY CASCADE");

        $this->call(UsersTableSeeder::class);
        $this->call(SpendingsTableSeeder::class);
    }
}
