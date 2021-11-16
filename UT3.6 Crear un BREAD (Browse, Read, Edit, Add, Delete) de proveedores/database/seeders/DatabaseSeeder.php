<?php

namespace Database\Seeders;

use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Proveedor::factory()->count(10)->hasProductos(10)->create();
    }
}
