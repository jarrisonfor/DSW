<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);

        $user = User::factory()->createOne([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => Hash::make('csas1234'),
            'alias' => 'AA',
        ]);
        $user->assignRole('admin');
        $user->assignRole('user');

        $user = User::factory()->createOne([
            'name' => 'Usuario',
            'email' => 'usuario@usuario.com',
            'password' => Hash::make('csas1234'),
            'alias' => 'US',
        ]);
        $user->assignRole('user');

    }

}
