<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stop>
 */
class StopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'lng' => $this->faker->longitude,
            'lat' => $this->faker->latitude,
            'address' => $this->faker->address,
            'total_spaces' => 10,
        ];
    }
}
