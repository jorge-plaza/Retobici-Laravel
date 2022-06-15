<?php

namespace Database\Seeders;

use App\Models\Bike;
use App\Models\ElectricBike;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bike = Bike::create([
            'stop_id' => 1,
            'unlocked' => false
        ]);
        ElectricBike::create([
            'id' => $bike->id,
            'battery' => 60
        ]);
        Bike::create([
            'stop_id' => 1,
            'unlocked' => false
        ]);

        $bike = Bike::create([
            'stop_id' => 2,
            'unlocked' => false
        ]);
        ElectricBike::create([
            'id' => $bike->id,
            'battery' => 70
        ]);

        Bike::create([
            'stop_id' => 3,
            'unlocked' => false
        ]);
    }
}
