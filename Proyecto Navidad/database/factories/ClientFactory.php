<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'companyName' => $this->faker->company,
            'identification' => $this->faker->unique()->randomNumber(9),
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'address' => $this->faker->address,
            'postalCode' => $this->faker->numberBetween(1000, 52999),
            'municipality' => $this->faker->city,
            'province' => $this->faker->city,
        ];
    }

}
