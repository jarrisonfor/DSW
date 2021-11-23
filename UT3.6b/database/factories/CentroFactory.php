<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CentroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo' => $this->faker->unique()->randomNumber(),
            'denominacion' => $this->faker->company,
            'direccion' => $this->faker->address,
            'municipio' => $this->faker->city,
            'ciudad' => $this->faker->city,
            'isla' => $this->faker->randomElement([
                'Lanzarote',
                'Tenerife',
                'Fuerteventura',
                'Gran Canaria',
                'La Palma',
                'El Hierro',
                'Tenerife',
                'La Gomera',
                'Gran Canaria',
            ]),
            'codigoPostal' => $this->faker->bothify('#####'),
            'provincia' => $this->faker->city,
            'latitud' => $this->faker->latitude,
            'longitud' => $this->faker->longitude,
        ];
    }
}
