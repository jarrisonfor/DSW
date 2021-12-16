<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VueloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo' => Str::random('10'),
            'origen' => $this->faker->city(),
            'destino' => $this->faker->city(),
            'fecha' => $this->faker->date(),
            'hora' => $this->faker->time(),
        ];
    }
}
