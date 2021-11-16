<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'producto' => $this->faker->name,
            'cantidad_por_unidad' => $this->faker->randomNumber(2),
            'precio_unidad' => $this->faker->randomNumber(2),
            'unidades_existencia' => $this->faker->randomNumber(2),
            'unidades_pedido' => $this->faker->randomNumber(2),
            'nivel_nuevo_pedido' => $this->faker->randomNumber(2),
            'suspendido' => $this->faker->boolean(2),
        ];
    }
}
