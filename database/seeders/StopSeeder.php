<?php

namespace Database\Seeders;

use App\Models\Bike;
use App\Models\Stop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stop::create([
            "lng"=> -4.731,
            "lat"=> 41.653,
            "address"=> "Plaza de Poniente",
            "total_spaces"=> 10,
        ]);
        Stop::create([
            "lng"=> -4.726,
            "lat"=> 41.652,
            "address"=> "Plaza de Fuente Dorada",
            "total_spaces"=> 10,
        ]);
        Stop::create([
            "lng"=> -4.725,
            "lat"=> 41.648,
            "address"=> "Plaza Madrid",
            "total_spaces"=> 10,
        ]);
        Stop::create([
            "lng"=> -4.729,
            "lat"=> 41.647,
            "address"=> "Plaza Zorrilla",
            "total_spaces"=> 10,
        ]);
    }
}
