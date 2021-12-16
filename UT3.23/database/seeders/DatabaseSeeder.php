<?php

namespace Database\Seeders;

use App\Models\Pasaje;
use App\Models\Piloto;
use App\Models\Publicacion;
use App\Models\Usuario;
use App\Models\Vuelo;
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
        Piloto::factory(25)
            ->has(
                Vuelo::factory()
                    ->has(
                        Pasaje::factory()
                            ->count(10)
                        )
                    ->count(4)
            )->create();
    }
}
