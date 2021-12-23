<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('lt_LT');

        foreach (range(1, 5) as $_) {
            DB::table('users')->insert([
                'name' => $faker->firstName(),
                'email' => $faker->email(),
                'password' => Hash::make('123456')
            ]);
        }
    }
}
