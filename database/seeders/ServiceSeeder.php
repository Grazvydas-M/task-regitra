<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            'Examination' => 30,
            'Renew expired driving license' => 10,
            'Declaration of vehicle owners' => 8,
            'Vehicle Registration Documents' => 5,
            'I have sold/purchased vehicle' => 9,
            'State Number Plates' => 7,
        ];

        foreach ($services as $service => $time){
            DB::table('services')->insert([
                'name' => $service,
                'time' => $time,
            ]);
        }
    }
}
