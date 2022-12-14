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
            'unlocked' => false,
            'bikeable_id' => 1,
            'bikeable_type' => 'App\Models\ElectricBike',
        ]);
        ElectricBike::create([
            'battery' => 60
        ]);
        Bike::create([
            'stop_id' => 1,
            'unlocked' => false,
            'bikeable_id' => 2,
            'bikeable_type' => 'App\Models\Bike',
        ]);

        $bike = Bike::create([
            'stop_id' => 2,
            'unlocked' => false,
            'bikeable_id' => 2,
            'bikeable_type' => 'App\Models\ElectricBike',
        ]);
        ElectricBike::create([
            'battery' => 70
        ]);

        Bike::create([
            'stop_id' => 3,
            'unlocked' => false,
            'bikeable_id' => 4,
            'bikeable_type' => 'App\Models\Bike',
        ]);

    }
}
