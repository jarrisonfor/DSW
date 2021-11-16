<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombreCompañía' => $this->faker->company,
            'nombreContacto' => $this->faker->name,
            'cargoContacto' => $this->faker->jobTitle,
            'dirección' => $this->faker->address,
            'ciudad' => $this->faker->city,
            'región' => $this->faker->state,
            'códPostal' => $this->faker->bothify('#####'),
            'país' => $this->faker->country,
            'teléfono' => $this->faker->phoneNumber,
            'fax' => $this->faker->phoneNumber,
            'páginaPrincipal' => $this->faker->url,
            'latitud' => $this->faker->latitude,
            'longitud' => $this->faker->longitude,
        ];
    }
}
