<?php

namespace Database\Seeders;

use App\Models\Reward;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RewardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reward = Reward::create([
            'name' => 'Reward 1',
            'description' => 'A short description',
            'points' => 100,
            'total_available' => 5
        ]);
        $reward->users()->sync([1,2]);
        $reward = Reward::create([
            'name' => 'Reward 2',
            'description' => 'A short description 2',
            'points' => 200,
            'total_available' => 2
        ]);
        $reward->users()->sync([1]);
        Reward::create([
            'name' => 'Reward 3',
            'description' => 'A short description 3',
            'points' => 1000,
            'total_available' => 1
        ]);
        Reward::create([
            'name' => 'Reward 4',
            'description' => 'A short description 4',
            'points' => 4,
            'total_available' => 10
        ]);
        Reward::create([
            'name' => 'Reward 5',
            'description' => 'A short description 5',
            'points' => 500,
            'total_available' => 5
        ]);
    }
}
