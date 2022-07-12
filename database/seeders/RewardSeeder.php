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
            'name' => 'Visita Guiada de Valladolid',
            'description' => 'A short description',
            'points' => 100,
            'total_available' => 5,
            "image"=> "https://images.unsplash.com/photo-1591544940847-e8c860a9464e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1974&q=80"
        ]);
        $reward->users()->sync([1,2]);
        $reward = Reward::create([
            'name' => 'Restaurante Merinos',
            'description' => 'A short description 2',
            'points' => 200,
            'total_available' => 2,
            "image"=> "https://images.unsplash.com/photo-1621841957884-1210fe19d66d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80"
        ]);
        $reward->users()->sync([1]);
        Reward::create([
            'name' => 'Bar El Corcho',
            'description' => 'A short description 3',
            'points' => 1000,
            'total_available' => 1,
            "image" => "https://images.unsplash.com/photo-1565599837634-134bc3aadce8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1335&q=80"
        ]);
        Reward::create([
            'name' => 'Museo de Escultura de Valladolid',
            'description' => 'A short description 4',
            'points' => 4,
            'total_available' => 10,
            'image' => 'https://images.unsplash.com/photo-1617257118084-339d30c49b02?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80'
        ]);
        Reward::create([
            'name' => 'Sesión fotográfica profesional',
            'description' => 'A short description 5',
            'points' => 500,
            'total_available' => 5,
            "image"=> "https://images.unsplash.com/photo-1655219282218-6a4a8d91a699?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80"
        ]);
    }
}
