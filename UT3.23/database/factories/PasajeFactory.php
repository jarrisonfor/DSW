<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PasajeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'apellidos' => $this->faker->lastName,
            'precio' => $this->faker->randomFloat(2, 5, 500),
        ];
    }
}
