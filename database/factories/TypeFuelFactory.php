<?php

namespace Database\Factories;

use App\Models\Fuel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TypeFuel>
 */
class TypeFuelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number_fuel' => fake()->randomFloat(2, 1, 2),
            'fuel_id' => Fuel::get()->random()->id,
            'user_id' => User::get()->random()->id,
            'status' => true,
        ];
    }
}
