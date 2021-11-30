<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AlumnoFactory extends Factory
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
            'email' => $this->faker->unique()->safeEmail(),
            'f_nacimiento' => $this->faker->date(),
            'c_postal' => $this->faker->numberBetween(1000, 52999),
            'codigo' => $this->faker->regexify('[0-9]{4}-[A-Z]'),
        ];
    }
}
