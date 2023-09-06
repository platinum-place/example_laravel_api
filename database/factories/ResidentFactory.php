<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resident>
 */
class ResidentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->firstName(),
            'apellidos' => fake()->lastName(),
            'telefono' => fake()->phoneNumber(),
            'correo' => fake()->unique()->safeEmail(),
            'edad' => fake()->numberBetween(18, 65),
            'direccion' => fake()->address(),
            'comida_entregada' => fake()->boolean(),
            'observacion' => fake()->paragraph(),
        ];
    }
}
