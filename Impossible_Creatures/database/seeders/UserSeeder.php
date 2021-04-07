<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => "Caribou",
            'password' => "123456",
            'money' => 0,
            'points' => 0,
            'animals' => "ilhan",
            'species' => "chien"
        ]);

    }
}
