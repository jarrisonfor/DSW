<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PilotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'apellidos' => $this->faker->lastName(),
            'f_nacimiento' => $this->faker->date(),
            'email' => $this->faker->email(),
            'dni' => $this->faker->dni(),
            'telefono' => $this->faker->numerify('#########'),
        ];
    }
}
