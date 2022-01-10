<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LotFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->bothify('????????'),
            'expirationDate' => $this->faker->date(),
            'deliveryDate' => $this->faker->date(),
            'quantity' => $this->faker->numberBetween(1, 100),
        ];
    }

}
