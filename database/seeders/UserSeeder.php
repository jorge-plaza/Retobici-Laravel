<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jorge',
            'email' => 'jorge@uva.es',
            'password' => bcrypt('123456'),
            'points' => 1000
        ]);
        User::create([
            'name' => 'Mario',
            'email' => 'mario@uva.es',
            'password' => '12345678'
        ]);
    }
}
